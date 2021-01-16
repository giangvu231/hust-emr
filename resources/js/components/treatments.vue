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
                patient_id: ""
            })
        };
    },
    methods: {
        loadTreatments() {
            // this.loading = true;
            axios.get("api/treatment").then(response => {
                setTimeout(function() {
                    NProgress.done();
                }, 1000);
                this.treatments = response.data;
                console.log(response);
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
