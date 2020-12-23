<?php

function createXML($data) {
    $xml = new DOMDocument('1.0', 'utf-8');
    $xml->formatOutput = true;

    // TIÊU ĐỀ
    $LOAI_BENH_AN = $xml->createElement("LOAI_BENH_AN", );
    $COQUAN_CHUQUAN = $xml->createElement("COQUAN_CHUQUAN",);
    $MA_BV = $xml->createElement("MA_BV", );
    $MA_KHOA = $xml->createElement("MA_KHOA", $data->department);
    $MA_GIUONG = $xml->createElement("MA_GIUONG", $data->bed_id);
    $SO_LUU_TRU = $xml->createElement("SO_LUU_TRU", $data->unique_id);

    $xml->appendChild($LOAI_BENH_AN);
    $xml->appendChild($COQUAN_CHUQUAN);
    $xml->appendChild($MA_BV);
    $xml->appendChild($MA_KHOA);
    $xml->appendChild($MA_GIUONG);
    $xml->appendChild($SO_LUU_TRU);

    // HÀNH CHÍNH
    $HO_TEN = $xml->createElement("HO_TEN", $data->full_name);
    $xml->appendChild($HO_TEN);
    $NGAY_SINH = $xml->createElement("NGAY_SINH", $data->dob);
    $xml->appendChild($NGAY_SINH);
    $GIOI_TINH = $xml->createElement("GIOI_TINH", $data->sex);
    $xml->appendChild($GIOI_TINH);
    $NGHE_NGHIEP = $xml->createElement("NGHE_NGHIEP", $data->occupation);
    $xml->appendChild($NGHE_NGHIEP);
    $DAN_TOC = $xml->createElement("DAN_TOC", $data->race);
    $xml->appendChild($DAN_TOC);
    $SONHA_TENDUONG = $xml->createElement("SONHA_TENDUONG", $data->home_address);
    $xml->appendChild($SONHA_TENDUONG);
    $XA_HIENTAI = $xml->createElement("XA_HIENTAI", );
    $xml->appendChild($XA_HIENTAI);
    $HUYEN_HIEN_TAI = $xml->createElement("HUYEN_HIEN_TAI", );
    $xml->appendChild($HUYEN_HIEN_TAI);
    $TINH_HIEN_TAI = $xml->createElement("TINH_HIEN_TAI", );
    $xml->appendChild($TINH_HIEN_TAI);
    $NOI_LAM_VIEC = $xml->createElement("NOI_LAM_VIEC", $data->work_address);
    $xml->appendChild($NOI_LAM_VIEC);
    $MA_DOI_TUONG = $xml->createElement("MA_DOI_TUONG", $data->type_of_object);
    $xml->appendChild($MA_DOI_TUONG);
    $MA_THE = $xml->createElement("MA_THE", $data->health_insurance_id);
    $xml->appendChild($MA_THE);
    $GT_THE_TU = $xml->createElement("GT_THE_TU", );
    $xml->appendChild($GT_THE_TU);
    $GT_THE_DEN = $xml->createElement("GT_THE_DEN", $data->health_insurance_date);
    $xml->appendChild($GT_THE_DEN);
    $NGUOI_CHAM_SOC = $xml->createElement("NGUOI_CHAM_SOC", $data->name_next_of_kin);
    $xml->appendChild($NGUOI_CHAM_SOC);
    $DIACHI_NCS = $xml->createElement("DIACHI_NCS", $data->home_next_of_kin);
    $xml->appendChild($DIACHI_NCS);
    $DT_DIDONG_NCS = $xml->createElement("DT_DIDONG_NCS", $data->phone_next_of_kin);
    $xml->appendChild($DT_DIDONG_NCS);

    // QUẢN LÝ NGƯỜI BỆNH
    $NGAY_VAO = $xml->createElement("NGAY_VAO", );
    $xml->appendChild($NGAY_VAO);
    $NOI_VAO = $xml->createElement("NOI_VAO", );
    $xml->appendChild($NOI_VAO);
    $MA_NOI_CHUYEN = $xml->createElement("MA_NOI_CHUYEN", );
    $xml->appendChild($MA_NOI_CHUYEN);
    $LAN_THU = $xml->createElement("LAN_THU", );
    $xml->appendChild($LAN_THU);
    $CAC_KHOA = $xml->createElement("CAC_KHOA", );
    $xml->appendChild($CAC_KHOA);
    $TUYEN_CHUYENDI = $xml->createElement("TUYEN_CHUYENDI", );
    $xml->appendChild($TUYEN_CHUYENDI);
    $NOI_CHUYEN_DI = $xml->createElement("NOI_CHUYEN_DI", );
    $xml->appendChild($NOI_CHUYEN_DI);
    $NGAY_RA = $xml->createElement("NGAY_RA", );
    $xml->appendChild($NGAY_RA);
    $TINH_TRANG_RV = $xml->createElement("TINH_TRANG_RV", );
    $xml->appendChild($TINH_TRANG_RV);
    $SO_NGAY_DTRI = $xml->createElement("SO_NGAY_DTRI", );
    $xml->appendChild($SO_NGAY_DTRI);

    // CHẨN ĐOÁN
    $ICD_TUYENTRUOC = $xml->createElement("ICD_TUYENTRUOC", );
    $xml->appendChild($ICD_TUYENTRUOC);
    $ICD_PKHAM_CAPCUU = $xml->createElement("ICD_PKHAM_CAPCUU", );
    $xml->appendChild($ICD_PKHAM_CAPCUU);
    $ICD_KHOA = $xml->createElement("ICD_KHOA", );
    $xml->appendChild($ICD_KHOA);
    $THU_THUAT = $xml->createElement("THU_THUAT", );
    $xml->appendChild($THU_THUAT);
    $PHAU_THUAT = $xml->createElement("PHAU_THUAT", );
    $xml->appendChild($PHAU_THUAT);
    $MA_BENH = $xml->createElement("MA_BENH", );
    $xml->appendChild($MA_BENH);
    $MA_BENHKHAC = $xml->createElement("MA_BENHKHAC", );
    $xml->appendChild($MA_BENHKHAC);
    $TAI_BIEN = $xml->createElement("TAI_BIEN", );
    $xml->appendChild($TAI_BIEN);
    $BIEN_CHUNG = $xml->createElement("BIEN_CHUNG", );
    $xml->appendChild($BIEN_CHUNG);

    // TÌNH TRẠNG RA VIỆN
    $KET_QUA_DTRI = $xml->createElement("KET_QUA_DTRI", );
    $xml->appendChild($KET_QUA_DTRI);
    $GIAI_PHAU_BENH = $xml->createElement("GIAI_PHAU_BENH", );
    $xml->appendChild($GIAI_PHAU_BENH);
    $NGAY_TU_VONG = $xml->createElement("NGAY_TU_VONG", );
    $xml->appendChild($NGAY_TU_VONG);
    $NGUYENNHAN_TUVONG = $xml->createElement("NGUYENNHAN_TUVONG", );
    $xml->appendChild($NGUYENNHAN_TUVONG);
    $KHAM_TU_THI = $xml->createElement("KHAM_TU_THI", );
    $xml->appendChild($KHAM_TU_THI);
    $ICD_TU_THI = $xml->createElement("ICD_TU_THI", );
    $xml->appendChild($ICD_TU_THI);
    $NGAY_KY_BENH_AN = $xml->createElement("NGAY_KY_BENH_AN", );
    $xml->appendChild($NGAY_KY_BENH_AN);
    $GIAM_DOC = $xml->createElement("GIAM_DOC", );
    $xml->appendChild($GIAM_DOC);
    $TRUONG_KHOA = $xml->createElement("TRUONG_KHOA", );
    $xml->appendChild($TRUONG_KHOA);

    // BỆNH ÁN - HỎI BỆNH
    $LYDO_VAOVIEN = $xml->createElement("LYDO_VAOVIEN", );
    $xml->appendChild($LYDO_VAOVIEN);
    $BENH_SU = $xml->createElement("BENH_SU", );
    $xml->appendChild($BENH_SU);
    $TS_TIMMACH = $xml->createElement("TS_TIMMACH", );
    $xml->appendChild($TS_TIMMACH);
    $TS_HUYETAP = $xml->createElement("TS_HUYETAP", );
    $xml->appendChild($TS_HUYETAP);
    $TS_TIEUDUONG = $xml->createElement("TS_TIEUDUONG", );
    $xml->appendChild($TS_TIEUDUONG);
    $TS_DADAY = $xml->createElement("TS_DADAY", );
    $xml->appendChild($TS_DADAY);
    $TS_PHOIMANTINH = $xml->createElement("TS_PHOIMANTINH", );
    $xml->appendChild($TS_PHOIMANTINH);
    $TS_HENSUYEN = $xml->createElement("TS_HENSUYEN", );
    $xml->appendChild($TS_HENSUYEN);
    $TS_BUOUCO = $xml->createElement("TS_BUOUCO", );
    $xml->appendChild($TS_BUOUCO);
    $TS_VIEMGAN = $xml->createElement("TS_VIEMGAN", );
    $xml->appendChild($TS_VIEMGAN);
    $TS_TIM_BAM_SINH = $xml->createElement("TS_TIM_BAM_SINH", );
    $xml->appendChild($TS_TIM_BAM_SINH);
    $TS_TAM_THAN = $xml->createElement("TS_TAM_THAN", );
    $xml->appendChild($TS_TAM_THAN);
    $TS_TU_KY = $xml->createElement("TS_TU_KY", );
    $xml->appendChild($TS_TU_KY);
    $TS_DONG_KINH = $xml->createElement("TS_DONG_KINH", );
    $xml->appendChild($TS_DONG_KINH);
    $TS_UNG_THU = $xml->createElement("TS_UNG_THU", );
    $xml->appendChild($TS_UNG_THU);
    $TS_LAO = $xml->createElement("TS_LAO", );
    $xml->appendChild($TS_LAO);
    $TS_KHAC = $xml->createElement("TS_KHAC", );
    $xml->appendChild($TS_KHAC);
    $DI_UNG = $xml->createElement("DI_UNG", );
    $xml->appendChild($DI_UNG);
    $MA_TUY = $xml->createElement("MA_TUY", );
    $xml->appendChild($MA_TUY);
    $RUOU_BIA = $xml->createElement("RUOU_BIA", );
    $xml->appendChild($RUOU_BIA);
    $THUOC_LA = $xml->createElement("THUOC_LA", );
    $xml->appendChild($THUOC_LA);
    $THUOC_LAO = $xml->createElement("THUOC_LAO", );
    $xml->appendChild($THUOC_LAO);
    $THOI_QUEN_KHAC = $xml->createElement("THOI_QUEN_KHAC", );
    $xml->appendChild($THOI_QUEN_KHAC);
    $TS_GIADINH = $xml->createElement("TS_GIADINH", );
    $xml->appendChild($TS_GIADINH);

    // BỆNH ÁN - KHÁM BỆNH
    $TOAN_THAN = $xml->createElement("TOAN_THAN", );
    $xml->appendChild($TOAN_THAN);
    $TUAN_HOAN = $xml->createElement("TUAN_HOAN", );
    $xml->appendChild($TUAN_HOAN);
    $HO_HAP = $xml->createElement("HO_HAP", );
    $xml->appendChild($HO_HAP);
    $TIEU_HOA = $xml->createElement("TIEU_HOA", );
    $xml->appendChild($TIEU_HOA);
    $THAN_TIETNIEU_SINHDUC = $xml->createElement("THAN_TIETNIEU_SINHDUC", );
    $xml->appendChild($THAN_TIETNIEU_SINHDUC);
    $THAN_KINH = $xml->createElement("THAN_KINH", );
    $xml->appendChild($THAN_KINH);
    $CO_XUONG_KHOP = $xml->createElement("CO_XUONG_KHOP", );
    $xml->appendChild($CO_XUONG_KHOP);
    $TAI_MUI_HONG = $xml->createElement("TAI_MUI_HONG", );
    $xml->appendChild($TAI_MUI_HONG);
    $RANG_HAM_MAT = $xml->createElement("RANG_HAM_MAT", );
    $xml->appendChild($RANG_HAM_MAT);
    $MAT = $xml->createElement("MAT", );
    $xml->appendChild($MAT);
    $NOI_TIET = $xml->createElement("NOI_TIET", );
    $xml->appendChild($NOI_TIET);
    $DINH_DUONG = $xml->createElement("DINH_DUONG", );
    $xml->appendChild($DINH_DUONG);
    $BENH_LY_KHAC = $xml->createElement("BENH_LY_KHAC", );
    $xml->appendChild($BENH_LY_KHAC);
    $XET_NGHIEM = $xml->createElement("XET_NGHIEM", );
    $xml->appendChild($XET_NGHIEM);
    $CDHA = $xml->createElement("CDHA", );
    $xml->appendChild($CDHA);
    $THAMDO_CHUCNANG = $xml->createElement("THAMDO_CHUCNANG", );
    $xml->appendChild($THAMDO_CHUCNANG);
    $CLS_KHAC = $xml->createElement("CLS_KHAC", );
    $xml->appendChild($CLS_KHAC);
    $TOMTAT_BENHAN = $xml->createElement("TOMTAT_BENHAN", );
    $xml->appendChild($TOMTAT_BENHAN);

    // BỆNH ÁN - CHẨN ĐOÁN KHI VÀO KHOA ĐIỀU TRỊ
    $MA_BENH = $xml->createElement("MA_BENH", );
    $xml->appendChild($MA_BENH);
    $MA_BENHKHAC = $xml->createElement("MA_BENHKHAC", );
    $xml->appendChild($MA_BENHKHAC);
    $CHANDOAN_PHANBIET = $xml->createElement("CHANDOAN_PHANBIET", );
    $xml->appendChild($CHANDOAN_PHANBIET);
    $TIEN_LUONG = $xml->createElement("TIEN_LUONG", );
    $xml->appendChild($TIEN_LUONG);
    $HUONG_DIEU_TRI = $xml->createElement("HUONG_DIEU_TRI", );
    $xml->appendChild($HUONG_DIEU_TRI);
    $NGAY_LAM_BENHAN = $xml->createElement("NGAY_LAM_BENHAN", );
    $xml->appendChild($NGAY_LAM_BENHAN);
    $BS_LAM_BENHAN = $xml->createElement("BS_LAM_BENHAN", );
    $xml->appendChild($BS_LAM_BENHAN);

    // BỆNH ÁN - CHẨN ĐOÁN KHI VÀO KHOA ĐIỀU TRỊ
    $QUATRINH_DIENBIEN = $xml->createElement("QUATRINH_DIENBIEN", );
    $xml->appendChild($QUATRINH_DIENBIEN);
    $TOM_TAT_CLS = $xml->createElement("TOM_TAT_CLS", );
    $xml->appendChild($TOM_TAT_CLS);
    $PHUONGPHAP_DIEUTRI = $xml->createElement("PHUONGPHAP_DIEUTRI", );
    $xml->appendChild($PHUONGPHAP_DIEUTRI);
    $TINHTRANG_NGUOIBENH_RAVIEN = $xml->createElement("TINHTRANG_NGUOIBENH_RAVIEN", );
    $xml->appendChild($TINHTRANG_NGUOIBENH_RAVIEN);
    $DIEUTRI_TIEPTHEO = $xml->createElement("DIEUTRI_TIEPTHEO", );
    $xml->appendChild($DIEUTRI_TIEPTHEO);
    $SOTO_XQUANG = $xml->createElement("SOTO_XQUANG", );
    $xml->appendChild($SOTO_XQUANG);
    $SOTO_CTSCAN = $xml->createElement("SOTO_CTSCAN", );
    $xml->appendChild($SOTO_CTSCAN);
    $SOTO_XETNGHIEM = $xml->createElement("SOTO_XETNGHIEM", );
    $xml->appendChild($SOTO_XETNGHIEM);
    $SOTO_SIEUAM = $xml->createElement("SOTO_SIEUAM", );
    $xml->appendChild($SOTO_SIEUAM);
    $SOTO_KHAC = $xml->createElement("SOTO_KHAC", );
    $xml->appendChild($SOTO_KHAC);
    $SOTO_TOANBO = $xml->createElement("SOTO_TOANBO", );
    $xml->appendChild($SOTO_TOANBO);
    $NGUOI_GIAO = $xml->createElement("NGUOI_GIAO", );
    $xml->appendChild($NGUOI_GIAO);
    $NGUOI_NHAN = $xml->createElement("NGUOI_NHAN", );
    $xml->appendChild($NGUOI_NHAN);
    $BACSI_DIEUTRI = $xml->createElement("BACSI_DIEUTRI", );
    $xml->appendChild($BACSI_DIEUTRI);


    $datetime = now();
	$datetime = str_replace(" ", "", $datetime);
	$datetime = str_replace("-", "", $datetime);
	$datetime = str_replace(":", "", $datetime);
    $name =  $datetime;

    $xml->save(public_path("xml") . "/" . $name . ".xml");
}
