@include('webapp.layout.header')

 <!-- STAR HEADER SEARCH -->
    <div id="map-container" class="fullwidth-home-map dark-overlay">
        <!-- Video -->
        <div class="video-container">
            <video poster="/webapp-assets/images/bg/video-poster.jpg" loop autoplay muted>
                <source src="/webapp-assets/video/4.mp4" type="video/mp4">
            </video>
        </div>
        <div id="hero-area" class="main-search-inner search-2 vid">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="hero-inner2">

                        
           
                            <!-- Welcome Text -->
                            <div class="welcome-text" style="padding-top: 15px;">
                                <h1>Find Food</h1>
                               <p>
								   @if(isset($_SESSION['userid']))
                                    <a style="text-decoration: none; color:#fff;" href="/upload-food" class="btn_1 rounded">Add Food</a>
                                    @else
                                    <a style="text-decoration: none; color:#fff;" href="#" data-toggle="modal" data-target="#loginModal" class="btn_1 rounded">Add Food</a>
                                    @endif
								</p>
                            </div>
                            <!--/ End Welcome Text -->
                            <!-- Search Form -->
                            <div class="trip-search 3s">
                                <form class="form" method="GET" action="/all-foods">
                                     <!-- Form Lookin for -->
                                     <div class="form-group looking">
                                        <div class="first-select wide">
                                            <div class="main-search-input-item">
                                                <input type="text" placeholder="Enter Food Category" name="food" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Form Lookin for -->
                                    <!-- Form Lookin for -->
                                    <div class="form-group looking">
                                        <div class="first-select wide">
                                            <div class="main-search-input-item">
                                                <input type="text" placeholder="Location" name="location" value="" />
                                            </div>
                                        </div>
                                    </div>
                                    <!--/ End Form Lookin for -->
                                    
                                  
                                    <!-- Form Button -->
                                    <div class="form-group button">
                                        <button type="submit" class="btn">Search</button>
                                    </div>
                                    <!--/ End Form Button -->
                                </form>
                            </div>
                            <!--/ End Search Form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END HEADER SEARCH -->


    <!-- START SECTION POPULAR LISTINGS -->
    <section class="popular portfolio freelancers">
        <div class="container">
            <div class="sec-title">
                <h2><span>Popular </span>Foods</h2>
                <p>What are you interested.</p>
            </div>
            <div class="portfolio col-xl-12">
                <div class="slick-lancers">
                @foreach($foods as $foodsnew)
				<div class="item col-lg-4 col-md-6 col-xs-12 landscapes sale">
					<div class="project-single">
						<div class="project-inner project-head">
							<div class="homes">
								<!-- homes img -->
								<a href="/food/{{$foodsnew->id}}" class="homes-img hover-effect">
									<div class="homes-tag button alt featured">{{$foodsnew->category}}</div>
									
									<img src="/images/food_images/{{$foodsnew->food_image}}" alt="{{$foodsnew->category}}" width="400"  class="img-responsive" style="height: 340px !important;">
									<div class="overlay"></div>
								</a>
							</div>
						</div>
						<!-- homes content -->
						<div class="homes-content">
							<!-- homes address -->
							<a href="/food/{{$foodsnew->id}}"><h3>{{$foodsnew->category}}</h3></a>
							<p class="homes-address">
								<a href="/food/{{$foodsnew->id}}">
									Quantity: <span>{{$foodsnew->quantity}}</span> &nbsp;
									Contact: <span>{{$foodsnew->contact_info}}</span><br>
									Type: <span>{{$foodsnew->type}}</span> &nbsp;
									Expiry: <span>{{$foodsnew->expiry_date}}</span>
								</a>
							</p>
						</div>
					</div>
				</div>
                @endforeach
                    
                </div>
            </div>
        </div>
        <div class="bg-all">
            <a href="/all-foods" class="btn btn-outline-light">View All</a>
        </div>
    </section>
    <!-- END SECTION POPULAR LISTINGS -->

    <!-- START SECTION HOW IT WORKS -->
    <section class="how-it-works">
        <div class="container">
            <div class="sec-title">
                <h2><span>How </span>It Works</h2>
                <p>Follow the Steps and Avoid Hunger</p>
            </div>
            <div class="row service-1">
                <article class="col-lg-4 col-md-6 col-xs-12 serv">
                    <div class="serv-flex">
                        <div class="art-1 img-1">
                            <img src="/webapp-assets/images/map.png" alt="">
                            <h3>Find Good Food</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">Food Bank facilitates user to find desirable food via this application. Find your Need!</p>
                        </div>
                    </div>
                </article>
                <article class="col-lg-4 col-md-6 col-xs-12 serv">
                    <div class="serv-flex">
                        <div class="art-1 img-2">
                            <img src="/webapp-assets/images/contact.png" alt="">
                            <h3>Contact The Owner</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">After finding perfect need of food for you, Contact the owner for more information about food and location.</p>
                        </div>
                    </div>
                </article>
                <article class="col-lg-4 col-md-6 col-xs-12 serv mb-0 pt">
                    <div class="serv-flex arrow">
                        <div class="art-1 img-3">
                            <img src="/webapp-assets/images/user.png" alt="">
                            <h3>Make a Reservation</h3>
                        </div>
                        <div class="service-text-p">
                            <p class="text-center">Make a reservation for your preferred food and Stay away from Hungry Stomach.
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>
    <!-- END SECTION HOW IT WORKS -->


    
    <!-- START SECTION TESTIMONIALS -->
    <section class="testimonials">
        <div class="container">
            <div class="sec-title">
                <h2><span>Our </span>Sponsors</h2>
                <p>Brought To You By</p>
            </div>
            <div class="owl-carousel style1">
              
                    <img src="/webapp-assets/images/testimonials/ts-1.jpg" alt="">
                    
               
                
                    <img src="/webapp-assets/images/testimonials/ts-2.jpg" alt="" style=" height:240px;">
              
                    <img src="/webapp-assets/images/testimonials/ts-3.jpg" alt="" style=" height:240px;">
 
            </div>
        </div>
    </section>
    <!-- END SECTION TESTIMONIALS -->

    
         @include('webapp.layout.footer')
