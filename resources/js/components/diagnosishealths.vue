<template>
    <div class="container">
        <div>
            <router-link
                to="/add-diagnosishealth"
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
                                <th>Thông tin khám bệnh</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="diagnosishealth in diagnosishealths"
                                :key="diagnosishealth.id"
                            >
                                <td>{{ diagnosishealth.patient.unique_id }}</td>
                                <td>{{ diagnosishealth.patient.full_name }}</td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-toggle="modal"
                                        :data-target="
                                            '#' +
                                                diagnosishealth.patient
                                                    .unique_id
                                        "
                                    >
                                        Thông tin chi tiết
                                    </button>
                                    <div
                                        class="modal fade"
                                        :id="diagnosishealth.patient.unique_id"
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
                                                            diagnosishealth
                                                                .patient
                                                                .full_name
                                                        }}
                                                        -
                                                        {{
                                                            diagnosishealth
                                                                .patient
                                                                .unique_id
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Tuần hoàn: </b>
                                                        <br />
                                                        {{
                                                            diagnosishealth.diagnosis_tuanhoan
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Hô hấp: </b>
                                                        <br />
                                                        {{
                                                            diagnosishealth.diagnosis_hohap
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Tiêu hóa: </b>
                                                        <br />
                                                        {{
                                                            diagnosishealth.diagnosis_tieuhoa
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b
                                                            >Thận- Tiết niệu-
                                                            Sinh dục:
                                                        </b>
                                                        <br />
                                                        {{
                                                            diagnosishealth.diagnosis_than_tietnieu_sinhduc
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Thần Kinh: </b>
                                                        <br />
                                                        {{
                                                            diagnosishealth.diagnosis_thankinh
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Cơ- Xương- Khớp: </b>
                                                        <br />
                                                        {{
                                                            diagnosishealth.diagnosis_coxuongkhop
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Tai- Mũi- Họng: </b>
                                                        <br />
                                                        {{
                                                            diagnosishealth.diagnosis_taimuihong
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Răng- Hàm- Mặt: </b>
                                                        <br />
                                                        {{
                                                            diagnosishealth.diagnosis_ranghammat
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Mắt: </b>
                                                        <br />
                                                        {{
                                                            diagnosishealth.mat
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b
                                                            >Nội tiết, dinh
                                                            dưỡng và các bệnh lý
                                                            khác:
                                                        </b>
                                                        <br />
                                                        {{
                                                            diagnosishealth.diagnosis_noitiet_dinhduong_khac
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b
                                                            >Các triệu chứng và
                                                            hội chứng lâm sàng:
                                                        </b>
                                                        <br />
                                                        {{
                                                            diagnosishealth.diagnosis_syndrome
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
                                                @click="
                                                    editModal(diagnosishealth)
                                                "
                                                class="text-primary"
                                            >
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button
                                                @click="
                                                    deleteDiagnosishealth(
                                                        diagnosishealth.id
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
                            <!--Diagnosishealth biodata Modal -->
                            <div
                                class="modal fade"
                                id="editdiagnosishealth"
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
                                                    updateDiagnosishealth
                                                "
                                                id="add-diagnosishealth"
                                            >
                                                <div class="form-group">
                                                    <label
                                                        >Khám tuần hoàn</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.diagnosis_tuanhoan
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="diagnosis_tuanhoan"
                                                        placeholder="Khám tuần hoàn"
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

                                                <div class="form-group">
                                                    <label>Khám hô hấp</label>
                                                    <textarea
                                                        v-model="
                                                            form.diagnosis_hohap
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="diagnosis_hohap"
                                                        placeholder="Khám hô hấp"
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
                                                <div class="form-group">
                                                    <label>Khám tiêu hóa</label>
                                                    <textarea
                                                        v-model="
                                                            form.diagnosis_tieuhoa
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="diagnosis_tieuhoa"
                                                        placeholder="Khám tiêu hóa"
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
                                                <div class="form-group">
                                                    <label
                                                        >Khám Thận- Tiết niệu-
                                                        Sinh dục</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.diagnosis_than_tietnieu_sinhduc
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="diagnosis_than_tietnieu_sinhduc"
                                                        placeholder="Khám Thận- Tiết niệu- Sinh dục"
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
                                                <div class="form-group">
                                                    <label
                                                        >Khám Thần Kinh</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.diagnosis_thankinh
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="diagnosis_thankinh"
                                                        placeholder="Khám Thần Kinh"
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
                                                <div class="form-group">
                                                    <label
                                                        >Khám Cơ- Xương-
                                                        Khớp</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.diagnosis_coxuongkhop
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="diagnosis_coxuongkhop"
                                                        placeholder="Khám Cơ- Xương- Khớp"
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
                                                <div class="form-group">
                                                    <label
                                                        >Khám Tai- Mũi-
                                                        Họng</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.diagnosis_taimuihong
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="diagnosis_taimuihong"
                                                        placeholder="Khám Tai- Mũi- Họng"
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
                                                <div class="form-group">
                                                    <label
                                                        >Khám Răng- Hàm-
                                                        Mặt</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.diagnosis_ranghammat
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="diagnosis_ranghammat"
                                                        placeholder="Khám Răng- Hàm- Mặt"
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
                                                <div class="form-group">
                                                    <label>Khám Mắt</label>
                                                    <textarea
                                                        v-model="
                                                            form.diagnosis_mat
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="diagnosis_mat"
                                                        placeholder="Khám Mắt"
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
                                                <div class="form-group">
                                                    <label
                                                        >Khám Nội tiết, dinh
                                                        dưỡng và các bệnh lý
                                                        khác</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.diagnosis_noitiet_dinhduong_khac
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="diagnosis_noitiet_dinhduong_khac"
                                                        placeholder="Khám Nội tiết, dinh dưỡng và các bệnh lý khác"
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
                                                <div class="form-group">
                                                    <label
                                                        >Các triệu chứng và hội
                                                        chứng lâm sàng</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.diagnosis_syndrome
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="diagnosis_syndrome"
                                                        placeholder="Các triệu chứng và hội chứng lâm sàng"
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

                                                <center>
                                                    <button
                                                        type="submit"
                                                        class="updatediagnosishealth btn-block btn btn-info"
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
                                <th>Thông tin khám bệnh</th>
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
            diagnosishealths: {},
            form: new Form({
                id: "",
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
        loadDiagnosishealths() {
            // this.loading = true;
            axios.get("api/diagnosishealth").then(response => {
                setTimeout(function() {
                    NProgress.done();
                }, 1000);
                this.diagnosishealths = response.data;
            });
        },
        editModal(diagnosishealth) {
            $("#editdiagnosishealth").modal("show");
            this.form.fill(diagnosishealth);
        },
        deleteDiagnosishealth(id) {
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
                        .delete("api/diagnosishealth/" + id)
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
        updateDiagnosishealth() {
            $(".updatediagnosishealth").html(
                '<i class="fa fa-spin fa-spinner"></i>'
            );
            this.form
                .put("api/diagnosishealth/" + this.form.id)
                .then(() => {
                    Fire.$emit("afterAction");
                    $("#editdiagnosishealth").modal("hide");
                    toast.fire({
                        type: "success",
                        title: "Sinh hiệu được cập nhật thành công!"
                    });
                    $(".updatediagnosishealth").html("Add Patient");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng"
                    });
                    $(".updatediagnosishealth").html("Add Patient");
                });
        }
    },
    mounted() {
        console.log("Component mounted.");
        this.loadDiagnosishealths();
        Fire.$on("afterAction", () => {
            this.loadDiagnosishealths();
        });
    }
};
</script>
