<?php include_once('user_templates/header.php')?>
<?php include_once('user_templates/navbar_top.php')?>
<?php include_once('user_templates/navbar.php')?>
<?php include_once('user_templates/navbar_bottom.php')?>
<!-- ========================= SECTION BANNER ========================= -->

<!-- ========================= SECTION BANNER END// ========================= -->

<!-- ========================= SECTION FEATURE ========================= -->
<section class="section-specials padding-y border-bottom">
<div class="container">	
<div class="row">
<div class="col-md-4">	
			<figure class="itemside">
				<div class="aside">
					<span class="icon-sm rounded-circle bg-primary">
						<i class="fa fa-money-bill-alt white"></i>
					</span>
				</div>
				<figcaption class="info">
					<h6 class="title">Reasonable prices</h6>
					<p class="text-muted">Our products are reasonably and competitively priced. </p>
				</figcaption>
			</figure> <!-- iconbox // -->
	</div><!-- col // -->
	<div class="col-md-4">
			<figure class="itemside">
				<div class="aside">
					<span class="icon-sm rounded-circle bg-danger">
						<i class="fa fa-comment-dots white"></i>
					</span>
				</div>
				<figcaption class="info">
					<h6 class="title">Customer support 24/7 </h6>
					<p class="text-muted">We provide round the clock support for your problems and queries. </p>
				</figcaption>
			</figure> <!-- iconbox // -->
	</div><!-- col // -->
	<div class="col-md-4">
			<figure class="itemside">
				<div class="aside">
					<span class="icon-sm rounded-circle bg-success">
						<i class="fa fa-truck white"></i>
					</span>
				</div>
				<figcaption class="info">
					<h6 class="title">Quick delivery</h6>
					<p class="text-muted">The order is sent out as soon as the product is available and order is confirmed.</p>
				</figcaption>
			</figure> <!-- iconbox // -->
	</div><!-- col // -->
</div> <!-- row.// -->

</div> <!-- container.// -->
</section>
<!-- ========================= SECTION FEATURE END// ========================= -->


<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-cotent">
<div class="container">
<header class="section-heading">
<a href="./product" class="btn btn-outline-primary float-right">See all</a>
	<h3 class="section-title text-center">Popular products</h3>
</header><!-- sect-heading -->	
<div class="row">
<?php for ($i=1;$i<=4;$i++):?>
	<div class="col-md-3">
		<article class="card card-product-grid">
			<div class="img-wrap"><img src="<?=PRODUCTS_IMAGES_URL?><?=rand(1,8)?>.jpg"></div> <!-- img-wrap.// -->
			<div class="col-md-6">
			<div class="info-main">	
			<div class="rating-wrap">
					<ul class="rating-stars">
						<li style="width:80%" class="stars-active"> 
						<?php $minimumstar=rand(1,5)?> 
						<?php for ($j=1;$j<=$minimumstar;$j++)echo '<i class="fa fa-star"></i>';?>							
						</li>
						<li>
						<?php for ($j=1;$j<=5;$j++)	echo '<i class="fa fa-star"></i>';?>							 
						</li>
					</ul>
					<div class="label-rating"><?=$minimumstar?>/5</div>
					<span class="label-rating text-muted"><?=rand(1,1000)?> reviews</span>
				</div>
			</div> <!-- info-main.// -->
		</div> <!-- col.// -->	
			<figcaption class="info-wrap">
				<div class="fix-height">
					<a href="" class="title">Great item name goes here</a>
					<div class="price-wrap mt-2">
						<span class="price">NRS <?=$min=rand(100,10000)?></span>
						<del class="price-old">NRS <?=rand($min,$min+2000)?></del>
					</div> <!-- price-wrap.// -->
				</div>					
			</figcaption>
		</figure>
	</div> <!-- col.// -->
<?php endfor?>
	
	</div> <!-- row.// -->

</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content">
<div class="container">

<header class="section-heading">
<a href="./product" class="btn btn-outline-primary float-right">See all</a>
	<h3 class="section-title text-center">New arrived</h3>
