<script lang="ts">
import { Checklist } from "@/lib/models/Checklist.svelte";

const checklist = new Checklist();
</script>

<div>
    <input type="text" bind:value={checklist.title} placeholder="Título">
    <ul>
        {#each checklist.items as item (item.id)}
            <li>
                <input type="checkbox" bind:checked={item.is_checked}>
                <input type="text" bind:value={item.title} placeholder="Elemento">
            </li>
        {/each}
    </ul>
    <button onclick={() => checklist.addItem()}>
        Nuevo elemento
    </button>
</div>
