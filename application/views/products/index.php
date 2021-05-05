  <div id="app">
   <div class="container">
    <div class="row">
        <transition
                enter-active-class="animated fadeInLeft"
                     leave-active-class="animated fadeOutRight">
                     <div class="notification text-center px-5 top-middle  ":class="{ 'is-success': successMSG }" v-if="successMSG" @click="successMSG = false"v-html="successMSG"></div>
                     <div class="notification text-center px-5 top-middle  ":class="{ 'alert alert-danger': errorMSG }" v-if="errorMSG" @click="errorMSG = false"v-html="errorMSG"></div>
            </transition>
        <div class="col-md-12">
           <table class="table bg-dark my-3">
               <tr>
                   <td> <button class="btn btn-default btn-block" @click="addModal= true">Add</button></td>
                   <td><input placeholder="Search"type="search" class="form-control" v-model="search.text" @keyup="searchproduct" name="search"></td>
               </tr>
           </table>
            <table class="table is-bordered is-hoverable">
               <thead class="text-white bg-dark" >
                
                <th class="text-white">ID</th>
                <th class="text-white">Image</th>
                <th class="text-white">Product name</th>
                <th class="text-white">Product quantity</th>                
                <th class="text-white">Product Price</th>
                <th class="text-white">Product Tax</th>                
                <th colspan="2" class="text-center text-white">Action</th>
                </thead>
                <tbody class="table-light">
                    <tr v-for="product in products" class="table-default">
                        <td>{{product.product_id}}</td>
                        <td><img :src="imageproduct(product.product_image)"  width='50' height="50"></td>
                        <td>{{product.product_name}}</td>
                        <td>{{product.product_quantity}}</td>
                        <td>{{product.product_base_price}}</td>
                        <td>{{product.product_tax}}</td>
                        <td><button class="btn btn-info fa fa-edit" @click="editModal = true; selectproduct(product)"></button></td>
                        <td><button class="btn btn-danger fa fa-trash" @click="deleteModal = true; selectproduct(product)"></button></td>
                    </tr>
                    <tr v-if="emptyResult">
                      <td colspan="9" rowspan="4" class="text-center h1">No Record Found</td>
                  </tr>
                </tbody>
                
            </table>
            
        </div>
  
    </div>
     <pagination
        :current_page="currentPage"
        :row_count_page="rowCountPage"
         @page-update="pageUpdate"
         :total_results="totalproducts"
         :page_range="pageRange"
         >
      </pagination>
</div>
<?php include 'modal.php';?>

</div>

<script src="<?php echo base_url();?>/assets/js/product.js"></script>