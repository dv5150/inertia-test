import { defineConfig } from "vite"
import laravel from "laravel-vite-plugin"
import vue from "@vitejs/plugin-vue"
import fs from "fs"

const host = "inertia.test"

export default defineConfig({
    server: {
        host: "0.0.0.0",
        hmr: { host },
        https: {
            key: fs.readFileSync(`/var/certs/inertia.test-key.pem`),
            cert: fs.readFileSync(`/var/certs/inertia.test.pem`),
        },
    },
    plugins: [
        vue(),
        laravel({
            input: ["resources/js/app.js", "resources/css/mail.css"],
            refresh: true,
        }),
    ],
})
