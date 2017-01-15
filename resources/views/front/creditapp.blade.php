@extends('layouts.main')

@section('content')
<div class="vehicle-post-outer">
 <div class="container">
    <div class="wrapper">
       {{-- <form id="vehicle-form" method="post" action="/post/create"> --}}
       {!! Form::open(['url' => '/credit-application', 'method' => 'POST', 'id' => 'credit-form']) !!}
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
                                  <a href="#" body="car" class="btn next-btn waves-effect waves-light">Choose</a>
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
                                  <a href="#" body="van" class="btn next-btn waves-effect waves-light">Choose</a>
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
                                  <a href="#" body="choose later" class="btn next-btn waves-effect waves-light">Get Approved Now</a>
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
                                  <a href="#" body="suv" class="btn next-btn waves-effect waves-light">Choose</a>
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
                                  <a href="#" body="truck" class="btn next-btn waves-effect waves-light">Choose</a>
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
 
                        <div id="budget-range" class="filter-margin"></div>
                        <p class="budget-range-output">
                           <span><b id="budget-val"></b></span>
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
                  	<div class="col-sm-6">
                        <div class="input-box margin-checkbox">
                          
                          	<input type="checkbox" class="filled-in" name="privacy" id="filled-in-box" required />
      						          <label for="filled-in-box">I agree to <a target="_blank" href="/privacy">privacy policy</a></label>
                            <input id="input-body" type="hidden" name="body">
                            <input id="input-budget" type="hidden" name="budget">
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
        finishBtn: $('<button id="credit-submit" class="finish-btn sf-right sf-btn sf-btn-finish btn waves-effect waves-light" type="submit" value="FINISH">Submit</button>'),
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
                messages:{
                    privacy: {
                      required : "Please accept the privacy policy"
                    }
                },
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
                  $('credit-submit').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:1.3rem" aria-hidden="true"></i>  PROCESSING');
                    $.ajax({
                        url: form.action,
                        type: form.method,
                        data: $(form).serialize(),
                        success: function(response) {
                            if(response.status=="success")
                            {
                              location.reload()
                            }
                        }
                    });
                }
            })


var budgetSlider = document.getElementById('budget-range');

noUiSlider.create(budgetSlider, {
    start: [2],
    decimals: 0,
    thousand: ',',
    snap: false,
    step: 50,
    range: {
        'min': 150,

        'max': 1500
    },
    format: wNumb({
        decimals: 0,
        prefix: '$'
    })
});


var budgetValue = [
    document.getElementById('budget-val')
];

budgetSlider.noUiSlider.on('update', function(values, handle) {
    budgetValue[handle].innerHTML = values[handle];
    $('#input-budget').val(values[handle])
});

$('.pricing-footer > a').on('click',function(e){
  $('#input-body').val($(this).attr('body'))
})
</script>
@endsection