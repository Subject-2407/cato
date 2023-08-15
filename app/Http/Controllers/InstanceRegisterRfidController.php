<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreInstanceRegisterRfidRequest;
use App\Http\Requests\UpdateInstanceRegisterRfidRequest;
use App\Models\InstanceRegisterRfid;
use Illuminate\Http\Request;

class InstanceRegisterRfidController extends Controller
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
    public function indexByInstance($id){
        $registerInstance = InstanceRegisterRfid::where('instance_id', $id)->first();
        return $registerInstance;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request,$id)
    {
        $data = InstanceRegisterRfid::create([
            'instance_id' => $id,
        ]);

        return response()->json([
            'message' => 'Successfully created register session',
            'data' => $data,
        ],201); 
    }

    public function update(Request $request,$id){
        $instance = InstanceRegisterRfid::where('instance_id', $id)->first();
        $instance->user_id = $request->user_id;
        $instance->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInstanceRegisterRfidRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstanceRegisterRfidRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InstanceRegisterRfid  $instanceRegisterRfid
     * @return \Illuminate\Http\Response
     */
    public function show(InstanceRegisterRfid $instanceRegisterRfid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InstanceRegisterRfid  $instanceRegisterRfid
     * @return \Illuminate\Http\Response
     */
    public function edit(InstanceRegisterRfid $instanceRegisterRfid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstanceRegisterRfidRequest  $request
     * @param  \App\Models\InstanceRegisterRfid  $instanceRegisterRfid
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InstanceRegisterRfid  $instanceRegisterRfid
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstanceRegisterRfid $instanceRegisterRfid)
    {
        //
    }
}
