<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRFIDRequest;
use App\Http\Requests\UpdateUserRFIDRequest;
use Illuminate\Http\Request;
use App\Models\UserRFID;

class UserRFIDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserRFID::all();
    }

    public function indexByRFID($rfid)
    {
        $rfid = UserRFID::where('rfid',$rfid)->first();
        if(!$rfid){
            return response()->json(['message' => 'RFID not found'],404);
        } else
            return $rfid;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = UserRFID::create([
            'rfid' => $request->rfid,
            'user_id' => $request->user_id
        ]);

        return response()->json([
            'message' => 'Successfully registered RFID',
            'data' => $data,
        ],201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRFIDRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRFIDRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserRFID  $userRFID
     * @return \Illuminate\Http\Response
     */
    public function show(UserRFID $userRFID)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserRFID  $userRFID
     * @return \Illuminate\Http\Response
     */
    public function edit(UserRFID $userRFID)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserRFIDRequest  $request
     * @param  \App\Models\UserRFID  $userRFID
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRFIDRequest $request, UserRFID $userRFID)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserRFID  $userRFID
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRFID $userRFID)
    {
        //
    }
}
