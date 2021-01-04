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
                                <th>Mã bệnh nhân</th>
                                <th>Họ tên</th>
                                <th>Thông tin chẩn đoán</th>
                                <th>Nhận xét của bác sĩ</th>
                                <th>Các triệu chứng</th>
                                <th>Tác vụ</th>
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
                                        Cập nhật kết quả CDHA
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
                                                                style="width: 100%;"
                                                                placeholder="Yêu cầu CDHA"
                                                                type="text"
                                                                v-model="
                                                                    searchImagingText
                                                                "
                                                                @keyup="
                                                                    searchForImaging()
                                                                "
                                                            />
                                                            <select
                                                                @mouseover="
                                                                    searchForImaging()
                                                                "
                                                                v-model="
                                                                    form.imaging_id
                                                                "
                                                                class="form-control"
                                                                :class="{
                                                                    'is-invalid': form.errors.has(
                                                                        'imaging_id'
                                                                    )
                                                                }"
                                                                name="imaging_id"
                                                            >
                                                                <option
                                                                    value=""
                                                                    disabled
                                                                    selected
                                                                    >Chọn loại
                                                                    CDHA</option
                                                                >
                                                                <option
                                                                    v-for="searchImagingArr in searchImagingArrs"
                                                                    :key="
                                                                        searchImagingArr.id
                                                                    "
                                                                    :value="
                                                                        searchImagingArr.id
                                                                    "
                                                                >
                                                                    {{
                                                                        searchImagingArr.code
                                                                    }}
                                                                    -
                                                                    {{
                                                                        searchImagingArr.name
                                                                    }}
                                                                </option>
                                                            </select>
                                                            <has-error
                                                                :form="form"
                                                                field="imaging_id"
                                                            ></has-error>
                                                        </div>
                                                        <div class="form-group">
                                                            <label
                                                                >Chọn loại
                                                                CDHA</label
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
                                                                    value="Công thức máu"
                                                                    >Công thức
                                                                    máu</option
                                                                >
                                                                <option
                                                                    value="Xét nghiệm nước tiểu"
                                                                    >Xét nghiệm
                                                                    nước
                                                                    tiểu</option
                                                                >
                                                                <option
                                                                    value="Sốt rét"
                                                                    >Sốt
                                                                    rét</option
                                                                >
                                                                <option
                                                                    value="HIV I - II"
                                                                    >HIV I -
                                                                    II</option
                                                                >
                                                                <option
                                                                    value="Nhóm máu"
                                                                    >Nhóm
                                                                    máu</option
                                                                >
                                                                <option
                                                                    value="Kiểu Gen"
                                                                    >Kiểu
                                                                    Gen</option
                                                                >
                                                                <option
                                                                    value="Đường huyết"
                                                                    >Đường
                                                                    huyết</option
                                                                >
                                                                <option
                                                                    value="Thử thai"
                                                                    >Thử
                                                                    thai</option
                                                                >
                                                                <option
                                                                    value="Lao phổi"
                                                                    >Lao
                                                                    phổi</option
                                                                >
                                                            </select>

                                                            <has-error
                                                                :form="form"
                                                                field="type"
                                                            ></has-error>
                                                        </div>
                                                        <div class="form-group">
                                                            <textarea
                                                                v-model="
                                                                    form.comment
                                                                "
                                                                placeholder="Comment"
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
                                                            <!-- <button type="submit" class="imagingtestresult btn-block btn btn-info" style="color:#fff;">Upload Test Result</button> -->
                                                            <button
                                                                type="submit"
                                                                class="imagingtestresult btn-block btn btn-info"
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
                                <th>Mã bệnh nhân</th>
                                <th>Họ tên</th>
                                <th>Thông tin chẩn đoán</th>
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
            searchImagingText: "",
            searchImagingArrs: [],
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
            axios.get("api/imagingtest").then(response => {
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
            $(".imagingtestresult").html(
                '<i class="fa fa-spin fa-spinner"></i>'
            );
            this.form
                .post("api/uploadimaging")
                .then(() => {
                    toast.fire({
                        type: "success",
                        title: "Cập nhật thành công!"
                    });
                    $(".imagingtestresult").html(
                        "Cập nhật kết quả xét nghiệm CLS"
                    );
                    $("#lap-result").modal("hide");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title:
                            "Thông tin nhập vào chưa đúng! <br> Hoặc <br> Dữ liệu đã tồn tại!"
                    });
                    $(".imagingtestresult").html(
                        "Cập nhật kết quả xét nghiệm CLS "
                    );
                });
        },
        searchForImaging() {
            axios
                .post("/searchimagingorder", {
                    name: this.searchImagingText
                })
                .then(response => {
                    this.searchImagingArrs = response.data;
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
