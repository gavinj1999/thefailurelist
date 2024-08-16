<template>

    <div class="flex justify-between mt-4">
        <div>
            <input class="rounded-full border-4 border-white active:border-indigo-600 focus:border-4  w-full "
                type="text" placeholder="Search member" @input="memberSearch" />
        </div>

        <div>
            <div class="relative flex items-center w-full py-3">
                <button @click="show = !show"
                    class="w-full flex items-center justify-center py-2 px-4 text-sm font-medium bg-gray-500 rounded-md text-gray-100">
                    Party Filter
                </button>
                <div v-if="show" class="absolute top-12 right-0 z-10 w-72 p-3 bg-white rounded-lg shadow">
                    <h6 class="mb-3 text-sm font-medium text-gray-900">
                        Party
                    </h6>
                    <ul class="space-y-2 text-sm">
                        <li v-for="(party, index) in props.parties">
                            <input @change="partyFilter" :id="'party_' + index" :value="party.party_id" type="checkbox"
                                class="w-4 h-4 bg-gray-100">
                            <label :for="'party_' + index" class="ml-2 text-sm font-medium text-gray-900">{{ party.name
                                }}</label>
                        </li>
                        <li>
                            <button @click="clearPartyFilter">Clear</button>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

</template>

<script setup>
import { ref, computed } from "vue";
const props = defineProps(['members', 'parties'])
const emit = defineEmits(['siteSearch', 'siteSort', 'partyFilter', 'clearPartyFilter'])


let show = ref(false)

function clearPartyFilter(){

    emit('clearPartyFilter', 0)
}

const memberSearch = (e) => {
    emit('siteSearch', e.target.value)
}

const siteSort = (e) => {
    emit('siteSort', e.target.value)
}

const partyFilter = (e) => {

    emit('partyFilter', e.target.value)
}
</script>

<style scoped></style>
