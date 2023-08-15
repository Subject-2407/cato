<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRFIDAbsensiRequest;
use App\Http\Requests\UpdateRFIDAbsensiRequest;
use App\Models\RFIDAbsensi;

class RFIDAbsensiController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRFIDAbsensiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRFIDAbsensiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RFIDAbsensi  $rFIDAbsensi
     * @return \Illuminate\Http\Response
     */
    public function show(RFIDAbsensi $rFIDAbsensi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RFIDAbsensi  $rFIDAbsensi
     * @return \Illuminate\Http\Response
     */
    public function edit(RFIDAbsensi $rFIDAbsensi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRFIDAbsensiRequest  $request
     * @param  \App\Models\RFIDAbsensi  $rFIDAbsensi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRFIDAbsensiRequest $request, RFIDAbsensi $rFIDAbsensi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RFIDAbsensi  $rFIDAbsensi
     * @return \Illuminate\Http\Response
     */
    public function destroy(RFIDAbsensi $rFIDAbsensi)
    {
        //
    }
}
