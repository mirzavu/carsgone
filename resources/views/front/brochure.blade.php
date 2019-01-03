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
                        <h1>{{$vehicle->year}} {{$vehicle->make->make_name}}, {{$vehicle->model->model_name}} {{$vehicle->trim}}</h1>
                     </div>
                     <div class="large-item-body">
                        <a class="{{$vehicle->add_overlay}}-big" href="{{$vehicle->photo()}}" title="{{$vehicle->make->make_name}} {{$vehicle->model->model_name}}"><img src="{{$vehicle->photo()}}" alt="{{$vehicle->make->make_name}} {{$vehicle->model->model_name}}" /></a>
                     </div>
                  </div>
                  <div class="item-images">
                     <ul class="item-image-list">
                        @foreach ($vehicle->photos as $photo)
                        <li><a class="{{$vehicle->add_overlay}}" href="{{$photo->path}}" title="Can use keyboard arrows to navigate photos"><img src="{{$photo->path}}" alt="{{$vehicle->make->make_name}} {{$vehicle->model->model_name}}" /></a></li>
                        @endforeach
                     </ul>
                  </div>
               </div>
               <!-- <div class="vehicle-info-small clearfix">
                  <div>
                     <div class="info-item">{{$vehicle->price}}</div>
                     <div class="info-item">{{$vehicle->odometer}} Km</div>
                  </div>
                  <div class="addthis_inline_share_toolbox pull-right"></div>
               </div> -->
			   <div class="vehicle-info-small clearfix">
               @if($vehicle->price != 'call')
                  <div class="vehicle-info-leftD">
					  <!-- <div class="col-md-12 col-xs-12 firstRow paddZ">
						  <div class="col-md-12 col-xs-12 topLeft paddZ">
							 <i class="fa fa-dollar"></i>
						  </div>
						  <div class="col-md-12 col-xs-12 topRight paddZ">
							 <div class="col-md-12 col-xs-12 paddZ">
								<div class="pull-left leftTitle">Was</div>
								<div class="pull-right rightValue">{{$vehicle->mrp}}</div>
							 </div>
							 <div class="col-md-12 col-xs-12 paddZ">
								<div class="pull-left leftTitle">Total Discounts</div>
								<div class="pull-right rightValue">{{$discount}}</div>
							 </div>
						  </div>
					  </div> -->
					  <div class="col-md-12 col-xs-12 firstRow paddZ">
						 <div class="pull-left">List Price</div>
						 <div class="pull-right">{{$vehicle->price}}</div>
					  </div>
                  </div>
                  @endif
				  <div class="vehicle-info-rightD">
					<div class="col-md-12 col-xs-12 distanceD paddZ">{{$vehicle->odometer ==0?'N/A':$vehicle->odometer.' Km'}} </div>
					<div class="addthis_inline_share_toolbox pull-left"></div>
					<!-- <div class="col-md-12 col-xs-12 paddZ carProof">
						<a style="cursor: pointer;" data-toggle="modal" data-target="#enquiryModal"><img src="https://www.drivewheaton.ca/wp-content/themes/strathcom/assets/dist/img/carproof-logo.png" class="img-responsive" alt="carproof image"></a>
					</div> -->
				  </div>
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
                           @if($vehicle->user->role == 'member' || $vehicle->user->name == 'Edmonton Auto Loans')
                           <li><a href="#0">Finance</a></li>
                           @endif
                           <li><a href="#0">Map</a></li>
                        </ul>
                     </nav>
                  </div>
                  <!-- .cd-slider-nav -->
                  <ul class="cd-hero-slider">
                     <li class="selected">
                        <div class="contact-dealer-container">
                           @if($phone!= '--')
                           <div class="dealer-number"><a href="tel:{{ $phone }}" class="btn waves-effect waves-light "><i class="fa fa-phone"></i> {{ $phone }}</a></div>
                           @endif
                           
                           <h4>Contact {{$vehicle->user->name}}</h4>
                           {!! Form::open(['url' => '/contact-dealer', 'method' => 'POST', 'id' => 'contact-form']) !!}
                           <div class="form-group">
                              <input name="name" type="text" class="form-control" placeholder="Name" required/>
                           </div>
                           <div class="form-group">
                              <input id="phone" name="phone" type="text" class="form-control" placeholder="Phone – Optional" />
                           </div>
                           <div class="form-group">
                              <input id="email" name="email" type="email" class="form-control" placeholder="Email – Optional" />
                           </div>
                           <div class="form-group">
                              <textarea name="message" class="form-control" placeholder="Message" required>Hi, I'm interested in the {{$vehicle->year}} {{$vehicle->make->make_name}} {{$vehicle->model->model_name}}{{ $vehicle->price == "call"? '':' for '.$vehicle->price}}. Please contact me.</textarea>
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
                                    <td><strong>Year</strong></td>
                                    <td>{{$vehicle->year}}</td>
                                 </tr>
                                 <tr>
                                    <td><strong>Make</strong></td>
                                    <td>{{$vehicle->make->make_name}}</td>
                                 </tr>
                                 <tr>
                                    <td><strong>Model</strong></td>
                                    <td>{{$vehicle->model->model_name}}</td>
                                 </tr>
                                 @if(!empty($vehicle->price))
                                 <tr>
                                    <td><strong>Price</strong></td>
                                    <td>{{$vehicle->price}}</td>
                                 </tr>
                                 @endif
                                 @if(!empty($vehicle->odometer))
                                 <tr>
                                    <td><strong>Mileage</strong></td>
                                    <td>{{$vehicle->odometer}} Km</td>
                                 </tr>
                                 @endif
                                 @if(!empty($vehicle->trim))
                                 <tr>
                                    <td><strong>Trim</strong></td>
                                    <td>{{$vehicle->trim or 'Not specified'}}</td>
                                 </tr>
                                 @endif
                                 @if(!empty($vehicle->bodyStyleGroup))
                                 <tr>
                                    <td><strong>Body Style</strong></td>
                                    <td>{{$vehicle->bodyStyleGroup->body_style_group_name}}</td>
                                 </tr>
                                 @endif
                                 @if(!empty($vehicle->stock))
                                 <tr>
                                    <td><strong>Stock</strong></td>
                                    <td>{{$vehicle->stock}}</td>
                                 </tr>
                                 @endif
                                 @if(!empty($vehicle->doors))
                                 <tr>
                                    <td><strong>Doors</strong></td>
                                    <td>{{$vehicle->doors}}</td>
                                 </tr>
                                 @endif
                                 @if(!empty($vehicle->transmission))
                                 <tr>
                                    <td><strong>Transmission</strong></td>
                                    <td>{{$vehicle->transmission}}</td>
                                 </tr>
                                 @endif
                                 @if(!empty($vehicle->ext_color_id))
                                 <tr>
                                    <td><strong>Exterior Color</strong></td>
                                    <td>{{$vehicle->ext_color->color}}</td>
                                 </tr>
                                 @endif
                                 @if(!empty($vehicle->int_color_id))
                                 <tr>
                                    <td><strong>Interior Color</strong></td>
                                    <td>{{$vehicle->int_color->color}}</td>
                                 </tr>
                                 @endif
                                 @if(($vehicle->user->role=="member"))
                                 <tr>
                                    <td><strong>Seller</strong></td>
                                    <td>Private</td>
                                 </tr>
                                 @else
                                 <tr>
                                    <td><strong>Seller</strong></td>
                                    <td>Dealer</td>
                                 </tr>
                                 @endif
                                 @if(!empty($vehicle->passenger))
                                 <tr>
                                    <td><strong>Passengers</strong></td>
                                    <td>{{$vehicle->passenger}}</td>
                                 </tr>
                                 @endif

                                 @if($vehicle->user->name == 'Edmonton Auto Loans')
                                 <tr>
                                 <td colspan="2">
                                 <p></p>
                                    <p>EdmontonAutoLoans.com  - All Credit 100% Accepted!</p>
                                    <p>FOR QUICKER RESPONSE CALL OR TEXT 780-907-4401</p>
                                    <p><strong>Financing available for any credit.</strong></p>
                                    <p>All credit accepted! Just go to EdmontonAutoLoans.com and complete the mobile friendly credit application form.

                                    You will be pre-approved within moments of your auto loans application being reviewed.

                                    We offer financing on all vehicles including private, equity loans, dealers inventory, cash back loans, trade ins, and refinancing options.

                                    We offer the very best interest rates available from 3.99%. O.A.C. Excellent, Good, Poor, Or Very Poor, all APPROVED!

                                    For express approvals just text "APPROVED" to 780-907-4401 now, and we will respond immediately.

                                    Super quick and easy to apply. Check out our Google reviews! EdmontonAutoLoans.com

                                    Financing Made Quick and Easy. Text us now at 780-907-4401 to get started.</p>
                                    <p><strong>Free Auto Financing Options.</strong> Looking to sell, trade or buy a car, truck or SUV. One stop shop for all your vehicle financing needs.

                                    Go to EdmontonAutoLoans.com and <strong>Post your vehicle for FREE</strong>, and buyers will be able to apply for an auto loan directly on your vehicle.

                                    This service is completely free, and will give more potential buyers the option to finance your private vehicle though EdmotnonAutoLoans.com.</p>
                                    <p>Need a car loan on a private, or dealer vehicle? We offer cash back auto loans, equity auto loans, and offer finance solutions for every situation.

                                    All credit is 100% accepted and approved. 20 plus years of experience. Check out our Google reviews.</p>
                                    <p><strong>For express approval text "Approved" to 780-907-4401.</strong></p>
                                    <p>A Carproof and AMVIC Mechanical report are included on all dealer inventory.</p>
                                 </td>
                                 </tr>
                                 @else
                                 <tr>
                                    <td colspan="2"><p>{!!$vehicle->text!!}</p></td>
                                 </tr>
                                 @endif


                                 @if(!empty($vehicle->user->role == 'member'))
                                 <tr>
                                    <td colspan="2"><button id="resend-email" class="btn waves-effect waves-light btn">Edit this Vehicle</button></td>
                                 </tr>
                                 @endif
                                 
                              </table>
                              
                           </div>
                        </div>
                     </li>
                     @if($vehicle->user->role == 'member' || $vehicle->user->name == 'Edmonton Auto Loans')
                     <li>
                        <div class="contact-dealer-container">
                           <h4>Finance this vehicle</h4>

                           <div id="credit_form-box">
                              {!! Form::open(['id' => 'finance-form-1']) !!}
                              <div class="form-group">
                                 {!! Form::text('first_name', null, ['class' => 'form-control', 'minlength'=>'3', 'placeholder'=>'First Name', 'required']) !!}
                              </div>
                              <div class="form-group">
                                 {!! Form::text('last_name', null, ['class' => 'form-control', 'placeholder'=>'Last  Name', 'required']) !!}
                              </div>
                              <div class="form-group">
                                 {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder'=>'Phone', 'required']) !!}
                              </div>
                              <div class="form-group">
                                 {!! Form::email('email', null, ['class' => 'form-control', 'placeholder'=>'Email','required']) !!}
                              </div>
                              
                              <div class="form-group">
                                 <input type="checkbox" class="filled-in" name="privacy" id="filled-in-box" required />
                                 <label for="filled-in-box">I agree to <a target="_blank" href="/terms-and-conditions/">Terms and Conditions</a></label>
                              </div>
                              
                              <div class="form-group">
                                 <input type="hidden" name="vehicle" value="{{$vehicle->slug}}">
                                 <button id="next-btn" class="btn waves-effect waves-light btn-block" type="button">Submit</button>
                              </div>
                              {!! Form::close() !!}

                              {!! Form::open(['id' => 'finance-form-2']) !!}
                              <div class="form-group">
                                 {!! Form::text('street', null, ['class' => 'form-control','minlength'=>'3', 'placeholder'=>'Street', 'required']) !!}
                              </div>
                              <div class="form-group">
                                 {!! Form::text('city', null, ['class' => 'form-control', 'placeholder'=>'City', 'required']) !!}
                              </div>
                              <div class="form-group">
                                 <div class="select-box select-box-wide">
                                    <select name="province" required>
                                       <option value="" disabled selected>Select Province</option>
                                       @foreach ($provinces as $province)
                                       <option value="{{$province}}">{{$province}}</option>
                                       @endforeach
                                    </select>
                                 </div>
                              </div>
                              <div class="form-group">
                                 {!! Form::text('postal_code', null, ['class' => 'form-control', 'placeholder'=>'Postal Code','required']) !!}
                              </div>
                              <div class="form-group">
                                 <input name="dob" type="date" class="form-control datepicker" placeholder="Date of Birth">
                              </div>
                              <div class="form-group">
                                 {!! Form::text('sin', null, ['class' => 'form-control', 'placeholder'=>'Social Insurance Number']) !!}
                              </div>
                              <div class="form-group flex">
                                 <label>Rent Or Own</label>
                                 <div class="input-box">
                                    <div class="switch">
                                     <label>
                                       Rent
                                       <input type="checkbox">
                                       <span class="lever"></span>
                                       Own
                                     </label>
                                   </div>
                                 </div>
                              </div>
                              <div class="form-group">
                                 <div class="flex">
                                    {!! Form::text('time_address_year', null, ['class' => 'form-control', 'placeholder' => 'Time At Address Years']) !!}
                                    {!! Form::text('time_address_month', null, ['class' => 'form-control', 'placeholder' => 'Time At Address Months']) !!}
                                 </div>
                              </div>
                              <div class="form-group">
                                 {!! Form::text('monthly_payment', null, ['class' => 'form-control', 'placeholder' => 'Monthly Payment']) !!}
                              </div>
                              <div class="form-group">
                                 {!! Form::text('company', null, ['class' => 'form-control', 'placeholder' => 'Company Name']) !!}
                              </div>
                              <div class="form-group">
                                 {!! Form::text('work_phone', null, ['class' => 'form-control', 'placeholder' => 'Work Phone Number']) !!}
                              </div>
                              
                              <div class="form-group">
                                 {!! Form::text('position', null, ['class' => 'form-control', 'placeholder' => 'Position/Title']) !!}
                              </div>
                              <div class="form-group">
                                 <div class="flex">
                                    {!! Form::text('time_job_year', null, ['class' => 'form-control', 'placeholder' => 'Time At Job Years']) !!}
                                    {!! Form::text('time_job_month', null, ['class' => 'form-control', 'placeholder' => 'Time At Job Months']) !!}
                                 </div>
                              </div>
                              <div class="form-group">
                                 {!! Form::text('monthly_income', null, ['class' => 'form-control', 'placeholder' => 'Monthly Income']) !!}
                              </div>
                              
                              
                              <div class="form-group flex">
                                 <input type="hidden" name="vehicle" value="{{$vehicle->slug}}"><!-- 
                                 <button id="back-btn" class="btn waves-effect waves-light" type="button">Back</button> -->
                                 <button id="credit-submit" class="btn waves-effect waves-light" type="submit">Submit</button>
                              </div>
                              {!! Form::close() !!}
                           </div>
                        </div>
                     </li>
                     @endif
                     <li>
                        <div class="contact-dealer-container">
                           <h4>{{$vehicle->user->name}}</h4>
                           <div class="single-dealer-lower">
                              <div class="dealer-address-map">
                                 <div id='gmap_canvas' style='height:100%;width:100%;'></div>
                              </div>
                           </div>
                           
                     </li>
                  </ul>
                  <!-- .cd-hero-slider -->
               </div>
               <!-- .cd-hero -->
               <!-- Tabs end -->
            </div>
         </div>
      </div>
   </div>
   <!-- Car Details Container End -->

   <!-- Credit Application Banner -->
   <div class="related-item-container">
      <div class="container">
         <div class="row">
            <div class="col-sm-12">
               <!-- Featured Container start -->
               <div class="panel panel-default">
                  <div class="panel-heading">
                     <h3 class="panel-title">Sponsored Advertisement</h3>
                  </div>
                  <div class="small-approval-box">
                     <div class="approval small-approval">
                        <div class="small-approval-text">
                           <h3>100% credit acceptance</h3>
                           <p class="clock">Easy 60-Second Application</p>
                        </div>
                        <div class="small-approval-link">
                           <a target="_blank" href="/finance" class="waves-effect waves-light btn btn-orange small-btn-orange">APPLY CREDIT</a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- Featured Container end -->
            </div>
         </div>
      </div>
   </div>
   <!-- Credit Application Banner End-->

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

<!-- <div class="modal fade" id="enquiryModal">
    <div class="modal-dialog">
      <div class="modal-content">
		<div class="modal-header">
          <h4 class="modal-title">Request for Carproof</h4>
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
		<div class="modal-body">
			<form method="POST" action="/carproof" accept-charset="UTF-8" id="carproof-form" novalidate="novalidate"><input name="_token" type="hidden" value="">
				<div class="form-group">
					<label>Message Sent Succesfully</label>
				</div>
				<div class="form-group">
					<input name="name" type="text" class="form-control" placeholder="Name" required="" aria-required="true">
				</div>
				<div class="form-group">
					<input name="email" type="email" class="form-control" placeholder="Email" required="" aria-required="true">
				</div>
				<div class="form-group">
					<input name="phone" type="number" class="form-control" placeholder="Phone" required="" aria-required="true">
				</div>
				<div class="form-group">
					<textarea name="message" class="form-control" placeholder="Comments" required="" aria-required="true"></textarea>
				</div>
				<div>
					<button id="carproof-submit" class="btn waves-effect waves-light btn-block" type="submit">Submit</button>
				</div>
			</form>
        </div>
      </div>
    </div>
  </div> -->
  
  


@endsection

@section('javascript')

<script type="text/javascript">
var form = $("#contact-form");
form.validate({
    rules: {
       phone: {
           required: function(element) {
               return $("#email").val().length == 0;
           }
       },
       email: {
           required: function(element) {
               return $("#phone").val().length == 0;
           }
       }
   },
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
            data: $(form).serialize() + '&_token={{ csrf_token() }}' + '&dealer_email={{ $vehicle->user->email }}',
            success: function(response) {
                if (response.status == "success") {
                    toastr.success(response.message)
                    $('#dealer-submit').prop('disabled', false).html('Submit')
                    $("#contact-form").get(0).reset();
                }
            }
        });
    }
})

