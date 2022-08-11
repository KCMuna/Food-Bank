@include('webapp.layout.header')

 
<section class="headings">
	   <div class="text-heading text-center">
		   <div class="container">
			   <h1>Verify OTP</h1>
			   <h2><a href="/">Home </a> &nbsp;/&nbsp; Verify OTP</h2>
		   </div>
	   </div>
   </section>
   <!-- END SECTION HEADINGS -->

   <!-- START SECTION REGISTER -->
   <div id="login">
   @if(session()->has('message'))
                            <div class="alert alert-success m-auto text-center alert-dismissible" style="">
                                    <strong> {{ session()->get('message') }}</strong>
                                    <button type="button" class="close mt-0" data-dismiss="alert">&times;</button>
                                </div>
                            @endif
                            @if(session()->has('error'))
                            <div class="alert alert-danger m-auto text-center alert-dismissible" style="">
                                    <strong>Error!! </strong> {{ session()->get('error') }}
                                    <button type="button" class="close mt-0" data-dismiss="alert">&times;</button>
                                </div>
                            @endif
	   <div class="login">
       
		   <form action="/verifyuserotp" method="POST">
			   {{ csrf_field() }}
			  
			   <div class="form-group">
				   <label>Email ID <span class="text-danger">*</span> </label>
				   <input type="email" id="email" value="{{$_GET['n']}}" name="email" class="form-control rounded-0" required readonly>
				   <i class="ti-user"></i>
			   </div>
               <div class="form-group">
				   <label>Enter OTP <span class="text-danger">*</span> </label>
				   <input type="tel" id="phoneotp" maxlength="6" name="otp" onkeypress="return isNumber(event)" class="form-control rounded-0" required>
				   <i class="ti-user"></i>
			   </div>
			  
               <input type="hidden" name="phone" value="{{$_GET['n']}}">
                  <input type="hidden" name="uotp" value="{{$_SESSION['userotp']}}">
			   <div id="pass-info" class="clearfix"></div>
			   <button type="submit" class="btn_1 rounded full-width add_top_30 mt-5">Verify</button>
               <div class="text-center add_top_10"><a href="/resendotp?n={{$_GET['n']}}" class="btn btn-info">Resend OTP</a></div>
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