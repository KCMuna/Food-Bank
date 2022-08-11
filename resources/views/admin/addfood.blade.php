 @include('admin.layout.header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
             
            <h1>Add Food</h1>
            
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
                
                <li class="breadcrumb-item active">Add Food</li>
               
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
          <div class="card-header">
            <!-- <h3 class="card-title">Select2 (Default Theme)</h3>
 -->
  @if(session()->has('error'))
                                                    <div class="alert alert-danger m-auto text-center alert-dismissible">
                                                            <strong>Error!! </strong> {{ session()->get('error') }}
                                                            <button type="button" class="close mt-0" data-dismiss="alert">&times;</button>
                                                        </div>
                                                    @endif
  @if(session()->has('message'))
                                                    <div class="alert alert-success m-auto text-center alert-dismissible">
                                                            <strong>Success!! </strong> {{ session()->get('message') }}
                                                            <button type="button" class="close mt-0" data-dismiss="alert">&times;</button>
                                                        </div>
                                                    @endif
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <form method="POST" action="/savefood" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="created_by" value="{{$_SESSION['adminid']}}">
                        <div class="card-body">
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
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
   @include('admin.layout.footer')

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