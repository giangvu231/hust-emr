<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="card" style="width:100%;">
                <div class="card-header">
                    <h3 class="card-title">Kết quả chẩn đoán hình ảnh</h3>
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
                                <th>Ngày thực hiện</th>
                                <th>Kết quả</th>
                                <th v-if="user.role == 'lab'">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="imagingresult in imagingresults"
                                :key="imagingresult.id"
                            >
                                <td>{{ imagingresult.patient.unique_id }}</td>
                                <td>
                                    {{ imagingresult.patient.full_name }}
                                </td>
                                <!-- <td>{{ imagingresult.diagnose.diagnosis }}</td> -->
                                <td>{{ imagingresult.updated_at }}</td>
                                <td>
                                    {{ imagingresult.created_at | humanDate }}
                                </td>
                                <td>
                                    {{ imagingresult.type }} <br />
                                    {{ imagingresult.comment }}
                                </td>
                                <td v-if="user.role == 'lab'">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <button
                                                @click="
                                                    editModal(imagingresult)
                                                "
                                                class="text-primary"
                                            >
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-6">
                                            <a href="#" class="text-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <!--Biodata Modal -->
                            <div
                                class="modal fade"
                                id="editimagingresults"
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
                                                Sửa kết quả CDHA
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
                                                    updateimagingresults
                                                "
                                                id="edit-imagingresults"
                                            >
                                                <div class="form-group">
                                                    <label
                                                        >Chọn loại CDHA</label
                                                    >
                                                    <select
                                                        v-model="form.type"
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
                                                            >Xét nghiệm nước
                                                            tiểu</option
                                                        >
                                                        <option value="Sốt rét"
                                                            >Sốt rét</option
                                                        >
                                                        <option
                                                            value="HIV I - II"
                                                            >HIV I - II</option
                                                        >
                                                        <option value="Nhóm máu"
                                                            >Nhóm máu</option
                                                        >
                                                        <option value="Kiểu Gen"
                                                            >Kiểu Gen</option
                                                        >
                                                        <option
                                                            value="Đường huyết"
                                                            >Đường huyết</option
                                                        >
                                                        <option value="Thử thai"
                                                            >Thử thai</option
                                                        >
                                                        <option value="Lao phổi"
                                                            >Lao phổi</option
                                                        >
                                                    </select>

                                                    <has-error
                                                        :form="form"
                                                        field="type"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label>Sửa nhận xét</label>
                                                    <textarea
                                                        v-model="form.comment"
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
                                                    <!-- <button type="submit" class="updateimagingresults btn-block btn btn-info" style="color:#fff;">Update Lab Result</button> -->
                                                    <button
                                                        type="submit"
                                                        class="updateimagingresults btn-block btn btn-info"
                                                        style="color:#fff;"
                                                    >
                                                        Cập nhật kết quả CDHA
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
                            <tr>
                                <th>Mã bệnh nhân</th>
                                <th>Họ tên</th>
                                <th>Thông tin chẩn đoán</th>
                                <th>Ngày kiểm tra</th>
                                <th>Kết quả xét nghiệm</th>
                                <th v-if="user.role == 'lab'">Tác vụ</th>
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
            imagingresults: {},
            user: {},
            form: new Form({
                id: "",
                type: "",
                comment: ""
            })
        };
    },
    methods: {
        LoadImagingresult() {
            axios.get("api/uploadimaging").then(response => {
                setTimeout(function() {
                    NProgress.done();
                }, 1000);
                this.imagingresults = response.data;
            });
            //  axios.get('api/uploadtest').then(({data}) => (this.imagingresults = data));
            axios.get("api/user").then(response => {
                console.log(response.data);
                this.user = response.data;
            });
        },
        editModal(imagingresult) {
            $("#editimagingresults").modal("show");
            this.form.fill(imagingresult);
        },
        updateimagingresults() {
            $(".updateimagingresults").html(
                '<i class="fa fa-spin fa-spinner"></i>'
            );
            this.form
                .put("api/uploadtest/" + this.form.id)
                .then(() => {
                    Fire.$emit("afterAction");
                    $("#editimagingresults").modal("hide");
                    toast.fire({
                        type: "success",
                        title: "Kết quả xét nghiệm đã cập nhật thành công!"
                    });
                    $(".updateimagingresults").html("Cập nhật CDHA");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng!"
                    });
                    $(".updateimagingresults").html("Cập nhật CDHA");
                });
        }
    },
    mounted() {
        console.log("Component mounted.");
        this.LoadImagingresult();
        Fire.$on("afterAction", () => {
            this.LoadImagingresult();
        });
    }
};
</script>
