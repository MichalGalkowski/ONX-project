<template>
    <div class="flex flex-col items-center p-4 mt-32">
        <h1 class="text-sky-900 text-2xl font-bold">
            ONX-Project
        </h1>
        <form class="w-96 flex flex-col justify-center" @submit.prevent="register">
            <div class="mt-4">
                <label class="block">Imię:</label>
                <input class="input" v-model="form.name" type="text">
                <div class="error" v-if="form.errors.name">
                    {{ form.errors.name }}
                </div>
            </div>
            <div class="mt-4">
                <label class="block">Nazwisko:</label>
                <input class="input" v-model="form.surname" type="text">
                <div class="error" v-if="form.errors.surname">
                    {{ form.errors.surname }}
                </div>
            </div>
            <div class="mt-4">
                <label class="block">Email:</label>
                <input class="input" v-model="form.email" type="email">
                <div class="error" v-if="form.errors.email">
                    {{ form.errors.email }}
                </div>
            </div>
            <div class="mt-4">
                <label class="block">Hasło:</label>
                <input class="input" v-model="form.password" type="password">
                <div class="error" v-if="form.errors.password">
                    {{ form.errors.password }}
                </div>
            </div>
            <div class="mt-4">
                <label class="block">Potwierdź hasło:</label>
                <input class="input" v-model="form.password_confirmation" type="password">
            </div>
            <div class="w-full flex justify-evenly mt-6">
                <button class="btn" type="submit">Zarejestruj się</button>
            </div>
        </form>
        <p class="mt-4">Masz już konto?
            <Link :href="route('entry.index')" class="border-sky-900 border-b-2 rounded-sm hover:bg-sky-50">Zaloguj się</Link>
        </p>
    </div>
</template>

<script setup>
import { useForm, Link } from '@inertiajs/vue3'

const form = useForm({
    name: null,
    surname: null,
    role: 'user',
    email: null,
    password: null,
    password_confirmation: null,
})
const register = () => form.post(route('register.store'))

</script>
<script>
import BlankLayout from '@/Layouts/BlankLayout.vue';
export default {
    layout: BlankLayout
}
</script>
