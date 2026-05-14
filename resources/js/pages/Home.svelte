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
    <div class="w-full overflow-auto max-h-full">
        <div class="flex justify-between pt-4 pb-10 w-[95vw] xl:w-2/3 sticky top-0 bg-linear-to-t from-transparent from-10% to-slate-100 to-30%">
            <div>
                <Link href="checklists" as="button" method="post" class="p-2 rounded bg-indigo-500 text-slate-50 font-medium ">
                    Crear lista
                </Link>
            </div>
            <div></div>
            <div></div>
        </div>
        <div class="w-[95vw] xl:w-2/3 flex justify-center">
            <ul class="p-1 w-full">
                {#each checklists as checklist, i (checklist.id)}
                    <li class="mb-3">
                        <div class="flex rounded shadow bg-white overflow-hidden">
                            <Link href={`/checklists/edit/${checklist.id}`} class="grow bg-white hover:bg-neutral-100">
                                <div class="flex gap-2 items-center p-2">
                                    <ListOutline/>
                                    {checklist.title ?? `Sin título ${i}`}
                                </div>
                            </Link>
                            <button onclick={(event) => {
                                if (menuState.isOpen) {
                                    menuState.close();
                                    return;
                                }

                                menuState.invoker = event.currentTarget;
                                menuState.open(event, [
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
                                ])
                            }}
                            class="bg-indigo-300 px-2 cursor-pointer">
                                <DotsVerticalOutline/>
                            </button>
                        </div>
                    </li>
                {/each}
            </ul>
        </div>
    </div>
</AppLayout>
