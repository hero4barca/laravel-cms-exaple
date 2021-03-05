require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Homepage from './adminApp/Homepage'
import Read from './adminApp/company/ReadCompany'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/admin/dashboard',
            name: 'read',
            component: Read,
            props: true
        },
    ],
});

const app = new Vue({
    el: '#app',
    router,
    components: { Homepage },
});