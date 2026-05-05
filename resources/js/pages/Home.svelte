<script lang="ts">
import { Link } from "@inertiajs/svelte";
import { ListOutline } from 'flowbite-svelte-icons';

interface Props {
    checklists: Checklist[];
}

let { checklists }: Props = $props();
</script>

<div>
    <Link href="checklists" as="button" method="post" class="border p-2 rounded">
        Crear lista
    </Link>

    <ul>
        {#each checklists as checklist, i (checklist.id)}
            <li class="mb-2">
                <div class="flex gap-2 items-center">
                    <ListOutline/>
                    <Link href={`/checklists/edit/${checklist.id}`}>
                        {checklist.title ?? `Lista-${i}`}
                    </Link>
                </div>
            </li>
        {/each}
    </ul>
</div>
