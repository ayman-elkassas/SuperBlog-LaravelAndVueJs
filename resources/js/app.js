require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import {routes} from './routes'
Vue.use(VueRouter);

//v-form
import {Form,HasError,AlertError} from 'vform';

Vue.component(HasError.name,HasError);
Vue.component(AlertError.name,AlertError);
window.Form=Form;

Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);

const router=new VueRouter({
    routes, //short for 'routes : routes',
    mode:'history'
});

const app = new Vue({
    el: '#app',
    router
});
