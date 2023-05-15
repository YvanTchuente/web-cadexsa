<div class="grid grid-cols-3 gap-x-4 gap-y-16 pt-10">
    @foreach ($events as $event)
        @include('partials.event', ['event' => $event])
    @endforeach
</div>
