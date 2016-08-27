@extends('layouts.main')

@section('title', 'Carsgone')

@section('content')

<div class="main-container-outer">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
          
    <a href="#" class="slide-nav"><i class="fa fa-filter" aria-hidden="true"></i> Filter</a>
          
            <!-- Sidebar Start -->
            	<div class="sidebar">
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
                          @foreach ($conditions->all() as $key => $value)
                            <li>
                              <span>{{$key.' : '.$value}}</span>
                              <a href="#" class="applied-remove">x</a>
                            </li>
                          @endforeach
                          </ul>
                        </div>
                      </div>
                  <!-- panel end -->
                  
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
                	<div class="panel">
                        <div class="panel-heading">
                          <h3 class="panel-title">Checkboxes</h3>
                        </div>
                        <div class="panel-body">
                        	<ul class="checklist">
                            	<li>
                                	 <input type="checkbox" id="location1" />
                                      <label for="location1">Location</label>
                                </li>
                                <li>
                                	<input type="checkbox" id="location2" />
      						        <label for="location2">Location</label>
                                </li>
                                <li>
                                	<input type="checkbox" id="location3" />
      						        <label for="location3">Location</label>
                                </li>
                                 <li>
                                	<input type="checkbox" id="location4" />
      						        <label for="location4">Location</label>
                                </li>
                                 <li>
                                	<input type="checkbox" id="location5" />
      						        <label for="location5">Location</label>
                                </li>
                            </ul>
                            </div>
                      </div>
                  <!-- panel end -->
                  
                  
                  <!-- panel start -->
                	<div class="panel">
                        <div class="panel-heading">
                          <h3 class="panel-title">Filter by Price</h3>
                        </div>
                        <div class="panel-body">
                           <div class="price-range-container">
                           	 <div id="price-range"></div>
                                <a class="waves-effect waves-light btn">FILTER</a>
                                <p class="price-range-output">
                                	<span>$<b id="min-price"></b></span> &mdash;
                                    <span>$<b id="max-price"></b></span>
                                </p>
 							 </div>
                        </div>
                      </div>
                  <!-- panel end -->
               </div>
         <!-- Sidebar end -->
         <!-- Main Container Start -->
            	<div class="main-container">
                	<!-- Featured Container start -->
                	<div class="panel">
                        <div class="panel-heading">
                          <h3 class="panel-title">Our Featured List</h3>
                        </div>
                        <div class="panel-body">
                          <div class="featured-list featured-slider">
                          	<!-- fetured-box start -->
                            <div>
                          	<div class="fetured-box">
                            <a href="#">
                            	<h4>AIRIDE HONDA</h4>
                                <div class="featured-img">
                                	<img src="/assets/images/item-img.jpg" alt="" />
                                    <span class="overlay"></span>
                                </div>
                                <div class="featured-details">
                                	<div class="price"><i class="fa fa-tag"></i> $40,900</div>
                                    <div class="run"><i class="fa fa-dashboard"></i> 62,768KM</div>
                                </div>
                                
                                </a>
                            </div>
                            </div>
                            <!-- fetured-box end -->
                            
                            <!-- fetured-box start -->
                            <div>
                          	<div class="fetured-box">
                            <a href="#">
                            	<h4>AIRIDE HONDA</h4>
                                <div class="featured-img">
                                	<img src="/assets/images/item-img.jpg" alt="" />
                                    <span class="overlay"></span>
                                </div>
                                <div class="featured-details">
                                	<div class="price"><i class="fa fa-tag"></i> $40,900</div>
                                    <div class="run"><i class="fa fa-dashboard"></i> 62,768KM</div>
                                </div></a>
                            </div>
                            </div>
                            <!-- fetured-box end -->
                            <!-- fetured-box start -->
                            <div>
                          	<div class="fetured-box">
                            <a href="#">
                            	<h4>AIRIDE HONDA</h4>
                                <div class="featured-img">
                                	<img src="/assets/images/item-img.jpg" alt="" />
                                    <span class="overlay"></span>
                                </div>
                                <div class="featured-details">
                                	<div class="price"><i class="fa fa-tag"></i> $40,900</div>
                                    <div class="run"><i class="fa fa-dashboard"></i> 62,768KM</div>
                                </div></a>
                            </div>
                            </div>
                            <!-- fetured-box end -->
                            <!-- fetured-box start -->
                            <div>
                          	<div class="fetured-box">
                            <a href="#">
                            	<h4>AIRIDE HONDA</h4>
                                <div class="featured-img">
                                	<img src="/assets/images/item-img.jpg" alt="" />
                                    <span class="overlay"></span>
                                </div>
                                <div class="featured-details">
                                	<div class="price"><i class="fa fa-tag"></i> $40,900</div>
                                    <div class="run"><i class="fa fa-dashboard"></i> 62,768KM</div>
                                </div></a>
                            </div>
                            </div>
                            <!-- fetured-box end -->
                            <!-- fetured-box start -->
                            <div>
                          	<div class="fetured-box">
                            <a href="#">
                            	<h4>AIRIDE HONDA</h4>
                                <div class="featured-img">
                                	<img src="/assets/images/item-img.jpg" alt="" />
                                    <span class="overlay"></span>
                                </div>
                                <div class="featured-details">
                                	<div class="price"><i class="fa fa-tag"></i> $40,900</div>
                                    <div class="run"><i class="fa fa-dashboard"></i> 62,768KM</div>
                                </div></a>
                            </div>
                            </div>
                            <!-- fetured-box end -->
                              <!-- fetured-box start -->
                            <div>
                          	<div class="fetured-box">
                            <a href="#">
                            	<h4>AIRIDE HONDA</h4>
                                <div class="featured-img">
                                	<img src="/assets/images/item-img.jpg" alt="" />
                                    <span class="overlay"></span>
                                </div>
                                <div class="featured-details">
                                	<div class="price"><i class="fa fa-tag"></i> $40,900</div>
                                    <div class="run"><i class="fa fa-dashboard"></i> 62,768KM</div>
                                </div></a>
                            </div>
                            </div>
                            <!-- fetured-box end -->
                            
                            
                          </div>
                        </div>
                      </div>
                  <!-- Featured Container end -->
                  <!-- Alert start -->
                   <div class="alert" role="alert"> {{ $vehicles->total() }} Vehicles were found with the given criteria</div>
                 <!-- Alert end -->
                 
                 <!-- Filter start -->
                   <div class="filter-container">
                   		<div class="filter-box">Sort By</div>
                        <div class="filter-box">Date<a href="#" class="up"></a><a href="#" class="down active"></a></div>
                        <div class="filter-box">Price<a href="#" class="up"></a><a href="#" class="down"></a></div>
                        <div class="filter-box">Mileage<a href="#" class="up"></a><a href="#" class="down"></a></div>
                        <div class="filter-box">Make<a href="#" class="up"></a><a href="#" class="down"></a></div>
                   </div>
                 <!-- Filter end -->
                 
                <!-- Result Container start -->
                <div class="result-container">

                 @foreach($vehicles as $vehicle)
                    <div class="item">
                        <div class="item-heading">
                          <h3 class="item-title">{{$vehicle->year}} {{$vehicle->make->make_name}} {{$vehicle->model->model_name}} - {{$vehicle->dealer->city->city_name}}, {{$vehicle->dealer->province->province_name}}</h3>
                        </div>
                        <div class="item-body">
                        	<div class="item-body-left">
                            	<a href="#">
                                <img src="/assets/images/item.jpg" alt="" />
                                <span class="overlay"></span>
                                </a>
                            </div>
                            <div class="item-body-right">
                            	<div class="item-body-right-upper">
                                	<div class="item-detail">
                                    	<div class="item-detail-left"><img src="/assets/images/placeholder.jpg" alt="" /></div>
                                        <div class="item-detail-right">
                                        	<h6>{{$vehicle->dealer->city->city_name}}, {{$vehicle->dealer->province->province_name}}  <span class="part">|</span>  <small>{{$vehicle->created_at->diffForHumans()}}</small></h6>
                                            <p>{{$vehicle->bodyStyleGroup->body_style_group_name}} <span class="part">|</span> Grey <span class="part">|</span> Standard</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-body-right-lower">
                                	<h5>{{$vehicle->dealer->name}}</h5>
                                    <ul class="item-stats">
                                    	<li><div><i class="fa fa-tag"></i> ${{number_format($vehicle->price)}}</div></li>
                                        <li><div><i class="fa fa-dashboard"></i> {{number_format($vehicle->odometer)}}KM</div></li>
                                        <li><div><i class="fa fa-phone"></i> (403) 945-8808</div></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                  @endforeach
                  </div>
                <!-- Result Container end -->  
                <!-- Pagination Container end -->    
                 <div class="pagination-container">
                 	<ul class="pagination">
                        <li><a href="#">&lt;</a></li>
                        <li><a href="#" class="active">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">&gt;</a></li>
                      </ul>
                 </div>
               <!-- Pagination Container end -->  
                </div>
            </div>
        </div>
    </div>
    <!-- Main Container End -->
</div>
<!-- main container outer end -->

@endsection