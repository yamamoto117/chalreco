<template>
    <div class="relative inline-block text-left">
        <div @click="open = !open" class="cursor-pointer">
            <svg viewBox="0 0 512 512" class="w-4 h-4 text-gray-400 hover:text-gray-500">
                <g fill="currentColor">
                    <circle cx="55.091" cy="256" r="55.091"></circle>
                    <circle cx="256" cy="256" r="55.091"></circle>
                    <circle cx="456.909" cy="256" r="55.091"></circle>
                </g>
            </svg>
        </div>

        <div v-if="open"
            class="absolute top-6 right-0 w-auto border border-gray-200 rounded shadow-lg bg-white z-10 whitespace-nowrap">
            <div role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            open: false
        }
    },
    mounted() {
        document.addEventListener('click', this.handleOutsideClick);
    },
    beforeDestroy() {
        document.removeEventListener('click', this.handleOutsideClick);
    },
    methods: {
        handleOutsideClick(event) {
            if (!this.$el.contains(event.target)) {
                this.open = false;
            }
        }
    }
}
</script>
