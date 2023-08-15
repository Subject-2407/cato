<?php

namespace App\Http\Controllers;

use App\Models\Komponen;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Events\Suhu;
use App\Events\Kelembapan;
use App\Events\SisaHari;
use App\Events\Motor;
use App\Events\Kipas;
use App\Events\Lampu;
use App\Events\Mode;
use App\Events\Sistem;
use App\Events\Penetasan;

class KomponenController extends Controller
{
    public function index(){
        return Komponen::find(1);
    }

    public function komponenUpdate(request $request){
        $compRequest = 0;
        if($request->sistem){
            event(new Sistem($request->sistem));
            $compRequest++;
        }
        if($request->mode){
            event(new Mode($request->mode));
            $compRequest++;
        }
        if($request->suhu){
            if($request->suhu < 0) $request->suhu = 0;
            event(new Suhu($request->suhu));
            $compRequest++;
        }
        if($request->kelembapan){
            if($request->kelembapan < 0) $request->kelembapan = 0;
            event(new Kelembapan($request->kelembapan));
            $compRequest++;
        }
        if($request->sisa_hari){
            if($request->sisa_hari < 0) $request->sisa_hari = 0;
            event(new SisaHari($request->sisa_hari));
            $compRequest++;
        }
        if($request->penetasan){
            event(new Penetasan($request->penetasan));
            $compRequest++;
        }
        if($request->motor){
            event(new Motor($request->motor));
            $compRequest++;
        }
        if($request->kipas){
            event(new Kipas($request->kipas));
            $compRequest++;
        }
        if($request->lampu){
            event(new Lampu($request->lampu));
            $compRequest++;
        }
        $response = "$compRequest data telah terupdate";
        return $response;
    }
}


