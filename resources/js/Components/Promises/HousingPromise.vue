<template>
    <div class="card md:basis-1/3 p-4 bg-red-600 text-white rounded mt-4">
        <div class="card-header">

            <div class="card-header-img">
                <h1 class="font-bold text-2xl w-full mx-auto">
                    The Housing Promise
                </h1>
                <img :src="'../storage/assets/images/rayner.png'" alt="" />
            </div>
        </div>
        <div id="housing" class="card-body mt-4">
            <table class="bg-slate-600 text-white w-full">
                <tbody>
                    <tr class="border-b">
                        <td class="font-semibold p-4 py-2">
                            Days in Government:
                        </td>
                        <td class="font-semibold p-4 py-2">
                            <strong>{{ housing[0].diff }}</strong>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-semibold p-4 py-2">
                            Target House Build:
                        </td>
                        <td class="font-semibold p-4 py-2">
                            <strong>{{ housing[0].targetHouses }}</strong>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-semibold p-4 py-2">
                            Houses built to date:
                        </td>
                        <td class="font-semibold p-4 py-2">
                            <strong>{{ housing[0].housesBuilt }}</strong>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-semibold p-4 py-2">Daily Target:</td>
                        <td class="font-semibold p-4 py-2">
                            <strong>{{ housing[0].dailyTarget }}</strong>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-semibold p-4 py-2">Unbuilt Houses:</td>
                        <td class="font-semibold p-4 py-2">
                            <strong>{{ housing[0].unbuilt.toFixed(0) }}</strong>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-semibold p-4 py-2">
                            New Daily Target:
                        </td>
                        <td class="font-semibold p-4 py-2">
                            <strong>{{ housing[0].newSchedule }}</strong>
                        </td>
                    </tr>
                    <tr class="border-b">
                        <td class="font-semibold p-4 py-2">
                            Builds behind target:
                        </td>
                        <td class="font-semibold p-4 py-2">
                            <strong>{{
                                housing[0].housesOutOfSchedule
                            }}</strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <ShareNetwork
                network="twitter"
                title="Labours Housing Promise"
                hashtags="LabourFail,LabourCantCount"
                twitterUser="donnantwich"
                url="https://thefailurelist.co.uk"

                v-slot="{ share }"
            >
                <span class="hover:cursor-pointer" @click="share"
                    >Share on Twitter</span
                >
            </ShareNetwork>
            <button @click="domImage">Post Image</button>
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

import { ShareNetwork } from "vue3-social-sharing";
var node = document.getElementById('my-node');

function domImage(){
  domtoimage.toJpeg(document.getElementById('housing'), { quality: 0.95 })
  console.log('click')
}


const basePromise = 1500000;
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
        ).toFixed(0),
        weeks: (365 * 5) / 7,
        housesBuilt: 0 + builds.reduce((n, { total }) => n + total, 0),
        unbuilt:
            ((basePromise - builds.reduce((n, { total }) => n + total, 0)) /
                (365 * 5)) *
            differenceInDays(new Date(), new Date("2024/07/05")).toFixed(0),
        diff: differenceInDays(new Date(), new Date("2024/07/05")),
        housesOutOfSchedule: numberWithCommas(
            basePromise - builds.reduce((n, { total }) => n + total, 0)
        ),
        newSchedule: (
            (basePromise - builds.reduce((n, { total }) => n + total, 0)) /
            (365 * 5 - differenceInDays(new Date(), new Date("2024/07/05")))
        ).toFixed(0),
    },
];

console.log(housing);
</script>

