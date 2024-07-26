<template>
    <Bar
      id="my-chart-id"
      :options="chartOptions"
      :data="chartData"
    />
  </template>
  
  <script>
  import { Bar } from 'vue-chartjs'
  import { Chart as ChartJS, Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale } from 'chart.js';
  import annotationPlugin from 'chartjs-plugin-annotation';

  
  ChartJS.register(Title, Tooltip, Legend, BarElement, CategoryScale, LinearScale)
  
  export default {
    name: 'BarChart',
    components: { Bar },
    data() {
      return {
        chartData: {
          labels: [ '2024', '2025', '2026', '2027', '2028', '2029' ],
          datasets: [ {
            label: 'Houses Built',
            backgroundColor: '#f87979',
             data: [0,0,0,0,0,0]
             } ]
        },
        chartOptions: {
          responsive: true
        }
      }
    }
  }
  </script>