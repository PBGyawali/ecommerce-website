<?php include_once('user_templates/header.php')?>
<?php include_once('user_templates/navbar_top.php')?>
<?php include_once('user_templates/navbar.php')?>
<?php include_once('user_templates/navbar_bottom.php')?>
<!-- ========================= SECTION INTRO ========================= -->
<section class="section-intro">
<div class="intro-banner-wrap">
	<img src="images/banner/widebanner.jpg" class="w-100 img-fluid">
</div>
</section>
<!-- ========================= SECTION INTRO END// ========================= -->
<!-- ========================= SECTION SPECIAL ========================= -->
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
					<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labor </p>
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
					<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labor </p>
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
					<p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
					tempor incididunt ut labor </p>
				</figcaption>
			</figure> <!-- iconbox // -->
	</div><!-- col // -->
</div> <!-- row.// -->

</div> <!-- container.// -->
</section>
<!-- ========================= SECTION SPECIAL END// ========================= -->
<!-- ========================= SECTION  ========================= -->
<section class="section-name  padding-y-sm">
<div class="container">
<header class="section-heading">
	<a href="" class="btn btn-outline-primary float-right">See all</a>
	<h3 class="section-title text-center">Popular products</h3>
</header><!-- sect-heading -->	
<div class="row">
<?php for ($i=1;$i<=8;$i++):?>	
	<div class="col-md-3">
		<article class="card card-product-grid">
			<div class="img-wrap"><img src="images/products/<?=$i?>.jpg"></div> <!-- img-wrap.// -->
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
</div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->
<!-- ========================= FOOTER ========================= -->
<?php include_once('user_templates/footer.php')?>
<?php include_once('user_templates/footer_bottom.php')?>