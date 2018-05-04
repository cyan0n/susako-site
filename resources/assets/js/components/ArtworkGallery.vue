<template>
    <div>
        <gallery :images="artworks" :index="index" @close="index = null"></gallery>
        <slot></slot>
    </div>
</template>

<script>
	import VueGallery from 'vue-gallery';
	
    export default {
        data: function(){
            return {
                artworks: [],
                index: null
            }
        },

        components: {
            'gallery': VueGallery
        }
    }
</script>
