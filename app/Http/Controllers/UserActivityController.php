<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserActivityRequest;
use App\Http\Requests\UpdateUserActivityRequest;
use App\Models\UserActivity;
use App\Models\Instance;
use Illuminate\Http\Request;

class UserActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserActivity::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserActivityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserActivityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function show(UserActivity $userActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function edit(UserActivity $userActivity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserActivityRequest  $request
     * @param  \App\Models\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserActivityRequest $request, UserActivity $userActivity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserActivity  $userActivity
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserActivity $userActivity)
    {
        //
    }
}
