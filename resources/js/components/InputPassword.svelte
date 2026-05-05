<script lang="ts">
import { EyeOutline, EyeSlashOutline } from 'flowbite-svelte-icons';
import { nanoid } from 'nanoid';

let { value = $bindable(''), label } = $props();
let is_secret = $state(true);
const type = $derived(is_secret ? 'password' : 'text')
const id = nanoid();
const toggleSecret = (e: Event) => {
    e.preventDefault();
    is_secret = !is_secret;
};
</script>

<div>
    <label for={id}>{label}</label>
    <div class="flex border border-slate-300 rounded w-full">
        <input {id} bind:value={value} {type} class="p-2 w-full">
        <button type="button" onclick={toggleSecret} class="px-2">
            {#if is_secret}
                <EyeOutline/>
            {:else}
                <EyeSlashOutline/>
            {/if}
        </button>
    </div>
</div>
