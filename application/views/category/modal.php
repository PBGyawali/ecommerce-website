<!--add modal-->
<modal v-if="addModal" @close="clearAll()">
<h3 slot="head" >Add Category</h3>
<div slot="body" class="row">
    <div class="col-md-12">
          <div class="form-group">
                <label>Category Name</label>
                <input type="text" class="form-control" :class="{'is-invalid': formValidate.category_name}" name="category_name" v-model="newCategory.category_name">
                <div class="has-text-danger" v-html="formValidate.category_name"> </div>
          </div>
    </div>   
</div>
<div slot="foot">
    <button class="btn btn-dark" @click="addCategory">Add</button>
</div>
</modal>



<!--update modal-->
<modal v-if="editModal" @close="clearAll()">
<h3 slot="head" >Edit Category</h3>
<div slot="body" class="row">
    <div class="col-md-12">
          <div class="form-group">       
                <label>Category Name</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.category_name}" name="category_name" v-model="chooseCategory.category_name">
            
             <div class="has-text-danger" v-html="formValidate.category_name"> </div>
</div>
    </div>
    
</div>
<div slot="foot">
    <button class="btn btn-dark" @click="updateCategory">Update</button>
</div>
</modal>


<!--delete modal-->
<modal v-if="deleteModal" @close="clearAll()">
    <h3 slot="head">Delete</h3>
    <div slot="body" class="text-center">Do you want to delete this record?</div>
    <div slot="foot">
        <button class="btn btn-dark" @click="deleteModal = false; deleteCategory()" >Delete</button>
        <button class="btn" @click="deleteModal = false">Cancel</button>
    </div>
</modal>