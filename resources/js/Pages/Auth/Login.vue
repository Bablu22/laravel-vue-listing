<template>
    <section class="">
        <div class="">
            <div class="relative max-w-md mx-auto mt-6 md:mt-10">
                <div class="overflow-hidden bg-white border dark:border-gray-600 dark:bg-gray-700 rounded-md shadow-md">
                    <div class="px-4 py-6 sm:px-8 sm:py-7">
                        <form @submit.prevent="login">
                            <div class="space-y-5">
                                <div>
                                    <label for="email" class="label">
                                        Email address
                                    </label>
                                    <div
                                        class="mt-2.5 relative text-gray-400 dark:text-gray-300 focus-within:text-gray-600 dark:focus-within:text-gray-500">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <EmailInputIcon/>
                                        </div>
                                        <input
                                            v-model="form.email"
                                            type="email"
                                            name="email"
                                            id="email"
                                            placeholder="Enter email to get started"
                                            class="input block pl-10 py-3 dark:bg-gray-800"
                                        />

                                    </div>
                                    <h6 v-if="form.errors.email"
                                        class="text-sm pt-2 font-medium text-red-500 transition-all">
                                        {{ form.errors.email }}
                                    </h6>
                                </div>

                                <div>
                                    <div class="flex items-center justify-between mt-8">
                                        <label for="password"
                                               class="label">
                                            Password
                                        </label>
                                    </div>
                                    <div
                                        class="mt-2.5 relative text-gray-400 dark:text-gray-300 focus-within:text-gray-600 dark:focus-within:text-gray-500">
                                        <div
                                            class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                            <PasswordInputIcon/>
                                        </div>
                                        <input
                                            v-model="form.password"
                                            type="password"
                                            name="password"
                                            id="password"
                                            placeholder="Enter your password"
                                            class="input block py-3 pl-10 dark:bg-gray-800"
                                        />
                                    </div>
                                    <h6 v-if="form.errors.password"
                                        class="text-sm pt-2 font-medium text-red-500 transition-all">
                                        {{ form.errors.password }}
                                    </h6>
                                </div>
                                <div>
                                    <button
                                        type="submit"
                                        class="primary_button"
                                    >
                                        Log in
                                    </button>
                                </div>

                                <div class="text-center">
                                    <p class="text-base text-gray-600 dark:text-gray-300">
                                        Don’t have an account?
                                        <Link
                                            :href="route('user-account.create')"
                                            title=""
                                            class="font-medium text-orange-500 transition-all duration-200 hover:text-orange-600 dark:text-orange-400 hover:underline"
                                        >
                                            Create a free account
                                        </Link>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>

import {useForm,Link} from "@inertiajs/vue3";
import EmailInputIcon from "@/Icons/EmailInputIcon.vue";
import PasswordInputIcon from "@/Icons/PasswordInputIcon.vue";

const form = useForm({
    email: 'test@test.com',
    password: '12345678',
})
const login = () => form.post(route('login.store'))

</script>

<style scoped>

</style>
