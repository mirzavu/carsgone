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
               <fieldset>
                  <div class="row">
                     <div class="col-sm-6 display-table">
                        <label>Year</label>
                        <div class="select-box">
                           {!! Form::select('year', ['2017' => '2017','2016' => '2016','2015' => '2015','2014' => '2014','2013' => '2013','2012' => '2012','2011' => '2011','2010' => '2010'], null, ['required' ]) !!}
                        </div>
                     </div>
                  </div>
               </fieldset>
            </div>
            <div class="form-section">
               <legend>Budget</legend>
               <fieldset>
                  <span>1</span>
                  <h4>Budget</h4>
                  <div class="row">
                     <div class="col-sm-12">
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
                          {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => "Enter your email", 'type'=>'email', 'required']) !!}
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
      						<label>I agree</label>
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

</script>
@endsection