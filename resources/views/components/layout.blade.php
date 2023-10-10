<!DOCTYPE html>
<html lang="en" class="dark">
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
    </head>
    <body class="scrollbar-thin bg-neutral-100 dark:bg-neutral-800 dark:scrollbar-thumb-neutral-700 scrollbar-thumb-neutral-300 dark:text-zinc-200">
        <div class="grid h-screen drop-shadow-sm">
            <header class="self-start font-light text-xl dark:bg-stone-800 p-4 dark:border-neutral-600 border-b mb-6 flex justify-center">
                <div class="space-x-8">
                    <a class="header-link" href="/">Home</a>
                    <a class="header-link" href="/projects">Projects</a>
                    <a class="header-link" href="/favoriteartists">Favorite artists</a>
                </div>
            </header>
            <div class="lg:px-72 px-2 grid justify-center">
                {{ $slot }}
            </div>
            <footer id="pageFooter" class="self-end dark:font-light text-xs text-center pb-3 pt-16 dark:text-neutral-300 grid justify-center">
                <noscript class="font-bold block">
                    Seems like you have no Javascript enabled... most of the website will still work but the features
                    below won't
                </noscript>
                <div class="space-x-4">
                    <a class="footer-link" href="javascript:void(0)" id="backTopLink">Back to Top</a>
                    <a class="footer-link" href="javascript:void(0)" id="colorSwitcher">Switch to Light Mode</a>
                </div>
            </footer>
            @vite('resources/js/footer.js')
        </div>
    </body>
</html>
