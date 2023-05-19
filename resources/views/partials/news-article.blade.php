<article class="news-article">
    <div class="h-[25rem] overflow-hidden rounded-2xl">
        <img src="{{ Storage::url($newsArticle->image) }}" class="h-full w-full object-cover transition">
    </div>
    <div
        class="relative z-10 mx-6 -mt-20 flex min-h-[11rem] flex-col justify-center gap-y-2 rounded-md bg-white py-6 px-8 shadow-[0_0_1.5rem_rgb(0,0,0,0.2)]">
        <span class="text-blue-500">{{ $newsArticle->created_at->format('d F Y') }}</span>
        <div class="flex flex-col gap-y-1">
            <h3 class="leading-tight">
                <a href="{{ route('news_article', ['newsArticle' => $newsArticle->id]) }}">
                    {{ $newsArticle->title }}
                </a>
            </h3>
            <span class="text-sm capitalize text-blue-500">{{ $newsArticle->category }}</span>
        </div>
        <a href="{{ route('news_article', ['newsArticle' => $newsArticle->id]) }}"
            class="block text-right text-blue-500">
            Read more
        </a>
    </div>
</article>
