 @include('admin.layout.header')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Foods</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class=""><a class="btn btn-primary" href="/admin/addfood">Add New Food</a> &nbsp;&nbsp;</li>
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Foods</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
                @if(session()->has('message'))
                    <div class="alert alert-success m-auto text-center alert-dismissible">
                        <strong>Success!! </strong> {{ session()->get('message') }}
                            <button type="button" class="close mt-0" data-dismiss="alert">&times;</button>
                    </div>
                @endif
                @if(session()->has('error'))
                    <div class="alert alert-danger m-auto text-center alert-dismissible">
                        <strong>Error!! </strong> {{ session()->get('error') }}
                            <button type="button" class="close mt-0" data-dismiss="alert">&times;</button>
                    </div>
                @endif

            <div class="card">
              <!--<div class="card-header">-->
              <!--  <h3 class="card-title">DataTable with default features</h3>-->
              <!--</div>-->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                          <th>#</th>
                          <th>Food Image</th>
                           <th>Category</th>
                           <th>Description</th>
                           <th>Quantity</th>
                           <th>Age Limit</th>
                           <th>Type</th>
                           <th>Calories</th>
                           <th>Expiry Date</th>
                           <th>Contact Info</th>
                           <th>Location</th>
                           <th>Reward Points</th>
                           <th>Related Food</th>
                           <!-- <th>Created By</th> -->
                           <th class="all">Action</th>
                  </tr>
                  </thead>

                  <tbody>
                    @php $x=1; @endphp
                  @foreach($foods as $foodsnew)
                  <tr>
                              <td>{{$x++}}</td>
                              <td><a href="/images/food_images/{{$foodsnew->food_image}}" target="_blank"><img src="/images/food_images/{{$foodsnew->food_image}}" height="55" width="60"></a></td>
                             
                              <td>{{$foodsnew->category}}</td>
                              <td>{{$foodsnew->description}}</td>
                              <td>{{$foodsnew->quantity}}</td>
                              <td>{{$foodsnew->age_limit}}</td>
                              <td>{{$foodsnew->type}}</td>
                              <td>{{$foodsnew->calories}}</td>
                              <td>{{$foodsnew->expiry_date}}</td>
                              <td>{{$foodsnew->contact_info}}</td>
                              <td>{{$foodsnew->location}}</td>
                              <td>{{$foodsnew->reward_points}}</td>
                              <td>{{$foodsnew->related_food}}</td>
                              <!-- <td>{{$foodsnew->created_by}}</td> -->
                    <td>
                      
                      <a class="btn btn-warning btn-sm" href="/admin/editfood/{{$foodsnew->id}}"><i class="fa fa-edit"></i></a>
                      <a class="btn btn-danger btn-sm" href="#" onclick="confirm_fooddelete_modal('/admin/deletefood/{{$foodsnew->id}}');"><i class="fa fa-trash"></i></a>
                      
                      @if($foodsnew->status=='0') 
                            <div class="btn-group mr-2 mb-2" data-toggle="tooltip" data-animation="false" data-original-title="Change Status">
                                <span aria-expanded="false" aria-haspopup="true" class="btn btn-danger btn-sm lighten dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" id="dropdownMenuButton4">Inactive</span>

                                <div style="padding: 0;min-width: 60px;margin: 0;" aria-labelledby="dropdownMenuButton4" class="dropdown-menu">
                                    <a class="btn btn-success btn-sm lighten dropdown-item" onclick="foodopen_modal('/admin/foodactivestatus/{{$foodsnew->id}}');" href="#"> Active</a>
                                </div>
                            </div>
                           
                            @else
                            <div class="btn-group mr-2 mb-2" data-toggle="tooltip" data-animation="false" data-original-title="Change Status">
                                <span aria-expanded="false" aria-haspopup="true" class="btn btn-success btn-sm lighten dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" id="dropdownMenuButton4">Active</span>

                                <div style="padding: 0;min-width: 60px;margin: 0;" aria-labelledby="dropdownMenuButton4" class="dropdown-menu">
                                    <a class="btn btn-danger btn-sm lighten dropdown-item" onclick="foodclose_modal('/admin/foodinactivestatus/{{$foodsnew->id}}');" href="#"> Inactive</a>
                                </div>
                            </div>
                            @endif
                            
                    </td>
                  </tr>
                  @endforeach
                  </tbody>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  
<!-- Info delete Modal -->
<div id="fooddelete-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Delete food!</h4>
                    <p class="mt-3">Are you sure?</p>
                    <button type="button" class="btn btn-info my-2" data-dismiss="modal">Cancel</button>
                    <a href="#" id="update_member_link" class="btn btn-danger my-2">Continue</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Info Alert Modal -->
<div id="foodopenalert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Open food!</h4>
                    <p class="mt-3">Are you sure?</p>
                    <button type="button" class="btn btn-info my-2" data-dismiss="modal">Cancel</button>
                    <a href="#" id="foodopenupdate_link" class="btn btn-danger my-2">Continue</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Info Alert Modal -->
<div id="foodclosealert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Close food!</h4>
                    <p class="mt-3">Are you sure?</p>
                    <button type="button" class="btn btn-info my-2" data-dismiss="modal">Cancel</button>
                    <a href="#" id="foodcloseupdate_link" class="btn btn-danger my-2">Continue</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

   @include('admin.layout.footer')

   <script>
       function confirm_fooddelete_modal(delete_url)
        {
            jQuery('#fooddelete-alert-modal').modal('show', {backdrop: 'static'});
            document.getElementById('update_member_link').setAttribute('href' , delete_url);
        }
        function foodopen_modal(delete_url)
        {
            jQuery('#foodopenalert-modal').modal('show', {backdrop: 'static'});
            document.getElementById('foodopenupdate_link').setAttribute('href' , delete_url);
        }
        function foodclose_modal(delete_url)
        {
            jQuery('#foodclosealert-modal').modal('show', {backdrop: 'static'});
            document.getElementById('foodcloseupdate_link').setAttribute('href' , delete_url);
        }
  </script>