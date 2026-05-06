<script lang="ts">
import { menuState } from "@/lib/state/menu.svelte";
import type { Action } from "svelte/action";


const clickOutside: Action = (el) => {
    $effect(() => {
        function handleClick(event: MouseEvent) {
            !el.contains(event.target as Node) && menuState.close();
        }

        document.addEventListener('click', handleClick, true);

        return () => {
            document.removeEventListener('click', handleClick, true);
        }
    });
}
</script>

{#if menuState.isOpen}
    <div use:clickOutside class="absolute z-50 bg-slate-50 shadow rounded p-2 border border-slate-100" style="top: {menuState.y}px; left: {menuState.x}px">
        <ul>
            {#each menuState.items as item}
                <li>
                    <button onclick={item.command} class="cursor-pointer py-1 px-2 bg-slate-50 hover:brightness-95 w-full">
                        {item.label}
                    </button>
                </li>
            {/each}
        </ul>
    </div>
{/if}
