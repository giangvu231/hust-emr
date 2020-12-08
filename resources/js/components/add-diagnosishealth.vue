<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Chan doan lam sang</div>
                    <div class="card-body">
                        <form
                            @submit.prevent="addDiagnosishealth()"
                            id="add-diagnosishealth"
                        >
                            <!-- Query BN -->
                            <div class="form-group">
                                <label>Chọn bệnh nhân</label>
                                <select
                                    v-model="form.patient_id"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'patient_id'
                                        )
                                    }"
                                    name="patient_id"
                                >
                                    <option
                                        v-for="patient in patients"
                                        :key="patient.id"
                                        :value="patient.id"
                                        >{{
                                            patient.full_name + patient.id
                                        }}</option
                                    >
                                </select>
                                <has-error
                                    :form="form"
                                    field="patient_id"
                                ></has-error>
                            </div>

                            <!-- Loai chan doan -->
                            <div class="form-group">
                                <input
                                    v-model="form.diagnosis_type"
                                    type="text"
                                    name="diagnosis_type"
                                    placeholder="Nhập Loai chan doan"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'diagnosis_type'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="diagnosis_type"
                                ></has-error>
                            </div>

                            <!-- Loai tieu de -->
                            <div class="form-group">
                                <input
                                    v-model="form.diagnosis_header"
                                    type="text"
                                    name="diagnosis_header"
                                    placeholder="Nhập Tieu de"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'diagnosis_header'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="diagnosis_header"
                                ></has-error>
                            </div>

                            <!-- Query ICD 10 -->
                            <!-- <div class="form-group">
                                <label>Chọn ICD-10</label>
                                <select
                                    v-model="form.patient_id"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'patient_id'
                                        )
                                    }"
                                    name="patient_id"
                                >
                                    <option
                                        v-for="patient in patients"
                                        :key="patient.id"
                                        :value="patient.id"
                                        >{{
                                            patient.full_name + patient.id
                                        }}</option
                                    >
                                </select>
                                <has-error
                                    :form="form"
                                    field="patient_id"
                                ></has-error>
                            </div> -->

                            <!-- Ngay bat dau -->
                            <div class="form-group">
                                <label>
                                    Ngay bat dau
                                </label>
                                <input
                                    v-model="form.start_date"
                                    type="date"
                                    name="start_date"
                                    placeholder="Điền ngày bat dau"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'start_date'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="start_date"
                                ></has-error>
                            </div>

                            <!-- Ngay ket thuc -->
                            <div class="form-group">
                                <label>
                                    Ngay ket thuc
                                </label>
                                <input
                                    v-model="form.end_date"
                                    type="date"
                                    name="end_date"
                                    placeholder="Điền ngày ket thuc"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'end_date'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="end_date"
                                ></has-error>
                            </div>

                            <!-- Tinh trang -->
                            <div class="form-group">
                                <input
                                    v-model="form.diagnosis_status"
                                    type="text"
                                    name="diagnosis_status"
                                    placeholder="Nhập tinh trang"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'diagnosis_status'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="diagnosis_status"
                                ></has-error>
                            </div>

                            <!-- ghi chu -->
                            <div class="form-group">
                                <input
                                    v-model="form.diagnosis_note"
                                    type="text"
                                    name="diagnosis_note"
                                    placeholder="Nhập ghi chu"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'diagnosis_note'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="diagnosis_note"
                                ></has-error>
                            </div>
                            <center>
                                <button
                                    type="submit"
                                    class="diagnosishealth btn-block btn btn-info"
                                    style="color:#fff;"
                                >
                                    Thêm chan doan lam sang
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
    data() {
        return {
            patients: {},
            form: new Form({
                patient_id: "",
                diagnosis_type: "",
                diagnosis_header: "",
                icd10_id: "under development",
                icd10_name: "under development",
                start_date: "",
                end_date: "",
                diagnosis_status: "",
                diagnosis_note: ""
            })
        };
    },
    methods: {
        addDiagnosishealth(id) {
            $(".diagnosishealth").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .post("api/diagnosishealth")
                .then(() => {
                    toast.fire({
                        type: "success",
                        title: "Thêm thành công!"
                    });
                    $(".diagnosishealth").html("Add Patient Diagnosishealth");
                    $("#add-diagnosishealth").trigger("reset");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng!"
                    });
                    $(".diagnosishealth").html("Add Patient Diagnosishealth");
                });
        },
        loadPatients() {
            // this.loading = true;
            axios.get("api/patient").then(response => {
                setTimeout(function() {
                    NProgress.done();
                }, 1000);
                this.patients = response.data;
            });
        }
    },
    mounted() {
        console.log("Component mounted.");
        this.loadPatients();
    }
};
</script>
