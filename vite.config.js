import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs'
import path from 'path';

const themeConfigPath = path.resolve(__dirname, 'bootstrap/cache/theme.json')
let themeInputs = []
let assetsConfig = {};

if (fs.existsSync(themeConfigPath)) {
    const theme = JSON.parse(fs.readFileSync(themeConfigPath, 'utf8'))
    themeInputs = [...(theme.scss || []), ...(theme.css || []), ...(theme.js || [])]
    assetsConfig = theme.assets || {};
}

// Funkcia na kopírovanie súborov
function copyDirectory(src, dest) {
    if (!fs.existsSync(src)) return;

    if (!fs.existsSync(dest)) {
        fs.mkdirSync(dest, { recursive: true });
    }

    const entries = fs.readdirSync(src, { withFileTypes: true });

    for (let entry of entries) {
        const srcPath = path.join(src, entry.name);
        const destPath = path.join(dest, entry.name);

        if (entry.isDirectory()) {
            copyDirectory(srcPath, destPath);
        } else {
            fs.copyFileSync(srcPath, destPath);
        }
    }
}

// Kopírovanie assets namiesto symbolického linku
if (assetsConfig.source && assetsConfig.target) {
    const sourcePath = path.resolve(__dirname, assetsConfig.source);
    const targetPath = path.resolve(__dirname, assetsConfig.target);

    if (fs.existsSync(sourcePath)) {
        try {
            // Odstránenie existujúcého adresára
            if (fs.existsSync(targetPath)) {
                fs.rmSync(targetPath, { recursive: true, force: true });
            }

            // Kopírovanie súborov
            copyDirectory(sourcePath, targetPath);
            console.log(`Assets skopírované: ${sourcePath} -> ${targetPath}`);
        } catch (error) {
            console.warn(`Nepodarilo sa skopírovať assets: ${error.message}`);
        }
    }
}

export default defineConfig({
    server: {
        host: 'multi-auth.test', // nastavíš host na svoju doménu
        // port: 80, // alebo akýkoľvek port chceš použiť
        hmr: {
            host: 'multi-auth.test', // HMR tiež musí vedieť o doméne
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',

                'resources/sass/admin.scss',
                'resources/js/admin.js',

                ...themeInputs,
            ],
            refresh: true,
        }),
    ],
    css: {
        preprocessorOptions: {
            scss: {
                silenceDeprecations: [
                    'import',
                    'mixed-decls',
                    'color-functions',
                    'global-builtin',
                ],
            },
        },
    },
});
