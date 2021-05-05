<section class="section-pagetop bg text-center py-3"v-if="cartstatus">
	<h2 class="title-page">Shopping cart</h2>
</section>
<section class="section-content padding-y" v-if="cartstatus">
<h2 v-if="loadingstatus" class="text-center"><i class="fa fa-spinner fa-pulse "></i> Please Wait......</h2>
    <div v-if="!loadingstatus" class="container">
        <div class="row">
	        <main class="col-md-12">
                <div class="card">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                            <th scope="col"  class="text-center">Product</th>
                            <th scope="col" width="120">Quantity</th>
                            <th scope="col" width="120">Price</th>
                            <th scope="col" class="text-right" width="200">Action </th>
                            </tr>
                        </thead>
                        <tbody>	
                            <tr v-for='data in cartData' >
                                <td>
                                    <figure class="itemside">
                                        <div class="aside"><img :src="productImage(data.image)" class="img-sm"></div>
                                        <figcaption class="info">
                                            <a href="" class="title text-dark">{{ data.name }}</a>
                                            <p class="text-muted small">Size: <?=$sizearray[rand(0,count($sizearray)-1)]?>, Color: <?=$colorarray[rand(0,count($colorarray)-1)]?>, <br> Brand:  {{brands[Math.floor(Math.random() * brands.length)].brand_name}}</p>
                                        </figcaption>
                                    </figure>
	                            </td>
	                            <td>	
		                        <input type="number" min='0'  @change='cartUpdate($event,data);' class="form-control input-sm" :value="data.qty">
	                            </td>
                                <td> 
                                    <div class="price-wrap"> 
                                        <var class="price">NRS {{data.price}}</var>                                         
                                    </div> <!-- price-wrap .// -->
                                </td>
                                <td class="text-right"> 
                                    <a data-original-title="Save to Wishlist" @click='addToWishlist(data.id);' title="" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> 
                                    <button @click='removeCart(data.rowid);' class="btn btn-danger btn-round"> Remove</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h2 v-if="item_count==0" class="text-center"><i class="fas fa-frown text-warning"></i> Your Shopping Cart Is Empty</h2>
                    <div class="card-body border-top">
                        <button  class="btn btn-primary float-right" v-if="item_count>0" @click='orderDetails(1);' > Checkout <i class="fa fa-chevron-right"></i> </button>
                        <a class="btn btn-light" @click='continueShopping();'> <i class="fa fa-chevron-left"></i> Continue shopping </a>
                    </div>	
                </div> <!-- card.// -->                
	        </main> <!-- col.// -->     	
                    </div> <!-- card-body.// -->
                </div>  <!-- card .// -->
            </aside> <!-- col.// -->
        </div>
    </div>
</section>