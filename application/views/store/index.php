
  <div id="app">
   <div class="container">
    <div class="row">
        <transition
                enter-active-class="animated fadeInLeft"
                     leave-active-class="animated fadeOutRight">
                     <div class="notification text-center px-5 top-middle  ":class="{ 'is-success': successMSG }" v-if="successMSG" @click="successMSG = false"v-html="successMSG"></div>
            </transition>
        <div class="col-md-12">
           <table class="table bg-dark my-3">
               <tr>
                   <td> <button class="btn btn-default btn-block" @click="addModal= true">Add</button></td>
                   <td><input placeholder="Search"type="search" class="form-control" v-model="search.text" @keyup="searchStore" name="search"></td>
               </tr>
           </table>
            <table class="table is-bordered is-hoverable">
               <thead class="text-white bg-dark" >
                
                <th class="text-white">ID</th>                
                <th class="text-white">Store name</th>                
                <th class="text-white">Email</th>              
                <th class="text-white">Address</th>              
                <th colspan="2" class="text-center text-white">Action</th>
                </thead>
                <tbody class="table-light">
                    <tr v-for="store in stores" class="table-default">
                        <td>{{store.store_id}}</td>                     
                        <td>{{store.store_name}}</td>                        
                        <td>{{store.store_email}}</td>                        
                        <td>{{store.store_address}}</td>                        
                        <td><button class="btn btn-info fa fa-edit" @click="editModal = true; selectStore(store)"></button></td>
                        <td><button class="btn btn-danger fa fa-trash" @click="deleteModal = true; selectStore(store)"></button></td>
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
         :total_results="totalStores"
         :page_range="pageRange"
         >
      </pagination>
</div>
<?php include 'modal.php';?>

</div>
<script src="<?php echo JS_URL;?>sellerstore.js"></script>


    
    
  
