require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Homepage from './adminApp/Homepage'
import ReadCompany from './adminApp/company/ReadCompany'
import CreateCompany from './adminApp/company/CreateCompany'

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
        {
            path: '/admin/create_company',
            name: 'create-company',
            component: CreateCompany,
            props: true
        },
    ],
});

const app = new Vue({
    el: '#app',
    router,
    components: { Homepage },
});