/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');
 import Vue from 'vue'
 import Vuex from 'vuex'
 window.Vue = Vue;
 
 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */
 
 // const files = require.context('./', true, /\.vue$/i)
 // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
 
 // Vue.component('example-component', require('./components/ExampleComponent.vue').default);
 import Exam from './components/Exam';
 import Question from './components/question';
 import AddQuestion from './components/admin/AddQuestion';
 
 /**
  * Next, we will create a fresh Vue application instance and attach it to
  * the page. Then, you may begin adding components to this application
  * or customize the JavaScript scaffolding to fit your unique needs.
  */
  import BootstrapVue from 'bootstrap-vue'
  import PortalVue from 'portal-vue'
  //quill editor
  import VueQuillEditor from 'vue-quill-editor'
  import VueSelectImage from 'vue-select-image'
  import axios from 'axios';
  import loader from "vue-ui-preloader";
 
  // add stylesheet
 import 'bootstrap/dist/css/bootstrap.css'
 import 'bootstrap-vue/dist/bootstrap-vue.css'
 require('vue-select-image/dist/vue-select-image.css')
 import 'quill/dist/quill.core.css' // import styles
 import 'quill/dist/quill.snow.css' // for snow theme
 import 'quill/dist/quill.bubble.css' // for bubble theme

  Vue.prototype.$http = axios
  Vue.prototype.$http.defaults.baseURL = `${process.env.MIX_APP_URL}/admin`
  Vue.prototype.$location = window.location
 
  /**
  * API Token as common header
  */
 
 const apiToken = document.head.querySelector('meta[name="api-token"]')
 
 Vue.prototype.$http.defaults.headers.common['Content-Type'] = 'application/json';
 
 if (apiToken) {
   Vue.prototype.$http.defaults.headers.common.Authorization = 'Bearer ' + apiToken.content
 }
 
  Vue.prototype.$http.interceptors.response.use(undefined, function (err) {
      let originalRequest = err.config
 
      if (err.response.status === 419 && !originalRequest._retry) {
        window.location.reload()
      }
 
      else {
        throw err
      }
  })
 
 //support vuex
 import storeData from "./store/index"
 Vue.use(Vuex)

 const store = new Vuex.Store(
     storeData
 )
 
 Vue.use(BootstrapVue)
 Vue.use(VueSelectImage)
 Vue.use(VueQuillEditor)
 Vue.use(PortalVue)

Vue.use(loader);

 Vue.directive('kebabcase', {
	update (el) {
		el.value = el.value.toLowerCase().replace(/ /g, '_')
	},
})
 
 const app = new Vue({
     el: '#app',
     store,
     components: {
       Exam,
       Question,
       AddQuestion
     }
 });
 