@include('admin.layout.header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Notifications</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Notifications</li>
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
             
          <div class="card">
            <!--<div class="card-header">-->
            <!--  <h3 class="card-title">DataTable with default features</h3>-->
            <!--</div>-->
            <!-- /.card-header -->
            <div class="card-body">
            <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Notification</th>
                      <th>Time</th>
                      
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($admin_notifications as $admin_notificationsnew)
                   <tr>
                      <td> <a href="{{$admin_notificationsnew->url}}">{{$admin_notificationsnew->notification}}</a></td>
                      <td>{{$admin_notificationsnew->created_at}}</td>
                      
                    </tr>
                  @endforeach
                    </tbody>
                  </table>
                </div>
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
<div id="listingdelete-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">
          <div class="modal-body p-4">
              <div class="text-center">
                  <i class="dripicons-information h1 text-info"></i>
                  <h4 class="mt-2">Delete Listing!</h4>
                  <p class="mt-3">Are you sure?</p>
                  <button type="button" class="btn btn-info my-2" data-dismiss="modal">Cancel</button>
                  <a href="#" id="update_member_link" class="btn btn-danger my-2">Continue</a>
              </div>
          </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- Info Alert Modal -->
<div id="listingopenalert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">
          <div class="modal-body p-4">
              <div class="text-center">
                  <i class="dripicons-information h1 text-info"></i>
                  <h4 class="mt-2">Open Listing!</h4>
                  <p class="mt-3">Are you sure?</p>
                  <button type="button" class="btn btn-info my-2" data-dismiss="modal">Cancel</button>
                  <a href="#" id="listingopenupdate_link" class="btn btn-danger my-2">Continue</a>
              </div>
          </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Info Alert Modal -->
<div id="listingclosealert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">
          <div class="modal-body p-4">
              <div class="text-center">
                  <i class="dripicons-information h1 text-info"></i>
                  <h4 class="mt-2">Close Listing!</h4>
                  <p class="mt-3">Are you sure?</p>
                  <button type="button" class="btn btn-info my-2" data-dismiss="modal">Cancel</button>
                  <a href="#" id="listingcloseupdate_link" class="btn btn-danger my-2">Continue</a>
              </div>
          </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

 @include('admin.layout.footer')

 <script>
     function confirm_listingdelete_modal(delete_url)
      {
          jQuery('#listingdelete-alert-modal').modal('show', {backdrop: 'static'});
          document.getElementById('update_member_link').setAttribute('href' , delete_url);
      }
      function listingopen_modal(delete_url)
      {
          jQuery('#listingopenalert-modal').modal('show', {backdrop: 'static'});
          document.getElementById('listingopenupdate_link').setAttribute('href' , delete_url);
      }
      function listingclose_modal(delete_url)
      {
          jQuery('#listingclosealert-modal').modal('show', {backdrop: 'static'});
          document.getElementById('listingcloseupdate_link').setAttribute('href' , delete_url);
      }
</script>