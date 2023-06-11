@extends('layouts.root')

@section('title', 'Create a news article - CADEXSA')

@section('content')
    @include('partials.page-content-title', ['header' => 'News'])
    <div class="container my-12">
        <form action="{{ route('news.create') }}" method="post" enctype="multipart/form-data" class="space-y-6">
            @if (session('error'))
                <div class="box error">{{ session('error') }}</div>
            @endif
            <h1 class="text-center">Create a news article</h1>
            <div class="relative col-span-12 sm:col-span-6">
                <label for="title" class="form-label font-[inter-semiBold]">Title</label>
                <input type="text" id="news-article-title" name="title" value="{{ old('title') }}"
                    class="form-input name" required />
            </div>
            <div class="flex flex-col gap-y-6 lg:flex-row lg:justify-between lg:gap-y-0">
                <div><label class="form-label font-[inter-semiBold]">Category</label>
                    <div class="space-x-3">
                        @foreach (App\Enumerations\NewsCategory::cases() as $category)
                            <div class="inline-block">
                                <input type="radio" id="{{ $category->value }}" name="category"
                                    value="{{ $category->value }}" @checked(old('category') == $category->value)>
                                <label for="{{ $category->value }}">{{ $category->name() }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div>
                    <label for="image" class="form-label mb-2 font-[inter-semiBold]">Featuring image</label>
                    <input type="file" name="image" id="image" required>
                    <div class="validation-error">
                        @error('image')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <textarea name="body" id="editor" cols="30" rows="30" required>{{ old('body') }}</textarea>
            @csrf
            <input type="submit" value="Publish" class="button w-full py-3">
        </form>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('editor');
        CKEDITOR.config.height = 500;
    </script>
@endsection
