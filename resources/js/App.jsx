import { createInertiaApp } from "@inertiajs/react";
import { LaravelReactI18nProvider } from "laravel-react-i18n";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { createRoot } from "react-dom/client";

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    id: "app",
    title: (title) => (title ? `${title} / ${appName}` : appName),
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.jsx`,
            import.meta.glob("./Pages/**/*.jsx")
        ),
    setup({ el, App, props }) {
        createRoot(el).render(
            <LaravelReactI18nProvider
                locale={"ms_MY"}
                fallbackLocale={"en"}
                files={import.meta.glob("/lang/*.json")}
            >
                <App {...props} />
            </LaravelReactI18nProvider>
        );
    },
    progress: {},
});
