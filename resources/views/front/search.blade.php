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
                     <h3 class="panel-title">Keyword Search</h3>
                     <a href="#" class="sidenav-close">Close</a>
                  </div>
                  <div class="panel-body">
                     <div class="filter-search">
                        <input id="search-input" class="autocomplete" type="text" placeholder="Search here.." />
                        <button id="search-submit" type="submit" class="btn waves-effect waves-light filter-btn"><i class="fa fa-search" style="font-size: 1.8rem;"></i></button>
                     </div>
                  </div>
               </div>
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
                           <a href="#" class="applied-remove"><i class="fa fa-times"></i></a>
                        </li>
                        @endforeach
                     </ul>
                  </div>
               </div>
               <!-- panel end -->
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
               @if(isset($sidebar_data["makes"]))
               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Select Make</h3>
                  </div>
                  <div class="panel-body">
                     <ul id="makes-list" class="link-list">
                        @foreach($sidebar_data["makes"] as $make)
                        <li><a href="{{Request::url()}}/make-{{$make->make_name}}">{{ strtoupper($make->make_name) }} ({{$make->make_count}})</a></li>
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
                     <ul id="models-list"  class="link-list">
                        @foreach($sidebar_data["models"] as $model)
                        <li><a href="{{Request::url()}}/model-{{$model->model_name}}">{{$model->model_name}} ({{$model->model_count}})</a></li>
                        @endforeach
                     </ul>
                  </div>
               </div>
               @endif
               <!-- panel end -->

               <!-- panel start -->
               @if(isset($sidebar_data["body_styles"]))
               <div class="panel">
                  <div class="panel-heading">
                     <h3 class="panel-title">Select Body Style</h3>
                  </div>
                  <div class="panel-body">
                     <ul class="link-list">
                        @foreach($sidebar_data["body_styles"] as $body)
                        <li><a href="{{Request::url()}}/body-{{$body->body_style_group_name}}">{{$body->body_style_group_name}} ({{$body->body_count}})</a></li>
                        @endforeach
                     </ul>
                  </div>
               </div>
               @endif
               <!-- panel end -->

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

               <!-- Alert start -->
               <div class="alert" role="alert"> {{ $vehicles->total() }} Vehicles were found with the given criteria</div>
               <!-- Alert end -->
               <!-- Filter start -->
               <div class="filter-container">
                  <div class="filter-box">Sort By</div>
                  <div class="filter-box">Year<a id="year-asc" href="#" class="up"></a><a id="year-desc" href="#" class="down"></a></div>
                  <div class="filter-box">Make<a id="make_name-asc" href="#" class="up"></a><a id="make_name-desc" href="#" class="down"></a></div>
                  <div class="filter-box">Model<a id="model_name-asc" href="#" class="up"></a><a id="model_name-desc" href="#" class="down"></a></div>
                  <div class="filter-box">Price<a id="price-asc" href="#" class="up"></a><a id="price-desc" href="#" class="down"></a></div>
               </div>
               <!-- Filter end -->
               <!-- Result Container start -->
               <div class="result-container">
                  @foreach($vehicles as $vehicle)
                  <div class="item">
                     <a href="{{ url('/')}}/used/{{$vehicle->slug}}">
                     <div class="item-heading">
                        <h3 class="item-title">{{$vehicle->year}} {{$vehicle->make->make_name}} {{$vehicle->model->model_name}} - {{$vehicle->user->city->city_name or ''}}, {{$vehicle->user->province->province_name or ''}}</h3>
                     </div>
                     </a>
                     <div class="item-body">
                        <div class="item-body-left">
                           <a href="{{ url('/')}}/used/{{$vehicle->slug}}">
                           <img src="{{$vehicle->photo()}}" alt="" />
                           <span class="overlay"></span>
                           </a>
                        </div>
                        <div class="item-body-right">
                           <div class="item-body-right-upper">
                              <div class="item-detail">
                                 {{-- <div class="item-detail-left"><img src="/assets/images/placeholder.jpg" alt="" /></div> --}}
                                 <div class="item-detail-right">
                                    <p>{{$vehicle->user->city->city_name or ''}}, {{$vehicle->user->province->province_name or ''}}</p>
                                    <p>Added {{$vehicle->created_at->diffForHumans()}}</p>
                                    <p>{{$vehicle->bodyStyleGroup->body_style_group_name or ''}} <span class="part">|</span> {{$vehicle->ext_color->color or ''}} <span class="part">|</span> {{$vehicle->transmission}}</p>
                                 </div>
                              </div>
                           </div>
                           <div class="item-body-right-lower">
                              <ul class="item-stats">
                                 <li>
                                    <div><i class="fa fa-tag"></i> ${{$vehicle->price}}</div>
                                 </li>
                                 <li>
                                    <div><i class="fa fa-dashboard"></i> {{$vehicle->odometer}}KM</div>
                                 </li>

                                 <li>
                                    <div><i class="fa fa-phone"></i>
                                    <p>1-855-227-1669</p>
                                    </div>
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
            </div>
         </div>
      </div>
   </div>
   <!-- Main Container End -->
