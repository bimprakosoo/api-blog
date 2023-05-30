import Vue from 'vue';
import VueRouter from 'vue-router';
import Post from './components/Post.vue';

Vue.use(VueRouter);

const routes = [
  {
    path: '/post',
    name: 'post',
    component: Post,
  },
];

const router = new VueRouter({
  mode: 'history',
  routes,
});

export default router;
