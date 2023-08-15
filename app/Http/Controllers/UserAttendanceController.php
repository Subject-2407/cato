<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserAttendanceRequest;
use App\Http\Requests\UpdateUserAttendanceRequest;
use App\Models\UserAttendance;
use App\Models\UserRFID;
use Illuminate\Http\Request;

class UserAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserAttendance::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$rfid)
    {
        $user = UserRFID::where('rfid',$rfid)->first();
        $data = UserAttendance::create([
            'user_id' => $user->user_id,
            'on_time' => $request->input('on_time')
        ]);

        return response()->json([
            'message' => 'Successfully added an attendance',
            'data' => $data,
        ],201);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserAttendanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserAttendanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserAttendance  $userAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(UserAttendance $userAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserAttendance  $userAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(UserAttendance $userAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserAttendanceRequest  $request
     * @param  \App\Models\UserAttendance  $userAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserAttendanceRequest $request, UserAttendance $userAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserAttendance  $userAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserAttendance $userAttendance)
    {
        //
    }
}
