<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="https://www.edmontonautoloans.com/wp-content/themes/creditapp/images/stp3.png" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
{!! SEO::generate() !!}
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
{{-- <link href="/assets/css/all.css" rel="stylesheet" type="text/css">--}}
<link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/assets/css/materialize.css" rel="stylesheet" type="text/css">
<link href="/assets/css/slick.css" rel="stylesheet" type="text/css">
<link href="/assets/css/magnific-popup.css" rel="stylesheet" type="text/css">
<link href="/assets/css/nprogress.css" rel="stylesheet" type="text/css">
<link href="/assets/css/toastr.min.css" rel="stylesheet" type="text/css">
<link href="/assets/css/step-form-wizard-all.css" rel="stylesheet" type="text/css">
<link href="/assets/css/dropzone.css" rel="stylesheet" type="text/css">
<link href="/assets/css/style.css" rel="stylesheet" type="text/css"> 

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="home">
<script>
  if(document.location.hostname.search("edmontonautoloans.com") !== -1)
  {
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-6617033-2', 'auto');
    ga('send', 'pageview');
  } 
  
</script>
<!-- header start -->
<header>
<div class="Navbar">
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="col-sm-3 logo" style="padding: 0px;">
                                   <a href="https://www.edmontonautoloans.com/" id="logo" title="EDMONTON AUTO LOANS" rel="home">
                 <img src="https://www.edmontonautoloans.com/wp-content/themes/creditapp/images/logo.jpg" alt="EDMONTON AUTO LOANS">
                </a> 
                         
                  </div>
        <nav class="col-sm-9 text-right" style="padding: 0px;">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">Menu</a>
          </div>
          <ul class="navbar-collapse collapse collapse-menu padded" id="navbar">
            <li><a href="/">Home</a></li><li><a class="{{ Request::is('search') ? 'active' : '' }}" href="https://www.edmontonautoloans.com/buy/search">Inventory</a></li>
            <li>
            <a href="https://www.edmontonautoloans.com/buy/sell" class="{{ Request::is('sell') ? 'active' : '' }}">Sell Vehicle</a></li>
            <li><a href="https://www.edmontonautoloans.com/finance/">Finance</a></li><li><a href="https://www.edmontonautoloans.com/reviews/">Reviews</a></li><li><a href="https://www.edmontonautoloans.com/contact/">Contact Us</a></li><li><a><i class="not fa fa-phone"></i>1-855-227-1669</a></li>          </ul>
        </nav>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
  /**************************************/
  $("#textus .textus-open").click(function()
  {
    $(this).hide();
    $("#textus").animate({'right':'0'},'slow');
  });
  $("#textus .textus-close").click(function()
  {
    $("#textus").animate({'right':'-320px'},'slow');
    $("#textus .textus-open").show('slow');
  });
});
</script>

<div id="textus">
  <a class="textus-open"><img src="https://www.edmontonautoloans.com/wp-content/themes/creditapp/images/text-us.jpg"></a>
  <h4>Text Us <a class="textus-close"><i class="fa fa-times-circle"></i></a></h4>
  <div role="form" class="wpcf7" id="wpcf7-f88-o1" lang="en-US" dir="ltr">
<div class="screen-reader-response"></div>
<form action="/#wpcf7-f88-o1" method="post" class="wpcf7-form theme_1 errorMsgshow" novalidate="novalidate">
<div style="display: none;">
<input type="hidden" name="_wpcf7" value="88">
<input type="hidden" name="_wpcf7_version" value="4.3">
<input type="hidden" name="_wpcf7_locale" value="en_US">
<input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f88-o1">
<input type="hidden" name="_wpnonce" value="427bd55f14">
</div>
<div><label>Phone*</label><span class="wpcf7-form-control-wrap phone"><input type="text" name="phone" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-validates-as-required textbox number required" aria-required="true" aria-invalid="false"></span></div>
<div><label>Message<span>*</span></label><span class="wpcf7-form-control-wrap Message"><textarea name="Message" cols="40" rows="3" class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required textbox required" aria-required="true" aria-invalid="false"></textarea></span></div>
<div class="text-right"><input type="submit" value="SUBMIT" class="wpcf7-form-control wpcf7-submit button"><img class="ajax-loader" style="visibility: hidden;"></div>
<div class="wpcf7-response-output wpcf7-display-none"></div></form></div> <!--<form>
    <div><label>Email<span>*</span></label><input type="text" class="textbox" required /></div>
    <div><label>Phone<span>*</span></label><input type="text" class="textbox" required /></div>
    <div><label>Message<span>*</span></label><textarea class="textbox" required></textarea></div>
    <div class="text-right"><input type="submit" class="button" value="SUBMIT" /></div>
  </form>-->
