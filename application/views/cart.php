<?php include_once('user_templates/header.php')?>
<?php include_once('user_templates/navbar_top.php')?>
<?php include_once('user_templates/navbar.php')?>
<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-pagetop bg text-center py-3">
	<h2 class="title-page">Shopping cart</h2>
</section>
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y">
<div class="container">
<div class="row">
	<main class="col-md-9">
<div class="card">
<table class="table table-borderless table-shopping-cart">
<thead class="text-muted">
<tr class="small text-uppercase">
  <th scope="col">Product</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200"> </th>
</tr>
</thead>
<tbody><?php $cartproducts=0?>
	<?php for($i=1;$i<=rand(1,8);$i++):?>
		<?php $cartproducts++;		
		$colorarray=array('green','blue','red','violet','yellow');
		$sizearray=array('S','M','L','XL','XS');
		$brandarray=array('ikea','Tommy Hilfiger','Johnson & johnson','Amazon','Microsoft');
		?>
<tr>
	<td>
		<figure class="itemside">
			<div class="aside"><img src="<?=PRODUCTS_IMAGES_URL?><?=rand(1,8)?>.jpg" class="img-sm"></div>
			<figcaption class="info">
				<a href="" class="title text-dark">Item name</a>
				<p class="text-muted small">Size: <?=$sizearray[rand(0,count($sizearray)-1)]?>, Color: <?=$colorarray[rand(0,count($colorarray)-1)]?>, <br> Brand: <?=$brandarray[rand(0,count($brandarray)-1)]?></p>
			</figcaption>
		</figure>
	</td>
	<td> 
		<select class="form-control">
			<option>1</option>
			<option>2</option>	
			<option>3</option>	
			<option>4</option>	
		</select> 
	</td>
	<td> 
		<div class="price-wrap"> 
			<var class="price">NRS <?=$product[$i]=rand(100,5000)?></var> 
			<small class="text-muted"><?=$product[$i]?> each </small> 
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right"> 
	<a data-original-title="Save to Wishlist" title="" href="" class="btn btn-light" data-toggle="tooltip"> <i class="fa fa-heart"></i></a> 
	<button class="btn btn-danger btn-round"> Remove</button>
	</td>
</tr>
<?php endfor?>
</tbody>
</table>

<div class="card-body border-top">
	<a href="" class="btn btn-primary float-right"> Checkout <i class="fa fa-chevron-right"></i> </a>
	<a href="" class="btn btn-light"> <i class="fa fa-chevron-left"></i> Continue shopping </a>
</div>	
</div> <!-- card.// -->

<div class="alert alert-success mt-3">
	<p class="icontext"><i class="icon text-success fa fa-truck"></i> Free Delivery within 1-2 weeks for product value more than NRS 500</p>
</div>

	</main> <!-- col.// -->
	<aside class="col-md-3">
		<div class="card mb-3">
			<div class="card-body">
			<form>
				<div class="form-group">
					<label>Have coupon?</label>
					<div class="input-group">
						<input type="text" class="form-control" name="" placeholder="Coupon code">
						<span class="input-group-append"> 
							<button class="btn btn-primary">Apply</button>
						</span>
					</div>
				</div>
			</form>
			</div> <!-- card-body.// -->
		</div>  <!-- card .// -->
		<div class="card">
			<div class="card-body">
					<dl class="dlist-align">
					  <dt>Total price:</dt>
					  <?php for($k=1;$k<=$cartproducts;$k++)
					 $productvalue+= $product[$k];
					  ?>
					  <dd class="text-right">NRS <?=$productvalue?></dd>
					</dl>
					<dl class="dlist-align">
					  <dt>Discount:</dt>
					  <dd class="text-right">NRS <?=$discount=rand(0,($productvalue*50)/100)?></dd>
					</dl>
					<dl class="dlist-align">
						<div class="row">
							<div class="col-3">
							<dt>Total:</dt>					  
							</div>
							<div class="col-9">
							<dd class="text-right  h5"><strong>NRS <?=$productvalue-$discount?></strong></dd>
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

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name bg padding-y">
<div class="container">
<h6>Payment and refund policy</h6>
<p>Refund can be made within 30 days of product delivery date. The refund can be done only in case the product has no damage or the seller is in no way responsible for faulty or damaged products.</p>
</div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->
<?php include_once('user_templates/footer_bottom.php')?>