<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Thêm tài khoản</div>
                    <div class="card-body">
                        <form @submit.prevent="addStaff" id="add-staff">
                            <div class="form-group">
                                <label>Chức danh</label>
                                <select
                                    v-model="form.title"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('title')
                                    }"
                                    name="title"
                                >
                                    <option value="nul" style="font-weight:700;"
                                        >Chọn chức danh</option
                                    >
                                    <option value="BSCK I">BSCK I</option>
                                    <option value="BSCK II">BSCK II</option>
                                    <option value="BS">Bác sỹ</option>
                                    <option value="KTV">KTV</option>
                                    <option value="ĐD">Điều dưỡng</option>
                                    <option value="ĐD">Dược sỹ</option>
                                    <option value="Trưởng khoa"
                                        >Trưởng khoa</option
                                    >
                                    <option value="Phó khoa">Phó khoa</option>
                                    <option value="Giám đốc">Giám đốc</option>
                                    <option value="Phó giám đốc"
                                        >Phó giám đốc</option
                                    >
                                </select>
                                <has-error
                                    :form="form"
                                    field="title"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.name"
                                    type="text"
                                    name="name"
                                    placeholder="Nhập tên người dùng"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('name')
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="name"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.email"
                                    type="email"
                                    name="email"
                                    placeholder="Nhập Email (dùng làm tên đăng nhập)"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('email')
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="email"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <select
                                    v-model="form.role"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('role')
                                    }"
                                    name="role"
                                >
                                    <option value="nul" style="font-weight:700;"
                                        >Chọn chức vụ</option
                                    >
                                    <option value="recept">Lễ tân</option>
                                    <option value="nurse">Điều dưỡng</option>
                                    <option value="doc">Bác sỹ</option>
                                    <option value="lab">Kỹ thuật viên</option>
                                    <option value="pharm">Dược sỹ</option>
                                    <option value="admin">Quản trị viên</option>
                                </select>
                                <has-error
                                    :form="form"
                                    field="role"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.password"
                                    type="password"
                                    name="password"
                                    placeholder="Nhập mật khẩu"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'password'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="password"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.card_id"
                                    type="card_id"
                                    name="card_id"
                                    placeholder="Nhập số chứng minh nhân dân"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('card_id')
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="card_id"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.job_id"
                                    type="job_id"
                                    name="job_id"
                                    placeholder="Nhập số chứng chỉ hành nghề"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has('job_id')
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="job_id"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.location"
                                    type="location"
                                    name="location"
                                    placeholder="Nhập đơn vị công tác hiện tại"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'location'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="location"
                                ></has-error>
                            </div>
                            <div class="form-group">
                                <input
                                    v-model="form.more_about"
                                    type="more_about"
                                    name="more_about"
                                    placeholder="Ghi chú"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': form.errors.has(
                                            'more_about'
                                        )
                                    }"
                                />
                                <has-error
                                    :form="form"
                                    field="more_about"
                                ></has-error>
                            </div>
                            <center>
                                <button
                                    type="submit"
                                    class="addstaff btn-block btn btn-info"
                                    style="color:#fff;"
                                >
                                    Thêm tài khoản
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
            form: new Form({
                title: "",
                name: "",
                email: "",
                password: "",
                role: "",
                card_id: "",
                job_id: "",
                location: "",
                more_about: ""
            })
        };
    },
    methods: {
        addStaff() {
            $(".addstaff").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .post("api/staff")
                .then(() => {
                    toast.fire({
                        type: "success",
                        title: "Thêm thành công!"
                    });
                    $(".addstaff").html("Thêm người dùng");
                    $("#add-staff").trigger("reset");
                })
                .catch(() => {
                    toast.fire({
                        type: "error",
                        title: "Dữ liệu nhập vào chưa đúng!"
                    });
                    $(".addstaff").html("Thêm người dùng");
                });
        }
    },
    mounted() {
        console.log("Component mounted.");
        setTimeout(function() {
            NProgress.done();
        }, 3000);
    }
};
</script>
