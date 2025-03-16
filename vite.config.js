import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0',  // Allows access from other devices
        port: 5173,  // Change to your preferred port
        strictPort: true,
        hmr: {
            host: '192.168.1.22',  // Replace with your actual IP
        },
    },
});
