@extends('layouts.main')

@section('content')
<div class="contact-outer">
   <div class="container">
      <div class="wrapper">
         <!-- contact start -->
         <div class="row">
            <div class="col-sm-6 col-sm-offset-3">
               <div class="panel full">
                  <div class="panel-heading">
                     <h2>Reset Password</h2>
                  </div>
                  <div class="panel-body">
                     <div class="contact-dealer-container">
                     <form id="reset-password" method="POST" action="/reset-password">
                        <div class="form-group">
                           <input name="new_password" minlength="6" type="password" class="form-control" placeholder="Enter New Password" required>
                        </div>
                        <div class="form-group">
                           <input name="confirm_new_password" minlength="6" type="password" class="form-control" placeholder="Confirm Password" required>
                        </div>
                        <div class="form-group">
                           <button id="reset-submit-btn" type="submit" class=" btn waves-effect waves-light waves-input-wrapper">Submit</button>
                        </div>
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                     </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- contact end -->
      </div>
   </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
var form = $("#reset-password");
            form.validate({
                rules: {},
                // errorClass: "invalid form-error",       
                // errorElement : 'div',       
                focusInvalid: true,
                submitHandler: function(form) {
                  $('#reset-submit-btn').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:2.0rem" aria-hidden="true"></i>  PROCESSING');
                    $.ajax({
                                type: form.method,
                                url: form.action,
                                data: $(form).serialize(),
                                success: function(response) {
                                    if(response.status=="success")
                                    {
                                       toastr.success(response.message)
                                       $("#reset-password").get(0).reset();
                                       window.location = "/";
                                    }
                                    else
                                    {
                                       toastr.error(response.error)
                                       
                                    }
                                    $('#reset-submit-btn').prop('disabled', false).html('SUBMIT');
                                }
                            });
                }
            })
            </script>
@endsection