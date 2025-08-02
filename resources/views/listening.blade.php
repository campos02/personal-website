<x-layout>
    <x-slot:title>
        Currently listening...
    </x-slot:title>

    <x-slot:description>
        Artists I'm currently listening to
    </x-slot:description>

    <x-slot:resources>
        @vite('resources/css/artists.css')
    </x-slot:resources>

    <div class="artists centered-text">
        <h3>Currently listening to*:</h3>
        <x-artist-list :artists="$listeningArtists"/>
        <h3>Some other artists I like*:</h3>
        <x-artist-list :artists="$otherArtists"/>
        <h4>*Not always up to date</h4>
    </div>
    @vite('resources/js/albums.js')
</x-layout>