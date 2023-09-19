<template>
    <div class="flex flex-col items-center mb-16">
        <h1 class="text-sky-900 text-xl font-semibold my-2">Użytkownicy</h1>
        <div class="w-full p-4 flex justify-center" v-for="user in dbUsers.data" :key="user.id">
            <UserItem :dbUser="user" />
        </div>
        <div v-if="dbUsers.data.length" class="w-full flex justify-center mx-8">
            <Pagination :pages="dbUsers.links"/>
        </div>
    </div>
</template>

<script setup>
import Pagination from '@/Components/Pagination.vue'
import UserItem from '../../Components/UserItem.vue'
defineProps({
    dbUsers: Object
})
</script>
