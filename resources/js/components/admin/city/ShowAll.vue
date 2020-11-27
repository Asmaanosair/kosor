<template>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-subtitle"></h6>
                    <button type="button" class="btn btn-info btn-rounded m-t-10 mb-2 float-right"
                            data-toggle="modal" data-target="#add-contact" >إضافة مدينه جديده</button>
                    <!-- Add Contact Popup Model -->
                    <div id="add-contact"  class="modal fade in" tabindex="-1" role="dialog"
                         aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">إضافة مدينه جديده  </h4>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">×</button>
                                </div>

                                <form class="form-horizontal form-material" @submit.prevent="AddCities" enctype="multipart/form-data">
                                    <div class="modal-body">

                                        <div class="form-group">

                                            <div class="col-md-12 m-b-20">
                                                <input type="text" class="form-control" v-model="name" placeholder="الاسم ">
                                                <div v-if="allErrors.name" class="alert-danger form-control">{{ allErrors.name[0] }}</div>


                                            </div>
                                            <div class="col-md-12 m-b-20">




                                                            <div class="form-group mb-4">
                                                                <label for="exampleFormControlSelect1"> اختر المنطقه</label>
                                                                <select class="form-control" id="exampleFormControlSelect1" v-model="regionId">
                                                                    <option  v-for="region in regions" :value="region.id">{{region .name}}</option>
                                                                </select>
                                                            </div>
                                                <div v-if="allErrors.regionId" class="alert-danger form-control">{{ allErrors.regionId[0] }}</div>

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

                    <h4 class="card-title">المدن </h4>
                    <h6 class="card-subtitle">رؤية جميع المدن</h6>
                    <table class="table table-striped table-bordered" id="editable-datatable">
                        <thead>
                        <tr>
                            <th> المدن</th>
                            <th> المناطق</th>
                            <th>تعديل </th>
                            <th>حذف  </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="city in cities">

                            <td> {{city.city || ''}}</td>
                            <td>

                                {{city.name || ''}}

                            </td>

                            <td>
                                <button type="button" class="btn btn-success  m-t-10 mb-2 float-right"
                                        data-toggle="modal" data-target="#edit-contact" @click="EditCity(city.id)"> <i class="fa fa-edit"></i>  </button>
                                <!-- Add Contact Popup Model -->
                            </td>

                            <td class="center"> <button type="button" class="btn btn-danger  m-t-10 mb-2 float-right" @click="DeleteCity(city.id)">  <i class="fa fa-trash"></i>  </button></td>

                        </tr>

                        </tbody>
                        <tfoot>
                        <tr>
                            <th> المدن</th>
                            <th>المناطق</th>
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

                                <form class="form-horizontal form-material" @submit.prevent="UpdateCity(id)"  enctype="multipart/form-data">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="col-md-12 m-b-20">
                                                <input type="text" class="form-control" v-model="name" placeholder="الاسم ">
                                                <div v-if="allErrors.name" class="alert-danger form-control">{{ allErrors.name[0] }}</div>

                                            </div>
                                            <div class="col-md-12 m-b-20">
                                                <div class="form-group mb-4">
                                                    <label for="exampleFormControlSelect1"> اختر المنطقه</label>
                                                    <select class="form-control" id="exampleFormControlSelect" v-model="regionId">

                                                        <option  v-for="region in regions" :value="region.id">{{region .name}}</option>
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
            this.GetCities();
        },
        data() {
            return {
                regions:{},
                cities:{},
                name: '',
                id: '',
                regionId: '',
                image: '',
                allErrors:[],
            };
        },
        methods: {
            GetCities(){
                axios.get('/city').then(res => {
                   this.cities=res.data.cities
                   this.regions=res.data.regions
                })
            },
            EditCity($id){
                axios.get('/city/'+$id+'/edit').then(res => {
                    this.name=res.data[0].city
                    this.id=res.data[0].id
                   this.regionId=res.data[0].region_id
                })
            },
            AddCities() {
                let self = this;
                let formData = new FormData();
                formData.append('regionId',this.regionId);
                formData.append('name', this.name);
                axios.post('/city', formData)
                    .then(function(){
                        self.GetCities();
                        self.allErrors=[]
                        self.$swal({
                            text:'تم الاضافه بنجاح   !!!',
                            icon: "success",
                        });
                    }).catch(function (error) {
                    self.allErrors = error.response.data.errors
                    }
                )
            },
            DeleteCity($id){
                this.$swal({
                    text: "هل انت متاكد من الحذف",
                    showCancelButton: true,
                    confirmButtonText: 'نعم !',
                    CancelButtonText:  'الغاء'
                }).then((result) => {
                    if (result.value) {
                        axios.delete('/city/'+$id).then(res => {
                            this.GetCities()
                        })
                        this.$swal(
                            'تم الحذف بنجاح ',
                        )
                    }
                });

            },
            UpdateCity($id) {
                let self = this;
                let formData = new FormData();
                formData.append('name',this.name);
                formData.append('regionId', this.regionId);
                formData.append('_method',"PUT")
                axios.post('/city/'+$id, formData)
                    .then(function(res){
                        self.GetCities();
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
