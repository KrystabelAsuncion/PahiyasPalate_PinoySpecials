<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';

    protected $primaryKey = 'id';
    protected $fillable = ['category'];
    use HasFactory;

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }

    public function levels()
    {
        return $this->hasMany(Level::class);
    }
}
