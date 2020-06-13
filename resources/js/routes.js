import AdminHome from './components/admin/AdminHome.vue';
//category
import CategoryList from './components/admin/category/List.vue';
import AddCategory from './components/admin/category/New.vue';
import EditCategory from './components/admin/category/Edit.vue';
//post
import PostList from './components/admin/post/List.vue';
import AddPost from './components/admin/post/New.vue';
import EditPost from './components/admin/post/Edit.vue';
import PublicHome from "./components/public/PublicHome";
import BlogPost from "./components/public/blog/BlogPost";
import SingleBlog from "./components/public/blog/SingleBlog";

//export to read it from outside
export const routes=[
    {path:'/home',component:AdminHome},
    //category
    {path:'/category-list',component:CategoryList},
    {path:'/add-category',component:AddCategory},
    {path:'/edit-category/:categoryid',component:EditCategory},
    //post
    {path:'/post-list',component:PostList},
    {path:'/add-post',component:AddPost},
    {path:'/edit-post/:postid',component:EditPost},
    //Frontend Route
    {path:'/',component:PublicHome},
    {path:'/blog',component:BlogPost},
    {path:'/blog/:id',component:SingleBlog},
    {path:'/categories/:id', component:BlogPost},

];

