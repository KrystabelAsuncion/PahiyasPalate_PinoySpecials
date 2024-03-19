<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Android\Recipes_app;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class recipeAPI extends Controller
{
    public function getUser(Request $request)
    {
        return $request->user();
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
        ], 401); // Unauthorized status code
    }
}

}
