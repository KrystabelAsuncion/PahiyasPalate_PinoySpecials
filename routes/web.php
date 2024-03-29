<?php


use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\MakeRecipeController;
use App\Http\Controllers\PopularController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterCtrl;
use App\Http\Controllers\Auth\PostsController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Auth\recipeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [LoginRegisterCtrl::class, 'register'])->name('register');
Route::post('/store', [LoginRegisterCtrl::class, 'store'])->name('store');
Route::get('/login', [LoginRegisterCtrl::class, 'login'])->name('login');
Route::post('/authenticate', [LoginRegisterCtrl::class, 'authenticate'])->name('authenticate');

Route::get('/dashboard', [LoginRegisterCtrl::class, 'dashboard'])->name('dashboard');
Route::get('/category', [CategoryController::class, 'categoryBoard'])->name('category');
Route::get('/popular',[PopularController::class,'popularBoard'])->name('popular');
Route::get('/addrecipe',[MakeRecipeController::class,'MakeRecipeBoard'])->name('addrecipe');
Route::post('/addrecipe/store', [MakeRecipeController::class, 'storeRecipe'])->name('recipe.store');
Route::get('/about',[AboutController::class, 'aboutBoard'])->name('about');
Route::get('/contact',[ContactController::class, 'contactBoard'])->name('contact');
Route::get('/user',[UserController::class, 'userBoard'])->name('profile');
Route::post('/upload-profile-image', [UserController::class, 'uploadProfileImage'])->name('upload.profile.image');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');

Route::post('/logout', [LoginRegisterCtrl::class, 'logout'])->name('logout');
Route::get('/forgot-password', [LoginRegisterCtrl::class, 'forgotPassword'])->name('forgotPassword');
Route::get('forgot-password', [LoginRegisterCtrl::class, 'forgotPasswordForm'])->name('password.request');
Route::post('forgot-password', [LoginRegisterCtrl::class, 'forgotPassword'])->name('password.username');
Route::get('reset-password/{token}', [LoginRegisterCtrl::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('reset-password', [LoginRegisterCtrl::class, 'resetPassword'])->name('password.update');

Route::get('/recipe/{id}', [PostsController::class, 'recipe_view'])->name('recipe_view');
Route::get('/idrecipe',[PostsController::class,'recipeView'])->name('idrecipe');
//admin
Route::get('/admin-login',[AdminController::class, 'AdminLogin'])->name('admin-login');
Route::get('/admin-register',[AdminController::class,'AdminRegister'])->name('admin-register');
Route::get('/admin-dashboard',[AdminController::class,'AdminDashboard'])->name('admin-dashboard');

//recipe view
Route::get('/recipe/{id}/show',[DataController::class, 'showRecipe'])->name('recipe.show');

//for buttons
Route::post('/recipes/{recipe}/like', [DataController::class,'likeRecipe'])->name('recipe.like');
Route::delete('/recipe/{recipe}/like', [DataController::class,'unlikeRecipe'])->name('recipe.unlike');

Route::post('/recipe/{recipe}/bookmark', [DataController::class,'bookmark'])->name('recipe.bookmark');
Route::delete('/recipe/{recipe}/bookmark', [DataController::class,'bookmark'])->name('recipe.unbookmark');

//guest
Route::post('/guest-name-submit', [GuestController::class, 'submitGuestName'])->name('guest.name.submit');
Route::get('/registerGuest', [GuestController::class, 'registerAsGuest'])->name('registerAsGuest');
Route::get('/guest-category',[GuestController::class,'guestCategory'])->name('guestCategory');
Route::get('/guest-dashboard', [GuestController::class, 'guestDashboard'])->name('guest-dashboard');
Route::get('/guest-popular',[GuestController::class, 'guestPopular'])->name('guestPopular');
Route::get('/guestAddRecipeDis', [GuestController::class, 'guestAddRecipe'])->name('guestAddRecipeDisabled');
Route::get('/guest-about', [GuestController::class, 'guestAbout'])->name('guest-about');
Route::get('/guest-contact',[GuestController::class,'guestContact'])->name('guest-contact');
Route::get('/guest-profile',[GuestController::class,'guestProfile'])->name('guest-profile');

