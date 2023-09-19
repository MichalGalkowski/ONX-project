<template>
    <div class="p-4 flex justify-center">
        <div class="card">
            <div class="flex flex-col border-b-2">
                <h2 class="font-semibold text-lg">{{ props.dbUser.name }} {{ props.dbUser.surname }}</h2>
            </div>
            <p class="m-4">{{ props.dbUser.email }}</p>
            <p class="m-4">{{ props.dbUser.role }}</p>
            <p class="date mt-4">Zarejestrowany: {{ createdAt }}</p>
            <p class="date">Ostatnia aktualizacja: {{ updatedAt }}</p>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({
    dbUser: Object
})
const createdAt = new Date(props.dbUser.created_at).toLocaleString('pl-PL')
const updatedAt = new Date(props.dbUser.updated_at).toLocaleString('pl-PL')
</script>
