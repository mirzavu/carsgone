@extends('layouts.main')
@section('title', 'Dealer Listing')
@section('content')

<div class="dealer-page-outer">
<div class="container">
  <div class="wrapper">
  	<!-- dealer infromation start -->
    <div class="dealer-info">
    	<div class="panel full">
            <div class="panel-heading">
            	<h2>{{$dealer->name}}</h2>
            </div>
            <div class="panel-body">
                <div class="display-flex-outer">
                	<div class="display-flex left">
                    <div>
                    	<div class="pad-10"><h6 class="waves-effect waves-light btn btn-block btn-orange-border">Recent Listings</h6></div>
                    	<ul class="dealer-info-list">
                          @foreach ($recent as $vehicle)
                        	<li>
                                <div class="fetured-box">
                                    <a href="/vehicle/{{$vehicle->slug}}" tabindex="0">
                                        <h4>{{$vehicle->make->make_name.' '.$vehicle->model->model_name}}</h4>
                                        <div class="featured-img">
                                            <img src="{{$vehicle->photo()}}" alt="">
                                            <span class="overlay"></span>
                                        </div>
                                        <div class="featured-details">
                                            <div class="price"><i class="fa fa-tag"></i> ${{number_format($vehicle->price)}}</div>
                                            <div class="run"><i class="fa fa-dashboard"></i> {{number_format($vehicle->odometer)}}KM</div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="pad-10"><a href="#" class="waves-effect waves-light btn btn-block">View Inventory</a></div>
                    </div>
                    </div>
                    <div class="display-flex right">
                    	<div class="dealer-information">
                        <div>
                            <div class="pad-20"><h6 class="waves-effect waves-light btn btn-block btn-orange-border">Dealer INFORMATION</h6></div>
                            <div class="single-dealer-mid">
                             <ul class="table-list">
                                <li>{{$dealer->name}}</li>
                                <li>{{$dealer->address}}</li>
                                <li>{{$dealer->email}}</li>
                                <li>{{$dealer->phone}}</li>
                                <li><a href="{{$dealer->url}}">{{$dealer->url}}</a></li>
                                <li></li>
                              </ul>
                            </div>
                            <div class="single-dealer-lower">
                                <div class="dealer-address-map">
                                     <div id='gmap_canvas' style='height:100%;width:100%;'></div>
                                      <script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng({{$dealer->latitude}},{{$dealer->longitude}}),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng({{$dealer->latitude}},{{$dealer->longitude}})});infowindow = new google.maps.InfoWindow({content:'<strong>Park Avenue Honda Brossard</strong><br>8905, boul. Taschereau, J4Y 1A4, Brossard, Quebec<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- dealer infromation start -->
    <!-- dealer feature start -->
    <div class="dealer-feature">
      <div class="cd-hero">
        <div class="cd-slider-nav">
          <nav> <span class="cd-marker item-1"></span>
            <ul>
              <li class="selected"><a href="#0">Make</a></li>
              <li class=""><a href="#0">Style</a></li>
              <li class=""><a href="#0">Price</a></li>
              <li class=""><a href="#0">Year</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- .cd-slider-nav -->
      <ul class="cd-hero-slider">
        <li class="selected from-left">
          <div class="tab-content">
            <ul class="popular-item-list bordered four-col">
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
            </ul>
          </div>
        </li>
        <li>
          <div class="tab-content">
            <ul class="popular-item-list bordered four-col">
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
            </ul>
          </div>
        </li>
        <li>
          <div class="tab-content">
            <ul class="popular-item-list bordered four-col">
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
            </ul>
          </div>
        </li>
        <li>
          <div class="tab-content">
            <ul class="popular-item-list bordered four-col">
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
              <li><a href="#">
                <h6>New Chevrolet Cruze</h6>
                </a></li>
            </ul>
          </div>
        </li>
        
      </ul>
      <!-- .cd-hero-slider --> 
    </div>
    <!-- dealer feature end --> 
  </div>
</div>
</div>
@endsection
@section('javascript')

@endsection