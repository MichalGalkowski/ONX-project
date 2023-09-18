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
            <svg @click="isNavOpen = !isNavOpen" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="1.5" stroke="currentColor" class="w-8 h-8 cursor-pointer text-sky-50 sm:hidden">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>

            <nav class="hidden sm:flex flex-col items-end text font-semibold sm:flex-row text-orange-400">
                <div class="hover:text-orange-100">
                    <Link :href="route('entry.index')">Wpisy</Link>
                </div>
                <div class="hover:text-orange-100 sm:pl-4">Użytkownicy</div>
            </nav>
        </div>
    </header>
    <div @click.self="isNavOpen=false" class="absolute h-full w-full" :class="isNavOpen ? 'block' : 'hidden'">
    <nav class="bg-sky-600 p-6 flex flex-col items-start font- font-semibold text-orange-400 sm:hidden">
        <div @click="isNavOpen = false" class="hover:text-orange-100 flex items-center m-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
            </svg>
            <Link :href="route('entry.index')">Wpisy</Link>
        </div>
        <div @click="isNavOpen = false" class="hover:text-orange-100 flex items-center m-2">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                class="w-6 h-6 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
            </svg>

            Użytkownicy
        </div>
    </nav>
</div>
<div>
        <h2>{{ user.name }} {{ user.surname }}</h2>
        <p>{{ user.role }}</p>
    </div>
    <slot></slot>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3'
import { computed, ref } from 'vue';

const page = usePage()

const isNavOpen = ref(false)

const user = computed(
    () => page.props.user,
    )
</script>
