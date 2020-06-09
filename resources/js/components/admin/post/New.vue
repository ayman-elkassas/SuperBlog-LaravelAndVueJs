<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add New Post</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" enctype="multipart/form-data" @submit.prevent="addnewPost()">
            <div class="card-body">
                <div class="form-group">
                    <label for="postId">Add New Post </label>
                    <input type="text" class="form-control" id="postId" placeholder="Add New Post" v-model="form.title" name="title" :class="{ 'is-invalid': form.errors.has('title') }">
                    <has-error :form="form" field="title"></has-error>
                </div>
                <div class="form-group">
                    <!--todo: VI using https://vuejsexamples.com/ -->
                    <label for="descriptionId">Add New Description</label>
                    <markdown-editor id="descriptionId" v-model="form.description"></markdown-editor>

                    <has-error :form="form" field="description"></has-error>
                </div>

                <div class="form-group" >
                    <label>Select</label>
                    <select class="form-control" :class="{ 'is-invalid': form.errors.has('cat_id') }" v-model="form.cat_id">
                        <option disabled value="">Select Category</option>
                        <option :value="category.id" v-for="category in getallCategory">{{category.cat_name}}</option>

                    </select>
                    <has-error :form="form" field="cat_id"></has-error>
                </div>
                <div class="form-group" >
                    <input @change = "changePhoto($event)" name="photo" type="file" :class="{ 'is-invalid': form.errors.has('photo') }">
                    <img :src="form.photo" alt="" width="80" height="80">
                    <has-error :form="form" field="photo"></has-error>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "New",
        data(){
            return{
                form:new Form({
                    title:"",
                    description:"",
                    category_id:"",
                    photo:""
                })
            }
        },
        mounted() {
            this.$store.dispatch("allCategory")
        },
        computed:{
            getallCategory(){
                return this.$store.getters.getCategory
            }
        },
        methods:{
            changePhoto(event){
                let file = event.target.files[0];
                if(file.size>1048576){
                    debugger;
                    toast.fire({
                        icon: 'failed',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href>Why do I have this issue?</a>'
                    });

                }else{
                    debugger;
                    let reader = new FileReader();
                    reader.onload = event => {
                        this.form.photo = event.target.result
                        console.log(event.target.result)
                    };
                    reader.readAsDataURL(file);
                }
            },
            addnewPost(){
                debugger;
                this.form.post('/save_post')
                    .then(()=>{
                        console.log("success");
                        this.$router.push('/post-list');
                        toast.fire({
                            icon: 'success',
                            title: 'Post Added successfully'
                        })
                    })
                    .catch(()=>{
                        console.log("error")
                    })
            }
        }
    }
</script>

<style scoped>

</style>
