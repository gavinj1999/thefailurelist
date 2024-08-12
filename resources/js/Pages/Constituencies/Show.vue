<template>
    <SiteLayout>
        {{  constituency }}
    </SiteLayout>
</template>

<script setup>
import SiteLayout from '@/Layouts/SiteLayout.vue';
defineProps(['constituency'])
</script>

<style lang="scss" scoped>

</style>

