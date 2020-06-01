<template>
    <div>
        <!-- Main content -->
        <section class="content">
            <div class="row justify-content-around">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-category" style="color: #fff;">Add Category</router-link>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>S1</th>
                                    <th>Name</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(category,index) in getAllCategory" :key="category.id">
                                    <td>{{index+1}}</td>
                                    <td>{{category.cat_name}}</td>
                                    <td><a href="" class="btn btn-success">Edit</a></td>
                                    <td><a href="" class="btn btn-danger">Delete</a></td>
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
            this.$store.dispatch('allCategory')
        },
        computed:{
            getAllCategory(){
                return this.$store.getters.getCategory
            },
        },
        methods:{

        }
    }
</script>

<style scoped>

</style>
