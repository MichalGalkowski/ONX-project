<template>
    <form @submit.prevent="create">
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
            <button type="submit">Dodaj wpis</button>
        </div>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3'
import { ref } from 'vue'

const form = useForm({
    title: null,
    content: null,
    tags: [],
})
const tag = ref('')
const create = () => form.post('/entry')
const addTag = () => {
    if (tag.value.length >= 3) {
        form.tags.push(tag.value)
        tag.value = ''
    }
}
</script>
