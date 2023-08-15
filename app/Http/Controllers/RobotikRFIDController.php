<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRobotikRFIDRequest;
use App\Http\Requests\UpdateRobotikRFIDRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\RobotikRFID;
use App\Models\rfidowner;
use App\Models\RFIDAbsensi;
use App\Events\RFIDUser;
use App\Events\RFIDCard;
use App\Events\Absensi;
use Carbon\Carbon;
use DB;

class RobotikRFIDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return RobotikRFID::all();
    }

    public function indexById($id)
    {
        $uid = RobotikRFID::where('nomor_rfid', $id)->first();
        if(!$uid){
            return response()->json(['message' => 'RFID tidak terdaftarkan'],404);
        } else {
            return $uid;
        }
    }

    public function indexUsers(){
        return rfidowner::all();
    }

    public function indexUser($nomor_rfid){
        $rfid = RobotikRFID::where('nomor_rfid', $nomor_rfid)->first();
        $user = $rfid->user;
        if(!$user){
            return response()->json(['message' => 'Pengguna tidak ditemukan'],404);
        } else return $user;
    }

    public function createUser($id, Request $request){
        $uid = RobotikRFID::where('nomor_rfid', $id)->first();
        if(!$uid){
            return response()->json(['message' => 'RFID not found'],404);
        } else {

            $validatedData = $request->validate([
                'nama' => ['required', 'string'],
                'kelas' => ['required', 'string'],
            ]);

            $checkNis = rfidowner::where('nis', $request->nis)->first();
            if($checkNis){
                return response()->json([
                    'message' => 'Siswa dengan NIS ini sudah memiliki kartu RFID!'
                ],409);
            }else{
                event(new RFIDUser($request->nis,$validatedData['nama'],$validatedData['kelas'],$id));
                $data = rfidowner::create([
                    'nis' => $request->nis,
                    'nama' => $validatedData['nama'],
                    'kelas' => $validatedData['kelas'],
                    'rfid' => $id
                ]);
    
                return response()->json([
                    'message' => 'Successfully registered RFID user',
                    'data' => $data
                ],201);
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $rfid = $request->input('nomor');
        $rfidExists = RobotikRFID::where('nomor_rfid', $rfid)->first();
        if($rfidExists){
            return response()->json([
                'message' => 'RFID sudah terdaftarkan sebelumnya!'
            ],409);
        } else {
            event(new RFIDCard($rfid,date("d F Y H:i A",strtotime(now()))));
            $data = RobotikRFID::create([
                'nomor_rfid' => $rfid,
                'dibuat' => date("d F Y H:i A",strtotime(now()))
            ]);
    
            return response()->json([
                'message' => 'RFID baru telah masuk', 
                'nomor_rfid' => $data->nomor_rfid,
            ],201);
        }
    }

    public function getAbsen(){
        $userAbsen = DB::table('rfidowners')
                    ->join('rfid_absensi', 'rfidowners.rfid', '=', 'rfid_absensi.rfid')
                    ->select('rfidowners.nama as nama', 'rfidowners.rfid as rfid', 'rfid_absensi.created_at')
                    ->get();
        return $userAbsen;

    }

    public function createAbsen($rfid){
        $rfidExists = RobotikRFID::where('nomor_rfid', $rfid)->first();
        if(!$rfidExists){
            return response()->json([
                'message' => 'Nomor RFID ini belum di daftarkan!', 
            ],404);
        } else {
            $absen = RFIDAbsensi::where('rfid',$rfid)->whereDate('created_at', Carbon::today())->first();
            if($absen){
                return response()->json(['message' => 'RFID ini sudah absen hari ini!'],409);
            } else {
                $pengguna = rfidowner::where('rfid',$rfid)->first();
                event(new Absensi($pengguna->nama,$rfid,date("d F Y H:i A",strtotime(now()))));
                $newAbsen = RFIDAbsensi::create(['rfid' => $rfid]);
                return response()->json([
                    'message' => 'Berhasil absen!',
                    'data' => $newAbsen
                ],201);
            }
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRobotikRFIDRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRobotikRFIDRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RobotikRFID  $robotikRFID
     * @return \Illuminate\Http\Response
     */
    public function show(RobotikRFID $robotikRFID)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RobotikRFID  $robotikRFID
     * @return \Illuminate\Http\Response
     */
    public function edit(RobotikRFID $robotikRFID)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRobotikRFIDRequest  $request
     * @param  \App\Models\RobotikRFID  $robotikRFID
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRobotikRFIDRequest $request, RobotikRFID $robotikRFID)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RobotikRFID  $robotikRFID
     * @return \Illuminate\Http\Response
     */
    public function destroy(RobotikRFID $robotikRFID)
    {
        //
    }
}
