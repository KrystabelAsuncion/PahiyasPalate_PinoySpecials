<?php

namespace App\Http\Controllers;

use App\Models\Auth\Recipe;
use App\Models\GuestName;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Auth\Category;

class GuestController extends Controller
{
    public function registerAsGuest(){

        return view('Guest.registerGuest');
    }

    public function submitGuestName(Request $request)
    {
        $validatedData = $request->validate([
            'guest' => 'required|string|max:255',
        ]);

        // Store the guest name in the session
        $request->session()->put('guest', $validatedData['guest']);

        return redirect()->route('guest-dashboard')->with('success', 'Guest name submitted successfully!');
    }

public function guestDashboard(Request $request)
    {
        // Retrieve the guest name from the session
        $guestName = $request->session()->get('guest');

        return view('Auth.guest', ['username' => $guestName]);
    }

    public function guestCategory(){
        $randomUsername = 'Guest_' . Str::random(8);
        $breakfastCategories = $this->fetchCategoriesByName('breakfast');
        $lunchCategories = $this->fetchCategoriesByName('lunch');
        $dinnerCategories = $this->fetchCategoriesByName('dinner');
        $snacksCategories = $this->fetchCategoriesByName('snacks');

        return view('Guest.guest-category',
        ['username' => $randomUsername, 'breakfastCategories' => $breakfastCategories, 'lunchCategories' => $lunchCategories,'dinnerCategories' => $dinnerCategories, 'snacksCategories' => $snacksCategories]);
    }

    public function fetchCategoriesByName($category)
    {
        //fetch categories based on their name
        $categories = Category::where('category', $category)->get();

        return $categories;
    }
    public function guestPopular(Request $request){
        $username = 'Guest_' . Str::random(8);
        $searchQuery = $request->input('search');
        $recipes = Recipe::where('recipe_name', 'like', '%' . $searchQuery . '%')
            ->orWhere('recipe_description', 'like', '%' . $searchQuery . '%')->get();

        $mostViewedRecipe = Recipe::orderBy('views_count', 'desc')->take(5)->get();
        $mostLikedRecipe = Recipe::orderBy('likes', 'desc')->take(5)->get();
        return view('Guest.guest-popular',compact('recipes','searchQuery','mostViewedRecipe','mostLikedRecipe','username'));
    }
}
