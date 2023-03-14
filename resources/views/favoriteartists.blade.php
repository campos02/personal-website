<x-layout>
    <x-slot:title>
        Favorite Artists
    </x-slot:title>

    <div class="space-y-6 text-center">
        <div class="space-y-2">
            <h3 class="text-xl font-bold">Currently listening to*:</h3>
            <x-artist-list :artists="$listeningArtists" :albumList="$artistsAlbums"/>
        </div>
        <p class="font-bold">And more...</p>
        <div class="space-y-2">
            <h3 class="text-xl font-bold">Some other artists I like*:</h3>
            <x-artist-list :artists="$otherArtists" :albumList="$artistsAlbums"/>
        </div>
        <p class= "font-bold">*Not always up to date</p>
    </div>
</x-layout>