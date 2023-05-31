<template>
    <div>
        <form @submit.prevent="update" class="w-full mx-auto bg-white shadow rounded-lg p-6 dark:bg-gray-800">
            <label class="label" for="beds">Beds:</label>
            <input type="text" id="beds" class="input" v-model.number="property.beds">
            {{ property.errors.beds }}

            <label for="baths">Baths:</label>
            <input type="text" id="baths" class="input" v-model.number="property.baths">
            {{ property.errors.baths }}

            <label for="area">Area:</label>
            <input type="text" id="area" class="input" v-model.number="property.area">
            {{ property.errors.area }}

            <label for="city">City:</label>
            <input type="text" id="city" class="input" v-model="property.city">
            {{ property.errors.city }}

            <label for="code">Code:</label>
            <input type="text" id="code" class="input" v-model="property.code">
            {{ property.errors.code }}

            <label for="street">Street:</label>
            <input type="text" id="street" class="input" v-model="property.street">
            {{ property.errors.street }}

            <label for="street_nr">Street Nr:</label>
            <input type="text" id="street_nr" class="input" v-model.number="property.street_nr">
            {{ property.errors.street_nr }}

            <label for="price">Price:</label>
            <input type="text" id="price" class="input" v-model.number="property.price">
            {{ property.errors.price }}
            <button class="primary_button mt-4" type="submit">Submit</button>
        </form>
    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";

const props = defineProps({
    listing: Object
})

const property = useForm({
    beds: props.listing.beds,
    baths: props.listing.baths,
    area: props.listing.area,
    city: props.listing.city,
    street: props.listing.street,
    code: props.listing.code,
    street_nr: props.listing.street_nr,
    price: props.listing.price,
})
const update = () => property.put(route('listing.update', {listing: props.listing.id}));
</script>

<style scoped>
input {
    display: block;
}

label {
    display: block;
}
</style>
