@extends('layouts.main')
@section('content')
<!-- Vehicle Post start -->
<div class="vehicle-post-outer">
   <div class="container">
      <div class="wrapper">
         <div class="dealer-info">
            <div class="panel full">
               <div class="panel-heading">
                  <h1>SELL YOUR VEHICLE</h1>
               </div>
               <div class="panel-body">
                  {!! $content !!}
                  <div style="text-align: center;">
                  <a href="https://www.edmontonautoloans.com/buy/post" class="waves-effect waves-light btn">Create Post</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Vehicle Post end -->
@endsection
@section('javascript')

@endsection