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
      border: solid black 1px;
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
  </style>

  <body style="font-family: Times New Roman">
    <!-- header -->
    <div class="header">
      <table width="100%">
        <tr>
          <td width="30%">Sở Y tế:</td>
          <td width="40%" rowspan="3" style="text-align: center; font-size: 25px">
            <b>BỆNH ÁN NỘI KHOA</b>
          </td>
          <td width="30%">Số lưu trữ: {{ $patientInfo->unique_id }}</td>
        </tr>
        <tr>
          <td width="30%">Bệnh viện:</td>
          <td width="30%">Mã YT</td>
        </tr>

        <tr>
          <td width="30%">Khoa: {{ $patientTreatment->department }} &nbsp; Giường: {{ $patientTreatment->bed_id }}</td>
          <td width="30%"></td>
        </tr>
      </table>
    </div>
    <!-- Thông tin bệnh nhân -->
    <div>
      <b>I. HÀNH CHÍNH</b>
      <br />
      <table width="100%">
        <tr>
          <td width="50%">1. Họ và tên <i>(In hoa)</i>: <span class="uppercase">{{ $patientInfo->full_name }}</span></td>
          <td width="50%">2. Sinh ngày: {{ $patientInfo->dob }} &nbsp;&nbsp;Tuổi:</td>
        </tr>
        <tr>
          <td width="50%">3. Giới tính: {{ $patientInfo->sex }}</td>
          <td width="50%">4. Nghề nghiệp : {{ $patientInfo->occupation }}</td>
        </tr>
        <tr>
          <td width="50%">5. Dân tộc: {{ $patientInfo->race }}</td>
          <td width="50%">6. Ngoại kiều: {{ $patientInfo->foreign }}</td>
        </tr>
      </table>
      <table width="100%">
        <tr>
          <td colspan="2">7. Địa chỉ : {{ $patientInfo->home_address }}</td>
        </tr>
        <tr>
          <td width="50%">8. Nơi làm việc : {{ $patientInfo->work_address }}</td>
          <td>9. Đối tượng : {{ $patientInfo->type_of_object }}</td>
        </tr>
        <tr>
          <td>10. BHYT giá trị đến: {{ $patientInfo->health_insurance_date }}</td>
          <td>Số thẻ BHYT: {{ $patientInfo->health_insurance_id }}</td>
        </tr>
        <tr>
          <td colspan="2">
            11. Họ tên, địa chỉ người nhà khi cần báo tin: {{ $patientInfo->name_next_of_kin }} - Đ/C: {{ $patientInfo->home_next_of_kin }}
          </td>
        </tr>
        <tr>
          <td colspan="2">Số điện thoại người nhà : {{ $patientInfo->phone_next_of_kin }}</td>
        </tr>
      </table>
    </div>
    <!-- Quản lý người bệnh -->
    <div>
      <b> II. QUẢN LÝ NGƯỜI BỆNH </b>
      <br />
      <table width="100%" style="border: 1px solid black">
        <tr>
          <td width="50%">12. Vào viện: {{ $hospitalHistory->date_admitted }}</td>
          <td>14. Nơi giới thiệu: {{ $hospitalHistory->refer_dept }}</td>
        </tr>
        <tr>
          <td>13. Trực tiếp vào: {{ $hospitalHistory->admit_dept }}</td>
          <td>Vào viện do bệnh này lần thứ: {{ $hospitalHistory->reason_count }}</td>
        </tr>
      </table>
      <table width="100%" style="border: 1px solid black">
        <tr>
          <td width="50%">15. Vào Khoa : {{ $hospitalHistory->department }}</td>
          <td>
            17. Chuyển viện:
            <br />
            Chuyển đến:
          </td>
        </tr>
        <tr>
          <td>16. Chuyển khoa lần 1:</td>
          <td>18. Ra viện:</td>
        </tr>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Chuyển khoa lần 2:</td>
          <td>19. Tổng số ngày điều trị</td>
        </tr>
      </table>
    </div>
    <!-- Chẩn đoán -->
    <div>
      <b> III. CHẨN ĐOÁN </b>
      <table width="100%" style="border: 1px solid black">
        <tr>
          <td width="50%">
            20. Nơi chuyển đến:
            <br />
            21. KKB, cấp cứu:
            <br />
            22. Khi vào khoa điều trị:
            <br />
            + Thủ thuật: &nbsp;&nbsp; + Phẫu thuật:
          </td>
          <td>
            23. Ra viện:
            <br />
            + Bệnh chính:
            <br />
            + Bệnh kèm theo:
            <br />
            + Tai biến: &nbsp;&nbsp; + Biến chứng:
          </td>
        </tr>
      </table>
    </div>
    <!-- Tình trạng ra viện -->
    <div>
      <b> IV. TÌNH TRẠNG RA VIỆN </b>
      <table width="100%" style="border: 1px solid black">
        <tr>
          <td>Kết quả điều trị:</td>
          <td>Tình trạng tử vong:</td>
        </tr>
        <tr>
          <td>Giải phẫu bệnh (khi có sinh thiết):</td>
          <td>Nguyên nhân tử vong chính</td>
        </tr>
        <tr>
          <td>Khám nghiệm tử thi :</td>
          <td>Chẩn đoán giải phẫu tử thi :</td>
        </tr>
      </table>
    </div>
    <!-- ký tên -->
    <table width="100%" style="text-align: center">
      <tr>
        <td></td>
        <td>Ngày .... Tháng .... năm</td>
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
    <div>
      <b>A-BỆNH ÁN</b>
      <table width="100%">
        <!--I.Lý do vào viện-->
        <tr>
          <td width="60%"><b>I. Lý do vào viện:</b> {{ $hospitalHistory->reason }}</td>
          <td>Vào ngày thứ {{ $hospitalHistory->reason_date }} của bệnh</td>
        </tr>
      </table>
      <table width="100%">
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
          <td colspan="2">{{ $hospitalHistory->symptoms }}</td>
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
          <td colspan="2">{{ $hospitalHistory->disease_in }}</td>
        </tr>
        <tr>
          <td colspan="2">Đặc điểm liên quan bệnh:</td>
        </tr>
        <tr>
          <td colspan="2">
            <table width="100%" border="1px solid black" style="text-align: center">
              <tr>
                <td width="5%"><b>TT</b></td>
                <td width="10%"></td>
                <td width="10%">Ký hiệu</td>
                <td width="20%">
                  Thời gian <br />
                  (tính theo tháng)
                </td>
                <td width="5%"><b>TT</b></td>
                <td width="10%"></td>
                <td width="10%">Ký hiệu</td>
                <td width="20%">
                  Thời gian <br />
                  (tính theo tháng)
                </td>
              </tr>
              <tr>
                <td>01</td>
                <td>Dị ứng</td>
                <td>{{ $hospitalHistory->disease_diung }}</td>
                <td><i>(dị nguyên)</i> {{ $hospitalHistory->disease_diung_time }}</td>
                <td>04</td>
                <td>Thuốc lá</td>
                <td>{{ $hospitalHistory->disease_thuocla }}</td>
                <td>{{ $hospitalHistory->disease_thuocla_time }}</td>
              </tr>
              <tr>
                <td>02</td>
                <td>Ma túy</td>
                <td>{{ $hospitalHistory->disease_matuy }}</td>
                <td>{{ $hospitalHistory->disease_matuy_time }}</td>
                <td>05</td>
                <td>Thuốc lào</td>
                <td>{{ $hospitalHistory->disease_thuoclao }}</td>
                <td>{{ $hospitalHistory->disease_thuoclao_time }}</td>
              </tr>
              <tr>
                <td>03</td>
                <td>Rượu bia</td>
                <td>{{ $hospitalHistory->disease_ruoubia }}</td>
                <td>{{ $hospitalHistory->disease_ruoubia_time }}</td>
                <td>06</td>
                <td>Khác</td>
                <td>{{ $hospitalHistory->disease_khac }}</td>
                <td>{{ $hospitalHistory->disease_khac_time }}</td>
              </tr>
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="2">+ Gia đình: <i>(Những người trong gia đình: bệnh đã mắc, đời sống, tinh thần, vật chất v.v...).</i></td>
        </tr>
        <tr>
          <td colspan="2">{{ $hospitalHistory->disease_out }}</td>
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
          <td width="70%">{!! nl2br(e($patientVital->note)) !!}</td>
          <td>
            <table width="100%">
              <tr>
                <td>Mạch</td>
                <td>{{ $patientVital->pulse }}</td>
                <td style="text-align: right">lần/ph</td>
              </tr>
              <tr>
                <td>Nhiệt độ</td>
                <td>{{ $patientVital->temperature }}</td>
                <td style="text-align: right">°C</td>
              </tr>
              <tr>
                <td>Huyết áp</td>
                <td>{{ $patientVital->systolic }} / {{ $patientVital->diastolic }}</td>
                <td style="text-align: right">mmHg</td>
              </tr>
              <tr>
                <td>Nhịp thở</td>
                <td>{{ $patientVital->respiration }}</td>
                <td style="text-align: right">lần/phút</td>
              </tr>
              <tr>
                <td>Cân nặng</td>
                <td>{{ $patientVital->weight }}</td>
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
          <td colspan="2">+ Tuần hoàn: {{ $patientBody->diagnosis_tuanhoan }}</td>
        </tr>
        <tr>
          <td colspan="2">+ Hô hấp: {{ $patientBody->diagnosis_hohap }}</td>
        </tr>
        <tr>
          <td colspan="2">+ Tiêu hóa: {{ $patientBody->diagnosis_tieuhoa }}</td>
        </tr>
        <tr>
          <td colspan="2">+ Thận- Tiết niệu- Sinh dục: {{ $patientBody->diagnosis_than_tietnieu_sinhduc }}</td>
        </tr>
        <tr>
          <td colspan="2">+ Thần Kinh: {{ $patientBody->diagnosis_thankinh }}</td>
        </tr>
        <tr>
          <td colspan="2">+ Cơ- Xương- Khớp: {{ $patientBody->diagnosis_coxuongkhop }}</td>
        </tr>
        <tr>
          <td colspan="2">+ Tai- Mũi- Họng: {{ $patientBody->diagnosis_taimuihong }}</td>
        </tr>
        <tr>
          <td colspan="2">+ Mắt: {{ $patientBody->diagnosis_mat }}</td>
        </tr>
        <tr>
          <td colspan="2">+ Nội tiết, dinh dưỡng và các bệnh lý khác: {{ $patientBody->diagnosis_noitiet_dinhduong_khac }}</td>
        </tr>
        <tr>
          <td colspan="2">
            <b>3. Các xét nghiệm cận lâm sàng cần làm:</b>
          </td>
        </tr>
        <tr>
          <td colspan="2">{{ $patientLab->type }}</td>
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
            + {{ $hospitalHistory->symptoms }} <br />
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <b>IV. Chẩn đoán khi vào khoa điều trị</b>
          </td>
        </tr>
        <tr>
          <td colspan="2">+ Bệnh chính: {{ $patientTreatment->disease_main }}</td>
        </tr>
        <tr>
          <td colspan="2">+ Bệnh kèm theo: <i>(nếu có)</i>: {{ $patientTreatment->disease_sub }}</td>
        </tr>
        <tr>
          <td colspan="2">+ Phân biệt: {{ $patientTreatment->disease_difference }}</td>
        </tr>
        <tr>
          <td colspan="2">
            <b>V. Tiên lượng:</b> <br />
            {{ $patientTreatment->disease_prognosis }}
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <b>VI. Hướng điều trị:</b> <br />
            {{ $patientTreatment->disease_plan }}
          </td>
        </tr>
        <tr>
          <td width="60%"></td>
          <td colspan="2">
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
                <td colspan="2"><i>Họ và tên</i></td>
              </tr>
            </table>
          </td>
        </tr>
        <tr colspan="2">
          <td colspan="2">
            <b>B. TỔNG KẾT BỆNH ÁN </b>
          </td>
        </tr>
        <tr>
          <td colspan="2">
            <table width="100%" border="1px solid black">
              <tr>
                <td colspan="4">
                  <b>1. Quá trình bệnh lý và diễn biến lâm sàng: </b> <br />
                  {!! nl2br(e($hospitalHistory->symptoms)) !!}
                  {!! nl2br(e($patientBody->diagnosis_syndrome)) !!}
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <b>2. Tóm tắt kết quả xét nghiệm cận lâm sàng có giá trị chẩn đoán:</b> <br />
                  {!! nl2br(e($patientLab->comment)) !!}
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <b>3. Phương pháp điều trị: </b> <br />
                  {!! nl2br(e($patientSummary->therapy)) !!}
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <b>4. Tình trạng người bệnh ra viện:</b> <br />
                  {!! nl2br(e($patientSummary->patient_condition)) !!}
                </td>
              </tr>
              <tr>
                <td colspan="4">
                  <b>5. Hướng điều trị và các chế độ tiếp theo:</b> <br />
                  {!! nl2br(e($patientSummary->therapy_plan)) !!}
                </td>
              </tr>
              <tr>
                <td colspan="2" style="text-align: center"><b>Hồ sơ, phim ảnh</b></td>
                <td width="30%" rowspan="4" style="text-align: center">
                  <b> Người giao hồ sơ</b> <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  Họ tên
                </td>
                <td width="30%" rowspan="8" style="text-align: center">
                  Ngày.....tháng.....năm..... <br />
                  <b>Bác sỹ điều trị</b>
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />
                  <br />Họ tên
                </td>
              </tr>
              <tr>
                <td style="text-align: center">
                  <b>Loại</b>
                </td>
                <td style="text-align: center">
                  <b>Số tờ</b>
                </td>
              </tr>
              <tr>
                <td>&nbsp;- X-quang</td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;- CT Scanner</td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;- Siêu âm</td>
                <td></td>
                <td width="30%" rowspan="4" style="text-align: center">
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
                <td>&nbsp;- Xét nghiệm</td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;- Khác............</td>
                <td></td>
              </tr>
              <tr>
                <td>&nbsp;- Toàn bộ hồ sơ</td>
                <td></td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>
  </body>
</html>
