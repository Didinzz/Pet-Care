import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        tailwindcss({
            config: {
                theme: {
                    extend: {
                        colors: {
                            primary: '#4B9D9C',
                            secondary: '#E5F0F0',
                            'primary-dark': '#3A7C7B',
                        }
                    }
                }
            }
        }),
    ],
});

