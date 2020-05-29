import AdminHome from './components/admin/AdminHome.vue';
import Ex from './components/ExampleComponent.vue';

//export to read it from outside
export const routes=[
    {path:'/home',component:AdminHome},
    {path:'/post',component:Ex}
];
