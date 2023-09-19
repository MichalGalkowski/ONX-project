<template>
    <div class="flex flex-col items-center w-full p-4"  v-if="user.role === 'admin'">

            <h2 class="text-lg font-semibold mt-6">Użytkownik: {{ form.email }}</h2>
            <form class="w-full flex flex-col justify-center sm:w-2/3" @submit.prevent="update">
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
                    <label>Rola:</label>
                    <div class="m-2">
                        <input v-model="form.role" id="user" type="radio" name="role" value="user">
                        <label class="ml-2" for="user">Użytkownik</label>
                    </div>
                    <div class="m-2">
                        <input v-model="form.role" id="admin" type="radio" name="role" value="admin">
                        <label class="ml-2" for="admin">Administrator</label>
                    </div>
                </div>
                <div class="w-full flex justify-evenly mt-6">
                    <button class="btn" type="submit">Edytuj</button>
                    <Link class="btn bg-red-500" :href="route('user.destroy', props.dbUser.id)" method="DELETE" as="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                    </svg>
                    </Link>
                </div>
            </form>
        </div>
        <div class="flex flex-col justify-center items-center mt-8" v-else>
            <p>Nie masz uprawnień do przeglądania tej strony</p>
            <Link class="btn mt-4" :href="route('user.index')">Wróć</Link>
        </div>

</template>

<script setup>
import { Link, useForm, usePage } from '@inertiajs/vue3'
import { computed } from 'vue'

const props = defineProps({
    dbUser: Object
})

const page = usePage()

const user = computed(
    () => page.props.user,
)

const form = useForm({
    name: props.dbUser.name,
    surname: props.dbUser.surname,
    email: props.dbUser.email,
    role: props.dbUser.role,
})
const update = () => form.put(route('user.update', props.dbUser.id))
</script>
