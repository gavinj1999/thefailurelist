<template>
    <SiteLayout>
        <Search :members="members" :parties="parties" @siteSearch="memberSearch" @siteSort="siteSorter"
            @partyFilter="handlePartyFilter" @clearPartyFilter="handleClearPartyFilter" />
        <div class="flex justify-end">
            <div class="mt-4 ">
                {{ filteredMembers.length }} members displayed
            </div>
        </div>

        <div class="grid gap-4 mt-4 sm:grid-cols-3 xs:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6">

            <div v-for="member in filteredMembers" class="col-span-1">
                <Member :member="member" />
            </div>
        </div>
    </SiteLayout>
</template>

<script setup>
import { ref, computed } from "vue";
import SiteLayout from '@/Layouts/SiteLayout.vue';
import Search from '@/Components/Search.vue'
import Member from "@/Components/Cards/Member.vue";

const props = defineProps(['members', 'parties'])


const selectedMember = ref('')
const selectedSort = ref('')
const selectedParties = ref([])
const memberSearch = (memberSearch) => {
    console.log(selectedMember.value)
    selectedMember.value = memberSearch;
};

const siteSorter = (siteSort) => {
    console.log(selectedSort.value)
    selectedSort.value = siteSort


}

const handleClearPartyFilter = (partyFilter) => {
    selectedParties.value.splice(0, selectedParties.value.length)
}

const handlePartyFilter = (partyFilter) => {
    console.log(partyFilter)
    if (selectedParties.value.includes(parseInt(partyFilter))) {
        return selectedParties.value.splice(selectedParties.value.indexOf(partyFilter), 1)
    }

    return selectedParties.value.push(parseInt(partyFilter))
}

const filteredMembers = computed(() => {
    let items = props.members
    if (selectedMember != '') {
        items = items.filter(item => item.nameDisplayAs.toLowerCase().includes(selectedMember.value)

        )
    }

    if (selectedParties.value.length) {
        items = items.filter(item => selectedParties.value.includes(item.party.party_id))
    }


    return items
})

function test(words) {
    var n = words.split(" ");
    return n[n.length - 1];

}

</script>

<style lang="scss" scoped></style>
