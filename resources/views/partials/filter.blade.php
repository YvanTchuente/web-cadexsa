<div class="relative text-center">
    <form action="{{ url()->current() }}"
        class="filter flex flex-col sm:flex-row justify-center gap-y-2 sm:gap-y-0 sm:gap-x-3">
        @foreach ($criteria as $criterion)
            <div class="filtration_criterion relative cursor-pointer w-full sm:w-[10rem]">
                <div
                    class="select relative w-full text-blue-700 bg-white uppercase py-2 pl-6 pr-12 border-2 border-blue-500 rounded-md after:content-[''] after:block after:absolute after:inset-y-[35%] after:right-4 after:w-[10px] after:h-[10px] after:border-b-4 after:border-b-blue-700 after:border-r-4 after:border-r-blue-700 after:rotate-45 after:transition duration-300">
                    {{ $criterion['name'] }}
                </div>
                <ul
                    class="dropdown w-full top-[150%] left-0 shadow-[0_0_0.5rem_rgba(0,0,0,0.2)] rounded-md overflow-hidden transition">
                    <li
                        class="py-2 px-6 capitalize hover:text-white hover:bg-blue-500 text-white bg-blue-500 transition">
                        {{ $criterion['name'] }}
                    </li>
                    @foreach ($criterion['options'] as $option)
                        <li class="py-2 px-6 capitalize hover:text-white hover:bg-blue-500 transition">
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
