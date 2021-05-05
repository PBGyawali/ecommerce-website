
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
        categories:[],
        search: {text: ''},
        emptyResult:false,
        newCategory:{ category_name:''},
        chooseCategory:{},
        formValidate:[],
        successMSG:'',
        
        //pagination
        currentPage: 0,//the starting page number
        rowCountPage:5,//no of results in one page
        totalcategories:0,//number required to calculate total pages for pagination value
        pageRange:2//number after'....' will appear
    },
     created(){
      this.showAll(); 
    },
    methods:{
         showAll(){ axios.get(this.url+"/showAll").then(function(response){
             categories=response.data.categories;
                 if(categories == null){
                     v.noResult()
                    }else{
                        v.getData(categories);
                    }
            })
        },
          searchCategory(){
            var formData = v.formData(v.search);
              axios.post(this.url+"/searchCategory", formData).then(function(response){
                categories=response.data.categories;
                if(categories == null){
                    v.noResult()
                   }else{
                       v.getData(categories);
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
          addCategory(){   
            var formData = v.formData(v.newCategory);
              axios.post(this.url+"/addCategory", formData).then(function(response){
                if(response.data.error){
                    v.formValidate = response.data.msg;
                }else{
                    v.successMSG = response.data.msg;
                    v.clearAll();
                    v.clearMSG();
                }
               })
        },
        updateCategory(){
            var formData = v.formData(v.chooseCategory); axios.post(this.url+"/updateCategory", formData).then(function(response){
                if(response.data.error){
                    v.formValidate = response.data.msg;
                }else{
                      v.successMSG = response.data.success;
                    v.clearAll();
                    v.clearMSG();
                
                }
            })
        },
        deleteCategory(){
             var formData = v.formData(v.chooseCategory);
              axios.post(this.url+"/deleteCategory", formData).then(function(response){
                if(!response.data.error){
                     v.successMSG = response.data.success;
                    v.clearAll();
                    v.clearMSG();
                }
            })
        },
        
        getData(categories){
            v.emptyResult = false; // become false if has a record
            v.totalcategories = categories.length //get total of category
            v.categories = categories.slice(v.currentPage * v.rowCountPage, (v.currentPage * v.rowCountPage) + v.rowCountPage); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(v.categories.length == 0 && v.currentPage > 0){ 
            v.pageUpdate(v.currentPage - 1)
            v.clearAll();  
            }
        },
            
        selectCategory(category){
            v.chooseCategory = category; 
        },
        clearMSG(){
            setTimeout(function(){
			 v.successMSG=''
			 },3000); // disappearing message success in 2 sec
        },
        clearAll(){
            v.newCategory = {category_name:'' };
            v.formValidate = false;
            v.addModal= false;
            v.editModal=false;
            v.deleteModal=false;
            v.refresh()
        },
        noResult(){          
               v.emptyResult = true;  // become true if the record is empty, print 'No Record Found'
                      v.categories = null 
                     v.totalcategories = 0 //remove current page if is empty            
        },
       
        pageUpdate(pageNumber){
              v.currentPage = pageNumber; //receive currentPage number came from pagination template
                v.refresh()  
        },
        refresh(){
             v.search.text ? v.searchCategory() : v.showAll(); //for preventing
            
        }
    }
})