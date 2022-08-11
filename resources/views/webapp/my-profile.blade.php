@include('webapp.layout.header')

<section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>My Profile</h1>
                <h2><a href="/">Home </a> &nbsp;/&nbsp; My Profile</h2>
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
						<h3 class="heading">My Profile</h3>
                        @if(session()->has('message'))
                        <div class="alert alert-success m-auto text-center alert-dismissible">
                              <strong>Success!! </strong> {{ session()->get('message') }}
                              <button type="button" class="close mt-0" data-dismiss="alert">&times;</button>
                        </div>
                     @endif
						<form method="POST" action="/update-profile/{{$data->id}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
							<div class="row">
								<div class="col-lg-6 ">
									<div class="form-group">
										<label>Name <span class="text-danger">*</span></label>
										<input type="text" class="form-control" value="{{$data->name}}" name="name" required>
									</div>
								</div>
                        <div class="col-lg-6">
									<div class="form-group">
										<label>Email </label>
										<input type="email" class="form-control" value="{{$data->email}}" name="email">
									</div>
								</div>
						<div class="col-lg-6">
									<div class="form-group">
										<label>Phone <span class="text-danger">*</span></label>
										<input type="tel" onkeypress="return isNumber(event)" maxlength="10" class="form-control" name="phone" value="{{$data->phone}}" required>
									</div>
								</div>
                        <div class="col-lg-6">
									<div class="form-group">
										<label>Photo <span class="text-danger">*</span></label>
										<input type="file" name="user_photo" class="form-control" >
									</div>
								</div>
                               
                                <div class="col-lg-6 ">
									<div class="form-group">
										<label>City <span class="text-danger">*</span></label>
										<input type="text" class="form-control" value="{{$data->city}}" name="city" required>
                                        
									</div>
								</div>
                                
                               
                       
								<div class="col-lg-12">
									<div class="send-btn text-center">
										<button type="submit" class="btn btn-primary btn-lg">Update</button>
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
</script>