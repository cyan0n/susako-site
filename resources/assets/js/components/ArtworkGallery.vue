<template>
    <div class="artwork-gallery">
        <gallery :images="artworks" :index="index" @close="index = null"></gallery>
        <!-- slot for all Artworks -->
        <slot></slot>
    </div>
</template>

<script>
	import VueGallery from 'vue-gallery';
	
    export default {
        components: {
            'gallery': VueGallery
        },

        data() {
            return {
                artworks: [],
                index: null,
                EventBus: new Vue()
            }
        },
        created() {
            this.EventBus.$on('image', image => {
                this.artworks.push(image);
            });

            this.EventBus.$on('open', index => {
                this.index = parseInt(index);
            })
        },
        mounted() {
            this.EventBus.$emit('ready');
        },
        provide() {
            return {
                EventBus: this.EventBus
            }
        }
    }
</script>
