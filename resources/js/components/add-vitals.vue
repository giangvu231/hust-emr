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
                                                    >{{
                                                        searchPatient.full_name
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
                                    <td width="50%">
                                        <div class="form-group">
                                            <label>Mạch (lần/phút)</label>
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
                                            <label>Thân nhiệt (°C)</label>
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
                                            <label
                                                >Huyết áp tâm thu (mmHg)</label
                                            >
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
                                            <label
                                                >Huyết áp tâm trương
                                                (mmHg)</label
                                            >
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
                                            <label>Nhịp thở (lần/phút)</label>
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
                                            <label>Cân nặng (kg)</label>
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
                                            <label>Chiều cao (cm)</label>
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
                                            <label>Nhóm máu</label>
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
                                <tr width="100%">
                                    <td colspan="2">
                                        <div width="100%">
                                            <div>
                                                <label
                                                    v-on:click="
                                                        isHiddenNoiKhoa = !isHiddenNoiKhoa
                                                    "
                                                    border="1px solid black"
                                                >
                                                    Phần dành cho bệnh án Nội
                                                    Khoa
                                                </label>

                                                <h1 v-if="isHiddenNoiKhoa">
                                                    <textarea
                                                        v-model="form.note"
                                                        type="text"
                                                        name="note"
                                                        placeholder="Nội dung khám (ý thức, da niêm mạc, hệ thống mạch, tuyến giáp, vị trí, kích thước, số lượng, di động v.v...)"
                                                        cols="10"
                                                        rows="5"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'note'
                                                            )
                                                        }"
                                                    >
                                                    </textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="note"
                                                    ></has-error>
                                                </h1>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div>
                                            <div>
                                                <label
                                                    v-on:click="
                                                        isHidden = !isHidden
                                                    "
                                                    border="1px solid black"
                                                >
                                                    Phần dành cho bệnh án Ngoại
                                                    Khoa
                                                </label>
                                                <h1 v-if="isHidden">
                                                    <textarea
                                                        v-model="form.note"
                                                        type="text"
                                                        name="note"
                                                        placeholder="Nội dung khám (ý thức, da niêm mạc, hệ thống mạch, tuyến giáp, vị trí, kích thước, số lượng, di động v.v...)"
                                                        cols="10"
                                                        rows="5"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'note'
                                                            )
                                                        }"
                                                    >
                                                    </textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="note"
                                                    ></has-error>
                                                </h1>
                                                <h1 v-if="isHidden">
                                                    <textarea
                                                        v-model="
                                                            form.NgoaiKhoaNote
                                                        "
                                                        type="text"
                                                        name="NgoaiKhoaNote"
                                                        placeholder="Khám ngoại khoa"
                                                        cols="10"
                                                        rows="5"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'NgoaiKhoaNote'
                                                            )
                                                        }"
                                                    >
                                                    </textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="NgoaiKhoaNote"
                                                    ></has-error>
                                                </h1>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <br />
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
            isHidden: false,
            isHiddenNoiKhoa: false,
            patients: {},
            searchPatient: "",
            searchPatients: [],
            form: new Form({
                patient_id: "",
                temperature: "",
                blood_pressure: "",
                height: "",
                weight: "",
                pulse: "",
                blood_group: "",
                blood_type: "",
                note: "",
                NgoaiKhoaNote: "",
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
