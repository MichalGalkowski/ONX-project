<template>
    <div class="flex flex-col items-center mb-16">
        <h1 class="text-sky-900 text-xl font-semibold my-2">Użytkownicy</h1>
        <div class="w-full p-4 flex justify-center" v-for="user in users" :key="user.id">
            <UserItem :user="user" />
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import UserItem from '../../Components/UserItem.vue'
defineProps({
    users: Object
})
</script>
