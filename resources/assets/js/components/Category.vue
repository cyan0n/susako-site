<template>
	<a :href="href" ref="wrapper" class="category">
		<h3>{{ title }}</h3>
		<img ref="image" :src="image" @load="loaded"/>
	</a>
</template>

<script>
	export default {
		inject: ['EventBus'],
		props: [
			'href',
			'image',
			'title'
		],
		methods: {
			loaded() {
				this.EventBus.$emit('layout');
			}
		}
	}
</script>