import { vitePreprocess } from "@sveltejs/vite-plugin-svelte";

export default {
  // Ten jeden wiersz pozwala na używanie <script lang="ts">
  preprocess: vitePreprocess(),
};
