<template>
    <div class="flex flex-wrap gap-1" v-for="(page, i) in pages" :key="i">
        <Link :href="page.url" class="py-2 px-4 rounded-md" :class="{'bg-sky-900 text-sky-50': page.active}" >
            <div v-if="page.label.includes('Previous')">
                Poprzednia
            </div>
            <div v-else-if="page.label.includes('Next')">
                Następna
            </div>
            <div v-else>
                {{ page.label }}
            </div>
        </Link>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
defineProps({
    pages: Array
})

</script>
