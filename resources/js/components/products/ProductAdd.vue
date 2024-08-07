<template>
    <div class="card card-primary card-outline">
        <div class="card-body">
        <h5 class="card-title">Create Product</h5>
            <br>

            <form role="form" action="" method="post">
            <div class="card-body">
                <div class="form-group">
                <label>Category</label>
                <select class="form-control">
                    <option v-for="(item, index) in categories">{{ item.name }}</option>
                </select>
                </div>
            
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Submit</button>
            </div>
            </form>
        
        </div>
    </div>
</template>

<script>
 
</script>
