import {createInertiaApp} from '@inertiajs/react'
import {createRoot} from 'react-dom/client'
import {StrictMode} from "react";

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.tsx', {eager: true})
        return pages[`./Pages/${name}.tsx`]
    },
    setup({el, App, props}) {
        createRoot(el).render(
            <StrictMode>
                <App {...props} />
            </StrictMode>
        )
    },
    progress: {
        color: '#FF9900',
    },
})
