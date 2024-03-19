<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bookmark;

class BookmarkController extends Controller
{
    public function bookmark(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'recipe_id' => 'required|integer',
        ]);

        // Check if the user is authenticated
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Get the authenticated user's ID
        $userId = Auth::id();

        // Check if the recipe is already bookmarked by the user
        $bookmark = Bookmark::where('user_id', $userId)->where('recipe_id', $request->recipe_id)->first();
        if ($bookmark) {
            $bookmark->delete();
            return response()->json(['message' => 'Recipe unbookmarked successfully'], 200);
        }

        // If the recipe is not bookmarked, add a new bookmark
        Bookmark::create(['user_id' => $userId, 'recipe_id' => $request->recipe_id]);
        return response()->json(['message' => 'Recipe bookmarked successfully'], 200);
    }
    public function getBookmarksCount(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'recipe_id' => 'required|integer',
        ]);

        // Get the number of bookmarks for the specified recipe
        $bookmarksCount = Bookmark::where('recipe_id', $request->recipe_id)->count();

        return response()->json(['bookmarks_count' => $bookmarksCount], 200);
    }
}
