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

<div class="flex w-full">
    <div class="bg-slate-100 md:w-1/3 lg:w-1/4 xl:w-1/5">
        {#each paths as path }
            <div>
                <Link href={path.url}>{path.label}</Link>
            </div>
        {/each}
    </div>
    <div class="flex md:w-2/3 lg:w-3/4 xl:w-4/5">
        {@render children?.()}
    </div>
    <PopupMenu/>
</div>
