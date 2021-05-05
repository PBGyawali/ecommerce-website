
<section class="header-main border-bottom b">
	<div class="container">
<div class="row align-items-center">
	<div class="col-lg-2 col-4">
		<a href="" class="brand-wrap">		
			<img class="logo d-inline" src="<?=LOGO_URL?>logo.png"><h5 class=" d-inline"><?=ucwords(SITE_NAME)?></h5>
		</a> <!-- brand-wrap.// -->
	</div>
	<div class="col-lg-6 col-sm-12">
		<form action="" class="search">
			<div class="input-group w-100">
			    <input type="text" class="form-control" placeholder="Search"  v-model="search.text" @keyup="searchProduct">
			    <div class="input-group-append">
			      <button class="btn btn-primary" type="submit">
			        <i class="fa fa-search"></i>
			      </button>
			    </div>
		    </div>
		</form> <!-- search-wrap .end// -->
    </div> <!-- col.// -->
    
    <div class="col-lg-4 col-sm-6 col-12">
		<div class="widgets-wrap float-md-right">
		<div class="widget-header  mr-3">
				<button href="" @click='WishlistDetails(1);' class="icon icon-sm rounded-circle border"><i class="fa fa-heart"></i></button>
				<span :class="{'badge badge-pill badge-danger notify': wishitem_count>0 }"  v-if="wishitem_count>0" v-html="wishitem_count"></span>
			</div>
			<div class="widget-header  mr-3">			
				<button href="" @click='cartDetails(1);' class="icon icon-sm rounded-circle border"><i class="fa fa-shopping-cart"></i></button>
				<span :class="{'badge badge-pill badge-danger notify': item_count>0 }" v-if="item_count>0" v-html="item_count"></span>
			</div>
			<div class="widget-header icontext">
				<a href="" class="icon icon-sm rounded-circle border"><i class="fa fa-user"></i></a>
				<div class="text">
					<span class="text-muted">Welcome!</span>
					
					<div>
					<?php if(isset($username))
						echo $Username.' | <a href="'.BASE_URL.'home/logout"> Logout</a>';
					else 
						echo '<a href="'.BASE_URL.'home/">Sign in</a> |	<a href="'.BASE_URL.'home/"> Register</a>';
					?>
					</div>
					<div> 
						
					</div>
				</div>
			</div>

		</div> <!-- widgets-wrap.// -->
	</div> <!-- col.// -->
</div> <!-- row.// -->
	</div> <!-- container.// -->
</section> <!-- header-main .// -->
</header> <!-- section-header.// -->