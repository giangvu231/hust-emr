<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width:100%;">
                <div class="card-header">
                    <h3 class="card-title">Bệnh nhân đã chẩn đoán</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table
                        id="example1"
                        class="table table-bordered table-striped"
                    >
                        <thead>
                            <tr>
                                <th>Mã HSBA</th>
                                <th width="20%">Họ tên</th>
                                <th>Chẩn đoán</th>
                                <th>Nhận xét của bác sĩ</th>
                                <th>Các triệu chứng</th>
                                <th width="20%">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="diagnose in diagnoses"
                                :key="diagnose.id"
                            >
                                <td>{{ diagnose.patient.unique_id }}</td>
                                <td>
                                    {{ diagnose.patient.title }}
                                    {{ diagnose.patient.full_name }}
                                </td>
                                <td>{{ diagnose.diagnosis }}</td>
                                <td>{{ diagnose.comment }}</td>
                                <td>{{ diagnose.hospital.symptoms }}</td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-toggle="modal"
                                        :data-target="
                                            '#' + diagnose.patient.unique_id
                                        "
                                        id="lap-result"
                                    >
                                        Cập nhật kết quả xét nghiệm
                                    </button>

                                    <div
                                        class="modal fade"
                                        :id="diagnose.patient.unique_id"
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
                                                        Cập nhật kết quả xét
                                                        nghiệm
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
                                                            addDiagnosis
                                                        "
                                                        id="lab-test"
                                                    >
                                                        <input
                                                            v-model="
                                                                form.patient_id
                                                            "
                                                            :value="
                                                                diagnose.patient
                                                                    .id
                                                            "
                                                            type="radio"
                                                            name="patient_id"
                                                        />
                                                        Xác nhận trước

                                                        <input
                                                            v-model="
                                                                form.diagnose_id
                                                            "
                                                            :value="diagnose.id"
                                                            type="radio"
                                                            name="diagnose_id"
                                                        />
                                                        Xác nhận trước
                                                        <div class="form-group">
                                                            <input
                                                                style="width: 100%; padding: 12px 20px;
                                                        margin: 8px 0;
                                                        display: inline-block;
                                                        border: 1px solid #ccc;
                                                        border-radius: 4px;
                                                        box-sizing: border-box;"
                                                                placeholder="Yêu cầu xét nghiệm"
                                                                type="text"
                                                                v-model="
                                                                    searchLab
                                                                "
                                                                @keyup="
                                                                    searchForLab()
                                                                "
                                                            />
                                                            <select
                                                                @mouseover="
                                                                    searchForLab()
                                                                "
                                                                v-model="
                                                                    form.lab_id
                                                                "
                                                                class="form-control"
                                                                :class="{
                                                                    'is-invalid': form.errors.has(
                                                                        'lab_id'
                                                                    )
                                                                }"
                                                                name="lab_id"
                                                            >
                                                                <option
                                                                    value=""
                                                                    disabled
                                                                    selected
                                                                    >Chọn loại
                                                                    xét
                                                                    nghiệm</option
                                                                >
                                                                <option
                                                                    v-for="searchLab in searchLabs"
                                                                    :key="
                                                                        searchLab.id
                                                                    "
                                                                    :value="
                                                                        searchLab.id
                                                                    "
                                                                >
                                                                    {{
                                                                        searchLab.code
                                                                    }}
                                                                    -
                                                                    {{
                                                                        searchLab.name
                                                                    }}
                                                                </option>
                                                            </select>
                                                            <has-error
                                                                :form="form"
                                                                field="lab_id"
                                                            ></has-error>
                                                        </div>
                                                        <div class="form-group">
                                                            <!-- <label>Select Type of Test</label>                 -->
                                                            <label
                                                                >Chọn loại xét
                                                                nghiệm</label
                                                            >
                                                            <select
                                                                v-model="
                                                                    form.type
                                                                "
                                                                class="form-control"
                                                                :class="{
                                                                    'is-invalid': form.errors.has(
                                                                        'type'
                                                                    )
                                                                }"
                                                                name="type"
                                                            >
                                                                <option
                                                                    value="Huyết học"
                                                                    >Huyết
                                                                    học</option
                                                                >
                                                                <option
                                                                    value="Hóa sinh"
                                                                    >Hóa
                                                                    sinh</option
                                                                >
                                                                <option
                                                                    value="Vi sinh"
                                                                    >Vi
                                                                    sinh</option
                                                                >
                                                            </select>

                                                            <has-error
                                                                :form="form"
                                                                field="type"
                                                            ></has-error>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for=""
                                                                >Kết luận của
                                                                bác sỹ</label
                                                            >
                                                            <textarea
                                                                v-model="
                                                                    form.comment
                                                                "
                                                                placeholder="Kết luận của bác sỹ"
                                                                name="comment"
                                                                id=""
                                                                cols="10"
                                                                rows="5"
                                                                class="form-control"
                                                                :class="{
                                                                    'is-invalid': form.errors.has(
                                                                        'comment'
                                                                    )
                                                                }"
                                                            ></textarea>
                                                            <has-error
                                                                :form="form"
                                                                field="comment"
                                                            ></has-error>
                                                        </div>
                                                        <center>
                                                            <!-- <button type="submit" class="labtestresult btn-block btn btn-info" style="color:#fff;">Upload Test Result</button> -->
                                                            <button
                                                                type="submit"
                                                                class="labtestresult btn-block btn btn-info"
                                                                style="color:#fff;"
                                                            >
                                                                Cập nhật kết quả
                                                                xét nghiệm
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
                                </td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Mã HSBA</th>
                                <th>Họ tên</th>
                                <th>Chẩn đoán</th>
                                <th>Nhận xét của bác sĩ</th>
                                <th>Các triệu chứng</th>
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
                patient_id: "",
                diagnose_id: "",
                type: "",
                comment: ""
            })
        };
    },
    methods: {
        LoadDiagnoses() {
            // this.loading = true;
            axios.get("api/labtest").then(response => {
                setTimeout(function() {
                    NProgress.done();
                }, 1000);
                this.diagnoses = response.data;
            });
        },
        // LoadDiagnoses(){
        //      axios.get('api/labtest').then(({data}) => (this.diagnoses = data));
        // },
        // imageFunction(e){
        //   let file = e.target.files[0];
        //   let reader = new FileReader();
        //   reader.onloadend = (file) => {
        //     this.form.image = reader.result;
        //   }
        //   reader.readAsDataURL(file);
        // },
        addDiagnosis() {
            $(".labtestresult").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .post("api/uploadtest")
                .then(() => {
                    toast.fire({
                        type: "success",
                        title: "Cập nhật thành công!"
                    });
                    $(".labtestresult").html("Cập nhật kết quả xét nghiệm CLS");
                    $("#lap-result").modal("hide");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title:
                            "Thông tin nhập vào chưa đúng! <br> Hoặc <br> Dữ liệu đã tồn tại!"
                    });
                    $(".labtestresult").html(
                        "Cập nhật kết quả xét nghiệm CLS "
                    );
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
