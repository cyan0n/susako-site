<template>
	<div ref="wrapper" class="artwork">
		<img ref="image" :src="image" @click="click" @load="loaded"/>
	</div>
</template>

<script>
	export default {
		inject: ['EventBus'],
		props: [
			'image',
			'index'
		],
		methods: {
			click() {
				this.EventBus.$emit('open', this.index);
			},
			loaded() {
				this.EventBus.$emit('gallery',this.image, this.index);
				this.EventBus.$emit('layout');
			}
		}
	}
</script>