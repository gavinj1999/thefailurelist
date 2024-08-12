<template>
    <div><input  @input="constituencySearch" class="rounded-full border-4 border-white active:border-indigo-600 focus:border-4  w-full my-4" placeholder="Search" type="text">

    </div>
</template>

<script setup>

const emit = defineEmits(['searchConstituency'])

const constituencySearch = (e) => {
    emit('searchConstituency', e.target.value)
}

</script>
