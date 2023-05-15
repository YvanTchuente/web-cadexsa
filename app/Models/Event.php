<?php

namespace App\Models;

use App\Enumerations\EventStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'venue',
        'occurs_on',
        'ends_on',
        'description',
        'status',
        'image',
    ];

    protected $casts = [
        'occurs_on' => 'datetime',
        'ends_on' => 'datetime',
        'status' => EventStatus::class
    ];
}
