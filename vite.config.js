import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/home.css',
                'resources/css/pfp-builder.css',
                'resources/js/app.js',
                'resources/js/pfp-builder.js',
            ],
            refresh: true,
        }),
    ],
});
