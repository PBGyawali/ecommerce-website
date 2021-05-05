<!--add modal-->
<modal v-if="addModal" @close="clearAll()">

<h3 slot="head" >Add product</h3>
<div slot="body" class="row">
    <div class="col-md-6">
            <div class="form-group">
                <label>Product name</label>
                <input type="text" class="form-control" :class="{'is-invalid': formValidate.product_name}" name="product_name" v-model="newproduct.product_name">
            <div class="has-text-danger" v-html="formValidate.product_name"> </div>
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.product_price}" name="product_price" v-model="newproduct.product_base_price">
            <div class="has-text-danger" v-html="formValidate.product_price"> </div>
        </div>
        <div class="form-group">
            <label>Product Image</label>     
            <input type="file" class="form-control" @change="onFilePicked" ref="newfile":class="{'is-invalid': formValidate.product_image}" name="product_image" v-model="newproduct.product_image_value">
            <div class="has-text-danger"v-html="formValidate.product_image"></div>
        </div>
        <div class="form-group" v-if="newproduct.product_image">     
       <img :src="newproduct.product_image_url"  width='150' height="150" >
    </div>
    </div>
    <div class="col-md-6">
  <div class="form-group">
           <label>Product Tax</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.product_tax}" name="product_tax" v-model="newproduct.product_tax">
                <div class="has-text-danger" v-html="formValidate.product_tax"></div>
        </div>
        <div class="form-group">
           <label>Product Quantity</label>
            <input type="text" class="form-control":class="{'is-invalid': formValidate.product_quantity}" name="product_quantity" v-model="newproduct.product_quantity">
             <div class="has-text-danger" v-html="formValidate.product_quantity"> </div>
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea cols="35" rows="5"  name="product_description" v-model="newproduct.product_description" class="form-control"></textarea>
           
        </div>
    </div>
</div>
<div slot="foot">
    <button class="btn btn-dark" @click="addproduct">Add</button>
</div>

</modal>



<!--update modal-->

<modal v-if="editModal" @close="clearAll()" >
<h3 slot="head" >Edit Product</h3>
<div slot="body" class="row">
    
    <div class="col-md-6">
          <div class="form-group">
       
    <label>Product_name</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.product_name}" name="product_name" v-model="chooseproduct.product_name">
            <div class="has-text-danger" v-html="formValidate.product_name"> </div>
    </div>    
    <div class="form-group">
       <label>Product price</label>
        <input type="text" class="form-control" :class="{'is-invalid': formValidate.product_price}" name="product_price" v-model="chooseproduct.product_base_price">
        <div class="has-text-danger" v-html="formValidate.product_price"> </div>
    </div>
    <div class="form-group">
        <label>Product Image</label>     
        <input type="file" class="form-control" @change="onFilePicked" ref="file" :class="{'is-invalid': formValidate.product_image}" name="product_image" >
            <div class="has-text-danger"v-html="formValidate.product_image"></div>
            <input type="hidden"   name="product_image" v-model="chooseproduct.product_image" >    
    </div>
    <div class="form-group"  v-if="chooseproduct.product_image">
        <img :src="chooseproduct.product_image_url?chooseproduct.product_image_url:imageproduct(chooseproduct.product_image)"  width='150' height="150" >
   </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
           <label>Product tax</label>
            <input type="text" class="form-control" :class="{'is-invalid': formValidate.product_tax}" name="product_tax" v-model="chooseproduct.product_tax">
                <div class="has-text-danger" v-html="formValidate.product_tax"></div>
        </div>
        <div class="form-group">
           <label>Product quantity</label>
            <input type="text" class="form-control":class="{'is-invalid': formValidate.product_quantity}" name="product_quantity" v-model="chooseproduct.product_quantity">
             <div class="has-text-danger" v-html="formValidate.product_quantity"> </div>
        </div>
        <div class="form-group">
            <label>Product_description</label>
            <textarea cols="35" rows="5"  name="product_description" v-model="chooseproduct.product_description" class="form-control"></textarea>            
        </div>
    </div>
</div>
<div slot="foot">
    <button class="btn btn-dark" @click="updateproduct">Update</button>
</div>
</modal>
<!--delete modal-->
<modal v-if="deleteModal" @close="clearAll()">
    <h3 slot="head">Delete</h3>
    <div slot="body" class="text-center">Do you want to delete this record?</div>
    <div slot="foot">
        <button class="btn btn-dark" @click="deleteModal = false; deleteproduct()" >Delete</button>
        <button class="btn" @click="deleteModal = false">Cancel</button>
    </div>
</modal>