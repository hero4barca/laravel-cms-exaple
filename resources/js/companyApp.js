require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Homepage from './companyApp/CompanyHome.vue'
import CompanyProfile from './companyApp/CompanyProfile.vue'
import Example from './companyApp/ExampleComponent.vue'


Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
          path: '/company/profile',
          name: 'company-profile',
          component: CompanyProfile,
          props: true
        },
        {
            path: '/company/example',
            name: 'example',
            component: Example,
            props: true
          },
    ],
});

const app = new Vue({
    el: '#companyApp',
    router,
    components: { Homepage },
});