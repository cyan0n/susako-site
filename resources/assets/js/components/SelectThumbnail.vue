<template>
	<div class="thumbnail-select">
		<select :name="name" ref="input" class="is-hidden" v-model="val">
			<option selected></option>
			<option v-for="(image, index) in images" :key="index" :value="image">{{ image }}</option>
		</select>
		<div v-for="(image, index) in images" :key="index" @click="val = image" class="thumbnail-option" :class="{selected: image == val}">
			<img :src="folder + image">
		</div>
	</div>
</template>

<script>	
    export default {
		props: ['folder', 'images', 'name', 'value'],
		mounted() {
			this.val = this.value
		},
        data() {
            return {
				val: null
            }
        }
    }
</script>
