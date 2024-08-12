<template>
    <SiteLayout>
        <ul>
            <li v-for="department in departments">{{department}}
            </li>
        </ul>
    </SiteLayout>
</template>

<script setup>
import SiteLayout from '@/Layouts/SiteLayout.vue';

defineProps(['departments'])
</script>

<style lang="scss" scoped>

</style>
