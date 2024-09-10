<template>
    <!-- component -->
<!-- Create By Joker Banny -->
<div class="max-w-sm bg-white px-6 pt-6 pb-2 rounded-xl shadow-lg transform hover:scale-105 transition duration-200">
    <h3 class="mb-3 text-lg font-bold text-indigo-600"><a :href="'/party/'+member.party.slug">{{member.party.name}}</a></h3>
    <div class="relative">
      <img class="w-full rounded-xl" :src="'/storage/assets/images/members/thumbnails/'+member.slug+'.jpeg'" alt="Colors">
      <p v-if="member.government || member.opposition" class="absolute top-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-3 text-xs rounded-br-lg rounded-tl-lg">
        <span v-if="member.government">{{ member.government.name}}</span>
        <span v-if="member.opposition">{{ member.opposition.name}}</span>

    </p>
      <p v-if="member.membershipStartDate == '2024-07-04 00:00:00'" class="absolute top-0 right-0 bg-yellow-300 text-gray-800 font-semibold py-1 px-2 rounded-tr-lg rounded-bl-lg text-xs">

        Noob

    </p>
    </div>
    <h1 class="mt-4 text-gray-800 text-xl font-bold cursor-pointer">{{ member.nameDisplayAs }}</h1>
    <div class="my-4">
        <div class="h-100">
           <div class="flex space-x-1 items-center">
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-indigo-600 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
          </svg>
        </span>
        <p v-if="member.constituency" class="text-xs">{{ member.constituency.constituencyName }}</p>
      </div>
      <div class="flex space-x-1 items-center">
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-indigo-600 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
          </svg>
        </span>
        <p v-if="member.election" class="text-xs">{{ member.election.majority }}</p>
      </div>
      <div class="flex space-x-1 items-center">
        <span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 text-indigo-600 mb-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
          </svg>
        </span>
        <p class="text-xs">{{ member.gender }}</p>
      </div>
        </div>

      <button class="mt-4 text-md w-full text-white bg-indigo-600 py-2 rounded-xl shadow-lg"><a :href="'/member/'+member.slug">More</a></button>
    </div>
  </div>
</template>

<script setup>
defineProps(['member'])
</script>

<style lang="scss" scoped>

</style>
