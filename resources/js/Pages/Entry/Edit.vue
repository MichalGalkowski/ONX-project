<template>
    <div class="flex flex-col items-center w-full p-4">
        <form class="w-full flex flex-col justify-center sm:w-2/3" @submit.prevent="update">
            <div class="mt-4">
                <label class="block">Tytuł:</label>
                <input class="input" v-model="form.title" type="text">
                <div class="error" v-if="form.errors.title">
                    {{ form.errors.title }}
                </div>
            </div>
            <div class="mt-4">
                <label class="block">Treść:</label>
                <textarea class="input" v-model="form.content"></textarea>
                <div class="error" v-if="form.errors.content">
                    {{ form.errors.content }}
                </div>
            </div>
            <div class="mt-4">
                <input class="input w-max" v-model="tag" type="text">
                <span class="tagBtn cursor-pointer ml-4" @click="addTag">+Dodaj Tag</span>
                <div class="error" v-if="form.errors.tags">
                    {{ form.errors.tags }}
                </div>
            </div>
            <div class="mt-4">
                <label>Tagi:</label>
                <div class="flex flex-wrap">
                    <div v-for="(displayTag, index) in form.tags" :key="index">
                        <h4 class="tag relative">#{{ displayTag }}
                            <svg @click="form.tags.splice(index, 1)" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 text-red-500 cursor-pointer absolute -top-2 -right-2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="w-full flex justify-evenly mt-6">
                <button class="btn" type="submit">Edytuj wpis</button>
                <Link :href="route('entry.destroy', props.entry.id)" method="DELETE" as="button"><span
                    class="btn bg-red-400">Usuń</span></Link>
            </div>
        </form>
    </div>
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
