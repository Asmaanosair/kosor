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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-subtitle"></h6>
                            <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2 float-right"
                                    data-toggle="modal" data-target="#add-contact" >إضافة قصر جديد</button>
                            <!-- Add Contact Popup Model -->
                            <div id="add-contact"  class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">إضافة قصر جديد </h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                        </div>

                                        <form class="form-horizontal form-material" action="{{AdminUrl('kosor')}}"  method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">

                                                <div class="form-group">

                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control"  id="name"name="name" placeholder="الاسم " required>
                                                        @if ($errors->has('name'))
                                                            <span class="help-block text-danger">
                                            <strong>{{ $errors->first('name') }}</strong>
                                         </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control"   name="price" placeholder="السعر " required>
                                                        @if ($errors->has('price'))
                                                            <span class="help-block text-danger">
                                            <strong>{{ $errors->first('price') }}</strong>
                                         </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control"  name="num_people" placeholder="عدد الافراد " required>
                                                        @if ($errors->has('num_people'))
                                                            <span class="help-block text-danger">
                                            <strong>{{ $errors->first('num_people') }}</strong>
                                         </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control" name="num_hall"  placeholder="عدد القاعات " required>
                                                        @if ($errors->has('num_hall'))
                                                            <span class="help-block text-danger">
                                                           <strong>{{ $errors->first('num_hall') }}</strong>
                                                              </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <textarea type="text" class="form-control"   name="description" placeholder="وصف القصر " required>
                                                        </textarea>
                                                        @if ($errors->has('description'))
                                                            <span class="help-block text-danger">
                                                     <strong>{{ $errors->first('description') }}</strong>
                                                     </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <textarea type="text" class="form-control"   name="service_description" placeholder="تفاصيل الخدمه  " required>
                                                        </textarea>
                                                        @if ($errors->has('service_description'))
                                                            <span class="help-block text-danger">
                                            <strong>{{ $errors->first('service_description') }}</strong>
                                         </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <input type="text" class="form-control" name="location" placeholder="الموقع " required>
                                                        @if ($errors->has('location'))
                                                            <span class="help-block text-danger">
                                            <strong>{{ $errors->first('location') }}</strong>
                                               </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label for="exampleFormControlSelect1"> اختر المكان</label>
                                                        <select class="form-control" id="exampleFormControlSelect1" name="districtId">
                                                            @foreach($district as $val)
                                                            <option  value="{{$val->id}}">{{$val->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        @if ($errors->has('districtId'))
                                                            <span class="help-block text-danger">
                                            <strong>{{ $errors->first('districtId') }}</strong>
                                         </span>
                                                        @endif
                                                    </div>
                                                    <div class="form-group mb-4">
                                                        <label for="exampleFormControlSelect1"> صاحب القصر </label>
                                                        <select class="form-control" id="exampleFormControlSelect1" name="adminId">
                                                                @foreach($admin as $valAdmin)
                                                                    <option  value="{{$valAdmin->id}}">{{$valAdmin->name}}</option>
                                                                @endforeach

                                                        </select>
                                                        @if ($errors->has('adminId'))
                                                            <span class="help-block text-danger">
                                            <strong>{{ $errors->first('adminId') }}</strong>
                                         </span>
                                                        @endif
                                                    </div>
                                                    <div class="col-md-12 m-b-20">
                                                        <div class=" btn  btn-rounded waves-effect waves-light btn-sm">
                                                                <span><i class="ion-upload m-r-5"></i>Upload
                                                                    Image</span>
                                                            <input  type="file" name="image" class="upload" required>
                                                            @if ($errors->has('image'))
                                                                <span class="help-block text-danger">
                                            <strong>{{ $errors->first('image') }}</strong>
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
                            <h4 class="card-title">القصور</h4>
                            <h6 class="card-subtitle">رؤية جميع القصور</h6>
                            <table class="table table-striped table-bordered" id="editable-datatable">
                                <thead>
                                <tr>
                                    <th> القصور</th>
                                    <th>الصور</th>
                                    <th>تفاصيل القصر والصور</th>
                                    <th>تعديل </th>
                                    <th>حذف  </th>

                                </tr>
                                </thead>
                                <tbody>


@foreach($kosor as $row)
                                <tr>

                                    <td> {{$row->name}}</td>
                                    <td>

                                        <img    src='{{$row->image}}' width="100px" height="100px">

                                    </td>


                                    <td>
                                        <a href="{{AdminUrl('kosor/'.$row->id)}}" type="button" class="btn btn-success btn-sm  m-t-10 mb-2 float-right"><i class="fa fa-eye"></i></a>
                                    </td>
                                        <!-- Add Contact Popup Model -->
                                    <td>
                                        <a href="{{AdminUrl('kosor/'.$row->id.'/edit')}}" type="button" class="btn btn-success btn-sm  m-t-10 mb-2 float-right"><i class="fa fa-edit"></i></a>
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
                                                        <form action="{{AdminUrl('kosor/'.$row->id)}}" method="post">
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
                                    <th> المناطق</th>
                                    <th>الصور</th>
                                    <th>تفاصيل القصر والصور</th>
                                    <th>تعديل </th>
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


