<template>
    <input class="rounded-full border-4 border-white active:border-indigo-600 focus:border-4  w-full "
    type="text" placeholder="Search member" @input="memberSearch" />
</template>
<script setup>
const emit = defineEmits(['siteSearch'])

const memberSearch = (e) => {
    emit('siteSearch', e.target.value)
}
</script>
