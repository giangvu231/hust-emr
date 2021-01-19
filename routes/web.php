<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

Auth::routes(['register'=>false]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('pdf_export', 'PdfController@index');

Route::get('vital_pdf_export/{id}', 'PdfController@vitalPDF');

Route::get('phieuchamsoc_pdf_export/{id}', 'PdfController@phieuChamSocPDF');
Route::get('phieutruyendich_pdf_export/{id}', 'PdfController@phieuTruyenDichPDF');
Route::get('phieuthuthuoc_pdf_export/{id}', 'PdfController@phieuThuThuocPDF');
Route::get('phieuhoichan_pdf_export/{id}', 'PdfController@phieuHoiChanPDF');
Route::get('phieuphauthuat_pdf_export/{id}', 'PdfController@phieuPhauThuatPDF');
Route::get('phieuhinhanh_pdf_export/{id}', 'PdfController@phieuHinhAnhPDF');
Route::get('phieuxetnghiem_pdf_export/{id}', 'PdfController@phieuXetNghiemPDF');

Route::get('add_patient_pdf_export/{id}', 'PdfController@addPatientPDF');

Route::get('xml_export/{id}', 'XMLController@index');

Route::post('/image_upload/{unique_id}', 'PhotoController@store');

Route::get('/{vue_capture?}', function () {
    return view('layouts.master');
})->where('vue_capture', '[\/\w\.-]*')->middleware('auth');

Route::post('/searchicd10', 'SearchController@searchICD10');

Route::post('/search', 'SearchController@postSearch');

// Route::post('/searchjob', 'SearchJobController@postSearch');
Route::post('/searchjob', 'SearchController@searchJob');

// Route::post('/searchrace', 'SearchRaceController@postSearch');
Route::post('/searchrace', 'SearchController@searchRace');

// Route::post('/searchcity', 'SearchCityController@postSearch');
Route::post('/searchcity', 'SearchController@searchCity');

// Route::post('/searchdistrict', 'SearchDistrictController@postSearch');
Route::post('/searchdistrict', 'SearchController@searchDistrict');

// Route::post('/searchnation', 'SearchNationController@postSearch');
Route::post('/searchnation', 'SearchController@searchNation');

Route::post('/searchlab', 'SearchController@searchLab');

Route::post('/searchpatient', 'SearchController@searchPatient');

Route::post('/searchimagingorder', 'SearchController@searchImaging');

Route::post('/image/store', 'ImageController@store');
