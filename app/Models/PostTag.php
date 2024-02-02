<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PostTag extends Pivot
{
    use HasFactory;

    public function post():BelongsTo
    {
        return $this->belongsTo(Post::class);
    } public function tag():BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
