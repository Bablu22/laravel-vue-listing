<template>
    <div>
        <div v-if="!listings">
            <!-- Preloader HTML code -->
            <div class="preloader">Loading...</div>
        </div>
        <div v-else>
            <Filter :filters="filters"/>
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                <Listing v-for="listing in listings.data" :key="listing.id" :listing="listing"/>
            </div>
            <section v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
                <Pagination :links="listings.links"/>
            </section>
        </div>
    </div>
</template>


<script setup>
import Listing from "@/Pages/Listing/Index/Components/Listing.vue";
import Filter from "@/Pages/Listing/Index/Components/Filter.vue";
import Pagination from "@/Components/UI/Pagination.vue";

defineProps({
    listings: Object,
    filters: Object
})
</script>

<style scoped>

</style>
