<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    use HasFactory;

    protected $table = 'ingredients';
    protected $fillable = [
        'id',
        'ingredient_name',
        'quantity',
        'unitMeasurement',
        'recipe_id'
    ];

    protected $guarded = [];
}
