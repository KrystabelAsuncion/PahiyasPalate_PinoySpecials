<?php

namespace App\Http\Controllers;

use App\Models\Auth\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PopularController extends Controller
{
    public function popularBoard(Request $request)
    {
        if (Auth::check()) {
            $searchQuery = $request->input('search');
            $recipes = Recipe::where('recipe_name', 'like', '%' . $searchQuery . '%')
            ->orWhere('recipe_description', 'like', '%' . $searchQuery . '%')->get();

            $mostViewedRecipe = Recipe::orderBy('views_count', 'desc')->take(5)->get();
            $mostLikedRecipe = Recipe::orderBy('likes', 'desc')->take(5)->get();

            return view('Auth.popular',compact('recipes','searchQuery','mostViewedRecipe','mostLikedRecipe'));
        }

        return redirect()->route('login')
                        ->withErrors(['email' => 'Please login to access the popular.'])
                        ->onlyInput('email');
    }
}
