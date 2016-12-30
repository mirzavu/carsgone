@extends('layouts.main')

@section('content')

<!-- Vehicle Post start -->
<div class="vehicle-post-outer">
 <div class="container">
    <div class="wrapper">
       {{-- <form id="vehicle-form" method="post" action="/post/create"> --}}
       {!! Form::model($vehicle, ['url' => '/vehicles/'.$vehicle->id, 'method' => 'PATCH', 'id' => 'vehicle-form']) !!}
       <div class="post-tab clearfix panel" id="post-edit-form">
          
            <div class="form-section">
               <legend>Vehicle Info</legend>
               <fieldset>
                  <span>1</span>
                  <h4>Make &amp; Model</h4>
                  <div class="row">
                     <div class="col-sm-6 display-table">
                        <label>Year</label>
                        <div class="select-box">
                           {!! Form::select('year', ['2017' => '2017','2016' => '2016','2015' => '2015','2014' => '2014','2013' => '2013','2012' => '2012','2011' => '2011','2010' => '2010'], null, ['required' ]) !!}
                        </div>
                     </div>
                     <div class="col-sm-6 display-table">
                        <label>Make</label>
                        <div class="select-box">
                           {!! Form::select('make_id', $makes, null, ['id'=> 'make-select', 'required' ]) !!}
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6 display-table">
                        <label>Model</label>
                        <div class="select-box">
                           {!! Form::select('model_id', $models, null, ['id'=> 'model-select', 'required' ]) !!}
                        </div>
                     </div>
                     <div class="col-sm-6 display-table">
                        <label>Trim Code</label>
                        <div class="input-box">
                           {!! Form::text('trim', null, ['class' => 'form-control', 'placeholder' => "Enter Trim"]) !!}
                        </div>
                     </div>
                  </div>
               </fieldset>
               <fieldset>
                  <span>2</span>
                  <h4>Price % Mileage</h4>
                  <div class="row">
                     <div class="col-sm-6 display-table">
                        <label>Price</label>
                        <div class="input-box">
                          {!! Form::text('price', null, ['class' => 'form-control', 'placeholder' => "eg: $12,000", 'minlength'=>'3', 'required']) !!}
                        </div>
                     </div>
                     <div class="col-sm-6 display-table">
                        <label>Mileage</label>
                        <div class="input-box">
                           {!! Form::text('odometer', null, ['class' => 'form-control', 'placeholder' => "eg: 12,000", 'required']) !!}
                        </div>
                     </div>
                  </div>
               </fieldset>
               <fieldset>
                  <span>3</span>
                  <h4>Vehicle Info</h4>
                  <div class="row">
                     <div class="col-sm-6 display-table">
                        <label>Body Style</label>
                        <div class="select-box">
                           {!! Form::select('body_style_group_id', $body_style_groups, null) !!}
                        </div>
                     </div>
                     <div class="col-sm-6 display-table">
                        <label>Transmission</label>
                        <div class="select-box">
                           {!! Form::select('transmission', [null=>'Select Transmission','auto' => 'Automatic','manual' => 'Manual'], null) !!}
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6 display-table">
                        <label>Exterior Colour</label>
                        <div class="select-box">
                          {!! Form::select('colour_exterior', $exterior_colors, null) !!}
                        </div>
                     </div>
                     <div class="col-sm-6 display-table">
                        <label>Interior Colour</label>
                        <div class="select-box">
                          {!! Form::select('colour_interior', $interior_colors, null) !!}
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-6 display-table">
                        <label>Doors</label>
                        <div class="select-box">
                           {!! Form::select('doors', $doors, null) !!}
                        </div>
                     </div>
                     <div class="col-sm-6 display-table">
                        <label>Passengers</label>
                        <div class="select-box">
                           {!! Form::select('passenger', $passengers, null) !!}
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12 display-table textarea">
                        <label>Description</label>
                        <div class="input-box">
                           {!! Form::textarea('text', null, ['class' => 'form-control', 'placeholder' => "Enter Description"]) !!}
                        </div>
                     </div>
                  </div>
               </fieldset>
               <fieldset>
                  <span>4</span>
                  <h4>Engine</h4>
                  <div class="row">
                     <div class="col-sm-6 display-table">
                        <label>Drive Train</label>
                        <div class="select-box">
                           {!! Form::select('drive_type_id', [null => 'Select Drive Type','1' => 'Front Wheel Drive','2' => 'Rear Wheel Drive','3' => 'All Wheel Drive','4' => 'Four Wheel Drive'], null) !!}
                        </div>
                     </div>
                     <div class="col-sm-6 display-table">
                        <label>Cylinders</label>
                        <div class="select-box">
                           {!! Form::select('engine_cylinders', $cylinders, null) !!}
                        </div>
                     </div>
                  </div>
                  <div class="row mar-40">
                     <div class="col-sm-6 display-table">
                        <label>Fuel Type</label>
                        <div class="select-box">
                            {!! Form::select('fuel', $fuels, null) !!}
                        </div>
                     </div>
                     <div class="col-sm-6 display-table">
                        <label>Engine</label>
                        <div class="input-box">
                          {!! Form::text('engine_description', null, ['class' => 'form-control', 'placeholder' => "Eg: 3.0L"]) !!}
                        </div>
                     </div>
                  </div>
               </fieldset>
            </div>
            <div class="form-section">
               <legend>Photos</legend>
               <fieldset>
                  <span>1</span>
                  <h4>Photos</h4>
                  <div class="row">
                     <div class="col-sm-12">
                        <div class="form-group text-center">
                           <!-- Change /upload-target to your upload address -->
                           <div class="dropzone" id="my-awesome-dropzone">
                              <div class="dz-default dz-message">
                                 <img src="/assets/images/upload-image.png" alt=""/><br />
                                 <img src="/assets/images/upload-btn.jpg" alt=""/><br/>
                                 <p class="text-center">or drag and drop them here.</p>
                              </div>
                              <div>
                                 <div  id="template" class="dz-preview dz-file-preview">
                                    <div class="dz-image">
                                       <img degree="0" data-dz-thumbnail />
                                    </div>
                                    <div class="dz-details">
                                       <div class="dz-filename"><span data-dz-name></span></div>
                                       <div class="dz-size" data-dz-size></div>
                                    </div>
                                    <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                                    <div class="dz-success-mark"><span>✔</span></div>
                                    <div class="dz-error-mark"></div>
                                    <div class="dz-error-message"><span data-dz-errormessage></span></div>
                                    <div class="photoOption">
                                       <div class="rotate">
                                          <i class="fa fa-repeat" aria-hidden="true"></i>
                                       </div>
                                       <div class="remove" data-dz-remove><i class="fa fa-trash" aria-hidden="true"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> --}}
                           </div>
                           <input id="file_names" type="hidden" name="file_names">
                        </div>
                     </div>
                  </div>
               </fieldset>
            </div>
            <div class="form-section">
               <legend>Promote Vehicle</legend>
               @if($vehicle->featured)
                <div class="promote-vehicle">
                  <div class="promote-vehicle-left">
                     <h4>Your Ad is featured!</h4>
                     <p>Your ad appears in the <span>search results</span> on the site for <span>30 days</span></p>
                  </div>
                  <div class="promote-vehicle-right">
                     <label for="vehicle-price-free">29 days remaining</label>
                  </div>
               </div>
                <input name="paid" type="hidden" value="paid">
               @else
               <div class="promote-vehicle">
                  <div class="promote-vehicle-left">
                     <h4>On Our Website!</h4>
                     <p>For 30 days your <span>Ad will appear</span> on the site for <span>FREE</span></p>
                  </div>
                  <div class="promote-vehicle-right">
                     <input name="free" type="checkbox" class="filled-in promote-check" checked id="vehicle-price-free">
                     <label for="vehicle-price-free">FREE</label>
                  </div>
               </div>
               <div class="promote-vehicle">
                  <div class="promote-vehicle-left">
                     <p>For <span>30 days</span> your ad will appear in the <span>"Featured Vehicles"</span> sections and enjoy<br /> <span>increased visibility</span> in the <span>search results.</span></p>
                  </div>
                  <div class="promote-vehicle-right">
                     <input type="checkbox" class="filled-in promote-check" id="vehicle-price">
                     <label for="vehicle-price"><span>$</span>14.95</label>
                  </div>
               </div>
               <div class="promote-vehicle paypal">
                  <p>Payments are accepted through <span>PayPal</span>. Click <span>Submit</span> to continue.</p>
                  <img src="/assets/images/paypal.jpg" alt="" />
                  <h4>Total <span>$14.95</span></h4>
                  
               </div>
               @endif
            </div>
          
       </div>
       {!! Form::close() !!}
    </div>
 </div>
