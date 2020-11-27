<template>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-subtitle"></h6>
                    <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2 float-right"
                            data-toggle="modal" data-target="#add-contact" >إضافة حى  جديد</button>
                    <!-- Add Contact Popup Model -->
                    <div id="add-contact"  class="modal fade in" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">إضافة حاره جديد  </h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">×</button>
                                </div>

                                <form class="form-horizontal form-material" @submit.prevent="AddDistricts" enctype="multipart/form-data">
                                    <div class="modal-body">

                                        <div class="form-group">

                                            <div class="col-md-12 m-b-20">
                                                <input type="text" class="form-control" v-model="name" placeholder="الاسم ">
                                                <div v-if="allErrors.name" class="alert-danger form-control">{{ allErrors.name[0] }}</div>

                                            </div>
                                            <div class="col-md-12 m-b-20">




                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1"> اختر المدينه</label>
                                                    <select class="form-control" id="exampleFormControlSelect1" v-model="cityId">
                                                        <option  v-for="city in cities" :value="city.id">{{city .city}}</option>
                                                    </select>
                                                </div>
                                                <div v-if="allErrors.cityId" class="alert-danger form-control">{{ allErrors.cityId[0] }}</div>

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

                    <h4 class="card-title">الاحياء </h4>
                    <h6 class="card-subtitle">رؤية جميع الاحياء</h6>
                    <table class="table table-striped table-bordered" id="editable-datatable">
                        <thead>
                        <tr>
                            <th> الاحياء</th>
                            <th> المدن </th>
                            <th>تعديل </th>
                            <th>حذف  </th>

                        </tr>
                        </thead>
                        <tbody>



                        <tr v-for="district in districts">

                            <td> {{district.name || ''}}</td>
                            <td>

                                {{district.city || ''}}

                            </td>

                            <td>
                                <button type="button" class="btn btn-success  m-t-10 mb-2 float-right"
                                        data-toggle="modal" data-target="#edit-contact" @click="EditDistrict(district.id)"> <i class="fa fa-edit"></i>  </button>
                                <!-- Add Contact Popup Model -->
                            </td>

                            <td class="center"> <button type="button" class="btn btn-danger  m-t-10 mb-2 float-right" @click="DeleteDistrict(district.id)">  <i class="fa fa-trash"></i>  </button></td>

                        </tr>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th> الاحياء</th>
                            <th>المدن</th>
                            <th>تعديل </th>
                            <th>حذف  </th>
                        </tr>
                        </tfoot>
                    </table>
                    <div id="edit-contact"  class="modal fade in" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" >  تعديل   </h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">×</button>
                                </div>

                                <form class="form-horizontal form-material" @submit.prevent="UpdateDistrict(id)"  enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="col-md-12 m-b-20">
                                                <input type="text" class="form-control" v-model="name" placeholder="الاسم ">
                                                <div v-if="allErrors.name" class="alert-danger form-control">{{ allErrors.name[0] }}</div>
                                            </div>
                                            <div class="col-md-12 m-b-20">
                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1"> اختر المدينه</label>
                                                    <select class="form-control" id="exampleFormControlSelect" v-model="cityId">

                                                        <option  v-for="city in cities" :value="city.id">{{city .city}}</option>
                                                    </select>
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
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            this.GetDistricts();

        },
        data() {
            return {
                districts:{},
                cities:{},
                name: '',
                id: '',
                cityId: '',
                image: '',
                allErrors:[],

            };
        },
        methods: {
            GetDistricts(){
                axios.get('/district').then(res => {
                    this.cities=res.data.cities
                    this.districts=res.data.districts

                })

            },
            EditDistrict($id){
                axios.get('/district/'+$id+'/edit').then(res => {
                    this.name=res.data[0].name
                    this.id=res.data[0].id
                    this.cityId=res.data[0].city_id
                })

            },
            AddDistricts() {
                let self = this;
                let formData = new FormData();
                formData.append('cityId',this.cityId);
                formData.append('name', this.name);

                axios.post('/district', formData)
                    .then(function(){
                        self.GetDistricts();
                        self.allErrors=[]
                        self.$swal({
                            text:'تم الاضافه بنجاح   !!!',
                            icon: "success",
                        });
                    }).catch(function (res) {
                    self.allErrors = error.response.data.errors
                    }
                )
            },
            DeleteDistrict($id){
                this.$swal({
                    text: "هل انت متاكد من الحذف",
                    showCancelButton: true,
                    confirmButtonText: 'نعم !',
                    CancelButtonText:  'الغاء'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/district/'+$id).then(res => {
                            this.GetDistricts()
                        })
                        this.$swal(
                            'تم الحذف بنجاح ',
                        )
                    }
                });

            },
            UpdateDistrict($id) {
                let self = this;
                let formData = new FormData();
                formData.append('name',this.name);
                formData.append('cityId', this.cityId);
                formData.append('_method',"PUT")
                axios.post('/district/'+$id, formData)
                    .then(function(res){
                        self.GetDistricts();
                        self.$swal({
                            text:'تم التعديل بنجاح   !!!',
                            icon: "success",
                        });

                    }).catch(function(error){
                    self.allErrors = error.response.data.errors
                });
            },
        },

    }


</script>
