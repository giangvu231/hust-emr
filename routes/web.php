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

Route::get('add_patient_pdf_export/{id}', 'PdfController@addPatientPDF');

Route::get('xml_export/{id}', 'XMLController@index');

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

Route::post('/searchimagingorder', 'SearchController@searchImaging');

