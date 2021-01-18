<template>
    <div class="container">
        <div>
            <router-link
                to="/add-treatment"
                type="button"
                class="btn btn-rounded btn-info"
                style="color:#fff;"
                >Thêm thông tin</router-link
            >
        </div>
        <br /><br />
        <div class="row justify-content-center">
            <div class="card" style="width:100%;">
                <div class="card-header">
                    <h3 class="card-title">Danh sách bệnh nhân</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table
                        id="example1"
                        class="table table-bordered table-striped"
                    >
                        <thead>
                            <tr>
                                <th>Mã BA</th>
                                <th>Tên BN</th>
                                <th>Thông tin chi tiết</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="treatment in treatments"
                                :key="treatment.id"
                            >
                                <td>{{ treatment.patient.unique_id }}</td>
                                <td>{{ treatment.patient.full_name }}</td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-toggle="modal"
                                        :data-target="
                                            '#' + treatment.patient.unique_id
                                        "
                                    >
                                        Thông tin chi tiết
                                    </button>
                                    <div
                                        class="modal fade"
                                        :id="treatment.patient.unique_id"
                                        tabindex="-1"
                                        role="dialog"
                                        aria-labelledby="biodataTitle"
                                        aria-hidden="true"
                                    >
                                        <div
                                            class="modal-dialog modal-dialog-centered"
                                            role="document"
                                        >
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5
                                                        class="modal-title"
                                                        id="exampleModalLongTitle"
                                                    >
                                                        Thông tin chi tiết
                                                    </h5>
                                                    <button
                                                        type="button"
                                                        class="close"
                                                        data-dismiss="modal"
                                                        aria-label="Close"
                                                    >
                                                        <span aria-hidden="true"
                                                            >&times;</span
                                                        >
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>
                                                        <b>Bệnh nhân: </b>
                                                        <br />
                                                        {{
                                                            treatment.patient
                                                                .full_name
                                                        }}
                                                        -
                                                        {{
                                                            treatment.patient
                                                                .unique_id
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Khoa: </b>
                                                        {{
                                                            treatment.department
                                                        }}
                                                        <b>Phòng:</b>
                                                        {{ treatment.room }}
                                                        <b>Giường:</b>
                                                        {{ treatment.bed_id }}
                                                    </p>
                                                    <p>
                                                        <b>Bệnh chính: </b>
                                                        <br />
                                                        {{
                                                            treatment.disease_main
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b
                                                            >Bệnh kèm theo (nếu
                                                            có):
                                                        </b>
                                                        <br />
                                                        {{
                                                            treatment.disease_sub
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Phân biệt: </b>
                                                        <br />
                                                        {{
                                                            treatment.disease_difference
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Tiên lượng: </b>
                                                        <br />
                                                        {{
                                                            treatment.disease_prognosis
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Hướng điều trị: </b>
                                                        <br />
                                                        {{
                                                            treatment.disease_plan
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b
                                                            >Vào viện do bệnh
                                                            này lần thứ:
                                                        </b>
                                                        {{
                                                            treatment.reason_count
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b
                                                            >Chẩn đoán bệnh tại
                                                            nơi chuyển đến:
                                                        </b>
                                                        <br />
                                                        {{
                                                            treatment.icd10_admit_name
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b
                                                            >Chẩn đoán bệnh tại
                                                            KKB, Cấp cứu:
                                                        </b>
                                                        <br />
                                                        {{
                                                            treatment.icd10_emergency_name
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b
                                                            >Chẩn đoán bệnh khi
                                                            vào khoa điều trị:
                                                        </b>
                                                        <br />
                                                        {{
                                                            treatment.icd10_treatment_name
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b
                                                            >Chuyển khoa lần 1:
                                                        </b>
                                                        <br />
                                                        Tới khoa:
                                                        {{
                                                            treatment.dept_name_2nd
                                                        }}
                                                        , vào lúc:
                                                        {{
                                                            treatment.dept_time_2nd
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b
                                                            >Chuyển khoa lần 2:
                                                        </b>
                                                        <br />
                                                        Tới khoa:
                                                        {{
                                                            treatment.dept_name_3rd
                                                        }}
                                                        , vào lúc:
                                                        {{
                                                            treatment.dept_time_3rd
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b
                                                            >Chuyển khoa lần 3:
                                                        </b>
                                                        <br />
                                                        Tới khoa:
                                                        {{
                                                            treatment.dept_name_3rd
                                                        }}
                                                        , vào lúc:
                                                        {{
                                                            treatment.dept_time_3rd
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Chuyển viện tới: </b>
                                                        <br />
                                                        {{
                                                            treatment.hosp_transfer_name
                                                        }}
                                                        <br />
                                                        Loại:
                                                        {{
                                                            treatment.hosp_transfer_type
                                                        }}
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button
                                                        type="button"
                                                        class="btn btn-secondary"
                                                        data-dismiss="modal"
                                                    >
                                                        Đóng
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button
                                                @click="editModal(treatment)"
                                                class="text-primary"
                                            >
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button
                                                @click="
                                                    deleteTreatment(
                                                        treatment.id
                                                    )
                                                "
                                                class="text-danger"
                                            >
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!--treatment biodata Modal -->
                            <div
                                class="modal fade"
                                id="edittreatment"
                                tabindex="-1"
                                role="dialog"
                                aria-labelledby="biodataTitle"
                                aria-hidden="true"
                            >
                                <div
                                    class="modal-dialog modal-dialog-centered"
                                    role="document"
                                >
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5
                                                class="modal-title"
                                                id="exampleModalLongTitle"
                                            >
                                                Thông tin bệnh nhân
                                            </h5>
                                            <button
                                                type="button"
                                                class="close"
                                                data-dismiss="modal"
                                                aria-label="Close"
                                            >
                                                <span aria-hidden="true"
                                                    >&times;</span
                                                >
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form
                                                @submit.prevent="
                                                    updateTreatment
                                                "
                                                id="add-treatment"
                                            >
                                                <div class="form-group">
                                                    <label
                                                        >Nơi điều trị (Khoa-
                                                        Phòng- Giường)</label
                                                    >
                                                    <p>
                                                        <input
                                                            v-model="
                                                                form.department
                                                            "
                                                            type="text"
                                                            name="department"
                                                            placeholder="Khoa điều trị"
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
                                                    </p>
                                                    <p>
                                                        <input
                                                            v-model="form.room"
                                                            type="text"
                                                            name="room"
                                                            placeholder="Phòng điều trị"
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
                                                    </p>
                                                    <p>
                                                        <input
                                                            v-model="
                                                                form.bed_id
                                                            "
                                                            type="text"
                                                            name="bed_id"
                                                            placeholder="Giường điều trị"
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
                                                    </p>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        >Số lần nhập viện do
                                                        bệnh:</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.reason_count
                                                        "
                                                        type="text"
                                                        name="reason_count"
                                                        placeholder="Số lần nhập viện do bệnh:"
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

                                                <div class="form-group">
                                                    <label
                                                        >Chẩn đoán bệnh tại nơi
                                                        chuyển đến</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.icd10_admit_name
                                                        "
                                                        type="text"
                                                        name="icd10_admit_name"
                                                        placeholder="Chẩn đoán bệnh tại nơi chuyển đến"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'icd10_admit_name'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="icd10_admit_name"
                                                    ></has-error>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        >Chẩn đoán bệnh tại KKB,
                                                        Cấp cứu</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.icd10_emergency_name
                                                        "
                                                        type="text"
                                                        name="icd10_emergency_name"
                                                        placeholder="Chẩn đoán bệnh tại KKB, Cấp cứu"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'icd10_emergency_name'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="icd10_emergency_name"
                                                    ></has-error>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        >Chẩn đoán bệnh khi vào
                                                        khoa điều trị</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.icd10_treatment_name
                                                        "
                                                        type="text"
                                                        name="icd10_treatment_name"
                                                        placeholder="Chẩn đoán bệnh khi vào khoa điều trị"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'icd10_treatment_name'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="icd10_treatment_name"
                                                    ></has-error>
                                                </div>

                                                <div class="form-group">
                                                    <label>Bệnh chính</label>
                                                    <input
                                                        v-model="
                                                            form.disease_main
                                                        "
                                                        type="text"
                                                        name="disease_main"
                                                        placeholder="Bệnh chính"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'disease_main'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="disease_main"
                                                    ></has-error>
                                                </div>

                                                <div class="form-group">
                                                    <label>Bệnh kèm theo</label>
                                                    <input
                                                        v-model="
                                                            form.disease_sub
                                                        "
                                                        type="text"
                                                        name="disease_sub"
                                                        placeholder="Bệnh kèm theo"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'disease_sub'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="disease_sub"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label>Phân biệt</label>
                                                    <input
                                                        v-model="
                                                            form.disease_difference
                                                        "
                                                        type="text"
                                                        name="disease_difference"
                                                        placeholder="Khám tiêu hóa"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'disease_difference'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="disease_difference"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label>Tiên lượng</label>
                                                    <input
                                                        v-model="
                                                            form.disease_prognosis
                                                        "
                                                        type="text"
                                                        name="disease_prognosis"
                                                        placeholder="Tiên lượng"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'disease_prognosis'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="disease_prognosis"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        >Hướng điều trị</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.disease_plan
                                                        "
                                                        type="text"
                                                        name="disease_plan"
                                                        placeholder="Hướng điều trị"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'disease_plan'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="disease_plan"
                                                    ></has-error>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        >Chuyển khoa lần
                                                        1</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.dept_name_2nd
                                                        "
                                                        type="text"
                                                        name="dept_name_2nd"
                                                        placeholder="Chuyển khoa lần 1"
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
                                                <div class="form-group">
                                                    <label
                                                        >Thời gian chuyển khoa
                                                        lần 1</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.dept_time_2nd
                                                        "
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

                                                <div class="form-group">
                                                    <label
                                                        >Chuyển khoa lần
                                                        2</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.dept_name_3rd
                                                        "
                                                        type="text"
                                                        name="dept_name_3rd"
                                                        placeholder="Chuyển khoa lần 1"
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
                                                <div class="form-group">
                                                    <label
                                                        >Thời gian chuyển khoa
                                                        lần 2</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.dept_time_3rd
                                                        "
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

                                                <div class="form-group">
                                                    <label
                                                        >Chuyển khoa lần
                                                        3</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.dept_name_4th
                                                        "
                                                        type="text"
                                                        name="dept_name_4th"
                                                        placeholder="Chuyển khoa lần 1"
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
                                                <div class="form-group">
                                                    <label
                                                        >Thời gian chuyển khoa
                                                        lần 3</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.dept_time_4th
                                                        "
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

                                                <div class="form-group">
                                                    <label>Chuyển viện</label>
                                                    <input
                                                        v-model="
                                                            form.hosp_transfer_name
                                                        "
                                                        type="text"
                                                        name="hosp_transfer_name"
                                                        placeholder="Chuyển viện"
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

                                                <div class="form-group">
                                                    <b>Loại</b>
                                                    <input
                                                        v-model="
                                                            form.hosp_transfer_type
                                                        "
                                                        type="text"
                                                        name="hosp_transfer_type"
                                                        placeholder="Loại chuyển viện"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'hosp_transfer_type'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="hosp_transfer_type"
                                                    ></has-error>
                                                </div>

                                                <center>
                                                    <button
                                                        type="submit"
                                                        class="updatetreatment btn-block btn btn-info"
                                                        style="color:#fff;"
                                                    >
                                                        Cập nhật thông tin!
                                                    </button>
                                                </center>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button
                                                type="button"
                                                class="btn btn-secondary"
                                                data-dismiss="modal"
                                            >
                                                Đóng
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Mã BA</th>
                                <th>Tên BN</th>
                                <th>Thông tin chi tiết</th>
                                <th>Tác vụ</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            treatments: {},
            form: new Form({
                id: "",
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
        loadTreatments() {
            // this.loading = true;
            axios
                .get("api/treatment")
                .then(response => {
                    setTimeout(function() {
                        NProgress.done();
                    }, 1000);
                    this.treatments = response.data;
                    console.log(response);
                })
                .catch(error => {
                    console.log(error.response);
                });
        },
        editModal(treatment) {
            $("#edittreatment").modal("show");
            this.form.fill(treatment);
        },
        deleteTreatment(id) {
            swal.fire({
                title: "Bạn đã chắc chắn muốn xóa?",
                text: "Bạn sẽ không được phép hoàn tác sau khi thực hiện!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Đồng ý, hãy xóa!"
            }).then(result => {
                //delete qury below
                if (result.value) {
                    swal.fire({
                        position: "center",
                        type: "info",
                        title: "Đang xóa",
                        showConfirmButton: false,
                        timer: 1000
                    });
                    this.form
                        .delete("api/treatment/" + id)
                        .then(() => {
                            swal.fire(
                                "Đã xóa!",
                                "Đã xóa thành công.",
                                "success"
                            );
                            Fire.$emit("afterAction");
                        })
                        .catch(() => {
                            swal.fire({
                                type: "error",
                                title: "Oops...",
                                text: "Đã xảy ra sự cố!"
                            });
                        });
                }
            });
        },
        updateTreatment() {
            $(".updatetreatment").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .put("api/treatment/" + this.form.id)
                .then(() => {
                    Fire.$emit("afterAction");
                    $("#edittreatment").modal("hide");
                    toast.fire({
                        type: "success",
                        title: "Sinh hiệu được cập nhật thành công!"
                    });
                    $(".updatetreatment").html("Add Patient");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng"
                    });
                    $(".updatetreatment").html("Add Patient");
                });
        }
    },
    mounted() {
        console.log("Component mounted.");
        this.loadTreatments();
        Fire.$on("afterAction", () => {
            this.loadTreatments();
        });
    }
};
</script>
