<template>
    <div class="container">       
        <!-- <div>
            <router-link to="/add-biodata"  type="button" class="btn btn-rounded btn-info"  style="color:#fff;">Add New</router-link>
        </div> <br><br>  -->
        <div class="row justify-content-center">            
            <div class="card" style="width:100%;">
            <div class="card-header">
              <!-- <h3 class="card-title">Diagonised Patient</h3> -->
              <h3 class="card-title">Các chẩn đoán của bệnh nhân</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <!-- <tr>
                  <th>Unique ID</th>
                  <th>Name</th>
                  <th>Dianoses Details</th>
                  <th>Doctor Comment</th>                  
                  <th>Symtoms</th>  
                  <th>Action</th>
                </tr> -->

                <tr>
                  <th>Mã HSBA</th>
                  <th>Họ tên</th>
                  <th>Thông tin chẩn đoán</th>
                  <th>Nhận xét của bác sĩ</th>                  
                  <th>Các triệu chứng</th>  
                  <th>Tác vụ</th>
                </tr>

                </thead>
                <tbody>              
                <tr v-for="diagnose in diagnoses" :key="diagnose.id">
                  <td>{{diagnose.patient.unique_id}}</td>
                  <td>{{diagnose.patient.title}} {{diagnose.patient.full_name}}</td>
                  <td>{{diagnose.diagnosis}}</td>
                  <td>{{diagnose.comment}}</td>
                  <td>{{diagnose.hospital.symptoms}}</td>                                                                  
                  <td>
                  <!-- <button type="button" class="btn btn-primary" data-toggle="modal" :data-target="'#' + diagnose.modal_id" id="lap-result">
                        Give Medicine
                        </button> -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" :data-target="'#' + diagnose.modal_id" id="lap-result">
                        Chỉ định thuốc
                        </button>
                      <div class="modal fade" :id="diagnose.modal_id" tabindex="-1" role="dialog" aria-labelledby="biodataTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                          <div class="modal-header">
                              <!-- <h5 class="modal-title" id="exampleModalLongTitle">Give Prescribed Medicine</h5> -->
                              <h5 class="modal-title" id="exampleModalLongTitle">Kê đơn thuốc</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <form @submit.prevent="addDiagnosis" id="lab-test">                               
                                <!-- <input v-model="form.patient_id" 
                                :value="diagnose.patient.id" 
                                type="radio" 
                                name="patient_id" /> Confirm Action First -->

                                <input v-model="form.patient_id" 
                                :value="diagnose.patient.id" 
                                type="radio" 
                                name="patient_id" /> Xác nhận tác vụ
          <br>                                
                                                             
                                 <div class="form-group">
                                <!-- <label>Select Type of Medicine</label>                 -->
                                <label>Chọn loại thuốc</label>                
                                <select v-model="form.type" class="form-control" :class="{ 'is-invalid': form.errors.has('type') }" name="type">
                                <!-- <option value="Tablet">Tablet</option>
                                <option value="Capsule">Capsule</option>
                                <option value="Multivitamins">Multivitamins</option>
                                <option value="Syrup">Syrup</option> -->

                                <option value="Viên">Viên</option>
                                <option value="Viên con nhộng">Viên con nhộng</option>
                                <option value="Vitamin tổng hợp">Vitamin tổng hợp</option>
                                <option value="Xi-rô">Xi-rô</option>

                                </select>  
                                <has-error :form="form" field="type"></has-error>
                                </div>   
                                <div class="form-group"> 
                                <input v-model="form.unit" type="number" name="unit" placeholder="Nhập đơn vị"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('unit') }">
                                <has-error :form="form" field="unit"></has-error>
                                </div>                           
                                <div class="form-group"> 
                                <textarea v-model="form.comment"  placeholder="Comment" name="comment" id="" cols="10" rows="5"  class="form-control" :class="{ 'is-invalid': form.errors.has('comment') }"></textarea>                       
                                <has-error :form="form" field="comment"></has-error>                       
                                </div> 
                                 <!-- <input v-model="form.nurse" 
                                :value="1" 
                                type="checkbox" 
                                name="nurse" /> Refer Patient for injection -->

                                <input v-model="form.nurse" 
                                :value="1" 
                                type="checkbox" 
                                name="nurse" /> Yêu cầu tiêm chủng

                                
                                <!-- <input v-model="form.diagnose_id" 
                                :value="diagnose.id" 
                                type="radio" 
                                name="diagnose_id" /> Confirm Action Again -->

                                <input v-model="form.diagnose_id" 
                                :value="diagnose.id" 
                                type="radio" 
                                name="diagnose_id" /> Xác nhận tác vụ


                                <center>
                                <!-- <button type="submit" class="labtestresult btn-block btn btn-info" style="color:#fff;">Give Prescription</button> -->
                                <button type="submit" class="labtestresult btn-block btn btn-info" style="color:#fff;">Kê đơn thuốc</button>
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
                </td>                            
                </tr>                              
                </tbody>
                <tfoot>
                <!-- <tr>
                  <th>Unique ID</th>
                  <th>Name</th>
                  <th>Dianoses Details</th>
                  <th>Doctor Comment</th>  
                  <th>Symtoms</th>                  
                  <th>Action</th>
                </tr> -->

                <tr>
                  <th>Mã HSBA</th>
                  <th>Họ tên</th>
                  <th>Thông tin chẩn đoán</th>
                  <th>Nhận xét của bác sĩ</th>  
                  <th>Các triệu chứng</th>                  
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
              diagnoses: {},
              form: new Form({
                patient_id: '', 
                diagnose_id: '',              
                type: '',
                comment: '',
                unit: '',
                nurse: ''
                })              
            }
        },
        methods:{
           LoadDiagnoses(){                                            
                // this.loading = true;
                axios.get("api/phamtest")
                .then((response)  =>  {
                    setTimeout(function(){
                    NProgress.done()
                    }, 1000);
                    this.diagnoses = response.data;
                })              
            },          
            // LoadDiagnoses(){
            //      axios.get('api/phamtest').then(({data}) => (this.diagnoses = data));
            // },            
            addDiagnosis(){
                $('.labtestresult').html('<i class="fa fa-spin fa-spinner"></i>');
                this.form.post('api/uploadpham').then(
                    ()=>{
                        toast.fire({
                        type: 'success',
                        title: 'Thuốc được cập nhật thành công!'
                        })   
                        $('.labtestresult').html('Give Prescription'); 
                        $('#lab-test').trigger('reset'); 
                    }).catch(
                        ()=>{
                        toast.fire({
                        type: 'error',
                        title: 'Thông tin nhập vào chưa đúng! <br> Hoặc <br> Dữ liệu đã tồn tại!'
                        })   
                        $('.labtestresult').html('Give Prescription');
                        });                                      
            },                
        },        
        mounted() {
            console.log('Component mounted.')            
            this.LoadDiagnoses(); 
            Fire.$on('afterAction', () => {this.LoadDiagnoses()})                                   
        }
        
    }
</script>

