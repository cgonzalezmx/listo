<script lang="ts">
import type { Checklist } from "@/types/checklist";
import { router, Link } from "@inertiajs/svelte";
import { ulid } from "ulid";
import { formatDistanceToNow } from "date-fns";
import { es } from 'date-fns/locale'
import { debounce } from "ts-debounce";
import { debounceInput } from "@/lib/actions/debounce.svelte";

interface Props {
    checklist: Checklist;
}

let { checklist }: Props = $props();
const timePassed = () => formatDistanceToNow(checklist.created_at, { locale: es, addSuffix: true});

function updateChecklistTitle(ev: Event) {
    const value = (ev.target as HTMLInputElement).value;
    router.patch(`/checklists/${checklist.id}`, {title: value});
}

const updateItemTitle = debounce((event: Event, itemId: string) => {
    const value = (event.target as HTMLInputElement).value;
    router.patch(`/items/${itemId}`, {title: value});
}, 300);

const updateCheckedState = debounce((event: Event, itemId: string) => {
    const checked = (event.target as HTMLInputElement).checked;
    router.patch(`/items/${itemId}`, {is_checked: checked});
}, 300);

function addItem() {
    router.post(`/checklists/${checklist.id}/items`, {
        id: ulid().toLocaleLowerCase(),
        checklist_id: checklist.id,
        position: checklist.items.length,
    });
}
</script>

<div class="flex flex-col w-[95vw] xl:w-2/3 bg-slate-50 rounded shadow mx-auto p-6">
    <Link href="/">Regresar</Link>
    <input type="text" value={checklist.title} use:debounceInput={{ callback: updateChecklistTitle }} placeholder="Título" class="text-4xl mb-6">
    <div class="text-slate-500 mb-3">
        {timePassed()}
    </div>
    <ul>
        {#each checklist.items as item (item.id)}
            <li class="mb-3">
                <input type="checkbox" checked={item.is_checked} onchange={(event) => updateCheckedState(event, item.id)} class="">
                <input type="text" value={item.title} oninput={(event) => updateItemTitle(event, item.id)} placeholder="Elemento">
            </li>
        {/each}
    </ul>
    <button onclick={addItem}>
        Nuevo elemento
    </button>
</div>
