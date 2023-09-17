<template>
    <header class="bg-sky-950 shadow-md">
        <div class="flex justify-between items-center px-6 py-4">
            <div>
                <Link href="/">
                <h1 class="text-sky-50 text-2xl font-bold">
                    ONX-Project
                </h1>
            </Link>
            </div>
            <nav class="flex flex-col items-end text font-semibold sm:flex-row text-orange-400">
                <div class="hover:text-orange-100"><Link :href="route('entry.index')">Wpisy</Link></div>
                <div class="hover:text-orange-100 sm:pl-4">Użytkownicy</div>
            </nav>
        </div>
    </header>
    <slot></slot>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

</script>
