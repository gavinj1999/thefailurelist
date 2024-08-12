<template>
    <div class="relative flex items-center w-full px-4">
        <button @click="show = !show" class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900">
            Filter
        </button>
        <div v-if="show" class="absolute top-12 roght-0 z-10 w-48 p-3 bg-white rounded-lg shadow">
            <h6 class="mb-3 text-sm font-medium text-gray-900">
                Party
            </h6>
            <ul class="space-y-2 text-sm">

            </ul>
        </div>

    </div>
</template>

<script setup>
const show = ref(false)

</script>

<style lang="scss" scoped>

</style>
