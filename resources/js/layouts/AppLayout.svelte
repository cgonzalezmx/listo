<script lang="ts">
import PopupMenu from "@/components/PopupMenu.svelte";
import type { Snippet } from "svelte";

let { children }: { children: Snippet } = $props();
</script>

<div>
    {@render children?.()}
    <PopupMenu/>
</div>
