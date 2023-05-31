<template>
    <section>
        <h1 class="text-3xl mb-4">Your Listings</h1>
        <!--        <RealtorFilter/>-->
    </section>
    <section v-if="listings.data.length" class="grid grid-cols-1 lg:grid-cols-3 gap-2">
        <Box v-for="listing in listings.data" :key="listing.id">
            <div
                v-if="listing.sold_at != null"
                class="text-xs font-bold uppercase border border-dashed p-1 border-green-300 text-green-500 dark:border-green-600 dark:text-green-600 inline-block rounded-md mb-2"
            >
                sold
            </div>
            <div>
                <div class="flex items-center gap-1">
                    <Price
                        :price="listing.price"
                        class="text-2xl font-bold text-gray-800 dark:text-gray-300"
                    />
                </div>
                <listing-space :listing="listing"/>
                <listing-address :listing="listing"/>
            </div>

            <div class="mt-5 flex items-center  space-x-3 w-full">
                <Link :href="route('listing.show',{listing:listing.id})"
                      as="button"
                      class="px-4 py-1 rounded dark:text-gray-200 bg-teal-900 text-white flex items-center space-x-1 w-full justify-center">
                    <EyeIcon class="mr-1"/>
                    Preview
                </Link>
            </div>
            <div class="mt-2 flex items-center  space-x-3 w-full">
                <Link
                    :href="route('listing.edit',{listing:listing.id})"
                    as="button"
                    class="px-4 py-1 rounded dark:text-gray-200 bg-indigo-900 text-white flex items-center justify-center space-x-1 w-full">
                    <EditIcon class="mr-1"/>
                    Edit
                </Link>

                <Link :href="route('realtor.listing.destroy',{listing:listing.id})"
                      method="DELETE" as="button"
                      class="px-2 py-1 w-full rounded justify-center bg-rose-700 dark:text-gray-200 dark:bg-rose-900 text-white flex items-center space-x-1">
                    <DeleteIcon class="mr-1"/>
                    Delete
                </Link>
            </div>
            <div class="mt-2 flex items-center  space-x-3 w-full">
                <Link :href="route('realtor.listing.image.create',{listing:listing.id})"
                      as="button"
                      class="px-2 py-1 rounded bg-gray-900 dark:text-gray-800 dark:bg-white text-white flex items-center justify-center space-x-1 w-full">
                    <PhotoIcon class="mr-1"/>
                    Images ({{ listing.images_count }})
                </Link>

                <Link :href="route('realtor.listing.show',{listing:listing.id})"
                      as="button"
                      class="px-2 py-1 rounded bg-gray-900 dark:text-gray-800 dark:bg-white text-white flex items-center justify-center space-x-1 w-full">
                    <PhotoIcon class="mr-1"/>
                    Offers ({{ listing.offers_count }})
                </Link>
            </div>
        </Box>
    </section>
    <EmptyState v-else>No listings yet</EmptyState>

    <section v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
        <Pagination :links="listings.links"/>
    </section>
</template>

<script setup>
import Box from "@/Components/UI/Box.vue";
import ListingSpace from "@/Components/ListingSpace.vue";
import ListingAddress from "@/Components/ListingAddress.vue";
import Price from "@/Components/Price.vue";
import {Link} from "@inertiajs/vue3";
import DeleteIcon from "@/Icons/DeleteIcon.vue";
import EditIcon from "@/Icons/EditIcon.vue";
import EyeIcon from "@/Icons/EyeIcon.vue";
import PhotoIcon from "@/Icons/PhotoIcon.vue";
import Pagination from "@/Components/UI/Pagination.vue";
import EmptyState from "@/Components/UI/EmptyState.vue";

defineProps({
    listings: Object,
})

</script>
