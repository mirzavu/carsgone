@extends('layouts.main')

@section('title', 'Carsgone')

@section('content')
<!-- Dashboard start -->
<div class="dashboard-outer">
   <div class="container">
      <div class="wrapper">
         <div class="panel full">
            <div class="panel-heading">
               <h2>Account Management</h2>
            </div>
            <div class="panel-body">
               <div class="cd-hero vertical-tab">
                  <div class="cd-slider-nav">
                     <nav>
                        <span class="cd-marker item-1"></span>
                        <ul>
                           <li class="selected"><a href="#0"><span><i class="fa fa-tachometer" aria-hidden="true"></i></span><i>Dashboard</i></a></li>
                           <li class=""><a href="#0"><span><i class="fa fa-tag" aria-hidden="true"></i></span><i>My Listings</i></a></li>
                           <li class=""><a href="#0"><span><i class="fa fa-car" aria-hidden="true"></i></span><i>Saved</i></a></li>
                           <li class=""><a href="#0"><span><i class="fa fa-cog" aria-hidden="true"></i></span><i>Settings</i></a></li>
                        </ul>
                     </nav>
                  </div>
                  <!-- .cd-slider-nav -->
                  <ul class="cd-hero-slider">
                     <li class="selected from-left">
                        <div class="tab-content">
                           @if($vehicles->count())   
                           <div class="dashboard">
                              <a href="#" class="waves-effect waves-light btn btn-orange-border">Recent Listing</a>
                              <div class="item">
                                 <div class="item-heading">
                                    <h3 class="item-title">{{$vehicles[0]->year}} {{$vehicles[0]->make->make_name}} {{$vehicles[0]->model->model_name}}</h3>
                                    <a href="/vehicles/{{$vehicles[0]->id}}/edit" class="btn btn-action waves-effect waves-light waves-input-wrapper">Edit</a>
                                 </div>
                                 <div class="item-body">
                                    <div class="item-body-left"> <a href="#"> <img src="{{$vehicles[0]->photo()}}" alt=""> <span class="overlay"></span> </a> </div>
                                    <div class="item-body-right">
                                       <div class="item-body-right-upper">
                                          <div class="item-detail">
                                             <div class="item-detail-right">
                                                <h6><small>{{$vehicles[0]->created_at->diffForHumans()}}</small></h6>
                                                <p>{{$vehicles[0]->bodyStyleGroup->body_style_group_name or ''}} <span class="part">|</span> {{$vehicles[0]->ext_color->color or ''}} <span class="part">|</span> {{$vehicles[0]->transmission or ''}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="item-body-right-lower">
                                          <ul class="item-stats">
                                             <li>
                                                <div><i class="fa fa-tag"></i> ${{$vehicles[0]->price}}</div>
                                             </li>
                                             <li>
                                                <div><i class="fa fa-dashboard"></i> {{$vehicles[0]->odometer}}KM</div>
                                             </li>
                                             <li>
                                                <div><i class="fa fa-phone"></i> (403) 945-8808</div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @else
                           <div class="dashboard">
                              <a href="/post" class="waves-effect waves-light btn btn-orange-border">Sell your Vehicle</a>
                           </div>
                           @endif
                           @if($saved_vehicles->count())   
                           <div class="dashboard">
                              <a href="#" class="waves-effect waves-light btn btn-orange-border">My recently Saved</a>
                              <div class="item">
                                 <a href="/vehicle/{{$saved_vehicles[0]->slug}}">
                                    <div class="item-heading">
                                       <h3 class="item-title">{{$saved_vehicles[0]->year}} {{$saved_vehicles[0]->make->make_name}} {{$saved_vehicles[0]->model->model_name}} - {{$saved_vehicles[0]->user->city->city_name}}, {{$saved_vehicles[0]->user->province->province_name}}</h3>

                                    </div>
                                 </a>
                                 <div class="item-body">
                                    <div class="item-body-left"> <a href="/vehicle/{{$saved_vehicles[0]->slug}}"> <img src="{{$saved_vehicles[0]->photo()}}" alt="{{$saved_vehicles[0]->make->make_name}} {{$saved_vehicles[0]->model->model_name}}"> <span class="overlay"></span> </a> </div>
                                    <div class="item-body-right">
                                       <div class="item-body-right-upper">
                                          <div class="item-detail">
                                             <div class="item-detail-left"><img src="{{$saved_vehicles[0]->user->image}}" alt=""></div>
                                             <div class="item-detail-right">
                                                <h6>{{$saved_vehicles[0]->user->city->city_name}}, {{$saved_vehicles[0]->user->province->province_name}}  <span class="part">|</span>  <small>{{$saved_vehicles[0]->created_at->diffForHumans()}}</small></h6>
                                                <p>{{$saved_vehicles[0]->bodyStyleGroup->body_style_group_name or $saved_vehicles[0]->bodyStyle->body_style_name}} <span class="part">|</span> {{$saved_vehicles[0]->ext_color->color}} <span class="part">|</span> {{$saved_vehicles[0]->transmission}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="item-body-right-lower">
                                          <h5>{{$saved_vehicles[0]->user->name}}</h5>
                                          <ul class="item-stats">
                                             <li>
                                                <div><i class="fa fa-tag"></i> ${{$saved_vehicles[0]->price}}</div>
                                             </li>
                                             <li>
                                                <div><i class="fa fa-dashboard"></i> {{$saved_vehicles[0]->odometer}}KM</div>
                                             </li>
                                             <li>
                                                <div><i class="fa fa-phone"></i>{{$saved_vehicles[0]->user->phone}}</div>
                                             </li>
                                          </ul>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           @else
                           <div class="dashboard">
                              <a href="/search" class="waves-effect waves-light btn btn-orange-border">Browse your Nearby Vehicles Now</a>
                           </div>
                           @endif
                        </div>
                     </li>
                     <li>
                        <div class="tab-content">
                           <div class="dashboard">
                              <a href="#" class="waves-effect waves-light btn btn-orange-border">My Listings</a>
                              @foreach($vehicles as $vehicle)
                              <div class="item">
                                 <a href="/vehicle/{{$vehicle->slug}}">
                                 <div class="item-heading">
                                    <h3 class="item-title">{{$vehicle->year}} {{$vehicle->make->make_name}} {{$vehicle->model->model_name}}</h3>
                                    <a href="/vehicles/{{$vehicle->id}}/edit" class="btn btn-action waves-effect waves-light waves-input-wrapper">Edit</a>
                                    @if(empty($vehicle->featured))
                                    <button vehicle="{{$vehicle->id}}" class="btn activate-btn btn-action waves-effect waves-light waves-input-wrapper">Activate</button>
                                    @else
                                    <button vehicle="{{$vehicle->id}}" class="btn deactivate-btn btn-action waves-effect waves-light waves-input-wrapper">Deactivate</button>
                                    @endif
                                 </div>
                                 </a>
                                 <div class="item-body">
                                    <div class="item-body-left"> <a href="/vehicle/{{$vehicle->slug}}"> <img src="{{$vehicle->photo()}}" alt=""> <span class="overlay"></span> </a> </div>
                                    <div class="item-body-right">
                                       <div class="item-body-right-upper">
                                          <div class="item-detail">
                                             <div class="item-detail-right">
                                                <h6><small>{{$vehicle->created_at->diffForHumans()}}</small></h6>
                                                <p>{{$vehicle->bodyStyleGroup->body_style_group_name or ''}} <span class="part">|</span> {{$vehicle->ext_color->color or ''}} <span class="part">|</span> {{$vehicle->transmission or ''}}</p>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="item-body-right-lower">
                                          <ul class="item-stats">
                                             <li>
                                                <div><i class="fa fa-tag"></i> ${{$vehicles[0]->price}}</div>
                                             </li>
                                             <li>
                                                <div><i class="fa fa-dashboard"></i> {{$vehicles[0]->odometer}}KM</div>
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
                        </div>
                     </li>
                     <li>
                        <div class="tab-content">
                           <div class="dashboard">
                              <a href="#" class="waves-effect waves-light btn btn-orange-border">Saved Vehicles</a>
                              @foreach($saved_vehicles as $vehicle)
                  <div class="item">
                     <a href="/vehicle/{{$vehicle->slug}}">
                     <div class="item-heading">
                        <h3 class="item-title">{{$vehicle->year}} {{$vehicle->make->make_name}} {{$vehicle->model->model_name}} - {{$vehicle->user->city->city_name}}, {{$vehicle->user->province->province_name}}</h3>

                     </div>
                     </a>
                     <div class="item-body">
                        <div class="item-body-left">
                           <a href="/vehicle/{{$vehicle->slug}}">
                           <img src="{{$vehicle->photo()}}" alt="" />
                           <span class="overlay"></span>
                           </a>
                        </div>
                        <div class="item-body-right">
                           <div class="item-body-right-upper">
                              <div class="item-detail">
                                 <div class="item-detail-left"><img src="/assets/images/placeholder.jpg" alt="" /></div>
                                 <div class="item-detail-right">
                                    <h6>{{$vehicle->user->city->city_name}}, {{$vehicle->user->province->province_name}}  <span class="part">|</span>  <small>{{$vehicle->created_at->diffForHumans()}}</small></h6>
                                    <p>{{$vehicle->bodyStyleGroup->body_style_group_name or $vehicle->bodyStyle->body_style_name}} <span class="part">|</span> {{$vehicle->ext_color->color}} <span class="part">|</span> {{$vehicle->transmission}}</p>
                                 </div>
                              </div>
                           </div>
                           <div class="item-body-right-lower">
                              <h5>{{$vehicle->user->name}}</h5>
                              <ul class="item-stats">
                                 <li>
                                    <div><i class="fa fa-tag"></i> ${{$vehicle->price}}</div>
                                 </li>
                                 <li>
                                    <div><i class="fa fa-dashboard"></i> {{$vehicle->odometer}}KM</div>
                                 </li>
                                 <li>
                                    <div><i class="fa fa-phone"></i>{{$vehicle->user->phone}}</div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
                           </div>
                        </div>
                     </li>
                     <li>
                        <div class="tab-content">
                           <div class="settings">
                              <div class="contact-dealer-container">
                              <form id="email-form" action="/change-email" method="POST">
                                 <h4>Change Email</h4>
                                 <h6 class="current-info"><span>Current Email</span>{{$email}} </h6>
                                 <div class="form-group">
                                    <input id="new_email" name="new_email" type="text" class="form-control" placeholder="New Email" required>
                                 </div>
                                 <div class="form-group">
                                    <input name="confirm_email" type="text" class="form-control" placeholder="Confirm Email" required>
                                 </div>
                                 <div class="form-group">
                                    <input name="password" type="password" class="form-control" placeholder="Current Password" required>
                                 </div>
                                 <div class="form-group">
                                    <button id="email-submit-btn" type="submit" class=" btn waves-effect waves-light waves-input-wrapper">Submit</button>
                                 </div>
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                 </form>
                              </div>
                              <div class="contact-dealer-container">
                              <form id="password-form" action="/change-password" method="POST">
                                 <h4>Change Password</h4>
                                 <div class="form-group">
                                    <input name="new_password" minlength="6" type="password" class="form-control" placeholder="New Password" required>
                                 </div>
                                 <div class="form-group">
                                    <input name="confirm_new_password" minlength="6" type="password" class="form-control" placeholder="Confirm New Password" required>
                                 </div>
                                 <div class="form-group">
                                    <input name="password" minlength="6" type="password" class="form-control" placeholder="Current Password" required>
                                 </div>
                                 <div class="form-group">
                                    <button id="password-submit-btn" type="submit" class=" btn waves-effect waves-light waves-input-wrapper">Submit</button>
                                 </div>
                                 <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              </form>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
                  <!-- .cd-hero-slider --> 
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Dashboard end --> 

@endsection

@section('javascript')
<script type="text/javascript">
var email_form = $("#email-form");
            email_form.validate({
                rules: {},
                // errorClass: "invalid form-error",       
                // errorElement : 'div',       
                focusInvalid: true,
                submitHandler: function(form) {
                     $('#email-submit-btn').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:2.0rem" aria-hidden="true"></i>  PROCESSING');
                    $.ajax({
                                url: form.action,
                                type: form.method,
                                data: $(form).serialize(),
                                success: function(response) {
                                    if(response.status=="success")
                                    {
                                       toastr.success('A confirmation link has been sent to '+$('#new_email').val()+'. Please verify.')
                                       $("#email-form").get(0).reset();
                                    }
                                    else
                                    {
                                       toastr.error(response.error)
                                    }
                                    $('#email-submit-btn').prop('disabled', false).html('SUBMIT');
                                }
                            });
                }
            })

var password_form = $("#password-form");
            password_form.validate({
                rules: {},
                // errorClass: "invalid form-error",       
                // errorElement : 'div',       
                focusInvalid: true,
                submitHandler: function(form) {
                  $('#password-submit-btn').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:2.0rem" aria-hidden="true"></i>  PROCESSING');
                    $.ajax({
                                url: form.action,
                                type: form.method,
                                data: $(form).serialize(),
                                success: function(response) {
                                    if(response.status=="success")
                                    {
                                       toastr.success(response.message)
                                       $("#password-form").get(0).reset();
                                    }
                                    else
                                    {
                                       toastr.error(response.error)
                                    }
                                    $('#password-submit-btn').prop('disabled', false).html('SUBMIT');
                                }
                            });
                }
            })


   //Activate/Deactivate Vehicle
   $('.dashboard')
      .on('click','.activate-btn', function(e){
         e.preventDefault();
      })
      .on('mousedown','.activate-btn', function(e){
      var btn = $(this)
      btn.prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:1.3rem" aria-hidden="true"></i>  PROCESSING');     
 

      $.ajax({ type: "POST",   
               url: "/activate-vehicle",   
          accepts: {
             text: "application/json"
         },
          async: true,
          data: {vehicle_id: btn.attr('vehicle'), "_token": "{{ csrf_token() }}"},
          success : function(data)
          {  
            if(data.status=="success")
            {
               btn.removeClass('activate-btn').addClass('deactivate-btn');
               btn.prop('disabled', false).html('Deactivate')
            }
            else
            {
               btn.prop('disabled', false).html('Activate')
               toastr.error(data.message)
            }
            
          }
       });
   })
   $('.dashboard')
      .on('click','.deactivate-btn',function(e){
         e.preventDefault();
      })
      .on('mousedown','.deactivate-btn',function(e){
      var btn = $(this)
      btn.prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:1.3rem" aria-hidden="true"></i>  PROCESSING');     
 

      $.ajax({ type: "POST",   
               url: "/deactivate-vehicle",   
          accepts: {
             text: "application/json"
         },
          async: true,
          data: {vehicle_id: btn.attr('vehicle'), "_token": "{{ csrf_token() }}"},
          success : function(data)
          {  
            btn.removeClass('deactivate-btn').addClass('activate-btn');
            btn.prop('disabled', false).html('Activate')
          }
       });
   })    

      $('img[src=""]').attr('src','/assets/images/placeholder.jpg');

      $('img').one('error', function() { this.src = '/assets/images/placeholder.jpg'; });
            </script>
@endsection