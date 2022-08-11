@include('admin.layout.header')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Contacts</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
              <!--<li class=""><a class="btn btn-primary" href="/admin/adduser">Add New User</a> &nbsp;&nbsp;</li>-->
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Contacts</li>
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
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Date</th>
               
                </tr>
                </thead>

                <tbody>
                  @php $x=1; @endphp
                @foreach($contacts as $contactsnew)
                <tr>
                  <td>{{$x++}}</td>
                 
                  <td>{{$contactsnew->name}}</td>
                  
                  <td>{{$contactsnew->phone}}</td>
                  <td>{{$contactsnew->email}}</td>
                  <td>{{$contactsnew->message}}</td>
                 
                  <td>{{$contactsnew->created_at}}</td>
                 
                </tr>
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                <th>#</th>
                  <th>Name</th>
                  <th>Phone</th>
                  <th>Email</th>
                  <th>Message</th>
                  <th>Date</th>
                  
                </tr>
                </tfoot>

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


 @include('admin.layout.footer')
