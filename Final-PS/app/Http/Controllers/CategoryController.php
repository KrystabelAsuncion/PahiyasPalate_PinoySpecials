<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auth\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth\Bookmark;

class CategoryController extends Controller
{
    public function categoryBoard(Request $request)
    {
        if (Auth::check()) {
            $breakfastCategories = $this->fetchCategoriesByName('breakfast');
            $lunchCategories = $this->fetchCategoriesByName('lunch');
            $dinnerCategories = $this->fetchCategoriesByName('dinner');
            $snacksCategories = $this->fetchCategoriesByName('snacks');

            return view('Auth.category',compact('breakfastCategories','lunchCategories','dinnerCategories','snacksCategories'));
        }

        return redirect()->route('login')
                        ->withErrors(['email' => 'Please login to access the category.'])
                        ->onlyInput('email');
    }

    public function fetchCategoriesByName($category)
    {
        // Fetch categories based on their name
        $categories = Category::where('category', $category)->get();

        return $categories;
    }
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
