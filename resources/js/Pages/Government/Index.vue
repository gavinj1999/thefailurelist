<template>
  <SiteLayout>

    <div id="wrapper" class="grid gap-4 mt-4 sm:grid-cols-3 xs:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6">

      <div id="post" class="min-h-36" v-for="(post, index) in government">


        <div v-if="post.member" class="bg-gray-200 dark:bg-gray-900">

            <!-- Card start -->
            <div class="max-w-sm mx-auto overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-900">
                <div class="px-4 pb-6 border-b">
                    <div class="min-h-[260px] text-center my-4">
                        <img  class="mx-auto my-4 border-4 border-white rounded-lg dark:border-gray-800"
                            :src="'/storage/assets/images/members/thumbnails/'+post.member.slug+'.jpeg'" alt="image">
                        <div class="py-2">
                            <div>
                            <h3 class="mb-1 text-xl font-bold text-gray-800 dark:text-white">
                                {{ post.member.nameDisplayAs }}</h3>
                            </div>
                            <div>
                            <h5 class="text-sm min-h-16">{{ post.hansardName }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="flex gap-2 px-2">
                        <button
                            class="flex-1 px-4 py-2 antialiased font-bold text-white bg-blue-600 rounded-full dark:bg-blue-800 dark:text-white hover:bg-blue-800 dark:hover:bg-blue-900">
                            <a :href="'/member/' + post.member.slug">More</a>
                        </button>
                    </div>
                    <div class="flex gap-2 px-2">
                        <div v-if="post.government || post.opposition">
                            <span v-if="post.government">{{ post.government.name}}</span>
                            <span v-if="post.opposition">{{ post.opposition.name}}</span>  </div>
                    </div>
                </div>
            </div>
        </div>
        <div v-else>{{post.member_id}}</div>
        <!-- <strong>{{ post.name }}</strong>
        <div v-if="post.member"
          ><a :href="'/member/' + post.post.slug">{{
            post.post.nameDisplayAs
          }}</a></div
        > -->



      </div>
</div>
  </SiteLayout>
</template>

<script setup>
import SiteLayout from "@/Layouts/SiteLayout.vue";
defineProps(["government"]);
</script>

<style lang="scss" scoped></style>
