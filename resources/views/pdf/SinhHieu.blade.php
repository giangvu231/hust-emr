<!DOCTYPE html>
<html>

<head>
	<title>Phieu sinh hieu</title>
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
	{{ $data->temperature }}
</body>

</html>
