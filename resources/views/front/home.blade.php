@extends('layouts.main')

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
                                <i id="quick_search" class="waves-effect waves-light btn waves-input-wrapper" style="">
                                    <input type="submit" class="waves-button-input" value="Quick Search">
                                </i>
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
                <ul class="popular-item-list bordered four-col">
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
                <ul class="popular-item-list bordered four-col">
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
                <ul class="popular-item-list bordered four-col">
                @foreach ($body_style_groups as $body_style_group)
                    <li><a href="/search/body-{{$body_style_group['body_style_group_name']}}">
                    	<span><img src="assets/images/icon-{{strtolower($body_style_group['body_style_group_name'])}}.png" alt="" /></span>{{$body_style_group['body_style_group_name']}} ({{$body_style_group['vehicles_count']}})
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
            	{{-- <h3>Browse 7825 currently listed vehicles in Canada</h3>
                <h4 class="mar-40">Select a Price below to narrow your search</h4> --}}
                <ul class="popular-item-list bordered four-col">
                @foreach ($prices as $price)
                    <li><a href="/search/price-{{$price->range}}">{{$price->formatrange}} ({{$price->count}})</a></li>
                @endforeach
                 </ul>
               </div>
              </div>
            </li>
 		</ul> <!-- .cd-hero-slider -->

		
	</div> <!-- .cd-hero -->
 
    <!-- Tabs end -->
    <!-- approval start -->
    <div class="approval-outer">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="approval">
                        <!-- <img src="assets/images/approval-image.png" alt=""> -->
                        <h3>100% credit acceptance</h3>
                        <h4>Pre Approved if you:</h4>
                        <ul class="reqiured-list">
                            <li>LIVE IN CANADA</li>
                            <li>ARE 18 OR OLDER</li>
                            <li>EARN MIN $1500 /MO</li>
                        </ul>
                        <div class="approval-link">
                            <a href="/credit-application" class="waves-effect waves-light btn btn-orange">Get Approved Now</a>
                            <p class="clock">Easy 60-Second Application</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- approval end -->

    <!-- popular Container  start -->
    <div class="popular-container">
    	<div class="container">
          <div class="row">
          	 <div class="col-md-3 col-sm-6">
             	<h4>Popular New Cars</h4>
    			<ul class="popular-item-list">
                	<li>
                    	<a href="/search/condition-new/make-Ford/model-Escape">
                        	<h6>New Ford Escape</h6>
                            {{-- <span>1,633 listings starting at $1,000</span> --}}
                        </a>
                    </li>
                    <li>
                    	<a href="/search/condition-new/make-Ford/model-Explorer">
                        	<h6>New Ford Explorer</h6>
                        </a>
                    </li>
                    <li>
                    	<a href="/search/condition-new/make-Ford/model-Edge">
                        	<h6>New Ford Edge</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/condition-new/make-Chevrolet/model-Corvette">
                        	<h6>New Chevrolet Corvette</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/condition-new/make-Chevrolet/model-Cruze">
                        	<h6>New Chevrolet Cruze</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/condition-new/make-Chevrolet/model-Equinox">
                        	<h6>New Chevrolet Equinox</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/condition-new/make-Kia/model-Sorento">
                        	<h6>New Kia Sorento</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/condition-new/make-Hyundai/model-Elantra">
                        	<h6>New Hyundai Elantra</h6>
                            
                        </a>
                    </li>
                </ul>
        	</div>
            
            <div class="col-md-3 col-sm-6">
             	<h4>Popular Sedans</h4>
    			<ul class="popular-item-list">
                	<li>
                    	<a href="/search/body-Sedan/make-Chevrolet/model-Malibu">
                        	<h6>Used Chevrolet Malibu</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-Sedan/make-Chevrolet/model-Impala">
                        	<h6>Used Chevrolet Impala</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-Sedan/make-Ford/model-Fusion">
                        	<h6>Used Ford Fusion</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-Sedan/make-Hyundai/model-Sonata">
                        	<h6>Used Hyundai Sonata</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-Sedan/make-Nissan/model-Sentra">
                        	<h6>Used Nissan Sentra</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-Sedan/make-Nissan/model-Altima">
                        	<h6>Used Nissan Altima</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-Sedan/make-Chrysler/model-200">
                        	<h6>Used Chrysler 200</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-Sedan/make-Toyota/model-Corolla">
                        	<h6>Used Toyota Corolla</h6>
                            
                        </a>
                    </li>
                </ul>
        	</div>
            
            <div class="col-md-3 col-sm-6">
             	<h4>Popular SUVs</h4>
    			<ul class="popular-item-list">
                	<li>
                    	<a href="/search/body-SUV/make-Ford/model-Escape">
                        	<h6>Used Ford Escape</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-SUV/make-Ford/model-Edge">
                        	<h6>Used Ford Edge</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-SUV/make-Jeep/model-Grand%20Cherokee">
                        	<h6>Jeep Grand Cherokee</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-SUV/make-Jeep/model-Patriot">
                        	<h6>Used Jeep Patriot</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-SUV/make-Dodge/model-Journey">
                        	<h6>Used Dodge Journey</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-SUV/make-Dodge/model-Durango">
                        	<h6>Used Dodge Durango</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-SUV/make-GMC/model-Terrain">
                        	<h6>Used GMC Terrain</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-SUV/make-Kia/model-Sorento">
                        	<h6>Used Kia Sorento</h6>
                            
                        </a>
                    </li>
                </ul>
        	</div>
            
           <div class="col-md-3 col-sm-6">
             	<h4>Popular Hatchback</h4>
    			<ul class="popular-item-list">
                	<li>
                    	<a href="/search/body-Hatchback/make-Mazda/model-Mazda3">
                        	<h6>Used Mazda Mazda3</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-Hatchback/make-Volkswagen/model-Golf">
                        	<h6>Used Volkswagen Golf</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-Hatchback/make-Hyundai/model-VELOSTER">
                        	<h6>Used Hyundai VELOSTER</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-Hatchback/make-Ford/model-Focus">
                        	<h6>Used Ford Focus</h6>
                            
                        </a>
                    </li>
                </ul>
                <h4>Popular Coupe</h4>
                <ul class="popular-item-list">
                    <li>
                    	<a href="/search/body-Coupe/make-BMW/model-M6">
                        	<h6>Used BMW M6</h6>
                            
                        </a>
                    </li>
                    <li>
                        <a href="/search/body-Coupe/make-Mercedes-Benz/model-C-Class">
                            <h6>Mercedes-Benz C-Class</h6>
                            
                        </a>
                    </li>
                    <li>
                    	<a href="/search/body-Coupe/make-Audi/model-S5">
                        	<h6>Used Audi S5</h6>
                            
                        </a>
                    </li>
                    
                </ul>
        	</div>
            
          </div>
        </div>
    </div>
    <!-- popular Container  end -->

@endsection
