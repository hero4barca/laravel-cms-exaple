require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Homepage from './employeeApp/EmployeeHome.vue'
import ReadEmployeeDetails from './employeeApp/ReadEmployeeDetails.vue'
import UpdateEmployeeDetails from './employeeApp/UpdateEmployeeDetails.vue'


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
        {
            path: '/employee/update_profile',
            name: 'update-employee-details',
            component: UpdateEmployeeDetails,
            props: true
        },
    ],
});

const app = new Vue({
    el: '#employeeApp',
    router,
    components: { Homepage },
});