<template>
    <div class="border border-gray-200 rounded-full">
        <div @click="open = !open"
            class="flex items-center justify-end md:justify-center lg:w-52 md:w-12 h-12 lg:px-2 lg:py-2 text-base leading-4 text-sm font-semibold rounded-full hover:bg-gray-100 cursor-pointer">
            <img :src="user && user.profile_image ? user.profile_image : '/images/profile-icon.png'"
                class="h-10 w-10 object-cover rounded-full" alt="icon" />
            <span v-if="user" class="hidden md:hidden lg:inline w-28 text-gray-700 mx-2 break-words">{{ user.name
            }}</span>
            <span v-else class="hidden md:hidden lg:inline w-28 text-gray-400 mx-2 break-words">未ログイン</span>
            <svg viewBox="0 0 512 512" class="hidden md:hidden lg:inline w-4 h-4 text-gray-400 ml-auto">
                <g fill="currentColor">
                    <circle cx="55.091" cy="256" r="55.091"></circle>
                    <circle cx="256" cy="256" r="55.091"></circle>
                    <circle cx="456.909" cy="256" r="55.091"></circle>
                </g>
            </svg>
        </div>

        <div v-if="open"
            class="absolute top-14 right-1 lg:left-2 w-auto border border-gray-200 rounded shadow-lg bg-white z-30 whitespace-nowrap">
            <div role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                <slot></slot>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        user: {
            type: Object,
            default: () => ({})
        }
    },
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
