import { defineConfig } from "vite";
import { svelte } from "@sveltejs/vite-plugin-svelte";

export default defineConfig({
  plugins: [svelte()],
  build: {
    outDir: "js",
    lib: {
      entry: "src/main.ts",
      formats: ["iife"],
      name: "MySvelteApp",
      fileName: "bundle",
    },
    rollupOptions: {
      output: {
        entryFileNames: `bundle.js`,
        chunkFileNames: `[name].js`,
        assetFileNames: `[name].[ext]`,
      },
    },
  },
});
