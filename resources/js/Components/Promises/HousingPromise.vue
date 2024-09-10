<template>

    <div class="flex items-center gap-4 text-sm my-6">
        <div class="basis-1/5">
            <img class="size-16 rounded-full"
                :src="'/storage/assets/images/members/thumbnails/' + promise.member.slug + '.jpeg'" alt="" />
        </div>
        <div class="basis-1/6">
            <p class="font-bold w-full mx-auto">
                The {{ promise.name }} Promise
            </p>
        </div>
        <div class="basis-1/6">
            <div>
                <p>Days in Government</p>
            </div>
            <div> <strong>{{ housing[0].diff }}</strong></div>

        </div>
        <div class="basis-1/6">
            <div>
                <p>Target</p>
            </div>
            <div><strong>{{ housing[0].targetHouses }}</strong></div>

        </div>
        <div class="basis-1/6">
            <div>
                <p>To Date</p>
            </div>
            <div><strong>{{ housing[0].housesBuilt }}</strong></div>

        </div>
        <div class="basis-1/6">
            <div>
                <p>Daily Target</p>
            </div>
            <div> <strong>{{ housing[0].dailyTarget }}</strong></div>

        </div>
        <div class="basis-1/5">
            <div>
                <p>Unmet</p>
            </div>
            <div><strong>{{ housing[0].unbuilt.toFixed(2) }}</strong></div>

        </div>
        <div class="basis-1/5">
            <div>
                <p>New Daily Target</p>
            </div>
            <div><strong>{{ housing[0].newSchedule }}</strong></div>

        </div>
        <div class="basis-1/5">
            <div>
                <p>Behind Target</p>
            </div>
            <div><strong>{{ housing[0].housesOutOfSchedule }}</strong></div>

        </div>

    </div>

</template>

<script setup>
import {
    format,
    compareAsc,
    formatDistanceToNow,
    differenceInDays,
} from "date-fns";
import domtoimage from 'dom-to-image-more';
const props = defineProps(['promise'])
import { ShareNetwork } from "vue3-social-sharing";
var node = document.getElementById('my-node');

function domImage() {
    domtoimage.toJpeg(document.getElementById('housing'), { quality: 0.95 })
    console.log('click')
}


const basePromise = parseInt(props.promise.target);
const builds = [
    {
        date: "23/07/2024",
        total: 0,
    },
];
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
const housing = [
    {
        targetHouses: numberWithCommas(basePromise),
        buildTotal: builds.reduce((n, { total }) => n + total, 0),
        monthlyTarget: basePromise / 60,
        daysUntil: 365 * 5,
        dailyTarget: (
            (basePromise - builds.reduce((n, { total }) => n + total, 0)) /
            (365 * 5)
        ).toFixed(2),
        weeks: (365 * 5) / 7,
        housesBuilt: 0 + builds.reduce((n, { total }) => n + total, 0),
        unbuilt:
            ((basePromise - builds.reduce((n, { total }) => n + total, 0)) /
                (365 * 5)) *
            differenceInDays(new Date(), new Date("2024/07/05")).toFixed(2),
        diff: differenceInDays(new Date(), new Date("2024/07/05")),
        housesOutOfSchedule: numberWithCommas(
            basePromise - builds.reduce((n, { total }) => n + total, 0)
        ),
        newSchedule: (
            (basePromise - builds.reduce((n, { total }) => n + total, 0)) /
            (365 * 5 - differenceInDays(new Date(), new Date("2024/07/05")))
        ).toFixed(2),
    },
];

console.log(housing);
</script>
