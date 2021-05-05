
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
        url:window.location,
        addModal: false,
        editModal:false,
        deleteModal:false,
        brands:[],
        search: {text: ''},
        emptyResult:false,
        newBrand:{ brand_name:''},
        chooseBrand:{},
        formValidate:[],
        successMSG:'',
        
        //pagination
        currentPage: 0,//the starting page number
        rowCountPage:5,//no of results in one page
        totalbrands:0,//number required to calculate total pages for pagination value
        pageRange:2//number after'....' will appear
    },
     created(){
      this.showAll();       
    },
    methods:{
         showAll(){ axios.get(this.url+"/showAll").then(function(response){
             brands=response.data.brands;
                 if(brands == null){
                     v.noResult()
                    }else{
                        v.getData(brands);
                    }
            })
        },
          searchBrand(){
            var formData = v.formData(v.search);
              axios.post(this.url+"/searchBrand", formData).then(function(response){
                brands=response.data.brands;
                if(brands == null){
                    v.noResult()
                   }else{
                       v.getData(brands);
                   }
            })
        },
          addBrand(){   
            var formData = v.formData(v.newBrand);
              axios.post(this.url+"/addBrand", formData).then(function(response){
                if(response.data.error){
                    v.formValidate = response.data.msg;
                }else{
                    v.successMSG = response.data.msg;
                    v.clearAll();
                    v.clearMSG();
                }
               })
        },
        updateBrand(){
            var formData = v.formData(v.chooseBrand); axios.post(this.url+"/updateBrand", formData).then(function(response){
                if(response.data.error){
                    v.formValidate = response.data.msg;
                }else{
                      v.successMSG = response.data.success;
                    v.clearAll();
                    v.clearMSG();
                
                }
            })
        },
        deleteBrand(){
             var formData = v.formData(v.chooseBrand);
              axios.post(this.url+"/deleteBrand", formData).then(function(response){
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
        getData(brands){
            v.emptyResult = false; // become false if has a record
            v.totalbrands = brands.length //get total of brand
            v.brands = brands.slice(v.currentPage * v.rowCountPage, (v.currentPage * v.rowCountPage) + v.rowCountPage); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(v.brands.length == 0 && v.currentPage > 0){ 
            v.pageUpdate(v.currentPage - 1)
            v.clearAll();  
            }
        },
            
        selectBrand(brand){
            v.chooseBrand = brand; 
        },
        clearMSG(){
            setTimeout(function(){
			 v.successMSG=''
			 },3000); // disappearing message success in 2 sec
        },
        clearAll(){
            v.newBrand = {brand_name:'' };
            v.formValidate = false;
            v.addModal= false;
            v.editModal=false;
            v.deleteModal=false;
            v.refresh()
        },
        noResult(){          
               v.emptyResult = true;  // become true if the record is empty, print 'No Record Found'
                      v.brands = null 
                     v.totalbrands = 0 //remove current page if is empty            
        },
       
        pageUpdate(pageNumber){
              v.currentPage = pageNumber; //receive currentPage number came from pagination template
                v.refresh()  
        },
        refresh(){
             v.search.text ? v.searchBrand() : v.showAll(); //for preventing
            
        }
    }
})