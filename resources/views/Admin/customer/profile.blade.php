@extends('Admin.layouts.adminLayout')
@section('content')

    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 col-12 align-self-center">
                <h3 class="text-themecolor mb-0">الصفحه الشخصيه  </h3>
                <ol class="breadcrumb mb-0 p-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">الصفحه الشخصيه </li>
                </ol>
            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->
            <!-- Row -->
            <div class="row">
                <!-- Column -->
                <div class="col-lg-4 col-xlg-3 col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <center class="mt-4"> <img src="{{AdminAssets('/')}}/images/users/5.jpg" class="rounded-circle" width="150" />
                                <h4 class="card-title mt-2">{{AdminGuard()->user()->name}} </h4>
                                <h6 class="card-subtitle">
                                @if(AdminGuard()->user()->role=='admin')
                                    مشرف
                                    @else
                                    صاحب قصر
                                    @endif

                                </h6>

                            </center>
                        </div>
                        <div>
                            <hr> </div>
                        <div class="card-body"> <small class="text-muted">Email address </small>
                            <h6>{{AdminGuard()->user()->email}} </h6>

                        </div>
                    </div>
                </div>
                <!-- Column -->
                <!-- Column -->
                <div class="col-lg-8 col-xlg-9 col-md-7">
                    <div class="card">
                        <!-- Tabs -->
                        <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link " id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="true">Timeline</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#last-month" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>--}}
{{--                            </li>--}}
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-setting-tab" data-toggle="pill" href="#previous-month" role="tab" aria-controls="pills-setting" aria-selected="false">Setting</a>
                            </li>
                        </ul>
                        <!-- Tabs -->
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade " id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                                <div class="card-body">
                                    <div class="profiletimeline mt-0">
                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="../assets/images/users/1.jpg" alt="user" class="rounded-circle" /> </div>
                                            <div class="sl-right">
                                                <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                    <p>assign a new task <a href="javascript:void(0)"> Design weblayout</a></p>
                                                    <div class="row">
                                                        <div class="col-lg-3 col-md-6 mb-3"><img src="../assets/images/big/img1.jpg" class="img-fluid rounded" /></div>
                                                        <div class="col-lg-3 col-md-6 mb-3"><img src="../assets/images/big/img2.jpg" class="img-fluid rounded" /></div>
                                                        <div class="col-lg-3 col-md-6 mb-3"><img src="../assets/images/big/img3.jpg" class="img-fluid rounded" /></div>
                                                        <div class="col-lg-3 col-md-6 mb-3"><img src="../assets/images/big/img4.jpg" class="img-fluid rounded" /></div>
                                                    </div>
                                                    <div class="like-comm"> <a href="javascript:void(0)" class="link mr-2">2 comment</a> <a href="javascript:void(0)" class="link mr-2"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="../assets/images/users/2.jpg" alt="user" class="rounded-circle" /> </div>
                                            <div class="sl-right">
                                                <div> <a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                    <div class="mt-3 row">
                                                        <div class="col-md-3 col-xs-12"><img src="../assets/images/big/img1.jpg" alt="user" class="img-fluid rounded" /></div>
                                                        <div class="col-md-9 col-xs-12">
                                                            <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p> <a href="javascript:void(0)" class="btn btn-success"> Design weblayout</a></div>
                                                    </div>
                                                    <div class="like-comm mt-3"> <a href="javascript:void(0)" class="link mr-2">2 comment</a> <a href="javascript:void(0)" class="link mr-2"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="../assets/images/users/3.jpg" alt="user" class="rounded-circle" /> </div>
                                            <div class="sl-right">
                                                <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                    <p class="mt-2"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                                </div>
                                                <div class="like-comm mt-3"> <a href="javascript:void(0)" class="link mr-2">2 comment</a> <a href="javascript:void(0)" class="link mr-2"><i class="fa fa-heart text-danger"></i> 5 Love</a> </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="sl-item">
                                            <div class="sl-left"> <img src="../assets/images/users/4.jpg" alt="user" class="rounded-circle" /> </div>
                                            <div class="sl-right">
                                                <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                                    <blockquote class="mt-2">
                                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                                    </blockquote>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                            <br>
                                            <p class="text-muted">Johnathan Deo</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                            <br>
                                            <p class="text-muted">(123) 456 7890</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                            <br>
                                            <p class="text-muted">johnathan@admin.com</p>
                                        </div>
                                        <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                            <br>
                                            <p class="text-muted">London</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <p class="mt-4">Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt.Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim.</p>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries </p>
                                    <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                    <h4 class="font-medium mt-4">Skill Set</h4>
                                    <hr>
                                    <h5 class="mt-4">Wordpress <span class="pull-right">80%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h5 class="mt-4">HTML 5 <span class="pull-right">90%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:90%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h5 class="mt-4">jQuery <span class="pull-right">50%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                    <h5 class="mt-4">Photoshop <span class="pull-right">70%</span></h5>
                                    <div class="progress">
                                        <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%; height:6px;"> <span class="sr-only">50% Complete</span> </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="previous-month" role="tabpanel" aria-labelledby="pills-setting-tab">
                                @if(Session::has('success'))
                                    <div class="alert alert-success alert-dismissible fade show col-6" role="alert">
                                        {{Session::get('success')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <form class="form-horizontal form-material" method='post' action="{{AdminUrl('changePass/'.AdminGuard()->user()->id)}}">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="password" class="col-md-4 col-form-label text-md-right">كلمة المرور الجديده</label>

                                            <div class="col-md-6">
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">تأكيد كلمة المرور</label>

                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <button class="btn btn-success" type="submit">تحديث كلمة المرور </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <!-- Row -->
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer">
            © 2020 Material Pro Admin by wrappixel.com
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->

@stop


