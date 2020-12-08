<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nhap thong tin can lam sang</div>
                    <div class="card-body">
                        <form
                            @submit.prevent="addSubclinical()"
                            id="add-subclinical"
                        >
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
                            <div class="form-group">
                                <input
                                    v-model="form.subjective"
                                    type="text"
                                    name="subjective"
                                    placeholder="Nhập dau chung chu quan"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'subjective'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="subjective"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.objective"
                                    type="text"
                                    name="objective"
                                    placeholder="Nhập dau chung khach quan"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'objective'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="objective"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.assessment"
                                    type="text"
                                    name="assessment"
                                    placeholder="Nhập huong chan doan"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'assessment'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="assessment"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.plan"
                                    type="text"
                                    name="plan"
                                    placeholder="Nhập huong dieu tri"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('plan')
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="plan"
                                ></has-error>
                            </div>

                            <center>
                                <button
                                    type="submit"
                                    class="subclinical btn-block btn btn-info"
                                    style="color:#fff;"
                                >
                                    Thêm thong tin can lam sang
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
                lab_order: "",
                lab_result: "",
                imaging_order: "",
                imaging_result: ""
            })
        };
    },
    methods: {
        addSubclinical(id) {
            $(".subclinical").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .post("api/subclinical")
                .then(() => {
                    toast.fire({
                        type: "success",
                        title: "subclinical của bệnh nhân được thêm thành công!"
                    });
                    $(".subclinical").html("Add Patient subclinical");
                    $("#add-subclinical").trigger("reset");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng!"
                    });
                    $(".subclinical").html("Add Patient subclinical");
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
