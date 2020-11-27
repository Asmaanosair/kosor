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
                <h3 class="text-themecolor mb-0">القصور   </h3>
                <ol class="breadcrumb mb-0 p-0 bg-transparent">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">Starter Kit</li>
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
            <div class="row">
                <!-- Column -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">اسم القصر</h3>
                            <h6 class="card-subtitle">{{$kosor->name}}</h6>
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="white-box text-center"> <img src="{{$kosor->image}}" class="img-fluid"> </div>
                                </div>
                                <div class="col-lg-9 col-md-9 col-sm-6">
                                    <h4 class="box-title mt-5">وصف القصر</h4>
                                    <p>{{$kosor->description}}</p>
                                    <h4 class="box-title mt-5"> تفاصيل الخدمه </h4>
                                    <p>{{$kosor->service_description}}</p>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <h3 class="box-title mt-5">General Info</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                            <tr>
                                                <td width="390">السعر</td>
                                                <td> {{$kosor->price}} </td>
                                            </tr>
                                            <tr>
                                                <td>عدد القاعات  </td>
                                                <td>{{$kosor->num_hall}} </td>
                                            </tr>
                                            <tr>
                                                <td>عدد الافراد  </td>
                                                <td> {{$kosor->num_people}} </td>
                                            </tr>
                                            <tr>
                                                <td> الموقع  </td>
                                                <td> {{$kosor->location}} </td>
                                            </tr>
                                            <tr>
                                                <td> قاعات الرجال   </td>
                                                <td> @foreach($menHalls as $men)<li>{{$men->name}} </li>@endforeach </td>
                                            </tr>
                                            <tr>
                                                <td> قاعات النساء   </td>
                                                <td> @foreach($womenHalls as $hall)<li>{{$hall->name}} </li>@endforeach </td>
                                            </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-subtitle"></h6>
                            <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2 float-right"
                                    data-toggle="modal" data-target="#add-contact" >إضافة صور جديد</button>
                            <!-- Add Contact Popup Model -->
                            <div id="add-contact"  class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">إضافة صور جديد </h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                        </div>

                                        <form class="form-horizontal form-material" action="{{AdminUrl('kosorImage')}}"  method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">

                                                <div class="form-group">

                                                    <div class="col-md-12 m-b-20">
                                                        <div class=" btn  btn-rounded waves-effect waves-light btn-sm">
                                                                <span><i class="ion-upload m-r-5"></i>Upload
                                                                    Image</span>
                                                            <input  type="file" name="images[]" class="upload" required multiple>
                                                            <input name="id" value="{{$kosor->id}}" hidden >
                                                            @if ($errors->has('images'))
                                                                <span class="help-block text-danger">
                                            <strong>{{ $errors->first('images') }}</strong>
                                         </span>
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-info waves-effect"
                                                >Save</button>

                                                <button type="button" class="btn btn-default waves-effect"
                                                        data-dismiss="modal">Cancel</button>

                                            </div>
                                        </form>


                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            @if(Session::has('success'))


                                <div class="alert alert-success alert-dismissible fade show col-6" role="alert">
                                    {{Session::get('success')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <h4 class="card-title">الصور</h4>
                            <h6 class="card-subtitle">رؤية جميع الصور </h6>
                            <table class="table table-striped table-bordered" >
                                <thead>
                                <tr>
                                    <th>الصور</th>
                                    <th>حذف  </th>

                                </tr>
                                </thead>
                                <tbody>


                                @foreach($images as $row)
                                    <tr>


                                        <td>

                                            <img    src='{{$row->image}}' width="100px" height="100px">

                                        </td>


                                        <td>
                                            <button type="button" class="btn btn-danger btn btn-success  m-t-10 mb-2 float-right" data-toggle="modal" data-target="#modal-danger{{$row->id}}">
                                                <i class="fa fa-trash"></i></button>


                                            <div class="modal fade" id="modal-danger{{$row->id}}">
                                                <div class="modal-dialog">
                                                    <div class="modal-content bg-danger">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Delete </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p style="color: white;font-weight: 700">هل انت متاكد من الحذف </p>
                                                        </div>
                                                        <div class="modal-footer justify-content-between">
                                                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                                                            <form action="{{AdminUrl('kosorImage/'.$row->id)}}" method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <BUTTON type="submit"   class="btn btn-outline-light">Delete </BUTTON>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>


                                        </td>




                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>

                                    <th>الصور</th>

                                    <th>حذف  </th>
                                </tr>
                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
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


