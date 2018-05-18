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
		created() {
			this.EventBus.$emit('image', this.image);
		},
		methods: {
			click() {
				this.EventBus.$emit('open', this.index);
			},
			loaded() {
				this.EventBus.$emit('load', this.$refs.wrapper, this.image, this.index);
			}
		}
	}
</script>