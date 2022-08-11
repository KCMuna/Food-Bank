@include('webapp.layout.header')

<section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>My Foods</h1>
                <h2><a href="/">Home </a> &nbsp;/&nbsp; My Foods</h2>
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
                @if(session()->has('message'))
                  <div class="alert alert-success m-auto text-center alert-dismissible">
                        <strong>Success!! </strong> {{ session()->get('message') }}
                          <button type="button" class="close mt-0" data-dismiss="alert">&times;</button>
                  </div>
                @endif
                <div class="section-body listing-table">
<div class="table-responsive">
                                <table class="table table-striped">
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
                              <td><a href="images/food_images/{{$foodsnew->food_image}}" target="_blank"><img src="images/food_images/{{$foodsnew->food_image}}" height="55" width="60"></a></td>
                             
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
                      
                      <a class="btn btn-warning btn-sm" href="/edit-food/{{$foodsnew->id}}"><i class="fa fa-edit"></i></a>
                      <a class="btn btn-danger btn-sm" href="#" onclick="confirm_fooddelete_modal('/deletefood/{{$foodsnew->id}}');"><i class="fa fa-trash"></i></a>
                      
                      @if($foodsnew->status=='0') 
                            <div class="btn-group mr-2 mb-2" data-toggle="tooltip" data-animation="false" data-original-title="Change Status">
                                <span aria-expanded="false" aria-haspopup="true" class="btn btn-danger btn-sm lighten dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" id="dropdownMenuButton4">Inactive</span>

                                <div style="padding: 0;min-width: 60px;margin: 0;" aria-labelledby="dropdownMenuButton4" class="dropdown-menu">
                                    <a class="btn btn-success btn-sm lighten dropdown-item" onclick="foodopen_modal('/foodactivestatus/{{$foodsnew->id}}');" href="#"> Active</a>
                                </div>
                            </div>
                           
                            @else
                            <div class="btn-group mr-2 mb-2" data-toggle="tooltip" data-animation="false" data-original-title="Change Status">
                                <span aria-expanded="false" aria-haspopup="true" class="btn btn-success btn-sm lighten dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" id="dropdownMenuButton4">Active</span>

                                <div style="padding: 0;min-width: 60px;margin: 0;" aria-labelledby="dropdownMenuButton4" class="dropdown-menu">
                                    <a class="btn btn-danger btn-sm lighten dropdown-item" onclick="foodclose_modal('/foodinactivestatus/{{$foodsnew->id}}');" href="#"> Inactive</a>
                                </div>
                            </div>
                            @endif
                            
                    </td>
                  </tr>
                  @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                             </div>
						
						
					
				</div>
            </div>
        </div>
    </section>
    <!-- END SECTION DASHBOARD -->

 
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

@include('webapp.layout.footer')

<script>
      $(document).ready(function() {
         var table = $('#example').DataTable( {
            responsive: true
         } );
      
         new $.fn.dataTable.FixedHeader( table );
      } );

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