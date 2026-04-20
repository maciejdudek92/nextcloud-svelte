// import { defineConfig } from "vite";
// import { svelte } from "@sveltejs/vite-plugin-svelte";

// export default defineConfig({
//   plugins: [svelte()],
//   build: {
//     outDir: "js",
//     lib: {
//       entry: "src/main.ts",
//       formats: ["iife"],
//       name: "MySvelteApp",
//       fileName: "bundle",
//     },
//     rollupOptions: {
//       output: {
//         entryFileNames: `bundle.js`,
//         chunkFileNames: `[name].js`,
//         assetFileNames: `[name].[ext]`,
//       },
//     },
//   },
// });

import { defineConfig } from "vite";
import { svelte } from "@sveltejs/vite-plugin-svelte";
import { resolve } from "path";

export default defineConfig({
    plugins: [svelte()],
    define: {
        "process.env": {},
        __VUE_OPTIONS_API__: true,
        __VUE_PROD_DEVTOOLS__: false,
        __VUE_PROD_HYDRATION_MISMATCH_DETAILS__: false,
        appName: JSON.stringify("TODO_BOILERPLATE"),
        appVersion: JSON.stringify("1.0.0"),
    },
    resolve: {
        alias: {
            // FORCE absolute path to the bundler version of Vue.
            // This is required for "import Vue" to work correctly.
            vue: resolve(__dirname, "node_modules/vue/dist/vue.esm-bundler.js"),
        },
        dedupe: ["vue"],
    },
    build: {
        // Fix: Build to 'dist' to avoid "outDir must not be root" warning
        outDir: "dist",
        emptyOutDir: true,

        lib: {
            entry: resolve(__dirname, "src/main.js"),
            name: "todo_boilerplate",
            formats: ["iife"],
            fileName: (format) => "js/main.js",
        },

        rollupOptions: {
            output: {
                assetFileNames: (assetInfo) => {
                    if (assetInfo.name && assetInfo.name.endsWith(".css")) {
                        return "css/style.css";
                    }
                    return "css/[name][extname]";
                },
                // globals: {
                //   vue: 'Vue',
                // },
            },
        },
    },
});
