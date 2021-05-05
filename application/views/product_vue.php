<?php include_once('user_templates/header.php')?>
<?php include_once('user_templates/navbar.php')?>
<?php include_once('user_templates/searchbar.php')?>
<?php include_once('user_templates/productlist.php')?>

<div class="row" v-if="productstatus">
<!-- repeat this all for same product in a loop -->  
  <div class="col-md-4"  v-if="gridview" v-for='(product, index) in products'>
		<article class="card card-product-grid">
			<div class="img-wrap"> 
			 <span v-if="index==0"class="badge badge-danger"> NEW </span>		
				<img :src="productImage(product.product_image)">
				<a class="btn-overlay" data-fancybox="" :href="productImage(product.product_image)" data-caption=""><i class="fa fa-search-plus"></i> Quick view</a>				
			</div> <!-- img-wrap.// -->
			<div class="col-md-6">
				<div class="info-main">	
					<div class="rating-wrap">
						<ul class="rating-stars">
							<li style="width:80%" class="stars-active"> 						
							<span v-for="i in randomNumber(1,5)">
							<i class="fa fa-star"></i>
							</span>					
							</li>
							<li>
							<?php for($i=1;$i<=5;$i++)echo '<i class="fa fa-star"></i>';?>																		 
							</li>
						</ul>
						<div class="label-rating">3/5</div>
						<span class="label-rating text-muted"v-html="randomNumber(1,1000)" >  </span><span> reviews</span>
					</div>
				</div> <!-- info-main.// -->
			</div> <!-- col.// -->			
			<figcaption class="info-wrap">
				<div class="fix-height">
					<a href="" class="title" v-html="product.product_name"></a>
					<div class="price-wrap mt-2">
						<span class="price">NRS </span><span v-html="product.product_base_price"></span>
						<del class="price-old">NRS </del><del class="price-old" v-html="randomNumber(100,2000)"></del>
					</div> <!-- price-wrap.// -->
				</div>
				<button  @click='addToCart(product.product_id);'class="btn btn-block btn-primary text-white"><i class="fa fa-shopping-cart" ></i> Add to cart </button>				
				<button href="" @click='addToWishlist(product.product_id);'class="btn btn-block btn-light"><i class="fa fa-heart "   @click="$event.target.classList.toggle('text-danger')" :class="{ 'text-danger': isActive }"></i> Add to Wishlist </button>				
			</figcaption>
	</div> <!-- col.// -->	
	</div> <!-- row end.// -->

<article class="card card-product-list" v-if="listview" v-for='(product, index) in products'>
	<div class="row no-gutters">
		<aside class="col-md-3">
			<a href="" class="img-wrap">
			<span v-if="index==0"class="badge badge-danger"> NEW </span>	
				<img :src="productImage(product.product_image)">
			</a>
		</aside> <!-- col.// -->
		<div class="col-md-6">
			<div class="info-main">
				<a href="" class="h5 title" v-html="product.product_name"> product name  </a>
				<div class="rating-wrap mb-3">
					<ul class="rating-stars">
						<li style="width:80%" class="stars-active">
						<span v-for="i in randomNumber(1,5)">
							<i class="fa fa-star"></i>
						</span>						
						</li>
						<li>
						<?php for ($j=1;$j<=5;$j++)echo '<i class="fa fa-star"></i>';?>							
						</li>
					</ul>
					<div class="label-rating">3/5</div>
					<span class="label-rating text-muted" v-html="randomNumber(1,1000)" > reviews</span>
				</div> <!-- rating-wrap.// -->				
				<p v-html="product.product_description"> </p>
			</div> <!-- info-main.// -->
		</div> <!-- col.// -->
		<aside class="col-sm-3">
			<div class="info-aside">
				<div class="price-wrap">
				<span class="price h5">NRS </span><span v-html="product.product_base_price"></span>
				<del class="price-old">NRS </del><del class="price-old" v-html="randomNumber(100,2000)"></del>
				</div> <!-- info-price-detail // -->
				<p class="text-success">Free shipping</p>
				<br>
				<p>
				<button  @click='addToCart(product.product_id);'class="btn btn-block btn-primary text-white"><i class="fa fa-shopping-cart" ></i> Add to cart </button>
				<button @click='addToWishlist(product.product_id);'href="" class="btn btn-block btn-light"><i class="fa fa-heart "   @click="$event.target.classList.toggle('text-danger')" :class="{ 'text-danger': isActive }"></i> Add to Wishlist </button>	
					
				</p>
			</div> <!-- info-aside.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->
