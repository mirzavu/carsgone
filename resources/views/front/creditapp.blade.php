@extends('layouts.main')

@section('content')
<div class="vehicle-post-outer">
   <div class="container">
      <div class="wrapper">
         <div class="dealer-info">
            <div class="panel full">
               <div class="panel-body">
                  <div>
                     <div class="row">
                        <input type="checkbox" class="filled-in" name="quick-info" id="quick-info" />
                        <label for="quick-info">Complete the form below, or receive a call back by clicking here.</label>

                     </div>
                     {!! Form::open(['url' => '/quick-finance', 'method' => 'POST', 'id' => 'quick-form']) !!}
                        <fieldset id="quick-box">
                           <div class="row">
                              <div class="col-sm-4 display-table">
                                 <label>Name</label>
                                 <div class="input-box">
                                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => "Enter your name", 'minlength'=>'3', 'required']) !!}
                                 </div>
                              </div>
                              <div class="col-sm-4 display-table">
                                 <label>Phone Number</label>
                                 <div class="input-box">
                                    {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => "Phone Number", 'required']) !!}
                                 </div>
                              </div>
                              <div class="col-sm-4 display-table">
                              <div class="input-box">
                                 <input type="hidden" name="slug" value="{{$slug}}">
                                 <button id="quick-submit" class="btn waves-effect waves-light btn-block" type="submit">Submit</button>
                                 </div>
                              </div>

                           </div>

                        </fieldset>
                     {!! Form::close() !!}
                     
                  </div>
                  <div id="post-create-form-box">
                     <div>
                        <ul>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
            
            <div class="post-tab clearfix panel" id="credit_wizard">
               <div class="form-section">
                  <legend>Contact Details</legend>
                  {!! Form::open(['url' => '/credit-application', 'method' => 'POST', 'id' => 'contact-form']) !!}
                  <fieldset>
                     <div class="row">
                        <div class="col-sm-6 display-table">
                           <label>Name</label>
                           <div class="input-box">
                              {!! Form::text('name', null, ['class' => 'form-control', 'minlength'=>'3', 'required', 'placeholder' => "Enter Name"]) !!}
                           </div>
                        </div>
                        <div class="col-sm-6 display-table">
                           <label>Phone Number</label>
                           <div class="input-box">
                              {!! Form::text('phone', null, ['class' => 'form-control', 'required', 'placeholder' => "Phone Number"]) !!}
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 display-table">
                           <label>Email</label>
                           <div class="input-box">
                              {!! Form::email('email', null, ['class' => 'form-control','required', 'placeholder' => "Email"]) !!}
                           </div>
                        </div>
                        <div class="col-sm-6 display-table">
                           <label>Street</label>
                           <div class="input-box">
                              {!! Form::text('street', null, ['class' => 'form-control','minlength'=>'3', 'required', 'placeholder' => "Street"]) !!}
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 display-table">
                           <label>City</label>
                           <div class="input-box">
                              {!! Form::text('city', null, ['class' => 'form-control', 'required', 'placeholder' => "City"]) !!}
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
                           <label>Postal Code</label>
                           <div class="input-box">
                              {!! Form::text('postal_code', null, ['class' => 'form-control', 'required', 'placeholder' => "Postal Code"]) !!}
                           </div>
                        </div>
                     </div>
                  </fieldset>
                  {!! Form::close() !!}
               </div>

               <div class="form-section">
                  <legend>Complete Application</legend>
                  {!! Form::open(['url' => '/credit-application', 'method' => 'POST', 'id' => 'credit-form']) !!}
                  <fieldset>
                     <span>1</span>
                     <h4>Personal Information</h4>
                     <div class="row">
                        <div class="col-sm-6 display-table">
                           <label>Date Of Birth</label>
                           <div class="input-box">
                              <input name="dob" type="date" class="form-control datepicker" placeholder="Date of Birth">
                           </div>
                        </div>
                        <div class="col-sm-6 display-table">
                           <label>Social Insurance Number</label>
                           <div class="input-box">
                              {!! Form::text('sin', null, ['class' => 'form-control', 'placeholder' => "Social Insurance Number"]) !!}
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 display-table">
                           <label>Rent Or Own</label>

                           <div class="input-box">
                              <div class="switch">
                               <label>
                                 Rent
                                 <input type="checkbox">
                                 <span class="lever"></span>
                                 Own
                               </label>
                             </div>
                           </div>
                        </div>
                        <div class="col-sm-6 display-table">
                           <label>Time At Address</label>
                           <div class="input-box">
                              <div class="flex">
                                 {!! Form::text('time_address_year', null, ['class' => 'form-control', 'placeholder' => 'Time At Address Years']) !!}
                                 {!! Form::text('time_address_month', null, ['class' => 'form-control', 'placeholder' => 'Time At Address Months']) !!}
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 display-table">
                           <label>Monthly Payment</label>
                           <div class="input-box">
                              {!! Form::text('monthly_payment', null, ['class' => 'form-control', 'placeholder' => 'Monthly Payment']) !!}
                           </div>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <span>2</span>
                     <h4>Employment Status</h4>
                     <div class="row">
                        <div class="col-sm-6 display-table">
                           <label>Company Name</label>
                           <div class="input-box">
                              {!! Form::text('company', null, ['class' => 'form-control', 'placeholder' => 'Company Name']) !!}
                           </div>
                        </div>
                        <div class="col-sm-6 display-table">
                           <label>Work Phone Number</label>
                           <div class="input-box">
                              {!! Form::text('work_phone', null, ['class' => 'form-control', 'placeholder' => 'Work Phone Number']) !!}
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 display-table">
                           <label>Position/Title</label>
                           <div class="input-box">
                              {!! Form::text('position', null, ['class' => 'form-control', 'placeholder' => 'Position/Title']) !!}
                           </div>
                        </div>
                        <div class="col-sm-6 display-table">
                           <label>Time At Job</label>
                           <div class="input-box">
                              <div class="flex">
                                 {!! Form::text('time_job_year', null, ['class' => 'form-control', 'placeholder' => 'Time At Job Years']) !!}
                                 {!! Form::text('time_job_month', null, ['class' => 'form-control', 'placeholder' => 'Time At Job Months']) !!}
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 display-table">
                           <label>Monthly Income</label>
                           <div class="input-box">
                              {!! Form::text('monthly_income', null, ['class' => 'form-control', 'placeholder' => 'Monthly Income']) !!}
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6">
                           <div class="input-box margin-checkbox">
                              <input type="checkbox" class="filled-in" name="privacy" id="filled-in-box" required />
                              <label for="filled-in-box">I agree to <a target="_blank" href="/privacy">privacy policy</a></label>
                           </div>
                        </div>
                     </div>
                  </fieldset>
                  <input type="hidden" name="slug" value="{{$slug}}">
                  {!! Form::close() !!}
               </div>
            </div>
         
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

        var form = $("#contact-form");
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

            }
        })

        if (form.valid() == true) {
            return true;
        } else {
            return false;
        }
    },
    onFinish: function(i) {
        var form2 = $("#credit-form");
        form2.validate({
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
            invalidHandler: function(form2, validator) {

                if (!validator.numberOfInvalids())
                    return;
                $('html, body').animate({
                    scrollTop: $(validator.errorList[0].element).parent().offset().top - 20
                }, 500);
                $(validator.errorList[0].element).focus()

            }
        })

        if (form2.valid() == false) {
            return false;
        }

        $('#credit-submit').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:1.3rem" aria-hidden="true"></i>  PROCESSING');
        $.ajax({
            url: '/credit-application',
            type: 'POST',
            data: $('form').serialize(),
            success: function(response) {
                if (response.status == "success") {
                    location.reload(true)
                }
            }
        });
    }


});
sfw.refresh();


var form = $("#quick-form");
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
                  $('#quick-submit').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:1.3rem" aria-hidden="true"></i>  PROCESSING');
                    $.ajax({
                             url: form.action,
                             type: form.method,
                             data: $(form).serialize()+'&_token={{ csrf_token() }}',
                             success: function(response) {
                                 if(response.status == "success")
                                 {
                                    toastr.success(response.message)
                                    $('#quick-submit').prop('disabled', false).html('Submit')
                                    $("#quick-form").get(0).reset();
                                 }
                             }
                         });
                }
            })

$("#quick-info").change(function() {
    if (this.checked) {
        $('#quick-box').fadeIn('slow')
        $('#credit_wizard-box').hide()
    } else {
        $('#quick-box').hide()
        $('#credit_wizard-box').fadeIn('slow')
    }
});

$('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 60, // Creates a dropdown of 15 years to control year
    min: [1950, 1, 1],
    max: [2005, 1, 1],
    onSet: function (ele) {
         if(ele.select){
                this.close();
         }
      }

});

$(document).ready(function(){
    $(this).scrollTop(0);
});
</script>
@endsection