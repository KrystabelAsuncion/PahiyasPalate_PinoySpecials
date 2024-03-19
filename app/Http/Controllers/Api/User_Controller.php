<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Auth\Bookmark;

class User_Controller extends Controller
{
    public function getUserBoard()
    {
        if (Auth::check()) {
            $user = auth()->user();
            $publishedRecipes = $user->recipe()->get();
            $publishedRecipeCount = $user->recipe()->count();
            $bookmarkedRecipes = $user->bookmarks()->with('recipe')->get();
            $bookmarkedRecipeCount = Bookmark::where('user_id', $user->id)->count();

            // Prepare the data to return as JSON
            $data = [
                'published_recipes' => $publishedRecipes,
                'published_recipe_count' => $publishedRecipeCount,
                'bookmarked_recipes' => $bookmarkedRecipes,
                'bookmarked_recipe_count' => $bookmarkedRecipeCount,
            ];

            return response()->json($data, 200);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::create($validatedData);

        return response()->json([
            'status' => 'success',
            'data' => $user
        ]);
    }

    public function index(Request $request)
    {
        $user = User::all();
        return response()->json([
            'status' => true,
            'data' => $user
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $tokenResult = $user->createToken('Access Token');
            $token = $tokenResult->accessToken;

            return response()->json([
                'status' => true,
                'data' => $user,
                'access_token' => $token
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Authentication failed'
            ], 401);
        }
    }
}
