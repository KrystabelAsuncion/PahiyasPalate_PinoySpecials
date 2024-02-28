<?php

namespace App\Http\Controllers;

use App\Models\Auth\Category;
use App\Models\Auth\Level;
use App\Models\Auth\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class MakeRecipeController extends Controller
{
    public function MakeRecipeBoard()
    {
        if (Auth::check()) {
            $category = Category::all();
            $level = Level::all();
            return view('Auth.addrecipe',compact('category','level'));
        }

        return redirect()->route('login')
                        ->withErrors(['email' => 'Please login to access the popular.'])
                        ->onlyInput('email');
    }

    public function storeRecipe(Request $request)
    {
        $validatedData = $request->validate([
            'recipe_name' => 'required|string',
            'recipe_description' => 'required|string',
            'category_id' => 'required|exists:category,id',
            'level_id' => 'required|exists:levels,id',
            'recipe_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link'=> 'required|string',
        ]);
        $user = Auth::user();

        $recipe = Recipe::create([
            'recipe_name' => $validatedData['recipe_name'],
            'recipe_description' => $validatedData['recipe_description'],
            'category_id' => $validatedData['category_id'],
            'level_id' => $validatedData['level_id'],
            'recipe_image' => '', // We'll update this after storing the image
            'link' => $validatedData['link'],
            'user_id' => $user->id
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

        return redirect()->route('addrecipe')->with('success', 'Recipe added successfully');
    }

}
