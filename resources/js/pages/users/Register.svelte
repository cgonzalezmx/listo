<script lang="ts">
import Input from "@/components/Input.svelte";
import { useForm } from "@inertiajs/svelte";
    import InputPassword from "@/components/InputPassword.svelte";

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: ''
});

function submit(ev: Event) {
    ev.preventDefault();
    const url = window.location.href;
    form.post(url);
}

$inspect(form)
</script>

<form onsubmit={submit} class="bg-white mx-auto self-center p-6 rounded shadow w-[95%] md:w-auto">
    <Input bind:value={form.name} label="Nomber de usuario"/>
    <Input bind:value={form.email} label="email" type="email"/>
    <InputPassword bind:value={form.password} label="Contraseña"/>
    <InputPassword bind:value={form.password_confirmation} label="Confirmar contraseña"/>
    <button type="submit">Crear cuenta</button>
</form>
