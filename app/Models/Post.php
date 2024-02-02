<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title'];
    public function tags():BelongsToMany
    {
        return $this->belongsToMany(Tag::class,'post_tags');
    }
}
