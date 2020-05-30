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

//Sweet Alert 2
import swal from 'sweetalert2';
//to make it shared var
window.swal=swal;

const Toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});

//to make it shared var
window.toast=Toast;

//register components here
Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);

//register your routes
const router=new VueRouter({
    routes, //short for 'routes : routes',
    mode:'history'
});

//main vue object
const app = new Vue({
    el: '#app',
    router
});
