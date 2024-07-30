<template>
  <div
    id="image"
    class="rounded-4 py-4 bg-danger text-white text-center text-black"
  >
    <div class="poppins-bold text-9xl p-6">Labours Housebuilding Promise</div>
    <div><img class="w-100" src="../../public/images/rayner.png" alt=""></div>

    <div class="rounded px-4 pt-3">
      <table class="table table-dark">
        <tbody>
          <tr>
            <td>Days in Government:</td>
            <td>
              <strong>{{ housing[0].diff }}</strong>
            </td>
          </tr>
          <tr>
            <td>Target House Build:</td>
            <td>
              <strong>{{ housing[0].targetHouses }}</strong>
            </td>
          </tr>
          <tr>
            <td>Houses built to date:</td>
            <td>
              <strong>{{ housing[0].housesBuilt }}</strong>
            </td>
          </tr>
          <tr>
            <td>Daily Target:</td>
            <td>
              <strong>{{ housing[0].dailyTarget }}</strong>
            </td>
          </tr>
          <tr>
            <td>Unbuilt Houses:</td>
            <td>
              <strong>{{ housing[0].unbuilt.toFixed(0) }}</strong>
            </td>
          </tr>
          <tr>
            <td>New Daily Target:</td>
            <td>
              <strong>{{ housing[0].newSchedule }}</strong>
            </td>
          </tr>
          <tr>
            <td>Builds behind target:</td>
            <td>
              <strong>{{ housing[0].housesOutOfSchedule }}</strong>
            </td>
          </tr>
        </tbody>
      </table>
    
    </div>
  <a :href="'http://twitter.com/share?text=Labours Housebuilding promise, ' + housing[0].unbuilt.toFixed(0) +' behind schedule after '+ housing[0].diff +' days in Government&%20https://pbs.twimg.com/media/GTobX5sXMAAxXbU.png&url=https://thefailurelist.co.uk/&hashtags=LabourFail,LabourSumsNeverAddUp,CarnivalOfFools'">Tweet</a>
  </div>
</template>


<script setup>
import {
  format,
  compareAsc,
  formatDistanceToNow,
  differenceInDays,
} from "date-fns";

import { Facebook } from 'vue-socialmedia-share';

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

</script>

<style>
.bg-rayner {
  padding: 10px 10px 10px 10px;
  background-image: url(../assets/images/rayner.png);
  width:100%;
  background-repeat: no-repeat;
  background-position: left;
  background-size: contain;

  height: 240px;
}
</style>
