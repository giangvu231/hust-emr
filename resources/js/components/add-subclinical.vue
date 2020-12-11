<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nhap thong tin can lam sang</div>
                    <div class="card-body">
                        <form
                            @submit.prevent="addSubclinical()"
                            id="add-subclinical"
                        >
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
                                        >{{ patient.full_name }}</option
                                    >
                                </select>
                                <has-error
                                    :form="form"
                                    field="patient_id"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.lab_order"
                                    type="text"
                                    name="lab_order"
                                    placeholder="Chi dinh xet nghiem"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'lab_order'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="lab_order"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.lab_result"
                                    type="text"
                                    name="lab_result"
                                    placeholder="Ket qua xet nghiem"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'lab_result'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="lab_result"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.imaging_order"
                                    type="text"
                                    name="imaging_order"
                                    placeholder="Chi dinh chan doan hinh anh"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'imaging_order'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="imaging_order"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.imaging_result"
                                    type="text"
                                    name="imaging_result"
                                    placeholder="Ket qua chan doan hinh anh"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'imaging_result'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="imaging_result"
                                ></has-error>
                            </div>

                            <center>
                                <button
                                    type="submit"
                                    class="subclinical btn-block btn btn-info"
                                    style="color:#fff;"
                                >
                                    Thêm thông tin cận lâm sàng
                                </button>
                            </center>
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
                lab_order: "",
                lab_result: "",
                imaging_order: "",
                imaging_result: ""
            })
        };
    },
    methods: {
        addSubclinical(id) {
            $(".subclinical").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .post("api/subclinical")
                .then(() => {
                    toast.fire({
                        type: "success",
                        title: "Thêm thành công!"
                    });
                    $(".subclinical").html("Thêm thông tin cận lâm sàng");
                    $("#add-subclinical").trigger("reset");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập chưa đúng!"
                    });
                    $(".subclinical").html("Thêm thông tin cận lâm sàng");
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
