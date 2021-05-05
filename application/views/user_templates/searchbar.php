<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y" v-if="productstatus">
<div class="container">
<div class="row">
<aside class="col-md-3">		
        <div class="card">
            <article class="filter-group">
                <header class="card-header">
                    <a href="" data-toggle="collapse" data-target="#collapse_1" aria-expanded="true" class="">
                        <i class="icon-control fa fa-chevron-down"></i> <h6 class="title">Product type</h6>
                    </a>
                </header>
                <div class="filter-content collapse show" id="collapse_1" >
                    <div class="card-body">
                        <form class="pb-3">
                          <div class="input-group">
                            <input type="text" class="form-control" v-model="categorysearch.text" @keyup="searchCategory" placeholder="Search All categories">
                              <div class="input-group-append">
                                <button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
                              </div>
                          </div>
                        </form>    
                        <?php		
                        $colorarray=array('green','blue','red','violet','yellow');
                        $sizearray=array('S','M','L','XL','XS');
                        $conditionarray=array('Any condition','Old','Brand new','Used');
                        ?> 
                        <label v-if="emptyCategoryResult" class="custom-control custom-checkbox">
                            No results found
                          </label> 
                        <ul class="list-menu" v-for="category in categories">                          
                            <li><a href="" v-html="category.category_name">  </a><b class="badge badge-pill badge-light float-right" v-html="randomNumber(1,200)"></b></li>                      
                        </ul>   
                    </div> <!-- card-body.// -->
                </div>
            </article> <!-- filter-group  .// -->
            <article class="filter-group">
                <header class="card-header">
                    <a data-toggle="collapse" data-target="#collapse_2" aria-expanded="true" class="">
                        <i class="icon-control fa fa-chevron-down"></i><h6 class="title">Brands </h6>
                    </a>
                </header>

                <div class="filter-content collapse show" id="collapse_2">
                    <div class="card-body">
                    <form class="pb-3">
                          <div class="input-group">
                            <input type="text" class="form-control" v-model="brandsearch.text" @keyup="searchBrand" placeholder="Search all Brands">
                              <div class="input-group-append">
                                <button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
                              </div>
                          </div>
                        </form>
                        <label v-if="emptyBrandResult" class="custom-control custom-checkbox">
                            No results found
                          </label> 
                          <label v-for="brand in brands" class="custom-control custom-checkbox">
                            <input type="checkbox"  class="custom-control-input">
                            <div class="custom-control-label"> 
                            <span v-html="brand.brand_name"></span>
                                <b class="badge badge-pill badge-light float-right" v-html="randomNumber(1,100)"></b>  </div>
                          </label>                       
                                            
                      </div> <!-- card-body.// -->
                </div>
            </article> <!-- filter-group .// -->
            <article class="filter-group">
                <header class="card-header">
                    <a  data-toggle="collapse" data-target="#collapse_3" aria-expanded="true">
                        <i class="icon-control fa fa-chevron-down"></i><h6 class="title">Price range </h6>
                    </a>
                </header>
                <div class="filter-content collapse show" id="collapse_3" >
                    <div class="card-body">
                        <input type="range" @change="pricerange($event)"class="custom-range" min="0" :value="currentvalue" max="10000" name="">
                        <div class="form-row">
                          <div class="form-group col-md-6">
                            <label>Min</label>
                            <input class="form-control" placeholder="NRS 1" @change="pricerange($event)" :value="minvalue" min="0" max="10000" type="number">
                          </div>
                          <div class="form-group text-right col-md-6">
                            <label>Max</label>
                            <input class="form-control" placeholder="10000"  @change="pricerange($event)" min="0" :value="maxvalue" max="10000" type="number">
                          </div>
                        </div> <!-- form-row.// -->
                        <button class="btn btn-block btn-primary">Apply</button>
                    </div><!-- card-body.// -->
                </div>
            </article> <!-- filter-group .// -->
            <article class="filter-group">
                <header class="card-header">
                    <a data-toggle="collapse" data-target="#collapse_4" aria-expanded="true" >
                        <i class="icon-control fa fa-chevron-down"></i><h6 class="title">Sizes </h6>
                    </a>
                </header>
                <div class="filter-content collapse show" id="collapse_4" >
                    <div class="card-body">                    
                      <?php for($i=0;$i<count($sizearray);$i++):?>
                        <label class="checkbox-btn">
                          <input type="checkbox" value="<?=$sizearray[$i]?>">
                          <span class="btn btn-light"><?=$sizearray[$i]?></span>
                        </label>
                      <?php endfor ?>                     
                    </div><!-- card-body.// -->
                </div>
            </article> <!-- filter-group .// -->
            <article class="filter-group">
                <header class="card-header">
                    <a  data-toggle="collapse" data-target="#collapse_5" aria-expanded="false">
                        <i class="icon-control fa fa-chevron-down"></i><h6 class="title">More filter </h6>
                    </a>
                </header>
                <div class="filter-content collapse in" id="collapse_5">
                    <div class="card-body">
                      <?php for($i=0;$i<count($conditionarray);$i++):?>
                        <label class="custom-control custom-radio">
                            <input type="radio" value="<?=$conditionarray[$i]?>"name="myfilter_radio" class="custom-control-input">
                            <div class="custom-control-label"><?=$conditionarray[$i]?></div>
                          </label>                    
                        <?php endfor ?> 
                    </div><!-- card-body.// -->
                </div>
            </article> <!-- filter-group .// -->
        </div> <!-- card.// -->        
  </aside> <!-- col.// -->