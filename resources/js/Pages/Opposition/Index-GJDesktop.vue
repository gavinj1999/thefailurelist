<template>
    <SiteLayout>

      <div id="wrapper" class="grid sm:grid-cols-3 xs:grid-cols-2 lg:grid-cols-4 xl:grid-cols-6 gap-4 mt-4">

        <div id="post" class="min-h-36" v-for="(post, index) in opposition">


          <div v-if="post.member" class="dark:bg-gray-900 bg-gray-200">

              <!-- Card start -->
              <div class="max-w-sm mx-auto bg-white dark:bg-gray-900 rounded-lg overflow-hidden shadow-lg">
                  <div class="border-b px-4 pb-6">
                      <div class="min-h-[260px] text-center my-4">
                          <img  class="h-32 w-32 rounded-full border-4 border-white dark:border-gray-800 mx-auto my-4"
                          :src="'/storage/assets/images/members/thumbnails/'+post.member.slug+'.jpeg'" alt="image">
                          <div class="py-2">
                              <h3 class="font-bold text-xl text-gray-800 dark:text-white mb-1">
                                  {{ post.member.nameDisplayAs }}</h3>
                              <h5 class="text-sm">{{ post.hansardName }}</h5>

                          </div>
                      </div>
                      <div class="flex gap-2 px-2">
                          <button
                              class="flex-1 rounded-full bg-blue-600 dark:bg-blue-800 text-white dark:text-white antialiased font-bold hover:bg-blue-800 dark:hover:bg-blue-900 px-4 py-2">
                              <a :href="'/member/' + post.member.slug">More</a>
                          </button>
                      </div>
                      <div class="flex gap-2 px-2">
                          <div v-if="post.opposition || post.opposition"> <span v-if="post.opposition">{{ post.opposition.name}}</span> <span v-if="post.opposition">{{ post.opposition.name}}</span>  </div>
                      </div>
                  </div>
              </div>
          </div>
          <div v-else>{{post.member_id}}</div>

        </div>
  </div>
    </SiteLayout>
  </template>

  <script setup>
  import SiteLayout from "@/Layouts/SiteLayout.vue";
  defineProps(["opposition"]);
  </script>

  <style lang="scss" scoped></style>
