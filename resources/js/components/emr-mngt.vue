<template>
    <div class="container">
        <!-- <div>
            <router-link to="/add-biodata"  type="button" class="btn btn-rounded btn-info"  style="color:#fff;">Thêm mới</router-link>
            <button type="button" @click="pdfExport()" class="btn btn-rounded btn-info"  style="color:#fff;">Print TEST</button>
        </div> <br><br> -->
        <div class="row justify-content-center">
            <div class="card" style="width:100%;">
                <div class="row card-header">
                    <div class="col-sm-6">
                        <h3 class="card-title">Danh sách hồ sơ bệnh án</h3>
                    </div>
                    <div class="col-sm-6">
                        <div class="input-group input-group-sm">
                            <input
                                type="search"
                                v-model="search"
                                @keyup.enter="searchit"
                                class="form-control"
                                placeholder="Nhập tên bệnh nhân"
                            />
                            <span class="input-group-append">
                                <button
                                    @click="searchit"
                                    class="btn btn-info btn-flat"
                                >
                                    Tìm kiếm
                                </button>
                            </span>
                        </div>

                        <div class="input-group input-group-sm">
                            <input
                                type="search"
                                v-model="search"
                                @keyup.enter="searchit"
                                class="form-control"
                                placeholder="Nhập mã bệnh nhân"
                            />
                            <span class="input-group-append">
                                <button
                                    @click="searchit"
                                    class="btn btn-info btn-flat"
                                >
                                    Tìm kiếm
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <center>
                        <!-- <div v-if="loading" class="test">
                    <img src="images/Interwind-1s-100px.svg" alt="">
                </div> -->
                    </center>
                    <table
                        id="example1"
                        class="table table-bordered table-striped"
                    >
                        <thead>
                            <tr>
                                <th>Mã BN</th>
                                <!-- col 1 -->
                                <th>Họ tên</th>
                                <!-- col 2 -->
                                <th>Mã HSBA</th>
                                <!-- col 3 -->
                                <th>Ngày khám</th>
                                <!-- col 4 -->
                                <th>
                                    Lý do
                                </th>
                                <!-- col 5 -->
                                <th>Giới tính</th>
                                <!-- col 6 -->
                                <th>Tác vụ</th>
                                <!-- col 7 -->
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="patient in patients" :key="patient.id">
                                <td>{{ patient.id }}</td>
                                <!-- col 1 -->
                                <td>{{ patient.full_name }}</td>
                                <!-- col 2 -->
                                <td>{{ patient.unique_id }}</td>
                                <!-- col 3 -->
                                <td>{{ patient.created_at }}</td>
                                <!-- col 4 -->
                                <td>{{ patient.reason }}</td>
                                <!-- col 4 -->
                                <td>{{ patient.sex }}</td>
                                <td>
                                    <button
                                        type="button"
                                        class="btn btn-primary"
                                        data-toggle="modal"
                                        :data-target="'#' + patient.unique_id"
                                    >
                                        Xem hồ sơ
                                    </button>
                                    <!--Biodata Modal -->
                                    <div
                                        class="modal fade"
                                        :id="patient.unique_id"
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
                                                    ></h5>
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
                                                        <b>Bệnh án: </b>
                                                        <button
                                                            type="submit"
                                                            @click="
                                                                addPatientPDF(
                                                                    patient.id
                                                                )
                                                            "
                                                        >
                                                            Xem bệnh án
                                                        </button>
                                                    </p>
                                                    <p>
                                                        <b
                                                            >Phiếu theo dõi sinh
                                                            hiệu:
                                                        </b>
                                                        <button
                                                            type="submit"
                                                            @click="
                                                                vitalPDF(
                                                                    patient.id
                                                                )
                                                            "
                                                        >
                                                            Xem phiếu theo dõi
                                                            sinh hiệu
                                                        </button>
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

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <button
                                                @click="editModal(patient)"
                                                class="text-primary"
                                            >
                                                <i class="fa fa-edit"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-4">
                                            <button
                                                @click="
                                                    deletePatient(patient.id)
                                                "
                                                class="text-danger"
                                            >
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </div>
                                        <div class="col-sm-4">
                                            <button
                                                @click="xmlExport(patient.id)"
                                                class="text-primary"
                                            >
                                                <i
                                                    class="fas fa-file-export"
                                                ></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                <td></td>
                            </tr>
                            <!--Biodata Modal -->
                            <div
                                class="modal fade"
                                id="editpatient"
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
                                            <!-- <h5 class="modal-title" id="exampleModalLongTitle">Patient Biodata</h5> -->
                                            <h5
                                                class="modal-title"
                                                id="exampleModalLongTitle"
                                            >
                                                Lý lịch bệnh nhân
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
                                                @submit.prevent="updatePatient"
                                                id="add-biodata"
                                            >
                                                <div class="form-group">
                                                    <!-- <label>Select Title</label>                 -->
                                                    <label>Chức danh</label>
                                                    <select
                                                        v-model="form.title"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'title'
                                                            )
                                                        }"
                                                        name="title"
                                                    >
                                                        <option
                                                            value="nul"
                                                            style="font-weight:700;"
                                                            >Chọn chức
                                                            danh</option
                                                        >
                                                        <option value="Cô"
                                                            >Cô</option
                                                        >
                                                        <option value="Bà"
                                                            >Bà</option
                                                        >
                                                        <option value="Ông"
                                                            >Ông</option
                                                        >
                                                    </select>
                                                    <has-error
                                                        :form="form"
                                                        field="title"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label>Edit Full Name</label> -->
                                                    <label
                                                        >Sửa tên bệnh
                                                        nhân</label
                                                    >
                                                    <input
                                                        v-model="form.full_name"
                                                        type="text"
                                                        name="full_name"
                                                        placeholder="Nhập tên bệnh nhân"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'full_name'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="full_name"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label>Edit Email</label>                        -->
                                                    <label>Sửa Email</label>
                                                    <input
                                                        v-model="form.email"
                                                        type="email"
                                                        name="email"
                                                        placeholder="Nhập Email"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'email'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="email"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label>Edit Phone Number</label>                                              -->
                                                    <label
                                                        >Sửa số điện
                                                        thoại</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.phone_number
                                                        "
                                                        type="number"
                                                        name="phone_number"
                                                        placeholder="Nhập số điện thoại"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'phone_number'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="phone_number"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label>Edit Occupation</label>                                              -->
                                                    <label
                                                        >Sửa nghề nghiệp</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.occupation
                                                        "
                                                        type="text"
                                                        name="occupation"
                                                        placeholder="Nhập nghề nghiệp"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'occupation'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="occupation"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label>Edit Gender</label>                 -->
                                                    <label>Sửa giới tính</label>
                                                    <select
                                                        v-model="form.sex"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'sex'
                                                            )
                                                        }"
                                                        name="sex"
                                                    >
                                                        <option
                                                            value="nul"
                                                            style="font-weight:700;"
                                                            >Chọn giới
                                                            tính</option
                                                        >
                                                        <option value="Nam"
                                                            >Nam</option
                                                        >
                                                        <option value="Nữ"
                                                            >Nữ</option
                                                        >
                                                        <option value="Khác"
                                                            >Khác</option
                                                        >
                                                    </select>
                                                    <has-error
                                                        :form="form"
                                                        field="sex"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label>Edit Date of Birth</label>                         -->
                                                    <label>Sửa ngày sinh</label>
                                                    <input
                                                        v-model="form.dob"
                                                        type="date"
                                                        name="dob"
                                                        placeholder="Nhập ngày sinh"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'dob'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="dob"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label>Edit Relegion</label>                 -->
                                                    <label>Sửa tôn giáo</label>
                                                    <select
                                                        v-model="form.religion"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'religion'
                                                            )
                                                        }"
                                                        name="religion"
                                                    >
                                                        <option
                                                            value="nul"
                                                            style="font-weight:700;"
                                                            >Chọn tôn
                                                            giáo</option
                                                        >
                                                        <option
                                                            value="Christainity"
                                                            >Christainity</option
                                                        >
                                                        <option value="Islam"
                                                            >Islam</option
                                                        >
                                                        <option
                                                            value="Thiên Chúa Giáo"
                                                            >Thiên Chúa
                                                            Giáo</option
                                                        >
                                                        <option
                                                            value="Phật Giáo"
                                                            >Phật Giáo</option
                                                        >
                                                        <option value="Khác"
                                                            >Khác</option
                                                        >
                                                        <option value="Không"
                                                            >Không</option
                                                        >
                                                    </select>
                                                    <has-error
                                                        :form="form"
                                                        field="religion"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label>Edit Nationality</label>                          -->
                                                    <label>Sửa Quốc tịch</label>
                                                    <input
                                                        v-model="
                                                            form.nationality
                                                        "
                                                        type="text"
                                                        name="nationality"
                                                        placeholder="Quốc tịch"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'nationality'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="nationality"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label>Edit State of Origin</label>                 -->
                                                    <label>Sửa quê quán</label>
                                                    <select
                                                        v-model="
                                                            form.state_of_origin
                                                        "
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'state_of_origin'
                                                            )
                                                        }"
                                                        name="state_of_origin"
                                                    >
                                                        <option
                                                            value="nul"
                                                            style="font-weight:700;"
                                                            >Chọn tỉnh
                                                            thành</option
                                                        >
                                                        <option
                                                            value="Niger State"
                                                            >Niger State</option
                                                        >
                                                        <option
                                                            value="Zamfara State"
                                                            >Zamfara
                                                            State</option
                                                        >
                                                        <option
                                                            value="Gombe State"
                                                            >Gombe State</option
                                                        >
                                                        <option value="Hà Nội"
                                                            >Hà Nội</option
                                                        >
                                                        <option
                                                            value="TP. Hồ Chí Minh"
                                                            >TP. Hồ Chí
                                                            Minh</option
                                                        >
                                                    </select>
                                                    <has-error
                                                        :form="form"
                                                        field="state_of_origin"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label>Edit Home Adress</label>   -->
                                                    <label
                                                        >Sửa địa chỉ nhà</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.home_address
                                                        "
                                                        placeholder="Nhập địa chỉ nhà"
                                                        name="home_address"
                                                        id=""
                                                        cols="10"
                                                        rows="5"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'home_address'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="home_address"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label>Edit Place of Birth</label>                         -->
                                                    <label>Sửa nơi sinh</label>
                                                    <input
                                                        v-model="
                                                            form.place_of_birth
                                                        "
                                                        type="text"
                                                        name="place_of_birth"
                                                        placeholder="Nhập nơi sinh"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'place_of_birth'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="place_of_birth"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label>Edit Marital Status</label>                         -->
                                                    <label
                                                        >Sửa tình trạng hôn
                                                        nhân</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.marital_status
                                                        "
                                                        type="text"
                                                        name="marital_status"
                                                        placeholder="Nhập tình trạng hôn nhân"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'marital_status'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="marital_status"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <!-- <label>Edit Next of kin Home Address</label>   -->
                                                    <label
                                                        >Sửa địa chỉ người
                                                        thân</label
                                                    >
                                                    <textarea
                                                        v-model="
                                                            form.home_next_of_kin
                                                        "
                                                        placeholder="Nhập địa chỉ người thân"
                                                        name="home_next_of_kin"
                                                        id=""
                                                        cols="10"
                                                        rows="5"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'home_next_of_kin'
                                                            )
                                                        }"
                                                    ></textarea>
                                                    <has-error
                                                        :form="form"
                                                        field="home_next_of_kin"
                                                    ></has-error>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        >Sửa số điện thoại người
                                                        thân</label
                                                    >
                                                    <input
                                                        v-model="
                                                            form.phone_next_of_kin
                                                        "
                                                        type="number"
                                                        name="phone_next_of_kin"
                                                        placeholder="Nhập số điện thoại người thân"
                                                        class="form-control"
                                                        :class="{
                                                            'is-invalid': form.errors.has(
                                                                'phone_next_of_kin'
                                                            )
                                                        }"
                                                    />
                                                    <has-error
                                                        :form="form"
                                                        field="phone_next_of_kin"
                                                    ></has-error>
                                                </div>
                                                <center>
                                                    <!-- <button type="submit" class="updatepatient btn-block btn btn-info" style="color:#fff;">Update Patient</button> -->
                                                    <button
                                                        type="submit"
                                                        class="updatepatient btn-block btn btn-info"
                                                        style="color:#fff;"
                                                    >
                                                        Cập nhật bệnh nhân
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
                                <th>Mã BN</th>
                                <!-- col 1 -->
                                <th>Họ tên</th>
                                <!-- col 2 -->
                                <th>Mã HSBA</th>
                                <!-- col 3 -->
                                <th>Ngày khám</th>
                                <!-- col 4 -->
                                <th>
                                    Lý do
                                </th>
                                <!-- col 5 -->
                                <th>Giới tính</th>
                                <!-- col 6 -->
                                <th>Tác vụ</th>
                                <!-- col 7 -->
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
            patients: {},
            search: "",
            //   loading: false,
            form: new Form({
                id: "",
                unique_id: "PID" + Math.floor(Math.random() * 10000000000 + 1),
                title: "",
                full_name: "",
                email: "",
                phone_number: "",
                occupation: "",
                sex: "",
                dob: "",
                religion: "",
                nationality: "",
                state_of_origin: "",
                home_address: "",
                place_of_birth: "",
                marital_status: "",
                home_next_of_kin: "",
                phone_next_of_kin: ""
            })
        };
    },
    methods: {
        fakeData() {
            // axios.get("api/emr-mngt").then(res => console.log(res));
        },
        loadPatients() {
            // this.loading = true;
            axios.get("api/patient").then(response => {
                setTimeout(function() {
                    NProgress.done();
                }, 1000);
                this.patients = response.data;
            });
        },
        searchit() {
            let query = this.search;
            axios
                .get("api/findPatient?q=" + query)
                .then(data => {
                    console.log(data.data.data);
                    this.patients = data.data.data;
                })
                .catch(() => {});
        },
        editModal(patient) {
            $("#editpatient").modal("show");
            this.form.fill(patient);
        },
        showModel(patient) {
            $("#" + patient.unique_id).modal("show");
            this.form.fill(patient);
        },
        deletePatient(id) {
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
                        .delete("api/patient/" + id)
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
        updatePatient() {
            $(".updatepatient").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .put("api/patient/" + this.form.id)
                .then(() => {
                    Fire.$emit("afterAction");
                    $("#editpatient").modal("hide");
                    toast.fire({
                        type: "success",
                        title: "Lý lịch của bệnh nhân được cập nhật thành công!"
                    });
                    $(".updatepatient").html("Update Patient");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng!"
                    });
                    $(".updatepatient").html("Update Patient");
                });
        },
        pdfExport() {
            axios
                .get("/pdf_export")
                .then(response => {
                    window.open("/pdf_export/");
                })
                .catch(error => {
                    this.errors = "Lỗi in";
                });
        },
        vitalPDF(id) {
            axios
                .get("/vital_pdf_export/" + id)
                .then(response => {
                    window.open("/vital_pdf_export/" + id);
                })
                .catch(error => {
                    this.errors = "Lỗi in";
                });
        },
        addPatientPDF(id) {
            axios
                .get("/add_patient_pdf_export/" + id)
                .then(response => {
                    window.open("/add_patient_pdf_export/" + id);
                })
                .catch(error => {
                    this.errors = "Lỗi in";
                });
        },
        xmlExport(id) {
            axios
                .get("/xml_export/" + id)
                .then(response => {
                    toast.fire({
                        type: "success",
                        title: "Dữ liệu được xuất thành công!"
                    });
                })
                .catch(err => {
                    toast.fire({
                        type: "error",
                        title: "Xuất dữ liệu thất bại!"
                    });
                });
        }
    },
    mounted() {
        console.log("Component mounted.");
        // this.loading = true;
        this.loadPatients();
        this.fakeData();
        Fire.$on("afterAction", () => {
            this.loadPatients();
        });
    }
};
</script>
