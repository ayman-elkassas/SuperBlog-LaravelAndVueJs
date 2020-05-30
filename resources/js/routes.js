import AdminHome from './components/admin/AdminHome.vue';
import CategoryList from './components/admin/category/List.vue';
import AddCategory from './components/admin/category/New.vue';

//export to read it from outside
export const routes=[
    {path:'/home',component:AdminHome},
    {path:'/category-list',component:CategoryList},
    {path:'/add-category',component:AddCategory},
];
