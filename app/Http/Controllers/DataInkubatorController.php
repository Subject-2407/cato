<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDataInkubatorRequest;
use App\Http\Requests\UpdateDataInkubatorRequest;
use App\Models\DataInkubator;

class DataInkubatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DataInkubator::all();
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
     * @param  \App\Http\Requests\StoreDataInkubatorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDataInkubatorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataInkubator  $dataInkubator
     * @return \Illuminate\Http\Response
     */
    public function show(DataInkubator $dataInkubator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataInkubator  $dataInkubator
     * @return \Illuminate\Http\Response
     */
    public function edit(DataInkubator $dataInkubator)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDataInkubatorRequest  $request
     * @param  \App\Models\DataInkubator  $dataInkubator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDataInkubatorRequest $request, DataInkubator $dataInkubator)
    {
        $input = $request->all();
        $dataInkubator->fill($input)->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataInkubator  $dataInkubator
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataInkubator $dataInkubator)
    {
        //
    }
}
