<?php

namespace App\Http\Controllers;

use App\Models\Auth\Recipe;
use Illuminate\Http\Request;
use App\Models\Auth\Category;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth\Bookmark;

class CategoryController extends Controller
{
    public function categoryBoard(Request $request)
    {
        if (Auth::check()) {
            $breakfastCategories = Recipe::where('category','breakfast')->get();
            $lunchCategories = Recipe::where('category','lunch')->get();
            $dinnerCategories = Recipe::where('category','dinner')->get();
            $snacksCategories = Recipe::where('category','snacks')->get();

            return view('Auth.category', compact('breakfastCategories', 'lunchCategories', 'dinnerCategories', 'snacksCategories'));
        }

        return redirect()->route('login')
            ->withErrors(['email' => 'Please login to access the category.'])
            ->onlyInput('email');
    }


    public function bookmark($recipeId)
    {
        //auth user
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please log in to bookmark or unbookmark a recipe.');
        }

        // Get the authenticated user's ID
        $userId = Auth::id();

        //if bookmarked
        $bookmark = Bookmark::where('user_id', $userId)->where('recipe_id', $recipeId)->first();
        if ($bookmark) {
            $bookmark->delete();
            return redirect()->back()->with('success', 'Recipe unbookmarked successfully.');
        }

        //unbookmarked
        Bookmark::create(['user_id' => $userId, 'recipe_id' => $recipeId]);
        return redirect()->back()->with('success', 'Recipe bookmarked successfully.');

    }

}
