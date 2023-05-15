<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Photo;
use App\Models\NewsArticle;
use App\Models\Testimonial;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $news = NewsArticle::latest()->take(3)->get();

        $testimonials = Testimonial::latest()->take(3)->get();

        return view('home', [
            'member_count' => User::count(),
            'event_count' => Event::count(),
            'photo_count' => Photo::count(),
            'news' => $news,
            'testimonials' => $testimonials
        ]);
    }
}
