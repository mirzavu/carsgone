@extends('layouts.main')

@section('content')
<div class="contact-outer">
   <div class="container">
      <div class="wrapper">
         <!-- contact start -->
         <div class="row">
            <div class="col-sm-7">
               <div class="panel full">
                  <div class="panel-heading">
                     <h2>Contact Us</h2>
                  </div>
                  <div class="panel-body">
                     {!! Form::open(['url' => '/contact', 'method' => 'POST', 'id' => 'contact-form']) !!}
                     <div class="contact-dealer-container">
                        <div class="form-group">
                           {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => "Enter Name", 'required']) !!}
                        </div>
                        <div class="form-group">
                           {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => "Enter Email", 'required']) !!}
                        </div>
                        <div class="form-group">
                           {!! Form::text('subject', null, ['class' => 'form-control', 'placeholder' => "Enter Subject", 'required']) !!}
                        </div>
                        <div class="form-group">
                           {!! Form::textarea('message', null, ['class' => 'form-control', 'placeholder' => "Enter Message", 'required']) !!}
                        </div>
                        <div class="form-group">
                           <button id="submit-btn" class="finish-btn btn waves-effect waves-light" type="submit">Submit</button>
                        </div>
                     </div>
                     {!! Form::close() !!}
                  </div>
               </div>
            </div>
            <div class="col-sm-5">
               <div class="contact-info">
                  <div class="contact-box">
                     <h6>Questions or comments? Drop us a line.</h6>
                     <p>To request information, report site issues, or to make suggestions, fill out the contact form below and we'll get back to you as soon as we can!</p>
                  </div>
                  <div class="contact-box">
                     <img src="/assets/images/icon-biulding.png" alt="Address" />
                     <div class="contact-box-right">
                        <h3>Carsgone.com</h3>
                        <p>{!! Helper::setting('address') !!} {!! Helper::setting('postal_code') !!}</p>
                        <a class="phone" href="tel:1-855-328-6002"><i class="fa fa-phone" aria-hidden="true"></i> {!! Helper::setting('phone') !!}</a>
                     </div>
                  </div>
                  <div class="single-dealer-lower">
                     <div class="dealer-address-map">
                        <div id='gmap_canvas' style='height:100%;width:100%;'></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- contact end -->
      </div>
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
                  $('#submit-btn').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:1.3rem" aria-hidden="true"></i>  PROCESSING');
                    $.ajax({
                             url: form.action,
                             type: form.method,
                             data: $(form).serialize()+'&_token={{ csrf_token() }}',
                             success: function(response) {
                                 if(response.status == "success")
                                 {
                                    toastr.success(response.message)
                                    $('#submit-btn').prop('disabled', false).html('Submit')
                                    $("#contact-form").get(0).reset();
                                 }
                             }
                         });
                }
            })



</script>
<script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(53.5477952,-113.5679699),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(53.5477952,-113.5679699)});infowindow = new google.maps.InfoWindow({content:'<strong>Carsgone</strong><br>17536 – 105 Avenue, Edmonton, Alberta<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>

@endsection