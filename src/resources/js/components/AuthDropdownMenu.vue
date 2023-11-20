<template>
    <div>
        <div @click="open = !open" class="cursor-pointer">
            <img :src="user && user.profile_image ? user.profile_image : '/images/profile-icon.png'"
                class="h-10 w-10 object-cover rounded-full" alt="icon" />
        </div>

        <div v-if="open"
            class="absolute top-11 left-0 w-auto border border-gray-200 rounded shadow-lg bg-white z-30 whitespace-nowrap">
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
