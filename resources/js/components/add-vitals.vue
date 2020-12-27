<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Khám bệnh toàn thân</div>
                    <div class="card-body">
                        <form @submit.prevent="addVital()" id="add-vital">
                            <table width="100%">
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <select
                                                v-model="form.patient_id"
                                                aria-placeholder="Chon benh nhan"
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
                                                        patient.full_name +
                                                            patient.id
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
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.pulse"
                                                type="text"
                                                name="pulse"
                                                placeholder="Mạch (lần/phút)"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'pulse'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="pulse"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.temperature"
                                                type="text"
                                                name="temperature"
                                                placeholder="Thân nhiệt (°C)"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'temperature'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="temperature"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.systolic"
                                                type="text"
                                                name="systolic"
                                                placeholder="Huyết áp tâm thu (mmHg)"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'systolic'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="systolic"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.diastolic"
                                                type="text"
                                                name="diastolic"
                                                placeholder="Huyết áp tâm trương(mmHg)"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'diastolic'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="diastolic"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.respiration"
                                                type="text"
                                                name="respiration"
                                                placeholder="Nhịp thở (lần/phút)"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'respiration'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="respiration"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.weight"
                                                type="text"
                                                name="weight"
                                                placeholder="Nhập cân nặng (kg)"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'weight'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="weight"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.height"
                                                type="text"
                                                name="height"
                                                placeholder="Nhập chiều cao (cm)"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'height'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="height"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.blood_group"
                                                type="text"
                                                name="blood_group"
                                                placeholder="Nhập nhóm máu (O, A, B, AB)"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'blood_group'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="blood_group"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <div class="form-group">
                                <textarea
                                    v-model="form.note"
                                    type="text"
                                    name="note"
                                    placeholder="Nội dung khám (ý thức, da niêm mạc, hệ thống mạch, tuyến giáp, vị trí, kích thước, số lượng, di động v.v...)"
                                    cols="10"
                                    rows="5"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('note')
                                    }"
                                >
                                </textarea>
                                <has-error
                                    :form="form"
                                    field="note"
                                ></has-error>
                            </div>
                            <center>
                                <button
                                    type="submit"
                                    class="vital btn-block btn btn-info"
                                    style="color:#fff;"
                                >
                                    Thêm sinh hiệu
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
                temperature: "",
                blood_pressure: "",
                height: "",
                weight: "",
                pulse: "",
                blood_group: "",
                blood_type: "",
                immunization: []
            })
        };
    },
    methods: {
        addVital(id) {
            $(".vital").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .post("api/vital")
                .then(() => {
                    toast.fire({
                        type: "success",
                        title: "Sinh hiệu của bệnh nhân được thêm thành công!"
                    });
                    $(".vital").html("Add Patient Vital");
                    $("#add-vital").trigger("reset");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng!"
                    });
                    $(".vital").html("Add Patient Vital");
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
