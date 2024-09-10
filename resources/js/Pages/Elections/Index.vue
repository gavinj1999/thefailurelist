<template>
    <SiteLayout>
        {{ sortedQuotes.length }}
        <div class="p-4">
            <div class="grid grid-cols-8 grid-header text-sm">
                <div>Thumbnail</div>
                <div>Member</div>
                <div>Party</div>
                <div>Constituency</div>
                <div>Electorate</div>
                <div>
                    <div>Tournout </div>
                    <div><input @click="turnoutSort" type="checkbox"></div>
                </div>
                <div>Turnout Percentage</div>
                <div>
                    <div>Majority </div>
                    <div><input @click="majoritySort" type="checkbox"></div>

                </div>
            </div>
            <div>
                <h3>Filter Sliders</h3>
                <div>
                    <h3>Majority</h3>
                    <div class="flex">

                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">min</span>
                        <input @change="majorityRange" class="w-full" type="range" :value="majRange" :min="minMajority"
                            :max="maxMajority">
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">Max</span>
                        <span
                            class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ majRange }}</span>
                    </div>

                </div>
            </div>
            <div v-for="election in sortedQuotes" class="table-data grid grid-cols-8 py-2 px-2 my-2 rounded-md text-sm"
                :style="'background-color: #' + election.backgroundColour + '; color: #' + election.foregroundColour + ';'">
                <div class="self-center"><img class="rounded-full w-12"
                        :src="'/storage/assets/images/members/thumbnails/' + election.member.slug + '.jpeg'" alt="">
                </div>
                <div class="self-center"><a :href="'/member/' + election.member.slug">{{ election.member.nameDisplayAs
                        }}</a></div>
                <div class="self-center">{{ election.winning_party }}</div>
                <div class="self-center">{{ election.constituencyName }}</div>
                <div class="self-center">{{ election.electorate }}</div>
                <div class="self-center">{{ election.turnout }}</div>
                <div class="self-center">{{ ((election.turnout / election.electorate) * 100).toFixed(2) }} %</div>
                <div class="self-center">{{ election.majority }}</div>
            </div>
        </div>
    </SiteLayout>
</template>

<script setup>
import { ref, computed } from 'vue'
import SiteLayout from '@/Layouts/SiteLayout.vue';

const maxMajority = computed(() => {
    let max = props.elections.reduce((a, b) => Number(a.majority) > Number(b.majority) ? a : b)
    return Number(max.majority)
})

const minMajority = computed(() => {
    let min = props.elections.reduce((a, b) => Number(b.majority) > Number(a.majority) ? a : b)
    return Number(min.majority)
})

const props = defineProps(['elections'])

let memberName = ref('')
let winningParty = ref('')
let majRange = ref(50000)
let electorateRef = ref(true)
let turnout = ref(true)
let majority = ref(true)

const sortMajority = ref('asc');
const sortElectorate = ref('desc');
const sortTurnout = ref('asc');

const majoritySort = () => {

    if (sortMajority.value === 'desc') {
        sortMajority.value = 'asc';
    } else {
        sortMajority.value = 'desc';
    }
};

const turnoutSort = () => {
    console.log('turnoutSort')
    if (sortTurnout.value === 'desc') {
        sortTurnout.value = 'asc';
    } else {
        sortTurnout.value = 'desc';
    }

};

const majorityRange = (e) => {
    majRange.value = (Number(e.target.value))
}

const sortedQuotes = computed(() => {
    let quotesCopy = props.elections;

    if (sortMajority.value === 'desc') {
        quotesCopy = quotesCopy.sort((a, b) => b.majority - a.majority);

    }
    else if (sortTurnout.value === 'desc') {
        quotesCopy = quotesCopy.sort((a, b) => b.turnout - a.turnout);

    }
    else if (sortMajority.value === 'asc') {
        quotesCopy = quotesCopy.sort((a, b) => a.majority - b.majority);

    }

    else if (sortTurnout.value === 'asc') {
        quotesCopy = quotesCopy.sort((a, b) => a.turnout - b.turnout);

    }

    if (maxMajority.value != majRange) {
        quotesCopy = quotesCopy.filter((item) => item.majority <= majRange.value)

    }

    return quotesCopy

});





</script>

<style lang="scss" scoped></style>
