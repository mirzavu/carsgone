@extends('layouts.main')
@section('content')
<!-- Vehicle Post start -->
<div class="vehicle-post-outer">
   <div class="container">
      <div class="wrapper">
         <div class="dealer-info">
            <div class="panel full">
               <div class="panel-heading">
                  <h1>CREATE A VEHICLE LISTING</h1>
               </div>
               <div class="panel-body">
                  {!! $content !!}
               </div>
            </div>
         </div>
         <div class="post-tab clearfix panel" id="post-create-form">
            <div class="form-section">
               <form id="vehicle-form" method="post" action="/post/create">
                  <legend>Vehicle Info</legend>
                  <fieldset>
                     <span>1</span>
                     <h4>Make &amp; Model</h4>
                     <div class="row">
                        <div class="col-sm-6 display-table">
                           <label>Year<span class="required">*</span></label>
                           <div class="input-box">
                              <input name="year" type="text" minlength="4" maxlength="4" class="form-control" placeholder="Enter Year" required />
                           </div>
                        </div>
                        <div class="col-sm-6 display-table">
                           <label>Make<span class="required">*</span></label>
                           <div class="input-box">
                              <input id="make-autocomplete" name="make_name" type="text" maxlength="60" class="form-control autocomplete" placeholder="Enter Make" required />
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 display-table">
                           <label>Model<span class="required">*</span></label>
                           <div class="input-box">
                              <input id="model-autocomplete" name="model_name" type="text" maxlength="60" class="form-control autocomplete" placeholder="Enter Model" required />
                           </div>
                        </div>
                        <div class="col-sm-6 display-table">
                           <label>Trim Code</label>
                           <div class="input-box">
                              <input name="trim" type="text" class="form-control" placeholder="Enter Trim" />
                           </div>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <span>2</span>
                     <h4>Price & Mileage</h4>
                     <div class="row">
                        <div class="col-sm-6 display-table">
                           <label>Price<span class="required">*</span></label>
                           <div class="input-box">
                              <input type="text" class="form-control" name="price" placeholder="Price eg: $12,000" minlength="3" required/>
                           </div>
                        </div>
                        <div class="col-sm-6 display-table">
                           <label>Mileage</label>
                           <div class="input-box">
                              <input type="text" class="form-control" name="odometer" placeholder="Mileage eg: 12,000" />
                           </div>
                        </div>
                     </div>
                  </fieldset>
                  <fieldset>
                     <span>3</span>
                     <h4>Vehicle Info</h4>
                     <div class="row">
                        <div class="col-sm-6 display-table">
                           <label>Body Style<span class="required">*</span></label>
                           <div class="select-box">
                              <select name="body_style_group_id" required>
                                 <option value="" disabled selected>Select Body Style</option>
                                 @foreach ($body_style_groups as $body)
                                 <option value="{{$body->id}}">{{$body->body_style_group_name}}</option>
                                 @endforeach
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-6 display-table">
                           <label>Transmission</label>
                           <div class="select-box">
                              <select name="transmission">
                                 <option value="" disabled selected>Select Transmission</option>
                                 <option value="auto">Automatic</option>
                                 <option value="manual">Standard</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 display-table">
                           <label>Exterior Colour</label>
                           <div class="select-box">
                              <select name="colour_exterior">
                                 <option value="" disabled selected>Select Exterior Color</option>
                                 <option>Beige</option>
                                 <option>Black</option>
                                 <option>Blue</option>
                                 <option>Bronze</option>
                                 <option>Brown</option>
                                 <option>Burgundy</option>
                                 <option>Champagne</option>
                                 <option>Charcoal</option>
                                 <option>Dark Blue</option>
                                 <option>Dark Green</option>
                                 <option>Dark Grey</option>
                                 <option>Gold</option>
                                 <option>Green</option>
                                 <option>Grey</option>
                                 <option>Light Blue</option>
                                 <option>Light Green</option>
                                 <option>Maroon</option>
                                 <option>Off White</option>
                                 <option>Orange</option>
                                 <option>Pewter</option>
                                 <option>Plum</option>
                                 <option>Purple</option>
                                 <option>Red</option>
                                 <option>Silver</option>
                                 <option>Tan</option>
                                 <option>Teal</option>
                                 <option>White</option>
                                 <option>Yellow</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-6 display-table">
                           <label>Interior Colour</label>
                           <div class="select-box">
                              <select name="colour_interior">
                                 <option value="" disabled selected>Select Interior Color</option>
                                 <option>Beige</option>
                                 <option>Black</option>
                                 <option>Blue</option>
                                 <option>Bronze</option>
                                 <option>Brown</option>
                                 <option>Burgundy</option>
                                 <option>Champagne</option>
                                 <option>Charcoal</option>
                                 <option>Dark Blue</option>
                                 <option>Dark Green</option>
                                 <option>Dark Grey</option>
                                 <option>Gold</option>
                                 <option>Green</option>
                                 <option>Grey</option>
                                 <option>Light Blue</option>
                                 <option>Light Green</option>
                                 <option>Maroon</option>
                                 <option>Off White</option>
                                 <option>Orange</option>
                                 <option>Pewter</option>
                                 <option>Plum</option>
                                 <option>Purple</option>
                                 <option>Red</option>
                                 <option>Silver</option>
                                 <option>Tan</option>
                                 <option>Teal</option>
                                 <option>White</option>
                                 <option>Yellow</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 display-table">
                           <label>Doors</label>
                           <div class="select-box">
                              <select name="doors">
                                 <option value="" disabled selected>Select Doors</option>
                                 <option value="1">1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                                 <option value="5">5</option>
                                 <option value="6">6+</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-6 display-table">
                           <label>Passengers</label>
                           <div class="select-box">
                              <select name="passenger">
                                 <option value="" disabled selected>Select Passengers</option>
                                 @php 
                                 for($i=1;$i<17;$i++)
                                 {
                                 echo '
                                 <option value="'.$i.'">'.$i.'</option>
                                 ';
                                 }
                                 @endphp
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-12 display-table textarea">
                           <label>Description</label>
                           <div class="input-box">
                              <textarea class="form-control" name="text" placeholder="Enter Description"></textarea>
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
                              <select name="drive_type_id">
                                 <option value="" disabled selected>Select Drive</option>
                                 <option value="1">Front Wheel Drive</option>
                                 <option value="2">Rear Wheel Drive</option>
                                 <option value="3">All Wheel Drive</option>
                                 <option value="4">Four Wheel Drive</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-6 display-table">
                           <label>Cylinders</label>
                           <div class="select-box">
                              <select name="engine_cylinders">
                                 <option value="" disabled selected>Select Cylinders</option>
                                 @php 
                                 for($i=2;$i<13;$i++)
                                 {
                                 echo '
                                 <option value="'.$i.'">'.$i.'</option>
                                 ';
                                 }
                                 @endphp
                                 <option value="13">13+</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="row mar-40">
                        <div class="col-sm-6 display-table">
                           <label>Fuel Type</label>
                           <div class="select-box">
                              <select name="fuel">
                                 <option value="" disabled selected>Select Fuel Type</option>
                                 <option>Unleaded</option>
                                 <option>Leaded</option>
                                 <option>Premium</option>
                                 <option>Diesel</option>
                                 <option>Electric</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-6 display-table">
                           <label>Engine</label>
                           <div class="input-box">
                              <input name="engine_description" type="text" class="form-control" placeholder="Engine Description Eg: 3.0L" />
                           </div>
                        </div>
                     </div>
                  </fieldset>
               </form>
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
                                       <div class="rotate tooltipped" data-position="bottom" data-delay="10" data-tooltip="Rotate">
                                          <i class="fa fa-repeat" aria-hidden="true"></i>
                                       </div>
                                       <div class="set-default tooltipped" data-position="bottom" data-delay="10" data-tooltip="Set as Main Photo"><i class="fa fa-camera-retro" aria-hidden="true"></i>
                                       </div>
                                       <div class="remove tooltipped" data-position="bottom" data-delay="10" data-tooltip="Remove" data-dz-remove><i class="fa fa-trash" aria-hidden="true"></i>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                           </div>
                        </div>
                     </div>
                  </div>
               </fieldset>
            </div>
            <div class="form-section">
               <form id="contact-info">
                  <legend>Contact Info</legend>
                  <fieldset>
                     <div class="row">
                        <div class="col-sm-6 display-table">
                           <label>Seller Type<span class="required">*</span></label>
                           <div class="select-box">
                              <select name="role" required>
                                 <option value="" disabled selected>Select</option>
                                 <option value="dealer">Dealer</option>
                                 <option value="member">Private</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-sm-6 display-table">
                           <label>Phone</label>
                           <div class="input-box">
                              <input name="phone" minlength="8" maxlength="12" type="text" class="form-control" placeholder="Eg: 111-111-1111"/>
                           </div>
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-sm-6 display-table">
                           <label>Email<span class="required">*</span></label>
                           <div class="input-box">
                              <input name="email" type="email" class="form-control" placeholder="Enter Email" required/>
                           </div>
                        </div>
                        <div class="col-sm-6 display-table">
                           <label>Postal Code<span class="required">*</span></label>
                           <div class="input-box">
                              <input name="postal_code" minlength="6" maxlength="7" pattern="^[A-Za-z]\d[A-Za-z][ -]?\d[A-Za-z]\d$" type="text" class="form-control" placeholder="Enter Postal Code" required/>
                           </div>
                        </div>
                     </div>
                  </fieldset>
                  <div class="promote-vehicle">
                     <div class="promote-vehicle-left">
                        <h4>On Our Website!</h4>
                        <p>For 30 days your <span>Ad will appear</span> on the site for <span>FREE</span></p>
                     </div>
                     <div class="promote-vehicle-right">
                        <input name="free" type="checkbox" class="filled-in promote-check" checked id="vehicle-price-free">
                        <label for="vehicle-price-free" class="promote-label">FREE</label>
                     </div>
                  </div>
                  <div class="promote-vehicle">
                     <div class="promote-vehicle-left">
                        <p>For <span>30 days</span> your ad will appear in the <span>"Featured Vehicles"</span> sections and enjoy<br /> <span>increased visibility</span> in the <span>search results.</span></p>
                     </div>
                     <div class="promote-vehicle-right">
                        <input type="checkbox" class="filled-in promote-check" id="vehicle-price">
                        <label for="vehicle-price" class="promote-label"><span>$</span>14.95</label>
                     </div>
                  </div>
                  <div class="promote-vehicle paypal">
                     <p>Payments are accepted through <span>PayPal</span>. Click <span>Submit</span> to continue.</p>
                     <img src="/assets/images/paypal.jpg" alt="" />
                     <h4>Total <span>$14.95</span></h4>
                  </div>
                  <input id="file_names" type="hidden" name="file_names">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
               </form>
            </div>
         </div>
      </div>
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
        var file_prefix = Math.random().toString(36).substr(2, 9); // create a random file prefix to avoid overrite

        //console.log(previewTemplate);
        // var myDropzone = new Dropzone("#my-awesome-dropzone");
        Dropzone.options.myAwesomeDropzone = {
            // addRemoveLinks: true,
            url: "{{ url('/') }}/save-image",
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
                    "_token": "{{ csrf_token() }}"
                }
                $.post("/remove-image", data).done(function(data) {
                    if (data.status == "success") {
                        toastr.success('Image removed')
                        var files = $('#file_names').val()
                        files = files.replace(filename, "");
                        files = files.replace("^^", "^");
                        $('#file_names').val(files)
                        console.log($('#file_names').val())
                    } else {
                        toastr.error('Error removing image')
                    }
                });
            },
            previewTemplate: previewTemplate,
            accept: function(file, done) {
                var files = $('#file_names').val()
                $('#file_names').val(files + file_prefix + '_' + file.name + '^') // Adding ^ as separator
                done();
                console.log(this.files.length)
                if (this.files.length == 1) {
                    $('.dz-image:first').addClass('main-photo')
                }

                $('.tooltipped').tooltip({
                    delay: 10
                });
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
            $.post("/rotate-image", data).done(function(data) {

            });

        })

        $(document.body).on('click', '.set-default', function() {
            $('.dz-image').removeClass('main-photo');
            $(this).parent().siblings('.dz-image').addClass('main-photo');

            // Remove element from files string and add in the beginning
            var file_name = $(this).parent().siblings('.dz-details').find('span').text();
            var names = $('#file_names').val().split('^')
            console.log(file_name)
            console.log(names)
            console.log(names.indexOf(file_name))
            var index = names.indexOf(file_name)
            names.splice(index, 1);
            names.unshift(file_name)
            names = names.join('^')
            $('#file_names').val(names)
        })

        // $("#my-awesome-dropzone").sortable({
        //     items:'.dz-preview',
        //     cursor: 'move',
        //     opacity: 0.5,
        //     containment: '#image-dropzone',
        //     distance: 20,
        //     tolerance: 'pointer'
        // });

        //------Form-----multistep----// 

        var sfw = $("#post-create-form").stepFormWizard({
            theme: 'sun',
            height: 'auto',
            markPrevSteps: true,
            nextBtn: $('<a class="next-btn sf-right sf-btn btn waves-effect waves-light " href="#">NEXT <i class="icofont icofont-rounded-right"></i></a>'),
            prevBtn: $('<a class="prev-btn sf-left sf-btn btn grey waves-effect waves-light  " href="#"><i class="icofont icofont-rounded-left"></i> PREV</a>'),
            finishBtn: $('<button id="submit-btn" class="finish-btn btn sf-btn sf-btn-finish waves-effect waves-light" type="submit" value="FINISH">Submit Vehicle</button>'),
            onNext: function(i, wizard) {
                var myDropzone = Dropzone.forElement("#my-awesome-dropzone");
                if (myDropzone.getUploadingFiles().length) {
                    toastr.warning('Uploading photos', 'Please wait')
                    return false;
                }
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

                    }
                })

                if (form.valid() == true) {
                    return true;
                } else {
                    return false;
                }
            },
            onFinish: function(i) {
                var form2 = $("#contact-info");
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
                $('#submit-btn').prop('disabled', true).html('<i class="fa fa-circle-o-notch fa-spin" style="font-size:2.0rem" aria-hidden="true"></i>  SAVING VEHICLE');
                $.ajax({
                    url: '{{ url('/')}}/post/create',
                    type: 'POST',
                    data: $('form').serialize(),
                    success: function(response) {
                        console.log(response)
                        if (response.status == "fail") {
                            $('#submit-btn').prop('disabled', false).html('Submit Vehicle')
                            toastr.error(response.error, 'Error')
                        } else {
                            window.location = response.url;
                        }

                    }
                });
            }



        });
        sfw.refresh();

        $('input.promote-check').on('change', function() {
            $('input.promote-check').not(this).prop('checked', false);
        });

        $("#post-create-form").on('sf-step-after', function(e, from, to, data) {
            $('html, body').animate({
                scrollTop: $('.sf-content').offset().top - 60
            }, 300);
            e.preventDefault();
        })

        //------Form-----multistep--end--// 

        $.get( "https://www.carsgone.com/get-makes-json", function( data ) {
            var list={};
           $.each(JSON.parse(data), function(index, row){
               list[row] = null;
           })

           $('#make-autocomplete').autocomplete({

                data: list,
                limit: 5, // The max amount of results that can be shown at once. Default: Infinity.
                onAutocomplete: function(val) {
                  $.get( "https://www.carsgone.com/get-models-json/"+val, function( data ) {
                     console.log(data)
                    var model_list={};
                    $.each(JSON.parse(data), function(index, row){
                        model_list[row] = null;
                    })
                    $('#model-autocomplete').autocomplete({

                         data: model_list,
                         limit: 5,
                    });
                  });
                },
                minLength: 1, // The minimum length of the input for the autocomplete to start. Default: 1.
           });

         });

    })
</script>
@endsection