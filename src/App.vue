<script setup>
import LineChart from "./components/LineChart.vue";
import Tweets from "./components/Tweets.vue";
import Housing from "./components/Housing.vue";
import VueHtml2Canvas from 'vue-html2canvas';
 

</script>

<template>            


  <div class="poppins-regular">
     <Housing />   
</div>
</template>

<style scoped>
header {
  line-height: 1.5;
}

.logo {
  display: block;
  margin: 0 auto 2rem;
}

@media (min-width: 1024px) {
  header {
    display: flex;
    place-items: center;
    padding-right: calc(var(--section-gap) / 2);
  }

  .logo {
    margin: 0 2rem 0 0;
  }

  header .wrapper {
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  }
}
</style>
