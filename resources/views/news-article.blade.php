@extends('layouts.root')

@section('title', $newsArticle->title . ' CADEXSA')

@section('content')
    @include('partials.page-content-title', ['header' => 'News'])
    <div class="container py-12 grid grid-cols-12 lg:gap-x-16 gap-y-10">
        <section class="col-span-12 md:col-span-8 flex flex-col gap-y-6">
            <header>
                <h1 class="text-4xl text-center sm:text-left mb-2">{{ $newsArticle->title }}</h1>
                <div class="flex flex-col items-center sm:flex-row gap-y-2 sm:gap-y-0 sm:gap-x-4">
                    <div class="flex items-center gap-x-2">
                        <img src="{{ $newsArticle->author->avatar }}" alt="article_author" class="w-12 h-12 rounded-[50%]" />
                        <a href="#" target="_blank">
                            {{ ucwords(strtolower($newsArticle->author->fullname())) }}
                        </a>
                    </div>
                    <div class="flex items-center gap-x-2"><i
                            class="fa-solid fa-calendar-day"></i><span>{{ $newsArticle->created_at->format('l, j F Y') }}</span>
                    </div>
                    <div class="flex items-center gap-x-2"><i
                            class="fa-solid fa-clock"></i><span>{{ $newsArticle->created_at->format('g:i a') }}</span>
                    </div>
                </div>
            </header>
            <figure class="sm:max-h-[25rem]">
                <img src="{{ Storage::url($newsArticle->image) }}" class="h-full w-full object-cover">
            </figure>
            <div class="space-y-4 text-justify">
                {!! $newsArticle->body !!}
            </div>
            <div class="w-fit py-2 px-4 bg-blue-500 text-white">
                <a href="{{ route('news', ['category' => strtolower($newsArticle->category->name())]) }}">
                    {{ $newsArticle->category->name() }}
                </a>
            </div>
        </section>
        <aside class="col-span-12 md:col-span-4 flex flex-col gap-y-6">
            <section>
                <h3 class="text-center lg:text-left mb-4">Categories</h3>
                <ul class="w-full px-6 pl-8 py-4 bg-blue-600 text-white rounded-md">
                    @foreach ($categories as $category)
                        <li class="py-2">
                            <i class="fa-solid fa-angle-right mr-4"></i>
                            <a href="{{ route('news', ['category' => strtolower($category)]) }}">{{ $category }}</a>
                        </li>
                    @endforeach
                </ul>
            </section>
            @isset($recentNews)
                <section>
                    <h3 class="text-center lg:text-left mb-4">Recent articles</h3>
                    <ul class="flex flex-col gap-y-4">
                        @foreach ($recentNews as $newsArticle)
                            <li class="flex items-center gap-x-4">
                                <img src="{{ Storage::url($newsArticle->image) }}" class="w-20 h-20 object-cover rounded-lg">
                                <div class="flex flex-col gap-y-1">
                                    <a href="{{ route('news_article', ['newsArticle' => $newsArticle->id]) }}"
                                        class="font-[inter-bold]">
                                        {{ $newsArticle->title }}
                                    </a>
                                    <span>{{ $newsArticle->created_at->format('d F Y') }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </section>
            @endisset
        </aside>
    </div>
@endsection
