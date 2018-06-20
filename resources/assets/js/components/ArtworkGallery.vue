<template>
    <div class="artwork-gallery" style="position:relative">
        <!-- slot for all Artworks -->
        <div class="artwork-gallery-column" ref="artworks"  style="position:absolute;visibility: hidden;">
            <slot name="categories"></slot>
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
                current: 0
            }
        },
        computed: {
            count: function() {
                return this.$refs.artworks.children.length;
            }
        },
        created() {

            this.EventBus.$on('layout', (elem, img, index) => {
                if(++this.loaded == this.count) {
                    this.sort_new();
                }
            })

            this.EventBus.$on('gallery', (img, index) => this.GalleryImages[index] = img);

            this.EventBus.$on('open', index => this.GalleryIndex = parseInt(index));

            window.onresize = this.sort_new;
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
            sort_new: function() {
                let counters = this.resetCounters();
                if (this.current != counters.length) {
                    this.current = counters.length;
                    while(this.$refs.artworks.children.length) {
                        const node = this.$refs.artworks.children[0];
                        const img = node.querySelector('img');

                        let pos = 0;
                        // Find lowest, right-most counter
                        counters.forEach((counter, j) => {
                            if (counter < counters[pos]) {
                                pos = j;
                            }
                        })

                        this.$refs.columns.children[pos].appendChild(node);
                        counters[pos] += node.offsetHeight;
                    }
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
