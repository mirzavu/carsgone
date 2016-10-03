@extends('layouts.main')
@section('title', 'Carsgone')
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
                     <h3 class="panel-title">Quick Search</h3>
                  </div>
                  <div class="panel-body">
                     <div class="filter-dropdown">
                        <select id="make-select" name="make">
                           <option value="" disabled selected>Select Make</option>
                           @foreach ($makes as $make)
                           <option value="{{$make['id']}}">{{$make['make_name']}}</option>
                           @endforeach
                        </select>
                        <select id="model-select" name="model">
                           <option value="" disabled selected>Select Model</option>
                        </select>
                        <a id="quick_search" class="waves-effect waves-light btn">Search</a>
                     </div>
                  </div>
               </div>
               <!-- panel end -->
               <!-- panel start -->
               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Filters Applied</h3>
                  </div>
                  <div class="panel-body">
                     <ul class="applied-list">
                        @foreach ($applied_filters->all() as $key => $value)
                        @if($key=="distance") 
                        @php $value = (int)$value / 100 . " Km"; @endphp
                        @endif
                        <li>
                           <span>{{$key.' : '.$value}}</span>
                           <a href="#" class="applied-remove">x</a>
                        </li>
                        @endforeach
                     </ul>
                  </div>
               </div>
               <!-- panel end -->
               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Distance within</h3>
                  </div>
                  <div class="panel-body">
                     <ul class="link-list distance-list">
                        <li><a id="20000" href="#">200 Km</a></li>
                        <li><a id="30000" href="#">300 Km</a></li>
                        <li><a id="40000" href="#">400 Km</a></li>
                        <li><a id="50000" href="#">500 Km</a></li>
                     </ul>
                  </div>
               </div>
               <!-- panel end -->
               @if(!$applied_filters->has("condition"))
               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Condition</h3>
                  </div>
                  <div class="panel-body">
                     <div class="item-type-toggle">
                        <input type="radio" name="condition" id="used" value="used" {{$applied_filters->get("condition")=="used"?'checked="checked"':""}}"/> <label for="used" class="waves-effect waves-light">USED</label>
                        <input type="radio" name="condition" id="both" value="both" {{$applied_filters->has("condition")?"":'checked="checked"'}}" /> <label for="both" class="waves-effect waves-light"> BOTH</label>
                        <input type="radio" name="condition" id="new" value="new" {{$applied_filters->get("condition")=="new"?'checked="checked"':""}}"/> <label for="new" class="waves-effect waves-light">NEW</label>
                     </div>
                  </div>
               </div>
               @endif
               <!-- panel start -->
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
               @if(isset($sidebar_data["makes"]))
               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Select Make</h3>
                  </div>
                  <div class="panel-body">
                     <ul class="link-list">
                        @foreach($sidebar_data["makes"] as $make)
                        <li><a href="{{Request::url()}}/make-{{$make->make_name}}">{{$make->make_name}} ({{$make->make_count}})</a></li>
                        @endforeach
                     </ul>
                  </div>
               </div>
               @endif
               <!-- panel end -->
               <!-- panel start -->
               @if(isset($sidebar_data["models"]))
               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Select Model</h3>
                  </div>
                  <div class="panel-body">
                     <ul class="link-list">
                        @foreach($sidebar_data["models"] as $model)
                        <li><a href="{{Request::url()}}/model-{{$model->model_name}}">{{$model->model_name}} ({{$model->vehicles_count}})</a></li>
                        @endforeach
                     </ul>
                  </div>
               </div>
               @endif
               <!-- panel end -->
               
               @if(!$applied_filters->has("transmission"))
               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Transmission</h3>
                  </div>
                  <div class="panel-body">
                     <div class="item-type-toggle">
                        <input type="radio" name="transmission" id="manual" value="manual" {{$applied_filters->get("transmission")=="manual"?'checked="checked"':""}}"/> <label for="manual" class="waves-effect waves-light">MANUAL</label>
                        <input type="radio" name="transmission" id="both-transmission" value="both" {{$applied_filters->has("transmission")?"":'checked="checked"'}}" /> <label for="both-transmission" class="waves-effect waves-light"> BOTH</label>
                        <input type="radio" name="transmission" id="auto" value="auto" {{$applied_filters->get("transmission")=="auto"?'checked="checked"':""}}"/> <label for="auto" class="waves-effect waves-light">AUTO</label>
                     </div>
                  </div>
               </div>
               @endif
               <!-- panel start -->
               
               <!-- price panel start -->
               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Filter by Price</h3>
                  </div>
                  <div class="panel-body">
                     <div class="price-range-container">
                        <div id="price-range" class="filter-margin"></div>
                        <button type="submit" id="price-filter" class="waves-effect waves-light btn">FILTER</button>
                        <p class="price-range-output">
                           <span>$<b id="min-price"></b></span> &mdash;
                           <span>$<b id="max-price"></b></span>
                        </p>
                     </div>
                  </div>
               </div>
               <!-- panel end -->
               <!-- Odometer panel start -->
               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Filter by Odometer</h3>
                  </div>
                  <div class="panel-body">
                     <div class="price-range-container">
                        <div id="odometer-range" class="filter-margin"></div>
                        <button id="odometer-filter" class="waves-effect waves-light btn">FILTER</button>
                        <p class="price-range-output">
                           <span><b id="min-odometer"></b>Km</span> &mdash;
                           <span><b id="max-odometer"></b>Km</span>
                        </p>
                     </div>
                  </div>
               </div>
               <!-- panel end -->

               <!-- Year panel start -->
               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Filter by Year</h3>
                  </div>
                  <div class="panel-body">
                     <div class="price-range-container">
                        <div id="year-range" class="filter-margin"></div>
                        <button id="year-filter" class="waves-effect waves-light btn">FILTER</button>
                        <p class="price-range-output">
                           <span><b id="min-year"></b></span> &mdash;
                           <span><b id="max-year"></b></span>
                        </p>
                     </div>
                  </div>
               </div>
               <!-- panel end -->

            </div>
            <!-- Sidebar end -->

            <!-- Main Container Start -->
            <div class="main-container fix-content">
               <!-- Featured Container start -->
               @if($featured_vehicles->count())
               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Our Featured List</h3>
                  </div>
                  <div class="panel-body">
                     <div class="featured-list featured-slider">
                        @foreach($featured_vehicles as $vehicle)
                        <!-- fetured-box start -->
                        <div>
                           <div class="fetured-box">
                              <a href="#">
                                 <h4>{{$vehicle->make->make_name}} {{$vehicle->model->model_name}}</h4>
                                 <div class="featured-img">
                                    <img src="/assets/images/item-img.jpg" alt="" />
                                    <span class="overlay"></span>
                                 </div>
                                 <div class="featured-details">
                                    <div class="price"><i class="fa fa-tag"></i> ${{number_format($vehicle->price)}}</div>
                                    <div class="run"><i class="fa fa-dashboard"></i> {{number_format($vehicle->odometer)}}KM</div>
                                 </div>
                              </a>
                           </div>
                        </div>
                        @endforeach
                        <!-- fetured-box end -->
                     </div>
                  </div>
               </div>
               @endif
               <!-- Featured Container end -->
               <!-- Alert start -->
               <div class="alert" role="alert"> {{ $vehicles->total() }} Vehicles were found with the given criteria</div>
               <!-- Alert end -->
               <!-- Filter start -->
               <div class="filter-container">
                  <div class="filter-box">Sort By</div>
                  <div class="filter-box">Date<a id="created_at-asc" href="#" class="up"></a><a id="created_at-desc" href="#" class="down"></a></div>
                  <div class="filter-box">Price<a id="price-asc" href="#" class="up"></a><a id="price-desc" href="#" class="down"></a></div>
                  <div class="filter-box">Odometer<a id="odometer-asc" href="#" class="up"></a><a id="odometer-desc" href="#" class="down"></a></div>
                  <div class="filter-box">Year<a id="year-asc" href="#" class="up"></a><a id="year-desc" href="#" class="down"></a></div>
               </div>
               <!-- Filter end -->
               <!-- Result Container start -->
               <div class="result-container">
                  @foreach($vehicles as $vehicle)
                  <div class="item">
                     <a href="/vehicle/{{$vehicle->slug}}">
                     <div class="item-heading">
                        <h3 class="item-title">{{$vehicle->year}} {{$vehicle->make->make_name}} {{$vehicle->model->model_name}} - {{$vehicle->dealer->city->city_name}}, {{$vehicle->dealer->province->province_name}}</h3>
                     </div>
                     </a>
                     <div class="item-body">
                        <div class="item-body-left">
                           <a href="#">
                           <img src="{{$vehicle->photo()}}" alt="" />
                           <span class="overlay"></span>
                           </a>
                        </div>
                        <div class="item-body-right">
                           <div class="item-body-right-upper">
                              <div class="item-detail">
                                 <div class="item-detail-left"><img src="/assets/images/placeholder.jpg" alt="" /></div>
                                 <div class="item-detail-right">
                                    <h6>{{$vehicle->dealer->city->city_name}}, {{$vehicle->dealer->province->province_name}}  <span class="part">|</span>  <small>{{$vehicle->created_at->diffForHumans()}}</small></h6>
                                    <p>{{$vehicle->bodyStyleGroup->body_style_group_name}} <span class="part">|</span> {{$vehicle->ext_color->color}} <span class="part">|</span> {{$vehicle->transmission}}</p>
                                 </div>
                              </div>
                           </div>
                           <div class="item-body-right-lower">
                              <h5>{{$vehicle->dealer->name}}</h5>
                              <ul class="item-stats">
                                 <li>
                                    <div><i class="fa fa-tag"></i> ${{number_format($vehicle->price)}}</div>
                                 </li>
                                 <li>
                                    <div><i class="fa fa-dashboard"></i> {{number_format($vehicle->odometer)}}KM</div>
                                 </li>
                                 <li>
                                    <div><i class="fa fa-phone"></i> (403) 945-8808</div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
               </div>
               <!-- Result Container end -->  
               <!-- Pagination Container end -->    
               {{ $vehicles->links() }}
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
             var pathname = '/search/'+data;
             window.location.href = pathname.replace(/\/$/, ""); // remove trailing slash and redirect
          }
       });
   })
   
   //set price
   $('#price-filter').on('click',function(e){
     min = $('#min-price').html().replace(',', '');
     max = $('#max-price').html().replace(',', '');
     $.get( "/setSessionKeyValue/price/"+min+'-'+max, function( data ) {
     location.reload();
     });
     
   });
   //set odometer
   $('#odometer-filter').on('click',function(e){
     min = $('#min-odometer').html().replace(',', '');
     max = $('#max-odometer').html().replace(',', '');
     $.get( "/setSessionKeyValue/odometer/"+min+'-'+max, function( data ) {
       location.reload();
     });
   });
   //set YEAR
   $('#year-filter').on('click',function(e){
     min = $('#min-year').html().replace(',', '');
     max = $('#max-year').html().replace(',', '');
     $.get( "/setSessionKeyValue/year/"+min+'-'+max, function( data ) {
       location.reload();
     });
   });
   //set sorting
   $('.filter-box a').on('click',function(e){
     e.preventDefault();
     $.get( "/setSessionKeyValue/sort/"+$(this).attr('id'), function( data ) {
       location.reload();
     });
   });
   if('{{$sort}}'=='')
     $('#created_at-desc').addClass('active');
   else
     $('#{{$sort}}').addClass('active');
   //condition on change
   $('input[name=condition]').change(function() { 
         window.location.href += '/condition-'+this.value;
       });
   //transmission
    $('input[name=transmission]').change(function() { 
      $.get( "/setSessionKeyValue/transmission/"+this.value, function( data ) {
       location.reload();
       });
    });
   //distance set
   $('.distance-list #{{$applied_filters->get("distance")}}').addClass('active').removeAttr("href");
   $('.distance-list a').on('click',function(e){
     e.preventDefault();
     $.get( "/setSessionKeyValue/distance/"+$(this).attr('id'), function( data ) {
       location.reload();
     });
   });

   $('img').one('error', function() { this.src = '/assets/images/placeholder.jpg'; });
   
   
   
</script>
@endsection