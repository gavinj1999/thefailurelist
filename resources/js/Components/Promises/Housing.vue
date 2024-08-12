<template>
    <SiteLayout>
        <div class="flex gap-2">
            <HousingPromise />
            <HealthPromise />
            <EducationPromise />
        </div>
    </SiteLayout>
</template>

<script setup>

import HousingPromise from "@/Components/Promises/HousingPromise.vue";
import HealthPromise from "@/Components/Promises/HealthPromise.vue";
import EducationPromise from "@/Components/Promises/EducationPromise.vue";

import SiteLayout from "@/Layouts/SiteLayout.vue";
</script>

<style lang="scss" scoped></style>
