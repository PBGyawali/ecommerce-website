<section class="section-pagetop bg text-center py-3"v-if="wishlistStatus">
	<h2 class="title-page">Wish List</h2>
</section>
<section class="section-content padding-y" v-if="wishlistStatus">
    <h2 v-if="loadingstatus" class="text-center"><i class="fa fa-spinner fa-pulse "></i> Please Wait......</h2>
    <div v-if="!loadingstatus"class="container">
        <div class="row">
            <main class="col">
                <div class="card">
                    <table class="table table-borderless table-shopping-cart">
                        <thead class="text-muted">
                            <tr class="small text-uppercase">
                                <th scope="col" class="text-center">Product</th>  
                                <th scope="col" width="120">Price</th>
                                <th scope="col" class="text-right" width="200">Action </th>
                            </tr>
                        </thead>
                        <tbody>	
                            <tr v-for='data in wishlistData' >
                                <td>
                                    <figure class="itemside">
                                        <div class="aside"><img :src="productImage(data.product_image)" class="img-sm"></div>
                                        <figcaption class="info">
                                            <a href="" class="title text-dark">{{ data.product_name }}</a>
                                            <p class="text-muted small">Size: <?=$sizearray[rand(0,count($sizearray)-1)]?>, Color: <?=$colorarray[rand(0,count($colorarray)-1)]?>, <br> Brand:  {{brands[Math.floor(Math.random() * brands.length)].brand_name}}</p>
                                        </figcaption>
                                    </figure>
                                </td>	
                                <td> 
                                    <div class="price-wrap"> 
                                        <var class="price">NRS {{data.product_base_price}}</var> 
                                    </div> <!-- price-wrap .// -->
                                </td>
                                <td class="text-right">    
                                <a @click='addToCart(data.product_id);' title="Save to Shopping cart"  class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-shopping-cart"></i></a> 
                                <button @click='removeWishlist(data.product_id);' class="btn btn-danger btn-round"> Remove</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h2 v-if="wishitem_count==0" class="text-center"><i class="fas fa-heart-broken text-danger"></i> Your Wishlist Is Empty</h2>
                    <div class="card-body border-top">
                        <a href=""  class="btn btn-primary float-right">Buy these Items <i class="fa fa-chevron-right"></i> </a>
                        <a  class="btn btn-light" @click='continueShopping();'> <i class="fa fa-chevron-left"></i> Continue shopping </a>
                    </div>	
                </div> <!-- card.// -->
            </main> <!-- col.// -->	
        </div>
    </div>
</section>