@extends('layouts.main')

@section('title', 'Carsgone')

@section('content')
<div class="vehicle-post-outer">
 <div class="container">
    <div class="wrapper">
       {{-- <form id="vehicle-form" method="post" action="/post/create"> --}}
       {!! Form::open(['url' => '/credit-application', 'method' => 'PATCH', 'id' => 'credit-form']) !!}
       <div class="post-tab clearfix panel" id="credit_wizard">
          
            <div class="form-section">
               <legend>Vehicle Type</legend>
               <div class="pricing-container">
                  <ul class="pricing-list">
                      <li>
                          <div class="pricing-box">
                                <div class="pricing-header"><h4>Car</h4>
                                  <div class="pricing-icon">
                                  <img src="assets/images/car.png" alt="" />
                                </div>
                                </div>
                                
                                <div class="pricing-content">
                                    <p>Lower monthly payments</p>
                                    <p>Seats up to 6</p>
                                    <p>Practical and sporty</p>
                                </div>
                                <div class="pricing-footer">
                                  <a href="#" class="btn next-btn waves-effect waves-light">Choose</a>
                                </div>
                            </div>
                        </li>
                        <li>
                          <div class="pricing-box">
                                <div class="pricing-header">
                                  <h4>Van</h4>
                                  <div class="pricing-icon">
                                    <img src="assets/images/van.png" alt="" />
                                  </div>
                                </div>
                                
                                <div class="pricing-content">
                                    <p>Passenger or Work</p>
                                    <p>Seats up to 15</p>
                                    <p>Seating and cargo</p>
                                </div>
                                <div class="pricing-footer">
                                  <a href="#" class="btn next-btn waves-effect waves-light">Choose</a>
                                </div>
                            </div>
                        </li>
                        <li>
                          <div class="pricing-box">
                                <div class="pricing-header">
                                  <h4>Recommended</h4>
                                  <div class="pricing-icon">
                                  <img src="assets/images/dollar60.png" alt="" />
                                </div>
                                </div>
                                
                                <div class="pricing-content">
                                    <p class="center-text">CHOOSE LATER</p>
                                    <p>Get me pre-approved for an auto loan 1st</p>
                                </div>
                                <div class="pricing-footer">
                                  <a href="#" class="btn next-btn waves-effect waves-light">Get Approved Now</a>
                                </div>
                            </div>
                        </li>
                        <li>
                          <div class="pricing-box">
                                <div class="pricing-header">
                                  <h4>suv</h4>
                                  <div class="pricing-icon">
                                    <img src="assets/images/suv.png" alt="" />
                                  </div>
                                </div>
                                
                                <div class="pricing-content">
                                    <p>Versatile and safe</p>
                                    <p>Seats up to 9</p>
                                    <p>Cargo and hauling</p>
                                </div>
                                <div class="pricing-footer">
                                  <a href="#" class="btn next-btn waves-effect waves-light">Choose</a>
                                </div>
                            </div>
                        </li>
                        <li>
                          <div class="pricing-box">
                                <div class="pricing-header">
                                  <h4>Truck</h4>
                                  <div class="pricing-icon">
                                    <img src="assets/images/truck.png" alt="" />
                                  </div>
                                </div>
                                
                                <div class="pricing-content">
                                    <p>Towing and shipping</p>
                                    <p>Seats up to 6</p>
                                    <p>Recreation and Work</p>
                                </div>
                                <div class="pricing-footer">
                                  <a href="#" class="btn next-btn waves-effect waves-light">Choose</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                 </div>
            </div>
            <div class="form-section">
               <legend>Budget</legend>
               <fieldset>
                  <span>1</span>
                  <h4>Budget</h4>
                  <div class="row">
                     <div class="col-sm-12">
 
                        <div id="year-range" class="filter-margin"></div>
                        <p class="price-range-output">
                           <span><b id="min-year"></b></span>
                        </p>
                     
                     </div>
                  </div>
               </fieldset>
            </div>
            <div class="form-section">
               <legend>Vehicle Info</legend>
               <fieldset>
                  <div class="row">
                  	<div class="col-sm-6 display-table">
                        <label>Name</label>
                        <div class="input-box">
                          {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => "Enter your name", 'minlength'=>'3', 'required']) !!}
                        </div>
                     </div>
                     <div class="col-sm-6 display-table">
                        <label>Phone Number</label>
                        <div class="input-box">
                           {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => "Eg: 9999900000", 'required']) !!}
                        </div>
                     </div>
                  </div>
                  <div class="row">
                  	<div class="col-sm-6 display-table">
                        <label>Email</label>
                        <div class="input-box">
                          {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => "Enter your email", 'required']) !!}
                        </div>
                     </div>
                     <div class="col-sm-6 display-table">
                        <label>Province</label>
                        <div class="select-box">
                           <select name="province" required>
                               <option value="" disabled selected>Select Province</option>
                               @foreach ($provinces as $province)
                               <option value="{{$province}}">{{$province}}</option>
                               @endforeach
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                  	<div class="col-sm-6 display-table">
                        <label>Income</label>
                        <div class="input-box">
                          {!! Form::text('income', null, ['class' => 'form-control', 'placeholder' => "Eg: 10,000", 'required']) !!}
                        </div>
                     </div>
                  </div>
                  <div class="row">
                  	<div class="col-sm-6 display-table">
                        <div class="input-box">
                          
                          	<input type="checkbox" class="filled-in" id="filled-in-box" />
      						          <label for="filled-in-box">I agree to <a target="_blank" href="/privacy">privacy policy</a></label>
                            
                        </div>
                     </div>
                  </div>
               </fieldset>
           
            </div>
          
       </div>
       {{-- </form> --}}
       {!! Form::close() !!}
    </div>
 </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
	var sfw = $("#credit_wizard").stepFormWizard({
        theme: 'sun',
        height: 'auto',
        markPrevSteps: true,
        nextBtn: $('<a class="next-btn sf-right sf-btn btn waves-effect waves-light " href="#">NEXT <i class="icofont icofont-rounded-right"></i></a>'),
        prevBtn: $('<a class="prev-btn sf-left sf-btn btn grey waves-effect waves-light  " href="#"><i class="icofont icofont-rounded-left"></i> PREV</a>'),
        // finishBtn: $(''),
        onNext: function(i, wizard) {
            
            console.log(i,wizard)
            if(i==1)
            {
            	return true
        	}
        	else
        		return true
        }


    });
    sfw.refresh();

    var form = $("#credit-form");
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
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            window.location = response.url;
                        }
                    });
                }
            })


var yearSlider = document.getElementById('year-range');

noUiSlider.create(yearSlider, {
    start: [2],
    decimals: 0,
    thousand: ',',
    snap: false,
    step: 1000,
    range: {
        'min': 1000,

        'max': 50000
    },
    format: wNumb({
        decimals: 0
    })
});


var yearValues = [
    document.getElementById('min-year'),
    document.getElementById('max-year')
];

yearSlider.noUiSlider.on('update', function(values, handle) {
    yearValues[handle].innerHTML = values[handle];
});
</script>
@endsection