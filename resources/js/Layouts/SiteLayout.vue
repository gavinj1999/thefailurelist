<template>
    <div class="container mx-auto">
        <div class="flex flex-col h-screen justify-between">
            <div class="header">
                <Header :parties="parties" />
            </div>
            <div n class="mb-auto h-100">

                <slot />
            </div>

            <div class="footer">Footer</div>
        </div>
    </div>
</template>

<script setup>
import Header from '@/Components/Header.vue';
defineProps(['parties'])
</script>

<style lang="scss" scoped></style>
