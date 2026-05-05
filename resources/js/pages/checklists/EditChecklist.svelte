<script lang="ts">
import type { Checklist } from "@/types/checklist";
import { router } from "@inertiajs/svelte";
    import { debounce } from "ts-debounce";
import { ulid } from "ulid";

interface Props {
    checklist: Checklist;
}

let { checklist }: Props = $props();

function addItem() {
    router.post(`/checklists/${checklist.id}/items`, {
        id: ulid().toLocaleLowerCase(),
        checklist_id: checklist.id,
        position: checklist.items.length,
    });
}

const updateChecklistTitle = debounce((event: Event) => {
    const value = (event.target as HTMLInputElement).value;
    router.patch(`/checklists/${checklist.id}`, {title: value});
}, 1000);

const updateItemTitle = debounce((event: Event, itemId: string) => {
    const value = (event.target as HTMLInputElement).value;
    router.patch(`/checklists/${checklist.id}/items/${itemId}`, {title: value});
}, 1000);

</script>

<div>
    <input type="text" value={checklist.title} oninput={updateChecklistTitle} placeholder="Título">
    <ul>
        {#each checklist.items as item (item.id)}
            <li>
                <input type="checkbox" bind:checked={item.is_checked}>
                <input type="text" value={item.title} oninput={(event) => updateItemTitle(event, item.id)} placeholder="Elemento">
            </li>
        {/each}
    </ul>
    <button onclick={addItem}>
        Nuevo elemento
    </button>
</div>
