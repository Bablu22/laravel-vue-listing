<template>
    <div class="bg-white dark:bg-gray-800 p-4 rounded  mb-4">
        <form @submit.prevent="filter" class="flex flex-wrap -mx-2">
            <div class="w-full md:w-1/6 px-2 mb-4">
                <label for="priceFrom" class="block text-sm text-gray-700 dark:text-gray-300">Price From</label>
                <input type="text" id="priceFrom" v-model="filterForm.priceFrom" class="input" placeholder="Price From">
            </div>
            <div class="w-full md:w-1/6 px-2 mb-4">
                <label for="priceTo" class="block text-sm text-gray-700 dark:text-gray-300">Price To</label>
                <input type="text" id="priceTo" v-model="filterForm.priceTo" class="input" placeholder="Price To">
            </div>
            <div class="w-full md:w-1/6 px-2 mb-4">
                <label for="beds" class="block text-sm text-gray-700 dark:text-gray-300">Beds</label>
                <select v-model="filterForm.beds" class="input">
                    <option :value="null">Beds</option>
                    <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                    <option>6+</option>
                </select>
            </div>
            <div class="w-full md:w-1/6 px-2 mb-4">
                <label for="baths" class="block text-sm text-gray-700 dark:text-gray-300">Baths</label>
                <select v-model="filterForm.baths" class="input">
                    <option :value="null">Baths</option>
                    <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
                    <option>6+</option>
                </select>
            </div>
            <div class="w-full md:w-1/6 px-2 mb-4">
                <label for="areaFrom" class="block text-sm text-gray-700 dark:text-gray-300">Area From</label>
                <input type="text" id="areaFrom" v-model="filterForm.areaFrom" class="input" placeholder="Area From">
            </div>
            <div class="w-full md:w-1/6 px-2 mb-4">
                <label for="areaTo" class="block text-sm text-gray-700 dark:text-gray-300">Area To</label>
                <input type="text" id="areaTo" v-model="filterForm.areaTo" class="input" placeholder="Area To">
            </div>
            <div class="w-full md:w-1/6 px-2 mb-4 flex items-center">
                <button type="submit"
                        class="bg-teal-600 hover:bg-blue-600 text-white font-bold text-sm py-2 px-4 rounded mr-2">Filter
                </button>
                <button type="button" @click="clear"
                        class="bg-gray-500 hover:bg-gray-600 text-white font-bold text-sm py-2 px-4 rounded">Clear
                </button>
            </div>
        </form>
    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    filters: Object,
})

const filterForm = useForm({
    priceFrom: props.filters.priceFrom ?? null,
    priceTo: props.filters.priceTo ?? null,
    beds: props.filters.beds ?? null,
    baths: props.filters.baths ?? null,
    areaFrom: props.filters.areaFrom ?? null,
    areaTo: props.filters.areaTo ?? null,
})

const filter = () => {
    filterForm.get(
        route('listing.index'),
        {
            preserveState: true,
            preserveScroll: true,
        },
    )
}

const clear = () => {
    filterForm.priceFrom = null
    filterForm.priceTo = null
    filterForm.beds = null
    filterForm.baths = null
    filterForm.areaFrom = null
    filterForm.areaTo = null
    filter()
}
</script>

