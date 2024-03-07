<?php

namespace App\Models\Auth;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auth\Category;
use Maize\Markable\Markable;
use Maize\Markable\Models\Like;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Maize\Markable\Models\Mark;
class Recipe extends Model
{
    use HasFactory;
    use Markable;

    protected $table = 'recipe';

    protected $fillable =
    [
        'level_id',
        'category_id',
        'recipe_name',
        'recipe_description',
        'recipe_image',
        'link',
        'user_id'

    ];
    protected $primaryKey = 'id';

    //funtions

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }
    public function author()
    {
        return $this->belongsTo(User::class);
    }
    public function category() {
        return $this->belongsTo(Category::class,'category_id');
    }
    public function level()
    {
        return $this->belongsTo(Level::class,'level_id');
    }
    public function steps()
    {
        return $this->hasMany(Step::class,'recipe_id');
    }

    public function ingredients()
    {
        return $this->hasMany(Ingredient::class,'recipe_id');
    }

    //likes
    public function isLikedBy(User $user)
    {
        return $this->likes()->where('user_id', $user->id)->exists();
    }

    public function likes(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'likes', 'recipe_id', 'user_id');
    }

    public function like(User $user)
    {
        if (!$this->isLikedBy($user)) {
            $this->likes()->attach($user->id);
            $this->increment('likes');
        }
    }

    public function unlike(User $user)
    {
        if ($this->isLikedBy($user)) {
            $this->likes()->detach($user->id);
            $this->decrement('likes');
        }
    }

    public function likesCount()
    {
        return $this->likes()->count();
    }

}
