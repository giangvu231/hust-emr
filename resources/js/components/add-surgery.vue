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
                                <label>Chọn bệnh nhân</label>
                                <input
                                    style="width: 100%; padding: 12px 20px;
                                                        margin: 8px 0;
                                                        display: inline-block;
                                                        border: 1px solid #ccc;
                                                        border-radius: 4px;
                                                        box-sizing: border-box;"
                                    placeholder="Nhập tên bệnh nhân"
                                    type="text"
                                    v-model="searchPatient"
                                    @keyup="searchForPatient()"
                                />
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
                                        v-for="searchPatient in searchPatients"
                                        :key="searchPatient.id"
                                        :value="searchPatient.id"
                                        >{{ searchPatient.full_name }}</option
                                    >
                                </select>
                                <has-error
                                    :form="form"
                                    field="patient_id"
                                ></has-error>
                            </div>
                            <div>
                                <label for="">Chẩn đoán trước phẫu thuật</label>
                            </div>
                            <div class="form-group">
                                <input
                                    style="width: 100%;"
                                    placeholder="Tìm bệnh theo bảng mã ICD-10"
                                    type="text"
                                    v-model="searchBeforeProcedureText"
                                    @keyup="searchForBeforeProcedure()"
                                />
                                <select
                                    v-model="form.id_before_procedure"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'id_before_procedure'
                                        )
                                    }"
                                    name="id_before_procedure"
                                >
                                    <option disabled selected value=""
                                        >Bảng mã ICD 10</option
                                    >
                                    <option
                                        v-for="searchBeforeProcedureArr in searchBeforeProcedureArrs"
                                        :key="searchBeforeProcedureArr.id"
                                        :value="searchBeforeProcedureArr.id"
                                    >
                                        {{ searchBeforeProcedureArr.code }}
                                        -
                                        {{ searchBeforeProcedureArr.name }}
                                    </option>
                                </select>
                                <has-error
                                    :form="form"
                                    field="id_before_procedure"
                                ></has-error>
                            </div>
                            <div>
                                <label for="">Chẩn đoán sau phẫu thuật</label>
                            </div>
                            <div class="form-group">
                                <input
                                    style="width: 100%;"
                                    placeholder="Tìm bệnh theo bảng mã ICD-10"
                                    type="text"
                                    v-model="searchAfterProcedureText"
                                    @keyup="searchForAfterProcedure()"
                                />
                                <select
                                    v-model="form.id_after_procedure"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'id_after_procedure'
                                        )
                                    }"
                                    name="id_after_procedure"
                                >
                                    <option disabled selected value=""
                                        >Bảng mã ICD 10</option
                                    >
                                    <option
                                        v-for="searchAfterProcedureArr in searchAfterProcedureArrs"
                                        :key="searchAfterProcedureArr.id"
                                        :value="searchAfterProcedureArr.id"
                                    >
                                        {{ searchAfterProcedureArr.code }}
                                        -
                                        {{ searchAfterProcedureArr.name }}
                                    </option>
                                </select>
                                <has-error
                                    :form="form"
                                    field="id_after_procedure"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <textarea
                                    v-model="form.operations"
                                    placeholder="Thông tin phẫu thuật"
                                    name="operations"
                                    id=""
                                    cols="10"
                                    rows="5"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'operations'
                                        )
                                    }"
                                ></textarea>
                                <has-error
                                    :form="form"
                                    field="operations"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <!-- <label>Date of Operation</label>                         -->
                                <label>Ngày phẫu thuật</label>
                                <input
                                    v-model="form.date_of_operation"
                                    type="date"
                                    name="date_of_operation"
                                    placeholder="Nhập ngày vào viện"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'date_of_operation'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="date_of_operation"
                                ></has-error>
                            </div>
                            <div>
                                <label for="">Ê-kíp phẫu thuật</label>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.surgeon"
                                    type="text"
                                    name="surgeon"
                                    placeholder="Bác sĩ Phẫu thuật"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('surgeon')
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="surgeon"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.anesthetist"
                                    type="text"
                                    name="anesthetist"
                                    placeholder="Bác sĩ Gây mê"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'anesthetist'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="anesthetist"
                                ></has-error>
                            </div>
                            <center>
                                <!-- <button type="submit" class="surgery btn-block btn btn-info" style="color:#fff;">Add Patient Surgery History</button> -->
                                <button
                                    type="submit"
                                    class="surgery btn-block btn btn-info"
                                    style="color:#fff;"
                                >
                                    Thêm lịch sử phẫu thuật
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
            searchBeforeProcedureText: "",
            searchBeforeProcedureArrs: [],
            searchAfterProcedureText: "",
            searchAfterProcedureArrs: [],
            patients: {},
            searchPatient: "",
            searchPatients: [],
            form: new Form({
                patient_id: "",
                operations: "",
                date_of_operation: "",
                surgeon: "",
                anesthetist: "",

                id_before_procedure: "",
                id_after_procedure: ""
            })
        };
    },
    methods: {
        addSurgery() {
            $(".surgery").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .post("api/surgery")
                .then(() => {
                    toast.fire({
                        type: "success",
                        title:
                            "Lịch sử phẫu thuật của bệnh nhân được thêm thành công!"
                    });
                    $(".surgery").html("Add Patient Surgery History ");
                    $("#add-surgery").trigger("reset");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu thêm vào không đúng!"
                    });
                    $(".surgery").html("Add Patient surgery History ");
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
        },
        searchForBeforeProcedure() {
            axios
                .post("/search", {
                    name: this.searchBeforeProcedureText
                })
                .then(response => {
                    this.searchBeforeProcedureArrs = response.data;
                })
                .catch(() => {});
        },
        searchForAfterProcedure() {
            axios
                .post("/search", {
                    name: this.searchAfterProcedureText
                })
                .then(response => {
                    this.searchAfterProcedureArrs = response.data;
                })
                .catch(() => {});
        },
        searchForPatient() {
            axios
                .post("/searchpatient", {
                    name: this.searchPatient
                })
                .then(response => {
                    this.searchPatients = response.data;
                    console.log(response);
                })
                .catch(() => {});
        }
    },
    mounted() {
        console.log("Component mounted.");
        this.loadPatients();
    }
};
</script>