var form = $("#carproof-form");
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
        $('#carproof-submit').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:1.3rem" aria-hidden="true"></i>  PROCESSING');
        $.ajax({
            url: form.action,
            type: form.method,
            data: $(form).serialize() + '&_token={{ csrf_token() }}',
            success: function(response) {
                if (response.status == "success") {
                    toastr.success(response.message)
                    $('#carproof-submit').prop('disabled', false).html('Submit')
                    $("#carproof-form").get(0).reset();
                }
            }
        });
    }
})

var form = $("#finance-form-2");
form.validate({
    rules: {},
    messages: {
        contact: {
            required: "Please select an option"
        }
    },
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
        $('#credit-submit').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:1.3rem" aria-hidden="true"></i>  PROCESSING');
        $.ajax({
               url: '{{ url('/') }}/credit-application',
               type: 'POST',
               data: $('#finance-form-1').serialize() + '&'+ $('#finance-form-2').serialize()+ '&_token={{ csrf_token() }}' + '&vehicle={{ $vehicle->slug }}&dealer_email={{ $vehicle->user->email }}',
               success: function(response) {
                   if (response.status == "success") {
                       toastr.success('Your credit application is submitted successfully.')
                       $('#credit-submit').prop('disabled', false).html('Submit')
                       $("#finance-form-1").get(0).reset();
                       $("#finance-form-2").get(0).reset();
                       $('#finance-form-2').hide()
                       $('#finance-form-1').fadeIn()
                   }
               }
           });
    }
})

