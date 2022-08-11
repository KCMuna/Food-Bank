@include('webapp.layout.header')

 
<section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Login</h1>
                <h2><a href="/">Home </a> &nbsp;/&nbsp; login</h2>
            </div>
        </div>
    </section>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION LOGIN -->
    <div id="login">
        <div class="login">
        @if(session()->has('loginerror'))
                <div class="alert alert-danger m-auto text-center alert-dismissible">
                      <strong>Error!! </strong> {{ session()->get('loginerror') }}
                        <button type="button" class="close mt-0" data-dismiss="alert">&times;</button>
                </div>
              @endif
            <form action="/sendotp" method="POST">
            {{ csrf_field() }}
                <div class="form-group">
                    <label>Email ID <span class="text-danger">*</span> (You will recieve OTP)</label>
                    <input type="email" placeholder="Enter Email ID" class="form-control" name="email" id="email" required>
                    <i class="icon_mail_alt"></i>
                </div>
                <!-- <div class="form-group">
                    <label>Password</label>
                    <input type="password" laceholder="Enter Password" class="form-control" name="password" id="password" value="">
                    <i class="icon_lock_alt"></i>
                </div> -->
               <!-- <div class="fl-wrap filter-tags clearfix add_bottom_30">
                    <div class="checkboxes float-left">
                        <div class="filter-tags-wrap">
                            <input id="check-b" type="checkbox" name="remember">
                            <label for="check-b">Remember me</label>
                        </div>
                    </div>
                    
                </div>  -->
                <button type="submit" class="btn_1 rounded full-width">LOGIN</button>
                <!-- <div class="text-center add_top_10">Not registered yet? <strong><a href="/register">Sign up!</a></strong></div> -->
            </form>
        </div>
    </div>
    <!-- END SECTION LOGIN -->


  @include('webapp.layout.footer')

