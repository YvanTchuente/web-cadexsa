    @php
        $path = substr(request()->path(), 0, 1) !== '/' ? '/' . request()->path() : request()->path();
        $links = [['Home', '/'], ['About Us', '/about'], ['News', '/news'], ['Events', '/events'], ['Contact Us', '/contactus']];

        if (!auth()->check()) {
            $links[] = ['Log In', route('login')];
            $links[] = ['Join Us', route('signup')];
        }
    @endphp
    @foreach ($links as $link)
        <li class="block border-t-[1px] border-t-gray-200 py-4">
            <a href="{{ $link[1] }}"
                class="@if (preg_match('/^' . preg_quote($link[1], '/') . '(\/.+)?$/', $path)) text-blue-500 @else sm:hover:text-blue-500 @endif block font-[inter-semibold] text-base">{{ $link[0] }}</a>
        </li>
    @endforeach
