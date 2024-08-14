<template>
    <SiteLayout>


        <div class="grid grid-cols-12">

            <div class="col-span-3  p-2">
                <div class=" dark:bg-gray-900 ">
                    <div class="max-w-sm mx-auto  dark:bg-gray-900 rounded-lg overflow-hidden shadow-lg">

                            <div class="min-h-[260px] text-center">
                                <div>
                                    <div class="absolute antialiased mt-2 text-slate-800 ml-1 bg-slate-200 rounded-r-md p-1 border-1 text-xs"
                                        v-if="member.government">Government</div>
                                    <div class="absolute antialiased mt-2 text-slate-800 ml-1 bg-slate-200 rounded-r-md p-1 border-1 text-xs"
                                        v-if="member.opposition">Oppostion</div>
                                    <img class="rounded-lg  dark:border-gray-800 mx-auto my-4"
                                        :src="'/storage/assets/images/members/thumbnails/' + member.slug + '.jpeg'" alt="">
                                </div>
                            </div>
                            <div class="py-2">
                                <h3 class="font-semibold text-lg text-gray-800 dark:text-white mb-1">
                                    {{ member.nameDisplayAs }}</h3>
                                <div class="inline-flex text-gray-700 dark:text-gray-300 items-center">
                                    <span v-if="member.membershipStartDate === '2024-07-04 00:00:00'"
                                        class="rounded mx-2 my-2 px-2 text-xs bg-purple-700">Noob</span>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
            <div class="col-span-9 bg-orange-500 p-2">Right</div>



        </div>
    </SiteLayout>
</template>

<script setup>
import SiteLayout from '@/Layouts/SiteLayout.vue';
defineProps(['party', 'member'])
</script>

<style lang="scss" scoped></style>
