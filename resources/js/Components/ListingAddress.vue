<template>
    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400"> {{ listing.street }} {{ listing.street_nr }}, {{
            listing.city
        }}</p>
</template>

<script setup>
defineProps({
    listing: Object
})
</script>
