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
                                <th>Mã bệnh nhân</th>
                                <th>Họ tên</th>
                                <th>Thân nhiệt (°C)</th>
                                <th>Huyết áp (mmHg)</th>
                                <th>Chiều cao (cm)</th>
                                <th>Cân nặng (kg)</th>
                                <th>Thông tin khám bệnh</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th>Mã bệnh nhân</th>
                                <th>Họ tên</th>
                                <th>Thân nhiệt (°C)</th>
                                <th>Huyết áp (mmHg)</th>
                                <th>Chiều cao (cm)</th>
                                <th>Cân nặng (kg)</th>
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
            isHidden: false,
            summaries: {},
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
        loadSummaries() {
            // this.loading = true;
            axios.get("api/patient").then(response => {
                setTimeout(function() {
                    NProgress.done();
                }, 1000);
                this.summaries = response.data;
            });
        },
        // loadVitals(){
        //      axios.get('api/vital').then(({data}) => (this.vitals = data));
        // },
        editModal(summary) {
            $("#editsummary").modal("show");
            this.form.fill(summary);
        },
        deleteSummary(id) {
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
                        .delete("api/summary/" + id)
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
        updateSummary() {
            $(".updatesummary").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .put("api/summary/" + this.form.id)
                .then(() => {
                    Fire.$emit("afterAction");
                    $("#editsummary").modal("hide");
                    toast.fire({
                        type: "success",
                        title: "Sinh hiệu được cập nhật thành công!"
                    });
                    $(".updatesummary").html("Add Patient");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng"
                    });
                    $(".updatesummary").html("Add Patient");
                });
        }
    },
    mounted() {
        console.log("Component mounted.");
        this.loadSummaries();
        Fire.$on("afterAction", () => {
            this.loadSummaries();
        });
    }
};
</script>
