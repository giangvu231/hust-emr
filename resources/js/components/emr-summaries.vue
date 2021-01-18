<template>
    <div class="container">
        <div>
            <router-link
                to="/emr-summary"
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
                                <th>Mã bệnh án</th>
                                <th>Tên bệnh nhân</th>
                                <th>Thông tin bệnh nhân</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="emrsummary in emrsummaries"
                                :key="emrsummary.id"
                            >
                                <td>{{ emrsummary.patient.unique_id }}</td>
                                <td>{{ emrsummary.patient.full_name }}</td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-toggle="modal"
                                        :data-target="
                                            '#' + emrsummary.patient.unique_id
                                        "
                                    >
                                        Thông tin chi tiết
                                    </button>
                                    <div
                                        class="modal fade"
                                        :id="emrsummary.patient.unique_id"
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
                                                    <label
                                                        >Phương pháp điều trị:
                                                    </label>
                                                    <span
                                                        style="white-space: pre-line"
                                                    >
                                                        {{ emrsummary.therapy }}
                                                    </span>
                                                </div>

                                                <div class="modal-body">
                                                    <label
                                                        >Tình trạng người bệnh
                                                        khi ra viện:
                                                    </label>
                                                    <span
                                                        style="white-space: pre-line"
                                                    >
                                                        {{
                                                            emrsummary.patient_condition
                                                        }}
                                                    </span>
                                                </div>

                                                <div class="modal-body">
                                                    <label
                                                        >Hướng điều trị và các
                                                        chế độ tiếp theo:
                                                    </label>
                                                    <span
                                                        style="white-space: pre-line"
                                                    >
                                                        {{
                                                            emrsummary.therapy_plan
                                                        }}
                                                    </span>
                                                </div>

                                                <div class="modal-body">
                                                    <label>Xuất viện: </label>
                                                    <span
                                                        style="white-space: pre-line"
                                                    >
                                                        {{
                                                            emrsummary.discharge_type
                                                        }}
                                                    </span>
                                                </div>
                                                <div class="modal-body">
                                                    <label
                                                        >Thời điểm xuất viện:
                                                    </label>
                                                    <span
                                                        style="white-space: pre-line"
                                                    >
                                                        {{
                                                            emrsummary.discharge_time
                                                                | humanDate
                                                        }}
                                                    </span>
                                                </div>

                                                <div class="modal-body">
                                                    <label>Bệnh chính: </label>
                                                    <span
                                                        style="white-space: pre-line"
                                                    >
                                                        {{
                                                            emrsummary.discharge_maindisease_name
                                                        }}
                                                    </span>
                                                </div>

                                                <div class="modal-body">
                                                    <label
                                                        >Bệnh kèm theo:
                                                    </label>
                                                    <span
                                                        style="white-space: pre-line"
                                                    >
                                                        {{
                                                            emrsummary.discharge_subdisease_name
                                                        }}
                                                    </span>
                                                </div>

                                                <div class="modal-body">
                                                    <label
                                                        >Kết quả điều trị:
                                                    </label>
                                                    <span
                                                        style="white-space: pre-line"
                                                    >
                                                        {{
                                                            emrsummary.treatment_result
                                                        }}
                                                    </span>
                                                </div>

                                                <div class="modal-body">
                                                    <label
                                                        >Giải phẫu bệnh (khi có
                                                        sinh thiết):
                                                    </label>
                                                    <span
                                                        style="white-space: pre-line"
                                                    >
                                                        {{ emrsummary.anapath }}
                                                    </span>
                                                </div>

                                                <div class="modal-body">
                                                    <label>Mẫu bệnh án: </label>
                                                    <span
                                                        style="white-space: pre-line"
                                                    >
                                                        {{
                                                            emrsummary.emr_type
                                                        }}
                                                    </span>
                                                </div>

                                                <div class="modal-body">
                                                    <label
                                                        >Nguyên nhân tử vong:
                                                    </label>
                                                    <span
                                                        style="white-space: pre-line"
                                                    >
                                                        {{
                                                            emrsummary.death_reason_name
                                                        }}
                                                    </span>
                                                </div>

                                                <div class="modal-body">
                                                    <label
                                                        >Loại tử vong:
                                                    </label>
                                                    <span
                                                        style="white-space: pre-line"
                                                    >
                                                        {{
                                                            emrsummary.death_type
                                                        }}
                                                    </span>
                                                </div>

                                                <div class="modal-body">
                                                    <label
                                                        >Thời điểm tử vong:
                                                    </label>
                                                    {{
                                                        emrsummary.death_time
                                                            | humanDate
                                                    }}
                                                    <br />
                                                    {{
                                                        emrsummary.death_time_range
                                                    }}
                                                </div>

                                                <div class="modal-body">
                                                    <label
                                                        >Chẩn đoán giải phẫu tử
                                                        thi:
                                                    </label>
                                                    <span
                                                        style="white-space: pre-line"
                                                    >
                                                        {{
                                                            emrsummary.autopsy_diagnosis_name
                                                        }}
                                                    </span>
                                                </div>

                                                <div class="modal-body">
                                                    <label
                                                        >Số lượng hồ sơ, phim,
                                                        ảnh:
                                                    </label>
                                                    <br />
                                                    + <b>X-Quang:</b>
                                                    {{ emrsummary.dx_count }}
                                                    <br />
                                                    + <b>Cắt lớp vi tính:</b>
                                                    {{ emrsummary.ct_count }}
                                                    <br />
                                                    + <b>Siêu âm:</b>
                                                    {{ emrsummary.us_count }}
                                                    <br />
                                                    + <b>Xét nghiệm:</b>
                                                    {{ emrsummary.lab_count }}
                                                    <br />
                                                    + <b>Khác:</b>
                                                    {{ emrsummary.other_count }}
                                                    <br />
                                                    + <b>Tổng:</b>
                                                    {{ emrsummary.total_count }}
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
                                                @click="editModal(emrsummary)"
                                                class="text-primary"
                                            >
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button
                                                @click="
                                                    deleteEmrsummary(
                                                        emrsummary.id
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
                            <!--emrsummary biodata Modal -->
                            <div
                                class="modal fade"
                                id="editemrsummary"
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
                                                    updateEmrsummary
                                                "
                                                id="add-emrsummary"
                                            >
                                                <div class="form-group">
                                                    <label
                                                        >Phương pháp điều
                                                        trị</label
                                                    >
                                                    <textarea
                                                        v-model="form.therapy"
                                                        type="text"
                                                        rows="5"
                                                        name="therapy"
                                                        placeholder="Phương pháp điều trị"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'therapy'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="therapy"
                                                    ></has-error>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        >Tình trạng người bệnh
                                                        khi ra viện</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.patient_condition
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="patient_condition"
                                                        placeholder="Tình trạng người bệnh khi ra viện"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'patient_condition'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="patient_condition"
                                                    ></has-error>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        >Hướng điều trị và các
                                                        chế độ tiếp theo</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.therapy_plan
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="therapy_plan"
                                                        placeholder="Hướng điều trị và các chế độ tiếp theo"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'therapy_plan'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="therapy_plan"
                                                    ></has-error>
                                                </div>

                                                <div class="form-group">
                                                    <label>Xuất viện</label>
                                                    <textarea
                                                        v-model="
                                                            form.discharge_type
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="discharge_type"
                                                        placeholder="Xuất viện"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'discharge_type'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="discharge_type"
                                                    ></has-error>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        >Thời điểm xuất
                                                        viện</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.discharge_time
                                                        "
                                                        type="datetime-local"
                                                        rows="5"
                                                        name="discharge_time"
                                                        placeholder="Xuất viện"
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

                                                <div class="form-group">
                                                    <label>Bệnh chính</label>
                                                    <textarea
                                                        v-model="
                                                            form.discharge_maindisease_name
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="discharge_maindisease_name"
                                                        placeholder="Bệnh chính"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'discharge_maindisease_name'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="discharge_maindisease_name"
                                                    ></has-error>
                                                </div>

                                                <div class="form-group">
                                                    <label>Bệnh kèm theo</label>
                                                    <textarea
                                                        v-model="
                                                            form.discharge_subdisease_name
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="discharge_subdisease_name"
                                                        placeholder="Bệnh kèm theo"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'discharge_subdisease_name'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="discharge_subdisease_name"
                                                    ></has-error>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        >Kết quả điều trị</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.treatment_result
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="treatment_result"
                                                        placeholder="Kết quả điều trị"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'treatment_result'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="treatment_result"
                                                    ></has-error>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        >Giải phẫu bệnh (khi có
                                                        sinh thiết)</label
                                                    >
                                                    <textarea
                                                        v-model="form.anapath"
                                                        type="text"
                                                        rows="5"
                                                        name="anapath"
                                                        placeholder="Giải phẫu bệnh (khi có sinh thiết)"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'anapath'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="anapath"
                                                    ></has-error>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        >Mẫu bệnh án được sử
                                                        dụng</label
                                                    >
                                                    <textarea
                                                        v-model="form.emr_type"
                                                        type="text"
                                                        rows="5"
                                                        name="emr_type"
                                                        placeholder="Mẫu bệnh án được sử dụng"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'emr_type'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="emr_type"
                                                    ></has-error>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        >Nguyên nhân tử
                                                        vong</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.death_reason_name
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="death_reason_name"
                                                        placeholder="Nguyên nhân tử vong"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'death_reason_name'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="death_reason_name"
                                                    ></has-error>
                                                </div>

                                                <div class="form-group">
                                                    <label>Loại tử vong</label>
                                                    <textarea
                                                        v-model="
                                                            form.death_type
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="death_type"
                                                        placeholder="Loại tử vong"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'death_type'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="death_type"
                                                    ></has-error>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        >Thời điểm tử
                                                        vong</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.death_time
                                                        "
                                                        type="datetime-local"
                                                        rows="5"
                                                        name="death_time"
                                                        placeholder="Thời điểm tử vong"
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

                                                <div class="form-group">
                                                    <label
                                                        >Chẩn đoán giải phẫu tử
                                                        thi</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.autopsy_diagnosis_name
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="autopsy_diagnosis_name"
                                                        placeholder="Chẩn đoán giải phẫu tử thi"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'autopsy_diagnosis_name'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="autopsy_diagnosis_name"
                                                    ></has-error>
                                                </div>

                                                <div class="form-group">
                                                    <label
                                                        >Số lượng hồ sơ, phim,
                                                        ảnh</label
                                                    >
                                                    <span>
                                                        <b>+ X-Quang</b>
                                                        <input
                                                            v-model="
                                                                form.dx_count
                                                            "
                                                            type="text"
                                                            rows="5"
                                                            name="dx_count"
                                                            placeholder="Số lượng hồ sơ, phim, ảnh"
                                                            class="form-control"
                                                            :class="{
                                                                'is-invalid': form.errors.has(
                                                                    'dx_count'
                                                                )
                                                            }"
                                                        />
                                                        <has-error
                                                            :form="form"
                                                            field="dx_count"
                                                        ></has-error>
                                                    </span>

                                                    <span>
                                                        <b>+ Cắt lớp vi tính</b>
                                                        <input
                                                            v-model="
                                                                form.ct_count
                                                            "
                                                            type="text"
                                                            rows="5"
                                                            name="ct_count"
                                                            placeholder="Số lượng hồ sơ, phim, ảnh"
                                                            class="form-control"
                                                            :class="{
                                                                'is-invalid': form.errors.has(
                                                                    'ct_count'
                                                                )
                                                            }"
                                                        />
                                                        <has-error
                                                            :form="form"
                                                            field="ct_count"
                                                        ></has-error>
                                                    </span>

                                                    <span>
                                                        <b>+ Siêu âm</b>
                                                        <input
                                                            v-model="
                                                                form.us_count
                                                            "
                                                            type="text"
                                                            rows="5"
                                                            name="us_count"
                                                            placeholder="Số lượng hồ sơ, phim, ảnh"
                                                            class="form-control"
                                                            :class="{
                                                                'is-invalid': form.errors.has(
                                                                    'us_count'
                                                                )
                                                            }"
                                                        />
                                                        <has-error
                                                            :form="form"
                                                            field="us_count"
                                                        ></has-error>
                                                    </span>

                                                    <span>
                                                        <b>+ Xét nghiệm</b>
                                                        <input
                                                            v-model="
                                                                form.lab_count
                                                            "
                                                            type="text"
                                                            rows="5"
                                                            name="lab_count"
                                                            placeholder="Số lượng hồ sơ, phim, ảnh"
                                                            class="form-control"
                                                            :class="{
                                                                'is-invalid': form.errors.has(
                                                                    'lab_count'
                                                                )
                                                            }"
                                                        />
                                                        <has-error
                                                            :form="form"
                                                            field="lab_count"
                                                        ></has-error>
                                                    </span>

                                                    <span>
                                                        <b>+ Khác</b>
                                                        <input
                                                            v-model="
                                                                form.other_count
                                                            "
                                                            type="text"
                                                            rows="5"
                                                            name="other_count"
                                                            placeholder="Số lượng hồ sơ, phim, ảnh"
                                                            class="form-control"
                                                            :class="{
                                                                'is-invalid': form.errors.has(
                                                                    'other_count'
                                                                )
                                                            }"
                                                        />
                                                        <has-error
                                                            :form="form"
                                                            field="other_count"
                                                        ></has-error>
                                                    </span>

                                                    <span>
                                                        <b>+ Tổng:</b>
                                                        <input
                                                            v-model="
                                                                form.total_count
                                                            "
                                                            type="text"
                                                            rows="5"
                                                            name="total_count"
                                                            placeholder="Số lượng hồ sơ, phim, ảnh"
                                                            class="form-control"
                                                            :class="{
                                                                'is-invalid': form.errors.has(
                                                                    'total_count'
                                                                )
                                                            }"
                                                        />
                                                        <has-error
                                                            :form="form"
                                                            field="total_count"
                                                        ></has-error>
                                                    </span>
                                                </div>

                                                <center>
                                                    <button
                                                        type="submit"
                                                        class="updateemrsummary btn-block btn btn-info"
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
                                <th>Mã bệnh án</th>
                                <th>Tên bệnh nhân</th>
                                <th>Thông tin bệnh nhân</th>
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
            isHidden: false,
            emrsummaries: {},
            form: new Form({
                id: "",
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
                autopsy: "",

                dx_count: "",
                ct_count: "",
                us_count: "",
                lab_count: "",
                other_count: "",
                total_count: "",

                reason_of_stroke_complication: "",

                emr_type: ""
            })
        };
    },
    methods: {
        loadEmrsummaries() {
            // this.loading = true;
            axios.get("api/emrsummary").then(response => {
                setTimeout(function() {
                    NProgress.done();
                }, 1000);
                this.emrsummaries = response.data;
            });
        },
        // loadVitals(){
        //      axios.get('api/vital').then(({data}) => (this.vitals = data));
        // },
        editModal(emrsummary) {
            $("#editemrsummary").modal("show");
            this.form.fill(emrsummary);
        },
        deleteEmrsummary(id) {
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
                        .delete("api/emrsummary/" + id)
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
        updateEmrsummary() {
            $(".updateemrsummary").html(
                '<i class="fa fa-spin fa-spinner"></i>'
            );
            this.form
                .put("api/emrsummary/" + this.form.id)
                .then(() => {
                    Fire.$emit("afterAction");
                    $("#editemrsummary").modal("hide");
                    toast.fire({
                        type: "success",
                        title: "Sinh hiệu được cập nhật thành công!"
                    });
                    $(".updateemrsummary").html("Add Patient");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng"
                    });
                    $(".updateemrsummary").html("Add Patient");
                });
        }
    },
    mounted() {
        console.log("Component mounted.");
        this.loadEmrsummaries();
        Fire.$on("afterAction", () => {
            this.loadEmrsummaries();
        });
    }
};
</script>
