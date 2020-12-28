<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"></div>
                    <div class="card-body">
                        <form
                            @submit.prevent="addTreatment()"
                            id="add-treatment"
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
                                    <b>Nơi điều trị</b>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.department"
                                                type="text"
                                                name="department"
                                                placeholder="Nhập khoa điều trị"
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
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.room"
                                                type="text"
                                                name="room"
                                                placeholder="Nhập phòng điều trị"
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
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.bed_id"
                                                type="text"
                                                name="bed_id"
                                                placeholder="Nhập giường điều trị"
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
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="form.reason_count"
                                                type="text"
                                                name="reason_count"
                                                placeholder="Số lần nhập viện do bệnh này?"
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
                                    </td>
                                </tr>
                                <tr>
                                    <label for="chandoan"
                                        >Chẩn đoán khi vào khoa điều trị</label
                                    >
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="form.disease_main"
                                                type="text"
                                                name="disease_main"
                                                placeholder="Bệnh chính"
                                                rows="2"
                                                cols="10"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'disease_main'
                                                    )
                                                }"
                                            >
                                            </textarea>
                                            <has-error
                                                :form="form"
                                                field="disease_main"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="form.disease_sub"
                                                type="text"
                                                name="disease_sub"
                                                placeholder="Bệnh kèm theo (nếu có)"
                                                rows="2"
                                                cols="10"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'disease_sub'
                                                    )
                                                }"
                                            >
                                            </textarea>
                                            <has-error
                                                :form="form"
                                                field="disease_sub"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="
                                                    form.disease_difference
                                                "
                                                type="text"
                                                name="disease_difference"
                                                placeholder="Phân biệt"
                                                rows="2"
                                                cols="10"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'disease_difference'
                                                    )
                                                }"
                                            >
                                            </textarea>
                                            <has-error
                                                :form="form"
                                                field="disease_difference"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <label>Tiên lượng</label>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="form.disease_prognosis"
                                                type="text"
                                                name="disease_prognosis"
                                                placeholder="Tiên lượng"
                                                rows="2"
                                                cols="10"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'disease_prognosis'
                                                    )
                                                }"
                                            >
                                            </textarea>
                                            <has-error
                                                :form="form"
                                                field="disease_prognosis"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <label>Hướng điều trị</label>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="form.disease_plan"
                                                type="text"
                                                name="disease_plan"
                                                placeholder="Hướng điều trị"
                                                rows="2"
                                                cols="10"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'disease_plan'
                                                    )
                                                }"
                                            >
                                            </textarea>
                                            <has-error
                                                :form="form"
                                                field="disease_plan"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <button
                                                type="submit"
                                                class="treatment btn-block btn btn-info"
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
            patients: {},
            form: new Form({
                patient_id: "",
                disease_main: "",
                disease_sub: "",
                disease_difference: "",
                disease_prognosis: "",
                disease_plan: "",
                department: "",
                room: "",
                bed_id: "",
                reason_count: ""
            })
        };
    },
    methods: {
        addTreatment(id) {
            $(".treatment").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .post("api/treatment")
                .then(() => {
                    toast.fire({
                        type: "success",
                        title: "Thêm thành công!"
                    });
                    $(".treatment").html("Thêm thông tin");
                    $("#add-treatment").trigger("reset");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng!"
                    });
                    $(".treatment").html("Thêm thông tin");
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
        }
    },
    mounted() {
        console.log("Component mounted.");
        this.loadPatients();
    }
};
</script>
