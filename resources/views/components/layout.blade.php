<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title ?? 'campos\' website' }}</title>
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <meta name="description" content="My personal website">
        <meta property="og:type" content="website">
        <meta property="og:url" content="https://campos02.me/">
        <meta property="og:title" content="campos' website">
        <meta property="og:description" content="My personal website">
        @vite('resources/css/app.css')
        @vite('resources/css/home.css')
        @vite('resources/css/projects.css')
        @vite('resources/css/artists.css')
    </head>
    <body>
        <div class="wrapper">
            <nav class="centered-text">
                <a class="home-link" href="/">Home</a>
                <div class="pages actions">
                    <a href="/projects">Projects</a>
                    <a href="/listening">Listening</a>
                </div>
            </nav>
            <div class="main-content">
                {{ $slot }}
            </div>
            <footer id="pageFooter">
                <noscript>
                    Seems like you have no Javascript enabled... most of the website will still work but you will be missing some features.
                </noscript>
                <div class="actions footer-links">
                    <a href="javascript:void(0)" id="backTopLink">Back to Top</a>
                </div>
            </footer>
            @vite('resources/js/footer.js')
        </div>
    </body>
</html>
