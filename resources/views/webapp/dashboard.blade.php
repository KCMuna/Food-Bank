@include('webapp.layout.header')

<section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>Dashboard</h1>
                <h2><a href="/">Home </a> &nbsp;/&nbsp; Dashboard</h2>
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
                    <div class="dashborad-box">
                        <h4 class="title">Manage Dashboard</h4>
                        <div class="section-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="item">
                                        <div class="icon">
                                            <i class="fa fa-list" aria-hidden="true"></i>
                                        </div>
                                        <div class="info">
                                            <h6 class="number">{{count($foods)}}</h6>
                                            <p class="type ml-1">Food</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="item">
                                        <div class="icon">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                        </div>
                                        <div class="info">
                                            <h6 class="number">{{count($orders)}}</h6>
                                            <p class="type ml-1">Orders</p>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="col-sm-4">
                                    <div class="item">
                                        <div class="icon">
                                            <i class="fas fa-comments"></i>
                                        </div>
                                        <div class="info">
                                            
                                                 <h6 class="number">{{count($messages)}}</h6>
                                          
                                            <p class="type ml-1">Messages</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="item">
                                        <div class="icon">
                                            <i class="fa fa-trophy" aria-hidden="true"></i>
                                        </div>
                                        <div class="info">
                                            <h6 class="number">{{$rewardpoints}}</h6>
                                            <p class="type ml-1">Reward Points</p>
                                        </div>
                                    </div>
                                </div>


                                
                            </div>
                        </div>
                    </div>
                    <div class="dashborad-box">
                       
                        <div class="section-body listing-table">
                           
                            <div class="dashborad-box mb-0">
                    @if(count($foods)>0)
                        <div class="section-inforamation text-center">
                            <a href="/my-foods" class="text-center">View All Foods</a>
                        </div>
                    @else
                        <div class="section-inforamation text-center">
                            <a href="/upload-food" class="text-center"><i class="fa fa-plus"></i> Add Food</a>
                        </div>
                    @endif 

                    </div>

                            
                        </div>
                        
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION DASHBOARD -->

@include('webapp.layout.footer')

