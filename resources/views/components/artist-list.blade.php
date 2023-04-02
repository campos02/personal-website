<div>
    <ul class="dark:text-zinc-300 space-y-2">
        @foreach ($artists as $artist)
            <li class="flex justify-center">
                <div>{{ $artist->artist }}</div>
                @if (!$artist->albums->isEmpty())
                    <button class="group grid place-items-end">
                        <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                        <div class="flex justify-center">
                            <div class="scale-0 absolute border rounded p-1 dark:bg-zinc-900 bg-zinc-200 origin-top group-hover:scale-100 transition-all delay-150">
                                <h4 class="font-bold">Favorite albums:</h4>
                                <ul>
                                    @foreach ($artist->albums as $album)
                                        <li>{{ $album->album }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </button>
                @endif
            </li>
        @endforeach
    </ul>
</div>