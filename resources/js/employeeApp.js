require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Homepage from './employeeApp/EmployeeHome.vue'
import ReadEmployeeDetails from './employeeApp/ReadEmployeeDetails.vue'


Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
          path: '/employee/profile',
          name: 'read-employee-details',
          component: ReadEmployeeDetails,
          props: true
        },
    ],
});

const app = new Vue({
    el: '#employeeApp',
    router,
    components: { Homepage },
});