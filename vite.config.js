import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/home.css',
                'resources/css/projects.css',
                'resources/css/artists.css',
                'resources/js/footer.js',
                'resources/js/albums.js'
            ],
            refresh: true,
        }),
    ],
});
