<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\addPatient;

class PdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datetime = now();
        $datetime = str_replace(" ", "", $datetime);
        $datetime = str_replace("-", "", $datetime);
        $datetime = str_replace(":", "", $datetime);

        $name = $datetime;
        $pdf = PDF::loadView("pdf")->setPaper('A4', 'Portrait');
        $pdf->save(public_path("pdf/" . $name . ".pdf"));
        return $pdf->stream($name . '.pdf');
    }
}
