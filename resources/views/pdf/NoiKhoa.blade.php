<!DOCTYPE html>
<html>
  <head>
    <title>Bệnh án Nội khoa</title>
    <meta charset="utf-8" />
  </head>
  <style type="text/css">
    @font-face {
      font-family: "Times New Roman" !important;
      src: url("fonts/times.ttf");
      font-style: normal;
    }
    @font-face {
      font-family: "Times New Roman" !important;
      src: url("fonts/timesbd.ttf");
      font-weight: bold;
    }
    @font-face {
      font-family: "Times New Roman" !important;
      src: url("fonts/timesi.ttf");
      font-style: italic;
    }
    @font-face {
      font-family: "Times New Roman" !important;
      src: url("fonts/timesbi.ttf");
      font-style: italic;
      font-weight: bold;
    }
    * {
      font-family: "Times New Roman" !important;
    }
    .font-bold {
      font-weight: bold;
    }
    .font-italic {
      font-style: italic;
    }
    span.uppercase {
      text-transform: uppercase;
    }
    .page_break {
      page-break-before: always;
    }
    .center {
    text-align: center;
    }
    table {
    border-collapse: collapse;
    }
  </style>

  <body style="font-family: Times New Roman; font-size: 12px">
    <!-- header -->
    <div class="header">
      <table width="100%">
        <tr>
          <td width="30%">Sở Y tế tỉnh Phú Thọ</td>
          <td width="40%" rowspan="3" style="text-align: center; font-size: 25px">
            <b>BỆNH ÁN NỘI KHOA</b>
          </td>
          <td width="30%">Mã HSBA: {{ $patientInfo->unique_id }}</td>
        </tr>
        <tr>
          <td width="30%">TTYT Huyện Cẩm Khê</td>
          <td width="30%">Mã BN: {{ $patientInfo->pid }}</td>
        </tr>

        <tr>
          <td width="30%">Khoa: {{ $treatment->department}} &nbsp; Giường: {{ $treatment->bed_id}}</td>
          <td width="30%"></td>
        </tr>
      </table>
    </div>
    <!-- Thông tin bệnh nhân -->
    <div>
      <br />
      <table width="100%">
        <tr>
          <td width="40%"><b>I. HÀNH CHÍNH</b></td>
          <td width="10%"></td>
          <td width="40%"></td>
          <td width="10%" class="center">Tuổi</td>
        </tr>
        <tr>
          <td colspan="2">1. Họ và tên <i>(In hoa)</i>: <span class="uppercase">{{ $patientInfo->full_name }}</span></td>
          <td>2. Sinh ngày: {{ $patientInfo->dob }}</td>
          <td class="center">[{{ $patientInfo->age }}]</td>
        </tr>
        <tr>
          <td>3. Giới tính: {{ $patientInfo->sex }}</td>
          <td></td>
          <td>4. Nghề nghiệp: {{ $patientInfo->job_name }}</td>
          <td class="center">[{{ $patientInfo->job_code }}]</td>
        </tr>
        <tr>
          <td>5. Dân tộc: {{ $patientInfo->race_name }}</td>
          <td class="center">[{{ $patientInfo->race_code }}]</td>
          <td>6. Ngoại kiều: {{ $patientInfo->nation_name }}</td>
          <td class="center">[{{ $patientInfo->nation_code }}]</td>
        </tr>
      </table>
      <table width="100%">
        <tr>
          <td colspan="4">7. Địa chỉ : {{ $patientInfo->home_address }}</td>
        </tr>
        <tr>
          <td width="40%">Huyện (Q, Tx) {{ $patientInfo->district_name }}</td>
          <td width="10%" class="center">[{{ $patientInfo->district_code }}]</td>
          <td width="40%">Tỉnh, thành phố {{ $patientInfo->city_name }}</td>
          <td width="10%" class="center">[{{ $patientInfo->city_code }}]</td>
        </tr>
        <tr>
          <td>8. Nơi làm việc : {{ $patientInfo->work_address }}</td>
          <td></td>
          <td>9. Đối tượng : {{ $patientInfo->type_of_object }}</td>
          <td></td>
        </tr>
        <tr>
          <td>10. BHYT giá trị đến: {{ $patientInfo->health_insurance_date }}</td>
          <td></td>
          <td>Số thẻ BHYT: {{ $patientInfo->health_insurance_id }}</td>
          <td></td>
        </tr>
        <tr>
          <td colspan="4">
            11. Họ tên, địa chỉ người nhà khi cần báo tin: {{ $patientInfo->name_next_of_kin }} - Đ/C: {{ $patientInfo->home_next_of_kin }}
          </td>
        </tr>
        <tr>
          <td colspan="4">Số điện thoại người nhà: {{ $patientInfo->phone_next_of_kin }}</td>
        </tr>
      </table>
    </div>
    <!-- Quản lý người bệnh -->
    <div>
      <b> II. QUẢN LÝ NGƯỜI BỆNH </b>
      <br />
      <table width="100%" style="border: 1px solid black">
        <tr>
          <td style="border-right: 1px solid black" width="50%">12. Vào viện: {{ $hospitalHistory->date_admitted }}</td>
          <td>14. Nơi giới thiệu: {{ $hospitalHistory->refer_dept }}</td>
        </tr>
        <tr>
          <td style="border-right: 1px solid black; border-bottom: 1px solid black">13. Trực tiếp vào: {{ $hospitalHistory->admit_dept }}</td>
          <td style="border-bottom: 1px solid black">- Vào viện do bệnh này lần thứ: {{ $treatment->reason_count }}</td>
        </tr>

        <tr>
          <td width="50%" style="border-right: 1px solid black;">15. Vào Khoa: {{ $treatment->department }}</td>
          <td>
            17. Chuyển viện: {{ $treatment->hosp_transfer_type }}
            <br />
            - Chuyển đến: {{ $treatment->hosp_transfer_name }}
          </td>
        </tr>
        <tr>
          <td style="border-right: 1px solid black;">16. Chuyển khoa lần 1: {{ $treatment->dept_name_2nd }}</td>
          <td>18. Ra viện:</td>
        </tr>
        <tr>
          <td style="border-right: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chuyển khoa lần 2: {{ $treatment->dept_name_3rd }}</td>
          <td>19. Tổng số ngày điều trị: {{ $hospitalHistory->age }}</td>
        </tr>
        <tr>
          <td style="border-right: 1px solid black;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chuyển khoa lần 3: {{ $treatment->dept_name_4th }}</td>
          <td></td>
        </tr>
      </table>
    </div>
    <!-- Chẩn đoán -->
    <div>
      <table width="100%" style="border-bottom: 1px solid black">
        <tr>
          <td width="40%"><b> III. CHẨN ĐOÁN </b></td>
          <td width="10%" class="center">MÃ</td>
          <td width="40%"></td>
          <td width="10%" class="center">MÃ</td>
        </tr>
        <tr>
          <td style="border-top: 1px solid black; border-left: 1px solid black;">
            20. Nơi chuyển đến: <br />
            {{ $treatment->icd10_admit_name }}
          </td>
          <td style="border-top: 1px solid black; border-right: 1px solid black;" class="center"><br />[{{ $treatment->icd10_admit_code }}]</td>
          <td style="border-top: 1px solid black; " rowspan="2" style="vertical-align: text-top">
            23. Ra viện: <br />
            + Bệnh chính: {{ $summary->discharge_maindisease_name }}
          </td>
          <td style="border-right: 1px solid black; border-top: 1px solid black;" rowspan="2" class="center"><br />[{{ $summary->discharge_maindisease_code}}]</td>
        </tr>
        <tr>
          <td style="border-left: 1px solid black;">
            21. KKB, cấp cứu: <br />
            {{ $treatment->icd10_emergency_name }}
          </td>
          <td style="border-right: 1px solid black;" class="center"><br />[ {{ $treatment->icd10_emergency_code }}]</td>
        </tr>
        <tr>
          <td style="border-left: 1px solid black;">
            22. Khi vào khoa điều trị: <br />
            {{ $treatment->icd10_treatment_name }}
          </td>
          <td style="border-right: 1px solid black;" class="center"><br />[{{ $treatment->icd10_treatment_code }}]</td>
          <td >+ Bệnh kèm theo: {{ $summary->discharge_subdisease_name }}<br /></td>
          <td style="border-right: 1px solid black;" class="center"><br />[{{ $summary->discharge_subdisease_code }}]</td>
        </tr>
        <tr style="border-right: 1px solid black; border-left: 1px solid black;">
          <td style="border-left: 1px solid black;" colspan="2">+ Thủ thuật: [{{ $treatment->diagnosis_procedure }}]&nbsp;&nbsp; + Phẫu thuật: [{{ $treatment->diagnosis_surgery }}]</td>
          <td style="border-left: 1px solid black; border-right: 1px solid black;" style="border-right: 1px solid black;" colspan="2">+ Tai biến: [{{ $summary->discharge_stroke }}] &nbsp;&nbsp; + Biến chứng: [{{ $summary->discharge_complication }}]</td>
        </tr>
      </table>
    </div>
    <!-- Tình trạng ra viện -->
    <div>
      <b> IV. TÌNH TRẠNG RA VIỆN </b>
      <table width="100%" style="border: 1px solid black">
        <tr>
          <td style="border-right: 1px solid black;" width="30%" style="vertical-align: text-top">
            24. Kết quả điều trị: <br />
            {{ $summary->treatment_result }}
          </td>
          <td >
            26. Tình hình tử vong:
            <!-- {{ \Carbon\Carbon::parse($summary->death_time)->format('H \g\i\ờ m \p\h, \n\g\à\y d \t\h\á\n\g m \n\ă\m Y') }} -->
            <br />
            {{ $summary->death_type }} <br />
            {{ $summary->death_time_range }}
          </td>
        </tr>
        <tr>
          <td style="border-right: 1px solid black;"></td>
          <td>
            27. Nguyên nhân chính tử vong: <br />
            {{ $summary->death_reason_name }}
          </td>
        </tr>
        <tr>
          <td style="border-right: 1px solid black;">
            25. Giải phẫu bệnh <i>(khi có sinh thiết)</i>: <br />
            {{ $summary->anapath }}
          </td>
          <td>28. Khám nghiệm tử thi: [{{ $summary->autopsy }}]</td>
        </tr>
        <tr>
          <td style="border-right: 1px solid black;"></td>
          <td>29. Chẩn đoán giải phẫu tử thi: {{ $summary->autopsy_diagnosis_name }}</td>
        </tr>
      </table>
    </div>
    <!-- ký tên -->
    <table width="100%" style="text-align: center">
      <tr>
        <td width="50%"></td>
        <td><i>Ngày ....... tháng ........ năm.......</i></td>
      </tr>
      <tr>
        <td>
          <b>Giám đốc bệnh viện</b>
        </td>
        <td>
          <b>Trưởng Khoa</b>
        </td>
      </tr>
      <tr>
        <td>
          <br />
        </td>
      </tr>
      <tr>
        <td>
          <br />
        </td>
      </tr>
      <tr>
        <td>Họ và tên :</td>
        <td>Họ và tên :</td>
      </tr>
    </table>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />

    <!--A-Bệnh án-->
    <div width="100%" class="page_break">
      <b>A-BỆNH ÁN</b>
      <table width="100%">
        <!--I.Lý do vào viện-->
        <tr>
          <td width="60%"><b>I. Lý do vào viện:</b> {{ $hospitalHistory->reason }}</td>
          <td>Vào ngày thứ {{ $hospitalHistory->reason_date }} của bệnh</td>
        </tr>
        <tr>
          <td colspan="2">
            <b>II. Hỏi bệnh</b>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <b>1. Quá trình bệnh lý:</b>
            <i>(khởi phát, diễn biến, chẩn đoán, điều trị của tuyến dưới v.v...).</i>
          </td>
        </tr>
        <tr>
          <td colspan="2">{!! nl2br(e($hospitalHistory->symptoms)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">
            <b>2. Tiền sử bệnh:</b>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            + Bản thân: <i>(phát triển thể lực từ nhỏ đến lớn, những bệnh đã mắc, phương pháp ĐTr, tiêm phòng, ăn uống, sinh hoạt vv...)</i>
          </td>
        </tr>
        <tr>
          <td colspan="2">{!! nl2br(e($hospitalHistory->disease_in)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">Đặc điểm liên quan bệnh:</td>
        </tr>
        <tr>
          <td colspan="2">
            <table width="100%"  style="text-align: center; border:1px solid black;">
              <tr >
                <td style="border-bottom:1px solid black; border-right:1px solid black;" width="5%"><b>TT</b></td>
                <td style="border:1px solid black;" width="10%"></td>
                <td style="border:1px solid black;" width="10%">Ký hiệu</td>
                <td style="border:1px solid black;" width="20%">
                  Thời gian <br />
                  (tính theo tháng)
                </td>
                <td style="border:1px solid black;" width="5%"><b>TT</b></td>
                <td style="border:1px solid black;" width="10%"></td>
                <td style="border:1px solid black;" width="10%">Ký hiệu</td>
                <td style="border:1px solid black;" width="20%">
                  Thời gian <br />
                  (tính theo tháng)
                </td>
              </tr>
              <tr>
                <td style="border:1px solid black;" style="border:1px solid black;">01</td>
                <td style="border:1px solid black;">Dị ứng</td>
                <td style="border:1px solid black;">{{ $hospitalHistory->disease_diung }}</td>
                <td style="border:1px solid black;"><i>(dị nguyên)</i> {{ $hospitalHistory->disease_diung_time }}</td>
                <td style="border:1px solid black;">04</td>
                <td style="border:1px solid black;">Thuốc lá</td>
                <td style="border:1px solid black;">{{ $hospitalHistory->disease_thuocla }}</td>
                <td style="border:1px solid black;">{{ $hospitalHistory->disease_thuocla_time }}</td>
              </tr>
              <tr>
                <td style="border-bottom:1px solid black; border-right:1px solid black;">02</td>
                <td style="border:1px solid black;">Ma túy</td>
                <td style="border:1px solid black;">{{ $hospitalHistory->disease_matuy }}</td>
                <td style="border:1px solid black;">{{ $hospitalHistory->disease_matuy_time }}</td>
                <td style="border:1px solid black;">05</td>
                <td style="border:1px solid black;">Thuốc lào</td>
                <td style="border:1px solid black;">{{ $hospitalHistory->disease_thuoclao }}</td>
                <td style="border:1px solid black;">{{ $hospitalHistory->disease_thuoclao_time }}</td>
              </tr>
              <tr>
                <td style="border-bottom:1px solid black; border-right:1px solid black;">03</td>
                <td style="border:1px solid black;">Rượu bia</td>
                <td style="border:1px solid black;">{{ $hospitalHistory->disease_ruoubia }}</td>
                <td style="border:1px solid black;">{{ $hospitalHistory->disease_ruoubia_time }}</td>
                <td style="border:1px solid black;">06</td>
                <td style="border:1px solid black;">Khác</td>
                <td style="border:1px solid black;">{{ $hospitalHistory->disease_khac }}</td>
                <td style="border:1px solid black;">{{ $hospitalHistory->disease_khac_time }}</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="2">+ Gia đình: <i>(Những người trong gia đình: bệnh đã mắc, đời sống, tinh thần, vật chất v.v...).</i></td>
        </tr>
        <tr>
          <td colspan="2">{!! nl2br(e($hospitalHistory->disease_out)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">
            <b>III. Khám bệnh</b>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <b>1. Toàn thân: </b> <i>: (ý thức, da niêm mạc, hệ thống hạch, tuyến giáp, vị trí, kích thước, số lượng, di động v.v...)</i>
          </td>
        </tr>
        <tr>
          <td width="50%">{!! nl2br(e($vital->note)) !!}</td>
          <td>
            <table width="100%">
              <tr>
                <td>Mạch</td>
                <td>{{ $vital->pulse }}</td>
                <td style="text-align: right">lần/ph</td>
              </tr>
              <tr>
                <td>Nhiệt độ</td>
                <td>{{ $vital->temperature }}</td>
                <td style="text-align: right">°C</td>
              </tr>
              <tr>
                <td>Huyết áp</td>
                <td>{{ $vital->systolic }} / {{ $vital->diastolic }}</td>
                <td style="text-align: right">mmHg</td>
              </tr>
              <tr>
                <td>Nhịp thở</td>
                <td>{{ $vital->respiration }}</td>
                <td style="text-align: right">lần/phút</td>
              </tr>
              <tr>
                <td>Cân nặng</td>
                <td>{{ $vital->weight }}</td>
                <td style="text-align: right">kg</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <b>2. Các cơ quan</b>
          </td>
        </tr>
        <tr>
          <td colspan="2">+ Tuần hoàn: {!! nl2br(e($body->diagnosis_tuanhoan)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Hô hấp: {!! nl2br(e($body->diagnosis_hohap)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Tiêu hóa: {!! nl2br(e($body->diagnosis_tieuhoa)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Thận- Tiết niệu- Sinh dục: {!! nl2br(e($body->diagnosis_than_tietnieu_sinhduc)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Thần Kinh: {!! nl2br(e($body->diagnosis_thankinh)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Cơ- Xương- Khớp: {!! nl2br(e($body->diagnosis_coxuongkhop)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Tai- Mũi- Họng: {!! nl2br(e($body->diagnosis_taimuihong)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Mắt: {!! nl2br(e($body->diagnosis_mat)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">+ Nội tiết, dinh dưỡng và các bệnh lý khác: {!! nl2br(e($body->diagnosis_noitiet_dinhduong_khac)) !!}</td>
        </tr>
        <tr>
          <td colspan="2">
            <b>3. Các xét nghiệm cận lâm sàng cần làm:</b>
          </td>
        </tr>
        <tr>
          <td colspan="2">{{ $imaging->type }}</td>
        </tr>
        <tr>
          <td colspan="2">{{ $lab->type }}</td>
        </tr>
        <tr>
          <td colspan="2">
            <b>4. Tóm tắt bệnh án: </b>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            Người bệnh {{ $patientInfo->full_name }} <br />
            Nhập viện vì {{ $hospitalHistory->reason }}, vào ngày thứ {{ $hospitalHistory->reason_date }} của bệnh <br />
            Qua thăm hỏi và khám bệnh phát hiện các triệu chứng và hội chứng sau: <br />
            + Triệu chứng: {!! nl2br(e($hospitalHistory->symptoms)) !!}<br />
            + Hội chứng: {!! nl2br(e($body->diagnosis_syndrome)) !!}
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <b>IV. Chẩn đoán khi vào khoa điều trị</b>
          </td>
        </tr>
        <tr>
          <td colspan="2">+ Bệnh chính: <br /> {{ $treatment->disease_main }}</td>
        </tr>
        <tr>
          <td colspan="2">+ Bệnh kèm theo: <i>(nếu có)</i>: <br /> {{ $treatment->disease_sub }}</td>
        </tr>
        <tr>
          <td colspan="2">+ Phân biệt: {{ $treatment->disease_difference }}</td>
        </tr>
        <tr>
          <td colspan="2">
            <b>V. Tiên lượng:</b> <br />
            {!! nl2br(e($treatment->disease_prognosis)) !!}
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <b>VI. Hướng điều trị:</b> <br />
            {!! nl2br(e($treatment->disease_plan)) !!}
          </td>
        </tr>
        <tr>
          <td width="50%"></td>
          <td>
            <table width="100%" style="text-align: center">
              <tr>
                <td colspan="2"><i>Ngày......tháng......năm</i></td>
              </tr>
              <tr>
                <td colspan="2"><b>Bác sỹ làm bệnh án</b></td>
              </tr>
              <tr>
                <td colspan="2"><br /><br /><br /><br /><br /></td>
              </tr>
              <tr>
                <td colspan="2"><i>Họ và tên</i> <b> {{ $data->medical_user_name }} </b></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr width="100%">
          <td colspan="2">
            <table width="100%" class="page_break">
              <tr width="100%" class="page_break">
                <td colspan="2">
                  <b>B. TỔNG KẾT BỆNH ÁN </b>
                </td>
              </tr>
              <tr width="100%">
                <td colspan="4">
                  <b>1. Quá trình bệnh lý và diễn biến lâm sàng: </b> <br />
                  {!! nl2br(e($hospitalHistory->symptoms)) !!} {!! nl2br(e($body->diagnosis_syndrome)) !!}
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <b>2. Tóm tắt kết quả xét nghiệm cận lâm sàng có giá trị chẩn đoán:</b> <br />
                  {!! nl2br(e($imaging->comment)) !!} <br>
                  {!! nl2br(e($lab->comment)) !!}
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <b>3. Phương pháp điều trị: </b> <br />
                  {!! nl2br(e($summary->therapy)) !!}
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <b>4. Tình trạng người bệnh ra viện:</b> <br />
                  {!! nl2br(e($summary->patient_condition)) !!}
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <b>5. Hướng điều trị và các chế độ tiếp theo:</b> <br />
                  {!! nl2br(e($summary->therapy_plan)) !!}
                </td>
              </tr>
              <tr>
                <td style="border:1px solid black; text-align: center;" colspan="2" style=""><b>Hồ sơ, phim ảnh</b></td>
                <td style="border:1px solid black; text-align: center;" width="30%" rowspan="4" >
                  <b> Người giao hồ sơ</b> <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  Họ tên
                </td>
                <td style="border:1px solid black; text-align: center;" width="30%" rowspan="8" >
                  Ngày.....tháng.....năm..... <br />
                  <b>Bác sỹ điều trị</b>
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />Họ tên <b>{{ $data->treatment_user_name }}</b>
                </td>
              </tr>
              <tr>
                <td style="border:1px solid black; text-align: center">
                  <b>Loại</b>
                </td>
                <td style="border:1px solid black; text-align: center">
                  <b>Số tờ</b>
                </td>
              </tr>
              <tr>
                <td style="border:1px solid black;">&nbsp;- X-quang</td>
                <td style="border:1px solid black;" class="center">{{ $summary->dx_count }}</td>
              </tr>
              <tr>
                <td style="border:1px solid black;">&nbsp;- CT Scanner</td>
                <td style="border:1px solid black;" class="center">{{ $summary->ct_count }}</td>
              </tr>
              <tr>
                <td style="border:1px solid black;">&nbsp;- Siêu âm</td>
                <td style="border:1px solid black;" class="center">{{ $summary->us_count }}</td>
                <td style="border:1px solid black; text-align: center;" width="30%" rowspan="4">
                  <b> Người nhận hồ sơ</b> <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  Họ tên
                </td>
              </tr>
              <tr>
                <td style="border:1px solid black;">&nbsp;- Xét nghiệm</td>
                <td style="border:1px solid black;" class="center">{{ $summary->lab_count }}</td>
              </tr>
              <tr>
                <td style="border:1px solid black;">&nbsp;- Khác............</td>
                <td style="border:1px solid black;" class="center">{{ $summary->other_count }}</td>
              </tr>
              <tr>
                <td style="border:1px solid black;">&nbsp;- Toàn bộ hồ sơ</td>
                <td style="border:1px solid black;" class="center">{{ $summary->total_count }}</td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>
