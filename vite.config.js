import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';
import path from 'path';

export default defineConfig({
    resolve: {
        alias: {
            'ziggy-js': path.resolve(__dirname, 'vendor/tightenco/ziggy/dist'),
        }
    },
    plugins: [
        laravel({
            input: [
                "resources/js/app.jsx",
            ],
            refresh: true,
        }),
        react(),
        {
            name: 'blade',
            handleHotUpdate({ file, server }) {
              if (file.endsWith('.blade.php')) {
                server.ws.send({
                  type: 'full-reload',
                  path: '*',
                });
              }
            },
          },
    ],
});