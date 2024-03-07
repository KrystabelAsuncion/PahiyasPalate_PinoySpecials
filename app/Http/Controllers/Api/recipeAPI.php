<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class recipeAPI extends Controller
{
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
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return response()->json([
                'status' => true,
                'data' => $user
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Authentication failed'
            ], 401); // Unauthorized status code
        }
    }

    public function storeRecipe(Request $request)
    {
        $validatedData = $request->validate([
            'recipe_name' => 'required|string',
            'recipe_description' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'level_id' => 'required|exists:levels,id',
            'recipe_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link'=> 'required|string',
        ]);

        $filename = time().'.'.$request->file('recipe_image')->getClientOriginalExtension();
        $request->file('recipe_image')->storeAs('images/recipeimage', $filename);

        $recipe = Recipe::create([
            'recipe_name' => $validatedData['recipe_name'],
            'recipe_description' => $validatedData['recipe_description'],
            'category_id' => $validatedData['category_id'],
            'level_id' => $validatedData['level_id'],
            'recipe_image' => $filename,
            'link' => $validatedData['link'],
        ]);

        return response()->json([
            'status' => false,
            'message' => 'recipe save failed'
        ], 401);
    }



}
