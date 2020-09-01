<template>
    <div class="container">
        <div>
            <!-- <router-link to="/staff"  type="button" class="btn btn-rounded btn-info"  style="color:#fff;">Add Staff</router-link> -->
            <router-link to="/staff"  type="button" class="btn btn-rounded btn-info"  style="color:#fff;">Tạo tài khoản</router-link>
        </div> <br><br>
        <div class="row justify-content-center">            
            <div class="card" style="width:100%;">
            <div class="card-header">
              <h3 class="card-title">Danh sách người dùng</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">            
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Họ tên</th>
                  <th>Email</th>
                  <th>Chức vụ</th>
                  <th>Ngày đăng ký</th>
                  <th>Tác vụ</th>
                </tr>
                </thead>                
                <tbody>                                                                                         
                <tr v-for="staff in staffs" :key="staff.id">
                  <td>{{staff.title}}  {{staff.name}}</td>
                  <td>{{staff.email}}</td>
                  <td v-if = "staff.role == 'recept'">Nhân viên quản lý bệnh án điện tử</td>
                  <td v-else>{{staff.role}}</td>                  
                  <td>{{staff.created_at | humanDate}}</td>                                    
                  <td>
                  <div class="row">
                  <div class="col-sm-6">
                    <button  @click="editModal(staff)" class="text-primary">
                      <i class="fa fa-edit"></i>
                    </button>
                    </div>
                    <div class="col-sm-6">
                     <button  @click="deleteStaff(staff.id)" class="text-danger">
                      <i class="fa fa-trash"></i>
                    </button>
                    </div>
                    </div>
                </td>                            
                </tr>                  
                 <!--Biodata Modal -->
                      <div class="modal fade" id="editstaff" tabindex="-1" role="dialog" aria-labelledby="biodataTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLongTitle">Điều chỉnh</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                             <form @submit.prevent="updateStaff" id="add-biodata">
                           <div class="form-group">
                        <!-- <label>Edit Title</label>                 -->
                        <label>Chỉnh sửa chức danh</label>                
                        <select v-model="form.title" class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" name="title">
                        <!-- <option value="nul" style="font-weight:700;">Select Title</option> -->
                        <option value="nul" style="font-weight:700;">Chọn chức danh</option>
                        <option value="Dr">Dr</option>
                        <option value="Cô">Cô</option>
                        <option value="Bà">Bà</option>
                        <option value="Ông">Ông</option>
                        </select>  
                        <has-error :form="form" field="title"></has-error>
                        </div>
                        <div class="form-group">
                          <label>Chỉnh sửa họ tên</label>                         
                        <input v-model="form.name" type="text" name="name" placeholder="Nhập tên đầy đủ"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="form-group">  
                          <!-- <label>Edit Email</label>                                                -->
                          <label>Chỉnh sửa Email</label>                                               
                        <input v-model="form.email" type="email" name="email" placeholder="Nhập Email"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                        <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="form-group">
                          <label>Edit Role</label>                         
                      <select  v-model="form.role" class="form-control" :class="{ 'is-invalid': form.errors.has('role') }" name="role">
                            <!-- <option value="nul" style="font-weight:700;">Edit Role</option> -->
                            <option value="nul" style="font-weight:700;">Điều chỉnh chức vụ</option>
                            <option value="recept">Nhân viên quản lý bệnh án điện tử</option>
                            <option value="nurse">Y tá/Điều dưỡng</option>
                            <option value="doc">Bác sĩ</option>
                            <option value="lab">Nhân viên xét nghiệm</option>
                            <option value="pharm">Dược sĩ</option>
                            <option value="admin">Quản trị viên</option>
                        </select>
                        <has-error :form="form" field="role"></has-error>
                        </div>                                                  
                            <center>
                            <!-- <button type="submit" class="updatestaff btn-block btn btn-info" style="color:#fff;">Update Staff</button> -->
                            <button type="submit" class="updatestaff btn-block btn btn-info" style="color:#fff;">Cập nhật nhân viên</button>
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
                <tr>
                  <th>Họ tên</th>
                  <th>Email</th>
                  <th>Chức vụ</th>
                  <th>Ngày đăng ký</th>
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
              staffs: {},
              form: new Form({
                    id: '',
                    title: '',
                    name: '',
                    email: '',
                    role: '',
                    password: ''
                })              
            }
        },
        methods:{
          loadStaffs(){                                            
                // this.loading = true;
                axios.get("api/staff")
                .then((response)  =>  {
                    setTimeout(function(){
                    NProgress.done()
                    }, 1000);
                    this.staffs = response.data;
                })              
            },          
            // loadStaffs(){                            
            //      axios.get('api/staff').then(({data}) => (this.staffs = data));                 
            // },
            editModal(staff){
              $('#editstaff').modal('show');
              this.form.fill(staff);              
            },
             deleteStaff(id){
                swal.fire({
                        title: 'Are you sure?',
                        text: "You won't be able to revert this!",
                        type: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
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
                        this.form.delete('api/staff/'+id).then(
                            ()=>{
                                swal.fire(
                                'Deleted!',
                                'Deleted Successfully.',
                                'success'
                                )
                                Fire.$emit('afterAction');
                            }).catch(
                                ()=>{
                                swal.fire({
                                type: 'error',
                                title: 'Oops...',
                                text: 'Something went wrong!',
                                })  
                                }); 
                            }                       
                        })
            },
            updateStaff(){
                $('.updatestaff').html('<i class="fa fa-spin fa-spinner"></i>');
                this.form.put('api/staff/'+this.form.id).then(
                    ()=>{
                        Fire.$emit('afterAction');
                        $('#editstaff').modal('hide');
                        toast.fire({
                        type: 'success',
                        title: 'Tài khoản đã được điều chỉnh!'
                        })   
                        $('.updatestaff').html('Update Staff'); 
                    }).catch(
                        ()=>{
                        toast.fire({
                        type: 'error',
                        title: 'Thông tin nhập vào chưa đúng!'
                        })   
                        $('.updatestaff').html('Update Staff');
                        });                                      
            }
        },        
        mounted() {
            console.log('Component mounted.')                        
            this.loadStaffs(); 
            Fire.$on('afterAction', () => {this.loadStaffs()})                                   
        }
        
    }
</script>

