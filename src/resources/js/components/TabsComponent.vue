<template>
    <div>
        <div class="flex border-b sticky top-[60px] bg-white z-10">
            <div v-for="(tab, index) in tabs" :key="index" class="w-full">
                <button :class="[
                    'w-full py-2 px-4 block hover:bg-gray-50',
                    index === activeTabIndex ? 'text-blue-400 border-b-2 border-blue-400' : 'text-gray-400'
                ]" @click="setActiveTab(index)">
                    {{ tab.name }}
                </button>
            </div>
        </div>
        <slot :name="'content-' + activeTabIndex" v-if="tabs.length > activeTabIndex"></slot>
    </div>
</template>

<script>
export default {
    props: {
        tabs: {
            type: Array,
            default: () => []
        }
    },
    data() {
        return {
            activeTabIndex: 0
        };
    },
    methods: {
        setActiveTab(index) {
            this.activeTabIndex = index;
        }
    }
}
</script>
