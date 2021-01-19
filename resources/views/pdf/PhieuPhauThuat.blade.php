<!DOCTYPE html>
<html>
  <head>
    <title>Phiếu phẫu thuật</title>
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
    /* table,
    th,
    td {
      border: 1px solid black;
      border-collapse: collapse;
      padding: 0;
      height: 25px;
    } */
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

  <body style="font-family: Times New Roman; font-size: 14px">
    <table width="100%">
      <tr>
        <td width="20%">Sở Y tế Tỉnh Phú Thọ</td>
        <td width="60%" rowspan="2" style="text-align: center">
          <h2><b>PHIẾU PHẪU THUẬT/THỦ THUẬT</b></h2>
        </td>
        <td>MS: 14/BV-01</td>
      </tr>
      <tr>
        <td>TTYT Huyện Cẩm Khê</td>
        <td>Số HSBA: {{ $patientInfo->unique_id }}</td>
      </tr>
    </table>
    <br />
    <table width="100%" ;>
      <tr>
        <td width="50%">Họ tên bệnh nhân: <span class="uppercase">{{ $patientInfo->full_name }}</span></td>
        <td width="30%">Tuổi: {{ $patientInfo->age }}</td>
        <td width="20%">Giới tính: {{ $patientInfo->sex }}</td>
      </tr>
    </table>
    <table width="100%">
      <tr>
        <td width="40%">Khoa: {{ $treatment->department }}</td>
        <td width="30%">Buồng: {{ $treatment->room }}</td>
        <td width="30%">Giường: {{ $treatment->bed_id }}</td>
      </tr>
      <tr>
        <td>Vào viện lúc:</td>
      </tr>
      <tr>
        <td>Phẫu thuật/thủ thuật lúc:</td>
      </tr>
      <tr>
        <td>Chẩn đoán:</td>
      </tr>
      <tr>
        <td>Trước phẫu thuật/thủ thuật:</td>
      </tr>
      <tr>
        <td>Sau phẫu thuật/thủ thuật:</td>
      </tr>
      <tr>
        <td>Phương pháp phẫu thuật/thủ thuật:</td>
      </tr>
      <tr>
        <td>Loại phẫu thuật/thủ thuật:</td>
      </tr>
      <tr>
        <td>Phương pháp vô cảm:</td>
      </tr>
      <tr>
        <td>Bác sĩ phẫu thuật/thủ thuật:</td>
      </tr>
      <tr>
        <td>Bác sĩ gây mê hồi sức:</td>
      </tr>
    </table>
    <table width="100%" style="text-align: center">
      <tr>
        <td><b> LƯỢC ĐỒ PHẪU THUẬT/THỦ THUẬT</b></td>
      </tr>
      <table width="100%" style="text-align: left">
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>

        <tr>
          <td width="100%">Dẫn lưu:</td>
        </tr>
        <tr>
          <td width="100%">Bấc:</td>
        </tr>
        <tr>
          <td width="100%">Ngày rút:</td>
        </tr>
        <tr>
          <td width="100%">Ngày cắt chỉ:</td>
        </tr>
        <tr>
          <td width="100%">Khác:</td>
        </tr>
      </table>
    </table>

    <br />
    <br />
    <br />
    <br />

    <table width="100%" style="text-align: center">
      <tr>
        <td width="100%"><b> TRÌNH TỰ PHẪU THUẬT</b></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
      </tr>

      <tr>
        <td>&nbsp;</td>
      </tr>
    </table>
    <table width="100%" style="text-align: center">
      <tr>
        <td width="50%">&nbsp;</td>
        <td><i> Ngày.....tháng.....năm.......</i></td>
      </tr>
      <tr>
        <td width="50%">&nbsp;</td>
        <td><b> PHẪU THUẬT/THỦ THUẬT VIÊN</b></td>
      </tr>
      <tr>
        <td width="50%">&nbsp;</td>
      </tr>
      <tr>
        <td width="50%">&nbsp;</td>
      </tr>
      <tr>
        <td width="50%">&nbsp;</td>
      </tr>
      <tr>
        <td width="50%">&nbsp;</td>
      </tr>
      <tr>
        <td width="50%">&nbsp;</td>
        <td>Họ tên:</td>
      </tr>
    </table>
  </body>
</html>
