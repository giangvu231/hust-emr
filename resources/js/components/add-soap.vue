<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nhap SOAP</div>
                    <div class="card-body">
                        <form @submit.prevent="addSoap()" id="add-soap">
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
                                        >{{ patient.full_name }}</option
                                    >
                                </select>
                                <has-error
                                    :form="form"
                                    field="patient_id"
                                ></has-error>
                            </div>
                            <!-- --- -->
                            <div class="form-group">
                                <textarea
                                    v-model="form.subjective"
                                    type="text"
                                    name="subjective"
                                    placeholder="Dấu chứng chủ quan (Subjective)"
                                    rows="5"
                                    cols="10"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'subjective'
                                        )
                                    }"
                                >
                                </textarea>
                                <has-error
                                    :form="form"
                                    field="subjective"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <textarea
                                    v-model="form.objective"
                                    type="text"
                                    name="objective"
                                    placeholder="Dấu chứng khách quan (Objective)"
                                    rows="5"
                                    cols="10"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'objective'
                                        )
                                    }"
                                >
                                </textarea>
                                <has-error
                                    :form="form"
                                    field="objective"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <textarea
                                    v-model="form.assessment"
                                    type="text"
                                    name="assessment"
                                    placeholder="Hướng chẩn đoán (Assessment)"
                                    cols="10"
                                    rows="5"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'assessment'
                                        )
                                    }"
                                ></textarea>
                                <has-error
                                    :form="form"
                                    field="assessment"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <textarea
                                    v-model="form.plan"
                                    type="text"
                                    name="plan"
                                    placeholder="Hướng điều trị (Plan)"
                                    rows="5"
                                    cols="10"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('plan')
                                    }"
                                ></textarea>
                                <has-error
                                    :form="form"
                                    field="plan"
                                ></has-error>
                            </div>

                            <center>
                                <button
                                    type="submit"
                                    class="soap btn-block btn btn-info"
                                    style="color:#fff;"
                                >
                                    Thêm SOAP
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
                subjective: "",
                objective: "",
                assessment: "",
                plan: ""
            })
        };
    },
    methods: {
        addSoap(id) {
            $(".soap").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .post("api/soap")
                .then(() => {
                    toast.fire({
                        type: "success",
                        title: "SOAP của bệnh nhân được thêm thành công!"
                    });
                    $(".soap").html("Add Patient Vital");
                    $("#add-soap").trigger("reset");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng!"
                    });
                    $(".soap").html("Add Patient Vital");
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