</div>
<script type="text/javascript">
   //preset price, odometer, year
   @php $price = $applied_filters->get("price"); @endphp
   var price_all = '{{ $price or '0-60000' }}';
   var price = price_all.split("-");
   @php $odometer = $applied_filters->get("odometer"); @endphp
   var odometer_all = '{{ $odometer or '0-80000' }}';
   var odometer = odometer_all.split("-");
   @php $year = $applied_filters->get("year"); @endphp
   var year_all = '{{ $year or '2000-2017' }}';
   var year = year_all.split("-");
</script>
<!-- main container outer end -->
@endsection
@section('javascript')
<script type="text/javascript">
   // Filter remove
   $('.applied-remove').on('click',function(event){
     event.preventDefault ? event.preventDefault() : (event.returnValue = false)
     $('.result-container').css({opacity:0.2}).before('<div class="progress"><div class="indeterminate"></div></div>')
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
             var pathname = '{{ url('/') }}/search/'+data;
             window.location.href = pathname.replace(/\/$/, ""); // remove trailing slash and redirect
          }
       });
   })
   
   //set price
   $('#price-filter').on('click',function(e){
     min = $('#min-price').html().replace(',', '');
     max = $('#max-price').html().replace(',', '');
     $.get( "{{ url('/') }}/setSessionKeyValue/price/"+min+'-'+max, function( data ) {
     location.reload();
     });
     
   });
   //set odometer
   $('#odometer-filter').on('click',function(e){
     min = $('#min-odometer').html().replace(',', '');
     max = $('#max-odometer').html().replace(',', '');
     $.get( "{{ url('/') }}/setSessionKeyValue/odometer/"+min+'-'+max, function( data ) {
       location.reload();
     });
   });
   //set YEAR
   $('#year-filter').on('click',function(e){
     min = $('#min-year').html().replace(',', '');
     max = $('#max-year').html().replace(',', '');
     $.get( "{{ url('/') }}/setSessionKeyValue/year/"+min+'-'+max, function( data ) {
       location.reload();
     });
   });
   //set sorting
   $('.filter-box a').on('click',function(e){
     e.preventDefault();
     $.get( "{{ url('/') }}/setSessionKeyValue/sort/"+$(this).attr('id'), function( data ) {
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

    //Seller
    $('input[name=seller]').change(function() { 
      $.get( "/setSessionKeyValue/seller/"+this.value, function( data ) {
       location.reload();
       });
    });

   //Image on error code with support edge browser
   $(document).ready(function(){  
     $("img").each(function(i,ele){
         $("<img/>").attr("src",$(ele).attr("src")).on('error', function() {             
            $(ele).attr( "src", "/assets/images/placeholder.jpg" );
         })
      });
     
      $("img").on("error", function(){      
         $(this).attr( "src", "/assets/images/placeholder.jpg" );  
      });

      $.get( "{{ url('/') }}/search-list", function( data ) {
        var list={};
        $.each(JSON.parse(data), function(index, row){
            list[row] = null;
        })
        $('input.autocomplete').autocomplete({

          data: list,
          limit: 5, // The max amount of results that can be shown at once. Default: Infinity.
          minLength: 3, // The minimum length of the input for the autocomplete to start. Default: 1.
        });
      });

      $('#search-input').keypress(function(e) {
          if(e.which == 13) {
            e.preventDefault();
            $('#search-submit').click();
          }
      });

      $('#search-submit').on('click',function(e){
        $('.result-container').css({opacity:0.2}).before('<div class="progress"><div class="indeterminate"></div></div>')
        $.ajax({
           url: '{{ url('/') }}/searchterm',
           type: 'GET',
           data: 'search_text='+$('#search-input').val()+'&_token={{ csrf_token() }}',
           success: function(response) {
               window.location.href = "{{ url('/') }}/search/"+response.link;
           }
       });
      });
      

      

  });
   
</script>
@endsection