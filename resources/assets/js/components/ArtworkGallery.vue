<template>
    <div class="artwork-gallery" style="position:relative">
        <!-- slot for all Artworks -->
        <div class="artwork-gallery-column" ref="artworks"  style="position:absolute;visibility: hidden;">
            <slot></slot>
        </div>
        <div ref="columns" class="columns">
            <div class="artwork-gallery-column first"></div>
            <div class="artwork-gallery-column second is-hidden-touch"></div>
            <div class="artwork-gallery-column third is-hidden-touch is-hidden-desktop-only"></div>
        </div>
        
        <gallery :images="GalleryImages" :index="GalleryIndex" @close="GalleryIndex = null"></gallery>
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
                EventBus: new Vue(),
                GalleryIndex: null,
                GalleryImages: [],
                loaded: 0,
                children: [],
                current: 0
            }
        },
        created() {
            this.EventBus.$on('open', index => this.GalleryIndex = parseInt(index));
            
            this.EventBus.$on('load', (elem, img, index) => {
                this.children[index] = elem;
                this.GalleryImages[index] = img;

                if (++this.loaded == this.$refs.artworks.children.length) {
                    this.sort();
                }
            })

            window.onresize = this.sort;

        },
        mounted() {
            this.EventBus.$emit('ready');
        },
        provide() {
            return {
                EventBus: this.EventBus
            }
        },
        methods: {
            sort: function () {
                let counters= this.resetCounters();
                if (this.current != counters.length) {
                    this.current = counters.length;

                    this.children.forEach((child, i) => {
                        let pos = 0;
                        // Find lowest, right-most counter
                        counters.forEach((counter, j) => {
                            if (counter < counters[pos]) {
                                pos = j;
                            }
                        })

                        // Append Artwork to lowest, right-most column position
                        this.$refs.columns.children[pos].appendChild(child);

                        counters[pos] += child.offsetHeight;
                    })
                }
            },
            resetCounters: function() {
                let columns = this.$refs.columns.querySelectorAll('.artwork-gallery-column');
                let result = [];
                columns.forEach(column => {
                    // Check if column is visible
                    if (column.offsetParent !== null) {
                        result.push(0);
                    }
                });
                return result;
            }
        }
    }
</script>

<style scoped>
    @media only screen and (max-width: 1215px) {
        .artwork-gallery-column {
            width: 50%;
        }
    }

    @media only screen and (max-width: 1024px) {
        .artwork-gallery-column {
            width: 100%;
        }
    }
    
</style>
