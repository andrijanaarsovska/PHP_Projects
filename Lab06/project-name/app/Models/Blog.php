<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'blog_id',
        'description',
        'category_id'

    ];

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Blog::class);
    }
}



