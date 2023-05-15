<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Photo;
use App\Models\Testimonial;

class AboutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('about-us', [
            'member_count' => User::count(),
            'event_count' => Event::count(),
            'photo_count' => Photo::count(),
            'testimonials' => Testimonial::all()
        ]);
    }
}
