<template>
    <div class="p-4 flex justify-center">
        <div class="card">
        <div class="flex flex-col border-b-2">
            <h2 class="font-semibold text-lg">{{ props.entry.title }}</h2>
        </div>
        <p class="m-4">{{ props.entry.content }}</p>
        <div class="flex">
            <div v-for="tag in entry.tags" :key="tag">
                <p class="tag">#{{ tag }}</p>
            </div>
        </div>
        <p class="date mt-4">Dodano: {{ createdAt }}</p>
        <p class="date">Ostatnia aktualizacja: {{ updatedAt }}</p>
        <div class="flex justify-end mt-2 pt-4  border-t-2">
            <Link :href="route('entry.edit', props.entry.id)"><button class="btn">Edytuj</button></Link>
            <Link :href="route('entry.show', props.entry.id)"><button class="btn ml-4">Otwórz</button></Link>
        </div>
    </div>
    </div>
</template>

<script setup>
const props = defineProps({
    entry: Object
})
const createdAt = new Date(props.entry.created_at).toLocaleString('pl-PL')
const updatedAt = new Date(props.entry.updated_at).toLocaleString('pl-PL')
</script>
