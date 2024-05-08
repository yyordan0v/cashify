import {defineConfig} from 'vite';
import laravel from 'laravel-vite-plugin';

import.meta.glob([
    '../images/**'
]);

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
