<script lang="ts">
import type { Checklist } from "@/types/checklist";
import { router, Link } from "@inertiajs/svelte";
import { ulid } from "ulid";
import { formatDistanceToNow } from "date-fns";
import { es } from 'date-fns/locale'
import { debounce } from "@/lib/actions/debounce.svelte";
import type { Item } from "@/types/item";
import { ArrowLeftOutline, PlusOutline, EditOutline } from "flowbite-svelte-icons";
import AppLayout from "@/layouts/AppLayout.svelte";

interface Props {
    checklist: Checklist;
}

let { checklist }: Props = $props();
const timePassed = () => formatDistanceToNow(checklist.created_at, { locale: es, addSuffix: true});

function update(route: string, config: { target: EventTarget | null, attr: 'value' | 'checked', prop: string }) {
    if (!config.target) return;
    const { target, attr, prop } = config
    const val = (target as HTMLInputElement)[attr];
    router.patch(route, {[prop]: val})
}

function updateChecklistTitle(target: EventTarget | null) {
    update(`/checklists/${checklist.id}`, {
        target,
        attr: 'value',
        prop: 'title'
    });
}

function updateItem(target: EventTarget | null, config: { id: string, prop: keyof Item }) {
    const { id, prop } = config;
    update(`/items/${id}`, {
        target,
        attr: prop === 'title' ? 'value' : 'checked',
        prop
    });
}

function addItem() {
    router.post(`/checklists/${checklist.id}/items`, {
        id: ulid().toLocaleLowerCase(),
        checklist_id: checklist.id,
        position: checklist.items.length,
    });
}
</script>

<AppLayout>
    <div class="flex flex-col md:w-[80%] md:rounded mx-auto bg-white p-6 md:shadow self-center md:max-h-[80vh] overflow-auto">
        <Link href="/" class="flex items-center gap-2"><ArrowLeftOutline/> Regresar</Link>
        <div class="flex items-center mb-6">
            <input use:debounce={{
                    onUpdate: updateChecklistTitle,
                    delay: 1000
                }}
                type="text"
                value={checklist.title}
                placeholder="Título"
                class="text-4xl p-2 peer grow"
            >
            <EditOutline class="text-slate-400 h-12 w-12 opacity-0 peer-hover:opacity-100 peer-focus:hidden"/>
        </div>
        <div class="text-slate-500 mb-3">
            {timePassed()}
        </div>
        <ul>
            {#each checklist.items as item (item.id)}
                <li class="mb-2">
                    <div class="flex items-center">
                        <input use:debounce={{ onUpdate: (target) => updateItem(target, { id: item.id, prop: 'is_checked' }) }}
                            type="checkbox"
                            checked={item.is_checked}
                            class="mr-2 peer"
                        >
                        <div class="flex items-center grow">
                            <input use:debounce={{
                                    onUpdate: (target) => updateItem(target, { id: item.id, prop: 'title' }),
                                    delay: 1000
                                }}
                                type="text"
                                value={item.title}
                                placeholder="Elemento"
                                class="p-2 grow peer"
                            >
                            <EditOutline class="opacity-0 peer-hover:opacity-100 peer-focus:hidden h-6 w-6"/>
                        </div>
                    </div>
                </li>
            {/each}
        </ul>
        <button onclick={addItem} class="self-start flex items-center gap-3">
            <PlusOutline/>
            Nuevo elemento
        </button>
    </div>
</AppLayout>
