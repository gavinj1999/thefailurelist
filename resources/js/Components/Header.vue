<template>
    <div class="container rounded-md mt-4 mx-auto bg-slate-400 text-white">
        <div class="py-2 p-6 flex flex-row gap-4 justify-between font-medium">

            <div><a class="hover:text-gray-900" href="/">Home</a></div>
            <div v-for="menu in menus">
                <a class="hidden lg:block hover:text-gray-900" :href="menu.slug">{{
                    menu.title
                    }}</a>

                <div>

                </div>
            </div>

            <div class="pr-6 lg:hidden">
                <button @click="showMobileMenu = !showMobileMenu">Toggle</button>
                <div class="mt-4 absolute overflow-auto px-4 float-left text-black bg-green-300 right-14"
                    v-if="showMobileMenu">
                    <ul>
                        <li v-for="menu in menus" class="pt-2 px-4 py-2">
                            <a :href="menu.slug">{{ menu.title }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</template>

<script setup>
import { ref } from "vue";

const menus = [
    {
        slug: "/parties",
        title: "Parties",
    },
    {
        slug: "/members",
        title: "Members",
    },
    {
        slug: "/constituencies",
        title: "Constituencies",
    },
    {
        slug: "/government",
        title: "Government",
    },
    {
        slug: "/opposition",
        title: "Opposition",
    },
];

const showMobileMenu = ref(false); // hiding it by default
const showPartyMenu = ref(false);

defineProps(['parties'])
</script>

<style></style>
