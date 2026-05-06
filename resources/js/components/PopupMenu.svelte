<script lang="ts">
import { DotsVerticalOutline } from "flowbite-svelte-icons";

interface Props {
    items: any[];
}

let { items }: Props = $props();
let pop = $state(false);
</script>

<div class="flex relative">
    <button class="cursor-pointer bg-indigo-200 px-1" onclick={() => pop = !pop}>
        <DotsVerticalOutline size="lg"/>
    </button>
    {#if pop}
        <div class="absolute bg-slate-100 top-full z-10">
            xD
        </div>
    {/if}
</div>
