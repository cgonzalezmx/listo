<script lang="ts">
import EyeOutline from 'flowbite-svelte-icons/EyeOutline.svelte';
import EyeSlashOutline from 'flowbite-svelte-icons/EyeSlashOutline.svelte';
import { nanoid } from 'nanoid';

let { value = $bindable(''), label } = $props();
let is_secret = $state(true);
const type = $derived(is_secret ? 'password' : 'text')
const id = nanoid();
const toggleSecret = () => is_secret = !is_secret;
</script>

<div>
    <label for={id}>{label}</label>
    <div class="flex border border-slate-300 rounded w-full">
        <input {id} bind:value={value} {type} class="p-2 w-full">
        <button onclick={toggleSecret} class="px-2">
            {#if is_secret}
                <EyeOutline/>
            {:else}
                <EyeSlashOutline/>
            {/if}
        </button>
    </div>
</div>
