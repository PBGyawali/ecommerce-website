<?php include_once('user_templates/header.php')?>
<?php include_once('user_templates/navbar_top.php')?>
<?php include_once('user_templates/navbar.php')?>
<?php include_once('user_templates/navbar_bottom.php')?>
<!-- ========================= SECTION BANNER ========================= -->
<?php include_once('user_templates/banner.php')?>
<!-- ========================= SECTION BANNER END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name padding-y-sm">
<div class="container">
<header class="section-heading">
	<a href="" class="btn btn-outline-primary float-right">See all</a>
	<h3 class="section-title">Popular products</h3>
</header><!-- sect-heading -->	
<div class="row">
	<?php for($i=1;$i<=8;$i++):?>
	<div class="col-md-3">
		<div href="#" class="card card-product-grid">
			<a href="" class="img-wrap"> <img src="<?=PRODUCTS_IMAGES_URL?><?=$i?>.jpg"> </a>
			<figcaption class="info-wrap">
				<a href="" class="title">Just another product name</a>
				<div class="price mt-1">NRS <?=rand(0,300)?>0</div> <!-- price-wrap.// -->
			</figcaption>
		</div>
	</div> <!-- col.// -->
	<?php endfor?>
</div> <!-- row.// -->
</div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->
<!-- ========================= SECTION  ========================= -->
<?php include_once('user_templates/footer_top.php')?>
<!-- ========================= SECTION  END// ======================= -->
<!-- ========================= FOOTER ========================= -->
<?php include_once('user_templates/footer.php')?>
<?php include_once('user_templates/footer_bottom.php')?>