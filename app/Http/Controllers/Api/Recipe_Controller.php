<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Auth\Category;
use App\Models\Auth\Level;
use App\Models\Auth\Recipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Recipe_Controller extends Controller
{
    public function storeRecipe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'recipe_name' => 'required|string',
            'recipe_description' => 'required|string',
            'category' => 'required|in:breakfast,lunch,dinner,snacks',
            'level' => 'required|in:easy,not-so-difficult,chefs-level',
            'recipe_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link' => 'required|string',
            'steps' => 'array|required',
            'steps.*.instruction' => 'required|string|max:255',
            'ingredients' => 'array|required',
            'ingredients.*.ingredient_name' => 'required|string',
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $recipeData = [
            'recipe_name' => $request->recipe_name,
            'recipe_description' => $request->recipe_description,
            'category' => $request->category,
            'level' => $request->level,
            'link' => $request->link,
            'user_id' => $request->user_id,
        ];

        // Check if recipe_image is provided and valid
        if ($request->hasFile('recipe_image')) {
            $filename = time().'.'.$request->file('recipe_image')->getClientOriginalExtension();
            $request->file('recipe_image')->storeAs('public/images', $filename);
            $recipeData['recipe_image'] = $filename;
        }

        $recipe = Recipe::create($recipeData);

        // Store steps
        foreach ($request->steps as $stepData) {
            $recipe->steps()->create([
                'instruction' => $stepData['instruction']
            ]);
        }

        // Store ingredients
        foreach ($request->ingredients as $ingredientData) {
            $recipe->ingredients()->create([
                'ingredient_name' => $ingredientData['ingredient_name']
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Recipe added successfully',
            'data' => $recipe
        ], 201);
    }


    public function getAllRecipes()
    {
        // Retrieve all recipes with their associated steps, level, and ingredients
        $recipes = Recipe::all();

        // Parse steps and ingredients to arrays
        $recipes = $recipes->map(function ($recipe) {
            $recipe->steps = explode(',', $recipe->steps);
            $recipe->ingredients = explode(',', $recipe->ingredients);
            return $recipe;
        });

        return response()->json([
            'status' => true,
            'recipes' => $recipes
        ]);

    }

    public function showRecipe($id)
    {
        // Find the recipe with related data
        $recipe = Recipe::with(['steps', 'level', 'ingredients'])->findOrFail($id);

        // Increment views count for the recipe
        $recipe->increment('views_count');

        // Parse steps and ingredients to arrays
        $recipe->steps = explode(',', $recipe->steps);
        $recipe->ingredients = explode(',', $recipe->ingredients);

        // Prepare the response data
        $responseData = [
            'status' => true,
            'recipe' => $recipe,
        ];

        return response()->json($responseData);
    }

    public function breakfastCategory()
    {
            $category = Recipe::where('category', 'breakfast')->get();

            $category->load('user');

            // Transform the collection of recipes into an array with username and steps included
            $recipes = $category->map(function ($recipe) {
                // Transform steps into an array of instructions
                $stepsArray = $recipe->steps->map(function ($step) {
                    return [
                        'instruction' => $step->instruction
                    ];
                })->toArray();

                // Transform ingredients into an array of ingredient names
                $ingredientsArray = $recipe->ingredients->map(function ($ingredient) {
                    return [
                        'ingredient_name' => $ingredient->ingredient_name
                    ];
                })->toArray();

                return [
                    'id' => $recipe->id,
                    'recipe_name' => $recipe->recipe_name,
                    'recipe_image' => $recipe->recipe_image,
                    'category' => $recipe->category,
                    'recipe_description' => $recipe->recipe_description,
                    'level' => $recipe->level,
                    'steps' => $stepsArray, // Include the steps array
                    'ingredients' => $ingredientsArray, // Include the ingredients array
                    'views_count' => $recipe->views_count,
                    'username' => $recipe->user ? $recipe->user->username : null,
                ];
            })->toArray();

            return response()->json([
                'status' => true,
                'recipe' => $recipes
            ]);
        }

    public function lunchCategory()
        {
            $category = Recipe::where('category', 'lunch')->get();

            $category->load('user');

            // Transform the collection of recipes into an array with username and steps included
            $recipes = $category->map(function ($recipe) {
                // Transform steps into an array of instructions
                $stepsArray = $recipe->steps->map(function ($step) {
                    return [
                        'instruction' => $step->instruction
                    ];
                })->toArray();

                // Transform ingredients into an array of ingredient names
                $ingredientsArray = $recipe->ingredients->map(function ($ingredient) {
                    return [
                        'ingredient_name' => $ingredient->ingredient_name
                    ];
                })->toArray();

                return [
                    'id' => $recipe->id,
                    'recipe_name' => $recipe->recipe_name,
                    'recipe_image' => $recipe->recipe_image,
                    'category' => $recipe->category,
                    'recipe_description' => $recipe->recipe_description,
                    'level' => $recipe->level,
                    'steps' => $stepsArray, // Include the steps array
                    'ingredients' => $ingredientsArray, // Include the ingredients array
                    'views_count' => $recipe->views_count,
                    'username' => $recipe->user ? $recipe->user->username : null,
                ];
            })->toArray();

            return response()->json([
                'status' => true,
                'recipe' => $recipes
            ]);
        }

    public function dinnerCategory()
    {
        $category = Recipe::where('category', 'dinner')->get();

        $category->load('user');

        // Transform the collection of recipes into an array with username and steps included
        $recipes = $category->map(function ($recipe) {
            // Transform steps into an array of instructions
            $stepsArray = $recipe->steps->map(function ($step) {
                return [
                    'instruction' => $step->instruction
                ];
            })->toArray();

            // Transform ingredients into an array of ingredient names
            $ingredientsArray = $recipe->ingredients->map(function ($ingredient) {
                return [
                    'ingredient_name' => $ingredient->ingredient_name
                ];
            })->toArray();

            return [
                'id' => $recipe->id,
                'recipe_name' => $recipe->recipe_name,
                'recipe_image' => $recipe->recipe_image,
                'category' => $recipe->category,
                'recipe_description' => $recipe->recipe_description,
                'level' => $recipe->level,
                'steps' => $stepsArray, // Include the steps array
                'ingredients' => $ingredientsArray, // Include the ingredients array
                'views_count' => $recipe->views_count,
                'username' => $recipe->user ? $recipe->user->username : null,
            ];
        })->toArray();

        return response()->json([
            'status' => true,
            'recipe' => $recipes
        ]);
    }

    public function snackCategory()
        {
            $category = Recipe::where('category', 'snacks')->get();

            $category->load('user');

            // Transform the collection of recipes into an array with username and steps included
            $recipes = $category->map(function ($recipe) {
                // Transform steps into an array of instructions
                $stepsArray = $recipe->steps->map(function ($step) {
                    return [
                        'instruction' => $step->instruction
                    ];
                })->toArray();

                // Transform ingredients into an array of ingredient names
                $ingredientsArray = $recipe->ingredients->map(function ($ingredient) {
                    return [
                        'ingredient_name' => $ingredient->ingredient_name
                    ];
                })->toArray();

                return [
                    'id' => $recipe->id,
                    'recipe_name' => $recipe->recipe_name,
                    'recipe_image' => $recipe->recipe_image,
                    'category' => $recipe->category,
                    'recipe_description' => $recipe->recipe_description,
                    'level' => $recipe->level,
                    'steps' => $stepsArray, // Include the steps array
                    'ingredients' => $ingredientsArray, // Include the ingredients array
                    'views_count' => $recipe->views_count,
                    'username' => $recipe->user ? $recipe->user->username : null,
                ];
            })->toArray();

            return response()->json([
                'status' => true,
                'recipe' => $recipes
            ]);
        }

    public function recentRecipe()
    {
        // Retrieve the most recent recipes from the database
        $recentRecipes = Recipe::latest()->take(5)->get();

        // Load the user relationship for each recipe to fetch the associated username
        $recentRecipes->load('user');

        // Transform the collection of recipes into an array with username and steps included
        $recipesArray = $recentRecipes->map(function ($recipe) {
            // Transform steps into an array of instructions
            $stepsArray = $recipe->steps->map(function ($step) {
                return [
                    'instruction' => $step->instruction
                ];
            })->toArray();

            // Transform ingredients into an array of ingredient names
            $ingredientsArray = $recipe->ingredients->map(function ($ingredient) {
                return [
                    'ingredient_name' => $ingredient->ingredient_name
                ];
            })->toArray();

            return [
                'id' => $recipe->id,
                'recipe_name' => $recipe->recipe_name,
                'recipe_image' => $recipe->recipe_image,
                'category' => $recipe->category,
                'recipe_description' => $recipe->recipe_description,
                'level' => $recipe->level,
                'steps' => $stepsArray, // Include the steps array
                'ingredients' => $ingredientsArray, // Include the ingredients array
                'views_count' => $recipe->views_count,
                'username' => $recipe->user ? $recipe->user->username : null,
            ];
        })->toArray();

        return response()->json([
            'status' => true,
            'recipe' => $recipesArray
        ]);
    }

    public function mostViewed()
    {
        // Retrieve the recipe with the highest count of views
        $mostViewedRecipe = Recipe::orderBy('views_count', 'desc')->take(5)->get();

        $mostViewedRecipe->load('user');

        // Transform the collection of recipes into an array with username and steps included
        $recipesArray = $mostViewedRecipe->map(function ($recipe) {
            // Transform steps into an array of instructions
            $stepsArray = $recipe->steps->map(function ($step) {
                return [
                    'instruction' => $step->instruction
                ];
            })->toArray();

            // Transform ingredients into an array of ingredient names
            $ingredientsArray = $recipe->ingredients->map(function ($ingredient) {
                return [
                    'ingredient_name' => $ingredient->ingredient_name
                ];
            })->toArray();

            return [
                'id' => $recipe->id,
                'recipe_name' => $recipe->recipe_name,
                'recipe_image' => $recipe->recipe_image,
                'category' => $recipe->category,
                'recipe_description' => $recipe->recipe_description,
                'level' => $recipe->level,
                'steps' => $stepsArray, // Include the steps array
                'ingredients' => $ingredientsArray, // Include the ingredients array
                'views_count' => $recipe->views_count,
                'username' => $recipe->user ? $recipe->user->username : null,
            ];
        })->toArray();

        return response()->json([
            'status' => true,
            'recipe' => $recipesArray
        ]);
    }

    public function showRecipeApi($id)
    {
        try {
            // Fetch the recipe data for the given ID
            $recipe = Recipe::with(['steps', 'ingredients'])->findOrFail($id);

            $currentRecipe = Recipe::find($id);
            $currentCategory = $currentRecipe->category;

            $likesCount = $recipe->likesCount();
            $recipe->increment('views_count');

            // Return the recipe data as JSON response
            return response()->json([
                'success' => true,
                'data' => [
                    'recipe' => $recipe,
                    'likesCount' => $likesCount,
                    'currentCategory' => $currentCategory,
                    'currentRecipe' => $currentRecipe,
                ],
            ]);
        } catch (\Exception $e) {
            // Handle any exceptions and return an error response
            return response()->json([
                'success' => false,
                'message' => 'Recipe not found.',
            ], 404);
        }
    }

    public function deleteRecipe($id)
    {
        // Validate the recipe ID
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|exists:recipes,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Invalid recipe ID',
            ], 422);
        }

        // Check if the authenticated user has permission to delete the recipe
        $user = Auth::user();
        $recipe = Recipe::findOrFail($id);
        if ($user->id !== $recipe->user_id) {
            return response()->json([
                'status' => 'error',
                'message' => 'You do not have permission to delete this recipe',
            ], 403);
        }

        try {
            // Delete the recipe's image file if it exists
            if ($recipe->recipe_image) {
                Storage::delete('public/images/' . $recipe->recipe_image);
            }

            // Delete the recipe, its steps, and ingredients
            $recipe->steps()->delete();
            $recipe->ingredients()->delete();
            $recipe->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Recipe deleted successfully',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to delete the recipe',
            ], 500);
        }
    }
}