</div>

<!-- Post page auth popup -->
<div id="post-member" class="modal member">
<div class="modal-content">
  <h5>LOGIN TO CONTINUE</h5>
  <div class="form-group">
    <label>Email</label>
    <input id="post-login-email" type="text" class="form-control"/>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input id="post-login-password" type="password" class="form-control" />
    <a href="#" class="forgot">Forgot It ?</a>
  </div>
  <a href="#" class="modal-action modal-close close"><i class="fa fa-times" aria-hidden="true"></i></a>
</div>
<div class="modal-footer">
  <a id="post-login-submit" class="btn waves-effect waves-light waves-input-wrapper">Login</a>
  <a id="post-signup-link" class="link" href="#">Sign Up <i class="fa fa-sign-in" aria-hidden="true"></i></a>
</div>

</div>
<div id="post-signup" class="modal member">
<div class="modal-content">
  <h5>SIGN UP</h5>
  <div class="form-group">
    <label>Email</label>
    <input id="post-signup-email" type="text" class="form-control" />
  </div>
  <div class="form-group">
    <label>Name</label>
    <input id="post-signup-name" type="text" class="form-control" />
  </div>
  <div class="form-group">
    <label>Password</label>
    <input id="post-signup-password" type="password" class="form-control"/>
  </div>
  <div class="">
    <label>Confirm Password</label>
    <input id="post-signup-cpassword" type="password" class="form-control" />
  </div>
  <a href="#" class="modal-action modal-close close"><i class="fa fa-times" aria-hidden="true"></i></a>
