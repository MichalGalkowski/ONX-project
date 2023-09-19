<template>
    <div class="flex flex-col items-center mb-16">
        <h1 class="text-sky-900 text-xl font-semibold my-2">Wpisy</h1>
        <div class="w-full p-4 flex justify-center" v-for="entry in entries.data" :key="entry.id">
            <EntryItem :entry="entry" />
        </div>
        <div v-if="entries.data.length" class="w-full flex justify-center mx-8">
            <Pagination :pages="entries.links"/>
        </div>
        <Link :href="route('entry.create')"><button class="fab">+Dodaj wpis</button></Link>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import EntryItem from '../../Components/EntryItem.vue'
import Pagination from '@/Components/Pagination.vue'
defineProps({
    entries: Object
})
</script>
