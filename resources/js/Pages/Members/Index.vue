<template>
    <SiteLayout>
        <Search :members="members" :parties="parties" @siteSearch="memberSearch" @siteSort="siteSorter"
            @partyFilter="handlePartyFilter" @clearPartyFilter="handleClearPartyFilter" />
        <div class="flex justify-end">
            <div class="mt-4 ">
                {{ filteredMembers.length }} members displayed
            </div>
        </div>

        <div class="grid sm:grid-cols-3 xs:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-4">

            <div v-for="member in filteredMembers" class="col-span-1">
                <div class=" dark:bg-gray-900 bg-gray-200">

                    <!-- Card start -->
                    <div class="max-w-sm mx-auto bg-white dark:bg-gray-900 rounded-lg overflow-hidden shadow-lg">

                        <div class="border-b px-4 pb-6">
                            <div class="min-h-[260px] text-center my-4">


                                <div>
                                    <div class="absolute antialiased mt-2 text-slate-800 ml-1 bg-slate-200 rounded-r-md p-1 border-1 text-xs"
                                        v-if="member.government">Government</div>
                                    <div class="absolute antialiased mt-2 text-slate-800 ml-1 bg-slate-200 rounded-r-md p-1 border-1 text-xs"
                                        v-if="member.opposition">Oppostion</div>
                                    <img class="rounded-lg border-4 border-white dark:border-gray-800 mx-auto my-4"
                                        :src="'/storage/assets/images/members/thumbnails/' + member.slug + '.jpeg'" alt="">
                                </div>


                            </div>
                            <div class="py-2">
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-white mb-1">
                                    {{ member.nameDisplayAs }}</h3>
                                <div class="inline-flex text-gray-700 dark:text-gray-300 items-center">
                                    <span class="rounded px-2 text-xs"
                                        :style="'background-color:' + member.party.backgroundColour + ' ; color:' + member.party.foregroundColour + ' ;'">{{
                                            member.party.abbreviation }}</span>

                                    <span v-if="member.membershipStartDate === '2024-07-04 00:00:00'"
                                        class="rounded mx-2 my-2 px-2 text-xs bg-purple-700">Noob</span>

                                </div>


                            </div>

                            <div :class="'flex gap-2 px-2 bg-[' + member.party.backgroundColour + ']'">
                                <button
                                    class="flex-1 rounded-full bg-blue-600 dark:bg-blue-800 text-white dark:text-white antialiased font-bold hover:bg-blue-800 dark:hover:bg-blue-900 px-4 py-2">
                                    <a :href="'/member/' + member.slug">More</a>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </SiteLayout>
</template>

<script setup>
import { ref, computed } from "vue";
import SiteLayout from '@/Layouts/SiteLayout.vue';
import Search from '@/Components/Search.vue'

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