</div>

</header>

@if(Session::has('success'))
<div class="alert-outer">
  <div class="container">
    <div class="wrapper">
      <div class="alert alert-success alert-dismissible" role="alert">
        <div class="icon"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></div>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong> {!! Session::get('success') !!} </strong>
      </div>
      <!-- Use class alert-danger for error--> 
    </div>
  </div>
</div>
@endif
<!-- header end --> 
 @yield('content')
    <!-- footer start -->
<footer>
   <div class="container mAlign">
      <div class="row">
         <div class="col-sm-12 main-b">
            <div class="col-sm-2">
               <h2 class="mAlign">Menu</h2>
               <ul class="link">
                  <li><a href="https://www.edmontonautoloans.com/">» Home</a></li>
                  <li><a href="https://www.edmontonautoloans.com/auto-loan-types-finance-locations/">» Loan Types</a></li>
                  <li><a href="http://www.edmontonautoloans.com/vehicles/search">» Used Inventory</a></li>
                  <li><a href="https://www.edmontonautoloans.com/reviews/">» Reviews</a></li>
                  <li><a href="https://www.edmontonautoloans.com/contact/">» Contact Us</a></li>
               </ul>
            </div>
            <div class="col-sm-3">
               <h2 class="mAlign">Hours Of Operation</h2>
               <ul class="link">
                  <li>Sales Hours</li>
                  <li>Monday 9:00 am - 8:00 pm</li>
                  <li>Tuesday 9:00 am - 8:00 pm</li>
                  <li>Wednesday 9:00 am - 8:00 pm</li>
                  <li>Thursday 9:00 am - 8:00 pm</li>
                  <li>Friday 9:00 am - 7:00 pm</li>
                  <li>Saturday 9:00 am - 6:00 pm</li>
                  <li>Sunday 12:00 am - 5:00 pm</li>
               </ul>
            </div>
            <div class="col-sm-4">
               <h2 class="mAlign">Welcome To Express Car Loans</h2>
               <ul class="link">
                  <li>Edmonton Auto Loans is for people with all sorts of credit from perfect, good, and terrible credit. We specialize in rebuilding bad credit, starting new credit, in house finance, new to country &amp; 9 SIN numbers, private car loans, judgements, repossessions, bankruptcy, write offs, collections, bad credit, divorce, consumer proposals, Bad Credit, very bad credit and even the worst credit ever. Bad credit Car Loans in Edmonton is what we do at Edmonton Auto Loans. We specialize in providing auto loans for people wih bad credit. We know that new and used car customers throughout Edmonton and area, sometimes need a little help to find the right auto loan provider. If you think you have a really bad or low credit rating, and have been turned down in the past, chances are we can help. Try the express car loan option now, and we can have you driving in a snap.</li>
               </ul>
            </div>
            <div class="col-sm-3">
               <ul class="link adres">
                  <li><a title="6211 104 Street Edmonton AB"><i class="fa fa-map-marker"></i>10384 51 Ave NW, <br> 
                  Edmonton, AB T6H 5X6</a></li>
                  <li><a title="1-855-227-1669​"><i class="fa fa-phone"></i>1-855-227-1669​</a></li>
                  <li><a title="1-855-227-1669​"><i class="fa fa-headphones"></i>1-855-227-1669​</a></li>
               </ul>
               <!--<ul class="soc">
                  <li><a href="#" target="_blank" title="Facebook"><i class="not fa fa-facebook"></i></a></li><li><a href="#" target="_blank" title="Twitter"><i class="not fa fa-twitter"></i></a></li><li><a href="#" target="_blank" title="Instagram"><i class="not fa fa-instagram"></i></a></li><li><a href="#" target="_blank" title="Youtube"><i class="not fa fa-youtube"></i></a></li><li><a href="#" target="_blank" title="Pinterest"><i class="not fa fa-pinterest-p"></i></a></li>          </ul>-->
            </div>
         </div>
      </div>
   </div>
   <div class="copyright">
      <div class="container">
         <div class="row">
            <div class="col-sm-8">
               <div class="col-sm-12 cAlign">©  2017  Edmonton Auto Loans. All rights Reserved.</div>
            </div>
            <div class="col-sm-4">
               <a href="https://www.facebook.com/EdmontonAutoLoans/" target="_blank" style="padding: 4px 11px;background-color:#ffffff;border-radius: 11px;color: #222222;font-size: 17px;"><i class="fa fa-facebook" aria-hidden="true"></i></a>
               &nbsp; &nbsp;  &nbsp; &nbsp;
               <a href="#"><img width="120px" src="https://www.edmontonautoloans.com/wp-content/uploads/2017/07/amvic-logo.jpg" alt="amvic logo"></a>
            </div>
         </div>
      </div>
   </div>

    <!-- footer end -->

