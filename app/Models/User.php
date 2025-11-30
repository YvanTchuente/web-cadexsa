<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Laravel\Sanctum\HasApiTokens;
use App\Enumerations\FieldOfStudy;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use TaylorNetwork\UsernameGenerator\GeneratesUsernames;
use TaylorNetwork\UsernameGenerator\FindSimilarUsernames;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, FindSimilarUsernames, GeneratesUsernames;

    const CREATED_AT = 'registered_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'password',
        'email',
        'firstname',
        'lastname',
        'batch',
        'field_of_study',
        'country',
        'city',
        'phone',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'field_of_study' => FieldOfStudy::class
    ];

    /**
     * Get the full name of the user.
     */
    public function fullname()
    {
        return $this->firstname . " " . $this->lastname;
    }

    public function getField(): string
    {
        return $this->fullname();
    }

    /**
     * Get the news articles authored by the user.
     */
    public function newsArticles()
    {
        return $this->hasMany(NewsArticle::class, 'author_id');
    }
}
