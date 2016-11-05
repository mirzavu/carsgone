@extends('layouts.main')

@section('title', 'Carsgone')

@section('content')
<!-- Vehicle Post start -->
<div class="vehicle-post-outer">
 <div class="container">
    <div class="wrapper">
       <div class="dealer-info">
          <div class="panel full">
             <div class="panel-heading">
                <h2>CREATE A VEHICLE LISTING</h2>
             </div>
             <div class="panel-body">
                <h3>POST YOUR AUTOMOTIVE CLASSIFIEDS FOR FREE!</h3>
                <p>Carsgone.com makes finding the right vehicle for you an easy and painless experience, but did you know that you can also list your vehicle just as easily? We offer a fast solution to posting automotive classifieds for both dealerships and private sellers. By filling out the information on this page you are creating a quality listing that will be viewed by thousands of potential buyers, and the best part: it's completely FREE!</p>
             </div>
          </div>
       </div>
       <div class="post-tab clearfix" id="wizard_example">
          <div class="form-section">
             <legend>Vehicle Info</legend>
             <fieldset>
                <span>1</span>
                <h4>Make &amp; Model</h4>
                <div class="row">
                   <div class="col-sm-6 display-table">
                      <label>Year</label>
                      <div class="select-box">
                         <select>
                            <option value="1">2017</option>
                            <option value="2">2016</option>
                            <option value="3">2015</option>
                            <option value="4">2014</option>
                            <option value="4">2013</option>
                            <option value="4">2012</option>
                            <option value="4">2011</option>
                            <option value="4">2010</option>
                         </select>
                      </div>
                   </div>
                   <div class="col-sm-6 display-table">
                      <label>Make</label>
                      <div class="select-box">
                         <select id="make-select" name="make">
                             <option value="" disabled selected>Select Make</option>
                             @foreach ($makes as $make)
                             <option value="{{$make->id}}">{{$make->make_name}}</option>
                             @endforeach
                         </select>
                      </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-sm-6 display-table">
                      <label>Model</label>
                      <div class="select-box">
                         <select id="model-select" name="model">
                            <option value="" disabled selected>Select Model</option>
                         </select>
                      </div>
                   </div>
                   <div class="col-sm-6 display-table">
                      <label>Trim Code</label>
                      <div class="input-box">
                         <input type="text" class="form-control" placeholder="Enter Trim" />
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
                         <input type="text" class="form-control" placeholder="eg: $12,000" />
                      </div>
                   </div>
                   <div class="col-sm-6 display-table">
                      <label>Mileage</label>
                      <div class="input-box">
                         <input type="text" class="form-control" placeholder="eg: 12,000" />
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
                         <select>
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
                        
                         <select>
                            <option value="" disabled selected>Select Transmission</option>
                            <option value="1">Automatic</option>
                            <option value="2">Standard</option>
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
                         <select name="colour_exterior">
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
                         <select>
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
                         <select>
                            @php 
                            for($i=1;$i<17;$i++)
                            {
                              echo '<option value="'.$i.'">'.$i.'</option>';
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
                         <textarea class="form-control" name="description"></textarea>
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
                         <select>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                            <option value="4">Option 4</option>
                         </select>
                      </div>
                   </div>
                   <div class="col-sm-6 display-table">
                      <label>Cylinders</label>
                      <div class="select-box">
                         <select>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                            <option value="4">Option 4</option>
                         </select>
                      </div>
                   </div>
                </div>
                <div class="row mar-40">
                   <div class="col-sm-6 display-table">
                      <label>Fuel Type</label>
                      <div class="select-box">
                         <select>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                            <option value="4">Option 4</option>
                         </select>
                      </div>
                   </div>
                   <div class="col-sm-6 display-table">
                      <label>Engine</label>
                      <div class="select-box">
                         <select>
                            <option value="1">Option 1</option>
                            <option value="2">Option 2</option>
                            <option value="3">Option 3</option>
                            <option value="4">Option 4</option>
                         </select>
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
                         <form action="/save-image" class="dropzone" id="my-awesome-dropzone">
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
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                         </form>
                      </div>
                   </div>
                </div>
             </fieldset>
          </div>
          <div class="form-section">
             <legend>Promote Vehicle</legend>
             <div class="promote-vehicle">
                <div class="promote-vehicle-left">
                   <h4>On Our Website!</h4>
                   <p>For 30 days your <span>Ad will appear</span> on the site for <span>FREE</span></p>
                </div>
                <div class="promote-vehicle-right">
                   <input type="checkbox" class="promote-check" checked id="vehicle-price-free">
                   <label for="vehicle-price-free">FREE</label>
                </div>
             </div>
             <div class="promote-vehicle">
                <div class="promote-vehicle-left">
                   <h4>On Our Website!</h4>
                   <p>For <span>30 days</span> your ad will appear in the <span>"Featured Vehicles"</span> sections and enjoy<br /> <span>increased visibility</span> in the <span>search results.</span></p>
                </div>
                <div class="promote-vehicle-right">
                   <input type="checkbox" class="promote-check" id="vehicle-price">
                   <label for="vehicle-price"><span>$</span>14.95</label>
                </div>
             </div>
             <div class="promote-vehicle paypal">
                <p>Payments are accepted through <span>PayPal</span>. Click <span>Submit</span> to continue.</p>
                <img src="/assets/images/paypal.jpg" alt="" />
                <h4>Total <span>$14.95</span></h4>
                <div class="form-group submit-btn">
                   <input class="finish-btn btn waves-effect waves-light" type="submit" value="Submit vehicle Now"/>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>
</div>
<!-- Vehicle Post end -->
@endsection

@section('javascript')

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
             paramName: "file", // The name that will be used to transfer the file
             //maxFilesize: 0.1, // MB
             // previewsContainer: "#previews",
             // dictRemoveFile:         'asdasd',
             acceptedFiles: "image/*",
             maxFiles: "10",
             maxFilesize: "5",
             renameFilename: function (filename) {
                return file_prefix + '_' + filename;
            },
            removedfile: function (file) {
            	$(document).find(file.previewElement).remove();
            	console.log(file)
                var filename = file_prefix + '_' + file.name;
                var data = { file_name: filename, "_token": "{{ csrf_token() }}"}
                $.post( "/remove-image", data).done(function( data ) {
				    if(data.status=="success")
				    {
				      toastr.success( 'Image removed')
				    }
				    else
				    {
				      toastr.error('Error removing image')
				    }
				  });
            },
             previewTemplate: previewTemplate,
             accept: function(file, done) {
               if (file.name == "justinbieber.jpg") {
                 done("Naha, you don't.");
               }
               else { done(); }
             }
             };

             $(document.body).on('click', '.rotate' ,function(){
                var img = $(this).parent().siblings('.dz-image').children('img');
                var file_name = $(this).parent().siblings('.dz-details').find('span').text();
                var degree = parseInt(img.attr('degree'));
                degree+=90;
                $(this).parent().siblings('.dz-image').children('img').css({
                    "-webkit-transform": "rotate("+degree+"deg)",
                    "-moz-transform": "rotate("+degree+"deg)",
                    "transform": "rotate("+degree+"deg)" /* For modern browsers(CSS3)  */
                });
                img.attr('degree',degree)
                var data = { file_name: file_name, "_token": "{{ csrf_token() }}"}
                $.post( "/rotate-image", data).done(function( data ) {
				    
				  });

             })

         })
      </script>
@endsection