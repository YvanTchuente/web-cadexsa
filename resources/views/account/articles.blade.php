@extends('layouts.account')

@section('page')
    @if ($user->newsArticles->count() !== 0)
        <div class="grid grid-cols-3 gap-6">
            @foreach ($user->newsArticles as $newsArticle)
                <div class="col-span-3 lg:col-span-1">
                    @include('partials.news-article', ['newsArticle' => $newsArticle])
                </div>
            @endforeach
        </div>
    @else
        <div class="py-12 flex flex-col justify-center items-center gap-y-4">
            <img src="/images/graphics/news.png" class="h-20">
            <h2>There are no news articles</h2>
        </div>
    @endif
@endsection
