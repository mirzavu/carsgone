@extends('layouts.main')

@section('title', 'Carsgone')

@section('content')

<!-- Banner start -->
	<div class="banner-container">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-12">
        			<h1>Free Auto Classifieds</h1>
            		<h2>Browse {{$count}} currently listed vehicles in Canada</h2>
                    <div class="advance-search-container">
                    	<ul class="advance-search">
                        	<li>
								<select id="make-select" name="make">
                                <option value="" disabled selected>Select Make</option>
								@foreach ($makes as $make)
                                    <option value="{{$make['id']}}">{{$make['make_name']}}</option>
                                @endforeach
                                </select>
                            </li>
                            <li>
                            	<select id="model-select" name="model" placeholder="Select Model">
                            		<option value="" disabled selected>Select Model</option>
                                </select>
                            
                                 
                            </li>
                            <li>
                            	<button id="quick_search" type="submit" class="waves-effect"><span>Quick Search</span></button>
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
                	<li><a href="/search/province-{{$province['province_name']}}">{{$province['province_name']}} ({{$province['vehicles_count']}})</a></li>
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
                	<li><a href="/search/make-{{$make['make_name']}}">{{$make['make_name']}} ({{$make['vehicles_count']}})</a></li>
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
                @foreach ($body_style_groups as $body_style_group)
                    <li><a href="/search/body-{{$body_style_group['body_style_group_name']}}">
                    	<span><img src="assets/images/icon-{{$body_style_group['body_style_group_name']}}.png" alt="" /></span>{{$body_style_group['body_style_group_name']}} ({{$body_style_group['vehicles_count']}})
                    	</a>
                    </li>
                @endforeach
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
                @foreach ($prices as $price)
                    <li><a href="#">{{$price->range}} ({{$price->count}})</a></li>
                @endforeach
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
