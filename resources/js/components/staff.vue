<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- <div class="card-header">Add New Staff</div> -->
                    <div class="card-header">Thêm tài khoản</div>
                    <div class="card-body">
                        <form @submit.prevent=" addStaff" id="add-staff">
                        <div class="form-group">
                        <!-- <label>Select Title</label>                 -->
                        <label>Chức danh</label>                
                        <select v-model="form.title" class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" name="title">
                        <option value="nul" style="font-weight:700;">Chọn chức danh</option>
                        <option value="Dr">Dr</option>
                        <option value="Cô">Cô</option>
                        <option value="Bà">Bà</option>
                        <option value="Ông">Ông</option>
                        </select>  
                        <has-error :form="form" field="title"></has-error>
                        </div>
                        <div class="form-group">
                        <input v-model="form.name" type="text" name="name" placeholder="Nhập họ tên"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('name') }">
                        <has-error :form="form" field="name"></has-error>
                        </div>
                        <div class="form-group">                        
                        <input v-model="form.email" type="email" name="email" placeholder="Nhập Email"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                        <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="form-group">                        
                      <select  v-model="form.role" class="form-control" :class="{ 'is-invalid': form.errors.has('role') }" name="role">
                            <option value="nul" style="font-weight:700;">Chọn chức vụ</option>
                            <option value="recept">Nhân viên quản lý bệnh án điện tử</option>
                            <option value="nurse">Y tá/ Điều dưỡng</option>
                            <option value="doc">Bác sĩ</option>
                            <option value="lab">Nhân viên xét nghiệm</option>
                            <option value="pharm">Dược sĩ</option>
                            <option value="admin">Quản trị viên</option>
                        </select>
                        <has-error :form="form" field="role"></has-error>
                        </div>                          
                        <div class="form-group">                        
                        <input v-model="form.password" type="password" name="password" placeholder="Nhập mật khẩu"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('password') }">
                        <has-error :form="form" field="password"></has-error>
                        </div>                      
                        <center>
                        <!-- <button type="submit" class="addstaff btn-block btn btn-info" style="color:#fff;">Add Staff</button> -->
                        <button type="submit" class="addstaff btn-block btn btn-info" style="color:#fff;">Thêm tài khoản</button>
                        </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</template>

<script>
    export default {
        data(){
            return {
                form: new Form({                    
                    title: '',
                    name: '',
                    email: '',
                    role: '',
                    password: ''
                })
            }
        },
        methods:{
             addStaff(){
                $('.addstaff').html('<i class="fa fa-spin fa-spinner"></i>');
                this.form.post('api/staff').then(
                    ()=>{
                        toast.fire({
                        type: 'success',
                        title: 'Thêm thành công người dùng vào hệ thống!'
                        })   
                        $('.addstaff').html('Add Staff'); 
                        $('#add-staff').trigger('reset'); 
                    }).catch(
                        ()=>{
                        toast.fire({
                        type: 'error',
                        title: 'Dữ liệu nhập vào chưa đúng!'
                        })   
                        $('.addstaff').html('Add Staff');
                        });                                      
            }
        },
        mounted() {
            console.log('Component mounted.')
            setTimeout(function(){
                    NProgress.done()
                    }, 3000);
        }
    }
</script>
