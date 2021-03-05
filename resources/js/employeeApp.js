require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Homepage from './employeeApp/EmployeeHome.vue'
//import Read from './components/Read'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        //{
          //  path: '/admin/dashboard',
          //  name: 'read',
          //  component: Read,
          //  props: true
        //},
    ],
});

const app = new Vue({
    el: '#employeeApp',
    router,
    components: { Homepage },
});