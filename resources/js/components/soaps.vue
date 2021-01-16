<template>
    <div class="container">
        <div>
            <router-link
                to="/add-soap"
                type="button"
                class="btn btn-rounded btn-info"
                style="color:#fff;"
                >Thêm SOAP</router-link
            >
        </div>
        <br /><br />
        <div class="row justify-content-center">
            <div class="card" style="width:100%;">
                <div class="card-header">
                    <h3 class="card-title">Danh sách SOAP</h3>
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
                                <th>Bảng SOAP</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="soap in soaps" :key="soap.id">
                                <td>{{ soap.patient.unique_id }}</td>
                                <td>{{ soap.patient.full_name }}</td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-toggle="modal"
                                        :data-target="
                                            '#' + soap.patient.unique_id
                                        "
                                    >
                                        Bảng SOAP
                                    </button>
                                    <div
                                        class="modal fade"
                                        :id="soap.patient.unique_id"
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
                                                        Bảng SOAP
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
                                                        <b
                                                            >Dấu chứng chủ quan:
                                                        </b>
                                                        <br />
                                                        {{ soap.subjective }}
                                                    </p>
                                                    <p>
                                                        <b
                                                            >Dấu chứng khách
                                                            quan:
                                                        </b>
                                                        <br />
                                                        {{ soap.objective }}
                                                    </p>
                                                    <p>
                                                        <b>Hướng chẩn đoán: </b>
                                                        <br />
                                                        {{ soap.assessment }}
                                                    </p>
                                                    <p>
                                                        <b>Hướng điều trị: </b>
                                                        <br />
                                                        {{ soap.plan }}
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
                                                @click="editModal(soap)"
                                                class="text-primary"
                                            >
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button
                                                @click="deleteSoap(soap.id)"
                                                class="text-danger"
                                            >
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!--Soap biodata Modal -->
                            <div
                                class="modal fade"
                                id="editsoap"
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
                                                @submit.prevent="updateSoap"
                                                id="add-soap"
                                            >
                                                <div class="form-group">
                                                    <label
                                                        >Dấu chứng chủ
                                                        quan</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.subjective
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="subjective"
                                                        placeholder="Dấu chứng chủ quan"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'subjective'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="subjective"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        >Dấu chứng khách
                                                        quan</label
                                                    >
                                                    <textarea
                                                        v-model="form.objective"
                                                        type="text"
                                                        rows="5"
                                                        name="objective"
                                                        placeholder="Dấu chứng chủ quan"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'objective'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="objective"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        >Hướng chẩn đoán</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.assessment
                                                        "
                                                        type="text"
                                                        rows="5"
                                                        name="assessment"
                                                        placeholder="Hướng chẩn đoán"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'assessment'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="assessment"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        >Hướng điều trị</label
                                                    >
                                                    <textarea
                                                        v-model="form.plan"
                                                        type="text"
                                                        rows="5"
                                                        name="plan"
                                                        placeholder="Hướng điều trị"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'plan'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="plan"
                                                    ></has-error>
                                                </div>
                                                <center>
                                                    <button
                                                        type="submit"
                                                        class="updatesoap btn-block btn btn-info"
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
                                <th>Bảng SOAP</th>
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
            soaps: {},
            form: new Form({
                id: "",
                patient_id: "",
                subjective: "",
                objective: "",
                assessment: "",
                plan: ""
            })
        };
    },
    methods: {
        loadSoaps() {
            // this.loading = true;
            axios.get("api/soap").then(response => {
                setTimeout(function() {
                    NProgress.done();
                }, 1000);
                this.soaps = response.data;
            });
        },
        editModal(soap) {
            $("#editsoap").modal("show");
            this.form.fill(soap);
        },
        deleteSoap(id) {
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
                        .delete("api/soap/" + id)
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
        updateSoap() {
            $(".updatesoap").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .put("api/soap/" + this.form.id)
                .then(() => {
                    Fire.$emit("afterAction");
                    $("#editsoap").modal("hide");
                    toast.fire({
                        type: "success",
                        title: "Sinh hiệu được cập nhật thành công!"
                    });
                    $(".updatesoap").html("Add Patient");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng"
                    });
                    $(".updatesoap").html("Add Patient");
                });
        }
    },
    mounted() {
        console.log("Component mounted.");
        this.loadSoaps();
        Fire.$on("afterAction", () => {
            this.loadSoaps();
        });
    }
};
</script>
