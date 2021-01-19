<!DOCTYPE html>
<html>
  <head>
    <title>Biên bản hội chẩn</title>
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

  <body style="font-family: Times New Roman; font-size: 14px">
    <table class="removeBorder" width="100%">
      <tr class="removeBorder">
        <td class="removeBorder" width="20%">Sở Y tế Tỉnh Phú Thọ</td>
        <td class="removeBorder" width="60%" rowspan="3" style="text-align: center">
          <b
            >CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM <br />
            Độc lập-Tự do-Hạnh phúc <br />---------------------------</b
          >
        </td>
        <td class="removeBorder">MS: 40/BV-01</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder">TTYT Huyện Cẩm Khê</td>
        <td class="removeBorder">Số HSBA: {{ $patientInfo->unique_id }}</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder">Khoa: {{ $treatment->department }}</td>
        <td class="removeBorder"></td>
      </tr>
      <br />
      <tr class="removeBorder">
        <td class="removeBorder" colspan="3" style="text-align: center">
          <h1><b>TRÍCH BIÊN BẢN HỘI CHẨN</b></h1>
        </td>
      </tr>
    </table>
    <br />
    <table class="removeBorder" width="100%" style="text-align: left">
      <tr class="removeBorder">
        <td class="removeBorder" width="50%">Họ tên bệnh nhân: <span class="uppercase">{{ $patientInfo->full_name }}</span></td>
        <td class="removeBorder" width="30%">Tuổi: {{ $patientInfo->age }}</td>
        <td class="removeBorder" width="20%">Giới tính: {{ $patientInfo->sex }}</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder" width="50%">Đã điều trị từ ngày:</td>
        <td class="removeBorder" width="50%" colspan="2">đến ngày:</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder">Tại số giường: {{ $treatment->bed_id }}</td>
        <td class="removeBorder">Buồng: {{ $treatment->room }}</td>
        <td class="removeBorder">Khoa: {{ $treatment->department }}</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder" colspan="2">Chẩn đoán: </td>
        <td class="removeBorder">Hội chẩn lúc:</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder" width="50%;">Chủ tọa</td>
        <td class="removeBorder" width="50%;" colspan="2">Thư kí:</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder" colspan="3">
          Thành viên tham gia: <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
        </td>
      </tr>
    </table>
    <br />
    <br />
    <div><b>Tóm tắt quá trình diễn biến bệnh, quá trình điều trị và chăm sóc người bệnh:</b> <br /></div>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <div><b>Kết luận (sau khi đã khám lại và thảo luận):</b> <br /></div>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <p><b> Hướng điều trị tiếp:</b></p>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <table width="100%" style="text-align: center" class="removeBorder">
      <tr class="removeBorder">
        <td class="removeBorder" width="50%"></td>
        <td class="removeBorder" width="50%"><i>Ngày.............tháng............năm...........</i></td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder"><b>THƯ KÍ</b></td>
        <td class="removeBorder"><b>CHỦ TỌA</b></td>
      </tr>
    </table>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
  </body>
</html>