</article> <!-- card-product .// -->
<div class="row ">
	<div class="col-md-8 text-center">
	<pagination
        :current_page="currentPage"
        :row_count_page="rowCountPage"
         @page-update="pageUpdate"
         :total_results="totalproducts"
         :page_range="pageRange"
         >
      </pagination>
	</div>
</div>
</div> <!-- container .//  -->
</section>
<?php include_once('user_templates/order.php')?>
<?php include_once('user_templates/wishlist.php')?>
<?php include_once('user_templates/cart.php')?>

<?php include_once('user_templates/footer_bottom.php')?>
<script type="text/javascript">
var app = new Vue({
  el: '#app',
  data(){
    let mainurl=window.location.origin;
        path=window.location.pathname;          
        let pathl = path.split("/");
        pathl.pop();pathl.pop()// remove the last
        result = pathl.join("/");
        baseurl=mainurl+result 
      return {
			url:'<?php echo site_url();?>',
			products: '',
			categories: '',
			brands: '',
			item_count:0,
			orderitem_count:0,
			wishitem_count:0,
			baseurl:baseurl,
			cartData:'' ,
			orderData:'' ,
			wishlistData:'' ,
			cartstatus:false,
			wishlistStatus:false,
			productstatus:true,
			orderstatus:false,
			totalprice:0,
			totaltax:0,
			totaldiscount:0,
			finalprice:0,
			isActive: false,
			gridview:true,
			listview:false,
			placeordersts:true,
			minvalue:0,
			maxvalue:0,
			currentvalue:0,			
			search: {text: ''},
			brandsearch: {text: ''},
			categorysearch: {text: ''},
			couponsearch: {text: ''},
			emptyResult:false,
			emptyCategoryResult:false,
			emptyBrandResult:false,
			showNavbar: true, 
			loadingstatus:false, 
			couponloadingstatus:false,
			couponmessage:'',
			couponstatus:false,      
			//pagination
			currentPage: 0,//the starting page number
			rowCountPage:10,//no of results in one page
			totalproducts:0,//number required to calculate total pages for pagination value
			pageRange:2,//number after'....' will appear 						
      }   
  },
  created: function(){     
      this.getproducts(); 
	  this.getbrands();    
	  this.getcategories(); 
	  this.showCart();
	  this.showWishlist();	    
  }, 
  mounted () {
  window.addEventListener('scroll', this.onScroll)
},
  methods: {
	myFilter(event) {		
      this.isActive = !this.isActive; // some code to filter users
    },
	onScroll () {  
    const scrollDistance =  document.documentElement.scrollTop   
    // Here we determine whether we need to show or hide the navbar
    this.showNavbar = scrollDistance> 200	
  },
    productImage(value){
            if(value==null ||value=='') return this.url+'assets/img/product_images/no_image.png'
            return this.url+'assets/img/product_images/'+value //for product image in the table
		},  
	multiply(price,qty){
return 'NRS '+(price*qty)
		},	
    getproducts(order=''){  
		var link='/'+order;        
      axios.get(this.url+'product/productDetails'+link, {})
      .then(function (response) {
		if(response.data == null)
            app.noResult()
        else
            app.getData(response.data);                         
      }); 
	},
	getcategories(order=''){  
		var link='/'+order;        
      axios.get(this.url+'category/showAll'+link, {})
      .then(function (response) {
		if(response.data.categories == null)
            app.noCategoryResult()
        else
            app.giveResponse(response.data.categories,'Category');                         
      }); 
	},
	getbrands(order=''){  
		var link='/'+order;        
      axios.get(this.url+'brand/showAll'+link, {})
      .then(function (response) {
		if(response.data == null)
            app.noBrandResult()
        else
            app.giveResponse(response.data.brands,'Brand');                         
      }); 
	},
	giveResponse(data,type){
		if(type=='Brand'){
			app.emptyBrandResult = false; // become false if has a record	
			app.brands =data.slice(0,10);
		}
		else if(type=='Category'){
			app.emptyCategoryResult = false; // become false if has a record	
			app.categories =data;         
		}		
		},
	changeresultno(e){
		showresults=e.target.value		
		app.rowCountPage=showresults
		app.refresh()
	},
	changesearchtype(e){
		showresults=e.target.value	
		app.getproducts(showresults);
	},
	pricerange(e){
		showresults=e.target.value
		if(app.currentvalue<showresults)
		app.maxvalue=showresults		
		else		
		app.minvalue=showresults
		app.currentvalue=showresults
		//app.getproducts(showresults);
	},
	changeView(view){
		if(view=='list'){
		this.listview = true
		this.gridview = false}
		else{
		this.listview = false
		this.gridview = true}	
	},
	pageUpdate(pageNumber){
              app.currentPage = pageNumber; //receive currentPage number came from pagination template
                app.refresh()  
        },
	getData(products){
		app.emptyResult = false; // become false if has a record
		app.totalproducts = products.length //get total of user
		app.products = products.slice(app.currentPage * app.rowCountPage, (app.currentPage * app.rowCountPage) + app.rowCountPage); //slice the result for pagination
         // if the record is empty, go back a page
            if( app.products.length == 0 &&  app.currentPage > 0){ 
				app.pageUpdate(v.currentPage - 1)
				app.refresh()  
            }
		},
	
    addToCart: function(id){
        axios.post(this.url+'product/addToCart', {id: id})
            .then(function (response) {                                
				app.item_count = response.data;                                 
            })                                                     
	},
	addToWishlist: function(id){
        axios.post(this.url+'product/addToWishlist', {id: id})
            .then(function (response) {
				
				app.wishitem_count = response.data;
            })                                                     
    },
	showCart: function(){
      axios.get(this.url+'product/cartCount')
      .then(function (response) {
            app.item_count = response.data;
      }); 
	}, 
	showWishlist: function(){
      axios.get(this.url+'product/WishlistCount')
      .then(function (response) {
            app.wishitem_count = response.data;
      }); 
    },
	showOrder: function(){
      axios.get(this.url+'product/cartCount')
      .then(function (response) {
            app.orderitem_count = response.data;
      }); 
	},
    cartDetails:function(status){ 
		app.productstatus=app.orderstatus=app.wishlistStatus=app.cartstatus=false     
      if(status==1)    app.cartstatus=app.loadingstatus=true; 
	  else if (status==2) app.orderstatus=app.loadingstatus=true; 
	  	   
      axios.get(this.url+'product/showCartItems', {}).then(function (response) {
		if(status==1)   app.cartData = response.data; 
	  else if (status==2) app.orderData = response.data;			
			app.totalprice =0;
			app.totaltax=0;		
            Object.entries(response.data).forEach(([key, val]) => {
				 let price = val.price*val.qty;  
				 let discount=val.discount*val.qty;        
				app.totalprice = app.totalprice+price; 
				app.totaldiscount = app.totaldiscount+discount; 
			});
			app.finalprice= app.totalprice-app.totaldiscount;  
			app.loadingstatus=false                       
      }); 
	},
	orderDetails:function(status){      
      if(status==1)    app.orderstatus=app.loadingstatus=true;      
	   app.productstatus=app.cartstatus=app.wishlistStatus=false
	   app.showOrder();
      axios.get(this.url+'product/showCartItems', {}).then(function (response) {
			app.orderData = response.data;
			app.totalprice =0;
			app.totaltax=0;
			app.totaldiscount=0;
            Object.entries(response.data).forEach(([key, val]) => {
				 let price = val.price*val.qty;  
				 let discount=val.discount*val.qty;        
				app.totalprice = app.totalprice+price; 
				app.totaldiscount = app.totaldiscount+discount; 
			});
			app.finalprice= app.totalprice-app.totaldiscount;  
			app.loadingstatus=false                       
      }); 
	},
	WishlistDetails:function(status){      
	  if(status==1)    app.wishlistStatus= app.loadingstatus=true;	
	  app.orderstatus=app.productstatus=app.cartstatus=false	   
      axios.get(this.url+'product/showWishlistItems', {}).then(function (response) {		 
			app.wishlistData = response.data;
			app.loadingstatus=false
      }); 
	},
	randomNumber (min=5,max=100) {
		return  Math.floor(Math.random() * max) + min; 
	},
    continueShopping:function(){
	   app.cartstatus=app.wishlistStatus=app.orderstatus=false;
       app.productstatus=true;       
    },    
    removeCart: function(id){     
      axios.post(this.url+'product/removeCart', { rowid: id}).then(function (response) {
		  app.totalprice=0; app.cartDetails(1);
		  app.item_count=app.item_count-1
		})
		        
	},
	removeWishlist: function(id){     
      axios.post(this.url+'product/removeWishlist', { product_id: id}).then(function (response) {
		   app.WishlistDetails(1);
		  app.wishitem_count=app.wishitem_count-1
		})
		        
    },
    cartUpdate:function(event,obj,status=1){        
        axios.post(this.url+'product/updateCart',{ rowid : obj.rowid,qty :event.target.value })
        .then(function (response) { app.totalprice=0;app.cartDetails(status);})       
    },
    placeOrder(){
        app.placeordersts=true;
        app.cartstatus=false;
        app.totalprice=0;
        app.cartDetails(0);
    },	
	searchProduct(){	
	var formData = app.formData(app.search);
		axios.post(this.url+"product/searchproduct", formData).then(function(response){			
			if(response.data.products == null) app.noResult()
			else   app.getData(response.data.products);
	})
	},
	searchCategory(){	
	var formData = app.formData(app.categorysearch);
		axios.post(this.url+"category/searchCategory", formData).then(function(response){			
			if(response.data.categories== null) app.noCategoryResult()
			else   app.giveResponse(response.data.categories,'Category');
	})
	},
	searchBrand(){	
	var formData = app.formData(app.brandsearch);
		axios.post(this.url+"brand/searchBrand", formData).then(function(response){			
			if(response.data.brands == null) app.noBrandResult()
			else   app.giveResponse(response.data.brands,'Brand'); 
	})
	},
	searchCoupon(){	
		app.couponloadingstatus=true
	var formData = app.formData(app.couponsearch);
		axios.post(this.url+"store/searchcoupon", formData).then(function(response){			
			if(response.data.coupon == null) 
			app.message('No coupon was found')
			else{
				app.message(response.data.message,response.data.status)
				app.totaldiscount=app.totaldiscount+response.data.discount
				app.finalprice=app.finalprice-app.totaldiscount

			} 
			
			  //app.couponstatus=true;
	})
	.catch(function (error) {
		//app.couponstatus=false
		app.couponloadingstatus=false
		app.message('Invalid Coupon code')       
    }); 
	},
	message(message,type='danger'){	
		app.couponmessage='<div class="alert alert-'+type+'">'+message+'</div>'
		app.couponloadingstatus=false
		 
	},
	
	formData(obj){
			var formData = new FormData();
		      for ( var key in obj ) {
		          formData.append(key, obj[key]);
		      } 
		      return formData;
	},     
	noResult(){          
		app.emptyResult = true;  // become true if the record is empty, print 'No Record Found'
		app.products = null 
		app.totalproducts = 0 //remove current page if is empty            
	},  
	noBrandResult(){          
		app.emptyBrandResult = true;  // become true if the record is empty, print 'No Record Found'
		app.brands = null 		         
	},      
	noCategoryResult(){          
		app.emptyCategoryResult = true;  // become true if the record is empty, print 'No Record Found'
		app.categories = null 	           
	},
	pageUpdate(pageNumber){
			app.currentPage = pageNumber; //receive currentPage number came from pagination template
			app.refresh()  
	},
	refresh(){
			app.search.text ? app.searchProduct() : app.getproducts(); //for preventing
	}

  },
   
    
});
</script>
