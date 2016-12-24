@extends('layouts.main')

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
                                            <div class="price"><i class="fa fa-tag"></i> ${{$vehicle->price}}</div>
                                            <div class="run"><i class="fa fa-dashboard"></i> {{$vehicle->odometer}}KM</div>
                                        </div>
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="pad-10"><a id="inventory-btn" href="/search" class="waves-effect waves-light btn btn-block">View Inventory</a></div>
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
              @foreach($makes as $make)
              <li><a class="dealer-tag" href="/search/make-{{$make->make_name}}">
                <h6>{{$make->make_name}} ({{$make->make_count}})</h6>
                </a></li>
              @endforeach
            </ul>
          </div>
        </li>
        <li>
          <div class="tab-content">
            <ul class="popular-item-list bordered four-col">
              @foreach($body as $style)
              <li><a class="dealer-tag" href="/search/body-{{$style->body_style_group_name}}">
                <h6>{{$style->body_style_group_name}} ({{$style->body_count}})</h6>
                </a></li>
              @endforeach
            </ul>
          </div>
        </li>
        <li>
          <div class="tab-content">
            <ul class="popular-item-list bordered four-col">
              @foreach($prices as $price)
              <li><a class="dealer-tag-price" range="{{$price->range}}" href="/search">
                <h6>{{$price->range}} ({{$price->count}})</h6>
                </a></li>
              @endforeach
            </ul>
          </div>
        </li>
        <li>
          <div class="tab-content">
            <ul class="popular-item-list bordered four-col">
              @foreach($years as $year)
              <li><a class="dealer-tag-year" year="{{$year->year}}" href="/search">
                <h6>{{$year->year}} ({{$year->year_count}})</h6>
                </a></li>
              @endforeach
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
<script type="text/javascript">
  $('#inventory-btn').on('click',function(e){
      e.preventDefault();
      $.get( "/removeSessionAll", function(){
          $.get( "/setSessionKeyValue/dealer/{{$dealer->name}}",function(){
            window.location = '/search';
          });
      });
  });
  $('.dealer-tag').on('click',function(e){
      e.preventDefault();
      $.get( "/setSessionKeyValue/dealer/{{$dealer->name}}");
      window.location = $(this).attr('href')
  });
  $('.dealer-tag-price').on('click',function(e){
      e.preventDefault();
      $.get( "/setSessionKeyValue/price/"+$(this).attr('range'));
      $.get( "/setSessionKeyValue/dealer/{{$dealer->name}}");
      window.location = "/search";
  });
  $('.dealer-tag-year').on('click',function(e){
      e.preventDefault();
      $.get( "/setSessionKeyValue/year/"+$(this).attr('year')+'-'+$(this).attr('year'));
      $.get( "/setSessionKeyValue/dealer/{{$dealer->name}}");
      window.location = "/search";
  });

</script>
@endsection