@include('webapp.layout.header')

<section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Upload Food</h1>
                <h2><a href="/">Home </a> &nbsp;/&nbsp; Upload Food</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION DASHBOARD -->
    <section class="user-page section-padding">
        <div class="container">
            <div class="row">
            @include('webapp.layout.sidebar')
                <div class="col-lg-8 col-md-12 col-xs-12">
					   <div class="my-address pro">
						<h3 class="heading">Upload Food</h3>
                            @if(session()->has('message'))
                            <div class="alert alert-success m-auto text-center alert-dismissible">
                                <strong>Success!! </strong> {{ session()->get('message') }}
                                <button type="button" class="close mt-0" data-dismiss="alert">&times;</button>
                            </div>
                        @endif
                  
						<form method="POST" action="/savefood" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="created_by" value="{{$data->id}}">
							<div class="row">
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Category<span class="text-danger">*</span></label>
                                <select class="form-control rounded-0 select2" id="category" name="category" required>
                                            <option value="" selected disabled>Category</option>
                                                <option value="Adult">Adult</option>
                                                <option value="Child">Child</option>
                                        </select>
                                </div> 
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Food Image<span class="text-danger">*</span></label>
                                <input class="form-control" type="file" name="food_image" accept="image/*" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" type="text" rows="5" placeholder="Enter Description" name="description" required></textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Quantity<span class="text-danger">*</span></label>
                                <input class="form-control" type="number" onkeypress="return isNumber(event)" placeholder="Enter Quantity" name="quantity" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Age Limit<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="age_limit" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Food Type<span class="text-danger">*</span></label>
                                <select class="form-control rounded-0 select2" id="type" name="type" required>
                                            <option value="" selected disabled>Food Type</option>
                                                <option value="Veg">Veg</option>
                                                <option value="Nonveg">Nonveg</option>
                                        </select>
                                </div> 
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Calories<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="Enter Calories" name="calories" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Expiry Date<span class="text-danger">*</span></label>
                                <input class="form-control" type="date" name="expiry_date" placeholder="Enter Expiry Date" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Contact Info<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="Enter Contact Info" name="contact_info" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Location<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="Enter Location" name="location" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Related Food<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" placeholder="Enter Related Food" name="related_food" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Reward Points<span class="text-danger">*</span></label>
                                <input class="form-control" type="number" placeholder="Enter Reward Points" name="reward_points" required>
                                </div>
                            </div>

                            
                        
								<div class="col-lg-12">
									<div class="send-btn text-center">
										<button type="submit" class="btn btn-primary btn-lg">Submit</button>
									</div>
								</div>
							</div>
						</form>
                      
                    
                        
					</div>
				</div>
            </div>
        </div>
    </section>
    <!-- END SECTION DASHBOARD -->

@include('webapp.layout.footer')

<script>
 function isNumber(evt) {
     evt = (evt) ? evt : window.event;
     var charCode = (evt.which) ? evt.which : evt.keyCode;
     if (charCode > 31 && (charCode < 48 || charCode > 57)) {
       return false;
     }
     return true;
   }

</script>