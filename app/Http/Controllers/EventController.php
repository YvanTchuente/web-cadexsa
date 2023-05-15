<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of events.
     */
    public function index(Request $request)
    {
        $events = Event::where('status', '0')->paginate(6);

        if ($input = $request->input()) {
            $events = Event::query()->where('status', '0');

            switch (true) {
                case (count($input) == 1 && isset($input['year'])):
                    $datetime = "1 january " . $input['year'];
                    $reference_date = new \DateTimeImmutable($datetime);
                    $limit_date = $reference_date->add(\DateInterval::createFromDateString("+1 year"));
                    break;
                case (count($input) == 1 && isset($input['month'])):
                    $datetime = "1 " . $input['month'];
                    $reference_date = new \DateTimeImmutable($datetime);
                    $limit_date = $reference_date->add(\DateInterval::createFromDateString("+1 month"));
                    break;
                default:
                    $datetime = "1 " . $input['month'] . " " . $input['year'];
                    $reference_date = new \DateTimeImmutable($datetime);
                    $limit_date = $reference_date->add(\DateInterval::createFromDateString("+1 month"));
                    break;
            }

            $events = $events
                ->where('occurs_on', '>=', $reference_date->format('Y-m-d H:i:s'))
                ->where('occurs_on', '<', $limit_date->format('Y-m-d H:i:s'));

            $events = $events->paginate(9);
        }

        return view(
            'events',
            [
                'events' => $events,
                'filtration_criteria' => [
                    ['name' => 'month', 'options' => array_map('strtolower', cal_info(CAL_GREGORIAN)['months'])],
                    ['name' => 'year', 'options' => range((int) date('Y'), 2019)]
                ]
            ]
        );
    }

    /**
     * Display the specified event.
     */
    public function show(Event $event)
    {
        $upcomingEvents =
            Event::where('id', '<>', $event->id)
            ->where('status', '=', '0')
            ->orderBy('occurs_on', 'DESC')
            ->take(5)->get();

        return view('event', ['event' => $event, 'upcomingEvents' => $upcomingEvents]);
    }
}
