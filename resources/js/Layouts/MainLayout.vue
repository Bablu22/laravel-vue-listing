<template>
    <div>
        <header :class="{
  'sticky top-0 dark:bg-gray-800 bg-white border-b dark:border-slate-600': sticky,
  'bg-white dark:bg-gray-900 border-b dark:border-slate-600 mb-5': !sticky,
}" class="z-10 transition-colors duration-500">
            <div class="container mx-auto py-4 px-4">
                <div class="flex flex-col items-center sm:flex-row sm:justify-between sm:items-center">
                    <div class="flex items-center space-x-1 mb-3 sm:mb-0">
                        <Link :href="route('listing.index')" class="flex items-center space-x-1">
                            <span><BuildingIcon/></span>
                            <h1 class="text-xl font-bold text-gray-800 dark:text-white">
                                Luxury
                            </h1>
                        </Link>
                        <div v-if="user"
                             class="px-2 py-1 rounded border dark:border-gray-500 block md:hidden dark:text-white sm:block">
                            <div class="flex items-center">
                                <span><UserIcon/></span>
                                <span>{{ user.name }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-3">
                        <div v-if="user" class="flex items-center space-x-3">
                            <Link :href="route('realtor.listing.index')"
                                  class="px-2 py-1 rounded border dark:border-gray-500 dark:text-white hidden md:block ">
                                <div class="flex items-center">
                                    <span><UserIcon/></span>
                                    <span>{{ user.name }}</span>
                                </div>
                            </Link>
                            <div class="px-2 py-1 rounded bg-gray-800 text-white dark:bg-white dark:text-gray-800">
                                <Link :href="route('listing.create')" class="flex items-center space-x-1">
                                    <span><AddIcon/></span>
                                    <span>New Listing</span>
                                </Link>
                            </div>
                            <div class="px-2 py-1 rounded bg-rose-700 text-white ">
                                <Link :href="route('logout')" class="flex items-center space-x-1" method="DELETE"
                                      as="button">
                                    <span><LogoutIcon/></span>
                                    <span>Logout</span>
                                </Link>
                            </div>
                        </div>
                        <div v-else>
                            <div class="px-2 py-1 rounded bg-gray-800 text-white dark:bg-white dark:text-gray-800">
                                <Link :href="route('login')" class="flex items-center space-x-1">
                                    <span><LoginIcon/></span>
                                    <span>Login</span>
                                </Link>
                            </div>
                        </div>

                        <button @click="toggleDarkMode"
                                class="px-2 py-1 rounded bg-gray-800 text-white dark:bg-white dark:text-gray-800">
                            <LightIcon v-if="isDarkMode"/>
                            <DarkIcon v-if="!isDarkMode"/>
                        </button>
                    </div>
                </div>
            </div>
        </header>


        <main class="container mx-auto p-4">
            <div v-if="flashSuccess" class="success">
                <div class="flex bg-green-100 rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
                    <svg class="w-5 h-5 inline mr-3" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <div>
                        <span class="font-medium">Success!</span> {{ flashSuccess }}
                    </div>
                </div>
            </div>
            <slot>Default</slot>
        </main>
    </div>
</template>

<script setup>
import {computed, onMounted, ref} from "vue";
import {usePage, Link} from "@inertiajs/vue3";

import BuildingIcon from "@/Icons/BuildingIcon.vue";
import LightIcon from "@/Icons/LightIcon.vue";
import DarkIcon from "@/Icons/DarkIcon.vue";
import AddIcon from "@/Icons/AddIcon.vue";
import LoginIcon from "@/Icons/LoginIcon.vue";
import LogoutIcon from "@/Icons/LogoutIcon.vue";
import UserIcon from "@/Icons/UserIcon.vue";

const page = usePage();
const flashSuccess = computed(() => page.props.flash.success)
const user = computed(() => page.props.user)

</script>

<script>
export default {
    data() {
        return {
            sticky: false,
            isDarkMode: true,
        };
    },
    mounted() {
        window.addEventListener('scroll', this.handleScroll);
        this.isDarkMode = localStorage.getItem('theme') === 'true';
        this.applyDarkMode();
    },
    destroyed() {
        window.removeEventListener('scroll', this.handleScroll);
    },
    methods: {
        handleScroll() {
            this.sticky = window.pageYOffset > 0;
        },
        toggleDarkMode() {
            this.isDarkMode = !this.isDarkMode;
            localStorage.setItem('theme', this.isDarkMode);
            this.applyDarkMode();
        },
        applyDarkMode() {
            const html = document.querySelector('html');
            if (this.isDarkMode) {
                html.classList.add('dark');
            } else {
                html.classList.remove('dark');
            }
        },
    },
};
</script>


<style scoped>

</style>
