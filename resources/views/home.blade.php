@extends('layouts.root')

@section('title', 'Home - CADEXSA')

@section('content')
    <!-- Calls to action section -->
    <section class="relative">
        <div id="call-to-action-carousel" class="carousel h-[550px] xs:h-[calc(100vh-var(--header-height))]">
            <div class="carousel-item bg-cover bg-no-repeat"
                style="background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)), url('/images/network.jpg')">
                <div class="flex h-full items-center justify-center text-white">
                    <div class="flex h-fit flex-col justify-center gap-y-6 text-center lg:w-[50%]">
                        <h1 class="md:text-4xl">Contribute to the growth of the network and its
                            expansion</h1>
                        <p>On top of providing your affection to our alma-mater which
                            is, for many of us, the main reason, your membership consolidates our unity and friendship and
                            affords many advantages like career opportunities</p>
                        <a href="{{ route('signup') }}"
                            class="rounded-button mx-auto w-fit hover:border-white focus:border-white">Join
                            our network</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item bg-cover bg-no-repeat lg:bg-[0_50%]"
                style="background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)), url('/images/about-us.jpg')">
                <div class="flex h-full items-center justify-center text-white">
                    <div class="flex h-fit flex-col justify-center gap-y-6 text-center lg:w-[50%]">
                        <h1 class="md:text-4xl">We are committed to ensure the unity of our members</h1>
                        <p>CADEXSA is an initiative of ex-student from la Cadenelle Anglo Saxon college who
                            agreed and took
                            a decision of creating an association which shall regroup all graduate of the school so as to
                            maintain our friendship</p>
                        <a href="{{ route('about') }}"
                            class="rounded-button mx-auto w-fit hover:border-white focus:border-white">Read
                            About Us</a>
                    </div>
                </div>
            </div>
            <div class="carousel-item bg-cover bg-no-repeat lg:bg-[0_50%]"
                style="background-image:linear-gradient(rgba(0,0,0,0.7),rgba(0,0,0,0.7)), url('/images/donation.jpg')">
                <div class="flex h-full items-center justify-center text-white">
                    <div class="flex h-fit flex-col justify-center gap-y-6 text-center lg:w-[50%]">
                        <h1 class="md:text-4xl">Help us achieve our goals through a donation</h1>
                        <p>We use these donations to finance the projects that grows the association and also assist our
                            alma-mater in many aspects
                            finances included.</p>
                        <a href="#"
                            class="rounded-button mx-auto w-fit hover:border-white focus:border-white">Donate</a>
                    </div>
                </div>
            </div>
        </div>
        @include('partials.carousel-navigation-buttons')
    </section>
    <section class="container py-[60px]">
        <div class="lg:w-[60%]">
            <h1 class="md:text-4xl">Our Purpose of Ex-Students Association</h1>
            <p class="my-5 text-justify lg:text-left">The purpose of our ex-students association is to re-unite all the
                ex-students
                from all the
                various batches that had graduated from our Alma-Mater, so we support each others through the upcoming
                challenges of our professional careers and life.</p>
        </div>
        <div class="grid grid-cols-12 gap-y-8 sm:gap-x-8">
            <div class="col-span-12 flex flex-col items-center gap-y-4 sm:col-span-6 lg:col-span-4">
                <img src="/images/graphics/mission.png" class="h-[60px]" />
                <h2>Mission</h2>
                <p class="text-justify">At multiple occasions, we organise and organize visits to our alma-mater during
                    which we
                    share our experience with
                    the students and advice them on academic success.</p>
            </div>
            <div class="col-span-12 flex flex-col items-center gap-y-4 sm:col-span-6 lg:col-span-4">
                <img src="/images/graphics/eye.svg" class="h-[60px]" />
                <h2>Vision</h2>
                <p class="text-justify">CADEXSA aims primarily to bring together and unite all the graduates of our
                    alma-mater
                    so to initiate and
                    preserve friendship and unity for as long as possible.</p>
            </div>
            <div class="col-span-12 flex flex-col items-center gap-y-4 sm:col-span-6 lg:col-span-4">
                <img src="/images/graphics/dartboard.png" class="h-[60px]" />
                <h2>Objectives</h2>
                <p class="text-justify">The objectives of CADEXSA in a long-run is to create job opportunities for its
                    member
                    and provide support to
                    our alma-mater in all the aspects that it entails.</p>
            </div>
        </div>
    </section>
    <!-- Features section -->
    <section class="bg-[#D0D0DE] py-[3.75rem]">
        <div class="container">
            <h1 class="mb-12 text-center md:text-4xl">Our Occupations</h1>
            <div class="grid grid-cols-12 gap-y-6 sm:gap-x-8">
                <div class="col-span-12 sm:col-span-6 lg:col-span-3">
                    <img src="/images/graphics/scholars.png" class="mx-auto mb-4 w-[30%] md:w-[45%]" />
                    <h2 class="mb-2 text-center">Promote Excellence</h2>
                    <p class="text-justify">We encourage current students and members to achieve excellence, being their
                        best in their studies,
                        professional careers and personal lives to make our network reach greater heights in the foreseeable
                        future.</p>
                </div>
                <div class="col-span-12 sm:col-span-6 lg:col-span-3">
                    <img src="/images/graphics/student.png" class="mx-auto mb-4 w-[30%] md:w-[45%]" />
                    <h2 class="mb-2 text-center">Help Current Students</h2>
                    <p class="text-justify">Our aim is to provide assistance to students of our alma-mater. Every year, we
                        organize mentorship
                        sessions where volunteered ex-students provide academic support and guidance to students.</p>
                </div>
                <div class="col-span-12 sm:col-span-6 lg:col-span-3">
                    <img src="/images/graphics/school.png" class="mx-auto mb-4 w-[30%] md:w-[45%]" />
                    <h2 class="mb-2 text-center">Support our High School</h2>
                    <p class="text-justify">As being one of our missions, we are committed to provide support to our
                        alma-mater by various means.
                        We yearly provision our alma-mater with school essentials among other things we provide to support.
                    </p>
                </div>
                <div class="col-span-12 sm:col-span-6 lg:col-span-3">
                    <img src="/images/graphics/community.png" class="mx-auto mb-4 w-[30%] md:w-[45%]" />
                    <h2 class="mb-2 text-center">Building our network</h2>
                    <p class="text-justify">Networking being an important factor of our unity, we aim at staying in touch
                        with each other to
                        share our experiences in life and knowledge. We do organize several meetings and meetups each years
                        for this purpose.</p>
                </div>
            </div>
        </div>
    </section>
    @if ($events->count() !== 0)
        <section class="relative py-[3.75rem]">
            <div class="container">
                <h1 class="mb-12 text-center md:text-4xl">Upcoming Events</h1>
                @include('partials.event-list', ['events' => $events])
            </div>
        </section>
    @endif
    @include('partials.informative-numbers')
    @if ($news->count() !== 0)
        <section class="py-[3.75rem]">
            <div class="container">
                <h1 class="mb-12 text-center md:text-4xl">Recent News</h1>
                <div class="grid grid-cols-3 gap-6">
                    @foreach ($news as $newsArticle)
                        <div class="col-span-3 lg:col-span-1">
                            @include('partials.news-article', ['newsArticle' => $newsArticle])
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @if ($testimonials->count() !== 0)
        @include('partials.testimonials', ['testimonials' => $testimonials])
    @endif
@endsection

@section('scripts')
    <script>
        const header_height = getComputedStyle(
            document.querySelector("header")
        ).getPropertyValue("height");
        document.querySelector("#call-to-action-carousel").style.setProperty("--header-height", header_height);
    </script>
@endsection
