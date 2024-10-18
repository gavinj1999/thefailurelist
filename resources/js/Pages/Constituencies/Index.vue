<script setup>
import SiteLayout from '@/Layouts/SiteLayout.vue';
import { GoogleMap, Polygon } from 'vue3-google-map'
const props = defineProps(['geometry','constituencies'])
const center = {lat:54.4, lng: -3.89}
const geoBoundary = [
  { lat: 25.774, lng: -80.19 },
  { lat: 18.466, lng: -66.118 },
  { lat: 32.321, lng: -64.757 },
  { lat: 25.774, lng: -80.19 },
]


const constituencyMap = {
  paths: geoBoundary,
  strokeColor: '#FF0000',
  strokeOpacity: 0.8,
  strokeWeight: 2,
  fillColor: '#FF0000',
  fillOpacity: 0.35,
}

const boundaries = {}

for (const key in props.geometry) {

  boundaries[key] = {
    paths:JSON.parse(props.geometry[key].value),
    strokeColor: '#'+props.geometry[key].constituency.backgroundColour,
    strokeOpacity: 0.8,
    strokeWeight: 2,
    fillColor: '#'+props.geometry[key].constituency.backgroundColour,
    fillOpacity: 0.45,

  }
}
console.log(boundaries)
</script>

<template>
<SiteLayout>
     <ul>
        <li v-for="geo in constituencies">
            <p>{{ geo.constituencyName }}</p>
        </li>
    </ul>
    <GoogleMap
    api-key="AIzaSyCc0eFGvayI9zL2wz29wgQG-1dyFVBnPAU"
    style="width: 100%; height: 100vw"
    :center="center"
    :zoom="7"

    >
    <Polygon v-for="geo in boundaries"
    :key="i"
    :options="geo"
    />
    </GoogleMap>

</SiteLayout>
</template>



<style lang="scss" scoped>

</style>
