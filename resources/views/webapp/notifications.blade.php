@include('webapp.layout.header')

<section class="headings">
        <div class="text-heading text-center">
            <div class="container">
                <h1>My Notifications</h1>
                <h2><a href="/">Home </a> &nbsp;/&nbsp; My Notifications</h2>
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
                <h3 class="heading">Notifications</h3>
                @if(session()->has('message'))
                  <div class="alert alert-success m-auto text-center alert-dismissible">
                        <strong>Success!! </strong> {{ session()->get('message') }}
                          <button type="button" class="close mt-0" data-dismiss="alert">&times;</button>
                  </div>
                @endif
                <div class="section-body listing-table">
<div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Notification</th>
                                            <th>Date</th>
                                                    
                                            </tr>
                                    </thead>
                                    <tbody>
                                    @php $x=1; @endphp
                            @foreach($notifications as $notificationsnew)
                                      <tr @if($notificationsnew->status!='1') @endif>
                                    
                                       
                              <td>{{$x++}}</td>
                              <td><a href="{{$notificationsnew->url}}">{{$notificationsnew->notification}}</a></td>
                             
                              <td>{{$notificationsnew->created_at}}</td>
                           
                              </tr> 
                            @endforeach
                                    </tbody>
                                </table>
                                
                            </div>
                             </div>
						
						
					
				</div>
            </div>
        </div>
    </section>
    <!-- END SECTION DASHBOARD -->

@include('webapp.layout.footer')
