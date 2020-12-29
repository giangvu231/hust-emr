<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\addPatient;
use Auth;

class StaffController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'name' => 'required | string | max:191',
            'email' => 'required | string | email | max:191 | unique:users',
            'password' => 'required | string | min:8',
            'role' => 'required',
            'card_id' => 'required',
            'job_id' => 'required',
            'location' => 'required',
            'more_about' => 'required',
        ]);

        $staff = new User;
        $staff->title = $request->title;
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->password = Hash::make($request->password);
        $staff->role = $request->role;
        $staff->card_id = $request->card_id;
        $staff->job_id = $request->job_id;
        $staff->location = $request->location;
        $staff->more_about = $request->more_about;

        $staff->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $staff = User::findOrFail($id);

        $this->validate($request, [
            'title' => 'required',
            'name' => 'required | string | max:191',
            'email' => 'required | string | email | max:191 | unique:users',
            'password' => 'required | string | min:8',
            // 'role' => 'required',
            // 'card_id' => 'required',
            // 'job_id' => 'required',
            // 'location' => 'required',
            // 'more_about' => 'required',
        ]);

        $staff->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $staff = User::findOrFail($id);

        $staff->delete();
    }

    public function profile()
    {
        //
        return \Auth::user();
    }

    public function search()
    {
        if($search = \Request::get('q')){
            return User::where(function($query) use ($search){
                $query->where('name', 'LIKE', "%$search%" )->orWhere('title', 'LIKE', "%$search%" );
            })->paginate(30);
        };

        if($search = \Request::get('q')){
            return addPatient::where(function($query) use ($search){
                $query->where('name', 'LIKE', "%$search%" )->orWhere('title', 'LIKE', "%$search%" );
            })->paginate(30);
        };
    }

    public function getId()
    {
        return $this->id;
    }

}
