<?php include_once('user_templates/header.php')?>
<?php include_once('user_templates/navbar_top.php')?>
<?php include_once('user_templates/navbar.php')?>
<?php include_once('user_templates/searchbar.php')?>
<?php include_once('user_templates/productlist.php')?>	
<?php for ($i=1;$i<=5;$i++):?>
<article class="card card-product-list">
	<div class="row no-gutters">
		<aside class="col-md-3">
			<a href="" class="img-wrap">
			<?php if($i==1)echo'<span class="badge badge-danger"> NEW </span>';?>
				<img src="images/products/<?=$i?>.jpg">			
			</a>
		</aside> <!-- col.// -->
		<div class="col-md-6">
			<div class="info-main">
				<a href="" class="h5 title"> Great product name goes here  </a>
				<div class="rating-wrap mb-3">
					<ul class="rating-stars">
						<li style="width:80%" class="stars-active">
						<?php $minimumstar=rand(1,5)?> 
						<?php for ($j=1;$j<=$minimumstar;$j++)echo '<i class="fa fa-star"></i>';?>
						</li>
						<li>
						<?php for ($j=1;$j<=5;$j++)echo '<i class="fa fa-star"></i>';?>							
						</li>
					</ul>
					<div class="label-rating"><?=$minimumstar?>/5</div>
					<span class="label-rating text-muted"><?=rand(1,1000)?> reviews</span>
				</div> <!-- rating-wrap.// -->				
				<p> Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Lorem ipsum dolor sit amet, consectetuer adipiscing elit, Ut wisi enim ad minim veniam </p>
			</div> <!-- info-main.// -->
		</div> <!-- col.// -->
		<aside class="col-sm-3">
			<div class="info-aside">
				<div class="price-wrap">
					<span class="price h5"> NRS <?=$min=rand(10,200)?>0</span>	
					<del class="price-old"> NRS <?=rand($min,$min+50)?>0</del>
				</div> <!-- info-price-detail // -->
				<p class="text-success">Free shipping</p>
				<br>
				<p>
					<a href="" class="btn btn-primary btn-block"> Add to cart </a>
					<a href="" class="btn btn-light btn-block"><i class="fa fa-heart"></i><span class="text">Add to wishlist</span></a>
				</p>
			</div> <!-- info-aside.// -->
		</aside> <!-- col.// -->
	</div> <!-- row.// -->
</article> <!-- card-product .// -->
<?php endfor?>
<?php include_once('user_templates/pagenavigation.php')?>
<?php include_once('user_templates/footer_bottom.php')?>