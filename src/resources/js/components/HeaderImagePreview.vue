<template>
    <div>
        <div v-if="existingImage" class="w-full h-48 relative">
            <img :src="existingImage" class="w-full h-full object-cover rounded">
            <button @click="removeExistingImage" class="absolute top-1 right-1">
                <svg class="h-6 w-6 text-gray-400" viewBox="0 0 512 512">
                    <g>
                        <path fill="currentColor" d="M255.998,0.002C114.616,0.002,0,114.622,0,256.004c0,141.382,114.616,255.994,255.998,255.994
                        C397.384,511.998,512,397.386,512,256.004C512,114.622,397.384,0.002,255.998,0.002z M363.126,333.553l-29.576,29.58
                        l-77.552-77.557l-77.544,77.557l-29.579-29.58l77.548-77.549l-77.548-77.548l29.579-29.58l77.544,77.549l77.552-77.549
                        l29.576,29.58l-77.548,77.548L363.126,333.553z"></path>
                    </g>
                </svg>
            </button>
        </div>

        <div v-if="imagePreview" class="w-full h-48 relative">
            <img :src="imagePreview" class="w-full h-full object-cover rounded">
            <button @click="removeImage" class="absolute top-1 right-1">
                <svg class="h-6 w-6 text-gray-400" viewBox="0 0 512 512">
                    <g>
                        <path fill="currentColor" d="M255.998,0.002C114.616,0.002,0,114.622,0,256.004c0,141.382,114.616,255.994,255.998,255.994
                        C397.384,511.998,512,397.386,512,256.004C512,114.622,397.384,0.002,255.998,0.002z M363.126,333.553l-29.576,29.58
                        l-77.552-77.557l-77.544,77.557l-29.579-29.58l77.548-77.549l-77.548-77.548l29.579-29.58l77.544,77.549l77.552-77.549
                        l29.576,29.58l-77.548,77.548L363.126,333.553z"></path>
                    </g>
                </svg>
            </button>
        </div>

        <input v-bind:class="{ hidden: existingImage || imagePreview }" ref="imageInput" id="header_image" class="w-full"
            type="file" name="header_image" @change="previewImage">
    </div>
</template>

<script>
export default {
    props: {
        user: Object,
    },
    data() {
        return {
            existingImage: this.user ? this.user.header_image : null,
            imagePreview: null,
            deleteHeaderImageFlag: false,
        };
    },
    methods: {
        previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = e => {
                    this.imagePreview = e.target.result;
                    this.existingImage = null;
                };
                reader.readAsDataURL(file);
            }
        },
        removeImage() {
            this.imagePreview = null;
            this.$refs.imageInput.value = null;
        },
        removeExistingImage() {
            this.existingImage = null;
            this.emitImageRemoval();
        },
        emitImageRemoval() {
            this.$emit('image-removed');
        },
    }
};
</script>
