<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function posts():BelongsToMany
    {
        return $this->belongsToMany(Post::class,'post_tags');
    }
}
