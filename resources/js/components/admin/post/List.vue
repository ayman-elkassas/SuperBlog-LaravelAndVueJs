<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="row justify-content-around">
                <div class="col-10">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Post List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-post" style="color: #fff;">Add New Post</router-link>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>S1</th>
                                    <th>User</th>
                                    <th>Category</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Photo</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(post,index) in getAllPost" :key="post.id">
                                    <td>{{index+1}}</td>
                                    <td v-if="post.user">{{post.user.name}}</td>
                                    <td v-if="post.category">{{post.category.cat_name}}</td>
                                    <td>{{post.title | sortlength(20,"---")}}</td>
                                    <td>{{post.description | sortlength(40,"....")}}</td>
                                    <td><img :src="ourImage(post.photo)" alt="" width="40" height="40"></td>
                                    <!--                                TODO : `` not '' when passing values-->
                                    <td><router-link :to="`edit-post/${post.id}`" class="btn btn-success">Edit</router-link></td>
                                    <td><a href="" @click.prevent="deletePost(post.id)" class="btn btn-danger">Delete</a></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
    export default {
        name: "List",
        mounted() {
            this.$store.dispatch('allPost')
        },
        computed:{
            getAllPost(){
                return this.$store.getters.getPost
            },
        },
        methods:{
            ourImage(img){
                return "uploadimage/"+img;
            },
            deletePost(id){
                // console.log(id);
                axios.get("/delete/"+id)
                    .then(()=>{
                        this.$store.dispatch('allPost');
                        toast.fire({
                            icon: 'success',
                            title: 'Post Deleted Successfully',
                        })
                    })
                    .catch(()=>{
                    });
            }
        }
    }
</script>

<style scoped>

</style>
