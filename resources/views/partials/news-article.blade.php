<article class="news-article">
    <div class="h-[25rem] rounded-2xl overflow-hidden">
        <img src="{{ Storage::url($newsArticle->image) }}" class="w-full h-full object-cover transition">
    </div>
    <div
        class="relative z-10 mx-6 py-6 px-8 min-h-[11rem] -mt-20 rounded-md bg-white flex flex-col justify-center gap-y-2 shadow-[0_0_1.5rem_rgb(0,0,0,0.2)]">
        <span class="text-blue-500">{{ $newsArticle->created_at->format('d F Y') }}</span>
        <div class="flex flex-col gap-y-1">
            <h3 class="leading-tight">
                <a href="{{ route('news_article', ['newsArticle' => $newsArticle->id]) }}">
                    {{ $newsArticle->title }}
                </a>
            </h3>
            <span class="text-blue-500 text-sm capitalize">{{ $newsArticle->category }}</span>
        </div>
        <a href="{{ route('news_article', ['newsArticle' => $newsArticle->id]) }}"
            class="block text-blue-500 text-right">
            Read more
        </a>
    </div>
</article>
