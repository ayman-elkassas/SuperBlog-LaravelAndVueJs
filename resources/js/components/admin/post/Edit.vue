<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Update Post</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" enctype="multipart/form-data" @submit.prevent="updatePost()">
            <div class="card-body">
                <div class="form-group">
<!--                    how to get send id from router link-->
<!--                    {{this.$route.params.postid}}-->
                    <label for="postId">Update Post</label>
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
                    <img :src="ourImage()" alt="" width="80" height="80">
                    <has-error :form="form" field="photo"></has-error>
                </div>

            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        name: "Edit",
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
        created(){
            //to insert old values
            axios.get(`post/${this.$route.params.postid}`)
                .then((response)=>{
                    console.log(response.data.post);
                    this.form.fill(response.data.post);
                })
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
            ourImage(){
                let img=this.form.photo;
                if(img.length>100){
                    return this.form.photo
                }
                else {
                    return `uploadimage/${this.form.photo}`;
                }
            },
            updatePost(){
                //if using vuex routing use ``
                //if you want to use axios in post should get response object from form manual
                //but for easy use this.form to get form object and send it automatic
                this.form.post(`update/${this.$route.params.postid}`)
                    .then(()=>{
                        this.$router.push('/post-list');
                        toast.fire({
                            icon: 'success',
                            title: 'Post Updated Successfully'
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
