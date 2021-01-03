<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Thêm lý lịch bệnh nhân
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="addPatient" id="add-biodata">
                            <table class="form-group" width="100%">
                                <tr>
                                    <b>THÔNG TIN HÀNH CHÍNH</b>
                                </tr>
                                <tr>
                                    <td width="30%">
                                        <div class="form-group">
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
                                                    disabled
                                                    value=""
                                                    style="font-weight:700;"
                                                >
                                                    Chọn chức danh
                                                </option>
                                                <option value="Bà">
                                                    Bà
                                                </option>
                                                <option value="Ông">
                                                    Ông
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="title"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td width="70%">
                                        <div class="form-group">
                                            <input
                                                v-model="form.full_name"
                                                type="text"
                                                name="full_name"
                                                placeholder="Nhập họ tên bệnh nhân"
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
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
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
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%">
                                        <div class="form-group">
                                            <input
                                                v-model="form.phone_number"
                                                type="number"
                                                name="phone_number"
                                                placeholder="Nhập số điện thoại liên lạc"
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
                                    </td>
                                    <td width="50%">
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                v-model="searchText"
                                                @keyup="search()"
                                            />
                                            <select
                                                v-model="form.job_id"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'job_id'
                                                    )
                                                }"
                                                name="job_id"
                                            >
                                                <option
                                                    v-for="searchArr in searchArrs"
                                                    :key="searchArr.id"
                                                    :value="searchArr.id"
                                                >
                                                    {{ searchArr.code }} -
                                                    {{ searchArr.name }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="job_id"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%">
                                        <div class="form-group">
                                            <input
                                                v-model="form.race"
                                                type="text"
                                                name="race"
                                                placeholder="Dân tộc"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'race'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="race"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td width="50%">
                                        <div class="form-group">
                                            <input
                                                v-model="form.foreign"
                                                type="text"
                                                name="foreign"
                                                placeholder="Ngoại kiều"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'foreign'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="foreign"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%">
                                        <label>
                                            <b>Giới tính</b>
                                        </label>
                                        <div class="form-group">
                                            <input
                                                type="radio"
                                                id="one"
                                                value="Nam"
                                                v-model="form.sex"
                                            />
                                            <label for="one">Nam</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input
                                                type="radio"
                                                id="two"
                                                value="Nữ"
                                                v-model="form.sex"
                                            />
                                            <label for="two">Nữ</label>
                                        </div>
                                    </td>
                                    <td width="50%">
                                        <div class="form-group">
                                            <label>
                                                Ngày sinh
                                            </label>
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
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%">
                                        <div class="form-group">
                                            <input
                                                v-model="form.religion"
                                                type="text"
                                                name="religion"
                                                placeholder="Nhập Tôn giáo"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'religion'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="religion"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td width="50%">
                                        <div class="form-group">
                                            <input
                                                v-model="form.nationality"
                                                type="text"
                                                name="nationality"
                                                placeholder="Nhập Quốc tịch"
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
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="form.home_address"
                                                placeholder="Nhập địa chỉ bệnh nhân"
                                                name="home_address"
                                                id=""
                                                cols="10"
                                                rows="2"
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
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%">
                                        <div class="form-group">
                                            <input
                                                v-model="form.place_of_birth"
                                                type="text"
                                                name="place_of_birth"
                                                placeholder="Nhập nơi sinh của bệnh nhân"
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
                                    </td>
                                    <td width="50%">
                                        <div class="form-group">
                                            <input
                                                v-model="form.marital_status"
                                                type="text"
                                                name="marital_status"
                                                placeholder="Nhập tình trạng hôn nhân hiện tại"
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
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%">
                                        <div class="form-group">
                                            <input
                                                v-model="form.work_address"
                                                type="text"
                                                name="work_address"
                                                placeholder="Nhập nơi làm việc"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'work_address'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="work_address"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <select
                                                v-model="form.type_of_object"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'type_of_object'
                                                    )
                                                }"
                                                name="type_of_object"
                                            >
                                                <option
                                                    disabled
                                                    value=""
                                                    style="font-weight:700;"
                                                >
                                                    Chọn loại KCB
                                                </option>
                                                <option value="BHYT">
                                                    1. BHYT
                                                </option>
                                                <option value="Thu phí">
                                                    2. Thu phí
                                                </option>
                                                <option value="Miễn">
                                                    3. Miễn
                                                </option>
                                                <option value="Khác">
                                                    4. Khác
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="type_of_object"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>BHYT giá trị đến ngày</td>
                                    <td>Số thẻ BHYT</td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="
                                                    form.health_insurance_date
                                                "
                                                type="date"
                                                name="health_insurance_date"
                                                placeholder="Nhập ngày hết hạn BHYT"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'health_insurance_date'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="health_insurance_date"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-group">
                                            <input
                                                v-model="
                                                    form.health_insurance_id
                                                "
                                                type="text"
                                                name="health_insurance_id"
                                                placeholder="So the BHYT"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'health_insurance_id'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="health_insurance_id"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <b>THÔNG TIN NGƯỜI THÂN</b>
                                </tr>
                                <tr>
                                    <td width="50%">
                                        <div class="form-group">
                                            <input
                                                v-model="form.name_next_of_kin"
                                                type="text"
                                                name="name_next_of_kin"
                                                placeholder="Nhập tên người thân"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'name_next_of_kin'
                                                    )
                                                }"
                                            />
                                            <has-error
                                                :form="form"
                                                field="name_next_of_kin"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <td width="50%">
                                        <div class="form-group">
                                            <input
                                                v-model="form.phone_next_of_kin"
                                                type="number"
                                                name="phone_next_of_kin"
                                                placeholder="Nhập số điện thoại liên lạc của người thân"
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
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="form-group">
                                            <textarea
                                                v-model="form.home_next_of_kin"
                                                placeholder="Nhập địa chỉ người thân"
                                                name="home_next_of_kin"
                                                id=""
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
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <center>
                                            <button
                                                type="submit"
                                                class="addpatient btn-block btn btn-info"
                                                style="color:#fff;"
                                            >
                                                Thêm bệnh nhân
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
            searchText: "",
            searchArrs: [],
            jobs: {},
            form: new Form({
                unique_id: "BA" + Math.floor(Math.random() * 10000000 + 1),
                pid: "BN" + Math.floor(Math.random() * 10000000 + 1),
                title: "",
                full_name: "",
                email: "",
                phone_number: "",
                occupation: "",
                sex: "",
                dob: "",
                religion: "",
                nationality: "",
                home_address: "",
                place_of_birth: "",
                marital_status: "",
                home_next_of_kin: "",
                phone_next_of_kin: "",
                name_next_of_kin: "",
                race: "",
                foreign: "",
                health_insurance_id: "",
                health_insurance_date: "",
                job_id: "",
                job_code: "",
                job_name: ""
            })
        };
    },
    methods: {
        addPatient() {
            $(".addpatient").html('<i class="fa fa-spin fa-spinner"></i>');
            this.form
                .post("api/patient")
                .then(response => {
                    toast.fire({
                        type: "success",
                        title: "Thêm thông tin thành công!"
                    });
                    $(".addpatient").html("Thêm thông tin bệnh nhân");
                    $("#add-biodata").trigger("reset");
                })
                .catch(err => {
                    console.log(err);
                    toast.fire({
                        type: "error",
                        title: "Thông tin thêm vào chưa đúng!"
                    });
                    $(".addpatient").html("Thêm thông tin bệnh nhân");
                });
        },
        search() {
            axios
                .post("/searchjob", {
                    name: this.searchText
                })
                .then(response => {
                    this.searchArrs = response.data;
                })
                .catch(() => {});
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
