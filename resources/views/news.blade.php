@extends('layouts.root')

@section('title', 'News - CADEXSA')

@section('content')
    @include('partials.page-content-title', ['header' => 'News'])
    <div class="container py-12 space-y-6">
        @if ($news->count() !== 0)
            @include('partials.filter', ['criteria' => $filtration_criteria])
            <div class="grid grid-cols-3 gap-6">
                @foreach ($news as $newsArticle)
                    <div class="col-span-3 lg:col-span-1">
                        @include('partials.news-article', ['newsArticle' => $newsArticle])
                    </div>
                @endforeach
            </div>
            {{ $news->links() }}
        @else
            <div class="py-24 flex flex-col justify-center items-center gap-y-4">
                <img src="/images/graphics/news.png" class="h-20">
                <h2>There are no news articles</h2>
            </div>
        @endif
    </div>
@endsection
