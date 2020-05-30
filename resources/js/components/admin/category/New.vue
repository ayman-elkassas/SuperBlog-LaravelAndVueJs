<template>
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add New Category</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form">
            <div class="card-body">
                <div class="form-group">
                    <label>Add New Category</label>
                    <input type="text" class="form-control" placeholder="Add New Category">
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
        name: "New"
    }
</script>

<style scoped>

</style>
