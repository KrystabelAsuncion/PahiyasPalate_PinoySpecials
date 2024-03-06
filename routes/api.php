<?php

use App\Http\Controllers\Api\categoryAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\control;
use App\Http\Controllers\Api\recipeAPI;


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

Route::get('/users',[recipeAPI::class,'index']);
Route::post('/users-create',[recipeAPI::class,'create']);
Route::post('/auth', [recipeAPI::class, 'authenticate']);
Route::post('/recipe',[recipeAPI::class,'storeRecipe']);



