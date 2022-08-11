<div class="col-lg-4 col-md-12 col-xs-12">
                    <div class="user-profile-box">
                        <div class="header clearfix">
                            <h2>{{$data->name}}</h2>
                            <h4>Active User</h4>
                            <img src="/webapp-assets/images/user-images/{{$data->user_photo}}" alt="avatar" class="img-fluid profile-img">
                        </div>
                        <div class="detail clearfix">
                            <ul>
                                <li>
                                    <a @if(Request::is('dashboard')) class="active" @endif href="/dashboard">
                                        <i class="fa fa-home"></i> Dashboard
                                    </a>
                                </li>
                                @if(isset($_SESSION['userstatus']) && $_SESSION['userstatus']=='1')
                                <li>
                                    <a href="/notifications" @if(Request::is('notifications')) class="active" @endif>
                                        <i class="fa fa-bell" aria-hidden="true"></i>Notifications
                                    </a>
                                </li>
                                <li>
                                    <a href="/my-profile/{{$data->id}}" @if(Request::is('my-profile/*')) class="active" @endif>
                                        <i class="fa fa-user"></i>My Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="/my-foods" @if(Request::is('my-foods')) class="active" @endif>
                                        <i class="fa fa-list" aria-hidden="true"></i>My Foods
                                    </a>
                                </li>
                                <li>
                                    <a href="/orders" @if(Request::is('orders')) class="active" @endif>
                                        <i class="fa fa-heart"></i>Orders
                                    </a>
                                </li>
                                <li>
                                    <a href="/upload-food" @if(Request::is('upload-food')) class="active" @endif>
                                        <i class="fa fa-list" aria-hidden="true"></i>Upload Food
                                    </a>
                                </li>
                                <li>
                                    <a href="/my-messages" @if(Request::is('my-messages')) class="active" @endif>
                                        <i class="fa fa-comments" aria-hidden="true"></i>My Messages
                                    </a>
                                </li>
                                <!-- <li>
                                    <a href="/change-password" @if(Request::is('change-password')) class="active" @endif>
                                        <i class="fa fa-lock"></i>Change Password
                                    </a>
                                </li> -->
                                <li class="">
                                    <a href="/logout">
                                        <i class="fas fa-sign-out-alt"></i>Log Out
                                    </a>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>