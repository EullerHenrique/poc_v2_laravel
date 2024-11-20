import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/layout.css',
                'resources/sass/layout.scss',
                'resources/js/app.js'
            ],
            refresh: true,
        }),
    ],
});
