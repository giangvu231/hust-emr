<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm lịch sử khám bệnh</div>
                    <div class="card-body">
                        <form @submit.prevent="addHospital" id="add-hospital">
                            <table width="100%">
                                <tr width="100%">
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
                                    <td>
                                        <div class="form-group">
                                            <label>
                                                Ngày có mặt
                                            </label>
                                            <input
                                                v-model="form.date_attented"
                                                type="date"
                                                name="date_attented"
                                                placeholder="Nhập ngày vào viện"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'date_attented'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="date_attented"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <label>
                                                Ngày nhập viện
                                            </label>
                                            <input
                                                v-model="form.date_admitted"
                                                type="date"
                                                name="date_admitted"
                                                placeholder="Điền ngày nhập viện"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'date_admitted'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="date_admitted"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <select
                                                v-model="form.admit_dept"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'admit_dept'
                                                    )
                                                }"
                                                name="admit_dept"
                                            >
                                                <option
                                                    disabled
                                                    value=""
                                                    style="font-weight:700;"
                                                >
                                                    Khoa đón tiếp
                                                </option>
                                                <option value="Cấp cứu">
                                                    1.Cấp cứu
                                                </option>
                                                <option value="KKB">
                                                    2.KKB
                                                </option>
                                                <option value="Khoa điều trị">
                                                    3.Khoa điều trị
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="admit_dept"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select
                                                v-model="form.refer_dept"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'refer_dept'
                                                    )
                                                }"
                                                name="refer_dept"
                                            >
                                                <option
                                                    disabled
                                                    value=""
                                                    style="font-weight:700;"
                                                >
                                                    Nơi giới thiệu
                                                </option>
                                                <option value="Cơ quan y tế">
                                                    1.Cơ quan y tế
                                                </option>
                                                <option value="Tự đến">
                                                    2.Tự đến
                                                </option>
                                                <option value="Khác">
                                                    3.Khác
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="refer_dept"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <b>HỎI BỆNH</b>
                                </tr>
                                <tr>
                                    <b>Lý do vào viện:</b>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.reason"
                                                type="text"
                                                name="reason"
                                                placeholder="Nguyên nhân?"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'reason'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="reason"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.reason_date"
                                                type="text"
                                                name="reason_date"
                                                placeholder="Vào ngày thứ bao nhiêu của bệnh?"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'reason_date'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="reason_date"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <b>1. Quá trình bệnh lý</b>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="form.symptoms"
                                                placeholder="Khởi phát, diễn biến, chẩn đoán, điều trị của tuyến dưới v.v..."
                                                name="symptoms"
                                                id=""
                                                cols="10"
                                                rows="5"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'symptoms'
                                                    )
                                                }"
                                            ></textarea>
                                            <has-error
                                                :form="form"
                                                field="symptoms"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <b>2. Tiền sử bệnh</b>
                                </tr>
                                <tr>
                                    <b>+ Bản thân:</b>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="form.disease_in"
                                                placeholder="Phát triển thể lực từ nhỏ đến lớn, những bệnh đã mắc, phương pháp ĐTr, tiêm phòng, ăn uống, sinh hoạt v.v..."
                                                name="disease_in"
                                                id=""
                                                cols="10"
                                                rows="5"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'disease_in'
                                                    )
                                                }"
                                            ></textarea>
                                            <has-error
                                                :form="form"
                                                field="disease_in"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    Đặc điểm liên quan bệnh:
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table
                                            width="100%"
                                            style="border-collapse: collapse; text-align: center;"
                                            border="1px solid black"
                                        >
                                            <tr>
                                                <td width="10%">
                                                    <b>Thứ tự</b>
                                                </td>
                                                <td width="50%">
                                                    <b>Đặc điểm</b>
                                                </td>
                                                <td width="10%">
                                                    <b>Ký hiệu</b>
                                                </td>
                                                <td width="30%">
                                                    <b
                                                        >Thời gian (tính theo
                                                        tháng)</b
                                                    >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="10%">01</td>
                                                <td width="20%">- Dị ứng</td>
                                                <td width="10%">
                                                    <input
                                                        type="checkbox"
                                                        id="diung"
                                                        value="X"
                                                        v-model="
                                                            form.disease_diung
                                                        "
                                                        true-value="X"
                                                        false-value=""
                                                    />
                                                </td>
                                                <td width="40%">
                                                    <input
                                                        style="width:100%; border:0px; text-align: center;"
                                                        v-model="
                                                            form.disease_diung_time
                                                        "
                                                    />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>02</td>
                                                <td>- Ma túy</td>
                                                <td>
                                                    <input
                                                        type="checkbox"
                                                        id="matuy"
                                                        value="X"
                                                        v-model="
                                                            form.disease_matuy
                                                        "
                                                        true-value="X"
                                                        false-value=""
                                                    />
                                                </td>
                                                <td>
                                                    <input
                                                        style="width:100%; border:0px; text-align: center;"
                                                        v-model="
                                                            form.disease_matuy_time
                                                        "
                                                    />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>03</td>
                                                <td>- Rượu bia</td>
                                                <td>
                                                    <input
                                                        type="checkbox"
                                                        id="ruoubia"
                                                        value="X"
                                                        v-model="
                                                            form.disease_ruoubia
                                                        "
                                                        true-value="X"
                                                        false-value=""
                                                    />
                                                </td>
                                                <td>
                                                    <input
                                                        style="width:100%; border:0px; text-align: center;"
                                                        v-model="
                                                            form.disease_ruoubia_time
                                                        "
                                                    />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>04</td>
                                                <td>- Thuốc lá</td>
                                                <td>
                                                    <input
                                                        type="checkbox"
                                                        id="thuocla"
                                                        value="X"
                                                        v-model="
                                                            form.disease_thuocla
                                                        "
                                                        true-value="X"
                                                        false-value=""
                                                    />
                                                </td>
                                                <td>
                                                    <input
                                                        style="width:100%; border:0px; text-align: center;"
                                                        v-model="
                                                            form.disease_thuocla_time
                                                        "
                                                    />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>05</td>
                                                <td>- Thuốc lào</td>
                                                <td>
                                                    <input
                                                        type="checkbox"
                                                        id="thuoclao"
                                                        value="X"
                                                        v-model="
                                                            form.disease_thuoclao
                                                        "
                                                        true-value="X"
                                                        false-value=""
                                                    />
                                                </td>
                                                <td>
                                                    <input
                                                        style="width:100%; border:0px; text-align: center;"
                                                        v-model="
                                                            form.disease_thuoclao_time
                                                        "
                                                    />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>06</td>
                                                <td>- Khác</td>
                                                <td>
                                                    <input
                                                        type="checkbox"
                                                        id="khac"
                                                        value="X"
                                                        v-model="
                                                            form.disease_khac
                                                        "
                                                        true-value="X"
                                                        false-value=""
                                                    />
                                                </td>
                                                <td>
                                                    <input
                                                        style="width:100%; border:0px; text-align: center;"
                                                        v-model="
                                                            form.disease_khac_time
                                                        "
                                                    />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>

                                <tr>
                                    <b>+ Gia đình:</b>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="form.disease_out"
                                                placeholder="Những người trong gia đình: bệnh đã mắc, đời sống, tinh thần, vật chất v.v..."
                                                name="disease_out"
                                                id=""
                                                cols="10"
                                                rows="5"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'disease_out'
                                                    )
                                                }"
                                            ></textarea>
                                            <has-error
                                                :form="form"
                                                field="disease_out"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="form.comment_box"
                                                placeholder="Nhập nhận xét của bác sĩ"
                                                name="comment_box"
                                                id=""
                                                cols="10"
                                                rows="5"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'comment_box'
                                                    )
                                                }"
                                            ></textarea>
                                            <has-error
                                                :form="form"
                                                field="comment_box"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                            </table>

                            <center>
                                <button
                                    type="submit"
                                    class="hospital btn-block btn btn-info"
                                    style="color:#fff;"
                                >
                                    Thêm thông tin
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
            searchText: "",
            searchArrs: [],
            query: "",
            icd10s: {},
            patients: {},
            searchPatient: "",
            searchPatients: [],
            form: new Form({
                patient_id: "",
                date_attented: "",
                date_admitted: "",
                comment_box: "",
                symptoms: "",
                admit_dept: "",
                refer_dept: "",
                disease_in: "",
                disease_out: "",
                reason: "",
                reason_date: "",
                disease_diung: "",
                disease_diung_time: "",
                disease_matuy: "",
                disease_matuy_time: "",
                disease_ruoubia: "",
                disease_ruoubia_time: "",
                disease_thuocla: "",
                disease_thuocla_time: "",
                disease_thuoclao: "",
                disease_thuoclao_time: "",
                disease_khac: "",
                disease_khac_time: "",
                icd10_id: "",
                icd10_code: "",
                icd10_name: ""
            })
        };
    },
    methods: {
        addHospital() {
            $(".hospital").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .post("api/hospital")
                .then(() => {
                    toast.fire({
                        type: "success",
                        // title: 'Patient Hospital History Added Successfully'
                        title: "Thêm thông tin thành công!"
                    });
                    $(".hospital").html("Thêm thông tin");
                    $("#add-hospital").trigger("reset");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Thông tin nhập chưa đúng!"
                    });
                    $(".hospital").html("Thêm thông tin");
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
        search() {
            axios
                .post("/search", {
                    name: this.searchText
                })
                .then(response => {
                    this.searchArrs = response.data;
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
