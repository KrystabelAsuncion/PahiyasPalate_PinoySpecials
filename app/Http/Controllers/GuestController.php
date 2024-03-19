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

    public function guestCategory(Request $request){
        $guestName = $request->session()->get('guest');
        $breakfastCategories = Recipe::where('category','breakfast')->get();
        $lunchCategories = Recipe::where('category','lunch')->get();
        $dinnerCategories = Recipe::where('category','dinner')->get();
        $snacksCategories = Recipe::where('category','snacks')->get();

        return view('Guest.guest-category',
        ['username' => $guestName, 'breakfastCategories' => $breakfastCategories, 'lunchCategories' => $lunchCategories,'dinnerCategories' => $dinnerCategories, 'snacksCategories' => $snacksCategories]);
    }

    
    public function guestPopular(Request $request){

        $username = $request->session()->get('guest');
        $searchQuery = $request->input('search');
        $recipes = Recipe::where('recipe_name', 'like', '%' . $searchQuery . '%')
            ->orWhere('recipe_description', 'like', '%' . $searchQuery . '%')->get();

        $mostViewedRecipe = Recipe::orderBy('views_count', 'desc')->take(5)->get();
        $mostLikedRecipe = Recipe::orderBy('likes', 'desc')->take(5)->get();
        return view('Guest.guest-popular',compact('recipes','searchQuery','mostViewedRecipe','mostLikedRecipe','username'));
    }
    public function guestAddRecipe(Request $request)
    {
        $username = $request->session()->get('guest');
        return view('Guest.guestAddRecipe', compact('username'));
    }

    public function guestAbout(Request $request)
    {
        $username = $request->session()->get('guest');
        return view('Guest.guest-about', compact('username'));
    }
    
    public function guestContact(Request $request)
    {
        $username = $request->session()->get('guest');
        return view('Guest.guest-contact', compact('username'));
        
    }
    public function guestProfile(Request $request)
    {
        $username = $request->session()->get('guest');
        return view('Guest.guest-profile',compact('username'));
    }
}
