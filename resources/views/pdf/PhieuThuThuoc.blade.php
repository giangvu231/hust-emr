<!DOCTYPE html>
<html>
  <head>
    <title>Phiếu thử phản ứng thuốc</title>
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
        <td class="removeBorder" width="15%">Sở Y tế Tỉnh Phú Thọ</td>
        <td class="removeBorder" width="70%" rowspan="2" style="text-align: center">
          <b style="font-family: Times New Roman; font-size: 15px"
            >CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM <br />
            Độc lập-Tự do-Hạnh phúc</b
          >
        </td>
        <td class="removeBorder" width="15%">MS: 06/BV-01</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder">TTYT Huyện Cẩm Khê</td>
        <td class="removeBorder">Số HSBA: {{ $patientInfo->unique_id }}</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder" colspan="3" style="text-align: center; font-size: 18px"><h1>GIẤY THỬ PHẢN ỨNG THUỐC</h1></td>
      </tr>
    </table>
    <br />
    <table class="removeBorder" width="100%">
      <tr class="removeBorder">
        <td class="removeBorder" width="50%">Họ tên người bệnh: <span class="uppercase">{{ $patientInfo->full_name }}</span></td>
        <td class="removeBorder" width="30%">Tuổi: {{ $patientInfo->age }}</td>
        <td class="removeBorder" width="20%">Giới tính: {{ $patientInfo->sex }}</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder" colspan="3">Địa chỉ: {{ $patientInfo->home_address }}, {{ $patientInfo->district_name }}, {{ $patientInfo->city_name }}</td>
      </tr>

      <tr class="removeBorder">
        <td class="removeBorder">Khoa: {{ $treatment->department }}</td>
        <td class="removeBorder">Số giường: {{ $treatment->bed_id }}</td>
        <td class="removeBorder">Buồng: {{ $treatment->room }}</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder" colspan="3">Chẩn đoán: {{ $treatment->icd10_treatment_name }}</td>
      </tr>
    </table>
    <br />
    <table width="100%" border="1px solid black" style="text-align: center">
      <tr>
        <td>
          <b>
            Bắt đầu thử <br />Giờ/phút <br />
            Ngày/tháng</b
          >
        </td>
        <td width="20%">
          <b>
            Tên thuốc, nước sản xuất <br />lô, số sản xuất <br />
            hàm lượng, đơn vị</b
          >
        </td>
        <td><b> Phương pháp thử</b></td>
        <td><b>Bác sĩ chỉ định</b> <br /><i>(Kí, ghi họ tên)</i></td>
        <td>
          <b>Người thử</b> <br />
          <i>(Kí, ghi họ tên)</i>
        </td>
        <td>
          <b>
            Bác sĩ đọc và <br />
            kiểm tra</b
          >
          <br />
          <i>(Kí, ghi họ tên)</i>
        </td>
        <td>
          <b
            >Giờ, phút <br />
            đọc kết quả</b
          >
          <br />
          <i>(Viết chữ)</i>
        </td>
      </tr>
      <tr>
        <td>&nbsp;</td>
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
      </tr>
      <tr>
        <td>&nbsp;</td>
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
      </tr>
      <tr>
        <td>&nbsp;</td>
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
      </tr>
      <tr>
        <td>&nbsp;</td>
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
      </tr>
      <tr>
        <td>&nbsp;</td>
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
      </tr>
      <tr>
        <td>&nbsp;</td>
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
      </tr>
    </table>
  </body>
</html>
