
Vue.component('modal',{ //modal
    template:`
      <transition
                enter-active-class="animated zoomIn"
                     leave-active-class="animated rollOut">
    <div class="modal is-active" >
  <div class="modal-card border border border-secondary">
    <div class="modal-card-head text-center bg-dark">
    <div class="modal-card-title text-white">
          <slot name="head"></slot>
    </div>
<button class="delete" @click="$emit('close')"></button>
    </div>
    <div class="modal-card-body">
         <slot name="body"></slot>
    </div>
    <div class="modal-card-foot" >
      <slot name="foot"></slot>
    </div>
  </div>
</div>
</transition>
    `
})
var v = new Vue({
   el:'#app',
    data:{
        url:'http://localhost/civuejs/',
        addModal: false,
        editModal:false,
        deleteModal:false,
        stores:[],
        search: {text: ''},
        emptyResult:false,
        newStore:{
            store_name:'',            
            store_email:'',            
            store_address:''},
        chooseStore:{},
        formValidate:[],
        successMSG:'',
        
        //pagination
        currentPage: 0,//the strting page number
        rowCountPage:5,//no of results in one page
        totalStores:0,
        pageRange:2//number after'....' will appear
    },
     created(){
      this.showAll(); 
    },
    methods:{
         showAll(){ axios.get(this.url+"store/showAll").then(function(response){
                 if(response.data.stores == null){
                     v.noResult()
                    }else{
                        v.getData(response.data.stores);
                    }
            })
        },
          searchStore(){
            var formData = v.formData(v.search);
              axios.post(this.url+"store/searchStore", formData).then(function(response){
                  if(response.data.stores == null){
                      v.noResult()
                    }else{
                      v.getData(response.data.stores);
                    
                    }  
            })
        },
          addStore(){   
            var formData = v.formData(v.newStore);
              axios.post(this.url+"store/addStore", formData).then(function(response){
                if(response.data.error){
                    v.formValidate = response.data.msg;
                }else{
                    v.successMSG = response.data.msg;
                    v.clearAll();
                    v.clearMSG();
                }
               })
        },
        updateStore(){
            var formData = v.formData(v.chooseStore); axios.post(this.url+"store/updateStore", formData).then(function(response){
                if(response.data.error){
                    v.formValidate = response.data.msg;
                }else{
                      v.successMSG = response.data.success;
                    v.clearAll();
                    v.clearMSG();
                
                }
            })
        },
        deleteStore(){
             var formData = v.formData(v.chooseStore);
              axios.post(this.url+"store/deleteStore", formData).then(function(response){
                if(!response.data.error){
                     v.successMSG = response.data.success;
                    v.clearAll();
                    v.clearMSG();
                }
            })
        },
         formData(obj){
			var formData = new FormData();
		      for ( var key in obj ) {
		          formData.append(key, obj[key]);
		      } 
		      return formData;
		},
        getData(stores){
            v.emptyResult = false; // become false if has a record
            v.totalStores = stores.length //get total of store
            v.stores = stores.slice(v.currentPage * v.rowCountPage, (v.currentPage * v.rowCountPage) + v.rowCountPage); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(v.stores.length == 0 && v.currentPage > 0){ 
            v.pageUpdate(v.currentPage - 1)
            v.clearAll();  
            }
        },
            
        selectStore(store){
            v.chooseStore = store; 
        },
        clearMSG(){
            setTimeout(function(){
			 v.successMSG=''
			 },3000); // disappearing message success in 2 sec
        },
        clearAll(){
            v.newStore = { 
                store_name:'',            
                store_email:'',            
                store_address:''};
            v.formValidate = false;
            v.addModal= false;
            v.editModal=false;
            v.deleteModal=false;
            v.refresh()            
        },
        noResult(){          
               v.emptyResult = true;  // become true if the record is empty, print 'No Record Found'
                      v.stores = null 
                     v.totalStores = 0 //remove current page if is empty
        },     
        pageUpdate(pageNumber){
              v.currentPage = pageNumber; //receive currentPage number came from pagination template
                v.refresh()  
        },
        refresh(){
             v.search.text ? v.searchStore() : v.showAll(); //for preventing
            
        }
    }
})