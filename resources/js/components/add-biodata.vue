<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <!-- Add Patient Biodata -->
                        Thêm lý lịch bệnh nhân
                        </div>
                    <div class="card-body">
                        <form @submit.prevent="addPatient" id="add-biodata">
                        <div class="form-group">
                        <label>
                        <!-- Select Title     -->
                        Chọn chức danh
                        </label>                
                        <select v-model="form.title" class="form-control" :class="{ 'is-invalid': form.errors.has('title') }" name="title">
                        <option value="nul" style="font-weight:700;">
                            <!-- Select Title -->
                            Chọn chức danh
                        </option>
                        <option value="Dr">
                            <!-- Dr -->
                            Dr
                        </option>
                        <option value="Cô">
                            <!-- Miss -->
                            Cô
                        </option>
                        <option value="Bà">
                            <!-- Mrs -->
                            Bà
                        </option>
                        <option value="Ông">
                            <!-- Mr -->
                            Ông
                        </option>
                        </select>  
                        <has-error :form="form" field="title"></has-error>
                        </div>
                        <div class="form-group">
                        <input v-model="form.full_name" type="text" name="full_name" placeholder="Nhập họ tên bệnh nhân"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('full_name') }">
                        <has-error :form="form" field="full_name"></has-error>
                        </div>
                        <div class="form-group">                        
                        <input v-model="form.email" type="email" name="email" placeholder="Nhập Email"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                        <has-error :form="form" field="email"></has-error>
                        </div>
                        <div class="form-group">                        
                        <input v-model="form.phone_number" type="number" name="phone_number" placeholder="Nhập số điện thoại liên lạc"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('phone_number') }">
                        <has-error :form="form" field="phone_number"></has-error>
                        </div>
                        <div class="form-group">                        
                        <input v-model="form.occupation" type="text" name="occupation" placeholder="Nhập nghề nghiệp hiện tại"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('occupation') }">
                        <has-error :form="form" field="occupation"></has-error>
                        </div>
                        <div class="form-group">
                        <label>
                            <!-- Select Gender -->
                            Chọn giới tính
                        </label>                
                        <select v-model="form.sex" class="form-control" :class="{ 'is-invalid': form.errors.has('sex') }" name="sex">
                        <option value="nul" style="font-weight:700;">
                            <!-- Select Gender -->
                            Chọn giới tính
                        </option>
                        <option value="Nam">
                            <!-- Male -->
                            Nam
                        </option>
                        <option value="Nữ">
                            <!-- Female -->
                            Nữ
                        </option>     
                        </select>  
                        <has-error :form="form" field="sex"></has-error>
                        </div>
                        <div class="form-group">
                        <label>
                            <!-- Date of Birth -->
                            Ngày sinh
                        </label>                        
                        <input v-model="form.dob" type="date" name="dob" placeholder="Nhập ngày sinh"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('dob') }">
                        <has-error :form="form" field="dob"></has-error>
                        </div>
                        <div class="form-group">
                        <label>
                            <!-- Select Relegion -->
                            Chọn tôn giáo
                            </label>                
                        <select v-model="form.religion" class="form-control" :class="{ 'is-invalid': form.errors.has('religion') }" name="religion">
                        <option value="nul" style="font-weight:700;">
                            <!-- Select Religion -->
                            Chọn tôn giáo
                        </option>
                        <option value="Christainity">Christainity</option>
                        <option value="Islam">Islam</option>     
                        <option value="Thiên Chúa Giáo">Thiên Chúa Giáo</option>     
                        <option value="Không">Không</option>     
                        </select>  
                        <has-error :form="form" field="religion"></has-error>
                        </div>
                        <div class="form-group">                        
                        <input v-model="form.nationality" type="text" name="nationality" placeholder="Nhập Quốc tịch"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('nationality') }">
                        <has-error :form="form" field="nationality"></has-error>
                        </div>
                        <div class="form-group">
                        <label>
                            <!-- State of Origin -->
                            Quê quán
                            </label>                
                        <select v-model="form.state_of_origin" class="form-control" :class="{ 'is-invalid': form.errors.has('state_of_origin') }" name="state_of_origin">
                        <option value="nul" style="font-weight:700;">
                            <!-- State of Origin -->
                            Quê quán
                        </option>
                        <option value="Niger State">Niger State</option>
                        <option value="Zamfara State">Zamfara State</option>     
                        <option value="Gombe State">Gombe State</option>
                        <option value="Hà Nội">Hà Nội</option>
                        </select>  
                        <has-error :form="form" field="state_of_origin"></has-error>
                        </div>
                        <div class="form-group"> 
                        <textarea v-model="form.home_address"  placeholder="Nhập địa chỉ bệnh nhân" name="home_address" id="" cols="10" rows="5"  class="form-control" :class="{ 'is-invalid': form.errors.has('home_address') }"></textarea>                       
                         <has-error :form="form" field="home_address"></has-error>                       
                        </div>
                        <div class="form-group">                        
                        <input v-model="form.place_of_birth" type="text" name="place_of_birth" placeholder="Nhập nơi sinh của bệnh nhân"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('place_of_birth') }">
                        <has-error :form="form" field="place_of_birth"></has-error>
                        </div>
                        <div class="form-group">                        
                        <input v-model="form.marital_status" type="text" name="marital_status" placeholder="Nhập tình trạng hôn nhân hiện tại"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('marital_status') }">
                        <has-error :form="form" field="marital_status"></has-error>
                        </div>
                        <div class="form-group"> 
                        <textarea v-model="form.home_next_of_kin"  placeholder="Nhập địa chỉ người thân" name="home_next_of_kin" id="" cols="10" rows="5"  class="form-control" :class="{ 'is-invalid': form.errors.has('home_next_of_kin') }"></textarea>                       
                         <has-error :form="form" field="home_next_of_kin"></has-error>                       
                        </div>
                        <div class="form-group">                        
                        <input v-model="form.phone_next_of_kin" type="number" name="phone_next_of_kin" placeholder="Nhập số điện thoại liên lạc của người thân"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('phone_next_of_kin') }">
                        <has-error :form="form" field="phone_next_of_kin"></has-error>
                        </div>
                        <center>
                        <button type="submit" class="addpatient btn-block btn btn-info" style="color:#fff;">
                            <!-- Add Patient -->
                            Thêm bệnh nhân
                        </button>
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
                    unique_id: 'EMR' + Math.floor((Math.random() * 10000000000) + 1),
                    title: '',
                    full_name: '',
                    email: '',
                    phone_number: '',
                    occupation: '',
                    sex: '',
                    dob: '',
                    religion: '',
                    nationality: '',
                    state_of_origin: '',
                    home_address: '',
                    place_of_birth: '',
                    marital_status: '',
                    home_next_of_kin: '',
                    phone_next_of_kin: ''

                })
            }
        },
        methods:{
            addPatient(){
                $('.addpatient').html('<i class="fa fa-spin fa-spinner"></i>');
                this.form.post('api/patient').then(
                    ()=>{
                        toast.fire({
                        type: 'success',
                        title: 'Lý lịch của bệnh nhân được thêm thành công!'
                        })   
                        $('.addpatient').html('Add Patient'); 
                        $('#add-biodata').trigger('reset'); 
                    }).catch(
                        ()=>{
                        toast.fire({
                        type: 'error',
                        title: 'Thông tin thêm vào chưa đúng!'
                        })   
                        $('.addpatient').html('Add Patient');
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
