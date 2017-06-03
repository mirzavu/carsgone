@extends('layouts.main')

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
                     <a href="#" class="sidenav-close"><i class="fa fa-times"></i></a>
                  </div>
                  <div class="panel-body">
                     <ul class="applied-list">
                        @foreach ($applied_filters->all() as $key => $value)
                        <li>
                           <span>{{$key.' : '.$value}}</span>
                           <a href="#" class="applied-remove"><i class="fa fa-times"></i></a>
                        </li>
                        @endforeach
                     </ul>
                  </div>
               </div>

               @if(!$applied_filters->has("search"))
               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Dealer Search</h3>
                  </div>
                  <div class="panel-body">
                     <div class="filter-search">
                        <input id="search-input" type="text" placeholder="Search here.." />
                        <input id="search-submit" type="submit" value="Go" class="btn waves-effect waves-light filter-btn" />
                     </div>
                  </div>
               </div>
               <!-- panel end -->
               @endif

               @if(!$applied_filters->has("province") && isset($location['place']))
               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Distance within</h3>
                  </div>
                  <div class="panel-body">
                     <ul class="link-list distance-list">
                        <li><a id="50" href="#">50 Km</a></li>
                        <li><a id="100" href="#">100 Km</a></li>
                        <li><a id="250" href="#">250 Km</a></li>
                        <li><a id="500" href="#">500 Km</a></li>
                        <li><a id="1000" href="#">1000 Km</a></li>
                        <li><a id="All" href="#">All</a></li>
                     </ul>
                  </div>
               </div>
               @endif
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
                     
                     <div class="item-heading">
                        <a href="/dealer/{{$dealer->slug}}">
                          <h3 class="item-title">{{$dealer->name}}</h3>
                        </a>
                        <div class="dealer-badge">
                            <span>{{$dealer->vehicles_count}} vehicles</span>
                        </div>
                     </div>
                     
                     <div class="item-body">
                        <div class="item-body-right">
                           <div class="item-body-right-upper">
                              <div class="item-detail">
                                 <div class="item-detail-left"><a href="/dealer/{{$dealer->slug}}"><img src="{{$dealer->image}}" alt="{{$dealer->name}}" /></a></div>
                                 <div class="item-detail-right">
                                    <h6>{{$dealer->city->city_name or ''}}, {{$dealer->province->province_name or ''}} </h6>
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

   // $('#postal-submit').on('click', function(){
   //    var postal = $('#postal-input').val()
   //    if(postal.length >7 || postal.length < 6)
   //      return false
   //    if(postal[3]!='')
   //    {
   //      postal = [postal.slice(0, 3), ' ', postal.slice(3)].join(''); //Insert Space if not present in middle
   //    }
   //    window.location.href = window.location.href+'/postal_code-'+postal
   // })

   //Dealer Search
   $('#search-submit').on('click', function(){
      var text = $('#search-input').val()
      window.location.href = window.location.href+'/search-'+text
   })

   //distance set
   var distance_id = "{{$applied_filters->get("distance")}}".replace(' KM',''); 
   if(distance_id)
   {
      $('.distance-list #'+distance_id).addClass('active').removeAttr("href"); // set active
      $('.distance-list a').on('click',function(e){
        e.preventDefault();
        $.get( "/setSessionKeyValue/distance/"+$(this).attr('id'), function( data ) {
          location.reload();
        });
      });
   }
   
</script>
@endsection