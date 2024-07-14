<ul class="artist-list">
    @foreach ($artists as $artist)
        <li class="artist">
            <div>{{ $artist->name }}</div>
            @if (!$artist->albums->isEmpty())
                <button class="albums-button">
                    <svg class="albums-svg red-color" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>
                <div class="albums red-background" id="album-list">
                    <h4 class="favorite-albums">Favorite albums:</h4>
                    <ul>
                        @foreach ($artist->albums as $album)
                            <li>{{ $album->album }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </li>
    @endforeach
</ul>