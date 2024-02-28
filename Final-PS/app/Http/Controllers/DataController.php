<?php

namespace App\Http\Controllers;

use App\Models\Auth\Category;
use App\Models\Auth\Ingredient;
use App\Models\Auth\Level;
use App\Models\Auth\Recipe;
use App\Models\Auth\Step;
use App\Models\Auth\Bookmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maize\Markable\Models\Like;

use Illuminate\Support\Facades\Auth;


class DataController extends Controller
{
    public function indexRecipe()
    {
        $category = Category::with('recipes','levels')->get();
        $recipes = Recipe::with('steps','ingredients')->get();
        $levels = Level::all();
        $steps = Step::all();
        $ingredients = Ingredient::all();

        return view('test.index',compact('category', 'recipes', 'levels','steps','ingredients'));
    }

    public function createRecipe()
    {
        $category = Category::all();
        $level = Level::all();
        return view('test.create',compact('category','level'));
    }

    public function storeRecipe(Request $request)
    {
        $validatedData = $request->validate([
            'recipe_name' => 'required|string|max:255',
            'recipe_description' => 'required|string|max:255',
            'category_id' => 'required|exists:category,id',
            'level_id' => 'required|exists:levels,id',
            'recipe_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link'=> 'required|string'
        ]);

        $recipe = Recipe::create([
            'recipe_name' => $validatedData['recipe_name'],
            'recipe_description' => $validatedData['recipe_description'],
            'category_id' => $validatedData['category_id'],
            'level_id' => $validatedData['level_id'],
            'recipe_image' => '', // We'll update this after storing the image
            'link' => $validatedData['link'],
        ]);


        $filename = time().'.'.$request->file('recipe_image')->getClientOriginalExtension();
        $request->recipe_image->storeAs('public/images', $filename);
        $path = $request->file('recipe_image')->storeAs('public/images', $filename);
        \Log::info('Stored file path: ' . $path);

        $recipe->update(['recipe_image' => $filename]);
        // Steps
        if ($request->has('steps')) {
            $stepsValidationRules = [
                'order' => 'required|string|max:255',
                'instruction' => 'required|string|max:255',
            ];

            foreach ($request->input('steps') as $stepsData) {
                $validator = Validator::make($stepsData, $stepsValidationRules);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $recipe->steps()->create([
                    'order' => $stepsData['order'],
                    'instruction' => $stepsData['instruction'],
                ]);
            }
        }

        // Ingredients
        if ($request->has('ingredients')) {
            $ingredientsValidationRules = [
                'ingredient_name' => 'required|string' // Corrected field name
            ];

            foreach ($request->input('ingredients') as $ingredientsData) {
                $validator = Validator::make($ingredientsData, $ingredientsValidationRules);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $recipe->ingredients()->create([

                    'ingredient_name' => $ingredientsData['ingredient_name'],
                    // Corrected field name
                ]);
            }
        }

        return redirect()->route('recipe.dashboard')->with('success', 'Recipe added successfully');
    }

    public function editRecipe($id)
    {
        $recipe = Recipe::find($id);
        $category = Category::all();
        $level = Level::all();
        $steps = Step::all();
        $ingredients = Ingredient::all();
        return view('test.edit',compact('recipe','category', 'level'));

    }

    public function updateRecipe(Request $request, $id)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'recipe_name' => 'required|string|max:255',
            'recipe_description' => 'required|string|max:255',
            'category_id' => 'required|exists:category,id',
            'level_id' => 'required|exists:levels,id'
        ]);

        // Find the recipe by its ID
        $recipe = Recipe::findOrFail($id);

        // Update the recipe attributes
        $recipe->update([
            'recipe_name' => $validatedData['recipe_name'],
            'recipe_description' => $validatedData['recipe_description'],
            'category_id' => $validatedData['category_id'],
            'level_id' => $validatedData['level_id'],
        ]);

        // Steps
        if ($request->has('steps')) {
            $stepsValidationRules = [
                'order' => 'required|string',
                'instruction' => 'required|string|max:255',
            ];

            foreach ($request->input('steps') as $stepsData) {
                $validator = Validator::make($stepsData, $stepsValidationRules);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $recipe->steps()->create([
                    'order' => $stepsData['order'],
                    'instruction' => $stepsData['instruction'],
                ]);
            }
        }

        // Ingredients
        if ($request->has('ingredients')) {
            $ingredientsValidationRules = [
                'ingredient_name' => 'required|string'
            ];

            foreach ($request->input('ingredients') as $ingredientsData) {
                $validator = Validator::make($ingredientsData, $ingredientsValidationRules);

                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }

                $recipe->ingredients()->create([

                    'ingredient_name' => $ingredientsData['ingredient_name'],

                ]);
            }
        }

        return redirect()->route('recipe.dashboard')->with('success', 'Recipe updated successfully');
    }

    public function showRecipe($id)
    {
        // Fetch the recipe data for the clicked recipe
        $recipe = Recipe::with(['steps','level','ingredients'])->findOrFail($id);
        $category = Category::findOrFail($recipe->category_id);

        $currentRecipe = Recipe::find($id);
        $currentCategory = $currentRecipe->category;

        $likesCount = $recipe->likesCount();
        $recipe->increment('views_count');

        // Pass the $recipe data to the view
        return view('Auth.recipe', compact('recipe','category','likesCount','currentCategory', 'currentRecipe'));
    }

    public function destroyRecipe($id)
    {
        $recipe = Recipe::find($id);
        $recipe->steps()->delete();
        $recipe->ingredients()->delete();
        $recipe->delete();
        return redirect()->route('recipe.dashboard')->with('status','deleted');
    }

    //Likes
    public function likeRecipe(Recipe $recipe)
    {
        $user = Auth::user();

        if ($user) {
            $recipe->like($user);
            return back()->with('success', 'Recipe liked successfully.');
        } else {
            return redirect()->route('login')->with('error', 'Please log in to like recipes.');
        }
    }

    public function unlikeRecipe(Recipe $recipe)
    {
        $user = Auth::user();

        if ($user) {
            $recipe->unlike($user);
            return back()->with('success', 'Recipe unliked successfully.');
        } else {
            return redirect()->route('login')->with('error', 'Please log in to unlike recipes.');
        }
    }

    //bookmarks
    public function bookmark($recipeId)
    {
         // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to bookmark or unbookmark a recipe.');
        }

        // Get the authenticated user's ID
        $userId = Auth::id();

        // Check if the recipe is already bookmarked by the user
        $bookmark = Bookmark::where('user_id', $userId)->where('recipe_id', $recipeId)->first();
        if ($bookmark) {
            $bookmark->delete();
            return redirect()->back()->with('success', 'Recipe unbookmarked successfully.');
        }

        // If the recipe is not bookmarked, add a new bookmark (bookmark)
        Bookmark::create(['user_id' => $userId, 'recipe_id' => $recipeId]);
        return redirect()->back()->with('success', 'Recipe bookmarked successfully.');

    }


}
