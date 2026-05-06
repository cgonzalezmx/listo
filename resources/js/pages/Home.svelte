<script lang="ts">
import { Link } from "@inertiajs/svelte";
import { ListOutline, DotsVerticalOutline } from 'flowbite-svelte-icons';
import type { Checklist } from "@/types/checklist";
import AppLayout from "@/layouts/AppLayout.svelte";
import { menuState } from "@/lib/state/menu.svelte";

interface Props {
    checklists: Checklist[];
}

let { checklists }: Props = $props();
</script>

<AppLayout>
    <div class="w-[95vw] xl:w-2/3">
        <Link href="checklists" as="button" method="post" class="p-2 rounded bg-indigo-500 text-slate-50">
            Crear lista
        </Link>

        <ul>
            {#each checklists as checklist, i (checklist.id)}
                <li class="mb-2">
                    <div class="flex rounded shadow bg-slate-50">
                        <Link href={`/checklists/edit/${checklist.id}`} class="grow">
                            <div class="flex gap-2 items-center p-2">
                                <ListOutline/>
                                {checklist.title ?? `Sin título ${i}`}
                            </div>
                        </Link>
                        <button onclick={(event) => menuState.open(event, [
                            {
                                label: 'Archivar',
                                command() {
                                    console.log('Archivar: ' + checklist.id);
                                    menuState.close();
                                }
                            },
                            {
                                label: 'Borrar',
                                command() {
                                    console.log('Borrar: ' + checklist.id);
                                    menuState.close();
                                }
                            }
                        ])}>
                            <DotsVerticalOutline/>
                        </button>
                    </div>
                </li>
            {/each}
        </ul>
    </div>
</AppLayout>
