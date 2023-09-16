<template>
    <div>
        <h2>Second page</h2>
        <Link href="/">Index page</Link>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'
import BlankLayout from '@/Layouts/BlankLayout.vue';
</script>

<script>
export default {
    layout: BlankLayout
}
</script>
