<script lang="ts">
    let title: string = "Panel Kontrolny Svelte";
    import { getCurrentUser } from "@nextcloud/auth";
    import { generateUrl } from "@nextcloud/router";

    const user = getCurrentUser();
    const url = generateUrl("/apps/my_app/endpoint");
</script>

<div class="tw-p-6 tw-bg-nc-main tw-min-h-screen">
    <h1
        class="tw-text-3xl tw-font-extrabold tw-text-nc-primary tw-border-b tw-pb-2"
    >
        {title}
    </h1>

    <div class="tw-grid tw-grid-cols-1 md:tw-grid-cols-3 tw-gap-4 tw-mt-6">
        <p>Zalogowany jako: {user}</p>
        <div
            class="tw-bg-white tw-shadow-md tw-rounded-lg tw-p-4 tw-border tw-border-gray-200"
        >
            <h2 class="tw-font-bold tw-text-lg">Statystyki</h2>
            <p class="tw-text-gray-600">Wszystko działa poprawnie.</p>
        </div>

        <button
            class="tw-bg-blue-600 hover:tw-bg-blue-700 tw-text-white tw-font-bold tw-py-2 tw-px-4 tw-rounded tw-transition"
        >
            Dodaj element
        </button>
    </div>
</div>
