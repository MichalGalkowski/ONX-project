<template>
    <h1>
        Wpisy
    </h1>
    <div v-for="entry in entries" :key="entry.id">
        <h2>{{ entry.title }}</h2>
        <p>{{ entry.content }}</p>
        <div v-for="tag in entry.tags" :key="tag">
            <p>#{{ tag }}</p>
        </div>
        <Link :href="`/entry/${entry.id}`">Otwórz</Link>
        <Link :href="`/entry/${entry.id}/edit`">Edytuj</Link>
    </div>
    <Link href="/entry/create"><button>Dodaj wpis</button></Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

defineProps({
    entries: Object
})
</script>
