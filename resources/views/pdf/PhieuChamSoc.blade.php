<!DOCTYPE html>
<html>
  <head>
    <title>Phiếu chăm sóc</title>
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

  <body style="font-family: Times New Roman; font-size: 12px">
    <table width="100%" class="removeBorder">
      <tr class="removeBorder">
        <td width="20%" class="removeBorder">Sở y tế Tỉnh Phú Thọ</td>
        <td width="60%" rowspan="3" style="text-align: center" class="removeBorder">
          <b style="font-family: Times New Roman; font-size: 30px">PHIẾU CHĂM SÓC</b>
          <br />
          Y tá (điều dưỡng) ghi &emsp;&emsp; <br />
        </td>
        <td class="removeBorder">MS: 09/BV-01</td>
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
        <td class="removeBorder" width="50%">Họ tên bệnh nhân: <span class="uppercase">{{ $patientInfo->full_name }}</span></td>
        <td class="removeBorder" width="30%">Tuổi: {{ $patientInfo->age }}</td>
        <td class="removeBorder" width="20%">Giới tính: {{ $patientInfo->sex }}</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder" width="20%">Số giường: {{ $treatment->bed_id }}</td>
        <td class="removeBorder" width="20%" colspan="2">Buồng: {{ $treatment->room }}</td>
      </tr>
      <tr class="removeBorder">
        <td class="removeBorder" colspan="3">Chẩn đoán: {{ $treatment->icd10_treatment_name }}</td>
      </tr>
    </table>
    <br />
    <table width="100%" border="1px solid black" class="textCenter">
      <tr>
        <td width="10%"><b>Ngày</b></td>
        <td width="10%"><b>Giờ, phút</b></td>
        <td width="30%"><b>Theo dõi diễn biến</b></td>
        <td width="30%"><b>Thực hiện y lệnh/chăm sóc</b></td>
        <td width="20%"><b>Ký tên</b></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
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
      </tr>

      <tr>
        <td>&nbsp;</td>
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
      </tr>

      <tr>
        <td>&nbsp;</td>
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
      </tr>

      <tr>
        <td>&nbsp;</td>
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
      </tr>

      <tr>
        <td>&nbsp;</td>
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
      </tr>

      <tr>
        <td>&nbsp;</td>
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
      </tr>

      <tr>
        <td>&nbsp;</td>
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
      </tr>
      <tr>
        <td>&nbsp;</td>
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
      </tr>

      <tr>
        <td>&nbsp;</td>
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
      </tr>

      <tr>
        <td>&nbsp;</td>
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
      </tr>

      <tr>
        <td>&nbsp;</td>
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
      </tr>

      <tr>
        <td>&nbsp;</td>
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
      </tr>

      <tr>
        <td>&nbsp;</td>
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
      </tr>

      <tr>
        <td>&nbsp;</td>
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
      </tr>
    </table>
    <br />
    <div><b>Hướng dẫn:</b> <i>In khổ A4 dọc, 2 mặt</i></div>

    <div class="page_break">
      <h3 class="textCenter">
        <b>HƯỚNG DẪN GHI CHÉP PHIẾU CHĂM SÓC</b>
      </h3>
      <h5><b>Mục đích sử dụng Phiếu chăm sóc:</b></h5>
      <p>1. Là phiếu dùng để ghi diễn biến của người bệnh về chăm sóc, xử trí và thực hiện các y lệnh về điều trị của y tá (điều dưỡng).</p>
      <p>2. Là phiếu để thực hiện thông tin giữa các y tá (điều dưỡng) và giữa y tá (điều dưỡng) với bác sĩ điều trị.</p>
      <p>3. Là tài liệu pháp lí để xem xét đánh giá trách nhiệm trong phạm vị chức năng và nhiệm vụ của y tá (điều dưỡng).</p>
      <h5>Nguyên tắc chung:</h5>
      <p>1. Ghi kịp thời: ngay sau khi theo dõi, chăm sóc hoặc xử trí cho người bệnh.</p>
      <p>2. Thông tin ngắn gọn, chính xác: chỉ ghi những thông tin trong phạm vi trách nhiệm của y tá (điều dưỡng).</p>
      <p>3. Không ghi trùng lặp thông tin: các thông tin đã ghi trên các phiếu (phiếu theo dõi chức năng sống…) sẽ không ghi lại trên phiếu này.</p>
      <p>
        4. Kiểm tra lại ngay hoặc trao đổi ngay với bác sĩ điều trị, nếu y tá (điều dưỡng) phát hiện có những thông tin khác biệt với nhận xét của bác
        sĩ.
      </p>
      <h5>Hướng dẫn ghi Phiếu chăm sóc</h5>
      <p>1. Mỗi lần ghi vào phiếu chăm sóc phải ghi ngày, giờ và phút tại thời điểm mà người y tá (điều dưỡng) theo dõi hoặc chăm sóc người bệnh.</p>
      <p>
        2. Cột diễn biến ghi ngắn gọn những diễn biến hoặc tình trạng bất thường của người bệnh mà người y tá (điều dưỡng) theo dõi được. Kể cả những
        than phiền, kiến nghị của người bệnh.
      </p>
      <p>
        3. Cột thực hiện y lệnh/ chăm sóc: <br />
        - <b>Về chăm sóc:</b> ghi những hành động chăm sóc (tắm, vệ sinh, thay đổi tư thế, chăm sóc vết loét, giáo dục sức khoẻ, hướng dẫn người
        bệnh...). <br />
        - <b>Về xử trí:</b> chỉ ghi những xử trí khi có tình huống cần giải quyết trong phạm vi quyền hạn, trách nhiệm của y tá (điều dưỡng) sơ cứu
        ban đầu cùng với việc báo bác sĩ hoặc các xử trí thông thường (thay băng, đắp khăn chườm lạnh khi người bệnh sốt cao...)<br />
        - <b>Về đánh giá kết quả:</b> ghi những kết quả mang lại ngay sau xử trí chăm sóc nếu có như: sau khi hút làm thông đường mũi miệng người bệnh
        thấy dễ thở hơn...<br />
        - <b>Về thực hiện y lệnh:</b> Ghi việc thực hiện y lệnh đặc biệt, bổ xung đột xuất theo hồ sơ bệnh án. Các y lệnh thường quy được ghi đánh dấu
        trong sổ thực hiện y lệnh nên chỉ cần ghi đã thực hiện theo y lệnh. Riêng y lệnh truyền dịch phải ghi rõ: mạch, nhiệt độ, huyết áp, nhịp thở
        trước, trong và kết thúc truyền, khối lượng dịch đã truyền và những bất thường xẩy ra trong suốt quá trình truyền dịch.
      </p>
      <p>4. Cột kí tên: Y tá (điều dưỡng) ghi rõ tên của mình đủ để mọi người nhận dạng được chữ kí.</p>
      <p>
        5. Đối với người bệnh chăm sóc cấp I, cấp II cần ghi thường xuyên về những diễn biến bệnh của người bệnh. Đối với người bệnh chăm sóc cấp III,
        ghi tối thiểu 1 lần trong ngày và khi cần. Ngày nghỉ cuối tuần, ngày lễ cần ghi những diễn biến của người bệnh nặng hoặc có diễn biến bất
        thường.
      </p>
    </div>
  </body>
</html>
