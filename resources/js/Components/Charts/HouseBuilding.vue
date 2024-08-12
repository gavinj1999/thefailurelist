<template>
    <div>
        dfsfsd
        <Line :data="data.labels" :options="options" />
        vcxvxcv
    </div>
</template>

<script setup>
import { Line, Bar } from 'vue-chartjs'
import {
  Chart as ChartJS,
  CategoryScale,
  LinearScale,
  PointElement,
  LineElement,
  Title,
  Tooltip,
  Legend
} from '../../../../node_modules/chart.js'


const months = 60
const targets = 1500000
const monthly = targets / months

const data = {
  labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
  datasets: [
    {
      label: 'Data One',
      backgroundColor: '#f87979',
      data: [40, 39, 10, 40, 39, 80, 40]
    }
  ]
}

const options = {
  responsive: true,
  maintainAspectRatio: false
}


</script>

<style lang="scss" scoped>

</style>
