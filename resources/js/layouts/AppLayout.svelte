<script lang="ts">
import PopupMenu from "@/components/PopupMenu.svelte";
    import { Link } from "@inertiajs/svelte";
import type { Snippet } from "svelte";

let { children }: { children: Snippet } = $props();
const paths = [
    {
        url: '/',
        label: 'Mis listas'
    },
    {
        url: '#',
        label: 'En colaboración'
    },
    {
        url: '#',
        label: 'Archivadas'
    }
];
</script>

<div class="flex flex-wrap w-full h-screen overflow-hidden">
    <div class="w-full h-1/12">
        <div>Listo</div>
    </div>
    <div class="bg-slate-100/30 md:bg-none backdrop-blur-xs md:backdrop-blur-none w-full md:w-1/3 lg:w-1/4 xl:w-1/5 h-11/12 absolute md:relative bottom-0 z-50">
        <div class="w-2/3 bg-slate-100 h-full">
            {#each paths as path }
                <div>
                    <Link href={path.url}>{path.label}</Link>
                </div>
            {/each}
            <Link href="/logout" method="post">Cerrar sesión</Link>
        </div>
    </div>
    <div class="flex md:w-2/3 lg:w-3/4 xl:w-4/5 h-11/12 overflow-auto">
        {@render children?.()}
    </div>
    <PopupMenu/>
</div>
