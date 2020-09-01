<template>
    <div class="container">       
        <div>
            <router-link to="/add-surgery"  type="button" class="btn btn-rounded btn-info"  style="color:#fff;">Thêm lịch sử phẫu thuật</router-link>
        </div> <br><br>
        <div class="row justify-content-center">            
            <div class="card" style="width:100%;">
            <div class="card-header">
              <!-- <h3 class="card-title">Patients Surgery History</h3> -->
              <h3 class="card-title">Lịch sử phẫu thuật</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <!-- <tr>
                  <th>Unique ID</th>
                  <th>Name</th>
                  <th>Operation Details</th>
                  <th>Date of Operation</th>
                  <th>Surgeon</th>
                  <th>Action</th>
                </tr> -->

                <tr>
                  <th>Mã HSBA</th>
                  <th>Họ tên</th>
                  <th>Chi tiết phẫu thuật</th>
                  <th>Ngày phẫu thuật</th>
                  <th>Bác sĩ phẫu thuật</th>
                  <th>Tác vụ</th>
                </tr>

                </thead>
                <tbody>              
                <tr v-for="surgery in surgeries" :key="surgery.id">
                  <td>{{surgery.patient.unique_id}}</td>
                  <td>{{surgery.patient.title}} {{surgery.patient.full_name}}</td>
                  <td>{{surgery.operations}}</td>
                  <td>{{surgery.date_of_operation | humanDate}}</td>
                  <td>{{surgery.surgeon}}</td>                                  
                  <td>
                  <div class="row">
                  <div class="col-sm-6">
                    <button  @click="editModal(surgery)" class="text-primary">
                      <i class="fa fa-edit"></i>
                    </button>
                    </div>
                    <div class="col-sm-6">
                    <button  @click="deleteSurgery(surgery.id)" class="text-danger">
                      <i class="fa fa-trash"></i>
                    </button>
                    </div>
                    </div>
                </td>                            
                </tr>                
                 <!--Biodata Modal -->
                      <div class="modal fade" id="editsurgery" tabindex="-1" role="dialog" aria-labelledby="biodataTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                          <div class="modal-header">
                              <!-- <h5 class="modal-title" id="exampleModalLongTitle">Edit Patient Surgery History</h5> -->
                              <h5 class="modal-title" id="exampleModalLongTitle">Sửa lịch sử phẫu thuật của bệnh nhân</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                             <form @submit.prevent="updateSurgery" id="edit-surgery">                         
                        <div class="form-group"> 
                        <!-- <label>Edit Operation Details</label>  -->
                        <label>Sửa thông tin phẫu thuật</label> 
                        <textarea v-model="form.operations"  placeholder="Operation Details" name="operations" id="" cols="10" rows="5"  class="form-control" :class="{ 'is-invalid': form.errors.has('operations') }"></textarea>                       
                        <has-error :form="form" field="operations"></has-error>                       
                        </div>  
                        <div class="form-group"> 
                        <!-- <label>Edit Date of Operation</label>                         -->
                        <label>Sửa ngày phẫu thuật</label>                        
                        <input v-model="form.date_of_operation" type="date" name="date_of_operation" placeholder="Nhập ngày có mặt"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('date_of_operation') }">
                        <has-error :form="form" field="date_of_operation"></has-error>
                        </div>                         
                        <div class="form-group"> 
                        <!-- <label>Edit Surgeon</label>                         -->
                        <label>Sửa bác sĩ phẫu thuật</label>                        
                        <input v-model="form.surgeon" type="text" name="surgeon" placeholder="Bác sĩ phẫu thuật"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('surgeon') }">
                        <has-error :form="form" field="surgeon"></has-error>
                        </div>   
                            <center>
                            <!-- <button type="submit" class="updatesurgery btn-block btn btn-info" style="color:#fff;">Update Patient Surgery History</button> -->
                            <button type="submit" class="updatesurgery btn-block btn btn-info" style="color:#fff;">Cập nhật lịch sử phẫu thuật</button>
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
                  <th>Operation Details</th>
                  <th>Date of Operation</th>
                  <th>Surgeon</th>
                  <th>Action</th>
                </tr> -->

                <tr>
                 <th>Mã HSBA</th>
                  <th>Họ tên</th>
                  <th>Chi tiết phẫu thuật</th>
                  <th>Ngày phẫu thuật</th>
                  <th>Bác sĩ phẫu thuật</th>
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
              surgeries: {},
              form: new Form({
                id:'',
                patient_id: '',
                operations: '',
                date_of_operation: '',
                surgeon: '',  
                })              
            }
        },
        methods:{
          LoadSurgeries(){                                            
                // this.loading = true;
                axios.get("api/surgery")
                .then((response)  =>  {
                    setTimeout(function(){
                    NProgress.done()
                    }, 1000);
                    this.staff = response.data;
                })              
            },           
            // LoadSurgeries(){
            //      axios.get('api/surgery').then(({data}) => (this.surgeries = data));
            // },
            editModal(surgery){
              $('#editsurgery').modal('show');
              this.form.fill(surgery);              
            },
             deleteSurgery(id){
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
                                title: 'Processing Delete',
                                showConfirmButton: false,
                                timer: 1000
                                })
                        this.form.delete('api/surgery/'+id).then(
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
            updateSurgery(){
                $('.updatesurgery').html('<i class="fa fa-spin fa-spinner"></i>');
                this.form.put('api/surgery/'+this.form.id).then(
                    ()=>{
                        Fire.$emit('afterAction');
                        $('#editsurgery').modal('hide');
                        toast.fire({
                        type: 'success',
                        title: 'Lịch sử phẫu thuật của bệnh nhân được cập nhật thành công!'
                        })   
                        $('.updatesurgery').html('Add Patient'); 
                    }).catch(
                        ()=>{
                        toast.fire({
                        type: 'error',
                        title: 'Dữ liệu nhập vào chưa đúng!'
                        })   
                        $('.updatesurgery').html('Add Patient');
                        });                                      
            }
        },        
        mounted() {
            console.log('Component mounted.')            
            this.LoadSurgeries(); 
            Fire.$on('afterAction', () => {this.LoadSurgeries()})                                   
        }
        
    }
</script>

