<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUnimportantRequest;
use App\Http\Requests\UpdateUnimportantRequest;
use Illuminate\Http\Request;
use App\Models\Unimportant;

class UnimportantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Unimportant::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if(!is_null($request->data)){
            return Unimportant::create(['data' => $request->data]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUnimportantRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUnimportantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Unimportant  $unimportant
     * @return \Illuminate\Http\Response
     */
    public function show(Unimportant $unimportant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Unimportant  $unimportant
     * @return \Illuminate\Http\Response
     */
    public function edit(Unimportant $unimportant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnimportantRequest  $request
     * @param  \App\Models\Unimportant  $unimportant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUnimportantRequest $request, Unimportant $unimportant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Unimportant  $unimportant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unimportant $unimportant)
    {
        //
    }
}
