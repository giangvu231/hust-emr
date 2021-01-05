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
                                    <b>XUẤT VIỆN</b>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <select
                                                v-model="form.discharge_type"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'discharge_type'
                                                    )
                                                }"
                                                name="discharge_type"
                                            >
                                                <option
                                                    value=""
                                                    disabled
                                                    selected
                                                    >Loại</option
                                                >
                                                <option value="Ra viện">
                                                    1. Ra viện
                                                </option>
                                                <option value="Xin về">
                                                    2. Xin về
                                                </option>
                                                <option value="Bỏ về">
                                                    3. Bỏ về
                                                </option>
                                                <option value="Đưa về">
                                                    4. Đưa về
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="discharge_type"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.discharge_time"
                                                type="datetime-local"
                                                name="discharge_time"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'discharge_time'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="discharge_time"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Bệnh chính</b></td>
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
                                                                searchMainDisease
                                                            "
                                                            @keyup="
                                                                searchForMainDisease()
                                                            "
                                                        />
                                                        <select
                                                            @mouseover="
                                                                searchForMainDisease()
                                                            "
                                                            v-model="
                                                                form.discharge_maindisease_id
                                                            "
                                                            class="form-control"
                                                            :class="{
                                                                'is-invalid': form.errors.has(
                                                                    'discharge_maindisease_id'
                                                                )
                                                            }"
                                                            name="discharge_maindisease_id"
                                                        >
                                                            <option
                                                                disabled
                                                                selected
                                                                value=""
                                                                >Bảng mã ICD
                                                                10</option
                                                            >
                                                            <option
                                                                v-for="searchMainDisease in searchMainDiseases"
                                                                :key="
                                                                    searchMainDisease.id
                                                                "
                                                                :value="
                                                                    searchMainDisease.id
                                                                "
                                                            >
                                                                {{
                                                                    searchMainDisease.code
                                                                }}
                                                                -
                                                                {{
                                                                    searchMainDisease.name
                                                                }}
                                                            </option>
                                                        </select>
                                                        <has-error
                                                            :form="form"
                                                            field="discharge_maindisease_id"
                                                        ></has-error>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><b>Bệnh kèm theo</b></td>
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
                                                                searchSubDisease
                                                            "
                                                            @keyup="
                                                                searchForSubDisease()
                                                            "
                                                        />
                                                        <select
                                                            @mouseover="
                                                                searchForSubDisease()
                                                            "
                                                            v-model="
                                                                form.discharge_subdisease_id
                                                            "
                                                            class="form-control"
                                                            :class="{
                                                                'is-invalid': form.errors.has(
                                                                    'discharge_subdisease_id'
                                                                )
                                                            }"
                                                            name="discharge_subdisease_id"
                                                        >
                                                            <option
                                                                disabled
                                                                selected
                                                                value=""
                                                                >Bảng mã ICD
                                                                10</option
                                                            >
                                                            <option
                                                                v-for="searchSubDisease in searchSubDiseases"
                                                                :key="
                                                                    searchSubDisease.id
                                                                "
                                                                :value="
                                                                    searchSubDisease.id
                                                                "
                                                            >
                                                                {{
                                                                    searchSubDisease.code
                                                                }}
                                                                -
                                                                {{
                                                                    searchSubDisease.name
                                                                }}
                                                            </option>
                                                        </select>
                                                        <has-error
                                                            :form="form"
                                                            field="discharge_subdisease_id"
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
                                                    Tai biến:
                                                    <input
                                                        type="checkbox"
                                                        id="stroke"
                                                        value="X"
                                                        v-model="
                                                            form.discharge_stroke
                                                        "
                                                        true-value="X"
                                                        false-value=""
                                                    />
                                                </td>
                                                <td>
                                                    Biến chứng:
                                                    <input
                                                        type="checkbox"
                                                        id="complication"
                                                        value="X"
                                                        v-model="
                                                            form.discharge_complication
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
                                    <td width="50%">Kết quả điều trị</td>
                                    <td>Giải phẫu bệnh (khi có sinh thiết)</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <select
                                                v-model="form.treatment_result"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'treatment_result'
                                                    )
                                                }"
                                                name="treatment_result"
                                            >
                                                <option
                                                    disabled
                                                    value=""
                                                    style="font-weight:700;"
                                                >
                                                    Kết quả điều trị
                                                </option>
                                                <option value="Khỏi">
                                                    1. Khỏi
                                                </option>
                                                <option value="Đỡ, giảm">
                                                    2. Đỡ, giảm
                                                </option>
                                                <option value="Không thay đổi">
                                                    3. Không thay đổi
                                                </option>
                                                <option value="Nặng hơn">
                                                    4. Nặng hơn
                                                </option>
                                                <option value="Tử vong">
                                                    5. Tử vong
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="treatment_result"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select
                                                v-model="form.anapath"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'anapath'
                                                    )
                                                }"
                                                name="anapath"
                                            >
                                                <option
                                                    disabled
                                                    value=""
                                                    style="font-weight:700;"
                                                >
                                                    Giải phẫu bệnh
                                                </option>
                                                <option value="Lành tính">
                                                    1. Lành tính
                                                </option>
                                                <option value="Nghi ngờ">
                                                    2. Nghi ngờ
                                                </option>
                                                <option value="Ác tính">
                                                    3. Ác tính
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="anapath"
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
                                    <td>Tình hình tử vong</td>
                                    <td>
                                        <div class="form-group">
                                            <select
                                                v-model="form.death_type"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'death_type'
                                                    )
                                                }"
                                                name="death_type"
                                            >
                                                <option
                                                    value=""
                                                    disabled
                                                    selected
                                                    >Loại</option
                                                >
                                                <option value="Do bệnh">
                                                    1. Do bệnh
                                                </option>
                                                <option
                                                    value="Do tai biến điều trị"
                                                >
                                                    2. Do tai biến điều trị
                                                </option>
                                                <option value="Khác">
                                                    3. Khác
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="death_type"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.death_time"
                                                type="datetime-local"
                                                name="death_time"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'death_time'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="death_time"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select
                                                v-model="form.death_time_range"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'death_time_range'
                                                    )
                                                }"
                                                name="death_time_range"
                                            >
                                                <option
                                                    value=""
                                                    disabled
                                                    selected
                                                    >Loại</option
                                                >
                                                <option
                                                    value="Trong 24 giờ vào viện"
                                                >
                                                    1. Trong 24 giờ vào viện
                                                </option>
                                                <option
                                                    value="Sau 24 giờ vào viện"
                                                >
                                                    2. Sau 24 giờ vào viện
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="death_time_range"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <b>Nguyên nhân chính tử vong</b>
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
                                                                searchDeathReason
                                                            "
                                                            @keyup="
                                                                searchForDeathReason()
                                                            "
                                                        />
                                                        <select
                                                            @mouseover="
                                                                searchForDeathReason()
                                                            "
                                                            v-model="
                                                                form.death_reason_id
                                                            "
                                                            class="form-control"
                                                            :class="{
                                                                'is-invalid': form.errors.has(
                                                                    'death_reason_id'
                                                                )
                                                            }"
                                                            name="death_reason_id"
                                                        >
                                                            <option
                                                                disabled
                                                                selected
                                                                value=""
                                                                >Bảng mã ICD
                                                                10</option
                                                            >
                                                            <option
                                                                v-for="searchDeathReason in searchDeathReasons"
                                                                :key="
                                                                    searchDeathReason.id
                                                                "
                                                                :value="
                                                                    searchDeathReason.id
                                                                "
                                                            >
                                                                {{
                                                                    searchDeathReason.code
                                                                }}
                                                                -
                                                                {{
                                                                    searchDeathReason.name
                                                                }}
                                                            </option>
                                                        </select>
                                                        <has-error
                                                            :form="form"
                                                            field="death_reason_id"
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
                                                <td colspan="2">
                                                    Khám nghiệm tử thi:
                                                    <input
                                                        type="checkbox"
                                                        id="autopsy"
                                                        value="X"
                                                        v-model="form.autopsy"
                                                        true-value="X"
                                                        false-value=""
                                                    />
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <b>Chẩn đoán giải phẫu tử thi</b>
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
                                                                searchAutopsyDiagnosis
                                                            "
                                                            @keyup="
                                                                searchForAutopsyDiagnosis()
                                                            "
                                                        />
                                                        <select
                                                            @mouseover="
                                                                searchForAutopsyDiagnosis()
                                                            "
                                                            v-model="
                                                                form.autopsy_diagnosis_id
                                                            "
                                                            class="form-control"
                                                            :class="{
                                                                'is-invalid': form.errors.has(
                                                                    'autopsy_diagnosis_id'
                                                                )
                                                            }"
                                                            name="autopsy_diagnosis_id"
                                                        >
                                                            <option
                                                                disabled
                                                                selected
                                                                value=""
                                                                >Bảng mã ICD
                                                                10</option
                                                            >
                                                            <option
                                                                v-for="searchAutopsyDiagnosis in searchAutopsyDiagnosiss"
                                                                :key="
                                                                    searchAutopsyDiagnosis.id
                                                                "
                                                                :value="
                                                                    searchAutopsyDiagnosis.id
                                                                "
                                                            >
                                                                {{
                                                                    searchAutopsyDiagnosis.code
                                                                }}
                                                                -
                                                                {{
                                                                    searchAutopsyDiagnosis.name
                                                                }}
                                                            </option>
                                                        </select>
                                                        <has-error
                                                            :form="form"
                                                            field="autopsy_diagnosis_id"
                                                        ></has-error>
                                                    </div>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <center width="100%">
                                            <button
                                                type="submit"
                                                class="emrsummary btn-block btn btn-info"
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
            searchMainDisease: "",
            searchMainDiseases: [],
            searchSubDisease: "",
            searchSubDiseases: [],
            searchDeathReason: "",
            searchDeathReasons: [],
            searchAutopsyDiagnosis: "",
            searchAutopsyDiagnosiss: [],

            patients: {},

            form: new Form({
                patient_id: "",
                therapy: "",
                patient_condition: "",
                therapy_plan: "",

                discharge_type: "",
                discharge_time: "",

                discharge_maindisease_id: "",
                discharge_maindisease_code: "",
                discharge_maindisease_name: "",

                discharge_subdisease_id: "",
                discharge_subdisease_code: "",
                discharge_subdisease_name: "",

                death_reason_id: "",
                death_reason_code: "",
                death_reason_name: "",

                autopsy_diagnosis_id: "",
                autopsy_diagnosis_code: "",
                autopsy_diagnosis_name: "",

                discharge_stroke: "",
                discharge_complication: "",

                treatment_result: "",
                anapath: "",

                death_type: "",
                death_time: "",
                death_time_range: "",
                autopsy: ""
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
        },
        searchForMainDisease() {
            axios
                .post("/searchicd10", {
                    name: this.searchMainDisease
                })
                .then(response => {
                    this.searchMainDiseases = response.data;
                })
                .catch(() => {});
        },
        searchForSubDisease() {
            axios
                .post("/searchicd10", {
                    name: this.searchSubDisease
                })
                .then(response => {
                    this.searchSubDiseases = response.data;
                })
                .catch(() => {});
        },
        searchForDeathReason() {
            axios
                .post("/searchicd10", {
                    name: this.searchDeathReason
                })
                .then(response => {
                    this.searchDeathReasons = response.data;
                })
                .catch(() => {});
        },
        searchForAutopsyDiagnosis() {
            axios
                .post("/searchicd10", {
                    name: this.searchAutopsyDiagnosis
                })
                .then(response => {
                    this.searchAutopsyDiagnosiss = response.data;
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
