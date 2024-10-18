import { createInertiaApp } from '@inertiajs/react';
import { MantineProvider } from '@mantine/core';
import { LaravelReactI18nProvider } from 'laravel-react-i18n';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { createRoot } from 'react-dom/client';
import '@mantine/core/styles.css';
import '@mantine/notifications/styles.css';
import { Notifications } from '@mantine/notifications';

const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

createInertiaApp({
    id: 'app',
    title: (title) => (title ? `${title} / ${appName}` : appName),
    resolve: (name) =>
        resolvePageComponent(
            `./pages/${name}.jsx`,
            import.meta.glob('./pages/**/*.jsx')
        ),
    setup({ el, App, props }) {
        createRoot(el).render(
            <MantineProvider>
                <LaravelReactI18nProvider
                    locale={'ms_MY'}
                    fallbackLocale={'en'}
                    files={import.meta.glob('/lang/*.json')}
                >
                    <App {...props} />
                    <Notifications />
                </LaravelReactI18nProvider>
            </MantineProvider>
        );
    },
});