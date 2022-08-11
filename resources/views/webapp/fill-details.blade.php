@include('webapp.layout.header')

 
<section class="headings">
	   <div class="text-heading text-center">
		   <div class="container">
			   <h1>Complete Details</h1>
			   <h2><a href="/">Home </a> &nbsp;/&nbsp; Complete Details</h2>
		   </div>
	   </div>
   </section>
   <!-- END SECTION HEADINGS -->

   <!-- START SECTION REGISTER -->
   <div id="login">
	   <div class="login">
		   <form action="/registerform" method="POST">
			   {{ csrf_field() }}
			   <input type="hidden" name="status" value="1">
			   <input type="hidden" name="user_id" value="{{$user->id}}">
			   <div class="form-group">
				   <label>Full Name <span class="text-danger">*</span></label>
				   <input type="text" name="name" id="fname" class="form-control rounded-0" required>
				   
			   </div>
			   <div class="form-group">
				   <label>Contact Number <span class="text-danger">*</span> </label>
				   <input type="tel" id="phone"  maxlength="10" name="phone" onkeypress="return isNumber(event)" class="form-control rounded-0" required>
				   
			   </div>
			   
			   <div class="form-group">
				   <label>Email</label>
				   <input type="email" name="email" value="{{$user->email}}" id="email" class="form-control rounded-0" readonly required>
				   
			   </div>
			   <!-- <div class="form-group">
				   <label>Password  <span class="text-danger">*</span></label>
				   <input type="password" id="password" name="password" class="form-control rounded-0" required>
				  
			   </div> -->

				<div class="form-group">
					<label>City <span class="text-danger">*</span></label>
					<input type="text" name="city" id="city" class="form-control rounded-0" required>
				
          
				</div>

				
			   <div id="pass-info" class="clearfix"></div>
			   <button type="submit" class="btn_1 rounded full-width add_top_30 mt-5">Proceed</button>
			   <div class="text-center add_top_10">Already have an acccount? <strong><a href="/login">Sign In</a></strong></div>
		   </form>
	   </div>
   </div>
   <!-- END SECTION REGISTER -->


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