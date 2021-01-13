<?php

function createXML(
    $emr,
    $patientInfo,
    $treatment,
    $hospital_histories,
    $emr_summary,
    $vitals,
    $diagnosishealths,
    $lab_results,
    $imaging_results,
    $appointments,
    $phams,
    $soaps
    )
{
    $xml = new DOMDocument('1.0', 'utf-8');
    $xml->formatOutput = true;

    $HSBA = $xml->createElement("HSBA");

    // TIÊU ĐỀ
    $LOAI_BENH_AN = $xml->createElement("LOAI_BENH_AN", $emr->emr_type);
    $HSBA->appendChild($LOAI_BENH_AN);
    $COQUAN_CHUQUAN = $xml->createElement("COQUAN_CHUQUAN", );
    $HSBA->appendChild($COQUAN_CHUQUAN);
    $MA_BV = $xml->createElement("MA_BV", );
    $HSBA->appendChild($MA_BV);
    $MA_KHOA = $xml->createElement("MA_KHOA", $treatment->department);
    $HSBA->appendChild($MA_KHOA);
    $MA_PHONG = $xml->createElement("MA_PHONG", $treatment->room);
    $HSBA->appendChild($MA_PHONG);
    $MA_GIUONG = $xml->createElement("MA_GIUONG", $treatment->bed_id);
    $HSBA->appendChild($MA_GIUONG);
    $DO_BENH = $xml->createElement("DO_BENH", $treatment->reason_count);
    $HSBA->appendChild($DO_BENH);
    $SO_LUU_TRU = $xml->createElement("SO_LUU_TRU", $patientInfo->unique_id);
    $HSBA->appendChild($SO_LUU_TRU);

    // HÀNH CHÍNH add_patients
    $STT_BN = $xml->createElement("STT_BN", $patientInfo->id);
    $HSBA->appendChild($STT_BN);
    $MA_HSBA = $xml->createElement("MA_HSBA", $patientInfo->unique_id);
    $HSBA->appendChild($MA_HSBA);
    $MA_BN = $xml->createElement("MA_BN", $patientInfo->pid);
    $HSBA->appendChild($MA_BN);
    $CHUC_DANH = $xml->createElement("CHUC_DANH", $patientInfo->title);
    $HSBA->appendChild($CHUC_DANH);
    $MAIL = $xml->createElement("MAIL", $patientInfo->email);
    $HSBA->appendChild($MAIL);
    $DT_DIDONG = $xml->createElement("DT_DIDONG", $patientInfo->phone_number);
    $HSBA->appendChild($DT_DIDONG);
    $HO_TEN = $xml->createElement("HO_TEN", $patientInfo->full_name);
    $HSBA->appendChild($HO_TEN);
    $NGAY_SINH = $xml->createElement("NGAY_SINH", $patientInfo->dob);
    $HSBA->appendChild($NGAY_SINH);
    $GIOI_TINH = $xml->createElement("GIOI_TINH", $patientInfo->sex);
    $HSBA->appendChild($GIOI_TINH);
    $NGHE_NGHIEP = $xml->createElement("NGHE_NGHIEP", $patientInfo->job_name);
    $HSBA->appendChild($NGHE_NGHIEP);
    $NGHE_NGHIEP_ID = $xml->createElement("NGHE_NGHIEP_ID", $patientInfo->job_id);
    $HSBA->appendChild($NGHE_NGHIEP_ID);
    $NGHE_NGHIEP_CODE = $xml->createElement("NGHE_NGHIEP_CODE", $patientInfo->job_code);
    $HSBA->appendChild($NGHE_NGHIEP_CODE);
    $DAN_TOC = $xml->createElement("DAN_TOC", $patientInfo->race_name);
    $HSBA->appendChild($DAN_TOC);
    $DAN_TOC_ID = $xml->createElement("DAN_TOC_ID", $patientInfo->race_id);
    $HSBA->appendChild($DAN_TOC_ID);
    $DAN_TOC_CODE = $xml->createElement("DAN_TOC_CODE", $patientInfo->race_code);
    $HSBA->appendChild($DAN_TOC_CODE);
    $TON_GIAO = $xml->createElement("TON_GIAO", $patientInfo->religion);
    $HSBA->appendChild($TON_GIAO);
    $QUOC_TICH = $xml->createElement("QUOC_TICH", $patientInfo->nationality);
    $HSBA->appendChild($QUOC_TICH);
    $NGOAI_QUOC = $xml->createElement("NGOAI_QUOC", $patientInfo->nation_name);
    $HSBA->appendChild($NGOAI_QUOC);
    $NGOAI_QUOC_ID = $xml->createElement("NGOAI_QUOC_ID", $patientInfo->nation_id);
    $HSBA->appendChild($NGOAI_QUOC_ID);
    $NGOAI_QUOC_CODE = $xml->createElement("NGOAI_QUOC_CODE", $patientInfo->nation_code);
    $HSBA->appendChild($NGOAI_QUOC_CODE);
    $SONHA_TENDUONG = $xml->createElement("SONHA_TENDUONG", $patientInfo->home_address);
    $HSBA->appendChild($SONHA_TENDUONG);
    $HUYEN_HIEN_TAI = $xml->createElement("HUYEN_HIEN_TAI", $patientInfo->district_name);
    $HSBA->appendChild($HUYEN_HIEN_TAI);
    $HUYEN_HIEN_TAI_ID = $xml->createElement("HUYEN_HIEN_TAI_ID", $patientInfo->district_id);
    $HSBA->appendChild($HUYEN_HIEN_TAI_ID);
    $HUYEN_HIEN_TAI_CODE = $xml->createElement("HUYEN_HIEN_TAI_CODE", $patientInfo->district_code);
    $HSBA->appendChild($HUYEN_HIEN_TAI_CODE);
    $TINH_HIEN_TAI = $xml->createElement("TINH_HIEN_TAI", $patientInfo->city_name);
    $HSBA->appendChild($TINH_HIEN_TAI);
    $TINH_HIEN_TAI_ID = $xml->createElement("TINH_HIEN_TAI_ID", $patientInfo->city_id);
    $HSBA->appendChild($TINH_HIEN_TAI_ID);
    $TINH_HIEN_TAI_CODE = $xml->createElement("TINH_HIEN_TAI_CODE", $patientInfo->city_code);
    $HSBA->appendChild($TINH_HIEN_TAI_CODE);
    $NOI_SINH = $xml->createElement("NOI_SINH", $patientInfo->place_of_birth);
    $HSBA->appendChild($NOI_SINH);
    $NOI_LAM_VIEC = $xml->createElement("NOI_LAM_VIEC", $patientInfo->work_address);
    $HSBA->appendChild($NOI_LAM_VIEC);
    $HON_NHAN = $xml->createElement("HON_NHAN", $patientInfo->marital_status);
    $HSBA->appendChild($HON_NHAN);
    $MA_DOI_TUONG = $xml->createElement("MA_DOI_TUONG", $patientInfo->type_of_object);
    $HSBA->appendChild($MA_DOI_TUONG);
    $MA_THE = $xml->createElement("MA_THE", $patientInfo->health_insurance_id);
    $HSBA->appendChild($MA_THE);
    $GT_THE_DEN = $xml->createElement("GT_THE_DEN", $patientInfo->health_insurance_date);
    $HSBA->appendChild($GT_THE_DEN);
    $NGUOI_CHAM_SOC = $xml->createElement("NGUOI_CHAM_SOC", $patientInfo->name_next_of_kin);
    $HSBA->appendChild($NGUOI_CHAM_SOC);
    $DIACHI_NCS = $xml->createElement("DIACHI_NCS", $patientInfo->home_next_of_kin);
    $HSBA->appendChild($DIACHI_NCS);
    $DT_DIDONG_NCS = $xml->createElement("DT_DIDONG_NCS", $patientInfo->phone_next_of_kin);
    $HSBA->appendChild($DT_DIDONG_NCS);
    $THONGTINBN_KHOITAO = $xml->createElement("THONGTINBN_KHOITAO", $patientInfo->created_at);
    $HSBA->appendChild($THONGTINBN_KHOITAO);
    $THONGTINBN_CAPNHAT = $xml->createElement("THONGTINBN_CAPNHAT", $patientInfo->updated_at);
    $HSBA->appendChild($THONGTINBN_CAPNHAT);


    // QUẢN LÝ NGƯỜI BỆNH hospital_histories
    $STT_LICHSUKHAM = $xml->createElement("STT_LICHSUKHAM", $hospital_histories->id);
    $HSBA->appendChild($STT_LICHSUKHAM);
    $NGAY_CO_MAT = $xml->createElement("NGAY_CO_MAT", $hospital_histories->date_attented);
    $HSBA->appendChild($NGAY_CO_MAT);
    $NGAY_VAO = $xml->createElement("NGAY_VAO", $hospital_histories->date_admitted);
    $HSBA->appendChild($NGAY_VAO);
    $NOI_VAO = $xml->createElement("NOI_VAO", $hospital_histories->admit_dept);
    $HSBA->appendChild($NOI_VAO);
    $MA_NOI_CHUYEN = $xml->createElement("MA_NOI_CHUYEN", $hospital_histories->refer_dept);
    $HSBA->appendChild($MA_NOI_CHUYEN);
    $LAN_THU = $xml->createElement("LAN_THU", $hospital_histories->reason_date);
    $HSBA->appendChild($LAN_THU);
    $TUYEN_CHUYENDI = $xml->createElement("TUYEN_CHUYENDI", $treatment->hosp_transfer_type);
    $HSBA->appendChild($TUYEN_CHUYENDI);
    $NOI_CHUYEN_DI = $xml->createElement("NOI_CHUYEN_DI", $treatment->hosp_transfer_name);
    $HSBA->appendChild($NOI_CHUYEN_DI);
    $NGAY_RA = $xml->createElement("NGAY_RA", $emr_summary->discharge_time);
    $HSBA->appendChild($NGAY_RA);
    $TINH_TRANG_RV = $xml->createElement("TINH_TRANG_RV", $emr_summary->patient_condition);
    $HSBA->appendChild($TINH_TRANG_RV);
    $NHANXET_BACSI = $xml->createElement("NHANXET_BACSI", $hospital_histories->comment_box);
    $HSBA->appendChild($NHANXET_BACSI);
    $CHUYENKHOA_LAN1 = $xml->createElement("CHUYENKHOA_LAN1", $treatment->dept_name_2nd);
    $HSBA->appendChild($CHUYENKHOA_LAN1);
    $NGAY_CHUYENKHOA_LAN1 = $xml->createElement("NGAY_CHUYENKHOA_LAN1", $treatment->dept_time_2nd);
    $HSBA->appendChild($NGAY_CHUYENKHOA_LAN1);
    $CHUYENKHOA_LAN2 = $xml->createElement("CHUYENKHOA_LAN2", $treatment->dept_name_3rd);
    $HSBA->appendChild($CHUYENKHOA_LAN2);
    $NGAY_CHUYENKHOA_LAN2 = $xml->createElement("NGAY_CHUYENKHOA_LAN2", $treatment->dept_time_3rd);
    $HSBA->appendChild($NGAY_CHUYENKHOA_LAN2);
    $CHUYENKHOA_LAN3 = $xml->createElement("CHUYENKHOA_LAN3", $treatment->dept_name_4th);
    $HSBA->appendChild($CHUYENKHOA_LAN3);
    $NGAY_CHUYENKHOA_LAN3 = $xml->createElement("NGAY_CHUYENKHOA_LAN3", $treatment->dept_time_4th);
    $HSBA->appendChild($NGAY_CHUYENKHOA_LAN3);
    $THU_THUAT_CHECKBOX = $xml->createElement("THU_THUAT_CHECKBOX", $treatment->diagnosis_procedure);
    $HSBA->appendChild($THU_THUAT_CHECKBOX);
    $PHAU_THUAT_CHECKBOX = $xml->createElement("PHAU_THUAT_CHECKBOX", $treatment->diagnosis_surgery);
    $HSBA->appendChild($PHAU_THUAT_CHECKBOX);

    // CHẨN ĐOÁN
    $ICD_TUYENTRUOC = $xml->createElement("ICD_TUYENTRUOC", $treatment->icd10_admit_code);
    $HSBA->appendChild($ICD_TUYENTRUOC);
    $STT_ICD_TUYENTRUOC = $xml->createElement("STT_ICD_TUYENTRUOC", $treatment->icd10_admit_id);
    $HSBA->appendChild($STT_ICD_TUYENTRUOC);
    $TEN_ICD_TUYENTRUOC = $xml->createElement("TEN_ICD_TUYENTRUOC", $treatment->icd10_admit_name);
    $HSBA->appendChild($TEN_ICD_TUYENTRUOC);
    $ICD_PKHAM_CAPCUU = $xml->createElement("ICD_PKHAM_CAPCUU", $treatment->icd10_emergency_code);
    $HSBA->appendChild($ICD_PKHAM_CAPCUU);
    $TEN_ICD_PKHAM_CAPCUU = $xml->createElement("TEN_ICD_PKHAM_CAPCUU", $treatment->icd10_emergency_name);
    $HSBA->appendChild($TEN_ICD_PKHAM_CAPCUU);
    $STT_ICD_PKHAM_CAPCUU = $xml->createElement("STT_ICD_PKHAM_CAPCUU", $treatment->icd10_emergency_id);
    $HSBA->appendChild($STT_ICD_PKHAM_CAPCUU);
    $ICD_KHOA = $xml->createElement("ICD_KHOA", $treatment->icd10_treatment_code);
    $HSBA->appendChild($ICD_KHOA);
    $TEN_ICD_KHOA = $xml->createElement("TEN_ICD_KHOA", $treatment->icd10_treatment_name);
    $HSBA->appendChild($TEN_ICD_KHOA);
    $MA_ICD_KHOA = $xml->createElement("MA_ICD_KHOA", $treatment->icd10_treatment_id);
    $HSBA->appendChild($MA_ICD_KHOA);
    $THU_THUAT = $xml->createElement("THU_THUAT", );
    $HSBA->appendChild($THU_THUAT);
    $PHAU_THUAT = $xml->createElement("PHAU_THUAT", );
    $HSBA->appendChild($PHAU_THUAT);
    $MA_BENH = $xml->createElement("MA_BENH", $emr_summary->discharge_maindisease_code);
    $HSBA->appendChild($MA_BENH);
    $TEN_BENH_CHINH = $xml->createElement("TEN_BENH_CHINH", $emr_summary->discharge_maindisease_name);
    $HSBA->appendChild($TEN_BENH_CHINH);
    $STT_BENH_CHINH = $xml->createElement("STT_BENH_CHINH", $emr_summary->discharge_maindisease_id);
    $HSBA->appendChild($STT_BENH_CHINH);
    $MA_BENH_KHAC = $xml->createElement("MA_BENH_KHAC", $emr_summary->discharge_subdisease_code);
    $HSBA->appendChild($MA_BENH_KHAC);
    $TEN_BENHKHAC = $xml->createElement("TEN_BENHKHAC", $emr_summary->discharge_subdisease_name);
    $HSBA->appendChild($TEN_BENHKHAC);
    $STT_BENHKHAC = $xml->createElement("STT_BENHKHAC", $emr_summary->discharge_subdisease_id);
    $HSBA->appendChild($STT_BENHKHAC);
    $TAI_BIEN = $xml->createElement("TAI_BIEN", $emr_summary->discharge_stroke);
    $HSBA->appendChild($TAI_BIEN);
    $BIEN_CHUNG = $xml->createElement("BIEN_CHUNG", $emr_summary->discharge_complication);
    $HSBA->appendChild($BIEN_CHUNG);

    // TÌNH TRẠNG RA VIỆN
    $KET_QUA_DTRI = $xml->createElement("KET_QUA_DTRI", $emr_summary->treatment_result);
    $HSBA->appendChild($KET_QUA_DTRI);
    $GIAI_PHAU_BENH = $xml->createElement("GIAI_PHAU_BENH", $emr_summary->anapath);
    $HSBA->appendChild($GIAI_PHAU_BENH);
    $NGAY_TU_VONG = $xml->createElement("NGAY_TU_VONG", $emr_summary->death_time);
    $HSBA->appendChild($NGAY_TU_VONG);
    $THOI_DIEM_TU_VONG = $xml->createElement("THOI_DIEM_TU_VONG", $emr_summary->death_time_range);
    $HSBA->appendChild($THOI_DIEM_TU_VONG);
    $NGUYENNHAN_TUVONG = $xml->createElement("NGUYENNHAN_TUVONG", $emr_summary->death_reason_code);
    $HSBA->appendChild($NGUYENNHAN_TUVONG);
    $TENBENH_TUVONG = $xml->createElement("TENBENH_TUVONG", $emr_summary->death_reason_name);
    $HSBA->appendChild($TENBENH_TUVONG);
    $STTBENH_TUVONG = $xml->createElement("STTBENH_TUVONG", $emr_summary->death_reason_id);
    $HSBA->appendChild($STTBENH_TUVONG);
    $KHAM_TU_THI = $xml->createElement("KHAM_TU_THI", $emr_summary->autopsy);
    $HSBA->appendChild($KHAM_TU_THI);
    $ICD_TU_THI = $xml->createElement("ICD_TU_THI", $emr_summary->autopsy_diagnosis_code);
    $HSBA->appendChild($ICD_TU_THI);
    $TEN_ICD_TU_THI = $xml->createElement("TEN_ICD_TU_THI", $emr_summary->autopsy_diagnosis_name);
    $HSBA->appendChild($TEN_ICD_TU_THI);
    $STT_ICD_TU_THI = $xml->createElement("STT_ICD_TU_THI", $emr_summary->autopsy_diagnosis_id);
    $HSBA->appendChild($STT_ICD_TU_THI);
    $NGAY_KY_BENH_AN = $xml->createElement("NGAY_KY_BENH_AN", );
    $HSBA->appendChild($NGAY_KY_BENH_AN);
    $GIAM_DOC = $xml->createElement("GIAM_DOC", );
    $HSBA->appendChild($GIAM_DOC);
    $TRUONG_KHOA = $xml->createElement("TRUONG_KHOA", );
    $HSBA->appendChild($TRUONG_KHOA);

    // BỆNH ÁN - HỎI BỆNH
    $LYDO_VAOVIEN = $xml->createElement("LYDO_VAOVIEN", $hospital_histories->reason);
    $HSBA->appendChild($LYDO_VAOVIEN);
    $BENH_SU = $xml->createElement("BENH_SU", $hospital_histories->symptoms);
    $HSBA->appendChild($BENH_SU);
    $TS_CANHAN = $xml->createElement("TS_CANHAN", $hospital_histories->disease_in);
    $HSBA->appendChild($TS_CANHAN);
    $TS_TIMMACH = $xml->createElement("TS_TIMMACH", );
    $HSBA->appendChild($TS_TIMMACH);
    $TS_HUYETAP = $xml->createElement("TS_HUYETAP", );
    $HSBA->appendChild($TS_HUYETAP);
    $TS_TIEUDUONG = $xml->createElement("TS_TIEUDUONG", );
    $HSBA->appendChild($TS_TIEUDUONG);
    $TS_DADAY = $xml->createElement("TS_DADAY", );
    $HSBA->appendChild($TS_DADAY);
    $TS_PHOIMANTINH = $xml->createElement("TS_PHOIMANTINH", );
    $HSBA->appendChild($TS_PHOIMANTINH);
    $TS_HENSUYEN = $xml->createElement("TS_HENSUYEN", );
    $HSBA->appendChild($TS_HENSUYEN);
    $TS_BUOUCO = $xml->createElement("TS_BUOUCO", );
    $HSBA->appendChild($TS_BUOUCO);
    $TS_VIEMGAN = $xml->createElement("TS_VIEMGAN", );
    $HSBA->appendChild($TS_VIEMGAN);
    $TS_TIM_BAM_SINH = $xml->createElement("TS_TIM_BAM_SINH", );
    $HSBA->appendChild($TS_TIM_BAM_SINH);
    $TS_TAM_THAN = $xml->createElement("TS_TAM_THAN", );
    $HSBA->appendChild($TS_TAM_THAN);
    $TS_TU_KY = $xml->createElement("TS_TU_KY", );
    $HSBA->appendChild($TS_TU_KY);
    $TS_DONG_KINH = $xml->createElement("TS_DONG_KINH", );
    $HSBA->appendChild($TS_DONG_KINH);
    $TS_UNG_THU = $xml->createElement("TS_UNG_THU", );
    $HSBA->appendChild($TS_UNG_THU);
    $TS_LAO = $xml->createElement("TS_LAO", );
    $HSBA->appendChild($TS_LAO);
    $TS_KHAC = $xml->createElement("TS_KHAC", );
    $HSBA->appendChild($TS_KHAC);
    $DI_UNG = $xml->createElement("DI_UNG", $hospital_histories->disease_diung_time);
    $HSBA->appendChild($DI_UNG);
    $DI_UNG_CHECKBOX = $xml->createElement("DI_UNG_CHECKBOX", $hospital_histories->disease_diung);
    $HSBA->appendChild($DI_UNG_CHECKBOX);
    $MA_TUY = $xml->createElement("MA_TUY", $hospital_histories->disease_matuy_time);
    $HSBA->appendChild($MA_TUY);
    $MA_TUY_CHECKBOX = $xml->createElement("MA_TUY_CHECKBOX", $hospital_histories->disease_matuy);
    $HSBA->appendChild($MA_TUY_CHECKBOX);
    $RUOU_BIA = $xml->createElement("RUOU_BIA", $hospital_histories->disease_ruoubia_time);
    $HSBA->appendChild($RUOU_BIA);
    $RUOU_BIA_CHECKBOX = $xml->createElement("RUOU_BIA_CHECKBOX", $hospital_histories->disease_ruoubia);
    $HSBA->appendChild($RUOU_BIA_CHECKBOX);
    $THUOC_LA = $xml->createElement("THUOC_LA", $hospital_histories->disease_thuocla_time);
    $HSBA->appendChild($THUOC_LA);
    $THUOC_LA_CHECKBOX = $xml->createElement("THUOC_LA_CHECKBOX", $hospital_histories->disease_thuocla);
    $HSBA->appendChild($THUOC_LA_CHECKBOX);
    $THUOC_LAO = $xml->createElement("THUOC_LAO", $hospital_histories->disease_thuoclao_time);
    $HSBA->appendChild($THUOC_LAO);
    $THUOC_LAO_CHECKBOX = $xml->createElement("THUOC_LAO_CHECKBOX", $hospital_histories->disease_thuoclao);
    $HSBA->appendChild($THUOC_LAO_CHECKBOX);
    $THOI_QUEN_KHAC = $xml->createElement("THOI_QUEN_KHAC", $hospital_histories->disease_khac_time);
    $HSBA->appendChild($THOI_QUEN_KHAC);
    $THOI_QUEN_KHAC_CHECKBOX = $xml->createElement("THOI_QUEN_KHAC_CHECKBOX", $hospital_histories->disease_khac);
    $HSBA->appendChild($THOI_QUEN_KHAC_CHECKBOX);
    $TS_GIADINH = $xml->createElement("TS_GIADINH", $hospital_histories->disease_out);
    $HSBA->appendChild($TS_GIADINH);

    // BỆNH ÁN - KHÁM BỆNH
    $STT_KHAMBENH = $xml->createElement("STT_KHAMBENH", $diagnosishealths->id);
    $HSBA->appendChild($STT_KHAMBENH);
    $STT_KHAM_TOAN_THAN = $xml->createElement("STT_KHAM_TOAN_THAN", $vitals->id);
    $HSBA->appendChild($STT_KHAM_TOAN_THAN);
    $TOAN_THAN = $xml->createElement("TOAN_THAN", $vitals->note);
    $HSBA->appendChild($TOAN_THAN);

    $THAN_NHIET = $xml->createElement("THAN_NHIET", $vitals->temperature);
    $HSBA->appendChild($THAN_NHIET);
    $CHIEU_CAO = $xml->createElement("CHIEU_CAO", $vitals->height);
    $HSBA->appendChild($CHIEU_CAO);
    $CAN_NANG = $xml->createElement("CAN_NANG", $vitals->weight);
    $HSBA->appendChild($CAN_NANG);
    $MACH = $xml->createElement("MACH", $vitals->pulse);
    $HSBA->appendChild($MACH);
    $NHOM_MAU = $xml->createElement("NHOM_MAU", $vitals->blood_group);
    $HSBA->appendChild($NHOM_MAU);
    $HA_TAM_TRUONG = $xml->createElement("HA_TAM_TRUONG", $vitals->diastolic);
    $HSBA->appendChild($HA_TAM_TRUONG);
    $HA_TAM_THU = $xml->createElement("HA_TAM_THU", $vitals->systolic);
    $HSBA->appendChild($HA_TAM_THU);
    $NHIP_THO = $xml->createElement("NHIP_THO", $vitals->respiration);
    $HSBA->appendChild($NHIP_THO);

    $TUAN_HOAN = $xml->createElement("TUAN_HOAN", $diagnosishealths->diagnosis_tuanhoan);
    $HSBA->appendChild($TUAN_HOAN);
    $HO_HAP = $xml->createElement("HO_HAP", $diagnosishealths->diagnosis_hohap);
    $HSBA->appendChild($HO_HAP);
    $TIEU_HOA = $xml->createElement("TIEU_HOA", $diagnosishealths->diagnosis_tieuhoa);
    $HSBA->appendChild($TIEU_HOA);
    $THAN_TIETNIEU_SINHDUC = $xml->createElement("THAN_TIETNIEU_SINHDUC", $diagnosishealths->diagnosis_than_tietnieu_sinhduc);
    $HSBA->appendChild($THAN_TIETNIEU_SINHDUC);
    $THAN_KINH = $xml->createElement("THAN_KINH", $diagnosishealths->diagnosis_thankinh);
    $HSBA->appendChild($THAN_KINH);
    $CO_XUONG_KHOP = $xml->createElement("CO_XUONG_KHOP", $diagnosishealths->diagnosis_coxuongkhop);
    $HSBA->appendChild($CO_XUONG_KHOP);
    $TAI_MUI_HONG = $xml->createElement("TAI_MUI_HONG", $diagnosishealths->diagnosis_taimuihong);
    $HSBA->appendChild($TAI_MUI_HONG);
    $RANG_HAM_MAT = $xml->createElement("RANG_HAM_MAT", $diagnosishealths->diagnosis_ranghammat);
    $HSBA->appendChild($RANG_HAM_MAT);
    $MAT = $xml->createElement("MAT", $diagnosishealths->diagnosis_mat);
    $HSBA->appendChild($MAT);
    $NOITIET_DINHDUONG_KHAC = $xml->createElement("NOITIET_DINHDUONG_KHAC", $diagnosishealths->diagnosis_noitiet_dinhduong_khac);
    $HSBA->appendChild($NOITIET_DINHDUONG_KHAC);
    $HOI_CHUNG = $xml->createElement("HOI_CHUNG", $diagnosishealths->diagnosis_syndrome);
    $HSBA->appendChild($HOI_CHUNG);
    $ID_XET_NGHIEM = $xml->createElement("ID_XET_NGHIEM", $lab_results->id);
    $HSBA->appendChild($ID_XET_NGHIEM);
    $LOAI_XET_NGHIEM = $xml->createElement("LOAI_XET_NGHIEM", $lab_results->type);
    $HSBA->appendChild($LOAI_XET_NGHIEM);
    $XET_NGHIEM = $xml->createElement("XET_NGHIEM", $lab_results->lab_name);
    $HSBA->appendChild($XET_NGHIEM);
    $STT_XET_NGHIEM = $xml->createElement("STT_XET_NGHIEM", $lab_results->lab_id);
    $HSBA->appendChild($STT_XET_NGHIEM);
    $MA_XET_NGHIEM = $xml->createElement("MA_XET_NGHIEM", $lab_results->lab_code);
    $HSBA->appendChild($MA_XET_NGHIEM);
    $ID_CDHA = $xml->createElement("ID_CDHA", $imaging_results->id);
    $HSBA->appendChild($ID_CDHA);
    $LOAI_CDHA = $xml->createElement("LOAI_CDHA", $imaging_results->type);
    $HSBA->appendChild($LOAI_CDHA);
    $CDHA = $xml->createElement("CDHA", $imaging_results->imaging_name);
    $HSBA->appendChild($CDHA);
    $STT_CDHA = $xml->createElement("STT_CDHA", $imaging_results->imaging_id);
    $HSBA->appendChild($STT_CDHA);
    $MA_CDHA = $xml->createElement("MA_CDHA", $imaging_results->imaging_code);
    $HSBA->appendChild($MA_CDHA);

    // BỆNH ÁN - CHẨN ĐOÁN KHI VÀO KHOA ĐIỀU TRỊ
    $ID_BENH_CHINH = $xml->createElement("ID_BENH_CHINH", $treatment->id);
    $HSBA->appendChild($ID_BENH_CHINH);
    $MA_BENH_CHINH = $xml->createElement("MA_BENH_CHINH", $treatment->disease_main);
    $HSBA->appendChild($MA_BENH_CHINH);
    $MA_BENH_KEM = $xml->createElement("MA_BENH_KEM", $treatment->disease_sub);
    $HSBA->appendChild($MA_BENH_KEM);
    $CHANDOAN_PHANBIET = $xml->createElement("CHANDOAN_PHANBIET", $treatment->disease_difference);
    $HSBA->appendChild($CHANDOAN_PHANBIET);
    $TIEN_LUONG = $xml->createElement("TIEN_LUONG", $treatment->disease_prognosis);
    $HSBA->appendChild($TIEN_LUONG);
    $HUONG_DIEU_TRI = $xml->createElement("HUONG_DIEU_TRI", $treatment->disease_plan);
    $HSBA->appendChild($HUONG_DIEU_TRI);
    $NGUOI_LAM_BENHAN = $xml->createElement("NGUOI_LAM_BENHAN", $emr->medical_user_name);
    $HSBA->appendChild($NGUOI_LAM_BENHAN);
    $STT_NGUOI_LAM_BENHAN = $xml->createElement("STT_NGUOI_LAM_BENHAN", $emr->medical_user_id);
    $HSBA->appendChild($STT_NGUOI_LAM_BENHAN);

    // BỆNH ÁN - TỔNG KẾT BỆNH ÁN (emr_summaries)
    $STT_HSBA = $xml->createElement("STT_HSBA", $emr->id);
    $HSBA->appendChild($STT_HSBA);
    $STT_DATLICH = $xml->createElement("STT_DATLICH", $appointments->id);
    $HSBA->appendChild($STT_DATLICH);
    $STT_TONGKETBA = $xml->createElement("STT_TONGKETBA", $emr_summary->id);
    $HSBA->appendChild($STT_TONGKETBA);
    $STT_CLS = $xml->createElement("STT_CLS", $imaging_results->diagnose_id);
    $HSBA->appendChild($STT_CLS);

    $QUATRINH_DIENBIEN = $xml->createElement("QUATRINH_DIENBIEN", $hospital_histories->symptoms);
    $HSBA->appendChild($QUATRINH_DIENBIEN);
    $TOM_TAT_CDHA = $xml->createElement("TOM_TAT_CDHA", $imaging_results->comment);
    $HSBA->appendChild($TOM_TAT_CDHA);
    $TOM_TAT_XETNGHIEM = $xml->createElement("TOM_TAT_XETNGHIEM", $lab_results->comment);
    $HSBA->appendChild($TOM_TAT_XETNGHIEM);
    $PHUONGPHAP_DIEUTRI = $xml->createElement("PHUONGPHAP_DIEUTRI", $emr_summary->therapy);
    $HSBA->appendChild($PHUONGPHAP_DIEUTRI);
    $TINHTRANG_NGUOIBENH_RAVIEN = $xml->createElement("TINHTRANG_NGUOIBENH_RAVIEN", $emr_summary->patient_condition);
    $HSBA->appendChild($TINHTRANG_NGUOIBENH_RAVIEN);
    $DIEUTRI_TIEPTHEO = $xml->createElement("DIEUTRI_TIEPTHEO", $emr_summary->therapy_plan);
    $HSBA->appendChild($DIEUTRI_TIEPTHEO);
    $LOAI_RA_VIEN = $xml->createElement("LOAI_RA_VIEN", $emr_summary->discharge_type);
    $HSBA->appendChild($LOAI_RA_VIEN);
    $LOAI_TU_VONG = $xml->createElement("LOAI_TU_VONG", $emr_summary->death_type);
    $HSBA->appendChild($LOAI_TU_VONG);
    $SOTO_XQUANG = $xml->createElement("SOTO_XQUANG", $emr_summary->dx_count);
    $HSBA->appendChild($SOTO_XQUANG);
    $SOTO_CTSCAN = $xml->createElement("SOTO_CTSCAN", $emr_summary->ct_count);
    $HSBA->appendChild($SOTO_CTSCAN);
    $SOTO_XETNGHIEM = $xml->createElement("SOTO_XETNGHIEM", $emr_summary->lab_count);
    $HSBA->appendChild($SOTO_XETNGHIEM);
    $SOTO_SIEUAM = $xml->createElement("SOTO_SIEUAM", $emr_summary->us_count);
    $HSBA->appendChild($SOTO_SIEUAM);
    $SOTO_KHAC = $xml->createElement("SOTO_KHAC", $emr_summary->other_count);
    $HSBA->appendChild($SOTO_KHAC);
    $SOTO_TOANBO = $xml->createElement("SOTO_TOANBO", $emr_summary->total_count);
    $HSBA->appendChild($SOTO_TOANBO);
    $NGUOI_GIAO = $xml->createElement("NGUOI_GIAO", );
    $HSBA->appendChild($NGUOI_GIAO);
    $NGUOI_NHAN = $xml->createElement("NGUOI_NHAN", );
    $HSBA->appendChild($NGUOI_NHAN);
    $BACSI_DIEUTRI = $xml->createElement("BACSI_DIEUTRI", $emr->treatment_user_name);
    $HSBA->appendChild($BACSI_DIEUTRI);
    $STT_BACSI_DIEUTRI = $xml->createElement("STT_BACSI_DIEUTRI", $emr->treatment_user_id);
    $HSBA->appendChild($STT_BACSI_DIEUTRI);

    // ĐẶT LỊCH
    $NGUYENNHAN_TAIKHAM = $xml->createElement("NGUYENNHAN_TAIKHAM", $appointments->reason);
    $HSBA->appendChild($NGUYENNHAN_TAIKHAM);
    $NGAY_TAIKHAM = $xml->createElement("NGAY_TAIKHAM", $appointments->date);
    $HSBA->appendChild($NGAY_TAIKHAM);

    //THUỐC
    $STT_DONTHUOC = $xml->createElement("STT_DONTHUOC", $phams->id);
    $HSBA->appendChild($STT_DONTHUOC);
    $LOAI_THUOC = $xml->createElement("LOAI_THUOC", $phams->type);
    $HSBA->appendChild($LOAI_THUOC);
    $CACH_DUNG_THUOC = $xml->createElement("CACH_DUNG_THUOC", $phams->comment);
    $HSBA->appendChild($CACH_DUNG_THUOC);
    $LIEU_LUONG_THUOC = $xml->createElement("LIEU_LUONG_THUOC", $phams->unit);
    $HSBA->appendChild($LIEU_LUONG_THUOC);

    //THUỐC
    $STT_SOAP = $xml->createElement("STT_SOAP", $soaps->id);
    $HSBA->appendChild($STT_SOAP);
    $DAU_CHUNG_CHU_QUAN = $xml->createElement("DAU_CHUNG_CHU_QUAN", $soaps->subjective);
    $HSBA->appendChild($DAU_CHUNG_CHU_QUAN);
    $DAU_CHUNG_KHACH_QUAN = $xml->createElement("DAU_CHUNG_KHACH_QUAN", $soaps->objective);
    $HSBA->appendChild($DAU_CHUNG_KHACH_QUAN);
    $HUONG_CHAN_DOAN = $xml->createElement("HUONG_CHAN_DOAN", $soaps->assessment);
    $HSBA->appendChild($HUONG_CHAN_DOAN);
    $KEHOACH_DIEUTRI = $xml->createElement("KEHOACH_DIEUTRI", $soaps->plan);
    $HSBA->appendChild($KEHOACH_DIEUTRI);




    $xml->appendChild($HSBA);


    $datetime = now();
	$datetime = str_replace(" ", "", $datetime);
	$datetime = str_replace("-", "", $datetime);
	$datetime = str_replace(":", "", $datetime);
    $name =  $datetime;

    $xml->save(public_path("xml") . "/" . $name . ".xml");
}
