@include('webapp.layout.header')

<section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Edit Food</h1>
                <h2><a href="/">Home </a> &nbsp;/&nbsp; Edit Food</h2>
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
						<h3 class="heading">Edit Food</h3>
                            @if(session()->has('message'))
                            <div class="alert alert-success m-auto text-center alert-dismissible">
                                <strong>Success!! </strong> {{ session()->get('message') }}
                                <button type="button" class="close mt-0" data-dismiss="alert">&times;</button>
                            </div>
                        @endif
                  
						<form method="POST" action="/updatefood/{{$food->id}}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="created_by" value="{{$data->id}}">
							<div class="row">
                           
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Category<span class="text-danger">*</span></label>
                                <select class="form-control rounded-0 select2" id="category" name="category" required>
                                            <option value="" selected disabled>Category</option>
                                                <option value="Adult" @if($food->category=='Adult') selected @endif>Adult</option>
                                                <option value="Child" @if($food->category=='Child') selected @endif>Child</option>
                                        </select>
                                </div> 
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Food Image<span class="text-danger">*</span></label>
                                <input class="form-control" type="file" name="food_image" accept="image/*">
                                @if(!empty($food->food_image))
                                <a target="_blank" href="/images/food_images/{{$food->food_image}}"><img src="/images/food_images/{{$food->food_image}}" height="40" width="40"></a>
                                @endif
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" type="text" rows="5" placeholder="Enter Description" name="description" required>{{$food->description}}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Quantity<span class="text-danger">*</span></label>
                                <input class="form-control" type="number" onkeypress="return isNumber(event)" placeholder="Enter Quantity" value="{{$food->quantity}}" name="quantity" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Age Limit<span class="text-danger">*</span></label>
                                <input class="form-control" type="text" value="{{$food->age_limit}}" name="age_limit" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Food Type<span class="text-danger">*</span></label>
                                <select class="form-control rounded-0 select2" id="type" name="type" required>
                                            <option value="" selected disabled>Food Type</option>
                                                <option value="Veg" @if($food->type=='Veg') selected @endif>Veg</option>
                                                <option value="Nonveg" @if($food->type=='Nonveg') selected @endif>Nonveg</option>
                                        </select>
                                </div> 
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Calories<span class="text-danger">*</span></label>
                                <input class="form-control" value="{{$food->calories}}" type="text" placeholder="Enter Calories" name="calories" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Expiry Date<span class="text-danger">*</span></label>
                                <input class="form-control" value="{{$food->expiry_date}}" type="date" name="expiry_date" placeholder="Enter Expiry Date" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Contact Info<span class="text-danger">*</span></label>
                                <input class="form-control" value="{{$food->contact_info}}" type="text" placeholder="Enter Contact Info" name="contact_info" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Location<span class="text-danger">*</span></label>
                                <input class="form-control" value="{{$food->location}}" type="text" placeholder="Enter Location" name="location" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Related Food<span class="text-danger">*</span></label>
                                <input class="form-control" value="{{$food->related_food}}" type="text" placeholder="Enter Related Food" name="related_food" required>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                <label>Reward Points<span class="text-danger">*</span></label>
                                <input class="form-control" type="number" value="{{$food->reward_points}}" placeholder="Enter Reward Points" name="reward_points" required>
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