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
                <h3 class="text-themecolor mb-0">قاعات النساء   </h3>

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
                                    data-toggle="modal" data-target="#add-contact" >إضافة قاعه جديده</button>
                            <!-- Add Contact Popup Model -->
                            <div id="add-contact"  class="modal fade in" tabindex="-1" role="dialog"
                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">إضافة قاعه جديده </h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">×</button>
                                        </div>

                                        <form class="form-horizontal form-material" action="{{AdminUrl('womenHalls')}}"  method="post" enctype="multipart/form-data">
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
                                                </div>

                                                    <div class="form-group mb-4">
                                                        <label for="exampleFormControlSelect1"> اختر القصر </label>
                                                        <select class="form-control" id="exampleFormControlSelect1" name="kosorId">
                                                            @if($id=AdminGuard()->user()->role=='admin')
                                                                @foreach($kosor as $val)
                                                                    <option  value="{{$val->id}}">{{$val->name}}</option>
                                                                @endforeach
                                                            @else
                                                                <option  value="{{$kosor->id}}" selected>{{$kosor->name}}</option>
                                                            @endif
                                                        </select>
                                                        @if ($errors->has('kosorId'))
                                                            <span class="help-block text-danger">
                                            <strong>{{ $errors->first('kosorId') }}</strong>
                                         </span>
                                                        @endif
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
                            <h4 class="card-title">القاعات</h4>
                            <h6 class="card-subtitle">رؤية جميع القاعات</h6>
                            <table class="table table-striped table-bordered" id="editable-datatable">
                                <thead>
                                <tr>
                                    <th> القاعات</th>

                                    <th>تعديل </th>
                                    <th>حذف  </th>

                                </tr>
                                </thead>
                                <tbody>


                                          @foreach($halls as $row)
                                <tr>

                                    <td> {{$row->name}}</td>




                                        <!-- Add Contact Popup Model -->
                                    <td>

                                        <button type="button" class="btn btn-success m-t-10 mb-2 float-right"
                                                data-toggle="modal" data-target="#add-contact{{$row->id}}" >  <i class="fa fa-edit"></i> </button>
                                        <!-- Add Contact Popup Model -->
                                        <div id="add-contact{{$row->id}}"  class="modal fade in" tabindex="-1" role="dialog"
                                             aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel"> تعديل   </h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-hidden="true">×</button>
                                                    </div>

                                                    <form class="form-horizontal form-material" action="{{AdminUrl('womenHalls/'.$row->id)}}"  method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">


                                                            <div class="form-group">
                                                                <div class="col-md-12 m-b-20">
                                                                    <input type="text" class="form-control"  id="name"name="name" value="{{$row->name}}" placeholder="الاسم " required>
                                                                    @if ($errors->has('name'))
                                                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('name') }}</strong>
                                         </span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                                <div class="form-group mb-4">
                                                                    <label for="exampleFormControlSelect1"> اختر القصر </label>
                                                                    <select class="form-control" id="exampleFormControlSelect1" name="kosorId">
                                                                        @if($id=AdminGuard()->user()->role=='admin')
                                                                            @php(
                                                                            $nameKasr=\App\Kosor::find($row->kosor_id)
    )
                                                                            <option  value="{{$row->kosor_id}}">{{$nameKasr->name}}</option>
                                                                            @foreach($kosor as $val)
                                                                                <option  value="{{$val->id}}">{{$val->name}}</option>
                                                                            @endforeach

                                                                        @else
                                                                            <option  value="{{$kosor->id}}" selected>{{$kosor->name}}</option>
                                                                        @endif
                                                                    </select>
                                                                    @if ($errors->has('kosorId'))
                                                                        <span class="help-block text-danger">
                                            <strong>{{ $errors->first('kosorId') }}</strong>
                                         </span>
                                                                    @endif
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
                                                        <form action="{{AdminUrl('womenHalls/'.$row->id)}}" method="post">
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
                                    <th> القاعات</th>

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


