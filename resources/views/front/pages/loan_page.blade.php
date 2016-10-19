@extends('layouts.main')

@section('title', 'Auto Loans')

@section('content')
<!-- approval start -->
<div class="approval-outer">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
            	<div class="approval">
                	<img src="/assets/images/approval-image.png" alt="" />
                    <h4>if you meet these 3 requirements, you're approved:</h4>
                    <ul class="reqiured-list">
                    	<li>Canadian citizen</li>
                        <li>At least 18 years old</li>
                        <li>Currently Employed</li>
                    </ul>
                    <div class="approval-link">
                    	<a href="#" class="waves-effect waves-light btn btn-orange">Get Approved Now</a>
                        <p class="clock">Easy 60-Second Application</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- approval end -->



<!-- Autoloan Description Start -->
<div class="autoloan-desc">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
            	<div class="panel full">
                    <div class="panel-heading">
                        <h2>{{$title}}</h2>
                    </div>
                    <div class="panel-body auto-desc">
                    	<div class="excerpt">
                        {!! $content !!}
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