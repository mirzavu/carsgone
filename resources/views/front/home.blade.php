@extends('layouts.main')

@section('title', 'Carsgone')

@section('content')
<!-- Banner start -->
	<div class="banner-container">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-12">
        			<h1>Free Auto Classifieds</h1>
            		<h2>Cars, Trucks, Vans and SUVs</h2>
                    <div class="advance-search-container material">
                    	<ul class="advance-search">
                        	<li>
								<select name="mySelect" placeholder="Placeholder Text Here">
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                    <option value="4">Option 4</option>
                                </select>
                            </li>
                            <li>
                            	<select name="mySelect2" placeholder="Placeholder Text Here">
                                    <option value="1">Option 1</option>
                                    <option value="2">Option 2</option>
                                    <option value="3">Option 3</option>
                                    <option value="4">Option 4</option>
                                </select>
                            
                                 
                            </li>
                            <li>
                            	<button type="submit"><span>Search</span></button>
                            </li>
                        </ul>
                    </div>
               </div>
            </div>
        </div>
    </div>
<!-- Banner end -->
<!-- Tabs start -->
<div class="cd-hero">
    	<div class="cd-slider-nav">
        <div class="container">
			<nav>
				<span class="cd-marker item-1"></span>
				<ul>
					<li class="selected"><a href="#0"><span><i class="fa fa-map-marker" aria-hidden="true"></i></span>Location</a></li>
					<li><a href="#0"><span><i class="fa fa-tag" aria-hidden="true"></i></span>Make</a></li>
					<li><a href="#0"><span><i class="fa fa-car" aria-hidden="true"></i></span>Vehicle Style</a></li>
					<li><a href="#0"><span><i class="fa fa-usd" aria-hidden="true"></i></span>Price</a></li>
				</ul>
			</nav> 
            </div>
		</div> <!-- .cd-slider-nav -->
		<ul class="cd-hero-slider">
			<li class="selected">
            <div class="container">
              <div class="tab-content">
            	<h3>Browse 7825 currently listed vehicles in Canada</h3>
                <h4 class="mar-40">Select a Major Location from the List Below</h4>
                <h4>Provinces - New &amp; Used Vehicles For Sale</h4>
                <ul class="item-list">
                	@foreach ($provinces as $province)
                    	<li><a href="#">{{$province['province_name']}} ({{$province['vehicles_count']}})</a></li>
                    @endforeach
                 </ul>
               </div>
              </div>
            </li>
			<li>
               <div class="container">
                <div class="tab-content">
                <h3>Browse 7825 currently listed vehicles in Canada</h3>
                <h4>Select a Make below to narrow your vehicle search</h4>
                <ul class="item-list">
                    @foreach ($makes as $make)
                    	<li><a href="#">{{$make['make_name']}} ({{$make['vehicles_count']}})</a></li>
                    @endforeach
                </ul>
               </div>
              </div>
            </li>
            <li>
             <div class="container">
                <div class="tab-content">
            	<h3>Browse 7825 currently listed vehicles in Canada</h3>
                <h4 class="mar-40">Select a Vehicle Style below to narrow your search</h4>
                <ul class="item-list">
                    <li><a href="#"><span><img src="assets/images/icon-convertible.png" alt="" /></span>Convertible (1103)</a></li>
                    <li><a href="#"><span><img src="assets/images/icon-coupe.png" alt="" /></span>Coupe (2653)</a></li>
                    <li><a href="#"><span><img src="assets/images/icon-hatchback.png" alt="" /></span>Hatchback (5983)</a></li>
                    <li><a href="#"><span><img src="assets/images/icon-suv.png" alt="" /></span>SUV (23555)</a></li>
                    <li><a href="#"><span><img src="assets/images/icon-sedan.png" alt="" /></span>Sedan (20758)</a></li>
                    <li><a href="#"><span><img src="assets/images/icon-truck.png" alt="" /></span>Truck (10752)</a></li>
                    <li><a href="#"><span><img src="assets/images/icon-van.png" alt="" /></span>Van (4623)</a></li>
                    <li><a href="#"><span><img src="assets/images/icon-wagon.png" alt="" /></span>Wagon (1155)</a></li>
               </ul>
               </div>
              </div>
            </li>
            <li>
             <div class="container">
               <div class="tab-content">
            	<h3>Browse 7825 currently listed vehicles in Canada</h3>
                <h4 class="mar-40">Select a Price below to narrow your search</h4>
                <ul class="item-list">
                    <li><a href="#">$1000 - $2000 (462)</a></li>
                    <li><a href="#">$25000 - $30000 (8249)</a></li>
                    <li><a href="#">$65000 - $70000 (748)</a></li>
                    <li><a href="#">$2000 - $3000 (660)	</a></li>
                    <li><a href="#">$30000 - $35000 (5829)</a></li>
                    <li><a href="#">$70000 - $75000 (409)</a></li>
                    <li><a href="#">$3000 - $4000 (865)	</a></li>
                    <li><a href="#">$35000 - $40000 (4330)</a></li>
                    <li><a href="#">$75000 - $80000 (391)</a></li>
                    <li><a href="#">$4000 - $5000 (1020)</a></li>
                    <li><a href="#">$40000 - $45000 (2870)</a></li>
                    <li><a href="#">$80000 - $85000 (252)</a></li>
                 </ul>
               </div>
              </div>
            </li>
 		</ul> <!-- .cd-hero-slider -->

		
	</div> <!-- .cd-hero -->
 
    <!-- Tabs end -->
    <!-- Ad Container  start -->
    <div class="ad-container">
    	<div class="container">
          <div class="row">
        	<div class="col-sm-12">
    			<div class="ad-box"><a href="#"><img src="assets/images/ad.jpg" alt="" /></a></div>
        	</div>
          </div>
        </div>
    </div>
    <!-- Ad Container  end -->
    
    <!-- popular Container  start -->
    <div class="popular-container">
    	<div class="container">
          <div class="row">
          	 <div class="col-md-3 col-sm-6">
             	<h4>Popular New Cars</h4>
    			<ul class="popular-item-list">
                	<li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                </ul>
        	</div>
            
            <div class="col-md-3 col-sm-6">
             	<h4>Popular New Cars</h4>
    			<ul class="popular-item-list">
                	<li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                </ul>
        	</div>
            
            <div class="col-md-3 col-sm-6">
             	<h4>Popular New Cars</h4>
    			<ul class="popular-item-list">
                	<li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                </ul>
        	</div>
            
           <div class="col-md-3 col-sm-6">
             	<h4>Popular New Cars</h4>
    			<ul class="popular-item-list">
                	<li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                    <li>
                    	<a href="#">
                        	<h6>New Chevrolet Cruze</h6>
                            <span>1,633 listings starting at $1,000</span>
                        </a>
                    </li>
                </ul>
        	</div>
            
          </div>
        </div>
    </div>
    <!-- popular Container  end -->
   @endsection