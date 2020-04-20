import Vue from 'vue';
import VueRouter from 'vue-router';

import AddLike from './components/AddLike.vue';

Vue.use(VueRouter);


const routes = [
    {
        path : '/ShowPost/:slug',component : AddLike , name : 'add-like'
    }
];

const router = new VueRouter({
    routes,
    hashbang : false ,
    mode : 'history',
})
export default router;