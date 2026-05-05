<script lang="ts">
import InputText from '@components/InputText.svelte';
import InputPassword from '@components/InputPassword.svelte';
import { useForm } from '@inertiajs/svelte';

let form = useForm({
    email: '',
    password: ''
});

function submit(event: Event) {
    event.preventDefault();
    form.post('/login');
}
</script>

<form class="flex flex-col gap-4 border border-slate-300 p-6 w-[95%] lg:w-1/4 mx-auto">
    <InputText bind:value={form.email} label="Correo electrónico"/>
    <InputPassword bind:value={form.password} label="Contraseña"/>
    <button type="submit" onclick={submit} class="p-2 bg-purple-500 text-white font-semibold rounded self-start">Iniciar sesión</button>
</form>
