
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');
window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('select-thumbnail', require('./components/SelectThumbnail.vue'));

const admin = new Vue({
	el: '#admin',
	data: {
		filename: ''
	},
	methods: {
		chosenImage: function(event) {
			this.filename = event.target.files[0].name;
		}
	}
});
/*var file = document.getElementById("file");
file.onchange = function () {
	if (file.files.length > 0) {
		document.getElementById('filename').innerHTML = file.files[0].name;
	}
};*/
