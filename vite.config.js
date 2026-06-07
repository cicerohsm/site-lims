import { defineConfig, loadEnv } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig(({ mode }) => {
    const env = loadEnv(mode, process.cwd(), '');
    const port = Number(env.VITE_DEV_SERVER_PORT || 5173);

    return {
        plugins: [
            laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],
                refresh: true,
            }),
            tailwindcss(),
        ],
        server: {
            host: env.VITE_DEV_SERVER_HOST || '0.0.0.0',
            port,
            strictPort: true,
            hmr: {
                host: env.VITE_HMR_HOST || 'localhost',
                protocol: env.VITE_HMR_PROTOCOL || 'ws',
                port,
            },
            watch: {
                ignored: ['**/storage/framework/views/**'],
            },
        },
    };
});
