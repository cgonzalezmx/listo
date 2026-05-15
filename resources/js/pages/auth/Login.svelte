<script lang="ts">
import Input from '@components/Input.svelte';
import InputPassword from '@components/InputPassword.svelte';
import { Link, useForm } from '@inertiajs/svelte';

interface Props {
    public_registration: boolean;
}

let { public_registration }: Props = $props();

let form = useForm({
    email: '',
    password: ''
});

function submit(event: Event) {
    event.preventDefault();
    form.post('/login');
}
</script>

<form class="flex flex-col gap-4 bg-white rounded shadow p-6 w-[95%] md:w-auto mx-auto self-center">
    <Input bind:value={form.email} label="Correo electrónico"/>
    <InputPassword bind:value={form.password} label="Contraseña"/>
    <button type="submit" onclick={submit} class="p-2 bg-indigo-500 text-white font-semibold rounded self-start">Iniciar sesión</button>

    {#if public_registration}
        <Link href="/register">Crear cuenta</Link>
    {/if}
</form>
