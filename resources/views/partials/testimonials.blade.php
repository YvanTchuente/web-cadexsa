<section class="relative isolate overflow-hidden bg-blue-500 py-20 px-6 lg:px-8" id="testimonials">
    <div class="mx-auto sm:max-w-2xl lg:max-w-4xl">
        <h3 class="text-center text-white">Our Testimonials</h3>
        <h1 class="mb-10 text-center text-white md:text-4xl">What People Say</h1>
        <div class="carousel">
            @foreach ($testimonials as $testimonial)
                <div class="carousel-item px-8">
                    <figure
                        class="w-full space-y-8 overflow-hidden rounded-lg bg-white p-6 shadow-[0_0_1rem_rgba(0,0,0,0.1)] md:p-16">
                        <blockquote class="text-center font-[inter-light] text-xl">
                            <p>“{{ $testimonial->body }}”</p>
                        </blockquote>
                        <figcaption class="flex flex-col items-center justify-center gap-y-4">
                            <img src="{{ $testimonial->author_image }}" class="h-16 w-16 rounded-md" />
                            <div class="flex flex-col items-center justify-center gap-y-1 text-base">
                                <div class="font-[inter-bold]">{{ $testimonial->author }}</div>
                                <div>{{ $testimonial->author_occupation }}</div>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
        </div>
        @include('partials.carousel-navigation-buttons')
    </div>
</section>
