<script lang="ts">
import { nanoid } from "nanoid";

let {
    value = $bindable(''),
    type = 'text',
    label
} = $props();

const id = nanoid();
</script>

<div>
    <label for={id}>{label}</label>
    <input {id} bind:value={value} {type} class="border rounded border-slate-300 p-1 w-full">
</div>
