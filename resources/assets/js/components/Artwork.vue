<template>
	<img class="artwork" :src="image" @click="click" />
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
			click: function(event) {
				this.EventBus.$emit('open', this.index);
			}
		}
	}
</script>