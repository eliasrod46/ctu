import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';


export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
            resolve: {
                alias: {
                  // Puedes agregar alias para los componentes de WireUI aquí
                  'wireui': 'wireui/dist/wireui.esm-bundler.js',
                },
              },
        }),
    ],
});
