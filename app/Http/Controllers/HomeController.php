<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
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

        $events = Event::where('status', '0')->latest()->take(3)->get();

        $testimonials = Testimonial::latest()->take(3)->get();

        return view('home', [
            'member_count' => User::count(),
            'event_count' => Event::count(),
            'news' => $news,
            'events' => $events,
            'testimonials' => $testimonials
        ]);
    }
}
