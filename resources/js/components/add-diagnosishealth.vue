<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Khám các cơ quan</div>
                    <div class="card-body">
                        <form
                            @submit.prevent="addDiagnosishealth()"
                            id="add-diagnosishealth"
                        >
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
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label>Khám tuần hoàn</label>
                                            <textarea
                                                v-model="
                                                    form.diagnosis_tuanhoan
                                                "
                                                type="text"
                                                name="diagnosis_tuanhoan"
                                                placeholder="Cơ quan tuần hoàn"
                                                rows="5"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'diagnosis_tuanhoan'
                                                    )
                                                }"
                                            ></textarea>
                                            <has-error
                                                :form="form"
                                                field="diagnosis_tuanhoan"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label>Khám hô hấp</label>
                                            <textarea
                                                v-model="form.diagnosis_hohap"
                                                type="text"
                                                name="diagnosis_hohap"
                                                placeholder="Cơ quan hô hấp"
                                                rows="5"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'diagnosis_hohap'
                                                    )
                                                }"
                                            ></textarea>
                                            <has-error
                                                :form="form"
                                                field="diagnosis_hohap"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label>Khám tiêu hóa</label>
                                            <textarea
                                                v-model="form.diagnosis_tieuhoa"
                                                type="text"
                                                name="diagnosis_tieuhoa"
                                                placeholder="Cơ quan tiêu hóa"
                                                rows="5"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'diagnosis_tieuhoa'
                                                    )
                                                }"
                                            ></textarea>
                                            <has-error
                                                :form="form"
                                                field="diagnosis_tieuhoa"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label
                                                >Khám Thận- Tiết niệu- Sinh
                                                dục</label
                                            >
                                            <textarea
                                                v-model="
                                                    form.diagnosis_than_tietnieu_sinhduc
                                                "
                                                type="text"
                                                name="diagnosis_than_tietnieu_sinhduc"
                                                placeholder="Cơ quan Thận - Tiết niệu - Sinh dục"
                                                rows="5"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'diagnosis_than_tietnieu_sinhduc'
                                                    )
                                                }"
                                            ></textarea>
                                            <has-error
                                                :form="form"
                                                field="diagnosis_than_tietnieu_sinhduc"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label>Khám thần kinh</label>
                                            <textarea
                                                v-model="
                                                    form.diagnosis_thankinh
                                                "
                                                type="text"
                                                name="diagnosis_thankinh"
                                                placeholder="Cơ quan Thần Kinh"
                                                rows="5"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'diagnosis_thankinh'
                                                    )
                                                }"
                                            ></textarea>
                                            <has-error
                                                :form="form"
                                                field="diagnosis_thankinh"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label>Khám Cơ- Xương- Khớp</label>
                                            <textarea
                                                v-model="
                                                    form.diagnosis_coxuongkhop
                                                "
                                                type="text"
                                                name="diagnosis_coxuongkhop"
                                                placeholder="Cơ quan Cơ - Xương - Khớp"
                                                rows="5"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'diagnosis_coxuongkhop'
                                                    )
                                                }"
                                            ></textarea>
                                            <has-error
                                                :form="form"
                                                field="diagnosis_coxuongkhop"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label>Khám Tai- mũi- họng</label>
                                            <textarea
                                                v-model="
                                                    form.diagnosis_taimuihong
                                                "
                                                type="text"
                                                name="diagnosis_taimuihong"
                                                placeholder="Cơ quan Tai - Mũi - Họng"
                                                rows="5"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'diagnosis_taimuihong'
                                                    )
                                                }"
                                            ></textarea>
                                            <has-error
                                                :form="form"
                                                field="diagnosis_taimuihong"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label>Khám Răng- Hàm- Mặt</label>
                                            <textarea
                                                v-model="
                                                    form.diagnosis_ranghammat
                                                "
                                                type="text"
                                                name="diagnosis_ranghammat"
                                                placeholder="Cơ quan Răng - Hàm - Mặt"
                                                rows="5"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'diagnosis_ranghammat'
                                                    )
                                                }"
                                            ></textarea>
                                            <has-error
                                                :form="form"
                                                field="diagnosis_ranghammat"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label>Khám mắt</label>
                                            <textarea
                                                v-model="form.diagnosis_mat"
                                                type="text"
                                                name="diagnosis_mat"
                                                placeholder="Cơ quan Mắt"
                                                rows="5"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'diagnosis_mat'
                                                    )
                                                }"
                                            ></textarea>
                                            <has-error
                                                :form="form"
                                                field="diagnosis_mat"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label
                                                >Khám Nội tiết- Dinh dưỡng-
                                                Khác</label
                                            >
                                            <textarea
                                                v-model="
                                                    form.diagnosis_noitiet_dinhduong_khac
                                                "
                                                type="text"
                                                name="diagnosis_noitiet_dinhduong_khac"
                                                placeholder="Cơ quan Nội tiết, dinh dưỡng và các bệnh lý khác"
                                                rows="5"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'diagnosis_noitiet_dinhduong_khac'
                                                    )
                                                }"
                                            ></textarea>
                                            <has-error
                                                :form="form"
                                                field="diagnosis_noitiet_dinhduong_khac"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <label
                                                >Triệu chứng và hội chứng lâm
                                                sàng</label
                                            >
                                            <textarea
                                                v-model="
                                                    form.diagnosis_syndrome
                                                "
                                                type="text"
                                                name="diagnosis_syndrome"
                                                placeholder="Các triệu chứng, hội chứng lâm sàng đã phát hiện"
                                                rows="5"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'diagnosis_syndrome'
                                                    )
                                                }"
                                            ></textarea>
                                            <has-error
                                                :form="form"
                                                field="diagnosis_syndrome"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <button
                                                type="submit"
                                                class="diagnosishealth btn-block btn btn-info"
                                                style="color:#fff;"
                                            >
                                                Thêm thông tin
                                            </button>
                                        </center>
                                    </td>
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
            searchPatient: "",
            searchPatients: [],
            form: new Form({
                patient_id: "",
                diagnosis_tuanhoan: "",
                diagnosis_hohap: "",
                diagnosis_tieuhoa: "",
                diagnosis_than_tietnieu_sinhduc: "",
                diagnosis_thankinh: "",
                diagnosis_coxuongkhop: "",
                diagnosis_taimuihong: "",
                diagnosis_ranghammat: "",
                diagnosis_mat: "",
                diagnosis_noitiet_dinhduong_khac: "",
                diagnosis_syndrome: ""
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
                    $(".diagnosishealth").html("Thêm thông tin");
                    $("#add-diagnosishealth").trigger("reset");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng!"
                    });
                    $(".diagnosishealth").html("Thêm thông tin");
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
