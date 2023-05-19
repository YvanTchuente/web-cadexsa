@extends('layouts.root')

@section('title', $newsArticle->title . ' CADEXSA')

@section('content')
    @include('partials.page-content-title', ['header' => 'News'])
    <div class="container grid grid-cols-12 gap-y-10 py-12 lg:gap-x-16">
        <section class="col-span-12 flex flex-col gap-y-6 md:col-span-8">
            <header>
                <h1 class="mb-2 text-center text-4xl sm:text-left">{{ $newsArticle->title }}</h1>
                <div class="flex flex-col items-center gap-y-2 sm:flex-row sm:gap-y-0 sm:gap-x-4">
                    <div class="flex items-center gap-x-2">
                        <img src="{{ $newsArticle->author->avatar }}" alt="article_author" class="h-12 w-12 rounded-[50%]" />
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
            <div class="w-fit bg-blue-500 py-2 px-4 text-white">
                <a href="{{ route('news', ['category' => strtolower($newsArticle->category->name())]) }}">
                    {{ $newsArticle->category->name() }}
                </a>
            </div>
        </section>
        <aside class="col-span-12 flex flex-col gap-y-6 md:col-span-4">
            <section>
                <h3 class="mb-4 text-center lg:text-left">Categories</h3>
                <ul class="w-full rounded-md bg-blue-600 px-6 py-4 pl-8 text-white">
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
                    <h3 class="mb-4 text-center lg:text-left">Recent articles</h3>
                    <ul class="flex flex-col gap-y-4">
                        @foreach ($recentNews as $newsArticle)
                            <li class="flex items-center gap-x-4">
                                <img src="{{ Storage::url($newsArticle->image) }}" class="h-20 w-20 rounded-lg object-cover">
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
