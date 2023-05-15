    @php
        $path = substr(request()->path(), 0, 1) !== '/' ? '/' . request()->path() : request()->path();
    @endphp
    @foreach ([['Home', '/'], ['About Us', '/about'], ['News', '/news'], ['Events', '/events'], ['Gallery', '#'], ['Contact Us', '#']] as $link)
        <li class="inline-block py-2 px-5 text-center">
            <a href="{{ $link[1] }}"
                class="block font-[inter-semibold] @if (preg_match('/^' . preg_quote($link[1], '/') . '(\/.+)?$/', $path)) text-blue-500 @else sm:hover:text-blue-500 @endif">
                {{ $link[0] }}
            </a>
        </li>
    @endforeach
