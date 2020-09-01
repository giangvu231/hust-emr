<template>
    <div class="container">
        <div>
            <router-link to="/add-vital"  type="button" class="btn btn-rounded btn-info"  style="color:#fff;">Add Vital</router-link>
        </div> <br><br>
        <div class="row justify-content-center">            
            <div class="card" style="width:100%;">
            <div class="card-header">
              <!-- <h3 class="card-title">All Patients Vitals</h3> -->
              <h3 class="card-title">Danh sách bệnh án có sinh hiệu</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <!-- <tr>
                  <th>Unique ID</th>
                  <th>Name</th>
                  <th>Temperature</th>
                  <th>Blood Pressure</th>
                  <th>Height </th>
                  <th>Weight</th>
                  <th>Other Information</th>
                  <th>Action</th>
                </tr> -->

                <tr>
                  <th>Mã HSBA</th>
                  <th>Họ tên</th>
                  <th>Thân nhiệt (°C)</th>
                  <th>Huyết áp (mmHg)</th>
                  <th>Chiều cao (cm)</th>
                  <th>Cân nặng (kg)</th>
                  <th>Các thông tin khác</th>
                  <th>Tác vụ</th>
                </tr>

                </thead>
                <tbody>              
                <tr v-for="vital in vitals" :key="vital.id">
                  <td>{{vital.patient.unique_id}}</td>
                  <td>{{vital.patient.title}} {{vital.patient.full_name}}</td>
                  <td>{{vital.temperature}}</td>
                  <td>{{vital.blood_pressure}}</td>
                  <td>{{vital.height}}</td>
                  <td>{{vital.weight}}</td>                  
                  <td>
                     <!-- <button type="button" class="btn btn-primary" data-toggle="modal" :data-target="'#' + vital.patient.unique_id">
                        All Info.
                        </button> -->

                    <button type="button" class="btn btn-primary" data-toggle="modal" :data-target="'#' + vital.patient.unique_id">
                        Hiển thị
                        </button>

                      <div class="modal fade" :id="vital.patient.unique_id" tabindex="-1" role="dialog" aria-labelledby="biodataTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                          <div class="modal-header">
                              <!-- <h5 class="modal-title" id="exampleModalLongTitle">Other Information</h5> -->
                              <h5 class="modal-title" id="exampleModalLongTitle">Các thông tin khác</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                             <!-- <p><b>Blood Group: </b>{{vital.blood_group}}</p>
                             <p><b>Blood Type(Rhesus Type): </b> {{vital.blood_type}}</p>
                             <h4>Immunization Status</h4>
                             <i>Immunization status consist of Small Pox, Yellow Fever, TAB, Tetanus, Poliomyelitis, Dysthera <br> The ones listed are positive</i>                                                  
                             <p v-for="vite in vital.immunization" :key="vite"> <b>{{vite}}</b> </p> -->

                             <p><b>Nhóm máu: </b>{{vital.blood_group}}</p>
                             <p><b>Loại máu (Phân loại theo hệ thống Rhesus): </b> {{vital.blood_type}}</p>
                             <h4>Tình trạng tiêm chủng</h4>
                             <i>Đã tiêm phòng: đậu mùa, sốt vàng, TAB, uốn ván, bại liệt, bạch hầu <br> Danh sách đã tiêm phòng bên dưới</i>                                                  
                             <p v-for="vite in vital.immunization" :key="vite"> <b>{{vite}}</b> </p>

                             <!-- <div v-for="vite in vital.immunization" :key="vite">
                                 <p v-if = vite[0] == ""> Positive </p>
                             </div> -->
                          </div>
                          <div class="modal-footer">
                              <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                          </div>
                          </div>
                      </div>
                      </div> 
                  </td> 
                  <td>
                  <div class="row">
                  <div class="col-sm-6">
                    <button  @click="editModal(vital)" class="text-primary">
                      <i class="fa fa-edit"></i>
                    </button>
                    </div>
                    <div class="col-sm-6">
                     <button  @click="deleteVital(vital.id)" class="text-danger">
                      <i class="fa fa-trash"></i>
                    </button>
                    </div>
                    </div>
                </td>                            
                </tr>                
                 <!--Biodata Modal -->
                      <div class="modal fade" id="editvital" tabindex="-1" role="dialog" aria-labelledby="biodataTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                          <div class="modal-header">
                              <!-- <h5 class="modal-title" id="exampleModalLongTitle">Patient Vitals</h5> -->
                              <h5 class="modal-title" id="exampleModalLongTitle">Sinh hiệu bệnh nhân</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                             <form @submit.prevent="updateVital" id="add-biodata">                                               
                        <div class="form-group"> 
                        <!-- <label>Temperature</label>                        -->
                        <label>Thân nhiệt (°C)(</label>                       
                        <input v-model="form.temperature" type="text" name="temperature" placeholder="Nhập nhiệt độ (°C)"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('temperature') }">
                        <has-error :form="form" field="temperature"></has-error>
                        </div>                       
                        <div class="form-group">  
                        <label>Huyết áp (mmHg)</label>                                             
                        <input v-model="form.blood_pressure" type="text" name="blood_pressure" placeholder="Nhập Huyết áp (mmHg)"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('blood_pressure') }">
                        <has-error :form="form" field="blood_pressure"></has-error>
                        </div>
                        <div class="form-group">  
                        <label>Chiều cao (cm)</label>                                             
                        <input v-model="form.height" type="text" name="height" placeholder="Nhập Chiều cao (cm)"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('height') }">
                        <has-error :form="form" field="height"></has-error>
                        </div>
                        <div class="form-group">  
                        <label>Cân nặng (kg)</label>                                             
                        <input v-model="form.weight" type="text" name="weight" placeholder="Nhập Cân nặng (kg)"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('weight') }">
                        <has-error :form="form" field="weight"></has-error>
                        </div>
                        <div class="form-group">  
                        <label>Nhịp tim (nhịp/phút)</label>                                             
                        <input v-model="form.pulse" type="text" name="pulse" placeholder="Nhập Nhịp tim (nhịp/phút)"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('pulse') }">
                        <has-error :form="form" field="pulse"></has-error>
                        </div>
                        <div class="form-group">   
                        <label>Nhóm máu</label>                                            
                        <input v-model="form.blood_group" type="text" name="blood_group" placeholder="Nhập nhóm máu (O, A, B, AB)"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('blood_group') }">
                        <has-error :form="form" field="blood_group"></has-error>
                        </div>
                        <div class="form-group"> 
                        <label>Loại máu</label>                                              
                        <input v-model="form.blood_type" type="text" name="blood_type" placeholder="Nhập loại máu (O+, O-, A+, A-, B+, B-, AB+, AB- )"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('blood_type') }">
                        <has-error :form="form" field="blood_type"></has-error>
                        </div>
                        <div class="form-group">
                        <label>Tình trạng tiêm chủng</label> <br>               
                        <select v-model="form.immunization" class="form-control immunization" multiple :class="{ 'is-invalid': form.errors.has('immunization') }" name="immunization[]">
                        <option value="Đậu mùa">Đậu mùa</option>
                        <option value="Sốt vàng">Sốt vàng</option>
                        <option value="TAB">TAB</option>
                        <option value="Uốn ván">Uốn ván</option>
                        <option value="Bại liệt">Bại liệt</option>
                        <option value="Bạch hầu">Bạch hầu</option>
                        </select>  
                        <has-error :form="form" field="immunization"></has-error>
                        </div>   
                            <center>
                            <!-- <button type="submit" class="updatevital btn-block btn btn-info" style="color:#fff;">Update Patient Vitals</button> -->
                            <button type="submit" class="updatevital btn-block btn btn-info" style="color:#fff;">Cập nhật thông tin sinh hiệu</button>
                            </center>
                            </form>
                          </div>
                          <div class="modal-footer">
                              <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                          </div>
                          </div>
                      </div>
                      </div>
                              
                </tbody>
                <tfoot>
                <!-- <tr>
                  <th>Unique ID</th>
                  <th>Name</th>
                  <th>Temperature</th>
                  <th>Blood Pressure</th>
                  <th>Height </th>
                  <th>Weight</th>
                  <th>Other Information</th>
                  <th>Action</th>
                </tr> -->

                 <tr>
                  <th>Mã HSBA</th>
                  <th>Họ tên</th>
                  <th>Thân nhiệt (°C)</th>
                  <th>Huyết áp (mmHg)</th>
                  <th>Chiều cao (cm)</th>
                  <th>Cân nặng (kg)</th>
                  <th>Các thông tin khác</th>
                  <th>Tác vụ</th>
                </tr>

                </tfoot>
              </table>   
              
                                         
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
    </div>
