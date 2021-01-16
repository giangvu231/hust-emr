<template>
    <div class="container">
        <div>
            <router-link
                to="/add-vital"
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
                        <tbody>
                            <tr v-for="vital in vitals" :key="vital.id">
                                <td>{{ vital.patient.unique_id }}</td>
                                <td>
                                    {{ vital.patient.full_name }}
                                </td>
                                <td>{{ vital.temperature }}</td>
                                <td>
                                    {{ vital.systolic }}/{{ vital.diastolic }}
                                </td>
                                <td>{{ vital.height }}</td>
                                <td>{{ vital.weight }}</td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-toggle="modal"
                                        :data-target="
                                            '#' + vital.patient.unique_id
                                        "
                                    >
                                        Hiển thị
                                    </button>

                                    <div
                                        class="modal fade"
                                        :id="vital.patient.unique_id"
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
                                                        Thông tin khám bệnh
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
                                                        <b>Nhóm máu: </b
                                                        >{{ vital.blood_group }}
                                                    </p>
                                                    <p>
                                                        <b>Nội dung khám: </b
                                                        >{{ vital.note }}
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
                                                @click="editModal(vital)"
                                                class="text-primary"
                                            >
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-6">
                                            <button
                                                @click="deleteVital(vital.id)"
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
                                id="editvital"
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
                                                @submit.prevent="updateVital"
                                                id="add-biodata"
                                            >
                                                <div class="form-group">
                                                    <!-- <label>Temperature</label>                        -->
                                                    <label
                                                        >Thân nhiệt (°C)</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.temperature
                                                        "
                                                        type="text"
                                                        name="temperature"
                                                        placeholder="Thêm nhiệt độ (°C)"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'temperature'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="temperature"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        >Chiều cao (cm)</label
                                                    >
                                                    <input
                                                        v-model="form.height"
                                                        type="text"
                                                        name="height"
                                                        placeholder="Thêm Chiều cao (cm)"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'height'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="height"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label>Cân nặng (kg)</label>
                                                    <input
                                                        v-model="form.weight"
                                                        type="text"
                                                        name="weight"
                                                        placeholder="Thêm Cân nặng (kg)"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'weight'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="weight"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        >Mạch (lần/phút)</label
                                                    >
                                                    <input
                                                        v-model="form.pulse"
                                                        type="text"
                                                        name="pulse"
                                                        placeholder="Thêm Mạch (lần/phút)"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'pulse'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="pulse"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nhóm máu</label>
                                                    <input
                                                        v-model="
                                                            form.blood_group
                                                        "
                                                        type="text"
                                                        name="blood_group"
                                                        placeholder="Thêm nhóm máu (O, A, B, AB)"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'blood_group'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="blood_group"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        >Huyết áp tâm thu
                                                        (mmHg)</label
                                                    >
                                                    <input
                                                        v-model="form.systolic"
                                                        type="text"
                                                        name="systolic"
                                                        placeholder="Thêm HA tâm thu (mmHg)"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'systolic'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="systolic"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        >Huyết áp tâm trương
                                                        (mmHg)</label
                                                    >
                                                    <input
                                                        v-model="form.diastolic"
                                                        type="text"
                                                        name="diastolic"
                                                        placeholder="Thêm HA tâm trương (mmHg)"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'diastolic'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="diastolic"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label for=""
                                                        >Nội dung khám</label
                                                    >
                                                    <textarea
                                                        v-model="form.note"
                                                        type="text"
                                                        name="note"
                                                        placeholder="Nội dung khám (ý thức, da niêm mạc, hệ thống mạch, tuyến giáp, vị trí, kích thước, số lượng, di động v.v...)"
                                                        cols="10"
                                                        rows="5"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'note'
                                                            )
                                                        }"
                                                    >
                                                    </textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="note"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        v-on:click="
                                                            isHidden = !isHidden
                                                        "
                                                        >Phần dành cho Ngoại
                                                        Khoa</label
                                                    >
                                                    <textarea
                                                        v-if="isHidden"
                                                        v-model="
                                                            form.NgoaiKhoaNote
                                                        "
                                                        type="text"
                                                        name="NgoaiKhoaNote"
                                                        placeholder="Khám ngoại khoa"
                                                        cols="10"
                                                        rows="5"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'NgoaiKhoaNote'
                                                            )
                                                        }"
                                                    >
                                                    </textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="NgoaiKhoaNote"
                                                    ></has-error>
                                                </div>

                                                <center>
                                                    <!-- <button type="submit" class="updatevital btn-block btn btn-info" style="color:#fff;">Update Patient Vitals</button> -->
                                                    <button
                                                        type="submit"
                                                        class="updatevital btn-block btn btn-info"
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
            vitals: {},
            form: new Form({
                id: "",
                patient_id: "",
                temperature: "",
                height: "",
                weight: "",
                pulse: "",
                blood_group: "",
                note: "",
                NgoaiKhoaNote: ""
            })
        };
    },
    methods: {
        loadVitals() {
            // this.loading = true;
            axios.get("api/vital").then(response => {
                setTimeout(function() {
                    NProgress.done();
                }, 1000);
                this.vitals = response.data;
            });
        },
        // loadVitals(){
        //      axios.get('api/vital').then(({data}) => (this.vitals = data));
        // },
        editModal(vital) {
            $("#editvital").modal("show");
            this.form.fill(vital);
        },
        deleteVital(id) {
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
                        .delete("api/vital/" + id)
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
        updateVital() {
            $(".updatevital").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .put("api/vital/" + this.form.id)
                .then(() => {
                    Fire.$emit("afterAction");
                    $("#editvital").modal("hide");
                    toast.fire({
                        type: "success",
                        title: "Sinh hiệu được cập nhật thành công!"
                    });
                    $(".updatevital").html("Add Patient");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng"
                    });
                    $(".updatevital").html("Add Patient");
                });
        }
    },
    mounted() {
        console.log("Component mounted.");
        this.loadVitals();
        Fire.$on("afterAction", () => {
            this.loadVitals();
        });
    }
};
</script>
