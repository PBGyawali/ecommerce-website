<section class="section-pagetop bg text-center py-3"v-if="orderstatus">
	<h2 class="title-page">Order confirmation</h2>
</section>
<section class="section-content padding-y" v-if="orderstatus">
<h2 v-if="loadingstatus" class="text-center"><i class="fa fa-spinner fa-pulse "></i> Please Wait......</h2>
    <div v-if="!loadingstatus" class="container">
        <div class="row">
	        <main class="col-md-9">
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
                            <tr v-for='data in orderData' >
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
		                        <input type="number" min='0'  @change='cartUpdate($event,data,2);' class="form-control input-sm" :value="data.qty">
	                            </td>
                                <td> 
                                    <div class="price-wrap"> 
                                        <var class="price" v-html='multiply(data.price,data.qty)'></var> 
                                        <small class="text-muted">NRS {{data.price}} each </small> 
                                    </div> <!-- price-wrap .// -->
                                </td>
                                <td class="text-right">
                                    <button @click='removeCart(data.rowid);' class="btn btn-danger btn-round"> Remove</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <h2 v-if="orderitem_count==0" class="text-center"><i class="fas fa-frown text-warning"></i> You have not selected any products yet.</h2>
                    <div class="card-body border-top">
                        <button class="btn btn-primary float-right " v-if="orderitem_count>0" > Confirm <i class="fa fa-chevron-right"></i> </button>
                        <a class="btn btn-light" @click='continueShopping();'> <i class="fa fa-chevron-left"></i> Continue shopping </a>
                    </div>	
                </div> <!-- card.// -->

                <div class="alert alert-success mt-3">
                    <p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 weeks for product value more than NRS 500</p>
                </div>
	        </main> <!-- col.// -->
            <aside class="col-md-3">
                <div class="card mb-3">
                    <div class="card-body">
                     
                            <div class="form-group">
                                <label>Have coupon?</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" v-model="couponsearch.text" name="" placeholder="Coupon code">
                                    <span class="input-group-append"> 
                                        <button type="button" class="btn btn-primary" @click="searchCoupon" >Apply</button>
                                    </span>
                                </div>
                            </div>
                            <h6 v-if="couponloadingstatus" class="text-center"><i class="fa fa-spinner fa-pulse "></i> Searching Coupon</h6>
                        <span v-if="couponmessage" class="text-center" v-html="couponmessage"></span>
                    </div> <!-- card-body.// -->
                </div>  <!-- card .// -->
                <div class="card">
                    <div class="card-body">
                            <dl class="dlist-align">
                                <dt>Total price:</dt>	
                                <dd class="text-right">NRS {{ totalprice }}</dd>
                            </dl>
                            <dl class="dlist-align">
                                <dt>Discount:</dt>
                                <dd class="text-right">NRS {{ totaldiscount }} </dd>
                            </dl>
                            <dl class="dlist-align">
                                <div class="row">
                                    <div class="col-3">
                                    <dt>Total:</dt>					  
                                    </div>
                                    <div class="col-9">
                                    <dd class="text-right  h5"><strong>NRS {{ finalprice }}</dd>
                                    </div>
                                </div>					  
                            </dl>
                            <hr>
                            <p class="text-center mb-3">
                                <img src="<?=LOGO_URL?>payments.png" height="26">
                            </p>					
                    </div> <!-- card-body.// -->
                </div>  <!-- card .// -->
            </aside> <!-- col.// -->
        </div>
    </div>
</section>