<template>
    <div
        class="w-full  px-4 py-3 bg-white rounded-md shadow-sm border border-gray-200 dark:border-gray-800 dark:bg-gray-800">
        <div class="text-gray-500 font-medium mb-1">
            <slot name="header"/>
        </div>
        <slot/>
    </div>
</template>