</template>

<script>
    export default {
      data(){
            return {
              vitals: {},
              form: new Form({
                  id:'',
                   patient_id: '',
                    temperature: '',
                    blood_pressure: '',
                    height: '',
                    weight: '',
                    pulse: '',
                    blood_group: '',
                    blood_type: '',
                    immunization: []    
                })              
            }
        },
        methods:{
            loadVitals(){                                            
                // this.loading = true;
                axios.get("api/vital")
                .then((response)  =>  {
                    setTimeout(function(){
                    NProgress.done()
                    }, 1000);
                    this.vitals = response.data;
                })              
            },           
            // loadVitals(){
            //      axios.get('api/vital').then(({data}) => (this.vitals = data));
            // },           
            editModal(vital){
              $('#editvital').modal('show');
              this.form.fill(vital);              
            },
            deleteVital(id){
                swal.fire({
                        title: 'Bạn đã chắc chắn muốn xóa?',
                        text: "Bạn sẽ không được phép hoàn tác sau khi thực hiện!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Đồng ý, hãy xóa!'
                        }).then((result) => {
                            //delete qury below
                            if (result.value) {
                                swal.fire({
                                position: 'center',
                                type: 'info',
                                title: 'Đang xóa',
                                showConfirmButton: false,
                                timer: 1000
                                })
                        this.form.delete('api/vital/'+id).then(
                            ()=>{
                                swal.fire(
                                'Đã xóa!',
                                'Đã xóa thành công.',
                                'success'
                                )
                                Fire.$emit('afterAction');
                            }).catch(
                                ()=>{
                                swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Đã xảy ra sự cố!',
                                })  
                                }); 
                            }                       
                        })
            },
            updateVital(){
                $('.updatevital').html('<i class="fa fa-spin fa-spinner"></i>');
                this.form.put('api/vital/'+this.form.id).then(
                    ()=>{
                        Fire.$emit('afterAction');
                        $('#editvital').modal('hide');
                        toast.fire({
                        type: 'success',
                        title: 'Sinh hiệu được cập nhật thành công!'
                        })   
                        $('.updatevital').html('Add Patient'); 
                    }).catch(
                        ()=>{
                        toast.fire({
                        type: 'error',
                        title: 'Dữ liệu nhập vào chưa đúng'
                        })   
                        $('.updatevital').html('Add Patient');
                        });                                      
            }
        },        
        mounted() {
            console.log('Component mounted.')            
            this.loadVitals(); 
            Fire.$on('afterAction', () => {this.loadVitals()})                                   
        }
        
    }
</script>

