<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of photos.
     */
    public function index(Request $request)
    {
        $photos = Photo::paginate(9);

        if ($input = $request->input()) {
            $photos = Photo::query();

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

            $photos = $photos
                ->where('shot_at', '>=', $reference_date->format('Y-m-d H:i:s'))
                ->where('shot_at', '<', $limit_date->format('Y-m-d H:i:s'));

            $photos = $photos->paginate(9);
        }

        return view(
            'gallery',
            [
                'photos' => $photos,
                'filtration_criteria' => [
                    ['name' => 'month', 'options' => array_map('strtolower', cal_info(CAL_GREGORIAN)['months'])],
                    ['name' => 'year', 'options' => range((int) date('Y'), 2019)]
                ]
            ]
        );
    }

    /**
     * Display the specified photo.
     */
    public function show(Photo $photo)
    {
        return view('photo', ['photo' => $photo]);
    }
}
