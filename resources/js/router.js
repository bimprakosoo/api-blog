import Vue from 'vue';
import VueRouter from 'vue-router';
import Login from './components/Login.vue';
import Post from './components/Post.vue';
import PostDetail from './components/PostDetail.vue';

Vue.use(VueRouter);

const routes = [
  {
    path: '/login',
    name: 'login',
    component: Login,
  },
  {
    path: '/post',
    name: 'post',
    component: Post,
  },
  {
    path: '/post/:id',
    name: 'postDetail',
    component: PostDetail
  }
];

const router = new VueRouter({
  mode: 'history',
  routes,
});

export default router;
