require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
import {routes} from './routes'
Vue.use(VueRouter);

//Support Vuex
import Vuex from 'vuex';
Vue.use(Vuex);

import {filter} from './filter'

import storeData from './store/index'
const store=new Vuex.Store(storeData);

//v-form
import {Form,HasError,AlertError} from 'vform';

//MARK-DOWN
import 'v-markdown-editor/dist/v-markdown-editor.css';
import Editor from 'v-markdown-editor'
// global register
Vue.use(Editor);

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
    mode:'hash'
});

//main vue object
const app = new Vue({
    el: '#app',
    router,
    store
});
