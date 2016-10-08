@extends('layouts.main')

@section('title', 'Carsgone')

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
                     <div class="contact-dealer-container">
                        <div class="form-group">
                           <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group">
                           <input type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="form-group">
                           <textarea class="form-control" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                           <i class="btn waves-effect waves-light waves-input-wrapper" style=""><input type="submit" value="Submit" class="waves-button-input"></i>
                        </div>
                     </div>
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
                        <p>17536 – 105 Avenue, Edmonton, Alberta T5S 1G4</p>
                        <a class="phone" href="tel:1-855-328-6002"><i class="fa fa-phone" aria-hidden="true"></i> 1-855-328-6002</a>
                     </div>
                  </div>
                  <div class="single-dealer-lower">
                     <div class="dealer-address-map">
                        <div id='gmap_canvas' style='height:100%;width:100%;'></div>
                        <script type='text/javascript'>function init_map(){var myOptions = {zoom:10,center:new google.maps.LatLng(45.4393321,-73.47262060000003),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(45.4393321,-73.47262060000003)});infowindow = new google.maps.InfoWindow({content:'<strong>Carsgone</strong><br>8905, boul. Taschereau, J4Y 1A4, Brossard, Quebec<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>
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
@endsection