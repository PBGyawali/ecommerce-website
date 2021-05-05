<main class="col-md-9" >
<header class="border-bottom mb-4 pb-3">
		<div class="form-inline"v-if="placeordersts">
			<span>Items found: </span>
			<span class="mr-md-auto" v-html="products.length"></span>  
			
			<select class="mr-2 form-control" @change="changeresultno($event)" >
				<option>Show results</option>
				<option value="10" >10</option>
				<option  value="20">20</option>
				<option value="50">50</option>
			</select>
			<select class="mr-2 form-control" @change="changesearchtype($event)" >
				<option>Search By</option>
				<option value="product_date/DESC">Latest items</option>
				<option value="">Trending</option>
				<option value="">Most Popular</option>
				<option value="product_base_price ">Cheapest</option>
			</select>
			<div class="btn-group">
				<a  class="btn btn-outline-secondary" @click="changeView('list')" :class="{ 'active': listview }" data-toggle="tooltip" title="" data-original-title="List view"> 
					<i class="fa fa-bars"></i></a>
				<a  class="btn  btn-outline-secondary" @click="changeView('grid')" :class="{ 'active': gridview }"  data-toggle="tooltip" title="" data-original-title="Grid view"> 
					<i class="fa fa-th"></i></a>
			</div>
		</div>
</header><!-- sect-heading -->
