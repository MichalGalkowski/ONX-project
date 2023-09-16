<template>
    <header>
        <div>
            <div>
                <h1>
                    ONX-Project
                </h1>
            </div>
            <nav>
                <div><Link href="/entry">Wpisy</Link></div>
                <div>Użytkownicy</div>
            </nav>
        </div>
    </header>
    <slot></slot>
</template>

<script setup>
import { Link } from '@inertiajs/vue3'

</script>
