<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\addPatient;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $unique_id)
    {
        $photos = $request->file('photos');
        foreach($photos as $photo) {
            $extension = $photo->getClientOriginalExtension();
            $timestampName = microtime(true) . '.' . $extension;
            $url = "/emr_images/" . $timestampName;
            Storage::disk('local')->put($url, file_get_contents($photo));
            Photo::create([
                'unique_id' => $unique_id,
                'url' => $url
            ]);
        }              
        return response()->json(["msg" => 'Upload photos successfully!!!'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Photos  $photos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photos)
    {
        //
    }
}
