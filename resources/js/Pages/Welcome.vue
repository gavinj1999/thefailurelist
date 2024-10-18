<template>
    <SiteLayout>

        <div class="grid grid-cols-12 sm:gap-4">
            <div class="sm:col-span-3 xs:col-span-12 md:col-span-3 lg:col-span-3 xl:col-span-3">
                <SiteSearch class="mx-2" @searchTerm="setSearchTerm" />
                <div class="mx-2" v-for="member in filteredSite">
                    <div class="flex gap-4 mx-2 my-4 lg:my-4">
                        <div> <img class="w-16 rounded-full"
                                :src="'/storage/assets/images/members/thumbnails/' + member.slug + '.jpeg'" alt="">
                        </div>
                        <div class="justify-vertical">{{ member.nameDisplayAs }}</div>
                        <div> {{ member.party.name }} </div>
                    </div>
                </div>
            </div>
            <div class="sm:col-span-9 lg:col-span-9 md:col-span-9 xl:col-span-9 xs:col-span-12">
            </div>

        </div>
            <div v-for="promise in promises">
                <HousingPromise :promise="promise" />
            </div>

    </SiteLayout>
</template>

<script setup>
import {
    format,
    compareAsc,
    formatDistanceToNow,
    differenceInDays,
} from "date-fns";
import SiteLayout from '@/Layouts/SiteLayout.vue';
import SiteSearch from '@/Components/Filters/SiteFilter.vue';
import HousingPromise from '@/Components/Promises/HousingPromise.vue';
import { ref, computed } from "vue";
const props = defineProps(['parties', 'members', 'promises'])

let siteSearchTerm = ref('')

const setSearchTerm = (searchTerm) => {

    siteSearchTerm.value = searchTerm
    console.log(siteSearchTerm.value)
}

const filteredSite = computed(() => {
    let items = []
    if (siteSearchTerm.value != '') {
        items = props.members.filter(
            member => member.nameDisplayAs.toLowerCase().includes(siteSearchTerm.value.toLowerCase()) ||
                member.party.name.toLowerCase().includes(siteSearchTerm.value.toLowerCase()))
    }

    return items
})


const randomMemberId = Math.floor(Math.random() * props.members.length);

const randomMember = computed(() => {
    return props.members.filter(item => item.id == (randomMemberId))
})
</script>

<style lang="scss" scoped></style>
