<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add New Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" @click.prevent="add_category()">
            <div class="card-body">
                <div class="form-group">
                    <label for="categoryId">Add New Category</label>
                    <input name="cat_name" type="text" v-model="form.cat_name" class="form-control" id="categoryId"
                           placeholder="Add New Category" :class="{'is-invalid':form.errors.has('cat_name')}">
                    <has-error :form="form" field="cat_name"></has-error>
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
                   cat_name:''
                })
            }
        },methods:{
            add_category(){
                this.form.post('/add_category')
                    .then((response)=>{
                        console.log(response.data);
                    })
                    .catch(()=>{

                    });
            }
        }
    }
</script>

<style scoped>

</style>
