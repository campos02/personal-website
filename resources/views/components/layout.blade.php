<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'campos\' website' }}</title>
        <meta name="description" content="My personal website">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://campos02.me/">
        <meta property="og:title" content="campos' website">
        <meta property="og:description" content="My personal website">
        @vite('resources/css/app.css')
        @vite('resources/css/fonts.css')
        {{ $resources ?? ''}}
    </head>
    <body>
        <div class="wrapper" id="vhWrapper">
            <nav class="centered-text actions">
                <a class="home-link" href="/">Home</a>
                <div class="pages">
                    <a href="/about">About me</a>
                    <a href="/projects">Projects</a>
                    <a href="/listening">Listening</a>
                </div>
            </nav>
            <main class="main-content">
                {{ $slot }}
            </main>
            <footer class="centered-text">
                <noscript>
                    Looks like Javascript is not enabled... most of the website will still work but some features will be missing.
                </noscript>
                <div class="actions footer-links">
                    <a href="javascript:void(0)" id="backTopLink">Back to Top</a>
                </div>
            </footer>
            @vite('resources/js/footer.js')
        </div>
    </body>
</html>
