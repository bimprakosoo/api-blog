// resources/js/app.js
require('./bootstrap');
import Vue from 'vue';
import Login from './components/Login.vue';
import Post from './components/Post.vue';
import 'tailwindcss/tailwind.css';
import router from './router.js';
import store from "./store/store";

Vue.component('login', Login);
Vue.component('post', Post);

const app = new Vue({
  el: '#app',
  router,
  store,
});
