<template>
    <div class="mt-2 text-lg  text-gray-800 dark:text-gray-400"> {{ listing.street }} <span class="font-bold">{{
            listing.beds
        }}</span> bds <span class="text-gray-400">| </span>
        <span class="font-bold">{{ listing.baths }}</span> ba <span
            class="text-gray-400"
        >| </span>
        <span class="font-bold">{{ listing.area }}</span> m²
    </div>
</template>

<script setup>
defineProps({
    listing: Object
})
</script>
