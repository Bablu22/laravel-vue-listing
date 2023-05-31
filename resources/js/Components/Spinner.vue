<template>
    <div class="flex justify-center items-center">
        <div class="spinner"></div>
    </div>
</template>

<script>
export default {}
</script>

<style scoped>
.spinner {
    border-right-color: transparent !important;
    animation: spinner 1s linear infinite;
    border-width: 2px;
    border-style: solid;
    border-radius: 9999px;
    width: 24px;
    height: 24px;
    border-top-color: #4299e1;
}

@keyframes spinner {
    to {
        transform: rotate(360deg);
    }
}

</style>
