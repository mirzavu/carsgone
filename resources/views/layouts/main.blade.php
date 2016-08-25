<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title></title>
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
<link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/jquery.material.form.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
<script src="{{ asset('assets/js/modernizr.js') }}"></script> <!-- Modernizr -->
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
                <li><a href="#"><i class="fa fa-map-marker"></i> {{ $location['city']}}</a></li>
                <li><a href="#">Contact: 123-456-7890</a></li>
            </ul>
            <ul class="upper-nav right">
                <li><a href="#">Sign-Up</a></li>
                <li><a href="#">Login</a></li>
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
          <a class="navbar-brand" href="#"><img src="assets/images/logo.png" alt="" /></a>
          <a href="#" class="hero-btn"><span>Browse Cars</span></a>
          <div class="header-search">
          <div class="header-search-box">
            <input id="search_text" type="text" value="" placeholder="Find vehicle now..." class="search-input" />
            <input id="search_icon" type="submit" value="&#xf002;" class="search-submit" />
            </div>
          </div>
         
        </div>
        <div id="navbar" class="navbar-collapse collapse">
           <ul class="nav navbar-nav navbar-right">
                <li><a href="#" class="hero-nav"><span>Browse Cars</span></a></li>
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
                            <a href="index.html" class="footer-logo"><img src="assets/images/footer-logo.png" alt="" /></a>
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
<script type="text/javascript" src="{{ asset('assets/js/jquery-2.2.2.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('assets/js/jquery.material.form.min.js') }}"></script> 
<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script> 


<script type="text/javascript">
    $(function(){
        $('.material').materialForm(); // Apply material
        
    });
</script>
<script>
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

function setModel(make) {
    var id = make.value;  
    $.ajax({ type: "GET",   
             url: "{{ url('getModels/') }}/"+id,   
             async: false,
             success : function(response)
             {
                 console.log(response);
             }
    });
}
</script>
</body>
</html>
