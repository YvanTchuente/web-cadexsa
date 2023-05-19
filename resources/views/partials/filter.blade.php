<div class="relative text-center">
    <form action="{{ url()->current() }}"
        class="flex flex-col justify-center gap-y-2 filter sm:flex-row sm:gap-y-0 sm:gap-x-3">
        @foreach ($criteria as $criterion)
            <div class="filtration_criterion relative w-full cursor-pointer sm:w-[10rem]">
                <div
                    class="select relative w-full rounded-md border-2 border-blue-500 bg-white py-2 pl-6 pr-12 uppercase text-blue-700 duration-300 after:absolute after:inset-y-[35%] after:right-4 after:block after:h-[10px] after:w-[10px] after:rotate-45 after:border-b-4 after:border-r-4 after:border-b-blue-700 after:border-r-blue-700 after:transition after:content-['']">
                    {{ $criterion['name'] }}
                </div>
                <ul
                    class="dropdown-list top-[150%] left-0 w-full overflow-hidden rounded-md shadow-[0_0_0.5rem_rgba(0,0,0,0.2)] transition">
                    <li
                        class="bg-blue-500 py-2 px-6 capitalize text-white transition hover:bg-blue-500 hover:text-white">
                        {{ $criterion['name'] }}
                    </li>
                    @foreach ($criterion['options'] as $option)
                        <li class="py-2 px-6 capitalize transition hover:bg-blue-500 hover:text-white">
                            {{ $option }}
                        </li>
                    @endforeach
                </ul>
                <select class="hidden" name="{{ $criterion['name'] }}">
                    <option value="">
                        {{ $criterion['name'] }}
                    </option>
                    @foreach ($criterion['options'] as $option)
                        <option value="{{ $option }}">{{ $option }}</option>
                    @endforeach
                </select>
            </div>
        @endforeach
        <button type="submit" class="button rounded-md uppercase">
            filter
        </button>
    </form>
</div>
