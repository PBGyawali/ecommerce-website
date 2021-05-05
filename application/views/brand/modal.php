<!--add modal-->
<modal v-if="addModal" @close="clearAll()">
<h3 slot="head" >Add Brand</h3>
<div slot="body" class="row">
    <div class="col-md-12">
          <div class="form-group">
                <label>Brand Name</label>
                <input type="text" class="form-control" :class="{'is-invalid': formValidate.brand_name}" name="brand_name" v-model="newBrand.brand_name">
                <div class="has-text-danger" v-html="formValidate.brand_name"> </div>
          </div>
    </div>   
</div>
<div slot="foot">
    <button class="btn btn-dark" @click="addBrand">Add</button>
</div>
</modal>



<!--update modal-->
<modal v-if="editModal" @close="clearAll()">
<h3 slot="head" >Edit Brand</h3>
<div slot="body" class="row">
    <div class="col-md-12">
          <div class="form-group">       
                <label>Brand Name</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.brand_name}" name="brand_name" v-model="chooseBrand.brand_name">
            
             <div class="has-text-danger" v-html="formValidate.brand_name"> </div>
</div>
    </div>
    
</div>
<div slot="foot">
    <button class="btn btn-dark" @click="updateBrand">Update</button>
</div>
</modal>


<!--delete modal-->
<modal v-if="deleteModal" @close="clearAll()">
    <h3 slot="head">Delete</h3>
    <div slot="body" class="text-center">Do you want to delete this record?</div>
    <div slot="foot">
        <button class="btn btn-dark" @click="deleteModal = false; deleteBrand()" >Delete</button>
        <button class="btn" @click="deleteModal = false">Cancel</button>
    </div>
</modal>