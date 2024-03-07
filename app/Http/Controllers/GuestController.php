<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Auth\Category;

class GuestController extends Controller
{
    public function guestCategory(){
        $randomUsername = 'Guest_' . Str::random(8);
        $breakfastCategories = $this->fetchCategoriesByName('breakfast');
        $lunchCategories = $this->fetchCategoriesByName('lunch');
        $dinnerCategories = $this->fetchCategoriesByName('dinner');
        $snacksCategories = $this->fetchCategoriesByName('snacks');

        return view('Guest.guest-category',
        ['username' => $randomUsername, 'breakfastCategories' => $breakfastCategories, 'lunchCategories' => $lunchCategories,'dinnerCategories' => $dinnerCategories, 'snacksCategories' => $snacksCategories]);
    }

    public function fetchCategoriesByName($category)
    {
        //fetch categories based on their name
        $categories = Category::where('category', $category)->get();

        return $categories;
    }
    public function guestPopular(){
        return view('Guest.guest-popular');
    }
}
