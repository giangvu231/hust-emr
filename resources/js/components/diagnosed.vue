<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width:100%;">
                <div class="card-header">
                    <h3 class="card-title">Thông tin cận lâm sàng</h3>
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
                                <th>Chẩn đoán</th>
                                <th>Nhận xét</th>
                                <th>Triệu chứng</th>
                                <th>
                                    Yêu cầu <br />
                                    cận lâm sàng
                                </th>
                                <th>Yêu cầu thuốc</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="diagnose in diagnoses"
                                :key="diagnose.id"
                            >
                                <td>{{ diagnose.patient.unique_id }}</td>
                                <td>{{ diagnose.patient.full_name }}</td>
                                <td>{{ diagnose.diagnosis }}</td>
                                <td>{{ diagnose.comment }}</td>
                                <td>{{ diagnose.hospital.symptoms }}</td>
                                <td>
                                    <p v-if="diagnose.refer_lab == 1">
                                        Đã yêu cầu
                                    </p>
                                    <button
                                        v-else
                                        type="button"
                                        class="btn btn-primary"
                                        @click="toLab(diagnose)"
                                    >
                                        Yêu cầu xét nghiệm
                                    </button>
                                </td>
                                <td>
                                    <p v-if="diagnose.refer_pham == 1">
                                        Đã yêu cầu
                                    </p>
                                    <button
                                        v-else
                                        type="button"
                                        class="btn btn-primary"
                                        @click="toPham(diagnose)"
                                    >
                                        Yêu cầu thuốc
                                    </button>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button
                                                @click="editModal(diagnose)"
                                                class="text-primary"
                                            >
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button
                                                @click="
                                                    deleteDiagnosed(diagnose.id)
                                                "
                                                class="text-danger"
                                            >
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!-- refer to lab modal          -->
                            <div
                                class="modal fade"
                                id="tolab"
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
                                                Xác nhận
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
                                                @submit.prevent="referToLab"
                                                id="edit-diagnoses"
                                            >
                                                <div class="form-group">
                                                    <input
                                                        style="width: 100%;"
                                                        placeholder="Yêu cầu xét nghiệm"
                                                        type="text"
                                                        v-model="searchLab"
                                                        @keyup="searchForLab()"
                                                    />
                                                    <select
                                                        @mouseover="
                                                            searchForLab()
                                                        "
                                                        v-model="form.lab_id"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'lab_id'
                                                            )
                                                        }"
                                                        name="lab_id"
                                                    >
                                                        <option
                                                            disabled
                                                            selected
                                                            value=""
                                                            >Yêu cầu xét
                                                            nghiệm</option
                                                        >
                                                        <option
                                                            v-for="searchLab in searchLabs"
                                                            :key="searchLab.id"
                                                            :value="
                                                                searchLab.id
                                                            "
                                                        >
                                                            {{ searchLab.code }}
                                                            -
                                                            {{ searchLab.name }}
                                                        </option>
                                                    </select>
                                                    <has-error
                                                        :form="form"
                                                        field="lab_id"
                                                    ></has-error>
                                                </div>
                                                <input
                                                    v-model="form.refer_lab"
                                                    :value="1"
                                                    type="radio"
                                                    name="refer_lab"
                                                />
                                                Xác nhận tác vụ trước
                                                <center>
                                                    <button
                                                        type="submit"
                                                        class="tolab btn-block btn btn-info"
                                                        style="color:#fff;"
                                                    >
                                                        Yêu cầu xét nghiệm
                                                    </button>
                                                </center>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
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

                            <!-- refer to pham modal          -->
                            <div
                                class="modal fade"
                                id="topham"
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
                                            <!-- <h5 class="modal-title" id="exampleModalLongTitle">Confirm</h5> -->
                                            <h5
                                                class="modal-title"
                                                id="exampleModalLongTitle"
                                            >
                                                Xác nhận
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
                                                @submit.prevent="referToPham"
                                                id="edit-diagnoses"
                                            >
                                                <!-- <input v-model="form.refer_pham"
                                  :value="1"
                                  type="radio"
                                  name="refer_pham" /> Confirm Action First -->
                                                <input
                                                    v-model="form.refer_pham"
                                                    :value="1"
                                                    type="radio"
                                                    name="refer_pham"
                                                />
                                                Xác nhận tác vụ trước
                                                <center>
                                                    <!-- <button type="submit" class="topham btn-block btn btn-info" style="color:#fff;">Refer to Pharmacy</button> -->
                                                    <button
                                                        type="submit"
                                                        class="topham btn-block btn btn-info"
                                                        style="color:#fff;"
                                                    >
                                                        Yêu cầu thuốc
                                                    </button>
                                                </center>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
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
                            <!--Biodata Modal -->
                            <div
                                class="modal fade"
                                id="editdiagnoses"
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
                                            <!-- <h5 class="modal-title" id="exampleModalLongTitle">Edit Patient Diagnoses</h5> -->
                                            <h5
                                                class="modal-title"
                                                id="exampleModalLongTitle"
                                            >
                                                Sửa thông tin chẩn đoán của bệnh
                                                nhân
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
                                                    updateDiagnoses
                                                "
                                                id="edit-diagnoses"
                                            >
                                                <div class="form-group">
                                                    <!-- <label for="Diadnoses"> Edit Diagnosis</label> -->
                                                    <label for="Diadnoses"
                                                        >Sửa chẩn đoán</label
                                                    >
                                                    <textarea
                                                        v-model="form.diagnosis"
                                                        placeholder="Chẩn đoán"
                                                        name="diagnosis"
                                                        id=""
                                                        cols="10"
                                                        rows="5"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'diagnosis'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="diagnosis"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label for="comment">Edit Comment</label>                        -->
                                                    <label for="comment"
                                                        >Sửa nhận xét</label
                                                    >
                                                    <input
                                                        v-model="form.comment"
                                                        type="text"
                                                        name="comment"
                                                        placeholder="Nhận xét"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'comment'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="comment"
                                                    ></has-error>
                                                </div>
                                                <center>
                                                    <!-- <button type="submit" class="updatediagnoses btn-block btn btn-info" style="color:#fff;">Update Patient Diagnoses</button> -->
                                                    <button
                                                        type="submit"
                                                        class="updatediagnoses btn-block btn btn-info"
                                                        style="color:#fff;"
                                                    >
                                                        Cập nhật chẩn đoán
                                                    </button>
                                                </center>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
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
                            <!-- <tr>
                <th>Unique ID</th>
                <th>Name</th>
                <th>Dianoses Details</th>
                <th>Doctor Comment</th>
                <th>Symtoms</th>
                <th>Refer to Lab.</th>
                <th>Refer to Pharm.</th>
                <th>Action</th>
                </tr> -->
                            <tr>
                                <th>Mã bệnh án</th>
                                <th>Họ tên</th>
                                <th>Chẩn đoán</th>
                                <th>Nhận xét</th>
                                <th>Triệu chứng</th>
                                <th>
                                    Yêu cầu <br />
                                    cận lâm sàng
                                </th>
                                <th>Yêu cầu thuốc</th>
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
            searchLab: "",
            searchLabs: [],
            diagnoses: {},
            form: new Form({
                id: "",
                diagnosis: "",
                comment: "",
                refer_lab: "",
                refer_pham: "",
                lab_id: "",
                lab_code: "",
                lab_name: ""
            })
        };
    },
    methods: {
        LoadDiagnoses() {
            // this.loading = true;
            axios.get("api/diagnose").then(response => {
                setTimeout(function() {
                    NProgress.done();
                }, 1000);
                this.diagnoses = response.data;
            });
        },
        // LoadDiagnoses(){
        //      axios.get('api/diagnose').then(({data}) => (this.diagnoses = data));
        // },
        editModal(diagnose) {
            $("#editdiagnoses").modal("show");
            this.form.fill(diagnose);
        },
        toLab(diagnose) {
            $("#tolab").modal("show");
            this.form.fill(diagnose);
        },
        toPham(diagnose) {
            $("#topham").modal("show");
            this.form.fill(diagnose);
        },
        deleteDiagnosed(id) {
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
                        .delete("api/diagnose/" + id)
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
        updateDiagnoses() {
            $(".updatediagnoses").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .put("api/diagnose/" + this.form.id)
                .then(() => {
                    Fire.$emit("afterAction");
                    $("#editdiagnoses").modal("hide");
                    toast.fire({
                        type: "success",
                        title: "Cập nhật thông tin chẩn đoán thành công!"
                    });
                    $(".updatediagnoses").html("Update Patient Diagnoses");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng!"
                    });
                    $(".updatediagnoses").html("Update Patient Diagnoses");
                });
        },
        referToLab() {
            $(".tolab").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .put("api/diagnose/" + this.form.id)
                .then(() => {
                    Fire.$emit("afterAction");
                    $("#tolab").modal("hide");
                    toast.fire({
                        type: "success",
                        title: "Đã yêu cầu xét nghiệm"
                    });
                    $(".tolab").html("Yêu cầu xét nghiệm");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Đã xảy ra lỗi!"
                    });
                    $(".tolab").html("Yêu cầu xét nghiệm");
                });
        },
        referToPham() {
            $(".topham").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .put("api/diagnose/" + this.form.id)
                .then(() => {
                    Fire.$emit("afterAction");
                    $("#topham").modal("hide");
                    toast.fire({
                        type: "success",
                        title: "Đã yêu cầu thuốc!"
                    });
                    $(".topham").html("Yêu cầu thuốc");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Đã xảy ra lỗi!"
                    });
                    $(".topham").html("Yêu cầu thuốc");
                });
        },
        searchForLab() {
            axios
                .post("/searchlab", {
                    name: this.searchLab
                })
                .then(response => {
                    this.searchLabs = response.data;
                })
                .catch(() => {});
        }
    },
    mounted() {
        console.log("Component mounted.");
        this.LoadDiagnoses();
        Fire.$on("afterAction", () => {
            this.LoadDiagnoses();
        });
    }
};
</script>
