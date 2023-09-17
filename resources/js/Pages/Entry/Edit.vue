<template>
    <form @submit.prevent="update" method="PUT">
        <div>
            <label>Tytuł</label>
            <input v-model="form.title" type="text">
        </div>
        <div>
            <label>Treść</label>
            <textarea v-model="form.content"></textarea>
        </div>
        <div>
            <input v-model="tag" type="text">
            <span @click="addTag">Dodaj Tag</span>
        </div>
        <label>Tagi</label>
        <div v-for="(displayTag, index) in form.tags" :key="index">
            <h4>#{{ displayTag }}</h4>
            <span @click="form.tags.splice(index, 1)">x</span>
        </div>
        <div>
            <button type="submit">Edytuj wpis</button>
        </div>
    </form>
    <Link :href="route('entry.destroy', props.entry.id)" method="DELETE" as="button" >Usuń</Link>
</template>

<script setup>
import { Link, useForm } from '@inertiajs/vue3'
import { ref } from 'vue'

const props = defineProps({
    entry: Object
})

const form = useForm({
    title: props.entry.title,
    content: props.entry.content,
    tags: props.entry.tags,
})
const tag = ref('')
const update = () => form.put(route('entry.update', props.entry.id))
const addTag = () => {
    if (tag.value.length >= 3) {
        form.tags.push(tag.value)
        tag.value = ''
    }
}
</script>
