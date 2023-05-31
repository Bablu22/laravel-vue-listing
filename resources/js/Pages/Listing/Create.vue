<template>
    <div>
        <form class="w-full mx-auto bg-white shadow rounded-lg p-6 dark:bg-gray-800" @submit.prevent="create">
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label class="label" for="beds">Beds:</label>
                    <input
                        class="input"
                        type="number"
                        id="beds"
                        v-model.number="property.beds"
                        placeholder="Enter number of beds">
                    <p class="error">{{ property.errors.beds }}</p>
                </div>

                <div class="mb-4">
                    <label class="label" for="baths">Baths:</label>
                    <input
                        class="input"
                        type="number"
                        id="baths"
                        v-model.number="property.baths"
                        placeholder="Enter number of baths">
                    <p class="error">{{ property.errors.baths }}</p>
                </div>

                <div class="mb-4">
                    <label class="label" for="area">Area:</label>
                    <input
                        class="input"
                        type="number"
                        id="area"
                        v-model.number="property.area"
                        placeholder="Enter property area">
                    <p class="error">{{ property.errors.area }}</p>
                </div>

                <div class="mb-4">
                    <label class="label" for="city">City:</label>
                    <input
                        class="input"
                        type="text"
                        id="city"
                        v-model="property.city"
                        placeholder="Enter city">
                    <p class="error">{{ property.errors.city }}</p>
                </div>

                <div class="mb-4">
                    <label class="label" for="code">Code:</label>
                    <input
                        class="input"
                        type="number"
                        id="code"
                        v-model="property.code"
                        placeholder="Enter code">
                    <p class="error">{{ property.errors.code }}</p>
                </div>

                <div class="mb-4">
                    <label class="label" for="street">Street:</label>
                    <input
                        class="input"
                        type="text"
                        id="street"
                        v-model="property.street"
                        placeholder="Enter street">
                    <p class="error">{{ property.errors.street }}</p>
                </div>

                <div class="mb-4">
                    <label class="label" for="street_nr">Street Nr:</label>
                    <input
                        class="input"
                        type="number"
                        id="street_nr"
                        v-model="property.street_nr"
                        placeholder="Enter street number">
                    <p class="error">{{ property.errors.street_nr }}</p>
                </div>

                <div class="mb-4">
                    <label class="label" for="price">Price:</label>
                    <input
                        class="input"
                        type="number"
                        id="price"
                        v-model.number="property.price"
                        placeholder="Enter price">
                    <p class="error">{{ property.errors.price }}</p>
                </div>
            </div>

            <div class="text-cente">
                <button
                    class="px-14 py-2 text-white bg-blue-500 rounded hover:bg-blue-600 dark:bg-blue-700 dark:hover:bg-blue-600"
                    type="submit">Submit
                </button>
            </div>
        </form>

    </div>
</template>

<script setup>
import {useForm} from "@inertiajs/vue3";

const property = useForm({
    beds: "",
    baths: "",
    area: "",
    city: "",
    street: "",
    code: "",
    street_nr: "",
    price: "",
})
const create = () => property.post(route('listing.store'));
</script>

<style scoped>
input {
    display: block;
}

label {
    display: block;
}
</style>
