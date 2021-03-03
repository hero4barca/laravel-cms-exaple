require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Homepage from './components/Homepage'
import ReadCompany from './components/company/ReadCompany'


Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/admin/dashboard',
            name: 'read-company',
            component: ReadCompany,
            props: true
        },

        
    ],
});

const app = new Vue({
    el: '#app',
    router,
    components: { Homepage },
});