if ("{{ $vehicle->user->role == 'member' || $vehicle->user->name == 'Edmonton Auto Loans' }}" != '') {
   $('.cd-slider-nav .cd-marker').width('25%')
}

$("img").each(function(i,ele){
   $("<img/>").attr("src",$(ele).attr("src")).on('error', function() {
      $(ele).parent().removeClass('add-overlay');               
      $(ele).attr( "src", "/assets/images/placeholder.jpg" );
   })
});

$('#inventory-btn').on('click', function(e) {
    e.preventDefault();
    $.get("/removeSessionAll", function() {
        $.get("/setSessionKeyValue/dealer/{{$vehicle->user->name}}", function() {
            window.location = '/search';
        });
    });
});


$('#next-btn').on('click', function(e) {
   var form = $("#finance-form-1");
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

            }
        })

        if (form.valid() == true) {
            $.ajax({
               url: '{{ url('/') }}/short-application',
               type: 'POST',
               data: $('#finance-form-1').serialize() + '&_token={{ csrf_token() }}' + '&vehicle={{ $vehicle->slug }}&dealer_email={{ $vehicle->user->email }}',
               success: function(response) {
               }
           });

            $('#finance-form-1').hide()
            $('#finance-form-2').fadeIn()
        } else {
            return false;
        }
   
  });


