<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form
                            @submit.prevent="addTreatment()"
                            id="add-treatment"
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
                                    <b>TÓM LƯỢC CHẨN ĐOÁN</b>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <b
                                            >1. Chẩn đoán bệnh tại nơi chuyển
                                            đến:</b
                                        >
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table width="100%">
                                            <tr>
                                                <td style="text-align:inherit;">
                                                    Tên bệnh theo ICD-10
                                                </td>
                                                <td width="70%">
                                                    <div class="form-group">
                                                        <input
                                                            style="width: 100%;"
                                                            placeholder="Tìm bệnh theo bảng mã ICD-10"
                                                            type="text"
                                                            v-model="
                                                                searchAdmitText
                                                            "
                                                            @keyup="
                                                                searchForAdmit()
                                                            "
                                                        />
                                                        <select
                                                            v-model="
                                                                form.icd10_admit_id
                                                            "
                                                            class="form-control"
                                                            :class="{
                                                                'is-invalid': form.errors.has(
                                                                    'icd10_admit_id'
                                                                )
                                                            }"
                                                            name="icd10_admit_id"
                                                        >
                                                            <option
                                                                disabled
                                                                selected
                                                                value=""
                                                                >Bảng mã ICD
                                                                10</option
                                                            >
                                                            <option
                                                                v-for="searchAdmitArr in searchAdmitArrs"
                                                                :key="
                                                                    searchAdmitArr.id
                                                                "
                                                                :value="
                                                                    searchAdmitArr.id
                                                                "
                                                            >
                                                                {{
                                                                    searchAdmitArr.code
                                                                }}
                                                                -
                                                                {{
                                                                    searchAdmitArr.name
                                                                }}
                                                            </option>
                                                        </select>
                                                        <has-error
                                                            :form="form"
                                                            field="icd10_admit_id"
                                                        ></has-error>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <b
                                            >2. Chẩn đoán bệnh tại KKB, Cấp
                                            cứu:</b
                                        >
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table width="100%">
                                            <tr>
                                                <td style="text-align:inherit;">
                                                    Tên bệnh theo ICD-10
                                                </td>
                                                <td width="70%">
                                                    <div class="form-group">
                                                        <input
                                                            style="width: 100%;"
                                                            placeholder="Tìm bệnh theo bảng mã ICD-10"
                                                            type="text"
                                                            v-model="
                                                                searchEmergencyText
                                                            "
                                                            @keyup="
                                                                searchForEmergency()
                                                            "
                                                        />
                                                        <select
                                                            v-model="
                                                                form.icd10_emergency_id
                                                            "
                                                            class="form-control"
                                                            :class="{
                                                                'is-invalid': form.errors.has(
                                                                    'icd10_emergency_id'
                                                                )
                                                            }"
                                                            name="icd10_emergency_id"
                                                        >
                                                            <option
                                                                disabled
                                                                selected
                                                                value=""
                                                                >Bảng mã ICD
                                                                10</option
                                                            >
                                                            <option
                                                                v-for="searchEmergencyArr in searchEmergencyArrs"
                                                                :key="
                                                                    searchEmergencyArr.id
                                                                "
                                                                :value="
                                                                    searchEmergencyArr.id
                                                                "
                                                            >
                                                                {{
                                                                    searchEmergencyArr.code
                                                                }}
                                                                -
                                                                {{
                                                                    searchEmergencyArr.name
                                                                }}
                                                            </option>
                                                        </select>
                                                        <has-error
                                                            :form="form"
                                                            field="icd10_emergency_id"
                                                        ></has-error>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <b
                                            >3. Chẩn đoán bệnh khi vào khoa điều
                                            trị:</b
                                        >
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table width="100%">
                                            <tr>
                                                <td style="text-align:inherit;">
                                                    Tên bệnh theo ICD-10
                                                </td>
                                                <td width="70%">
                                                    <div class="form-group">
                                                        <input
                                                            style="width: 100%;"
                                                            placeholder="Tìm bệnh theo bảng mã ICD-10"
                                                            type="text"
                                                            v-model="
                                                                searchTreatmentText
                                                            "
                                                            @keyup="
                                                                searchForTreatment()
                                                            "
                                                        />
                                                        <select
                                                            v-model="
                                                                form.icd10_treatment_id
                                                            "
                                                            class="form-control"
                                                            :class="{
                                                                'is-invalid': form.errors.has(
                                                                    'icd10_treatment_id'
                                                                )
                                                            }"
                                                            name="icd10_treatment_id"
                                                        >
                                                            <option
                                                                disabled
                                                                selected
                                                                value=""
                                                                >Bảng mã ICD
                                                                10</option
                                                            >
                                                            <option
                                                                v-for="searchTreatmentArr in searchTreatmentArrs"
                                                                :key="
                                                                    searchTreatmentArr.id
                                                                "
                                                                :value="
                                                                    searchTreatmentArr.id
                                                                "
                                                            >
                                                                {{
                                                                    searchTreatmentArr.code
                                                                }}
                                                                -
                                                                {{
                                                                    searchTreatmentArr.name
                                                                }}
                                                            </option>
                                                        </select>
                                                        <has-error
                                                            :form="form"
                                                            field="icd10_treatment_id"
                                                        ></has-error>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <table width="100%">
                                            <tr>
                                                <td>
                                                    Thủ thuật:
                                                    <input
                                                        type="checkbox"
                                                        id="procedure"
                                                        value="X"
                                                        v-model="
                                                            form.diagnosis_procedure
                                                        "
                                                        true-value="X"
                                                        false-value=""
                                                    />
                                                </td>
                                                <td>
                                                    Phẫu thuật:
                                                    <input
                                                        type="checkbox"
                                                        id="surgery"
                                                        value="X"
                                                        v-model="
                                                            form.diagnosis_surgery
                                                        "
                                                        true-value="X"
                                                        false-value=""
                                                    />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <br />
                                <tr>
                                    <b>Nơi điều trị</b>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.department"
                                                type="text"
                                                name="department"
                                                placeholder="Nhập khoa điều trị"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'department'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="department"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.room"
                                                type="text"
                                                name="room"
                                                placeholder="Nhập phòng điều trị"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'room'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="room"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.bed_id"
                                                type="text"
                                                name="bed_id"
                                                placeholder="Nhập giường điều trị"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'bed_id'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="bed_id"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.reason_count"
                                                type="text"
                                                name="reason_count"
                                                placeholder="Số lần nhập viện do bệnh này?"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'reason_count'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="reason_count"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <label for="chandoan"
                                        >Chẩn đoán khi vào khoa điều trị</label
                                    >
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="form.disease_main"
                                                type="text"
                                                name="disease_main"
                                                placeholder="Bệnh chính"
                                                rows="2"
                                                cols="10"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'disease_main'
                                                    )
                                                }"
                                            >
                                            </textarea>
                                            <has-error
                                                :form="form"
                                                field="disease_main"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="form.disease_sub"
                                                type="text"
                                                name="disease_sub"
                                                placeholder="Bệnh kèm theo (nếu có)"
                                                rows="2"
                                                cols="10"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'disease_sub'
                                                    )
                                                }"
                                            >
                                            </textarea>
                                            <has-error
                                                :form="form"
                                                field="disease_sub"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="
                                                    form.disease_difference
                                                "
                                                type="text"
                                                name="disease_difference"
                                                placeholder="Phân biệt"
                                                rows="2"
                                                cols="10"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'disease_difference'
                                                    )
                                                }"
                                            >
                                            </textarea>
                                            <has-error
                                                :form="form"
                                                field="disease_difference"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <label>Tiên lượng</label>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="form.disease_prognosis"
                                                type="text"
                                                name="disease_prognosis"
                                                placeholder="Tiên lượng"
                                                rows="2"
                                                cols="10"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'disease_prognosis'
                                                    )
                                                }"
                                            >
                                            </textarea>
                                            <has-error
                                                :form="form"
                                                field="disease_prognosis"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <label>Hướng điều trị</label>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="form.disease_plan"
                                                type="text"
                                                name="disease_plan"
                                                placeholder="Hướng điều trị"
                                                rows="2"
                                                cols="10"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'disease_plan'
                                                    )
                                                }"
                                            >
                                            </textarea>
                                            <has-error
                                                :form="form"
                                                field="disease_plan"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chuyển khoa lần 1</td>
                                    <td>Thời điểm chuyển</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.dept_name_2nd"
                                                type="text"
                                                name="dept_name_2nd"
                                                placeholder="Khoa/Phòng"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'dept_name_2nd'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="dept_name_2nd"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.dept_time_2nd"
                                                type="datetime-local"
                                                name="dept_time_2nd"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'dept_time_2nd'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="dept_time_2nd"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chuyển khoa lần 2</td>
                                    <td>Thời điểm chuyển</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.dept_name_3rd"
                                                type="text"
                                                name="dept_name_3rd"
                                                placeholder="Khoa/Phòng"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'dept_name_3rd'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="dept_name_3rd"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.dept_time_3rd"
                                                type="datetime-local"
                                                name="dept_time_3rd"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'dept_time_3rd'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="dept_time_3rd"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Chuyển khoa lần 3</td>
                                    <td>Thời điểm chuyển</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.dept_name_4th"
                                                type="text"
                                                name="dept_name_4th"
                                                placeholder="Khoa/Phòng"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'dept_name_4th'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="dept_name_4th"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.dept_time_4th"
                                                type="datetime-local"
                                                name="dept_time_4th"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'dept_time_4th'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="dept_time_4th"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <b>CHUYỂN VIỆN</b>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        <div class="form-group">
                                            <select
                                                v-model="
                                                    form.hosp_transfer_type
                                                "
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'hosp_transfer_type'
                                                    )
                                                }"
                                                name="hosp_transfer_type"
                                            >
                                                <option
                                                    value=""
                                                    disabled
                                                    selected
                                                    >Loại</option
                                                >
                                                <option value="Tuyến trên">
                                                    1. Tuyến trên
                                                </option>
                                                <option value="Tuyến dưới">
                                                    2. Tuyến dưới
                                                </option>
                                                <option value="Chuyên khoa">
                                                    3. Chuyên khoa
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="hosp_transfer_type"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td width="70%">
                                        <div class="form-group">
                                            <input
                                                v-model="
                                                    form.hosp_transfer_name
                                                "
                                                type="text"
                                                name="hosp_transfer_name"
                                                placeholder="Chuyển đến?"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'hosp_transfer_name'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="hosp_transfer_name"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <button
                                                type="submit"
                                                class="treatment btn-block btn btn-info"
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
            searchAdmitText: "",
            searchAdmitArrs: [],
            searchEmergencyText: "",
            searchEmergencyArrs: [],
            searchTreatmentText: "",
            searchTreatmentArrs: [],
            searchPatient: "",
            searchPatients: [],
            patients: {},
            form: new Form({
                patient_id: "",
                disease_main: "",
                disease_sub: "",
                disease_difference: "",
                disease_prognosis: "",
                disease_plan: "",

                icd10_admit_id: "",
                icd10_admit_name: "",
                icd10_admit_code: "",

                dept_name_2nd: "",
                dept_time_2nd: "",
                dept_name_3rd: "",
                dept_time_3rd: "",
                dept_name_4th: "",
                dept_time_4th: "",

                hosp_transfer_type: "",
                hosp_transfer_name: "",

                diagnosis_procedure: "",
                diagnosis_surgery: "",

                department: "",
                room: "",
                bed_id: "",
                reason_count: "",

                icd10_emergency_id: "",
                icd10_emergency_name: "",
                icd10_emergency_code: "",

                icd10_treatment_id: "",
                icd10_treatment_name: "",
                icd10_treatment_code: ""
            })
        };
    },
    methods: {
        addTreatment(id) {
            $(".treatment").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .post("api/treatment")
                .then(() => {
                    toast.fire({
                        type: "success",
                        title: "Thêm thành công!"
                    });
                    $(".treatment").html("Thêm thông tin");
                    $("#add-treatment").trigger("reset");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng!"
                    });
                    $(".treatment").html("Thêm thông tin");
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
        searchForAdmit() {
            axios
                .post("/search", {
                    name: this.searchAdmitText
                })
                .then(response => {
                    this.searchAdmitArrs = response.data;
                })
                .catch(() => {});
        },
        searchForEmergency() {
            axios
                .post("/search", {
                    name: this.searchEmergencyText
                })
                .then(response => {
                    this.searchEmergencyArrs = response.data;
                })
                .catch(() => {});
        },
        searchForTreatment() {
            axios
                .post("/search", {
                    name: this.searchTreatmentText
                })
                .then(response => {
                    this.searchTreatmentArrs = response.data;
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
