<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form
                            @submit.prevent="addEmrSummary()"
                            id="add-emrsummary"
                        >
                            <table width="100%">
                                <tr>
                                    <td colspan="2">
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
                                                        patient.full_name
                                                    }}</option
                                                >
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="patient_id"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="form.therapy"
                                                type="text"
                                                name="therapy"
                                                placeholder="Phương pháp điều trị"
                                                rows="2"
                                                cols="10"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'therapy'
                                                    )
                                                }"
                                            >
                                            </textarea>
                                            <has-error
                                                :form="form"
                                                field="therapy"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="form.patient_condition"
                                                type="text"
                                                name="patient_condition"
                                                placeholder="Tình trạng người bệnh ra viện"
                                                rows="2"
                                                cols="10"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'patient_condition'
                                                    )
                                                }"
                                            >
                                            </textarea>
                                            <has-error
                                                :form="form"
                                                field="patient_condition"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="form.therapy_plan"
                                                type="text"
                                                name="therapy_plan"
                                                placeholder="Hướng điều trị và các chế độ tiếp theo"
                                                rows="2"
                                                cols="10"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'therapy_plan'
                                                    )
                                                }"
                                            >
                                            </textarea>
                                            <has-error
                                                :form="form"
                                                field="therapy_plan"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <center>
                                        <button
                                            type="submit"
                                            class="emrsummary btn-block btn btn-info"
                                            style="color:#fff;"
                                        >
                                            Thêm thông tin
                                        </button>
                                    </center>
                                </tr>
                            </table>
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
                therapy: "",
                patient_condition: "",
                therapy_plan: ""
            })
        };
    },
    methods: {
        addEmrSummary(id) {
            $(".emrsummary").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .post("api/emrsummary")
                .then(() => {
                    toast.fire({
                        type: "success",
                        title: "Thêm thành công!"
                    });
                    $(".emrsummary").html("Thêm thông tin");
                    $("#add-emrsummary").trigger("reset");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng!"
                    });
                    $(".emrsummary").html("Thêm thông tin");
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