$('#back-btn').on('click', function(e) {
   $('#finance-form-2').hide()
   $('#finance-form-1').fadeIn()
  });

$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 60, // Creates a dropdown of 15 years to control year
    min: [1950, 1, 1],
    max: [2005, 1, 1],
    onSet: function (ele) {
         if(ele.select){
                this.close();
         }
      }

});

$('#resend-email').on('click', function(e) {
   e.preventDefault();
   $('#resend-email').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:1.3rem" aria-hidden="true"></i>  Sending Email');
   $.ajax({
                 url: '{{ url('/') }}/resend-vehicle-email',
                 type: 'POST',
                 data: { 
                           vehicle: '{{ $vehicle->slug }}',
                           _token: '{{ csrf_token() }}'
                       },
                 success: function(response) {
                     if(response.status == "success")
                     {
                        toastr.success(response.message)
                        $('#resend-email').prop('disabled', false).html('Resend Email');
                     }
                 }
             });

})

//Add overlay to dynamically created popup content
$("body").bind("DOMNodeInserted", function() {
if('{{$vehicle->add_overlay}}')
   {
      $('figure').addClass('add-overlay');
      $('figure').removeClass('add-overlay-big');
      var popup_src = $('figure > img').attr('src');
      if(popup_src == '{{$vehicle->photo()}}')
      {
         $('figure').removeClass('add-overlay');
         $('figure').addClass('add-overlay-big');
      }
      
   }
})

</script>
<script type='text/javascript'>function init_map(){var myOptions = {zoom:12,center:new google.maps.LatLng({{$vehicle->user->latitude}},{{$vehicle->user->longitude}}),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng({{$vehicle->user->latitude}},{{$vehicle->user->longitude}})});infowindow = new google.maps.InfoWindow({content:'<strong>{{$vehicle->user->name}}</strong><br>{{$vehicle->user->address}}<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);
   infowindow.close(); //close label box
   }google.maps.event.addDomListener(window, 'load', init_map);</script>
<script src="https://unpkg.com/react@15.3.1/dist/react.min.js"></script>
<script src="https://unpkg.com/react-dom@15.3.1/dist/react-dom.min.js"></script>
<script src="https://unpkg.com/react-slick@0.13.6/dist/react-slick.min.js"></script>
<script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>
<script type="text/babel" src="/assets/js/related.js"></script>
@endsection