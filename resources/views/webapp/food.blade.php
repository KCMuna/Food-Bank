@include('webapp.layout.header')
    <div>
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <a href="/images/food_images/{{$food->food_image}}" class="grid image-link">
                        <img src="/images/food_images/{{$food->food_image}}" width="450" height="280" class="img-fluid" alt="#" style="width: 100% !important;">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="/images/food_images/{{$food->food_image}}" class="grid image-link">
                        <img src="/images/food_images/{{$food->food_image}}" width="450" height="280" class="img-fluid" alt="#" style="width: 100% !important;">
                    </a>
                </div>
                <div class="swiper-slide">
                    <a href="/images/food_images/{{$food->food_image}}" class="grid image-link">
                        <img src="/images/food_images/{{$food->food_image}}" width="450" height="280" class="img-fluid" alt="#" style="width: 100% !important;">
                    </a>
                </div>
            </div>

            <div class="swiper-pagination swiper-pagination-white"></div>

            <div class="swiper-button-next swiper-button-white mr-3"></div>
            <div class="swiper-button-prev swiper-button-white ml-3"></div>
        </div>
    </div>
    <!-- END SECTION HEADINGS -->

    <!-- START SECTION LISTING DETAIL-->
    <section class="listing blog details">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 blog-pots">
                    <!-- Block heading end -->
                    <div class="row">
                        <div class="col-md-12">
                        @if(session()->has('message'))
                        <div class="alert alert-success m-auto text-center alert-dismissible">
                                <strong>Success!! </strong> {{ session()->get('message') }}
                                <button type="button" class="close mt-0" data-dismiss="alert">&times;</button>
                        </div>
                        @endif
                            <div class="detail-wrapper">
                                <div class="detail-wrapper-body">
                                    <div class="listing-title-bar">
                                        <h3>{{$food->category}} 
                                        @if(isset($_SESSION['userid']))
                                            <a href="/addtoorder/{{$food->id}}/{{$_SESSION['userid']}}" title="Add to orders" style="color:#fff !important" class="mrg-l-5 category-tag pr-3 padd-r-10 btn_1 text-danger">Order This</a>
                                        @else
                                            <a href="/login" title="Add to orders" style="color:#fff !important" class="mrg-l-5 category-tag pr-3 btn_1 padd-r-10 text-danger">Order This</a>
                                        @endif
                                            
                                        </h3>
                                        <div class="mt-3">
                                            <a href="#listing-location" class="listing-address">
                                                <i class="fa fa-map-marker pr-2 ti-location-pin mrg-r-5"></i> {{$food->location}}
                                            </a>
                                        </div>
                                        <div class="mt-3">
                                            <a href="#listing-location" class="listing-address">
                                               Quantity: {{$food->quantity}}
                                            </a>
                                        </div>
                                        <div class="mt-3">
                                            <a href="#listing-location" class="listing-address">
                                               Age Limit: {{$food->age_limit}}
                                            </a>
                                        </div>
                                        <div class="mt-3">
                                            <a href="#listing-location" class="listing-address">
                                               Type: {{$food->type}}
                                            </a>
                                        </div>
                                        <div class="mt-3">
                                            <a href="#listing-location" class="listing-address">
                                               Calories: {{$food->calories}}
                                            </a>
                                        </div>
                                        <div class="mt-3">
                                            <a href="#listing-location" class="listing-address">
                                               Expiry: {{$food->expiry_date}}
                                            </a>
                                        </div>
                                        <div class="mt-3">
                                            <a href="#listing-location" class="listing-address">
                                               Contact: {{$food->contact_info}}
                                            </a>
                                        </div>
                                        <div class="mt-3">
                                            <a href="#listing-location" class="listing-address">
                                               Related Food: {{$food->related_food}}
                                            </a>
                                        </div>
                                       


                                    </div>
                                </div>
                            </div>
                            <div class="widget_author__header">
                                <div class="widget_author__avatar">
                                    <img src="/webapp-assets/images/user-images/{{$food->userphoto}}" alt="">
                                </div>
                                <div class="overflow-hidden">
                                    <h4 class="widget_author__name mt-4">{{$food->username}}</h4>
                                    <span class="widget_author__role role--admin">
                                    <i class="fa fa-cogs mr-2 mt-2"></i> Donor</span>
                                    @if(isset($_SESSION['userid']))
                                    <a href="/view-messages/{{$food->id}}/{{$_SESSION['userid']}}/{{$food->created_by}}" class="btn_1 rounded">Send Message</a>
                                    @else
                                    <a href="/login" class="btn_1 rounded">Send Message</a>
                                    @endif
                                </div>
                            </div>
                            <div class="blog-info details overview">
                                <h5 class="mb-4">DESCRIPTION</h5>
                                <p class="mb-3">{{$food->description}}</p>
                                
                            </div>
                        </div>
                    </div>
                    <!-- food content -->
                  
                </div>
                <aside class="col-lg-4 col-md-12 car">
                    <div class="widget">
                       
                        <div class="widget widget_listings my-5">
                            <div class="widget-boxed-header">
                                <h4><i class="fa fa-map-marker pr-3"></i>Latest Foods</h4>
                            </div>
                            <div class="widget-boxed-body">
                                <ul>
                                    @foreach($otherfoods as $otherfoodsnew)
                                    <li>
                                        <a href="{{$otherfoodsnew->id}}"><img src="/images/food_images/{{$otherfoodsnew->food_image}}" alt=""></a>
                                        <div class="overflow-hidden">
                                            <span class="cat mt-0"><a href="{{$otherfoodsnew->id}}">{{$otherfoodsnew->category}}</a></span>
                                            <h4><a href="{{$otherfoodsnew->id}}">{{$otherfoodsnew->type}}</a></h4>
                                            
                                        </div>
                                    </li>
                                    @endforeach
                                   
                                </ul>
                            </div>
                        </div>
                       
                    </div>
                </aside>

                 <!-- choregrapher review -->
    <div class="choreographer-review-wrap" id="reviewsection">
        <div class="container">
            <div class="choreographer-review rounded">
              
                <div class="d-flex flex-wrap px-3 ">
                    <div class="px-3 pt-3 col-md-8 col-xl-6 choreographer-rating">
                        <div class="choreographer-rating-heading d-flex flex-wrap justify-content-between">
                            <h4>{{count($allreviews)}} reviews</h4>
                            <div class="choreographer-rating-count">
                                <p class="review-star"><i class="fa fa-star" style="color:#fff;"></i> {{$averagerating}}</p>
                               
                            </div>
                        </div>
                        <div class="rating-bars-wrap">
                            <div class="rating-bars">
                                <div class="rating-inner-wrap">
                                    <span>5 <i class="fa fa-star"></i> </span>
                                    <div class="bar-container">
                                        <div id="bar-fill1" style="width:{{$fivestarreviewspercent}}%" ></div>
                                    </div>
                                </div>
                                <span class="text-sm-right">{{$fivestarreviewscount}} reviews</span>
                            </div>
                            <div class="rating-bars">
                                <div class="rating-inner-wrap">
                                    <span>4 <i class="fa fa-star"></i> </span>
                                    <div class="bar-container">
                                        <div id="bar-fill2" style="width:{{$fourstarreviewspercent}}%"></div>
                                    </div>
                                </div>
                                <span class="text-sm-right">{{$fourstarreviewscount}} reviews</span>
                            </div>
                            <div class="rating-bars">
                                <div class="rating-inner-wrap">
                                    <span>3 <i class="fa fa-star"></i> </span>
                                    <div class="bar-container">
                                        <div id="bar-fill3" style="width:{{$threestarreviewspercent}}%"></div>
                                    </div>
                                </div>
                                <span class="text-sm-right">{{$threestarreviewscount}} reviews</span>
                            </div>
                            <div class="rating-bars">
                                <div class="rating-inner-wrap">
                                    <span>2 <i class="fa fa-star"></i> </span>
                                    <div class="bar-container">
                                        <div id="bar-fill4". style="width:{{$twostarreviewspercent}}%"></div>
                                    </div>
                                </div>
                                <span class="text-sm-right">{{$twostarreviewscount}} reviews</span>
                            </div>
                            <div class="rating-bars">
                                <div class="rating-inner-wrap">
                                    <span>1 <i class="fa fa-star"></i> </span>
                                    <div class="bar-container">
                                        <div id="bar-fill5" style="width:{{$onestarreviewspercent}}%"></div>
                                    </div>
                                </div>
                                <span class="text-sm-right">{{$onestarreviewscount}} reviews</span>
                            </div>
                        </div>
                    </div>

                    <div class="tell-experience p-3 col-md-4 col-xl-6">
                        <p>Rate Product</p>
                        <!-- <h3>Please LOGIN to Review</h3> -->
                        <form method="post" action="" id="review_form">
                            <div class="rating-stars">
                                <input type="radio" name="rating" id="star1" value="5">
                                <label for="star1" required></label>
                                <input type="radio" name="rating" id="star2" value="4">
                                <label for="star2"></label>
                                <input type="radio" name="rating" id="star3" value="3">
                                <label for="star3"></label>
                                <input type="radio" name="rating" id="star4" value="2">
                                <label for="star4"></label>
                                <input type="radio" name="rating" id="star5" value="1">
                                <label for="star5"></label>
                            </div>
                            <input type="hidden" name="foodid" value="{{$food->id}}">
                            <textarea name="review" id="message" rows="4" placeholder="Your Review*"
                                required></textarea>
                            <div class="review-submit-button text-lg-right">
                                <!-- <input type="submit" value="Login To Submit Review"> -->
                                @if(!isset($_SESSION['userid']))
                                
                                <a class="btn btn-cart2" href="/login" style="cursor: pointer;">Login to Review</a>
                                @elseif(isset($_SESSION['userid']) && $purchased=='no')
                                <button type="button" class="btn btn-cart2" style="cursor: pointer;">Purchase to Review</button>
                                @elseif(isset($_SESSION['userid']) && $reviewd=='yes')
                                <button type="button" class="btn btn-cart2" style="cursor: pointer;">Already Reviewed</button>
                                @elseif(isset($_SESSION['userid']) && $purchased=='yes')
                                <button type="submit" class="btn btn-cart2" type="submit" style="cursor: pointer;">Submit Review</button>
                                @endif
                            </div>
                        </form>
                    </div>
                   
                </div>

            

            </div>
        </div>
    </div>
    <!-- /.choregrapher review -->

    <div id="reviews-block" id="reviews-block">
                                               @foreach($allreviews as $allreviewsnew)
                                                    <div class="total-reviews">
                                                        
                                                        <div class="review-box">
                                                            <div class="ratings">
                                                            @if($allreviewsnew->rating=='1')
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                            @elseif($allreviewsnew->rating=='2')
                                                                <span class="good"><i class="fa fa-star"></i></span> 
                                                                <span class="good"><i class="fa fa-star"></i></span> 
                                                            @elseif($allreviewsnew->rating=='3')
                                                                <span class="good"><i class="fa fa-star"></i></span> 
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span> 
                                                            @elseif($allreviewsnew->rating=='4')
                                                                <span class="good"><i class="fa fa-star"></i></span> 
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span> 
                                                                <span class="good"><i class="fa fa-star"></i></span> 
                                                            @elseif($allreviewsnew->rating=='5')
                                                                <span class="good"><i class="fa fa-star"></i></span> 
                                                                <span class="good"><i class="fa fa-star"></i></span>
                                                                <span class="good"><i class="fa fa-star"></i></span>  
                                                                <span class="good"><i class="fa fa-star"></i></span> 
                                                                <span class="good"><i class="fa fa-star"></i></span> 
                                                            @endif
                                                            </div>
                                                            <div class="post-author">
                                                                <p> 
                                                                
                                                            <i class="fa fa-user-circle"></i>
                                                                <span><strong>{{$allreviewsnew->username}}</strong> -</span> {{$allreviewsnew->created_at->diffForHumans()}}</p>
                                                            </div>
                                                            <p>{{$allreviewsnew->review}}</p>
                                                        </div>
                                                    </div>
                                            @endforeach
                                        </div>








            </div>
        </div>
    </section>
    <!-- END SECTION LISTING DETAIL -->

    <!-- START FOOTER -->
    <footer class="first-footer">
        <div class="top-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="netabout">
                            <a href="index.html" class="logo">
                                <img src="/webapp-assets/images/logo.svg" alt="netcom">
                            </a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum incidunt architecto soluta laboriosam, perspiciatis, aspernatur officiis esse.</p>
                        </div>
                        <div class="contactus">
                            <ul>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p class="in-p">95 South Park Avenue, USA</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <p class="in-p">+456 875 369 208</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <p class="in-p ti">support@Food.com</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget quick-link clearfix">
                            <h3 class="widget-title">Quick Links</h3>
                            <div class="quick-links">
                                <ul class="one-half mr-5">
                                    <li><a href="index.html">Home</a></li>
                                    <li><a href="about.html">About Us</a></li>
                                    <li><a href="listing-details.html">Listing Details</a></li>
                                    <li><a href="dashboard.html">Dashboard</a></li>
                                    <li><a href="register.html">Register</a></li>
                                    <li class="no-pb"><a href="blog-list.html">Blog List</a></li>
                                </ul>
                                <ul class="one-half">
                                    <li><a href="blog-grid.html">Blog</a></li>
                                    <li><a href="pricing-table.html">Pricing</a></li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                    <li><a href="#">Support</a></li>
                                    <li><a href="faq.html">Our Faq</a></li>
                                    <li class="no-pb"><a href="listings-full-grid.html">Listings</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="widget">
                            <h3>Instagram</h3>
                            <ul class="photo">
                                <li class="hover-effect">
                                    <figure>
                                        <a href="#"><img src="/webapp-assets/images/instagram/inst-1.jpg" alt=""></a>
                                    </figure>
                                </li>
                                <li class="hover-effect">
                                    <figure>
                                        <a href="#"><img src="/webapp-assets/images/instagram/inst-2.jpg" alt=""></a>
                                    </figure>
                                </li>
                                <li class="hover-effect">
                                    <figure>
                                        <a href="#"><img src="/webapp-assets/images/instagram/inst-3.jpg" alt=""></a>
                                    </figure>
                                </li>
                                <li class="hover-effect">
                                    <figure>
                                        <a href="#"><img src="/webapp-assets/images/instagram/inst-4.jpg" alt=""></a>
                                    </figure>
                                </li>
                                <li class="hover-effect">
                                    <figure>
                                        <a href="#"><img src="/webapp-assets/images/instagram/inst-5.jpg" alt=""></a>
                                    </figure>
                                </li>
                                <li class="hover-effect">
                                    <figure>
                                        <a href="#"><img src="/webapp-assets/images/instagram/inst-6.jpg" alt=""></a>
                                    </figure>
                                </li>
                                <li class="hover-effect">
                                    <figure>
                                        <a href="#"><img src="/webapp-assets/images/instagram/inst-7.jpg" alt=""></a>
                                    </figure>
                                </li>
                                <li class="hover-effect">
                                    <figure>
                                        <a href="#"><img src="/webapp-assets/images/instagram/inst-8.jpg" alt=""></a>
                                    </figure>
                                </li>
                                <li class="hover-effect">
                                    <figure>
                                        <a href="#"><img src="/webapp-assets/images/instagram/inst-9.jpg" alt=""></a>
                                    </figure>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="newsletters">
                            <h3>Newsletters</h3>
                            <p>Sign Up for Our Newsletter to get Latest Updates and Offers. Subscribe to receive news in your inbox.</p>
                        </div>
                        <form class="bloq-email mailchimp form-inline" method="post">
                            <label for="subscribeEmail" class="error"></label>
                            <div class="email">
                                <input type="email" id="subscribeEmail" name="EMAIL" placeholder="Enter Your Email">
                                <input type="submit" value="Subscribe">
                                <p class="subscription-success"></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="second-footer">
            <div class="container">
                <p>Code-Theme. ©2020 All rights reserved. </p>
                <ul class="netsocials">
                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </footer>

    <a data-scroll href="#heading" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
    <!-- END FOOTER -->
    

    <!-- ARCHIVES JS -->
    <script src="/webapp-assets/js/jquery.min.js"></script>
    <script src="/webapp-assets/js/jquery-ui.js"></script>
    <script src="/webapp-assets/js/range-slider.js"></script>
    <script src="/webapp-assets/js/tether.min.js"></script>
    <script src="/webapp-assets/js/bootstrap.min.js"></script>
    <script src="/webapp-assets/js/smooth-scroll.min.js"></script>
    <script src="/webapp-assets/js/jquery.magnific-popup.min.js"></script>
    <script src="/webapp-assets/js/popup.js"></script>
    <script src="/webapp-assets/js/ajaxchimp.min.js"></script>
    <script src="/webapp-assets/js/newsletter.js"></script>
    <script src="/webapp-assets/js/timedropper.js"></script>
    <script src="/webapp-assets/js/datedropper.js"></script>
    <script src="/webapp-assets/js/jqueryadd-count.js"></script>
    <script src="/webapp-assets/js/leaflet.js"></script>
    <script src="/webapp-assets/js/leaflet-gesture-handling.min.js"></script>
    <script src="/webapp-assets/js/leaflet-providers.js"></script>
    <script src="/webapp-assets/js/leaflet.markercluster.js"></script>
    <script src="/webapp-assets/js/map-single.js"></script>
    <script src="/webapp-assets/js/swiper.min.js"></script>
    <script src="/webapp-assets/js/color-switcher.js"></script>
    <script>
        $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 3,
            slidesPerGroup: 3,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });

    </script>

    <script>
        if ($('.image-link').length) {
            $('.image-link').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }
        if ($('.image-link2').length) {
            $('.image-link2').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }
            });
        }

    </script>
    <!-- Date Dropper Script-->
    <script>
        $('#reservation-date').dateDropper();

    </script>
    <!-- Time Dropper Script-->
    <script>
        this.$('#reservation-time').timeDropper({
            setCurrentTime: false,
            meridians: true,
            primaryColor: "#e8212a",
            borderColor: "#e8212a",
            minutesInterval: '15'
        });

        //Add review
        $("#review_form").on('submit', (function (e) {
          e.preventDefault(); 
                  $.ajax({
                  url:"/adduserreview",
                  type: "POST",
                  data:$('#review_form').serialize(),
                  success:function(data)
                  {
                  //  console.log("data",data);
                      if(data==1){
                          $('#review_form')[0].reset();
                          
                          $("#prod-ratings").load(location.href + " #prod-ratings");
                          $("#reviewsection").load(location.href + " #reviewsection");
                          $("#reviews-block").load(location.href + " #reviews-block");
                          $("#rating-tab").load(location.href + " #rating-tab");
                          $.toaster({ priority : 'success', title : 'Success', message : 'Review Added Successfully!'});
                      }
                  }
              });
             
          }));

    </script>

    <script src="/webapp-assets/js/inner.js"></script>
</body>


</html>
