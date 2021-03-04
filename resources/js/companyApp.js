require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Homepage from './components/ExampleComponent.vue'
//import ReadCompany from './components/company/ReadCompany.vue'
//import CreateCompany from './components/company/CreateCompany'
//import UpdateCompany from './components/company/UpdateCompany'

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
            path: '/admin/company/create',
            name: 'create-company',
            component: CreateCompany,
            props: true
        },
        {
            path: '/admin/company/update',
            name: 'update-company',
            component: UpdateCompany,
            props: true
        },
    ],
});

const app = new Vue({
    el: '#companyApp',
    router,
    components: { Homepage },
});
