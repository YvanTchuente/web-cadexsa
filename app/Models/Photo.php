<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'path',
        'description',
        'shot_on',
        'author_id'
    ];

    protected $casts = [
        'shot_on' => 'date'
    ];

    /**
     * Get the URL of the photo.
     */
    public function url()
    {
        return Storage::url($this->path);
    }

    /**
     * Get the user who uploaded the photo.
     */
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
