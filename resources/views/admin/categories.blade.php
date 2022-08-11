
        @include('admin.layout.header')

        <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <button type="button" data-toggle="modal" data-target="#add-category" class="btn btn-primary m-b-0"> Add New</button>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Categories</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

      <!-- Main content -->
    <section class="content">
        @if(session()->has('message'))
                    <div class="alert alert-success m-auto text-center alert-dismissible">
                        <strong>Success!! </strong> {{ session()->get('message') }}
                            <button type="button" class="close mt-0" data-dismiss="alert">&times;</button>
                    </div>
                @endif
      <div class="container-fluid">
                                        <div class="row">
                                        
                                            <!-- statustic with progressbar  start -->
                                            @foreach($categoriesdata as $categoriesdatanew)
                                            <div class="col-xl-3 col-md-6">
                                               
                                                <div class="card statustic-progress-card">
                                                <a href="/admin/category/{{ $categoriesdatanew->url}}/{{ $categoriesdatanew->id}}">
                                                    <div class="card-header">
                                                        <h5>{{$categoriesdatanew->name}}</h5>
                                                        Id: {{$categoriesdatanew->id}}
                                                    </div>
                                            </a>
                                                    <div class="card-block">
                                                        <div class="row align-items-center">
                                                            <div class="col text-right">
                                                            <div class="tabledit-toolbar btn-toolbar" style="text-align: left;">
                                                                <div class="btn-group btn-group-sm" style="float: none;"><button type="button" class="tabledit-edit-button btn btn-primary waves-effect waves-light" style="float: none;margin: 5px;" data-toggle="modal" data-target="#edit-category{{$categoriesdatanew->id}}"><span class="fa fa-edit"></span></button><button type="button" onclick="confirm_deletecategory_modal('/admin/deletecategory/{{$categoriesdatanew->id}}');" class="tabledit-delete-button btn btn-danger waves-effect waves-light" style="float: none;margin: 5px;"><span class="fa fa-trash"></span></button></div>
                                                                
                                                            </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="modal fade" id="edit-category{{$categoriesdatanew->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Update Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <div class="card-block">
                                                    
                                                    <form method="post" action="/admin/updatecategory/{{$categoriesdatanew->id}}" id="fault-form">
                                                    {{ csrf_field() }}
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Category Name</label>
                                                            <div class="col-sm-10">
                                                                <input name="name" type="text" class="form-control" value="{{$categoriesdatanew->name}}"
                                                                       placeholder="Enter Category Name" required>
                                                            </div>
                                                        </div>
                                                       
                                                   
                                                </div>
                                                                               
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-primary waves-effect waves-light ">Submit</button>
                                                                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                         @endforeach
                                            <!-- statustic with progressbar  end -->

                                         
                                        </div>
                                    </div>
                                    <!-- Page-body end -->


                                </div>
                               
                            </div>
                        </div>
                    </div>
                                                <!-- Default card end -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Page body end -->
                                </div>
                            </div>
                </div>


                <div class="modal fade" id="add-category" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">Add New Category</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <div class="card-block">
                                                    
                                                    <form method="post" action="/admin/savecategory" id="fault-form">
                                                    {{ csrf_field() }}
                                                        <div class="form-group row">
                                                            <label class="col-sm-2 col-form-label">Category Name</label>
                                                            <div class="col-sm-10">
                                                                <input name="name" type="text" class="form-control"
                                                                       placeholder="Enter Category Name" required>
                                                            </div>
                                                        </div>
                                                       
                                                   
                                                </div>
                                                                               
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit" class="btn btn-primary waves-effect waves-light ">Submit</button>
                                                                                <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

   <!-- Info Alert Modal -->
   <div id="alert-deletecategory-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body p-4">
                <div class="text-center">
                    <i class="dripicons-information h1 text-info"></i>
                    <h4 class="mt-2">Delete!</h4>
                    <p class="mt-3">Are you sure?</p>
                    <button type="button" class="btn btn-info my-2" data-dismiss="modal">Cancel</button>
                    <a href="#" id="update_deletecategory_link" class="btn btn-danger my-2">Continue</a>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
        @include('admin.layout.footer')
           
<script>
    function confirm_deletecategory_modal(delete_url)
    {
        jQuery('#alert-deletecategory-modal').modal('show', {backdrop: 'static'});
        document.getElementById('update_deletecategory_link').setAttribute('href' , delete_url);
    }
</script>