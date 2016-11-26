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
            	<h3>Browse 7825 currently listed vehicles in Canada</h3>
                <h4 class="mar-40">Select a Major Location from the List Below</h4>
                <h4>Provinces - New &amp; Used Vehicles For Sale</h4>
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
                <h3>Browse 7825 currently listed vehicles in Canada</h3>
                <h4>Select a Make below to narrow your vehicle search</h4>
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
            	<h3>Browse 7825 currently listed vehicles in Canada</h3>
                <h4 class="mar-40">Select a Vehicle Style below to narrow your search</h4>
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
            	<h3>Browse 7825 currently listed vehicles in Canada</h3>
                <h4 class="mar-40">Select a Price below to narrow your search</h4>
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
                        <img src="assets/images/approval-image.png" alt="">
                        <h4>if you meet these 3 requirements, you're approved:</h4>
                        <ul class="reqiured-list">
                            <li>Canadian citizen</li>
                            <li>At least 18 years old</li>
                            <li>Currently Employed</li>
                        </ul>
                        <div class="approval-link">
                            <a href="#" class="waves-effect waves-light btn btn-orange">Get Approved Now</a>
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
