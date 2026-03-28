/** @type {import('tailwindcss').Config} */
module.exports = {
  prefix: "tw-",
  content: ["./index.html", "./src/**/*.{svelte,js,ts,jsx,tsx}"],
  theme: {
    extend: {
      colors: {
        "nc-primary": "var(--color-primary)",
        "nc-bg": "var(--color-main-background)",
      },
    },
  },
  plugins: [],
};
