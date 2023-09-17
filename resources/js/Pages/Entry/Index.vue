<template>
    <div class="flex flex-col items-center">
        <h1 class="text-sky-900 text-xl font-semibold my-2">Wpisy</h1>
        <div class="w-full p-4" v-for="entry in entries" :key="entry.id">
            <EntryItem :entry="entry" />
        </div>
        <Link :href="route('entry.create')"><button class="fab">+Dodaj wpis</button></Link>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import EntryItem from '../../Components/EntryItem.vue'
defineProps({
    entries: Object
})
</script>
