<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuestName extends Model
{
    use HasFactory;
    protected $table = 'guest_names';
    protected $fillable = ['guest'];
    protected $guarded =[];
}
