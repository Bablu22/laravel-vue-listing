<template>
    <Box>
        <div>
            <div class="flex items-center gap-1">
                <Price
                    :price="listing.price"
                    class="text-2xl font-bold text-gray-800 dark:text-gray-300"
                />
                <div class="text-xs text-gray-800 dark:text-gray-400">
                    <Price :price="monthlyPayment"/>
                    pm
                </div>
            </div>
            <listing-space :listing="listing"/>
            <listing-address :listing="listing"/>
        </div>
        <div class="w-full mt-4">
            <Link :href="route('listing.show',{listing:listing.id})"
                  as="button"
                  class="px-4 py-1 rounded dark:text-gray-200 bg-teal-900 text-white flex items-center justify-center w-full space-x-1">
                <EyeIcon class="mr-1"/>
                Preview
            </Link>
        </div>
    </Box>
</template>

<script setup>
import ListingAddress from "@/Components/ListingAddress.vue";
import Price from "@/Components/Price.vue";
import ListingSpace from "@/Components/ListingSpace.vue";
import Box from "@/Components/UI/Box.vue";
import {Link} from "@inertiajs/vue3";
import {useMonthlyPayment} from "@/Composable/useMonthlyPayment.js";
import EyeIcon from "@/Icons/EyeIcon.vue";

const props = defineProps({listing: Object})
const {monthlyPayment} = useMonthlyPayment(
    props.listing.price, 2.5, 25,
)

</script>

<style scoped>

</style>