</header><!-- sect-heading -->
<div class="row">
<?php for ($i=1;$i<=4;$i++):?>
	<div class="col-md-3">
		<article class="card card-product-grid">
			<div class="img-wrap"><img src="<?=PRODUCTS_IMAGES_URL?><?=rand(1,8)?>.jpg"></div> <!-- img-wrap.// -->
			<div class="col-md-6">
			<div class="info-main">	
			<div class="rating-wrap">
					<ul class="rating-stars">
						<li style="width:80%" class="stars-active"> 
						<?php $minimumstar=rand(1,5)?> 
						<?php for ($j=1;$j<=$minimumstar;$j++)echo '<i class="fa fa-star"></i>';?>							
						</li>
						<li>
						<?php for ($j=1;$j<=5;$j++)	echo '<i class="fa fa-star"></i>';?>							 
						</li>
					</ul>
					<div class="label-rating"><?=$minimumstar?>/5</div>
					<span class="label-rating text-muted"><?=rand(1,50)?> reviews</span>
				</div>
			</div> <!-- info-main.// -->
		</div> <!-- col.// -->	
			<figcaption class="info-wrap">
				<div class="fix-height">
					<a href="" class="title">Great item name goes here</a>
					<div class="price-wrap mt-2">
						<span class="price">NRS <?=$min=rand(100,10000)?></span>						
					</div> <!-- price-wrap.// -->
				</div>					
			</figcaption>
		</figure>
	</div> <!-- col.// -->
<?php endfor?>
</div> <!-- row.// -->
</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-bottom-sm">
<div class="container">

<header class="section-heading">
	<a href="./product" class="btn btn-outline-primary float-right">See all</a>
	<h3 class="section-title">Recommended</h3>
</header><!-- sect-heading -->
<div class="row">
<?php for ($i=1;$i<=4;$i++):?>
	<div class="col-md-3">
		<article class="card card-product-grid">
			<div class="img-wrap"><img src="<?=PRODUCTS_IMAGES_URL?><?=rand(1,8)?>.jpg"></div> <!-- img-wrap.// -->
			<div class="col-md-6">
			<div class="info-main">	
			<div class="rating-wrap">
					<ul class="rating-stars">
						<li style="width:80%" class="stars-active"> 
						<?php $minimumstar=rand(1,5)?> 
						<?php for ($j=1;$j<=$minimumstar;$j++)echo '<i class="fa fa-star"></i>';?>							
						</li>
						<li><?php for ($j=1;$j<=5;$j++)	echo '<i class="fa fa-star"></i>';?></li>
					</ul>
					<div class="label-rating"><?=$minimumstar?>/5</div>
					<span class="label-rating text-muted"><?=rand(1,100)?> reviews</span>
				</div>
			</div> <!-- info-main.// -->
		</div> <!-- col.// -->	
			<figcaption class="info-wrap">
				<div class="fix-height">
					<a href="" class="title">Great item name goes here</a>
					<div class="price-wrap mt-2">
						<span class="price">NRS <?=$min=rand(100,10000)?></span>
						<del class="price-old">NRS <?=rand($min,$min+2000)?></del>
					</div> <!-- price-wrap.// -->
				</div>					
			</figcaption>
		</figure>
	</div> <!-- col.// -->
<?php endfor?>	
</div> <!-- row.// -->
</div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<!-- ========================= SECTION  ========================= -->
<section class="section-name bg padding-y-sm">
<div class="container">
<header class="section-heading">
	<h3 class="section-title">Our Brands</h3>
</header><!-- sect-heading -->
<div class="row">
<?php for ($i=1;$i<=5;$i++):?>
	<div class="col-md-2 col-6">
		<figure class="box item-logo">
			<a href=""><img src="<?=LOGO_URL?>logo<?=$i?>.png"></a>
			<figcaption class="border-top pt-2"><?=rand(10,300)?> Products</figcaption>
		</figure> <!-- item-logo.// -->
	</div> <!-- col.// -->
<?php endfor?>
</div> <!-- row.// -->
</div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->
<!-- ========================= FOOTER ========================= -->
<?php include_once('user_templates/footer_top.php')?>
<?php include_once('user_templates/footer.php')?>
<?php include_once('user_templates/footer_bottom.php')?>
<!-- ========================= FOOTER END// ======================= -->