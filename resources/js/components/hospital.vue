<template>
    <div class="container">
        <div>
            <router-link
                to="/add-hospital"
                type="button"
                class="btn btn-rounded btn-info"
                style="color:#fff;"
                >Thêm mới</router-link
            >
        </div>
        <br /><br />
        <div class="row justify-content-center">
            <div class="card" style="width:100%;">
                <div class="card-header">
                    <h3 class="card-title">Tiền sử của bệnh nhân</h3>
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
                                <th>Họ tên</th>
                                <th>Ngày đến viện</th>
                                <th>Ngày nhập viện</th>
                                <th>Ngày thanh toán</th>
                                <th>Thu ngân</th>
                                <th>Thông tin đầy đủ</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="hospital in hospitals"
                                :key="hospital.id"
                            >
                                <td>{{ hospital.patient.unique_id }}</td>
                                <td>
                                    {{ hospital.patient.full_name }}
                                </td>
                                <td>
                                    {{ hospital.date_attented | humanDate }}
                                </td>
                                <td>
                                    {{ hospital.date_admitted | humanDate }}
                                </td>
                                <td>
                                    {{ hospital.date_discharged | humanDate }}
                                </td>
                                <td>{{ hospital.discharged_to }}</td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-toggle="modal"
                                        :data-target="
                                            '#' + hospital.patient.unique_id
                                        "
                                    >
                                        Hiển thị
                                    </button>

                                    <div
                                        class="modal fade"
                                        :id="hospital.patient.unique_id"
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
                                                        Thêm thông tin
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
                                                        <b>Ngày đến viện: </b
                                                        >{{
                                                            hospital.date_attented
                                                                | humanDate
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Ngày nhập viện: </b
                                                        >{{
                                                            hospital.date_admitted
                                                                | humanDate
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Nguyên nhân: </b
                                                        >{{ hospital.reason }}
                                                    </p>
                                                    <p>
                                                        <b>Vào ngày thứ: </b
                                                        >{{ hospital.reason }}
                                                    </p>
                                                    <p>
                                                        <b>Khoa đón tiếp: </b
                                                        >{{
                                                            hospital.admit_dept
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Nơi giới thiệu: </b
                                                        >{{
                                                            hospital.refer_dept
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Bệnh sử: </b
                                                        >{{ hospital.symptoms }}
                                                    </p>
                                                    <p>
                                                        <b>Bệnh sử: </b
                                                        >{{
                                                            hospital.comment_box
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Tiền sử bản thân: </b
                                                        >{{
                                                            hospital.disease_in
                                                        }}
                                                    </p>
                                                    <p>
                                                        <b>Tiền sử gia đình: </b
                                                        >{{
                                                            hospital.disease_out
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
                                                @click="editModal(hospital)"
                                                class="text-primary"
                                            >
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button
                                                @click="
                                                    deleteHospital(hospital.id)
                                                "
                                                class="text-danger"
                                            >
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!--Biodata Modal -->
                            <div
                                class="modal fade"
                                id="edithospital"
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
                                            <!-- <h5 class="modal-title" id="exampleModalLongTitle">Edit Patient Hospital History</h5> -->
                                            <h5
                                                class="modal-title"
                                                id="exampleModalLongTitle"
                                            >
                                                Sửa lịch sử khám
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
                                                @submit.prevent="updateHospital"
                                                id="edit-hospital"
                                            >
                                                <div class="form-group">
                                                    <!-- <label>Enter Date Attented</label>                         -->
                                                    <label
                                                        >Nhập ngày có mặt</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.date_attented
                                                        "
                                                        type="date"
                                                        name="date_attented"
                                                        placeholder="Enter Date Attented"
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
                                                <div class="form-group">
                                                    <!-- <label>Enter Date Admitted</label>   -->
                                                    <label
                                                        >Điền ngày nhập
                                                        viện</label
                                                    >

                                                    <input
                                                        v-model="
                                                            form.date_admitted
                                                        "
                                                        type="date"
                                                        name="date_admitted"
                                                        placeholder="Enter Date Admitted"
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
                                                <div class="form-group">
                                                    <label>Khoa đón tiếp</label>
                                                    <select
                                                        v-model="
                                                            form.admit_dept
                                                        "
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'admit_dept'
                                                            )
                                                        }"
                                                        name="admit_dept"
                                                    >
                                                        <option
                                                            value="nul"
                                                            style="font-weight:700;"
                                                            >Khoa đón
                                                            tiếp</option
                                                        >
                                                        <option value="Cấp cứu"
                                                            >1. Cấp cứu</option
                                                        >
                                                        <option value="KKB"
                                                            >2. KKB</option
                                                        >
                                                        <option
                                                            value="Khoa điều trị"
                                                            >3. Khoa điều
                                                            trị</option
                                                        >
                                                    </select>
                                                    <has-error
                                                        :form="form"
                                                        field="admit_dept"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        >Nơi giới thiệu</label
                                                    >
                                                    <select
                                                        v-model="
                                                            form.refer_dept
                                                        "
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'refer_dept'
                                                            )
                                                        }"
                                                        name="refer_dept"
                                                    >
                                                        <option
                                                            value="nul"
                                                            style="font-weight:700;"
                                                            >Khoa đón
                                                            tiếp</option
                                                        >
                                                        <option
                                                            value="Cơ quan Y tế"
                                                            >1. Cơ quan Y
                                                            tế</option
                                                        >
                                                        <option value="Tự đến"
                                                            >2. Tự đến</option
                                                        >
                                                        <option value="Khác"
                                                            >3. Khác</option
                                                        >
                                                    </select>
                                                    <has-error
                                                        :form="form"
                                                        field="refer_dept"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        ><b
                                                            >Nguyên nhân vào
                                                            viện</b
                                                        ></label
                                                    >
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
                                                <div class="form-group">
                                                    <label
                                                        >Vào ngày thứ bao nhiêu
                                                        của bênh?</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.reason_date
                                                        "
                                                        placeholder="Vào ngày thứ bao nhiêu của bệnh?"
                                                        name="reason_date"
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
                                                <div class="form-group">
                                                    <label
                                                        >Các triệu chứng</label
                                                    >
                                                    <textarea
                                                        v-model="form.symptoms"
                                                        placeholder="Nhập triệu chứng"
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
                                                <div class="form-group">
                                                    <label>Nhận xét</label>
                                                    <textarea
                                                        v-model="
                                                            form.comment_box
                                                        "
                                                        placeholder="Nhập triệu chứng"
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
                                                <div class="form-group">
                                                    <label>Nhận xét</label>
                                                    <textarea
                                                        v-model="
                                                            form.disease_in
                                                        "
                                                        placeholder="Tiền sử cá nhân"
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
                                                <div class="form-group">
                                                    <label>Nhận xét</label>
                                                    <textarea
                                                        v-model="
                                                            form.disease_out
                                                        "
                                                        placeholder="Tiền sử gia đình"
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

                                                <center>
                                                    <button
                                                        type="submit"
                                                        class="updatehospital btn-block btn btn-info"
                                                        style="color:#fff;"
                                                    >
                                                        Cập nhật thông tin
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
                                <th>Họ tên</th>
                                <th>Ngày vào viện</th>
                                <th>Ngày nhập viện</th>
                                <th>Ngày thanh toán</th>
                                <th>Thu ngân</th>
                                <th>Thông tin đầy đủ</th>
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
            hospitals: {},
            form: new Form({
                id: "",
                patient_id: "",
                date_attented: "",
                date_admitted: "",
                symptoms: "",
                comment_box: "",
                admit_dept: "",
                refer_dept: "",
                reason: "",
                reason_date: "",
                disease_in: "",
                disease_out: ""
            })
        };
    },
    methods: {
        LoadHospitals() {
            // this.loading = true;
            axios.get("api/hospital").then(response => {
                setTimeout(function() {
                    NProgress.done();
                }, 1000);
                this.hospitals = response.data;
            });
        },
        // LoadHospitals(){
        //      axios.get('api/hospital').then(({data}) => (this.hospitals = data));
        // },
        editModal(hospital) {
            $("#edithospital").modal("show");
            this.form.fill(hospital);
        },
        deleteHospital(id) {
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
                        .delete("api/hospital/" + id)
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
        updateHospital() {
            $(".updatehospital").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .put("api/hospital/" + this.form.id)
                .then(() => {
                    Fire.$emit("afterAction");
                    $("#edithospital").modal("hide");
                    toast.fire({
                        type: "success",
                        title: "Cập nhật tiền sử bệnh nhân thành công!"
                    });
                    $(".updatehospital").html("Add Patient");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng!"
                    });
                    $(".updatehospital").html("Add Patient");
                });
        }
    },
    mounted() {
        console.log("Component mounted.");
        this.LoadHospitals();
        Fire.$on("afterAction", () => {
            this.LoadHospitals();
        });
    }
};
</script>
