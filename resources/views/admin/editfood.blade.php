@include('admin.layout.header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
           
          <h1>Edit Foods</h1>
          
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
              
              <li class="breadcrumb-item active">Edit Foods</li>
             
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
         <form method="POST" action="/admin/updatelisting/{{$listing->id}}" enctype="multipart/form-data">
              {{ csrf_field() }}
        <div class="card-body">
          
          <input type="hidden" name="created_by" value="{{$_SESSION['adminid']}}">
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
                               <input class="form-control" type="file" name="food_image" accept="image/*" >
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
      <!-- /.card -->
      </form>
      
      
     
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->


 @include('admin.layout.footer')

 <script>
   $(document).on('click', '.toggle-password', function() {

$(this).toggleClass("fa-eye fa-eye-slash");

var input = $(".pass_log_id");
input.attr('type') === 'password' ? input.attr('type','text') : input.attr('type','password')
});


    //Date picker
   $('#reservationdate').datetimepicker({
       format: 'DD/MM/YYYY'
   });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({ 
       icons: { time: 'far fa-clock' } ,
       format:'DD/MM/YYYY HH:mm:A',
   });

    $('input[type=radio][name=duration]').change(function() {
            if (this.value != 'Daily') {
            $("#reservationdatetime").show();
            }else{
            $("#reservationdatetime").hide();
            }
        });


</script>