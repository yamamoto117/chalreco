<template>
    <div>
        <button @click="clickFollow" @mouseover="handleMouseOver" @mouseleave="handleMouseLeave"
            class="border border-orange-400 py-2 px-4 rounded-full" :class="buttonColor">
            {{ buttonText }}
        </button>
    </div>
</template>

<script>
export default {
    props: {
        initialIsFollowedBy: {
            type: Boolean,
            default: false,
        },
        authorized: {
            type: Boolean,
            default: false,
        },
        endpoint: {
            type: String,
        },
    },
    data() {
        return {
            isFollowedBy: this.initialIsFollowedBy,
            hovering: false,
        }
    },
    computed: {
        isTouchDevice() {
            return ('ontouchstart' in window || window.DocumentTouch && document instanceof DocumentTouch);
        },
        buttonColor() {
            if (this.isTouchDevice) {
                return this.isFollowedBy ? 'text-white bg-orange-400' : 'text-gray-700 bg-white';
            }
            if (this.isFollowedBy) {
                return 'text-white bg-orange-400 hover:bg-white hover:text-red-500';
            } else {
                return 'text-gray-700 bg-white hover:bg-orange-50';
            }
        },
        buttonText() {
            if (this.isTouchDevice) {
                return this.isFollowedBy ? 'フォロー中' : 'フォロー';
            }
            if (this.isFollowedBy) {
                return this.hovering ? 'フォロー解除' : 'フォロー中';
            } else {
                return 'フォロー';
            }
        },
    },
    methods: {
        handleMouseOver() {
            if (!this.isTouchDevice) {
                this.hovering = true;
            }
        },
        handleMouseLeave() {
            if (!this.isTouchDevice) {
                this.hovering = false;
            }
        },
        clickFollow() {
            if (!this.authorized) {
                alert('フォロー機能はログイン中のみ使用できます')
                return
            }

            this.isFollowedBy
                ? this.unfollow()
                : this.follow()
        },
        async follow() {
            const response = await axios.put(this.endpoint)

            this.isFollowedBy = true
        },
        async unfollow() {
            const response = await axios.delete(this.endpoint)

            this.isFollowedBy = false

        },
    },
}
</script>
