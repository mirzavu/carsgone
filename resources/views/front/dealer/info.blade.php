@extends('layouts.main')

@section('content')
<!-- Dealer info start -->
<div class="dealer-info">
	<div class="container">
    	<div class="row">
        	<div class="col-sm-12">
            	<div class="panel full">
                	<div class="panel-heading">
                    	<h2>Dealer Information</h2>
                    </div>
                    <div class="panel-body">
                    	<h3>Browse Cars for Sale in Canada</h3>
                        <p>Carsgone.com allows you to browse through vehicle listings from car dealerships Canada wide. With thousands of listings available you are sure to find the car, truck, van or SUV of your dreams right from the comfort of your own home. Finding cars for sale in Canada has never been this easy and stress free. At Carsgone.com we are consumers too and understand the frustration of searching endlessly through car lots trying to find just the right vehicle, which is why we allow you to refine your search the way you want. You can choose to search either new or used vehicles, or both, by make, model, price or location; you decide what's easiest for you!</p>
                        <a class="waves-effect waves-light btn">Read more</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Dealer info end -->

<!-- Browse Dealership start -->
<div class="browse-dealership-outer">
	<div class="container">
        <div class="browse-dealership">
            <div class="row">
                <div class="col-md-8">
                    <h3>Browse  Dealerships</h3>
                    <p><span>1736</span> Dealers and <span>79128</span> dealer vehicles currently listed</p>
                    <p>Looking for a car dealership near you? Dealerships across Canada list vehicles  with Carsgone.com. Have a look!</p>
                </div>
                <div class="col-md-4">
                    <a href="/auto-dealers" class="waves-effect waves-light btn bordered">Browse Dealers</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Browse Dealership end -->

<!-- Membership start -->
<div class="membership-container">
	<div class="container">
    	<div class="row">
        	
            <div class="col-sm-6">
            	<div class="panel membership">
                	<div class="panel-heading">
                    	<img src="/assets/images/icon-user.png" alt="" />
                    	<h3>Free Membership</h3>
                        <p>Our Basic Dealer Membership</p>
                    </div>
                    <div class="panel-body">
                    	<p>Ready to try us out? Our FREE basic membership with no obligation or hidden costs allows you to start listing an unlimited number of vehicles immediately.</p>
                        <ul class="account-features">
                        	<li>
                            	<div class="icon">
                                	<img src="/assets/images/icon-cog.png" alt="" />
                                </div>
                                <h6>Free Account</h6>
                                <p>No hidden costs and no obligation.</p>
                            </li>
                            <li>
                            	<div class="icon">
                            		<img src="/assets/images/icon-disable.png" alt="" />
                                </div>
                                <h6>No Limits!</h6>
                                <p>Post and unlimited number of vehicles and photos.</p>
                            </li>
                            <li>
                            	<div class="icon">
                            		<img src="/assets/images/icon-users2.png" alt="" />
                                </div>
                                <h6>Generate online leads</h6>
                                <p>Get free online exposure for your vehicle inventory.</p>
                            </li>
                        </ul>
                        <a href="#dealer-signup" class="modal-trigger waves-effect waves-light btn">Get Free Account</a>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-6">
            	<div class="panel membership">
                	<div class="panel-heading">
                    	<img src="/assets/images/icon-user.png" alt="" />
                    	<h3>Premium Account</h3>
                        <p>Additional features to drive your sales</p>
                    </div>
                    <div class="panel-body">
                    	<p>Upload your logo, have your own virtual showroom and gain access to trade evaluations and credit leads. This membership will generate additional online exposure drive your online leads.</p>
                        <ul class="account-features">
                        	<li>
                            	<div class="icon">
                                	<img src="/assets/images/icon-cog.png" alt="" />
                                </div>
                                <h6>Premium Account</h6>
                                <p>Simple month-to-month membership</p>
                            </li>
                            <li>
                            	<div class="icon">
                            		<img src="/assets/images/icon-disable.png" alt="" />
                                </div>
                                <h6>Virtual Showroom</h6>
                                <p>Custom branded online showroom</p>
                            </li>
                            <li>
                            	<div class="icon">
                            		<img src="/assets/images/icon-users2.png" alt="" />
                                </div>
                                <h6>Generate Credit Leads</h6>
                                <p>Get credit enquiries right from carsgone.com</p>
                            </li>
                        </ul>
                        <a href="/contact" class="waves-effect waves-light btn">Contact Us for Info</a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<!-- Membership start -->

<div id="dealer-signup" class="modal member">
   <form id="dealer-form" action="/dealer-signup" method="POST">
      <div class="modal-content">
         <h5>SIGN UP</h5>
         <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control" required/>
         </div>
         <div class="form-group">
            <label>Dealership Name</label>
            <input type="text" name="name" class="form-control"  required/>
         </div>
         <div class="form-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required/>
         </div>
         <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" class="form-control" required />
         </div>
         <div class="form-group">
            <label>Street Address</label>
            <input type="text" name="address" class="form-control" required />
         </div>
         <div class="form-group">
            <label>Postal Code</label>
            <input type="text" name="postal_code" class="form-control" required />
         </div>
         <div class="form-group">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required />
         </div>
         <a href="#" class="modal-action modal-close close"><i class="fa fa-times" aria-hidden="true"></i></a>
      </div>
      <div class="modal-footer">
         <button id="dealer-submit" class="finish-btn btn waves-effect waves-light" type="submit">Signup</button>
      </div>
   </form>
</div>

@endsection

@section('javascript')
<script type="text/javascript">
     var form = $("#dealer-form");
            form.validate({
                rules: {},
                // errorClass: "invalid form-error",       
                // errorElement : 'div',       
                errorPlacement: function(error, element) {
                    if (element.is('select')) {
                        error.appendTo(element.parent().parent());
                    } else {
                        error.appendTo(element.parent());
                    }

                },
                focusInvalid: false,
                invalidHandler: function(form, validator) {

                    if (!validator.numberOfInvalids())
                        return;
                    $('html, body').animate({
                        scrollTop: $(validator.errorList[0].element).parent().offset().top - 20
                    }, 500);
                    $(validator.errorList[0].element).focus()

                },
                submitHandler: function(form) {
                  $('#dealer-submit').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:1.3rem" aria-hidden="true"></i>  PROCESSING');
                    $.ajax({
                             url: form.action,
                             type: form.method,
                             data: $(form).serialize()+'&_token={{ csrf_token() }}',
                             success: function(response) {
                                 if(response.status == "success")
                                 {
                                    toastr.success(response.message)
                                    $('#dealer-submit').prop('disabled', false).html('Submit')
                                    $("#dealer-form").get(0).reset();
                                 }
                             }
                         });
                }
            })

</script>
@endsection