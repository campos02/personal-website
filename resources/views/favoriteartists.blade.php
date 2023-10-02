<x-layout>
    <x-slot:title>
        Favorite Artists
    </x-slot:title>

    <div class="space-y-6 text-center">
        <div class="space-y-2">
            <h3 class="xl-bold">Currently listening to*:</h3>
            <x-artist-list :artists="$listeningArtists"/>
        </div>
        <p class="font-bold">And more...</p>
        <div class="space-y-2">
            <h3 class="xl-bold">Some other artists I like*:</h3>
            <x-artist-list :artists="$otherArtists"/>
        </div>
        <p class= "font-bold">*Not always up to date</p>
    </div>
</x-layout>