<?php

namespace App\Models\Auth;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $table = 'steps';

    protected $primaryKey = 'id';
    use HasFactory;

    protected $fillable = ['order','instruction','recipe_id'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
