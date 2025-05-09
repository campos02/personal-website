<x-layout>
    <x-slot:title>
        {{ $post['title'] }}
    </x-slot:title>

    <x-slot:resources>
        @vite('resources/css/blogpost.css')
    </x-slot:resources>

    <div class="post">
        <h1>{{ $post['title'] }}</h1>
        <span class="written">Written: {{ (new DateTime($post['created_at']))->format('jS M Y') }}</span>
        @markdown($post['content'])
    </div>
</x-layout>