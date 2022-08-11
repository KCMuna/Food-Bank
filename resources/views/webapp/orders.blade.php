@include('webapp.layout.header')

<section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Orders</h1>
                <h2><a href="/">Home </a> &nbsp;/&nbsp; Orders</h2>
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
                <h3 class="heading">Orders</h3>
                @if(session()->has('message'))
                  <div class="alert alert-success m-auto text-center alert-dismissible">
                        <strong>Success!! </strong> {{ session()->get('message') }}
                          <button type="button" class="close mt-0" data-dismiss="alert">&times;</button>
                  </div>
                @endif
                <div class="section-body food-table">
                    <div class="table-responsive my-properties">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                           
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            
                                            </tr>
                                    </thead>
                                    <tbody>
                                    @php $x=1; @endphp
                                    @foreach($orders as $ordersnew)
                            <tr>
                            
                              <td class="image myelist">
										<a href="/food/{{$ordersnew->food_id}}" target="_blank"><img src="/images/food_images/{{$ordersnew->food_image}}" height="100" width="150"></a>
								</td>
								<td>
                                    <div class="inner">
											<a href="/food/{{$ordersnew->food_id}}" target="_blank"><h2>{{$ordersnew->category}}</h2></a>
											<figure><i class="fa fa-map-marker"></i> {{$ordersnew->location}}</figure>
                                            
											
										</div>
								</td>
                                <td>
                                @if($ordersnew->created_by==$data->id && $ordersnew->user_id!=$data->id)
                                @if($ordersnew->status=='0') 
                                        
                                                <a class="btn btn-success btn-sm" onclick="orderaccept_modal('/foodactivestatus/{{$ordersnew->id}}');" href="#"> Confirm</a>
                                          
                                        @else
                                      
                                                <a class="btn btn-danger btn-sm" onclick="ordercancel_modal('/foodinactivestatus/{{$ordersnew->id}}');" href="#"> Cancel</a>
                                           
                                        @endif
                                    @endif
										<a href="#" onclick="confirm_foodremove_modal('/foodremove/{{$ordersnew->id}}');"><i class="far fa-trash-alt"></i></a>
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
<div id="foodremove-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Cancel Order!</h4>
                    <p class="mt-3">Are you sure?</p>
                    <button type="button" class="btn btn-warning my-2" data-bs-dismiss="modal">Cancel</button>
                    <a href="#" id="update_food_link" class="btn btn-danger my-2">Continue</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Info Alert Modal -->
<div id="orderaccept-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Accept Order!</h4>
                    <p class="mt-3">Are you sure?</p>
                    <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">Cancel</button>
                    <a href="#" id="orderacceptupdate_link" class="btn btn-danger my-2">Continue</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Info Alert Modal -->
<div id="ordercancel-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Cancel Order!</h4>
                    <p class="mt-3">Are you sure?</p>
                    <button type="button" class="btn btn-info my-2" data-bs-dismiss="modal">Cancel</button>
                    <a href="#" id="ordercancelupdate_link" class="btn btn-danger my-2">Continue</a>
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

      function confirm_foodremove_modal(delete_url)
        {
            jQuery('#foodremove-alert-modal').modal('show', {backdrop: 'static'});
            document.getElementById('update_food_link').setAttribute('href' , delete_url);
        }

        function orderaccept_modal(delete_url)
        {
            jQuery('#orderaccept-modal').modal('show', {backdrop: 'static'});
            document.getElementById('orderacceptupdate_link').setAttribute('href' , delete_url);
        }
        function ordercancel_modal(delete_url)
        {
            jQuery('#ordercancel-modal').modal('show', {backdrop: 'static'});
            document.getElementById('ordercancelupdate_link').setAttribute('href' , delete_url);
        }
        
   </script>