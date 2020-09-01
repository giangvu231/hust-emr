<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- <div class="card-header">Add Patient Surgery History</div> -->
                    <div class="card-header">Thêm lịch sử phẫu thuật</div>
                    <div class="card-body">
                        <form @submit.prevent="addSurgery" id="add-surgery">
                        <div class="form-group">
                        <!-- <label>Select Patient</label>                 -->
                        <label>Chọn bệnh nhân</label>                
                        <select v-model="form.patient_id" class="form-control" :class="{ 'is-invalid': form.errors.has('patient_id') }" name="patient_id">
                        <option v-for="patient in patients" :key="patient.id" :value="patient.id">{{patient.full_name}}</option>
                        </select>  
                        <has-error :form="form" field="patient_id"></has-error>
                        </div>                                                     
                        <div class="form-group"> 
                        <textarea v-model="form.operations"  placeholder="Thông tin phẫu thuật" name="operations" id="" cols="10" rows="5"  class="form-control" :class="{ 'is-invalid': form.errors.has('operations') }"></textarea>                       
                        <has-error :form="form" field="operations"></has-error>                       
                        </div>  
                        <div class="form-group"> 
                        <!-- <label>Date of Operation</label>                         -->
                        <label>Ngày phẫu thuật</label>                        
                        <input v-model="form.date_of_operation" type="date" name="date_of_operation" placeholder="Nhập ngày vào viện"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('date_of_operation') }">
                        <has-error :form="form" field="date_of_operation"></has-error>
                        </div>                         
                        <div class="form-group">                        
                        <input v-model="form.surgeon" type="text" name="surgeon" placeholder="Bác sĩ phẫu thuật"
                            class="form-control" :class="{ 'is-invalid': form.errors.has('surgeon') }">
                        <has-error :form="form" field="surgeon"></has-error>
                        </div>                                                                                
                        <center>
                        <!-- <button type="submit" class="surgery btn-block btn btn-info" style="color:#fff;">Add Patient Surgery History</button> -->
                        <button type="submit" class="surgery btn-block btn btn-info" style="color:#fff;">Thêm lịch sử phẫu thuật</button>
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
                    operations: '',
                    date_of_operation: '',
                    surgeon: '',                                   
                })
            }            
        },
        methods:{
            addSurgery(){
                $('.surgery').html('<i class="fa fa-spin fa-spinner"></i>');
                this.form.post('api/surgery').then(
                    ()=>{
                        toast.fire({
                        type: 'success',
                        title: 'Lịch sử phẫu thuật của bệnh nhân được thêm thành công!'
                        })   
                        $('.surgery').html('Add Patient Surgery History '); 
                        $('#add-surgery').trigger('reset'); 
                    }).catch(
                        ()=>{
                        toast.fire({
                        type: 'error',
                        title: 'Dữ liệu thêm vào không đúng!'
                        })   
                        $('.surgery').html('Add Patient surgery History ');
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
