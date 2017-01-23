@extends('layouts.main')

@section('content')
<!-- main container outer start -->
<div class="main-container-outer">
	<!-- Car Details Container Start -->
    <div class="car-details-container">
        <div class="container">
    	  <div class="row">
          
        	<div class="col-md-6 col-md-offset-0 col-sm-10 col-sm-offset-1 half-left">
          		<div class="item-gallery-container ">
                	<div class="item-large">
                    	<div class="large-item-head">
                        	<h3>{{$vehicle->year}} {{$vehicle->make->make_name}}, {{$vehicle->model->model_name}}</h3>
                        </div>
                        <div class="large-item-body">
                        	<a href="{{$vehicle->photo()}}" title="A short description of project"><img src="{{$vehicle->photo()}}" alt="" /></a>
                          
                        </div>
                   </div>
                    <div class="item-images">
                    	<ul class="item-image-list">
                        @foreach ($vehicle->photos as $photo)
                        	<li><a href="{{$photo->path}}" title="Can use keyboard arrows to navigate photos"><img src="{{$photo->path}}" alt="" /></a></li>
                        @endforeach
                        </ul>
                    </div>
                </div>
                <div class="vehicle-info-small clearfix">
                    <div class="pull-left">${{$vehicle->price}}</div>
                    <div class="pull-right">{{$vehicle->odometer}} Km</div>
                </div>
       	    </div>
            
            <div class="col-md-6 col-md-offset-0 col-sm-10 col-sm-offset-1 half-right">
         <!-- Tabs start -->
      <div class="single-desc">
    	<div class="cd-slider-nav">
        
			<nav>
			   <span class="cd-marker item-1"></span>
				<ul>
					<li class="selected"><a href="#0">Contact</a></li>
					<li><a href="#0">Description</a></li>
					<li><a href="#0">Finance</a></li>
					<li><a href="#0">Dealer</a></li>
				</ul>
			</nav>  
		</div> <!-- .cd-slider-nav -->
		<ul class="cd-hero-slider">
			<li class="selected">
            	<div class="contact-dealer-container">
                    @if(!empty($vehicle->user->phone))
                	<div class="dealer-number"><a href="tel:{{preg_replace("/[^0-9]/", "", $vehicle->user->phone)}}" class="btn waves-effect waves-light "><i class="fa fa-phone"></i> {{$vehicle->user->phone}}</a></div>
                    @endif
                    <h4>Contact Dealer</h4>
                    {!! Form::open(['url' => '/contact-dealer', 'method' => 'POST', 'id' => 'contact-form']) !!}
                    <div class="form-group">
                    	<input name="name" type="text" class="form-control" placeholder="Name" required/>
                    </div>
                     <div class="form-group">
                    	<input name="email" type="email" class="form-control" placeholder="Email" required />
                    </div>
                     <div class="form-group">
                    	<textarea name="message" class="form-control" placeholder="Message" required></textarea>
                    </div>
                    <div class="form-group">
                        <button id="dealer-submit" class="btn waves-effect waves-light btn-block" type="submit">Submit</button>
                     </div>
                     {!! Form::close() !!}
                     
                </div>
             
            </li>
			<li>
            	<div class="single-description-container">
                	<div class="single-description-upper">
                    	<table class="table table-striped">
                        	<tr>
                                <td><b>Year</b></td>
                                <td>{{$vehicle->year}}</td>
                             </tr>
                             <tr>
                                <td><b>Make</b></td>
                                <td>{{$vehicle->make->make_name}}</td>
                             </tr>
                             <tr>
                                <td><b>Model</b></td>
                                <td>{{$vehicle->model->model_name}}</td>
                             </tr>
                             @if(!empty($vehicle->price))
                             <tr>
                                <td><b>Price</b></td>
                                <td>{{$vehicle->price}}</td>
                             </tr>
                             @endif
                             @if(!empty($vehicle->odometer))
                             <tr>
                                <td><b>Mileage</b></td>
                                <td>{{$vehicle->odometer}} Km</td>
                             </tr>
                             @endif
                             @if(!empty($vehicle->trim))
                             <tr>
                                <td><b>Trim</b></td>
                                <td>{{$vehicle->trim or 'Not specified'}}</td>
                             </tr>
                             @endif
                             @if(!empty($vehicle->bodyStyleGroup))
                             <tr>
                                <td><b>Body Style</b></td>
                                <td>{{$vehicle->bodyStyleGroup->body_style_group_name}}</td>
                             </tr>
                             @endif
                             @if(!empty($vehicle->stock))
                             <tr>
                                <td><b>Stock</b></td>
                                <td>{{$vehicle->stock}}</td>
                             </tr>
                             @endif
                             @if(!empty($vehicle->doors))
                             <tr>
                                <td><b>Doors</b></td>
                                <td>{{$vehicle->doors}}</td>
                             </tr>
                             @endif
                             @if(!empty($vehicle->transmission))
                             <tr>
                                <td><b>Transmission</b></td>
                                <td>{{$vehicle->transmission}}</td>
                             </tr>
                             @endif
                             @if(!empty($vehicle->ext_color_id))
                             <tr>
                                <td><b>Exterior Color</b></td>
                                <td>{{$vehicle->ext_color->color}}</td>
                             </tr>
                             @endif
                             @if(!empty($vehicle->int_color_id))
                             <tr>
                                <td><b>Interior Color</b></td>
                                <td>{{$vehicle->int_color->color}}</td>
                             </tr>
                             @endif
                             @if(!empty($vehicle->passenger))
                             <tr>
                                <td><b>Passengers</b></td>
                                <td>{{$vehicle->passenger}}</td>
                             </tr>
                             @endif
                             <tr>
                                <td colspan="2"><b>{!!$vehicle->text!!}</b></td>
                             </tr>
                        </table>
                    </div>
                </div>
            </li>
            <li>
            	<div class="contact-dealer-container">
                    <h4>Finance</h4>
                    <div class="form-group">
                    	<input type="text" class="form-control" placeholder="Name" />
                    </div>
                     <div class="form-group">
                    	<input type="text" class="form-control" placeholder="Email" />
                    </div>
                     <div class="form-group">
                    	<textarea class="form-control" placeholder="Message"></textarea>
                    </div>
                    <div class="form-group">
                    	<input type="submit" value="Submit" class="btn waves-effect waves-light btn-block" />
                     </div>
                </div>
            </li>
            <li>
            	<div class="single-dealer-container">
                	<div class="single-dealer-upper">
                    	<div class="dealer-buttons">
                            <a href="/dealer/{{$vehicle->user->slug}}" class="btn waves-effect waves-light">View Dealer</a>
                            <a id="inventory-btn" class="btn waves-effect waves-light ">View Inventory</a>
                        </div>
                    </div>
                    <div class="single-dealer-mid">
                     <ul class="table-list">
                        <li><a href="/dealer/{{$vehicle->user->slug}}">{{$vehicle->user->name}}</a></li>
                        <li>{{$vehicle->user->address}}</li>
                        <li>{{$vehicle->user->phone}}</li>
                        <li>{{$vehicle->user->fax}}</li>
                        <li><a href="{{$vehicle->user->url}}" target="_blank">{{$vehicle->user->url}}</a></li>
                      </ul>
                    </div>
                    <div class="single-dealer-lower">
                    	<div class="dealer-address-map">
                        	 <div id='gmap_canvas' style='height:100%;width:100%;'></div>
                        </div>
                    </div>
                </div>
            </li>
 		</ul> <!-- .cd-hero-slider -->

		
	</div> <!-- .cd-hero -->
 
    <!-- Tabs end -->
       	    </div>
            
         </div>
       </div>
    </div> 
    <!-- Car Details Container End -->

     <!-- Related Links -->
    <div class="related-item-container">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
                 <!-- Featured Container start -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title">Related Links</h3>
                        </div>
                        <div>
                            <ul class="related-link-list">
                                <li><a href="/search/province-{{$vehicle->user->province->province_name}}/city-{{$vehicle->user->city->city_name}}/make-{{$vehicle->make->make_name}}/model-{{$vehicle->model->model_name}}">{{$vehicle->user->city->city_name}} {{$vehicle->make->make_name}} {{$vehicle->model->model_name}}</a></li>
                                <li><a href="/search/province-{{$vehicle->user->province->province_name}}/city-{{$vehicle->user->city->city_name}}/make-{{$vehicle->make->make_name}}">{{$vehicle->user->city->city_name}} {{$vehicle->make->make_name}}</a></li>
                                <li><a href="/search/condition-used/province-{{$vehicle->user->province->province_name}}/city-{{$vehicle->user->city->city_name}}">Used Cars {{$vehicle->user->city->city_name}}</a></li>
                                <li><a href="/auto-dealers/province-{{$vehicle->user->province->province_name}}/city-{{$vehicle->user->city->city_name}}">Car Dealers {{$vehicle->user->city->city_name}}</a></li>
                            </ul>
                        </div>
                      </div>
                      

                  <!-- Featured Container end -->
            </div>
         </div>
       </div>
    </div> 
     <!-- Related Links End-->
    
    <!-- Related Item Container Start -->
    <div class="related-item-container">
        <div class="container">
    	  <div class="row">
        	<div class="col-sm-12">
          		 <!-- Featured Container start -->
                	<div class="panel panel-default">
                        <div class="panel-heading">
                          <h3 class="panel-title">{{ $other_vehicle_text }}</h3>
                        </div>
                        <div id="related-vehicles" class="panel-body">
                            <div class="progress">
                                <div class="indeterminate"></div>
                            </div>
                        </div>
                      </div>
                      

                  <!-- Featured Container end -->
       	    </div>
         </div>
       </div>
    </div> 
    <!-- Related Item Container End -->
    
