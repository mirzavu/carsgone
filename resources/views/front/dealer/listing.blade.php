@extends('layouts.main')
@section('title', 'Dealer Listing')
@section('content')
<div class="main-container-outer">
   <div class="container">
      <div class="row">
         <div class="col-sm-12">
            <a href="#" class="slide-nav"><i class="fa fa-filter" aria-hidden="true"></i> Filter</a>
            <!-- Sidebar Start -->
            <div class="sidebar fix-sidebar">
               <!-- panel start -->
               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Filters Applied</h3>
                  </div>
                  <div class="panel-body">
                     <ul class="applied-list">
                        @foreach ($applied_filters->all() as $key => $value)
                        <li>
                           <span>{{$key.' : '.$value}}</span>
                           <a href="#" class="applied-remove">x</a>
                        </li>
                        @endforeach
                     </ul>
                  </div>
               </div>

               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Postal Code</h3>
                  </div>
                  <div class="panel-body">
                     <div class="filter-search">
                        <input type="text"  value="" placeholder="Enter Postal Code.." />
                        <input type="submit" value="Go" class="btn waves-effect waves-light filter-btn" />
                     </div>
                  </div>
               </div>
               <!-- panel end -->
               <!-- panel start -->
               @if(isset($sidebar_data["provinces"]))
               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Select Province</h3>
                  </div>
                  <div class="panel-body">
                     <ul class="link-list">
                        @foreach($sidebar_data["provinces"] as $province)
                        <li><a href="{{Request::url()}}/province-{{$province->province_name}}">{{$province->province_name}} ({{$province->province_count}})</a></li>
                        @endforeach
                     </ul>
                  </div>
               </div>
               @endif
               <!-- panel end -->
               <!-- panel start -->
               @if(isset($sidebar_data["cities"]))
               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Select City</h3>
                  </div>
                  <div class="panel-body">
                     <ul class="link-list">
                        @foreach($sidebar_data["cities"] as $city)
                        <li><a href="{{Request::url()}}/city-{{$city->city_name}}">{{$city->city_name}} ({{$city->city_count}})</a></li>
                        @endforeach
                     </ul>
                  </div>
               </div>
               @endif

            </div>
            <!-- Sidebar end -->

            <!-- Main Container Start -->
            <div class="main-container fix-content">

               <!-- Alert start -->
               <div class="alert" role="alert"> {{ $dealers->total() }} Dealers were found with the given criteria</div>
               <!-- Alert end -->
               <!-- Filter start -->
               <div class="filter-container">
                  <div class="filter-box">Sort By</div>
                  <div class="filter-box">Name<a id="name-asc" href="#" class="up"></a><a id="name-desc" href="#" class="down"></a></div>
               </div>
               <!-- Filter end -->
               <!-- Result Container start -->
               <div class="result-container">
                  @foreach($dealers as $dealer)
                  <div class="item">
                     <a href="/dealer/{{$dealer->slug}}">
                     <div class="item-heading">
                        <h3 class="item-title">{{$dealer->name}}</h3>
                     </div>
                     </a>
                     <div class="item-body">
                        <div class="item-body-left">
                           <a href="/vehicle/{{$dealer->slug}}">
                           <img src="{{$dealer->image}}" alt="" />
                           <span class="overlay"></span>
                           </a>
                        </div>
                        <div class="item-body-right">
                           <div class="item-body-right-upper">
                              <div class="item-detail">
                                 <div class="item-detail-left"><img src="/assets/images/placeholder.jpg" alt="" /></div>
                                 <div class="item-detail-right">
                                    <h6>{{$dealer->city->city_name}}, {{$dealer->province->province_name}} </h6>
                                    <p>{{$dealer->address}} <span class="part">|</span> {{$dealer->phone}} <span class="part">|</span></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
               <!-- Result Container end -->  
               <!-- Pagination Container end -->    
               {{ $dealers->links() }}
               {{--                  
               <div class="pagination-container">
                  <ul class="pagination">
                     <li><a href="#">&lt;</a></li>
                     <li><a href="#" class="active">1</a></li>
                     <li><a href="#">2</a></li>
                     <li><a href="#">3</a></li>
                     <li><a href="#">&gt;</a></li>
                  </ul>
               </div>
               --}}
               <!-- Pagination Container end -->  
            </div>
         </div>
      </div>
   </div>
   <!-- Main Container End -->
</div>
<!-- main container outer end -->
@endsection
@section('javascript')
<script type="text/javascript">

   $('.applied-remove').on('click',function(e){
     e.preventDefault();
     data = $(this).prev().html();
     //console.log(data);
     $(this).parent().hide('slow');
       $.ajax({ type: "GET",   
          url: "{{ url('removeFilter/') }}/"+data+'|{{$url_params}}',   
          accepts: {
             text: "application/json"
         },
          async: false,
          success : function(data)
          {  
             var pathname = '/auto-dealers/'+data;
             console.log(pathname);
             window.location.href = pathname.replace(/\/$/, ""); // remove trailing slash and redirect
          }
       });
   })

   //set sorting
   $('.filter-box a').on('click',function(e){
     e.preventDefault();
     $.get( "/setSessionKeyValue/dealer_sort/"+$(this).attr('id'), function( data ) {
       location.reload();
     });
   });
   if('{{$dealer_sort}}'=='')
     $('#name-asc').addClass('active');
   else
     $('#{{$dealer_sort}}').addClass('active');

   //if image error
   $('img').one('error', function() { this.src = '/assets/images/placeholder.jpg'; });
   
</script>
@endsection