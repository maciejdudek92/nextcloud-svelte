import "./app.css"; // Potem Twoje style i @apply
import App from "./App.svelte";
// Mockowanie środowiska Nextcloud dla trybu deweloperskiego (Vite)
if (import.meta.env.DEV) {
    (window as any).OC = {
        linkToRemote: (path: string) => `https://localhost:8080/${path}`,
        generateUrl: (path: string) => path,
        getCurrentUser: () => ({ uid: "admin", displayName: "Developer" }),
    };

    // Opcjonalnie: dodaj klasę na body, by emulować layout NC
    document.body.classList.add("theme--light");
}

const target = document.getElementById("app");
if (target) {
    new App({ target });
}