</div>
<!-- main container outer end -->

</div>

</div>

@endsection

@section('javascript')

<script type="text/javascript">


    var form = $("#contact-form");
            form.validate({
                rules: {},
                // errorClass: "invalid form-error",       
                // errorElement : 'div',       
                errorPlacement: function(error, element) {
                    if (element.is('select')) {
                        error.appendTo(element.parent().parent());
                    } else {
                        error.appendTo(element.parent());
                    }

                },
                focusInvalid: false,
                invalidHandler: function(form, validator) {

                    if (!validator.numberOfInvalids())
                        return;
                    $('html, body').animate({
                        scrollTop: $(validator.errorList[0].element).parent().offset().top - 20
                    }, 500);
                    $(validator.errorList[0].element).focus()

                },
                submitHandler: function(form) {
                  $('#dealer-submit').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:1.3rem" aria-hidden="true"></i>  PROCESSING');
                    $.ajax({
                             url: form.action,
                             type: form.method,
                             data: $(form).serialize()+'&_token={{ csrf_token() }}'+'&dealer_email={{ $vehicle->user->email }}',
                             success: function(response) {
                                 if(response.status == "success")
                                 {
                                    toastr.success(response.message)
                                    $('#dealer-submit').prop('disabled', false).html('Submit')
                                    $("#contact-form").get(0).reset();
                                 }
                             }
                         });
                }
            })


$('img').one('error', function() { this.src = '/assets/images/placeholder.jpg'; });

  $('#inventory-btn').on('click',function(e){
      e.preventDefault();
      $.get( "/removeSessionAll", function(){
          $.get( "/setSessionKeyValue/dealer/{{$vehicle->user->name}}",function(){
            window.location = '/search';
          });
      });
  });
</script>
<script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng({{$vehicle->user->latitude}},{{$vehicle->user->longitude}}),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng({{$vehicle->user->latitude}},{{$vehicle->user->longitude}})});infowindow = new google.maps.InfoWindow({content:'<strong>{{$vehicle->user->name}}</strong><br>{{$vehicle->user->address}}<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
<script src="https://unpkg.com/react@latest/dist/react.min.js"></script>
<script src="https://unpkg.com/react-dom@latest/dist/react-dom.min.js"></script>
<script src="https://unpkg.com/react-slick@0.13.6/dist/react-slick.min.js"></script>
<script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>
<script type="text/babel" src="/assets/js/related.js"></script>
@endsection