<template>
    <SiteLayout>
        <div class="grid sm:grid-cols-3 xs:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5 gap-4 mt-4">
            <div v-for="party in parties" class="col-span-1">
                <div class="flex flex-col justify-between">
                    <div class="min-h-[180px]"
                        :style="'background-color: ' + party.backgroundColour + '; color: ' + party.foregroundColour + ';'">
                        <!-- <img :src="'/storage/assets/images/parties/party_' + party.party_id + '.webp'" alt=""> -->
                    </div>
                    <main class="h-[100px] mb-auto p-2 font-semibold" :style="'background-color: ' +
                        party.backgroundColour +
                        '; color: ' +
                        party.foregroundColour +
                        ';'
                        ">




                        <div class="text-center mt-2">{{ party.name }}</div>
                        <div class="text-center mt-2 text-sm">{{ party.members.length }} Members</div>
                    </main>
                    <footer class="text-center mt-2">
                        <a :href="'/party/' + party.slug">
                            <button class="bg-blue-200 text-gray-700 px-4 py-1 rounded">
                                More
                            </button>
                        </a>
                    </footer>
                </div>
            </div>
        </div>
    </SiteLayout>
</template>

<script setup>
import SiteLayout from "@/Layouts/SiteLayout.vue";
defineProps(["parties"]);
</script>

<style lang="scss" scoped></style>
