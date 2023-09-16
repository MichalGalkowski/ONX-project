<template>
    <div>
        <h2>{{ entry.title }}</h2>
        <p>{{ entry.content }}</p>
        <div v-for="tag in entry.tags" :key="tag">
            <p>#{{ tag }}</p>
        </div>
    </div>
</template>

<script setup>
defineProps({
    entry: Object
})

</script>
