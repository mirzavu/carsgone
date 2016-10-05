<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Carsgone</title>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="/assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="/assets/css/materialize.css" rel="stylesheet" type="text/css">
<link href="/assets/css/slick.css" rel="stylesheet" type="text/css">
<link href="/assets/css/magnific-popup.css" rel="stylesheet" type="text/css">
<link href="/assets/css/nprogress.css" rel="stylesheet" type="text/css">
<link href="/assets/css/toastr.min.css" rel="stylesheet" type="text/css">
<link href="/assets/css/style.css" rel="stylesheet" type="text/css">
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
            	<li><a class="modal-trigger" href="#signup">Sign-Up</a></li>
              <li><a class="modal-trigger" href="#member">Login</a></li>
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
          	<input id="search_text" type="text" value="" placeholder="Find vehicle now..." class="search-input" />
            <input id="search_icon" type="submit" value="&#xf002;" class="search-submit" />
            </div>
          </div>
         
        </div>
        <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav navbar-right">
                <li><a href="/search" class="hero-nav"><span>Browse Cars</span></a></li>
                <li><a href="#"><span>Post Ad</span></a></li>
                <li><a href="#"><span>Dealers</span></a></li>
                <li><a href="#"><span>Car Loans</span></a></li>
                <li><a href="#"><span>Private</span></a></li>
           </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    </div>
    <!-- header lower end -->
</header>
<!-- header end --> 
 @yield('content')
    <!-- footer start -->
    <footer>
    	<div class="footer-upper">
        	<div class="container">
            	<div class="row">
                    <div class="col-sm-4 footer-box">
                    	    <a href="index.html" class="footer-logo"><img src="/assets/images/footer-logo.png" alt="" /></a>
                            <h5>Contact</h5>
                            <p>198 West 21th Street, Suite 721, New York NY5109 Pacific Coast Highway, Los Angeles CA</p>
                            <p>Email: <a href="mailto:youremail@yourdomain.com">youremail@yourdomain.com</a></p>
                            <p>Phone: +88 (0) 101 0000 000</p>
                            <p>Fax: +88 (0) 202 0000 001</p>
                            <ul class="social-links">
                            	<li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-vine"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul> 
                    </div>
                    <div class="col-sm-4 footer-box">
                    	<div class="footer-box-content">
                    	  <h5>Auto Dealers</h5>
                        	<ul class="footer-links">
                            	<li><a href="#">Auto Dealer Listings</a></li>
                                <li><a href="#">Auto Dealer Info</a></li>
                                <li><a href="#">Auto Dealer Accounts</a></li>
                                <li><a href="#">Auto Dealer Contact</a></li>
                            </ul> 
                       </div>
                    </div>
                    <div class="col-sm-4 footer-box">
                    	<div class="footer-box-content">
                    	<h5>Other Info</h5>
                        	<ul class="footer-links">
                            	<li><a href="#">Links &amp; Resources</a></li>
                                <li><a href="#">Questions &amp; Answers</a></li>
                                <li><a href="#">Company Privacy Policy</a></li>
                                <li><a href="#">Contact Us Here</a></li>
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
                    	<p class="copyright">&copy; 2012 AUTOandTRUCK.ca All Rights Reserved.</p>
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
    <a href="#" class="forgot">Forgot It ?</a>
  </div>
  <a href="#" class="modal-action modal-close close"><i class="fa fa-times" aria-hidden="true"></i></a>
</div>
<div class="modal-footer">
  <input id="login-submit" type="submit" class="btn waves-effect waves-light waves-input-wrapper" value="Log In" />
  <a id="signup-link" class="link" href="#">Sign Up <i class="fa fa-sign-in" aria-hidden="true"></i></a>
</div>

</div>
<div id="signup" class="modal member">
<div class="modal-content">
  <h5>SIGN UP</h5>
  <div class="form-group">
    <label>Email</label>
    <input type="text" class="form-control" />
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control"/>
  </div>
  <div class="form-group">
    <label>Confirm Password</label>
    <input type="password" class="form-control" />
  </div>
  <a href="#" class="modal-action modal-close close"><i class="fa fa-times" aria-hidden="true"></i></a>
</div>
<div class="modal-footer">
  <input type="submit" class="btn waves-effect waves-light waves-input-wrapper" value="Signup" />
  <a id="login-link" class="link" href="#">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a>
</div>
</div>
<script type="text/javascript" src="/assets/js/jquery-2.2.2.min.js"></script> 
<script type="text/javascript" src="/assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/assets/js/materialize.min.js"></script>
<script type="text/javascript" src="/assets/js/slick.min.js"></script>
<script type="text/javascript" src="/assets/js/main.js"></script>
<script type="text/javascript" src="/assets/js/nouislider.min.js"></script>
<script type="text/javascript" src="/assets/js/wNumb.min.js"></script>
<script type="text/javascript" src="/assets/js/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="/assets/js/theia-sticky-sidebar.js"></script>
<script type="text/javascript" src="/assets/js/nprogress.js"></script>
<script type="text/javascript" src="/assets/js/toastr.min.js"></script>
<script type="text/javascript" src="/assets/js/custom.js"></script> 
<script type="text/javascript">
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


$('#search_icon').on('click',function(){
    var term = $('#search_text').val();
    var response = '';
    $.ajax({ type: "GET",   
             url: "{{ url('searchterm/') }}/"+term,   
             async: false,
             success : function(response)
             {
                 window.location = "{{ url('search/') }}/"+response;
             }
    });

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

$('#login-submit').on('click',function(e){

  toastr.success('You have logged in Successfully', 'Checkout your saved vehicles in dashboard')

  NProgress.start();
  var data = { email: $('#login-email').val(), password: $('#login-password').val(), "_token": "{{ csrf_token() }}"}
  $.post( "/login", data).done(function( data ) {
    NProgress.done();
    console.log(data);
  });
  $('#signup').closeModal();
  $('#member').openModal();
});



</script>
@yield('javascript')

</body>
</html>