</div>
<div class="modal-footer">
  <a id="post-signup-submit" class="btn waves-effect waves-light waves-input-wrapper">Signup</a>
  <a id="post-login-link" class="link" href="#">Login <i class="fa fa-sign-in" aria-hidden="true"></i></a>
</div>
</div>
<!-- Vehicle Post end -->
@endsection

@section('javascript')
<script src="/assets/js/dropzone.js"></script>
<script>
$(function() {
    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);
    var file_prefix = '{{ $image_key }}'; // create a random file prefix to avoid overrite

    //console.log(previewTemplate);
    // var myDropzone = new Dropzone("#my-awesome-dropzone");
    Dropzone.options.myAwesomeDropzone = {
        // addRemoveLinks: true,
        url: "/save-image",
        paramName: "file", // The name that will be used to transfer the file
        headers: {
            'X-CSRF-Token': $('input[name="_token"]').val()
        },
        maxFilesize: 20, // MB
        // previewsContainer: "#previews",
        // dictRemoveFile:         'asdasd',
        acceptedFiles: "image/*",
        maxFiles: "10",
        renameFilename: function(filename) {
            return file_prefix + '_' + filename;
        },
        removedfile: function(file) {
            $(document).find(file.previewElement).remove();
            console.log(file)
            var filename = file_prefix + '_' + file.name;
            var data = {
                file_name: filename,
                vehicle_id: {{ $vehicle->id}},
                "_token": "{{ csrf_token() }}"
            }
            $.post("/remove-image-editpost", data).done(function(data) {
                if (data.status == "success") {
                    toastr.success('Image removed')
                    // var files = $('#file_names').val()
                    // files = files.replace(filename, "");
                    // files = files.replace("^^", "^");
                    // $('#file_names').val(files)
                    // console.log($('#file_names').val())
                } else {
                    toastr.error('Error removing image')
                }
            });
        },
        previewTemplate: previewTemplate,
        accept: function(file, done) {
          console.log(file)
          console.log(file.name)
          var image_path  = '/uploads/vehicle/'+file_prefix + '_' + file.name;
          var data = {
                image_path: image_path,
                vehicle_id: {{ $vehicle->id}},
                "_token": "{{ csrf_token() }}"
            }
          $.post("/save-image-editpost", data).done(function(data) {
                if (data.status == "success") {
                    toastr.success('Image Added')
                    // var files = $('#file_names').val()
                    // files = files.replace(filename, "");
                    // files = files.replace("^^", "^");
                    // $('#file_names').val(files)
                    // console.log($('#file_names').val())
                } else {
                    toastr.error('Error adding image')
                }
            });
          // var files = $('#file_names').val()
          // $('#file_names').val(files+file_prefix + '_' + file.name+'^') // Adding ^ as separator
          done();
        },
        init: function(){
          var files_json = '{!! $dropzone_files !!}';
          // console.log(files_json)
          var files_obj = JSON.parse(files_json)
          drop = this
          $.each(files_obj, function(key,image){
            console.log(image)
            var temp = image.path.split('/').pop().split('_');
            temp.shift()
            var name = temp.join('_')
            var mockFile = { name: name, size: 1 };
            drop.emit("addedfile", mockFile);
            drop.emit("thumbnail", mockFile, image.path);
            drop.emit("complete", mockFile);
            drop.options.maxFiles = 10;
          })
        }
    };

    $(document.body).on('click', '.rotate', function() {
        var img = $(this).parent().siblings('.dz-image').children('img');
        var file_name = $(this).parent().siblings('.dz-details').find('span').text();
        var degree = parseInt(img.attr('degree'));
        degree += 90;
        $(this).parent().siblings('.dz-image').children('img').css({
            "-webkit-transform": "rotate(" + degree + "deg)",
            "-moz-transform": "rotate(" + degree + "deg)",
            "transform": "rotate(" + degree + "deg)" /* For modern browsers(CSS3)  */
        });
        img.attr('degree', degree)
        var data = {
            file_name: file_name,
            "_token": "{{ csrf_token() }}"
        }
        $.post("/rotate-image", data).fail(function(xhr, status, error) {
            var obj = JSON.parse(xhr.responseText);
              toastr.error(obj.error.message)
        });

    })



//------Form-----multistep----// 

var sfw = $("#post-edit-form").stepFormWizard({
        theme: 'sun',
        height: 'auto',
        markPrevSteps: true,
        nextBtn: $('<a class="next-btn sf-right sf-btn btn waves-effect waves-light " href="#">NEXT <i class="icofont icofont-rounded-right"></i></a>'),
        prevBtn: $('<a class="prev-btn sf-left sf-btn btn grey waves-effect waves-light  " href="#"><i class="icofont icofont-rounded-left"></i> PREV</a>'),
        finishBtn: $('<button id="submit-btn" class="finish-btn btn sf-btn sf-btn-finish waves-effect waves-light" type="submit" value="FINISH">Save Changes</button>'),
        onNext: function(i, wizard) {
            var form = $("#vehicle-form");
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
                    $.get("/loggedInUser", function(data) {
                        if (data.status == "success") {
                            $('#submit-btn').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:2.0rem" aria-hidden="true"></i>  SAVING VEHICLE');
                            $.ajax({
                                url: form.action,
                                type: form.method,
                                data: $(form).serialize(),
                                success: function(response) {
                                    window.location = response.url;
                                }
                            });
                        } else {
                            $('#post-member').openModal();
                        }
                    });
                }
            })
            if (form.valid() == true) {
                return true;
            } else {
                return false;
            }
        }


    });
    sfw.refresh();

    $('input.promote-check').on('change', function() {
        $('input.promote-check').not(this).prop('checked', false);
    });

    $("#post-edit-form").on('sf-step-after', function(e, from, to, data) {
            $('html, body').animate({
                scrollTop: $('.sf-content').offset().top - 60
            }, 300);
            e.preventDefault();
        })

    //------Form-----multistep--end--// 

})
</script>

