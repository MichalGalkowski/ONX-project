<template>
    <div class="flex flex-col items-center w-full p-4" v-if="user.role === 'admin'">

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
                                <svg @click="form.tags.splice(index, 1)" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6 text-red-500 cursor-pointer absolute -top-2 -right-2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="w-full flex justify-evenly mt-6">
                    <button class="btn" type="submit">Edytuj wpis</button>
                    <Link class="btn bg-red-500" :href="route('entry.destroy', props.entry.id)" method="DELETE" as="button">
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
            <Link class="btn mt-4" :href="route('entry.index')">Wróć</Link>
        </div>
</template>

<script setup>
import { Link, useForm, usePage } from '@inertiajs/vue3'
import { ref, computed } from 'vue'

const props = defineProps({
    entry: Object
})

const page = usePage()

const user = computed(
    () => page.props.user,
)

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
