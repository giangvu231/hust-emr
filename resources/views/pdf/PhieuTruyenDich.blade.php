<!DOCTYPE html>
<html>
  <head>
    <title>Phiếu theo dõi truyền dịch</title>
    <meta charset="utf-8" />
  </head>
  <style>
    @font-face {
      font-family: "Times New Roman" !important;
      src: url("/fonts/times.ttf");
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
    table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 0;
      height: 25px;
    }
    .removeBorder {
      border: none;
    }
    .textCenter {
      text-align: center;
    }
    span.uppercase {
      text-transform: uppercase;
    }
    .page_break {
      page-break-before: always;
    }
  </style>

  <body style="font-family: Times New Roman; font-size: 13px">
    <table class="removeBorder" width="100%">
      <tr class="removeBorder">
        <td class="removeBorder" width="20%">Sở Y tế Tỉnh Phú Thọ</td>
        <td class="removeBorder" width="60%" rowspan="3" style="text-align: center">
          <h1><b>PHIẾU THEO DÕI TRUYỀN DỊCH</b></h1>
        </td>
        <td class="removeBorder">MS: 17/BV-01</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder">TTYT Huyện Cẩm Khê</td>
        <td class="removeBorder">Mã HSBA: {{ $patientInfo->unique_id }}</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder">Khoa: {{ $treatment->department }}</td>
        <td class="removeBorder"></td>
      </tr>
    </table>
    <br />
    <table class="removeBorder" width="100%" ;>
      <tr class="removeBorder">
        <td class="removeBorder" width="50%">Họ tên người bệnh: <span class="uppercase">{{ $patientInfo->full_name }}</span></td>
        <td class="removeBorder" width="30%">Tuổi: {{ $patientInfo->age }}</td>
        <td class="removeBorder" width="20%">Nam/Nữ: {{ $patientInfo->sex }}</td>
      </tr>

      <tr class="removeBorder">
        <td class="removeBorder">Số giường: {{ $treatment->bed_id }}</td>
        <td class="removeBorder" colspan="2">Buồng: {{ $treatment->room }}</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder" colspan="3">Chẩn đoán: {{ $treatment->icd10_treatment_name }}</td>
      </tr>
    </table>
    <br />
    <table style="text-align: center" width="100%" border="1px solid black">
      <tr>
        <td rowspan="2" width="10%">
          <b
            >Ngày,
            tháng</b
          >
        </td>
        <td rowspan="2" width="10%">
          <b>TÊN TRUYỀN DỊCH/ <br />HÀM LƯỢNG</b>
        </td>
        <td rowspan="2" width="20%">
          <b>Số lượng</b>
        </td>
        <td rowspan="2" width="10%">
          <b>Lô/Số <br />Sản xuất</b>
        </td>
        <td rowspan="2" width="10%">
          <b>Tốc độ <br />Giọt/phút</b>
        </td>
        <td colspan="2"><b>Thời gian</b></td>
        <td rowspan="2" width="10%"><b>BS chỉ định</b></td>
        <td rowspan="2" width="10%"><b>YT (ĐD)<br />thực hiện</b></td>
      </tr>
      <tr>
        <td><b>Bắt đầu</b></td>
        <td><b>Kết thúc</b></td>
      </tr>

      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
    </table>
  </body>
</html>
