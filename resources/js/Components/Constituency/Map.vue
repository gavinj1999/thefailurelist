<script setup>
import { GoogleMap, Polygon } from 'vue3-google-map'

const props = defineProps(['geometry'])

const triangleCoords = JSON.parse(props.geometry.value);

const constituencyPolygon = {
paths:triangleCoords,
  strokeColor: '#FF0000',
  strokeOpacity: 0.8,
  strokeWeight: 2,
  fillColor: '#FF0000',
  fillOpacity: 0.35,
}

const coordArrayLength = triangleCoords.length
const coord1 = triangleCoords[0]
const coord2 = triangleCoords[Number(coordArrayLength-1)]
const mid_point = ([x1, y1], [x2, y2]) => [(x1 + x2) / 2, (y1 + y2) / 2];
const centerPoint = mid_point([coord2.lat,coord2.lng],[coord1.lat, coord1.lng])
console.log(centerPoint)
const center = { lat: centerPoint[0], lng: centerPoint[1] }



</script>

<template>

    <GoogleMap
    api-key="AIzaSyCc0eFGvayI9zL2wz29wgQG-1dyFVBnPAU"
    style="width: 100%; height: 500px"
    :center="center"
    :zoom="10"

    >
    <Polygon
    :options="constituencyPolygon"
     />
    </GoogleMap>

  </template>