<div id="member" class="modal member">
<div class="modal-content">
  <h5>LOGIN</h5>
  <div class="form-group">
    <label>Email</label>
    <input id="login-email" type="text" class="form-control"/>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input id="login-password" type="password" class="form-control" />
    <a id="reset-link" href="#" class="forgot">Forgot It ?</a>
  </div>
  <a href="#" class="modal-action modal-close close"><i class="fa fa-times" aria-hidden="true"></i></a>
</div>
<div class="modal-footer">
  <a id="login-submit" class="btn waves-effect waves-light waves-input-wrapper">Login</a>
  <a id="signup-link" class="link" href="#">Sign Up <i class="fa fa-sign-in" aria-hidden="true"></i></a>
</div>

</div>
<div id="signup" class="modal member">
<div class="modal-content">
  <h5>SIGN UP</h5>
  <div class="form-group">
    <label>Email</label>
    <input id="signup-email" type="text" class="form-control" />
  </div>
  <div class="form-group">
    <label>Name</label>
    <input id="signup-name" type="text" class="form-control" />
  </div>
  <div class="form-group">
    <label>Password</label>
    <input id="signup-password" type="password" class="form-control"/>
  </div>
  <div class="">
    <label>Confirm Password</label>
    <input id="signup-cpassword" type="password" class="form-control" />
  </div>
  <a href="#" class="modal-action modal-close close"><i class="fa fa-times" aria-hidden="true"></i></a>
</div>
<div class="modal-footer">
  <a id="signup-submit" class="btn waves-effect waves-light waves-input-wrapper">Signup</a>
  <a id="login-link" class="link" href="#">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a>
</div>
</div>


<div id="reset" class="modal member">
<div class="modal-content">
  <h5>RESET PASSWORD</h5>
  <div class="form-group">
    <label>Email</label>
    <input id="reset-email" type="text" class="form-control" />
  </div>
  <a href="#" class="modal-action modal-close close"><i class="fa fa-times" aria-hidden="true"></i></a>
</div>
<div class="modal-footer">
  <button id="reset-submit" class="btn waves-effect waves-light waves-input-wrapper">Reset</button>
  <a id="reset-login-link" class="link" href="#">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a>
