<template>
    <SiteLayout>
        <ConstituencyFilter @searchConstituency="setConstituency" />

        {{ filteredConstituencies }}
        <ul>
            <li v-for="constituency in constituencies">
                <a :href="'/constituency/' + constituency.slug">
                <div class="flex *:content-center justify-between">
                    <div class="">
                        <img class="p-2 w-24"
                        :src="'https://members-api.parliament.uk/api/Members/'+constituency.member.member_id+'/Thumbnail'"  :alt="constituency.member.nameDisplayAs + ' thumbnail image'"
                            >
                    </div>
                    <div class="p-4 w-full">
                        <div class="flex flex-col">
                            <div class="font-bold">{{ constituency.constituencyName }}</div>
                            <div class="text-sm">{{ constituency.member.nameDisplayAs }}</div>
                        </div>
                    </div>
                    <div>
                        <button class="bg-blue-600 p-3 rounded-lg">More</button>
                    </div>
                </div>
            </a>
            </li>
        </ul>
    </SiteLayout>
</template>

<script setup>
import { ref, computed } from "vue";
import SiteLayout from '@/Layouts/SiteLayout.vue';
import ConstituencyFilter from '@/Components/Filters/ConstituencyFilter.vue';
const props = defineProps(['constituencies'])

let setCon = ref('')

const setConstituency = (selectedConstituency) => {

    setCon.value = selectedConstituency
    console.log(setCon.value)
}

const filteredConstituencies = computed(() => {
    console.log('fdsf')
    let items = props.constituencies
    if (setCon != '') {
        items = items.filter(item => item.constituencyName.toLowerCase().includes(setCon))
    }
})

</script>


<style lang="scss" scoped></style>
