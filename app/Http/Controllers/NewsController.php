<?php

namespace App\Http\Controllers;

use App\Exceptions\Handler;
use App\Models\NewsArticle;
use Illuminate\Http\Request;
use App\Enumerations\NewsCategory;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of news articles.
     */
    public function index(Request $request)
    {
        $news = NewsArticle::paginate(9);

        if ($input = $request->input()) {
            $news = NewsArticle::query();

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
                case (isset($input['month'], $input['year'])):
                    $datetime = "1 " . $input['month'] . " " . $input['year'];
                    $reference_date = new \DateTimeImmutable($datetime);
                    $limit_date = $reference_date->add(\DateInterval::createFromDateString("+1 month"));
                    break;
            }

            if (isset($reference_date, $limit_date)) {
                $news = $news
                    ->where('created_at', '>=', $reference_date->format('Y-m-d H:i:s'))
                    ->where('created_at', '<', $limit_date->format('Y-m-d H:i:s'));
            }
            if (isset($input['category'])) {
                $news = $news->where('category', $input['category']);
            }

            $news = $news->paginate(9);
        }

        $categories = array_map(fn ($category) => strtolower($category->name()), NewsCategory::cases());

        return view(
            'news',
            [
                'news' => $news,
                'filtration_criteria' => [
                    ['name' => 'month', 'options' => array_map('strtolower', cal_info(CAL_GREGORIAN)['months'])],
                    ['name' => 'year', 'options' => range((int) date('Y'), 2019)],
                    ['name' => 'category', 'options' => $categories]
                ]
            ]
        );
    }

    /**
     * Display the specified news article.
     */
    public function show(NewsArticle $newsArticle)
    {
        $recentNews = NewsArticle::where('id', '<>', $newsArticle->id)
            ->latest()->take(5)->get();

        $categories = array_map(fn ($category) => $category->name(), NewsCategory::cases());

        return view('news-article', [
            'newsArticle' => $newsArticle, 'recentNews' => $recentNews, 'categories' => $categories
        ]);
    }

    /**
     * Show the form for creating a new news article.
     */
    public function create()
    {
        return view('create-news-article');
    }

    /**
     * Store a newly created news article in storage.
     */
    public function store(Request $request)
    {
        $input = $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'body' => 'required|string',
            'image' => ['required', File::types(['jpeg', 'jpg'])],
        ]);

        $featuring_image = $input['image'];
        $path_to_image = $featuring_image->store('public/news_articles_images');

        $newsArticle = new NewsArticle([
            'title' => $input['title'],
            'body' => $input['body'],
            'category' => $input['category'],
            'image' => $path_to_image,
            'author_id' => auth()->user()->getAuthIdentifier()
        ]);

        try {
            $newsArticle->saveOrFail();
            return redirect()->route('news_article', ['newsArticle' => $newsArticle->id]);
        } catch (\Throwable $th) {
            app()->get(Handler::class)->report($th);
            Storage::delete($path_to_image);
            return redirect()->route('news.create')->with('error', "Internal error occured, please try again.");
        }
    }
}
