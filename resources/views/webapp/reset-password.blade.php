 @include('webapp.layout.header')

 
  <main id="main">

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="mt-5">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h3>Reset Password</h3>
        </div>

        <div class="row">
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
          <div class="col-lg-12">
            
            <div class="form login-form">
              <form action="/changeuserpassword" method="POST" role="form" class="php-email-form">
                {{ csrf_field() }}
                <div class="row">
                  <div class="col-lg-12">
                    <div class="form-group">
                      <label>New Password</label>
                    </div>
                     <div class="form-group">
                      <input type="password" name="password" class="form-control" id="password" placeholder="New Password" required>
                      <input type="hidden" name="userid" value="{{$_GET['id']}}">
                    </div>
                  </div>
                  <div class="col-lg-12 mt-3">
                    <div class="form-group">
                      <label>Confirm Password</label>
                    </div>
                     <div class="form-group">
                      <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                    </div>
                  </div>
                </div>

                
                <!-- <div class="text-center mt-3">-->
                <!--  <input type="checkbox" name="remember" id="remember"> Remember me -->
                <!--</div>-->

                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center">
                  <button type="submit" title="Submit">Submit</button>
                </div>
                 <div class="text-center mt-3">
                  Already a Member? <a href="/signin">Sign In</a>
                </div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

   @include('webapp.layout.footer')