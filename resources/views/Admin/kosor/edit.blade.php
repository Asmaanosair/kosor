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
                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible fade show col-6" role="alert">
                                    {{Session::get('success')}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form class="form-horizontal form-material" action="{{AdminUrl('kosor/'.$kosor->id)}}"  method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label  class="col-sm-2 col-form-label">الاسم  </label>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control"  id="name"name="name" value="{{$kosor->name}}" placeholder="الاسم " required>
                                            @if ($errors->has('name'))
                                                <span class="help-block text-danger">
                                            <strong>{{ $errors->first('name') }}</strong>
                                         </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 col-form-label">السعر  </label>

                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control"   name="price" value="{{$kosor->price}}" placeholder="السعر " required>
                                            @if ($errors->has('price'))
                                                <span class="help-block text-danger">
                                            <strong>{{ $errors->first('price') }}</strong>
                                         </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 col-form-label">عدد الافراد   </label>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control"  name="num_people"  value="{{$kosor->num_people}}" placeholder="عدد الافراد " required>
                                            @if ($errors->has('num_people'))
                                                <span class="help-block text-danger">
                                            <strong>{{ $errors->first('num_people') }}</strong>
                                         </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 col-form-label">عدد القاعات   </label>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control" name="num_hall"   value="{{$kosor->num_hall}}" placeholder="عدد القاعات " required>
                                            @if ($errors->has('num_hall'))
                                                <span class="help-block text-danger">
                                                           <strong>{{ $errors->first('num_hall') }}</strong>
                                                              </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 col-form-label">وصف القصر   </label>
                                        <div class="col-md-12 m-b-20">
                                                        <textarea type="text" class="form-control"   name="description"placeholder="وصف القصر " required>
                                                            {{$kosor->description}}
                                                        </textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block text-danger">
                                                     <strong>{{ $errors->first('description') }}</strong>
                                                     </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 col-form-label">تفاصيل الخدمه   </label>
                                        <div class="col-md-12 m-b-20">
                                                        <textarea type="text" class="form-control"   name="service_description"  placeholder="تفاصيل الخدمه  " required>
                                                            {{$kosor->service_description}}
                                                        </textarea>
                                            @if ($errors->has('service_description'))
                                                <span class="help-block text-danger">
                                            <strong>{{ $errors->first('service_description') }}</strong>
                                         </span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  class="col-sm-2 col-form-label"> الموقع   </label>
                                        <div class="col-md-12 m-b-20">
                                            <input type="text" class="form-control" name="location"  value="{{$kosor->location}}" placeholder="الموقع " required>
                                            @if ($errors->has('location'))
                                                <span class="help-block text-danger">
                                            <strong>{{ $errors->first('location') }}</strong>
                                         </span>
                                            @endif
                                        </div>
                                    </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlSelect1"> اختر المكان</label>
                                            <select class="form-control" id="exampleFormControlSelect1" name="districtId">
                                                @php(
                                                $nameDistrict=\App\District::find($kosor->district_id)->name
                                                                  )
                                                <option value="{{$kosor->district_id}}" selected>{{$nameDistrict}}</option>
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
                                            @if(AdminGuard()->user()->role=='admin')
                                            @php(
                                            $nameAdmin=\App\Admin::find($kosor->admin_id)->name
                                                              )
                                            <option value="{{$kosor->admin_id}}" selected>{{$nameAdmin}}</option>
                                            @foreach($admin as $valAdmin)
                                                <option  value="{{$valAdmin->id}}">{{$valAdmin->name}}</option>
                                            @endforeach
                                            @else
                                                <option value="{{$kosor->admin_id}}" selected>{{AdminGuard()->user()->name}}</option>
                                            @endif
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
                                                <input  type="file" name="image" class="upload" >
                                                @if($kosor->image==null)
                                                    <span class="help-block text-red">
                                            <strong>Please Uploade Image</strong>
                                         </span>
                                                @else
                                                    <img src="{{$kosor->image}}" width="100px"height="100px">
                                                @endif
                                                @if ($errors->has('image'))
                                                    <span class="help-block text-danger">
                                            <strong>{{ $errors->first('image') }}</strong>
                                         </span>
                                                @endif

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


