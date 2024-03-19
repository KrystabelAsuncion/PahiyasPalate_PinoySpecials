<?php

use App\Http\Controllers\Api\categoryAPI;
use App\Http\Controllers\Api\User_Controller;
use App\Http\Controllers\Api\Recipe_Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\control;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BookmarkController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users',[User_Controller::class,'index']);
Route::post('/users-create',[User_Controller::class,'create']);
Route::post('/auth', [User_Controller::class,'authenticate']);

Route::get('/all-recipe',[Recipe_Controller::class,'getAllRecipes']);
Route::get('/get-recipe/{id}',[Recipe_Controller::class,'showRecipe']);
Route::post('/create-recipe',[Recipe_Controller::class,'storeRecipe']);

//category
Route::get('/breakfast',[Recipe_Controller::class,'breakfastCategory']);
Route::get('/lunch',[Recipe_Controller::class,'lunchCategory']);
Route::get('/dinner',[Recipe_Controller::class,'dinnerCategory']);
Route::get('/snacks',[Recipe_Controller::class,'snackCategory']);

//most-recent
Route::get('/recent',[Recipe_Controller::class,'recentRecipe']);
// most-viewed
Route::get('/views',[Recipe_Controller::class,'mostViewed']);
//increment views
Route::get('/show/{id}',[Recipe_Controller::class,'showRecipeApi']);
//bookmark

Route::post('/bookmark', [BookmarkController::class, 'bookmark']);



