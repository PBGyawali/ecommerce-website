
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
     data(){
        let mainurl=window.location.origin;
        path=window.location.pathname;          
        let pathl = path.split("/");
        pathl.pop();pathl.pop()// remove the last
        result = pathl.join("/");
        baseurl=mainurl+result    
        return {
            url:baseurl+'/',
            bigurl:mainurl+path.substring(0,path.lastIndexOf('/'))+'/',
            addModal: false,
            editModal:false,
            deleteModal:false,
            products:[],
            search: {text: ''},
            emptyResult:false,
            local:true,
            temporaryimage:'',           
            newproduct:{
                product_name:'',
                product_price:'',
                product_tax:'',
                product_image:'',                
                product_image_url:'',
                product_image_value:'',
                product_description:'',
                product_quantity:'',
                },
            chooseproduct:{
                product_image_url:'',
                product_image_value:'',
                product_image_change:'',                
            },
            formValidate:[],
            successMSG:'', 
            errorMSG:'',           
            //pagination
            currentPage: 0,//the starting page number
            rowCountPage:5,//no of results in one page
            totalproducts:0,//number required to calculate total pages for pagination value
            pageRange:2//number after'....' will appear
        }
    },
     created(){
      this.showAll();       
    },
    methods:{
         showAll(){ 
             axios.get(this.bigurl+"showAll").then(function(response){
                 if(response.data.products == null)
                     v.noResult()
                else
                    v.getData(response.data.products);                   
            })
        },
          searchproduct(){
            var formData = v.formData(v.search);
              axios.post(this.bigurl+"searchproduct", formData).then(function(response){
                  if(response.data.products == null)
                      v.noResult()
                  else
                      v.getData(response.data.products);
            })
        },
          addproduct(){ 
            if(v.newproduct.product_name=='')  {
              v.formValidate = { 
                product_name:'product name is empty',
                product_price:'',
                product_image:'',
                product_tax:'',
                product_image_url:'',
                product_description:'',
                product_quantity:'',
                           
                };
             
            }
            else
           { var formData = v.formData(v.newproduct);
            this.file = this.$refs.newfile.files[0]; 
            formData.append('file', this.file);
              axios.post(this.bigurl+"addproduct", formData,{
                  headers: {'Content-Type': 'multipart/form-data'}
              }).then(function(response){v.showresponse(response);})}
        },
        updateproduct(){
            var formData = v.formData(v.chooseproduct);
            this.file = this.$refs.file.files[0]; 
            formData.append('file', this.file);
            axios.post(this.bigurl+"updateproduct", formData,{
                headers: {'Content-Type': 'multipart/form-data'}
            })            
              .then(function(response){v.showresponse(response);})
        },
        deleteproduct(){
             var formData = v.formData(v.chooseproduct);
              axios.post(this.bigurl+"deleteproduct", formData).then(function(response){
                v.showresponse(response);
            })
        },
        showresponse(response){
            if(response.data.error)
            v.formValidate = response.data.msg;
            else{
                v.successMSG = response.data.msg;
                v.clearAll();
                v.clearMSG();                
            }        
        },
         formData(obj){
			var formData = new FormData();
		      for ( var key in obj ) {
		          formData.append(key, obj[key]);
		      } 
		      return formData;
		},
        getData(products){
            v.emptyResult = false; // become false if has a record
            v.totalproducts = products.length //get total of product
            v.products = products.slice(v.currentPage * v.rowCountPage, (v.currentPage * v.rowCountPage) + v.rowCountPage); //slice the result for pagination
            
             // if the record is empty, go back a page
            if(v.products.length == 0 && v.currentPage > 0){ 
            v.pageUpdate(v.currentPage - 1)
            v.clearAll();  
            }
        },
            
        selectproduct(product){
            v.chooseproduct = product; 
        },
        clearMSG(){
            setTimeout(function(){
			 v.successMSG=''
			 },3000); // disappearing message success in 2 sec
        },
        clearAll(){
            v.newproduct = { 
            product_name:'',
            product_price:'',
            product_image:'',
            product_tax:'',
            product_image_url:'',
            product_description:'',
            product_quantity:'',
                       
            };
            v.chooseproduct={                
                product_image_value:'',
            },
            v.formValidate = false;
            v.addModal= false;
            v.editModal=false;
            v.deleteModal=false;
            v.refresh()
            
        },
        noResult(){          
               v.emptyResult = true;  // become true if the record is empty, print 'No Record Found'
                      v.products = null 
                     v.totalproducts = 0 //remove current page if is empty            
        },
        onFilePicked (event) { 
            if(event.target.files.length==0)return
            const file = event.target.files[0]; 
            let filename = file.name
            var extension = filename.split('.').pop().toLowerCase();
            var filesize = file.size;
            var allowed_file=["jpg","jpeg","png"];           
            if(extension != '')
            {
                  if(!allowed_file.includes(extension))
                    return v.image_error("Invalid Image File type")  
                  else if (filesize > 500000) 
                    return v.image_error("File Image size is too large") 
                  else 
                    {     var _URL = window.URL || window.webkitURL;
                          var image = new Image();
                          image.src = _URL.createObjectURL(file);
                          image.onload = function(e){
                              imgwidth = this.width;
                              imgheight = this.height;
                              if (imgheight + imgwidth == 0) 
                                return v.image_error("This file is not an image")                                                                
                              else                            
                              v.pickproduct_image(image.src,filename);
                              v.changeproduct_image(image.src,filename);  
                          }
                          image.onerror = function() {
                            return v.image_error("This is not a valid " + extension+" file")
                          }
                    };
            }
          },
        image_error(message){
            v.newproduct.product_image = ''           
            v.newproduct.product_image_url=''
            v.newproduct.product_image_value=''
            v.chooseproduct.product_image = ''
            v.chooseproduct.product_image_url=''
            v.chooseproduct.product_image_value=''
            alert(message)
        },
        pickproduct_image(imageurl,imagename){        
            v.newproduct.product_image_url=imageurl
           return v.newproduct.product_image = imagename //add new product with selecting gender
        },
        changeproduct_image(imageurl,imagename){          
            v.chooseproduct.product_image_url=imageurl 
            v.chooseproduct.product_image = imagename 
            v.chooseproduct.product_image_change = imagename 
        }, 
        imageproduct(value){
            if(value==''||value==null)
            imagelink=v.url+'assets/img/product_images/no_image.png'
            else
            imagelink=v.url+'assets/img/product_images/'+value
             return imagelink
        },        
        pageUpdate(pageNumber){
              v.currentPage = pageNumber; //receive currentPage number came from pagination template
                v.refresh()  
        },
        refresh(){
             v.search.text ? v.searchproduct() : v.showAll(); //for preventing
            
        }
    }
})