</div>
</div>
<script src="/assets/js/modernizr.js"></script> <!-- Modernizr -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKsvinm7jgttOZYmtlyIEhEt5l7ZL7-yM&sensor=false&libraries=places"></script>
<script src="/assets/js/all.js"></script>
{{-- <script src="/assets/js/jquery-2.2.2.min.js"></script> 
<script src="/assets/js/bootstrap.min.js"></script>
<script src="/assets/js/materialize.min.js"></script>
<script src="/assets/js/slick.min.js"></script>
<script src="/assets/js/main.js"></script>
<script src="/assets/js/nouislider.min.js"></script>
<script src="/assets/js/step-form-wizard.js"></script>
<script src="/assets/js/wNumb.min.js"></script>
<script src="/assets/js/jquery.magnific-popup.min.js"></script>
<script src="/assets/js/theia-sticky-sidebar.js"></script>
<script src="/assets/js/nprogress.js"></script>
<script src="/assets/js/toastr.min.js"></script>
<script src="/assets/js/jquery.validate.js"></script>
<script src="/assets/js/additional-methods.min.js"></script>
<script src="/assets/js/custom.js"></script>  --}}
<script type="text/javascript">
toastr.options = {
  "closeButton": true,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "0",
  "extendedTimeOut": "0",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

$('#make-select').on('change',function(){
    var id = $('#make-select').val();
        $.ajax({ type: "GET",   
             url: "{{ url('getModels/') }}/"+id,   
             async: true,
             success : function(data)
             {  var models = jQuery.parseJSON(data);
                model_html = '<option value="" disabled selected>Select Model</option>';
                $.each(models, function( index, value ) {
                  model_html += '<option value="'+value.model_name+'">'+value.model_name+'</option>';
                });
                $('#model-select').html(model_html);
                $('#model-select').material_select();
             }
    });
});

var form = $("#search-form");
            form.validate({    
                errorPlacement: function(error, element) {
                    return false;
                },
                submitHandler: function(form) {
                  $('#search_icon').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:1.3rem" aria-hidden="true"></i>');
                    $.ajax({
                             url: form.action,
                             type: form.method,
                             data: $(form).serialize()+'&_token={{ csrf_token() }}',
                             success: function(response) {
                                 window.location = "{{ url('search/') }}/"+response.link;
                             }
                         });
                }
            })

$('#quick_search').on('click',function(){
    var make = $('#make-select option:selected').text();
    var model = $('#model-select').val();
    var pathname='';
    if(make && make!="Select Make")
    {
        pathname+='/make-'+make;
    }
    if(model)
    {
        pathname+='/model-'+model;
    }
    window.location = "{{ url('search/') }}"+pathname;
})

$('#signup-link').on('click',function(e){
  e.preventDefault();
  $('#member').closeModal();
  $('#signup').openModal();
});

$('#login-link').on('click',function(e){
  e.preventDefault();
  $('#signup').closeModal();
  $('#member').openModal();
});

$('#reset-login-link').on('click',function(e){
  e.preventDefault();
  $('#reset').closeModal();
  $('#member').openModal();
});

$('#reset-link').on('click',function(e){
  e.preventDefault();
  $('#member').closeModal();
  $('#reset').openModal();
});

$('#login-submit').on('click',function(e){
  toastr.clear()
  NProgress.start();
  var data = { email: $('#login-email').val(), password: $('#login-password').val(), "_token": "{{ csrf_token() }}"}
  $.post( "/login", data).done(function( data ) {
    NProgress.done();
    if(data.status=="success")
    {
      toastr.success('Checkout your saved vehicles in dashboard','You have logged in Successfully')
      $('#member').closeModal();
      $('#signup-li').replaceWith( '<li id="dashboard-li"><a href="/dashboard">Dashboard</a></li>');
      $('#login-li').replaceWith( '<li id="logout-li"><a href="#">Logout</a></li>');
    }
    else
    {
      toastr.error(data.error,'Error')
    }
    console.log(data);
  }).fail(function(data){
    if(data.status=="fail")
    {
      toastr.error('Token Expired. Please refresh page')
    }
  });
});

$('#signup-submit').on('click',function(e){
  toastr.clear()
  NProgress.start();
  if($('#signup-password').val() != $('#signup-cpassword').val())
  {
    toastr.error('Passwords do not match','Error')
    NProgress.done();
    return
  }
  var data = { email: $('#signup-email').val(), name: $('#signup-name').val(), password: $('#signup-password').val(), "_token": "{{ csrf_token() }}"}
  $.post( "/signup", data).done(function( data ) {
    NProgress.done();
    if(data.status=="success")
    {
      toastr.success( 'Checkout your saved vehicles in dashboard', 'Registered Successfully')
      $('#signup').closeModal();
      $('#signup-li').replaceWith( '<li id="dashboard-li"><a href="/dashboard">Dashboard</a></li>');
      $('#login-li').replaceWith( '<li id="logout-li"><a href="#">Logout</a></li>');
    }
    else
    {
      toastr.error(data.error, 'Error')
    }
    console.log(data);
  });
});

$('#reset-submit').on('click',function(e){
  toastr.clear()
  NProgress.start();
  var data = { email: $('#reset-email').val(), "_token": "{{ csrf_token() }}"}
  $.post( "/send-reset-link", data).done(function( data ) {
    NProgress.done();
    if(data.status=="success")
    {
      toastr.success('A reset password link has been successfully sent to your email account.')
      $('#reset').closeModal();
    }
    else
    {
      toastr.error(data.error,'Error')
    }
    console.log(data);
  });
});

$('body').on('click', '#logout-li', function() {
  NProgress.start();
  $.get( "/logout").done(function( data ) {
    NProgress.done();
    toastr.success('You have logout Successfully')
    location.reload();
  });
});


$('#private-link').on('click',function(event){
  event.preventDefault ? event.preventDefault() : (event.returnValue = false)
  $.get( "/removeSessionAll",{ "_": $.now() });
  $.get( "/setSessionKeyValue/seller/private",{ "_": $.now() }, function( data ) {
      window.location = '/search';
  });
  
})

$('#browse-link').on('click',function(event){
  event.preventDefault ? event.preventDefault() : (event.returnValue = false)
  $.get( "/removeSessionAll",{ "_": $.now() }, function( data ) { //Added time to disable caching
      window.location = '/search';
  });
})

var base_url = '{{ url('/') }}';

$('.location-box').on('click',function(event){
  $(this).removeClass('location-box');
  $(this).children('a').hide();
  $(this).children('div').css('display', 'flex').show();
  $('#searchTextField').focus();
})


function initialize() {

    var options = {
     types: ['(cities)'],
     componentRestrictions: {country: "ca"}
    };

    var input = document.getElementById('searchTextField');
    autocomplete = new google.maps.places.Autocomplete(input, options);

   }

   function searchPlace()
   {
      var input = document.getElementById('searchTextField').value;
      var has_number = input.match(/\d+/g);
      var lat = 0;
      var lng = 0;
      var city = '';
      if (has_number != null) {
          // $.get('')
          var geocoder = new google.maps.Geocoder();
         geocoder.geocode({address: input},
             function(results_array, status) { 
               try
               {
               city = input;
               var lat = results_array[0].geometry.location.lat()
               var lng = results_array[0].geometry.location.lng()
               setLocation(lat, lng, city);
               }
               catch(e)
               {
                  console.log("YO",e)
               }
         });
      }
      else
      {
         var place = autocomplete.getPlace();
          city = place.vicinity;
          lat = place.geometry.location.lat();
          lng = place.geometry.location.lng();
          for (var i = 0; i < place.address_components.length; i++) {
            for (var j = 0; j < place.address_components[i].types.length; j++) {
              if (place.address_components[i].types[j] == "postal_code") {
                console.log(place.address_components[i].long_name);

              }
            }
          }
          setLocation(lat, lng, city)
      }
      console.log(city)


   }

   function setLocation(lat, lng, city)
   {
      $.get( "/setLocation?lat="+lat+"&lng="+lng+"&city="+city).done(function( data ) {
        // Regex - remove city and province param from url
        var loc = window.location.pathname.replace(/(city|province)-(\w+)(\/|.*)/g,'')
        if(loc.indexOf('search')>=0)
        {
          window.location.href = loc;
        }
        else
        {
          $('#location-box').addClass('location-box');
          $('#location-box').children('a').show();
          $('#location-box > a > span').text(data.city);
          $('#location-box').children('div').hide();
        }
      });
   }
   google.maps.event.addDomListener(window, 'load', initialize);
</script>
@yield('javascript')
<!-- Go to www.addthis.com/dashboard to customize your tools --> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-588b40388234f00a"></script> 
</body>
</html>
