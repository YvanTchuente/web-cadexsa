<?php

namespace App\Models;

use App\Enumerations\NewsCategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsArticle extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'category',
        'image',
        'author_id',
    ];

    protected $casts = [
        'category' => NewsCategory::class,
    ];

    /**
     * Get the user who authored the news article.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
