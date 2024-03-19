<?php

namespace App\Models\Android;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipes_app extends Model
{
    use HasFactory;

    protected $table = 'android_recipe';

    protected $fillable = [
        'name',
        'description',
        'category',
        'level',
        'steps',
        'ingredients',
    ];
}
