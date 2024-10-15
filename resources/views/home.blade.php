<x-layout>
    <x-slot:resources>
        @vite('resources/css/home.css')
    </x-slot:resources>

    <div class="introduction centered-text">
        <div>Hey, I'm campos and this is my personal website.</div>
        <div>
            <h1>A short bio</h1>
            <div class="short-bio">
                I'm a {{ $age }} year old brazilian interested in programming, electronics and music. I'm also a Computer Science student.
            </div>
        </div>
    </div>
</x-layout>
