<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
{!! SEOMeta::generate() !!}
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
<link href="/assets/css/all.css" rel="stylesheet" type="text/css">
{{-- <link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/assets/css/materialize.css" rel="stylesheet" type="text/css">
<link href="/assets/css/slick.css" rel="stylesheet" type="text/css">
<link href="/assets/css/magnific-popup.css" rel="stylesheet" type="text/css">
<link href="/assets/css/nprogress.css" rel="stylesheet" type="text/css">
<link href="/assets/css/toastr.min.css" rel="stylesheet" type="text/css">
<link href="/assets/css/step-form-wizard-all.css" rel="stylesheet" type="text/css">
<link href="/assets/css/dropzone.css" rel="stylesheet" type="text/css">
<link href="/assets/css/style.css" rel="stylesheet" type="text/css"> --}}
<script src="/assets/js/modernizr.js"></script> <!-- Modernizr -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCKsvinm7jgttOZYmtlyIEhEt5l7ZL7-yM"></script>
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="home">
<!-- header start -->
<header>
	<!-- header upper start -->
	<div class="header-upper">
    	<div class="container">
        	<ul class="upper-nav">
            	<li><a href="#"><i class="fa fa-map-marker"></i> {{ $location['place'] or 'Location'}}</a></li>
                <li><a href="#">Contact: 123-456-7890</a></li>
            </ul>
            <ul class="upper-nav right">
            @if (Auth::check())
              <li id="dashboard-li"><a href="/dashboard">Dashboard</a></li>
              <li id="logout-li"><a href="/logout">Logout</a></li>
            @else
            	<li id="signup-li"><a class="modal-trigger" href="#signup">Sign-Up</a></li>
              <li id="login-li"><a class="modal-trigger" href="#member">Login</a></li>
            @endif
            </ul>
        </div>
    </div>
    <!-- header upper end -->
    <!-- header lower start -->
    <div class="header-lower">
    	<nav class="navbar navbar-default navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><img src="/assets/images/logo.png" alt="" /></a>
          <a href="/search" class="hero-btn"><span>Browse Cars</span></a>
          <div class="header-search">
          <div class="header-search-box">
            <form id="search-form" action="/searchterm" method="GET">
          	<input id="search_text" name="search_text" type="text" value="" placeholder="Full content search" class="search-input" required />
            {{ csrf_field() }}
            
            {{-- fa-refresh fa-spin fa-search --}}
            <button id="search_icon" type="submit" class="search-submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
            </div>
          </div>
         
        </div>
        <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav navbar-right">
                <li {{{ (Request::is('search') ? 'class=active' : '') }}}><a href="/search"><span>Browse Cars</span></a></li>
                <li {{{ (Request::is('post') ? 'class=active' : '') }}}><a href="/post"><span>Post Ad</span></a></li>
                <li {{{ (Request::is('auto-dealers/info') ? 'class=active' : '') }}}><a href="/auto-dealers/info"><span>Dealers</span></a></li>
                <li {{{ (Request::is('autoloans') ? 'class=active' : '') }}}><a href="/autoloans"><span>Car Loans</span></a></li>
                <li><a id="private-link" href="#"><span>Private</span></a></li>
           </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    </div>
    <!-- header lower end -->
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
    	<div class="footer-upper">
        	<div class="container">
            	<div class="row">
                    <div class="col-sm-4 footer-box">
                    	    <a href="index.html" class="footer-logo"><img src="/assets/images/footer-logo.png" alt="" /></a>
                            {{-- <h5>Contact</h5> --}}
                            <p>17536 – 105 Avenue, Edmonton, Alberta  T5S 1G4</p>
                            <p>Email: <a href="mailto:youremail@yourdomain.com">support@carsgone.com</a></p>
                            <p>Phone: 1-855-328-6002</p>
                            <ul class="social-links">
                            	<li><a href="https://www.facebook.com/Carsgonecom-108789885413"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul> 
                    </div>
                    <div class="col-sm-4 footer-box">
                    	<div class="footer-box-content">
                    	  <h5>Auto Dealers</h5>
                        	<ul class="footer-links">
                            	<li><a href="/auto-dealers">Auto Dealer Listings</a></li>
                                <li><a href="/auto-dealers/info">Auto Dealer Info</a></li>
                                <li><a href="/contact">Auto Dealer Contact</a></li>
                            </ul> 
                       </div>
                    </div>
                    <div class="col-sm-4 footer-box">
                    	<div class="footer-box-content">
                    	<h5>Other Info</h5>
                        	<ul class="footer-links">
                                <li><a href="/help">Questions &amp; Answers</a></li>
                                <li><a href="/privacy">Privacy Policy</a></li>
                                <li><a href="/contact">Contact Us</a></li>
                            </ul> 
                         </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-lower">
        	<div class="container">
            	<div class="row">
                    <div class="col-sm-12">
                    	<p class="copyright">&copy; {{ date("Y")}} Carsgone.com All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </div>
        
    </footer>
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


$('#private-link').on('click',function(e){
  e.preventDefault();
  $.get( "/removeSessionAll");
  $.get( "/setSessionKeyValue/seller/private", function( data ) {
      window.location = '/search';
  });
  
})

var base_url = '{{ url('/') }}';
</script>
@yield('javascript')

</body>
</html>
