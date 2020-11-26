<!DOCTYPE html>
<html>

<head>
	<title>mẫu bệnh án</title>
	<meta charset="utf-8">
</head>
<style>
	@font-face{
		font-family: "Times New Roman" !important;
		src: url('/fonts/times.ttf');
		font-style: normal; 
	}
	@font-face{
		font-family: "Times New Roman" !important;
		src: url('fonts/timesbd.ttf');
		font-weight: bold; 
	}
	@font-face{
		font-family: "Times New Roman" !important;
		src: url('fonts/timesi.ttf');
		font-style: italic; 
	}
	@font-face{
		font-family: "Times New Roman" !important;
		src: url('fonts/timesbi.ttf');
		font-style: italic; 
		font-weight: bold;
	}
	* {
		font-family: "Times New Roman" !important;
	}
</style>

<body>
	<!-- header -->
	<div class="header">
		<table width="100%">
			<tr>
				<td>
					Sở Y tế:
				</td>
				<td width="40%" rowspan="3" style="text-align: center;">
					<b>BỆNH ÁN NỘI KHOA</b>
				</td>
				<td>
					Số lưu trữ
				</td>
			</tr>
			<tr>
				<td>Bệnh viện:
				<td>
			</tr>
			<tr>
				<td>Khoa: &nbsp;&nbsp;&nbsp;&nbsp; Giường</td>
				<td>Mã YT</td>
			</tr>
		</table>
	</div>
	<!-- Thông tin bệnh nhân -->
	<div>
		<b>I. HÀNH CHÍNH</b>
		<br>
		<table width="100%">
			<tr>
				<td width="40%">
					Họ và tên (IN HOA) : {{ $patientInfo->full_name }}
				</td>
				<td width="40%">
					Sinh ngày: {{ $patientInfo->dob }}
				</td>
				<td width="10%">
					Tuổi:
				</td>
			</tr>
			<tr>
				<td>
					Giới tính : {{ $patientInfo->sex }}
				</td>
				<td>
					Nghề nghiệp :
				</td>
				<td></td>
			</tr>
			<tr>
				<td>
					Dân tộc:
				</td>
				<td>
					Ngoại kiều:
				</td>
				<td></td>
			</tr>
		</table>
		<table width="100%">
			<tr>
				<td colspan="2">
					Địa chỉ :
				</td>
			</tr>
			<tr>
				<td width="50%">
					Nơi làm việc :
				</td>
				<td>
					Đối tượng :
				</td>
			</tr>
			<tr>
				<td>
					Giá trị BHYT :
				</td>
				<td>
					Số thẻ BHYT :
				</td>
			</tr>
			<tr>
				<td colspan="2">
					Họ tên, địa chỉ người nhà khi cần báo tên
				</td>
			</tr>
			<tr>
				<td colspan="2">
					Số điện thoại người nhà :
				</td>
			</tr>
		</table>
	</div>
	<!-- Quản lý người bệnh -->
	<div>
		<b>
			II. QUẢN LÝ NGƯỜI BỆNH
		</b>
		<br>
		<table width="100%" style="border: 1px solid black">
			<tr>
				<td width="50%">Vào viện : </td>
				<td>
					Nơi giới thiệu :
				</td>
			</tr>
			<tr>
				<td>
					Trực tiếp vào :
				</td>
				<td>
					Vào viện do bệnh này lần thứ :
				</td>
			</tr>
		</table>
		<table width="100%" style="border: 1px solid black">
			<tr>
				<td width="50%">Vào Khoa : </td>
				<td>
					Chuyển viện :
					<br>
					Chuyển đến :
				</td>
			</tr>
			<tr>
				<td>
					Chuyển :
					<br>
					Khoa :
				</td>
				<td>
					Ra viện:
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					Tổng số ngày điều trị
				</td>
			</tr>
		</table>
	</div>
	<!-- Chẩn đoán -->
	<div>
		<b>
			III. CHẨN ĐOÁN
		</b>
		<table width="100%" style="border: 1px solid black">
			<tr>
				<td>
					Nơi chuyển đến:
					<br>
					KKB, cấp cứu :
					<br>
					Khi vào khoa điều trị
					<br>
					"Thủ thuật"
				</td>
				<td>
					Ra viện:
					<br>
					Bệnh chính:
					<br>
					Bệnh kèm theo :
					<br>
					"Tai biến"
				</td>
			</tr>
		</table>
	</div>
	<!-- Tình trạng ra viện -->
	<div>
		<b>
			IV. TÌNH TRẠNG RA VIỆN
		</b>
		<table width="100%" style="border: 1px solid black">
			<tr>
				<td>
					Kết quả điều trị:
				</td>
				<td>
					Tình trạng tử vong:
				</td>
			</tr>
			<tr>
				<td>
					Giải phẫu bệnh (khi có sinh thiết):
				</td>
				<td>
					Nguyên nhân tử vong chính
				</td>
			</tr>
			<tr>
				<td>
					Khám nghiệm tử thi :
				</td>
				<td>
					Chẩn đoán giải phẫu tử thi :
				</td>
			</tr>
		</table>
	</div>
	<!-- ký tên -->
	<table width="100%" style="text-align: center;">
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
				<br>
			</td>
		</tr>
		<tr>
			<td>
				<br>
			</td>
		</tr>
		<tr>
			<td>
				Họ và tên :
			</td>
			<td>
				Họ và tên :
			</td>
		</tr>
	</table>
</body>

</html>