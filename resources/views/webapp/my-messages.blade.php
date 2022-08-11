@include('webapp.layout.header')

<section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>My Messages</h1>
                <h2><a href="/">Home </a> &nbsp;/&nbsp; My Messages</h2>
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
                                            <th>Food</th>
                                            <th>from</th>
                                            <th>to</th>
                                            <th>View</th>
                                            </tr>
                                    </thead>
                                    <tbody>
                                    @php $x=1; @endphp
                                    @foreach($messages as $messagesnew)
                                        <tr>
                              <td>{{$x++}}</td>
                              <td><a href="/images/food_images/{{$messagesnew->food_image}}" target="_blank"><img src="/images/food_images/{{$messagesnew->food_image}}" height="55" width="60"></a> {{$messagesnew->category}}</td>
                              <td>{{$messagesnew->from_name}}</td>
                              <td>{{$messagesnew->to_name}}</td>
                              <td class="actions">
                                  @php if($messagesnew->to_id==$data->id){
                                    $touser=$messagesnew->from_id;
                                  }else{
                                    $touser=$messagesnew->to_id;
                                  }
                                  @endphp
                              <a class="" href="/view-messages/{{$messagesnew->food_id}}/{{$data->id}}/{{$touser}}"> <i class="fa fa-eye"></i></a>
                      
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
<div id="listingdelete-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Delete Food!</h4>
                    <p class="mt-3">Are you sure?</p>
                    <button type="button" class="btn btn-warning my-2" data-dismiss="modal">Cancel</button>
                    <a href="#" id="update_listing_link" class="btn btn-danger my-2">Continue</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Info Alert Modal -->
<div id="activealert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Open Listing!</h4>
                    <p class="mt-3">Are you sure?</p>
                    <button type="button" class="btn btn-warning my-2" data-dismiss="modal">Cancel</button>
                    <a href="#" id="activeupdate_link" class="btn btn-danger my-2">Continue</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Info Alert Modal -->
<div id="inactivealert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Close Listing!</h4>
                    <p class="mt-3">Are you sure?</p>
                    <button type="button" class="btn btn-warning my-2" data-dismiss="modal">Cancel</button>
                    <a href="#" id="inactiveupdate_link" class="btn btn-danger my-2">Continue</a>
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

      function confirm_listingdelete_modal(delete_url)
        {
            jQuery('#listingdelete-alert-modal').modal('show', {backdrop: 'static'});
            document.getElementById('update_listing_link').setAttribute('href' , delete_url);
        }
        function active_modal(delete_url)
    {
        jQuery('#activealert-modal').modal('show', {backdrop: 'static'});
        document.getElementById('activeupdate_link').setAttribute('href' , delete_url);
    }
    function inactive_modal(delete_url)
    {
        jQuery('#inactivealert-modal').modal('show', {backdrop: 'static'});
        document.getElementById('inactiveupdate_link').setAttribute('href' , delete_url);
    }
   </script>