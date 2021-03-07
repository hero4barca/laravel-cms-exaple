require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Homepage from './adminApp/Homepage'

import ReadCompany from './adminApp/company/ReadCompany'
import CreateCompany from './adminApp/company/CreateCompany'
import UpdateCompany from './adminApp/company/UpdateCompany'

import ReadEmployee from './adminApp/employee/ReadEmployee'
import CreateEmployee from './adminApp/employee/CreateEmployee'
import UpdateEmployee from './adminApp/employee/UpdateEmployee'

import ReadUser from './adminApp/user/ReadUser'
import CreateAdminUser from './adminApp/user/CreateAdminUser'
import UpdateUser from './adminApp/user/UpdateUser'






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
        {
            path: '/admin/update_company',
            name: 'update-company',
            component: UpdateCompany,
            props: true
        },
        {
            path: '/admin/read_employee',
            name: 'read-employee',
            component: ReadEmployee,
            props: true
        },
        {
            path: '/admin/create_employee',
            name: 'create-employee',
            component: CreateEmployee,
            props: true
        },
        {
            path: '/admin/update_employee',
            name: 'update-employee',
            component: UpdateEmployee,
            props: true
        },
        {
            path: '/admin/read_user',
            name: 'read-user',
            component: ReadUser,
            props: true
        },
        {
            path: '/admin/create_admin_user',
            name: 'create-admin-user',
            component: CreateAdminUser,
            props: true
        },
        {
            path: '/admin/update_user',
            name: 'update-user',
            component: UpdateUser,
            props: true
        },
    ],
});

const app = new Vue({
    el: '#app',
    router,
    components: { Homepage },
});