<script type="text/javascript">
$('#post-signup-link').on('click', function(e) {
    e.preventDefault();
    $('#post-member').closeModal();
    $('#post-signup').openModal();
});

$('#post-login-link').on('click', function(e) {
    e.preventDefault();
    $('#post-signup').closeModal();
    $('#post-member').openModal();
});

$('#post-login-submit').on('click', function(e) {
    toastr.clear()
    NProgress.start();
    var data = {
        email: $('#post-login-email').val(),
        password: $('#post-login-password').val(),
        "_token": "{{ csrf_token() }}"
    }
    $.post("/login", data).done(function(data) {
        NProgress.done();
        if (data.status == "success") {
            toastr.success('Checkout your saved vehicles in dashboard', 'You have logged in Successfully')
            $('#post-member').closeModal();
            $('#signup-li').replaceWith('<li id="dashboard-li"><a href="dashboard">Dashboard</a></li>');
            $('#login-li').replaceWith('<li id="logout-li"><a href="#">Logout</a></li>');
            console.log('aaa')
            $('#vehicle-form').submit();
        } else {
            toastr.error(data.error, 'Error')
        }
        console.log(data);
    });
});

$('#post-signup-submit').on('click', function(e) {
    toastr.clear()
    NProgress.start();
    if ($('#post-signup-password').val() != $('#post-signup-cpassword').val()) {
        toastr.error('Passwords do not match', 'Error')
        NProgress.done();
        return
    }
    var data = {
        email: $('#post-signup-email').val(),
        name: $('#post-signup-name').val(),
        password: $('#post-signup-password').val(),
        "_token": "{{ csrf_token() }}"
    }
    $.post("/signup", data).done(function(data) {
        NProgress.done();
        if (data.status == "success") {
            toastr.success('Checkout your saved vehicles in dashboard', 'Registered Successfully')
            $('#post-signup').closeModal();
            $('#signup-li').replaceWith('<li id="dashboard-li"><a href="dashboard">Dashboard</a></li>');
            $('#login-li').replaceWith('<li id="logout-li"><a href="#">Logout</a></li>');
            console.log('aaxa')
            $('#vehicle-form').submit();
        } else {
            toastr.error(data.error, 'Error')
        }
        console.log(data);
    });
});

</script>
@endsection