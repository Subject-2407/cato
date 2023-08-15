<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlantMoistureRequest;
use App\Http\Requests\UpdatePlantMoistureRequest;
use Illuminate\Http\Request;
use App\Models\PlantMoisture;
use App\Events\Moist;
use App\Events\Pump;
use App\Events\Mode2;
use App\Events\pumpHidup;
use App\Events\pumpMati;

class PlantMoistureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PlantMoisture::find(1);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data = PlantMoisture::create([
            'kelembapan' => $request->kelembapan,
            'pump' => $request->pump,
            'mode' => $request->pump
        ]);

        return response()->json([
            'message' => 'Successfully created a plant moisture system',
            'data' => $data
        ]);
        
    }

    public function update(Request $request){
        $plant = PlantMoisture::find(1);
        $messageList = [];
        if($request->kelembapan){
            event(new Moist($request->kelembapan));
            $plant->kelembapan = $request->kelembapan;
            array_push($messageList, 'Kelembapan terupdate');
        }
        if($request->pump){
            event(new Pump($request->pump));
            $plant->pump = $request->pump;
            if($request->pump > 1){
                event(new pumpHidup(now()));
                $plant->terakhir_pump_hidup = now();
                array_push($messageList, 'Pump dihidupkan');
            } else {
                event(new pumpMati(now()));
                $plant->terakhir_pump_mati = now();
                array_push($messageList, 'Pump dimatikan');
            }
        }
        if($request->mode){
            event(new Mode2($request->mode));
            $plant->mode = $request->mode;
            if($request->mode > 1){  
                array_push($messageList, 'Mode otomatis');
            } else {
                array_push($messageList, 'Mode manual');
            }
        }
        $plant->save();
        return response()->json([
            'message' => 'Berhasil memperbarui data sistem penyiram tanaman!',
            'data' => $messageList
        ]);
        
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlantMoistureRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlantMoistureRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlantMoisture  $plantMoisture
     * @return \Illuminate\Http\Response
     */
    public function show(PlantMoisture $plantMoisture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlantMoisture  $plantMoisture
     * @return \Illuminate\Http\Response
     */
    public function edit(PlantMoisture $plantMoisture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlantMoistureRequest  $request
     * @param  \App\Models\PlantMoisture  $plantMoisture
     * @return \Illuminate\Http\Response
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlantMoisture  $plantMoisture
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlantMoisture $plantMoisture)
    {
        //
    }
}
