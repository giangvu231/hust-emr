<template>
    <div class="container">       
        <!-- <div>
            <router-link to="/add-biodata"  type="button" class="btn btn-rounded btn-info"  style="color:#fff;">Add New</router-link>
        </div> <br><br>  -->
        <div class="row justify-content-center">            
            <div class="card" style="width:100%;">
            <div class="card-header">
              <!-- <h3 class="card-title">Patient Medications</h3> -->
              <h3 class="card-title">Quản lý thuốc</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <!-- <tr>
                  <th>Unique ID</th>
                  <th>Name</th>
                  <th>Dianoses Details</th>                
                  <th>Date of  Medication</th>
                  <th>Medication Details</th>
                  <th v-if="user.role == 'pharm'">Action</th>
                </tr> -->

                <tr>
                  <th>Mã HSBA</th>
                  <th>Họ tên</th>
                  <th>Thông tin chỉ định</th>                
                  <th>Ngày dùng thuốc</th>
                  <th>Thông tin thuốc</th>
                  <th v-if="user.role == 'pharm'">Tác vụ</th>
                </tr>

                </thead>
                <tbody>              
                <tr v-for="medication in medications" :key="medication.id">
                  <td>{{medication.patient.unique_id}}</td>
                  <td>{{medication.patient.title}} {{medication.patient.full_name}}</td>
                  <td>{{medication.diagnose.diagnosis}}</td>
                  <td>{{medication.created_at | humanDate}}</td>
                  <!-- <td>{{medication.type}} <br> {{medication.unit}} unit <br> {{medication.comment}}</td>                                                                   -->
                  <td>{{medication.type}} <br> {{medication.unit}} đơn vị <br> {{medication.comment}}</td>                                                                  
                  <td v-if="user.role == 'pharm'">
                  <div class="row">
                  <div class="col-sm-6">
                    <button  @click="editModal(medication)" class="text-primary">
                      <i class="fa fa-edit"></i>
                    </button>
                    </div>
                    <div class="col-sm-6">
                    <a href="#" class="text-danger">
                      <i class="fa fa-trash"></i>
                    </a>
                    </div>
                    </div>
                </td>                            
                </tr>                   

                 <!--Biodata Modal -->
                      <div class="modal fade" id="editmedications" tabindex="-1" role="dialog" aria-labelledby="biodataTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                          <div class="modal-header">
                              <!-- <h5 class="modal-title" id="exampleModalLongTitle">Edit Lab Result</h5> -->
                              <h5 class="modal-title" id="exampleModalLongTitle">Sửa kết quả xét nghiệm</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                             <form @submit.prevent="updatemedications" id="edit-medications">                         
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
                                  <!-- <label>Edit Unit</label>   -->
                                  <label>Sửa đơn vị</label>  
                                <input v-model="form.unit" type="number" name="unit" placeholder="Nhập đơn vị"
                                    class="form-control" :class="{ 'is-invalid': form.errors.has('unit') }">
                                <has-error :form="form" field="unit"></has-error>
                                </div>                           
                                <div class="form-group"> 
                                  <!-- <label>Edit Comment</label>   -->
                                  <label>Sửa nhận xét</label>  
                                <textarea v-model="form.comment"  placeholder="Nhận xét" name="comment" id="" cols="10" rows="5"  class="form-control" :class="{ 'is-invalid': form.errors.has('comment') }"></textarea>                       
                                <has-error :form="form" field="comment"></has-error>                       
                                </div> 
                                 <!-- <input v-model="form.nurse" 
                                :value="1" 
                                type="checkbox" 
                                name="nurse" /> Edit Refer Patient for injection -->

                                <input v-model="form.nurse" 
                                :value="1" 
                                type="checkbox" 
                                name="nurse" /> Sửa chỉ định tiêm
                                
                            <center>
                            <!-- <button type="submit" class="updatemedications btn-block btn btn-info" style="color:#fff;">Update Lab Result</button> -->
                            <button type="submit" class="updatemedications btn-block btn btn-info" style="color:#fff;">Cập nhật kết quả xét nghiệm</button>
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
                  <th>Dianoses Details</th>                
                  <th>Date of  Medication</th>
                  <th>Medication Details</th>
                <th v-if="user.role == 'pharm'">Action</th>
                </tr> -->

                <tr>
                <th>Mã HSBA</th>
                  <th>Họ tên</th>
                  <th>Thông tin chỉ định</th>                
                  <th>Ngày cấp thuốc</th>
                  <th>Thông tin thuốc</th>
                <th v-if="user.role == 'pharm'">Tác vụ</th>
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
              medications: {},
              user: {},
              form: new Form({
                id:'',
                type: '',
                comment: '',
                unit: '',
                nurse: '',
                injection: ''
                })              
            }
        },
        methods:{                      
            LoadLabresult(){
              axios.get("api/uploadpham")
                .then((response)  =>  {
                    setTimeout(function(){
                    NProgress.done()
                    }, 1000);
                    this.medications = response.data;
                });
                //  axios.get('api/uploadpham').then(({data}) => (this.medications = data));
                 axios.get('api/user').then(response => {
                     console.log(response.data);
                     this.user = response.data
                 })                 
            },             
            editModal(medication){
              $('#editmedications').modal('show');
              this.form.fill(medication);              
            },        
            updatemedications(){
                $('.updatemedications').html('<i class="fa fa-spin fa-spinner"></i>');
                this.form.put('api/uploadpham/'+this.form.id).then(
                    ()=>{
                        Fire.$emit('afterAction');
                        $('#editmedications').modal('hide');
                        toast.fire({
                        type: 'success',
                        title: 'Cập nhật thuốc thành công!'
                        })   
                        $('.updatemedications').html('Update Lab Result'); 
                    }).catch(
                        ()=>{
                        toast.fire({
                        type: 'error',
                        title: 'Dữ liệu nhập vào chưa đúng!'
                        })   
                        $('.updatemedications').html('Update Lab Result');
                        });                                      
            },            
        },        
        mounted() {
            console.log('Component mounted.')            
            this.LoadLabresult(); 
            Fire.$on('afterAction', () => {this.LoadLabresult()})                                   
        }
        
    }
</script>

