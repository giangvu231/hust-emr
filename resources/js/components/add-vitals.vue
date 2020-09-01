<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Quản lý sinh hiệu</div>
                    <div class="card-body">
                        <form @submit.prevent="addVital" id="add-vital">
                        <div class="form-group">
                        <!-- <label>Select Patient</label>                 -->
                        <label>Chọn bệnh nhân</label>                
                        <select v-model="form.patient_id" class="form-control" :class="{ 'is-invalid': form.errors.has('patient_id') }" name="patient_id">
                        <option v-for="patient in patients" :key="patient.id" :value="patient.id">{{patient.full_name}}</option>
                        </select>  
                        <has-error :form="form" field="patient_id"></has-error>
                        </div>                       
                        <div class="form-group">                        
                        <input v-model="form.temperature" type="text" name="temperature" placeholder="Nhập thân nhiệt (°C)"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('temperature') }">
                        <has-error :form="form" field="temperature"></has-error>
                        </div>                       
                        <div class="form-group">                        
                        <input v-model="form.blood_pressure" type="text" name="blood_pressure" placeholder="Nhập huyết áp (mmHg)"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('blood_pressure') }">
                        <has-error :form="form" field="blood_pressure"></has-error>
                        </div>
                        <div class="form-group">                        
                        <input v-model="form.height" type="text" name="height" placeholder="Nhập chiều cao (cm)"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('height') }">
                        <has-error :form="form" field="height"></has-error>
                        </div>
                        <div class="form-group">                        
                        <input v-model="form.weight" type="text" name="weight" placeholder="Nhập cân nặng (kg)"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('weight') }">
                        <has-error :form="form" field="weight"></has-error>
                        </div>
                        <div class="form-group">                        
                        <input v-model="form.pulse" type="text" name="pulse" placeholder="Nhập nhịp tim (nhịp/phút)"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('pulse') }">
                        <has-error :form="form" field="pulse"></has-error>
                        </div>
                        <div class="form-group">                        
                        <input v-model="form.blood_group" type="text" name="blood_group" placeholder="Nhập nhóm máu (O, A, B, AB)"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('blood_group') }">
                        <has-error :form="form" field="blood_group"></has-error>
                        </div>
                        <div class="form-group">                        
                        <input v-model="form.blood_type" type="text" name="blood_type" placeholder="Nhập loại máu (O+, O-, A+, A-, B+, B-, AB+, AB- )"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('blood_type') }">
                        <has-error :form="form" field="blood_type"></has-error>
                        </div>
                        <div class="form-group">
                        <!-- <label>Immunization Status</label> <br>                -->
                        <label>Tình trạng tiêm chủng</label> <br>               
                        <select v-model="form.immunization" class="form-control immunization" multiple :class="{ 'is-invalid': form.errors.has('immunization') }" name="immunization[]">
                        <option value="Phòng đậu mùa">Phòng đậu mùa</option>
                        <option value="Phòng sốt vàng">Phòng sốt vàng</option>
                        <option value="TAB">TAB</option>
                        <option value="Phòng uốn ván">Phòng uốn ván</option>
                        <option value="Phòng bại liệt">Phòng bại liệt</option>
                        <option value="Phòng bạch hầu">Phòng bạch hầu</option>
                        </select>  
                        <has-error :form="form" field="immunization"></has-error>
                        </div>                     
                        <center>
                        <button type="submit" class="vital btn-block btn btn-info" style="color:#fff;">Thêm sinh hiệu</button>
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
                patients: {},
                form: new Form({
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
            addVital(){
                $('.vital').html('<i class="fa fa-spin fa-spinner"></i>');
                this.form.post('api/vital').then(
                    ()=>{
                        toast.fire({
                        type: 'success',
                        title: 'Sinh hiệu của bệnh nhân được thêm thành công!'
                        })   
                        $('.vital').html('Add Patient Vital'); 
                        $('#add-vital').trigger('reset'); 
                    }).catch(
                        ()=>{
                        toast.fire({
                        type: 'error',
                        title: 'Dữ liệu nhập vào chưa đúng!'
                        })   
                        $('.vital').html('Add Patient Vital');
                        });                                      
            },
            loadPatients(){                                            
                // this.loading = true;
                axios.get("api/patient")
                .then((response)  =>  {
                    setTimeout(function(){
                    NProgress.done()
                    }, 1000);
                    this.patients = response.data;
                })              
            },
        },        
        mounted() {           
            console.log('Component mounted.')
            this.loadPatients(); 
        }
    }
</script>
