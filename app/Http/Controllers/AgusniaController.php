<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAgusniaRequest;
use App\Http\Requests\UpdateAgusniaRequest;
use Illuminate\Http\Request;
use App\Models\Agusnia;

class AgusniaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Agusnia::find(1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Agusnia::create([
            'waktu' => now(),
            'suhu' => 27,
            'kelembapan' => 63,
            'mesin' => 2
        ]);

        return $data;
    }

    public function perbarui(Request $request){
        $alat = Agusnia::find(1);
        if($request->input('suhu')){
            $suhu = $request->input('suhu');
            $alat->suhu = $suhu;
        }
        if($request->input('kelembapan')){
            $kelembapan = $request->input('kelembapan');
            $alat->kelembapan = $kelembapan;
        }
        if($request->input('mesin')){
            $mesin = $request->input('mesin');
            $alat->mesin = $mesin;
        }
        $alat->save();
        return response()->json(['message' => 'Berhasil memperbarui data!'],200);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAgusniaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAgusniaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agusnia  $agusnia
     * @return \Illuminate\Http\Response
     */
    public function show(Agusnia $agusnia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agusnia  $agusnia
     * @return \Illuminate\Http\Response
     */
    public function edit(Agusnia $agusnia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAgusniaRequest  $request
     * @param  \App\Models\Agusnia  $agusnia
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAgusniaRequest $request, Agusnia $agusnia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agusnia  $agusnia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agusnia $agusnia)
    {
        //
    }
}
