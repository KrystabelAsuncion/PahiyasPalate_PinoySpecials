<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth\Bookmark;

class UserController extends Controller
{
    public function userBoard()
    {
        if (Auth::check())
        {
            $user = auth()->user();
            $publishedRecipes = $user->recipe()->get();
            $publishedRecipeCount = $user->recipe()->count();
            $bookmarkedRecipes = $user->bookmarks()->with('recipe')->get();
            $bookmarkedRecipeCount = Bookmark::where('user_id', $user->id)->count();
            return view('Auth.profile', compact('publishedRecipes','publishedRecipeCount','bookmarkedRecipeCount','bookmarkedRecipes'));
        }

    }
    public function uploadProfileImage(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();

        // Store the uploaded image
        $imageName = time() . '.' . $request->profile_image->extension();
        $request->profile_image->move(public_path('images/profiles'), $imageName);

        // Update the user's profile image path in the database
        $user->profile_image = 'images/profiles/' . $imageName;
        $user->save();

        return redirect()->back()->with('success', 'Profile image uploaded successfully.');
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        // Validate the incoming request data
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Update username and email
        $user->username = $request->username;
        $user->email = $request->email;

        // Update password if provided
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
