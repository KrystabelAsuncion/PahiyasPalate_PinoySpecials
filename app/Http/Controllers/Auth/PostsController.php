<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Models\Category;

class PostsController extends Controller
{
    public function input(Request $request)
    {
        $filename = time().'.'.$request->recipe_image->extension();
        $request->recipe_image->storeAs('public/images', $filename);

        $recipe = new Recipe;
        $recipe->recipe_name = $request->recipe_name;
        $recipe->recipe_description = $request->recipe_description;
        $recipe->recipe_category = $request->recipe_category;
        $recipe->recipe_image = $filename;
        $recipe->save();

        $category = Category::firstOrCreate(['name' => $request->input('recipe_category')]);
        $recipe->category()->associate($category);

        return redirect()->route('dashboard');
    }

    public function dashboard()
    {
        return view('Auth.dashboard');
    }

    public function recipe_view()
    {
        return view('Auth.recipe');
    }


    // In your controller method where you retrieve recipes
    public function getBreakfastRecipes()
    {
        $category = Category::where('name', 'breakfast')->first();

        if (!$category) {
            // Handle the case where the "breakfast" category doesn't exist
            // or has not been defined yet
            return redirect()->back()->with('error', 'The breakfast category does not exist.');
        }

        // Retrieve recipes specifically for the "breakfast" category
        $recipes = Recipe::where('recipe_category', $category->id)->get();

        // Pass the retrieved recipes to the view
        return view('Auth.dashboard', compact('recipes'));
    }

    public function recipeView()
    {
        return view('Auth.recipe');
    }



}
