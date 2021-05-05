<!--add modal-->
<modal v-if="addModal" @close="clearAll()">

<h3 slot="head" >Add store</h3>
<div slot="body" class="row">
    <div class="col-md-6">
          <div class="form-group">
    <label>Store name</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.store_name}" name="store_name" v-model="newStore.store_name">
            
             <div class="has-text-danger" v-html="formValidate.store_name"> </div>
            </div>
    </div>
    <div class="col-md-6">
  <div class="form-group">
           <label>Store_Email</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.store_email}" name="store_email" v-model="newStore.store_email">
                <div class="has-text-danger" v-html="formValidate.store_email"></div>
        </div>        
        <div class="form-group">
            <label>Store_Address</label>
            <textarea cols="35" rows="5" :class="{'is-invalid': formValidate.store_address}" name="store_address" v-model="newStore.store_address" class="form-control"></textarea>
            <div class="has-text-danger" v-html="formValidate.store_address"> </div>
        </div>
    </div>
</div>
<div slot="foot">
    <button class="btn btn-dark" @click="addStore">Add</button>
</div>

</modal>



<!--update modal-->

<modal v-if="editModal" @close="clearAll()">
<h3 slot="head" >Edit store</h3>
<div slot="body" class="row">
    <div class="col-md-6">
          <div class="form-group">       
        <label>Store name</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.store_name}" name="store_name" v-model="chooseStore.store_name">
            <div class="has-text-danger" v-html="formValidate.store_name"> </div>
        </div>
    </div>
    <div class="col-md-6">
  <div class="form-group">
           <label>Store_Email</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.store_email}" name="store_email" v-model="chooseStore.store_email">
                <div class="has-text-danger" v-html="formValidate.store_email"></div>
        </div>        
        <div class="form-group">
            <label>Store_Address</label>
            <textarea cols="35" rows="5" :class="{'is-invalid': formValidate.store_address}" name="store_address" v-model="chooseStore.store_address" class="form-control"></textarea>
            <div class="has-text-danger" v-html="formValidate.store_address"> </div>
        </div>
    </div>
</div>
<div slot="foot">
    <button class="btn btn-dark" @click="updateStore">Update</button>
</div>
</modal>


<!--delete modal-->
<modal v-if="deleteModal" @close="clearAll()">
    <h3 slot="head">Delete</h3>
    <div slot="body" class="text-center">Do you want to delete this record?</div>
    <div slot="foot">
        <button class="btn btn-dark" @click="deleteModal = false; deletestore()" >Delete</button>
        <button class="btn" @click="deleteModal = false">Cancel</button>
    </div>
</modal>