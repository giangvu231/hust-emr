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
                                        <label>Chức danh</label>
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
                                        <label>Họ tên bệnh nhân</label>
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
                                            <label>Email</label>
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
                                            <label>Số điện thoại cá nhân</label>
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
                                            <!-- <input
                                                type="text"
                                                v-model="searchText"
                                                @keyup="searchForJob()"
                                            /> -->
                                            <label>Nghề nghiệp</label>
                                            <select
                                                @mouseover="searchForJob()"
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
                                                    value=""
                                                    disabled
                                                    selected
                                                    >Nghề nghiệp</option
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
                                            <!-- <input
                                                type="text"
                                                v-model="searchText"
                                                @keyup="searchForJob()"
                                            /> -->
                                            <label>Dân tộc</label>
                                            <select
                                                @mouseover="searchForRace()"
                                                v-model="form.race_id"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'race_id'
                                                    )
                                                }"
                                                name="race_id"
                                            >
                                                <option
                                                    value=""
                                                    disabled
                                                    selected
                                                    >Dân tộc</option
                                                >
                                                <option
                                                    v-for="searchRace in searchRaces"
                                                    :key="searchRace.id"
                                                    :value="searchRace.id"
                                                >
                                                    {{ searchRace.code }} -
                                                    {{ searchRace.name }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="race_id"
                                            ></has-error>
                                        </div>
                                    </td>
                                    <!-- <td width="50%">
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
                                    </td> -->
                                    <td width="50%">
                                        <!-- <div class="form-group">
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
                                        </div> -->
                                        <div class="form-group">
                                            <!-- <input
                                                type="text"
                                                v-model="searchText"
                                                @keyup="searchForJob()"
                                            /> -->
                                            <label>Ngoại Kiều</label>
                                            <select
                                                @mouseover="searchForNation()"
                                                v-model="form.nation_id"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'nation_id'
                                                    )
                                                }"
                                                name="nation_id"
                                            >
                                                <option
                                                    value=""
                                                    disabled
                                                    selected
                                                    >Ngoại kiều</option
                                                >
                                                <option
                                                    v-for="searchNation in searchNations"
                                                    :key="searchNation.id"
                                                    :value="searchNation.id"
                                                >
                                                    {{ searchNation.code }} -
                                                    {{ searchNation.name }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="nation_id"
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
                                            <label>Tôn giáo</label>
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
                                            <label>Quốc tịch</label>
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
                                            <label>Địa chỉ</label>
                                            <textarea
                                                v-model="form.home_address"
                                                placeholder="Nhập Số nhà - Thôn, phố - Xã, phường"
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
                                    <td>
                                        <div class="form-group">
                                            <label>Huyện (Quận, thị xã)</label>
                                            <input
                                                style="width: 100%;"
                                                placeholder="Huyện (Q, Tx)"
                                                type="text"
                                                v-model="searchDistrict"
                                                @keyup="searchForDistrict()"
                                            />
                                            <select
                                                @mouseover="searchForDistrict()"
                                                v-model="form.district_id"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'district_id'
                                                    )
                                                }"
                                                name="district_id"
                                            >
                                                <option
                                                    disabled
                                                    selected
                                                    value=""
                                                    >Chọn Huyện theo quy
                                                    định</option
                                                >
                                                <option
                                                    v-for="searchDistrict in searchDistricts"
                                                    :key="searchDistrict.id"
                                                    :value="searchDistrict.id"
                                                >
                                                    {{ searchDistrict.code }} -
                                                    {{ searchDistrict.name }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="district_id"
                                            ></has-error>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <label>Tỉnh, thành phố</label>
                                            <input
                                                style="width: 100%;"
                                                placeholder="Tỉnh, thành phố"
                                                type="text"
                                                v-model="searchCity"
                                                @keyup="searchForCity()"
                                            />
                                            <select
                                                @mouseover="searchForCity()"
                                                v-model="form.city_id"
                                                class="form-control"
                                                :class="{
                                                    'is-invalid': form.errors.has(
                                                        'city_id'
                                                    )
                                                }"
                                                name="city_id"
                                            >
                                                <option
                                                    value=""
                                                    disabled
                                                    selected
                                                    >Chọn Tỉnh, TP theo quy
                                                    định</option
                                                >
                                                <option
                                                    v-for="searchCity in searchCities"
                                                    :key="searchCity.id"
                                                    :value="searchCity.id"
                                                >
                                                    {{ searchCity.code }} -
                                                    {{ searchCity.name }}
                                                </option>
                                            </select>
                                            <has-error
                                                :form="form"
                                                field="city_id"
                                            ></has-error>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="50%">
                                        <div class="form-group">
                                            <label>Nơi sinh</label>
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
                                            <label>Tình trạng hôn nhân</label>
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
                                            <label>Nơi làm việc</label>
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
                                            <label>Loại Khám- chữa bệnh</label>
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
                                                    value=""
                                                    disabled
                                                    selected
                                                    >Loại KCB</option
                                                >
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
                                    <label>BHYT giá trị đến ngày</label>
                                    <label>Số thẻ BHYT</label>
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
                                            <label>Tên người thân</label>
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
                                            <label>Điện thoại người thân</label>
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
                                            <label>Địa chỉ người thân</label>
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
            searchRace: "",
            searchRaces: [],
            searchCity: "",
            searchCities: [],
            searchDistrict: "",
            searchDistricts: [],
            searchNation: "",
            searchNations: [],

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
                job_name: "",
                race_id: "",
                race_code: "",
                race_name: "",
                city_id: "",
                city_code: "",
                city_name: "",
                district_id: "",
                district_code: "",
                district_name: "",
                nation_id: "",
                nation_code: "",
                nation_name: ""
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
        searchForJob() {
            axios
                .post("/searchjob", {
                    name: this.searchText
                })
                .then(response => {
                    this.searchArrs = response.data;
                })
                .catch(() => {});
        },
        searchForRace() {
            axios
                .post("/searchrace", {
                    name: this.searchRace
                })
                .then(response => {
                    this.searchRaces = response.data;
                })
                .catch(() => {});
        },
        searchForCity() {
            axios
                .post("/searchcity", {
                    name: this.searchCity
                })
                .then(response => {
                    this.searchCities = response.data;
                })
                .catch(() => {});
        },
        searchForDistrict() {
            axios
                .post("/searchdistrict", {
                    name: this.searchDistrict
                })
                .then(response => {
                    this.searchDistricts = response.data;
                })
                .catch(() => {});
        },
        searchForNation() {
            axios
                .post("/searchnation", {
                    name: this.searchNation
                })
                .then(response => {
                    this.searchNations = response.data;
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
