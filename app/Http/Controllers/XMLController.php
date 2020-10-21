<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\addPatient;

class XMLController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $patient = addPatient::findOrFail($id);
        createXML($patient);
        return response()->json([ 'msg' => 'XML export successfully!!!' ], 200);
    }
}
