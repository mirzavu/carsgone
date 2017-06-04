@extends('layouts.main')

@section('content')
<!-- approval start -->
<div class="approval-outer">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
            	<div class="approval">
                	<h3>100% credit acceptance</h3>
                    <h4>Pre Approved if you:</h4>
                    <ul class="reqiured-list">
                    	<li>LIVE IN CANADA</li>
                        <li>ARE 18 OR OLDER</li>
                        <li>EARN MIN $1500 /MO</li>
                    </ul>
                    <div class="approval-link">
                    	<a href="/credit-application" class="waves-effect waves-light btn btn-orange">Get Approved Now</a>
                        <p class="clock">Easy 60-Second Application</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- approval end -->

<!-- Autoloan start -->
<div class="canadian-autoloan">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
            	<div class="panel full">
                	<div class="panel-heading">
                    	<h1>Canadian Auto Loans</h1>
                    </div>
                    <div class="panel-body">
                    	<h3>Select the Location Nearest You</h3>
                        <div class="popular-container autoloan-list">
                        	<div class="row">
                                <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
                                    <a href="{{ url('autoloans/alberta-auto-loans') }}"><h4>Alberta Auto Loans</h4></a>
                                    <ul class="popular-item-list">
                                        <li><a href="{{ url('autoloans/edmonton-alberta-auto-loans') }}"><h6>Edmonton Auto Loans</h6></a></li>
                                        <li><a href="{{ url('autoloans/calgary-auto-loans') }}"><h6>Calgary Auto Loans</h6></a></li>
                                        <li><a href="{{ url('autoloans/red-deer-alberta-auto-loans') }}"><h6>Red Deer Auto Loans</h6></a></li>
                                        <li><a href="{{ url('autoloans/hinton-alberta-auto-loans') }}"><h6>Hinton Auto Loans</h6></a></li>
                                    </ul>
                                    <a href="{{ url('autoloans/manitoba-auto-loans') }}"><h4>MANITOBA AUTO LOANS</h4></a>
                                    <ul class="popular-item-list">
                                        <li><a href="{{ url('autoloans/winnipeg-manitoba-auto-loans') }}"><h6>Winnipeg Auto Loans</h6></a></li>
                                    </ul>
                                    <a href="{{ url('autoloans/nova-scotia-auto-loans') }}"><h4>NOVA SCOTIA AUTO LOANS</h4></a>
                                    <ul class="popular-item-list">
                                        <li><a href="{{ url('autoloans/halifax-nova-scotia-auto-loans') }}"><h6>Halifax Auto Loans</h6></a></li>
                                    </ul>
                                    <a href="{{ url('autoloans/quebec-auto-loans') }}"><h4>QUEBEC AUTO LOANS</h4></a>
                                    <ul class="popular-item-list">
                                        <li><a href="{{ url('autoloans/montreal-quebec-auto-loans') }}"><h6>Montreal Auto Loans</h6></a></li>
                                    </ul>  
                                </div>
                                <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
                                    <a href="{{ url('autoloans/british-columbia-auto-loans') }}"><h4>BC Auto Loans</h4></a>
                                    <ul class="popular-item-list">
                                        <li><a href="{{ url('autoloans/kamloops-bc-auto-loans') }}"><h6>Kamloops Auto Loans</h6></a></li>
                                        <li><a href="{{ url('autoloans/kelowna-bc-auto-loans') }}"><h6>Kelowna Auto Loans</h6></a></li>
                                        <li><a href="{{ url('autoloans/nanaimo-bc-auto-loans') }}"><h6>Nanaimo Auto Loans</h6></a></li>
                                        <li><a href="{{ url('autoloans/vancouver-bc-auto-loans') }}"><h6>Vancouver Auto Loans</h6></a></li>
                                        <li><a href="{{ url('autoloans/victoria-bc-auto-loans') }}"><h6>Victoria Auto Loans</h6></a></li>
                                    </ul>
                                    
                                    <a href="{{ url('autoloans/new-brunswick-auto-loans') }}"><h4>NEW BRUNSWICK AUTO LOANS</h4></a>
                                    <ul class="popular-item-list">
                                        <li><a href="{{ url('autoloans/moncton-new-brunswick-auto-loans') }}"><h6>Moncton Auto Loans</h6></a></li>
                                    </ul>
                                    <a href="{{ url('autoloans/newfoundland-labrador-auto-loans') }}"><h4>NEWFOUNDLAND AUTO LOANS</h4></a>
                                    <ul class="popular-item-list">
                                        <li><a href="{{ url('autoloans/st-johns-newfoundland-labrador-auto-loans') }}"><h6>St. John's Auto Loans</h6></a></li>
                                    </ul>
                                    
                                    
                                    
                                </div>
                                <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
                                    <a href="{{ url('autoloans/ontario-auto-loans') }}"><h4>ONTARIO AUTO LOANS</h4></a>
                                    <ul class="popular-item-list">
                                        <li><a href="{{ url('autoloans/hamilton-ontario-auto-loans') }}"><h6>Hamilton Auto Loans</h6></a></li>
                                        <li><a href="{{ url('autoloans/kitchener-ontario-auto-loans') }}"><h6>Kitchener Auto Loans</h6></a></li>
                                        <li><a href="{{ url('autoloans/london-ontario-auto-loans') }}"><h6>London Auto Loans</h6></a></li>
                                        <li><a href="{{ url('autoloans/ottawa-ontario-auto-loans') }}"><h6>Ottawa Auto Loans</h6></a></li>
                                        <li><a href="{{ url('autoloans/toronto-ontario-auto-loans') }}"><h6>Toronto Auto Loans</h6></a></li>
                                    </ul>
                                    <a href="{{ url('autoloans/prince-edward-island-auto-loans') }}"><h4>P E I AUTO LOANS</h4></a>
                                    <ul class="popular-item-list">
                                        <li><a href="{{ url('autoloans/charlottetown-pei-auto-loans') }}"><h6>Charlottetown Auto Loans</h6></a></li>
                                    </ul> 
                                     
                                    <a href="{{ url('autoloans/saskatchewan-auto-loans') }}"><h4>SASKATCHEWAN AUTO LOANS</h4></a>
                                    <ul class="popular-item-list">
                                        <li><a href="{{ url('autoloans/regina-saskatchewan-auto-loans') }}"><h6>Regina Auto Loans</h6></a></li>
                                        <li><a href="{{ url('autoloans/saskatoon-saskatchewan-auto-loans') }}"><h6>Saskatoon Auto Loans</h6></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Autoloan end -->

