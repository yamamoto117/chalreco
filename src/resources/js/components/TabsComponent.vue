<template>
    <div class="flex border-b">
        <div v-for="(tab, index) in tabs" :key="index" class="w-1/2 text-center">
            <a :class="[
                'py-2 px-4 block hover:bg-gray-50',
                tab.active ? 'text-blue-400 border-b-2 border-blue-400' : 'text-gray-400'
            ]" :href="tab.href">
                {{ tab.name }}
            </a>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        user: Object,
        tabs: Array
    }
}
</script>
