<script setup>
defineProps({
    size: {
        type: Number,
        required: true,
    }
});
</script>

<template>
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" :width="size + 'px'"
        :height="size + 'px'" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="loader">
        <g>
            <path d="M50 15A35 35 0 1 0 74.74873734152916 25.251262658470843" fill="none" stroke="#2770ee"
                stroke-width="12"></path>
            <path d="M49 3L49 27L61 15L49 3" fill="#2770ee"></path>
            <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s"
                values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
        </g>
    </svg>
</template>

<style scoped>
.loader {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>
