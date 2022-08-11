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

   <!-- START SECTION REGISTER -->
   <div id="login">
   
       <div class="login">
                
           <form action="/checkotp/{{$data->id}}" method="POST">
               {{ csrf_field() }}
               <!-- <input type="hidden" name="status" value="1"> -->
               
               <div class="form-group">
                   <label>Enter OTP <span class="text-danger">*</span> (OTP is sent to your registred Number)</label>
                   <input type="tel" id="otp" maxlength="6" name="otp" onkeypress="return isNumber(event)" class="form-control rounded-0" required>
                   <i class="ti-user"></i>
               </div>
              
               <div id="pass-info" class="clearfix"></div>
               <button type="submit" class="btn_1 rounded full-width add_top_30 mt-5">Verify</button>
               <div class="text-center add_top_10"><a href="/resendotp/{{$data->id}}" class="btn btn-info">Resend OTP</a></div>
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