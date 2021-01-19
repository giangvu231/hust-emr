<!DOCTYPE html>
<html>
  <head>
    <title>Phiếu theo dõi chức năng sống</title>
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
  </style>

  <body style="font-family: Times New Roman; font-size: 12px">
    <table style="width: 100%; border: 1px solid white" class="removeBorder">
      <tr class="removeBorder">
        <td width="20%" class="removeBorder">Sở Y tế Tỉnh Phú Thọ</td>
        <td width="60%" rowspan="3" style="text-align: center; font-size: 20px" class="removeBorder">
          <b>PHIẾU THEO DÕI CHỨC NĂNG SỐNG</b>
        </td>
        <td width="20%" class="removeBorder">MS: 01/BV-01</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder">TTYT Huyện Cẩm Khê</td>
        <td class="removeBorder">Số HSBA: {{ $patientInfo->unique_id }}</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder">Khoa: {{ $treatment->department }}</td>
        <td class="removeBorder"></td>
      </tr>
    </table>
    <br />
    <table width="100%" class="removeBorder">
      <tr class="removeBorder">
        <td width="50%" class="removeBorder">Họ tên bệnh nhân: <span class="uppercase">{{ $patientInfo->full_name }}</span></td>
        <td width="30%" class="removeBorder">Tuổi: {{ $patientInfo->age }}</td>
        <td width="20%" class="removeBorder">Giới: {{ $patientInfo->sex }}</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder">Số giường: {{ $treatment->bed_id }}</td>
        <td colspan="2" class="removeBorder">Buồng: {{ $treatment->room }}</td>
      </tr>
      <tr class="removeBorder">
        <td colspan="3" class="removeBorder">Chẩn đoán: {{ $treatment->icd10_treatment_name }}</td>
      </tr>
    </table>
    <br />
    <table width="100%">
      <tr class="textCenter">
        <td width="15%" colspan="2">Ngày, tháng</td>
        <td width="15%" colspan="2"></td>
        <td width="15%" colspan="2"></td>
        <td width="15%" colspan="2"></td>
        <td width="15%" colspan="2"></td>
        <td width="15%" colspan="2"></td>
      </tr>

      <tr class="textCenter">
        <td>Mạch <br />L/ph</td>
        <td>Nhiệt <br />độ C</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr class="textCenter">
        <td>160</td>
        <td>41</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr class="textCenter">
        <td>140</td>
        <td>40</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr class="textCenter">
        <td>120</td>
        <td>39</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr class="textCenter">
        <td>100</td>
        <td>38</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr class="textCenter">
        <td>80</td>
        <td>37</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr class="textCenter">
        <td>60</td>
        <td>36</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
      <tr class="textCenter">
        <td>40</td>
        <td>35</td>
        <td></td>
        <td></td>
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
        <td colspan="2">&nbsp; 1. Huyết áp: {{ $vital->systolic }} / {{ $vital->diastolic }} <br />&nbsp; (mmHg)</td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="2">
          &nbsp; 2. Cân nặng: {{ $vital->weight }}
          <br />&nbsp; (Kg)
        </td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
      </tr>
      <tr>
        <td colspan="2">&nbsp; 3. Nhịp thở: {{ $vital->respiration }} <br />&nbsp; (lần/phút)</td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
      </tr>
      <tr>
      <td colspan="2">&nbsp; 4. Mạch: {{ $vital->pulse }} <br />&nbsp; (lần/phút)</td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
      </tr>
      <tr>
      <td colspan="2">&nbsp; 5. Chiều cao: {{ $vital->height }} <br />&nbsp; (cm)</td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
      </tr>
      <tr style="height: fit-content; text-align: center">
        <td colspan="2">
          Y tá-ĐD <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          <br />
          Ký và ghi tên
        </td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
        <td colspan="2"></td>
      </tr>
    </table>
    <p>
      <i>Ghi chú: ô số 1, 2, 3, 4, 5 để ghi các chỉ số theo dõi chỉ định của bác sỹ. </i> <br />
      <b> Hướng dẫn:</b> <br />
      - In khổ A4 dọc, 2 mặt như nhau, dòng kẻ dưới 37 độ C in đậm. <br />
      - Nhiệt độ: mầu xanh, Mạch: mầu đỏ; phiếu này được cài ở bảng đầu giường.
    </p>
  </body>
</html>