<!-- Autoloan Description Start -->
<div class="autoloan-desc">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
            	<div class="panel full">
                    <div class="panel-body auto-desc">
                    	<div class="excerpt">
                        <p>Looking for a new or used <strong>car loan in Canada?</strong> Save time at the dealership and have your used or new auto loan pre-approved. Whether you have great credit, are working towards overcoming financial challenges, or just getting started with your first auto loan, automotive finance professionals are ready to get you into a new or pre-owned car today. Finance a vehicle from a franchised dealership or apply for a private auto loan - the choice is yours.</p>
                        <p>Apply now, and get pre-approved for financing, or browse through the new and used vehicle brochure pages and find the car, truck, SUV or van you have been looking for. You can finance any vehicle, anywhere! Virtually and type of credit is approved! Competitive auto loan rates for all levels of financial status and credit standings. If you see a privately listed vehicle on the web site you are interested in buying, you can have it financed as well.</p>
                        
                        <p>Apply now, and get pre-approved for financing, or browse through the new and used vehicle brochure pages and find the car, truck, SUV or van you have been looking for. You can finance any vehicle, anywhere! Virtually and type of credit is approved! Competitive auto loan rates for all levels of financial status and credit standings. If you see a privately listed vehicle on the web site you are interested in buying, you can have it financed as well.</p>
                        </div>
                        <a href="#" class="waves-effect waves-light btn">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
@endsection