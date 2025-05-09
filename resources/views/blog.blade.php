<x-layout>
    <x-slot:title>
        Blog
    </x-slot:title>

    <x-slot:resources>
        @vite('resources/css/blog.css')
    </x-slot:resources>

    <div class="posts">
        <h1>Posts</h1>
        <ul>
            @foreach ($posts as $post)
                <li>
                    <a href={{ '/blog/' . $post['url'] }}>{{ $post['title'] }}</a>
                    <span class="written">Written: {{ (new DateTime($post['created_at']))->format('jS M Y') }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</x-layout>