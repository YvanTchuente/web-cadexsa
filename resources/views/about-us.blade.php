@extends('layouts.root')

@section('title', 'About Us - CADEXSA')

@section('content')
    @include('partials.page-content-title', ['header' => 'About Us'])
    <main class="container my-12 grid grid-cols-12 gap-y-5 lg:gap-x-12">
        <article class="col-span-12 lg:col-span-8 space-y-6 text-justify">
            <div id="introduction">
                <p>The Cadenelle Ex-student Association (CADEXSA) is an initiative of the ex-students of the 2019 batch of
                    the <span class='font-[inter-semiBold]'>La Cadenelle Anglo Saxon
                        College</span> situated at pk 10, Douala Bassa after the Ndokoti Junction. They agreed and took a
                    decision of creating an association which shall regroup all the graduates of the school, so as to
                    maintain the friendship and unity that we cherish the most and commemorate our high school studies with
                    hearts full of emotions. CADEXSA's first seat was on the 15th of September 2019 and took place in
                    Douala.</p>
            </div>
            <div id="mission">
                <h2 class="text-center lg:text-left mb-4">Our Mission</h2>
                <p>Several times in a school year, we organise and pay visits to our alma-mater during which we share our
                    experience with the current students and advice them on how to succeed their academic year.</p>
            </div>
            <div id="vision">
                <h2 class="text-center lg:text-left mb-4">Our Vision</h2>
                <p>CADEXSA aims primarily to bring together and unite all the graduates of our alma-mater so to initiate and
                    preserve friendship and unity for as long as possible. Alongside this main vision, the association has
                    someother objectives it plans to achieve in the long and short run.
                </p>
                <ul class="my-4 pl-4 space-y-2">
                    <li class="list-disc">Achieve the status of recognized profit-making organization</li>
                    <li class="list-disc">In the short-run, CADEXSA aims at carrying out non-lucrative activities.</li>
                    <li class="list-disc">Promote the welfare of the students and the school.</li>
                    <li class="list-disc">To promote and encourage sustainable living of the members and society</li>
                    <li class="list-disc">Carry out social and cultural activities within and out of our alma-mater.</li>
                    <li class="list-disc">To promote a dialogue and work closely with community leaders and school</li>
                    <li class="list-disc">Preserve our cultures and traditions</li>
                    <li class="list-disc">To promote awareness of and to address issues relating to global warming,
                        pollution and others, pay
                        an entrance serious matter affecting the community</li>
                </ul>
            </div>
            <div id="occupations">
                <h2 class="text-center lg:text-left mb-4">Our Occupations</h2>
                <ul class="space-y-3">
                    <li id="first-occupation">
                        <h3>Promote Excellence</h3>
                        <p>We encourage current students and members to achieve excellence, being their best in their
                            studies, professional careers and personal lives to make our network reach greater heights in
                            the foreseeable future.</p>
                    </li>
                    <li id="second-occupation">
                        <h3>Provide assistance to students of our alma-mater</h3>
                        <p>Our aim is to provide assistance to students of our alma-mater. Every year, we organize
                            mentorship sessions where volunteered ex-students are assigned a group of students to which they
                            provide with academic pieces of advice, academic support and guidance.</p>
                    </li>
                    <li id="third-occupation">
                        <h3>Support our High School</h3>
                        <p>As being one of our missions, we are committed to provide support to our alma-mater by various
                            means. We yearly provision our alma-mater with school essentials among other things we provide
                            to support.</p>
                    </li>
                    <li id="fourth-occupation">
                        <h3>Building our network</h3>
                        <p>Networking being an important factor of our unity, we aim at staying in touch with each other to
                            share our experiences in life and knowledge. We do organize several meetings and meetups each
                            years for this purpose.</p>
                    </li>
                </ul>
            </div>
        </article>
        <aside class="col-span-12 lg:col-span-4">
            <section class="py-6 px-8 rounded-lg border-2 border-gray-300">
                <h3 class="mb-4 text-center lg:text-left">On this page</h3>
                <ul class="space-y-2">
                    <li><a href="#introduction">Introduction</a></li>
                    <li><a href="#mission">Our Mission</a></li>
                    <li><a href="#vision">Our Vision</a></li>
                    <li><a href="#occupations">Our Occupations</a></li>
                    <ul class="ml-4 space-y-2">
                        <li><a href="#first-occupation">Promote Excellence</a></li>
                        <li><a href="#second-occupation">Provide assistance to students of our alma-mater</a></li>
                        <li><a href="#third-occupation">Support our High School</a></li>
                        <li><a href="#fourth-occupation">Building our network</a></li>
                    </ul>
                    <li><a href="#administration">Administration</a></li>
                    <li><a href="#testimonials">Testimonials</a></li>
                </ul>
            </section>
        </aside>
    </main>
    <section class="bg-blue-100" id="administration">
        <div class="container py-14">
            <h1 class="mb-10 text-3xl sm:text-4xl text-center">Our Administration</h1>
            <div class="grid grid-cols-12 sm:gap-x-8 gap-y-8">
                <article
                    class="col-span-12 md:col-span-4 lg:col-span-3 bg-white p-8 space-y-4 rounded-lg shadow-[0_0_1rem_rgba(0,0,0,0.1)]">
                    <img src="/images/admins/president.jpg" alt="president"
                        class="w-[180px] h-[180px] m-auto rounded-full border-[1rem] border-blue-100 object-top">
                    <div class="space-y-1">
                        <h2 class="leading-tight text-blue-500">Basso Landry Boniface</h2>
                        <div class="font-[inter-semiBold]">President</div>
                    </div>
                </article>
                <article
                    class="col-span-12 md:col-span-4 lg:col-span-3 bg-white p-8 space-y-4 rounded-lg shadow-[0_0_1rem_rgba(0,0,0,0.1)]">
                    <img src="/images/admins/vice-president.jpg" alt="vice-president"
                        class="w-[180px] h-[180px] m-auto rounded-full border-[1rem] border-blue-100 object-top">
                    <div class="space-y-1">
                        <h2 class="leading-tight text-blue-500">Mbake Collins Nyama</h2>
                        <div class="font-[inter-semiBold]">Vice-President</div>
                    </div>
                </article>
                <article
                    class="col-span-12 md:col-span-4 lg:col-span-3 bg-white p-8 space-y-4 rounded-lg shadow-[0_0_1rem_rgba(0,0,0,0.1)]">
                    <img src="/images/admins/secretary.jpg" alt="secretary"
                        class="w-[180px] h-[180px] m-auto rounded-full border-[1rem] border-blue-100 object-top">
                    <div class="space-y-1">
                        <h2 class="leading-tight text-blue-500">Sumbele Djamouo Christian Brian</h2>
                        <div class="font-[inter-semiBold]">General Secretary</div>
                    </div>
                </article>
                <article
                    class="col-span-12 md:col-span-4 lg:col-span-3 bg-white p-8 space-y-4 rounded-lg shadow-[0_0_1rem_rgba(0,0,0,0.1)]">
                    <img src="/images/admins/vice-secretary.jpg" alt="assistant secretary"
                        class="w-[180px] h-[180px] m-auto rounded-full border-[1rem] border-blue-100 object-cover mx-auto mb-3">
                    <div class="space-y-1">
                        <h2 class="leading-tight text-blue-500">Mbuih Larissa</h2>
                        <div class="font-[inter-semiBold]">Assistant Secretary</div>
                    </div>
                </article>
                <article
                    class="col-span-12 md:col-span-4 lg:col-span-3 bg-white p-8 space-y-4 rounded-lg shadow-[0_0_1rem_rgba(0,0,0,0.1)]">
                    <img src="/images/admins/financial-secretary.jpg" alt="financial secretary"
                        class="w-[180px] h-[180px] m-auto rounded-full border-[1rem] border-blue-100 mx-auto mb-3">
                    <div class="space-y-1">
                        <h2 class="leading-tight text-blue-500">Nguejio Mbock Maelle</h2>
                        <div>Financial Secretary</div>
                    </div>
                </article>
                <article
                    class="col-span-12 md:col-span-4 lg:col-span-3 bg-white p-8 space-y-4 rounded-lg shadow-[0_0_1rem_rgba(0,0,0,0.1)]">
                    <img src="/images/admins/treasurer.jpg" alt="man-treasurer"
                        class="w-[180px] h-[180px] m-auto rounded-full border-[1rem] border-blue-100 object-top">
                    <div class="space-y-1">
                        <h2 class="leading-tight text-blue-500">Kemne Kuate Axis</h2>
                        <div class="font-[inter-semiBold]">Chief Treasurer</div>
                    </div>
                </article>
                <article
                    class="col-span-12 md:col-span-4 lg:col-span-3 bg-white p-8 space-y-4 rounded-lg shadow-[0_0_1rem_rgba(0,0,0,0.1)]">
                    <img src="/images/admins/assistant-treasurer.jpg" alt="second-treasurer"
                        class="w-[180px] h-[180px] m-auto rounded-full border-[1rem] border-blue-100 object-cover mx-auto mb-3">
                    <div class="space-y-1">
                        <h2 class="leading-tight text-blue-500">Detsop Laeticia</h2>
                        <div class="font-[inter-semiBold]">Assistant Treasurer</div>
                    </div>
                </article>
                <article
                    class="col-span-12 md:col-span-4 lg:col-span-3 bg-white p-8 space-y-4 rounded-lg shadow-[0_0_1rem_rgba(0,0,0,0.1)]">
                    <img src="/images/admins/public-relation-officer.jpg" alt="public-relation-officer"
                        class="w-[180px] h-[180px] m-auto rounded-full border-[1rem] border-blue-100 object-top">
                    <div class="space-y-1">
                        <h2 class="leading-tight text-blue-500">Monjo Eden</h2>
                        <div class="font-[inter-semiBold]">Public Relations Officer</div>
                    </div>
                </article>
            </div>
        </div>
    </section>
    @include('partials.informative-numbers')
    @if ($testimonials->count() !== 0)
        @include('partials.testimonials', ['testimonials' => $testimonials])
    @endif
@endsection
