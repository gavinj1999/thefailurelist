<template>
    <div>
        <input @input="siteSearch"
            class="rounded-full border-4 border-white active:border-indigo-600 focus:border-4  w-full my-4"
            placeholder="Search" type="text">

    </div>
</template>

<script setup>
const emit = defineEmits(['searchTerm'])

const siteSearch = (e) => {
    emit('searchTerm', e.target.value)
}
</script>

<style lang="scss" scoped>

</style>
