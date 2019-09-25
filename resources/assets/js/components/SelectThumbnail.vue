<template>
	<div class="thumbnail-select">
		<select :name="name" ref="input" class="is-hidden" v-model="val">
			<option selected></option>
			<option v-for="(artwork, index) in artworks" :key="index" :value="artwork.id">{{ artwork.id }}</option>
		</select>
		<div v-for="(artwork, index) in artworks" :key="index" @click="val = artwork.id" class="thumbnail-option" :class="{selected: artwork.id == val}">
			<img :src="folder + artwork.path">
		</div>
	</div>
</template>

<script>	
    export default {
		props: ['artworks', 'folder', 'name', 'value'],
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
