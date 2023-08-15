<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataInkubatorController;
use App\Http\Controllers\KomponenController;
use App\Http\Controllers\InstanceController;
use App\Http\Controllers\InstanceClassController;
use App\Http\Controllers\ClassMemberController;
use App\Http\Controllers\ClassPostController;
use App\Http\Controllers\UserCatoController;
use App\Http\Controllers\ClassTaskController;
use App\Http\Controllers\TaskGradesController;
use App\Http\Controllers\RobotikRFIDController;
use App\Http\Controllers\PlantMoistureController;
use App\Http\Controllers\AgusniaController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\UserAttendanceController;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\UserRFIDController;
use App\Http\Controllers\InstanceRegisterRfidController;
use App\Http\Controllers\UnimportantController;
use App\Mail\TestEmail;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/unimportant', [UnimportantController::class,'create']);

/* INCUBATOR */
Route::get('/incubator/komponen', [KomponenController::class, 'index']);
Route::put('/incubator/komponen', [KomponenController::class, 'komponenUpdate']);
/* INCUBATOR */


Route::get('/alat/data', [AgusniaController::class,'index']);
Route::post('/alat/create', [AgusniaController::class,'create']);
Route::put('/alat/update', [AgusniaController::class,'perbarui']);

/*Route::get('/rfid/index', [RobotikRFIDController::class, 'index']);
Route::get('/rfid/{id}', [RobotikRFIDController::class, 'indexById']);
Route::get('/rfid/index/user', [RobotikRFIDController::class, 'indexUsers']);
Route::get('/rfid/{nomor_rfid}/user', [RobotikRFIDController::class, 'indexUser']);
Route::get('/rfid/index/absensi', [RobotikRFIDController::class, 'getAbsen']);
Route::post('/rfid/create', [RobotikRFIDController::class, 'create']);
Route::post('/rfid/{id}/user/create', [RobotikRFIDController::class, 'createUser']);
Route::post('/rfid/{rfid}/absensi', [RobotikRFIDController::class, 'createAbsen']);*/

Route::get('/aplatero/data', [PlantMoistureController::class, 'index']);
Route::post('/aplatero/create', [PlantMoistureController::class, 'create']);
Route::put('/aplatero/update', [PlantMoistureController::class, 'update']);
Route::get('/user/index', [UserCatoController::class, 'index']);

Route::get('/activities', [UserActivityController::class, 'index']);
Route::get('/posts', [UserPostController::class, 'index']);
Route::get('/instances', [InstanceController::class, 'index']);
Route::get('/instance/{code}/members', [InstanceController::class, 'showMembers']);
Route::get('/instance/{code}/posts', [InstanceController::class, 'showPosts']);
Route::get('/instance/{code}/activities', [InstanceController::class, 'showActivities']);
Route::get('/instance/{code}/classes', [InstanceController::class, 'showClasses']);
Route::get('/instance/{code}/grades', [InstanceController::class, 'showGrades']);
Route::get('/instance/{code}/tasks', [InstanceController::class, 'showTasks']);
Route::get('/instance/{code}/classes/members', [ClassMemberController::class, 'showClassesMembers']);
Route::get('/task/{id}/grades', [TaskGradesController::class, 'indexByTaskId']);
Route::get('/task/index', [ClassTaskController::class, 'index']);
Route::post('/task/finish', [TaskGradesController::class, 'create']);
Route::get('/grades/index', [TaskGradesController::class, 'index']);
Route::get('/class/{id}/tasks', [InstanceClassController::class, 'showTasks']);
Route::get('/class/members', [ClassMemberController::class, 'index']);
Route::get('/class/{id}/members', [InstanceClassController::class, 'showMembers']);
Route::get('/class/{id}/grades', [TaskGradesController::class, 'indexByClass']);

Route::post('/upload', function () {
    $path = request()->file('image')->store('public/img');
    $url = Storage::url($path);
    return redirect()->back()->with('success', 'Image uploaded successfully!')->with('url', $url);
});

Route::post('/instance/upload/avatar', function () {
    $path = request()->file('image')->store('public/img/avatar');
    $url = Storage::url($path);
    return response()->json([
        'message' => 'Successfully posted new instance avatar',
        'url' => $url,
    ],201); 
});

Route::get('/robotik/rfid/index', [RobotikRFIDController::class, 'index']);

Route::get('/rfid/attendance', [UserAttendanceController::class, 'index']);
Route::get('/rfid/index', [UserRFIDController::class, 'index']);
Route::get('/rfid/{rfid}', [UserRFIDController::class, 'indexByRFID']);
Route::post('/rfid/create', [UserRFIDController::class, 'create']);
Route::post('/rfid/{rfid}/attendance', [UserAttendanceController::class, 'create']);

Route::get('/rfid/{id}/register' , [InstanceRegisterRfidController::class, 'indexByInstance']);
Route::post('/rfid/newsession/{id}' , [InstanceRegisterRfidController::class, 'create']);
Route::put('/rfid/{id}/updatesession' , [InstanceRegisterRfidController::class, 'update']);
Route::get('/user/{id}/classes', [UserCatoController::class, 'showClasses']);


Route::middleware(['auth:sanctum'])->group(function(){

    Route::get('/unimportant', [UnimportantController::class,'index']);
    
    Route::post('/post', [UserPostController::class, 'create']);
    Route::get('/task/{id}/desc', [ClassTaskController::class, 'indexById']);
    
    Route::post('/task/create', [ClassTaskController::class, 'create']);
    Route::get('/class/index', [InstanceClassController::class, 'index']);
    
    Route::get('/class/{code}', [InstanceClassController::class, 'indexByClass']);
    Route::get('/class/{id}/profile', [InstanceClassController::class, 'classProfile']);
    Route::get('/class/{id}/posts', [ClassPostController::class, 'indexByClass']);
    
    
    
    Route::post('/class/create', [InstanceClassController::class, 'create']);
    Route::post('/class/{id}/join', [ClassMemberController::class, 'create']);
    Route::post('/class/{id}/post', [ClassPostController::class, 'create']);
    
    
    Route::post('/instance/create', [InstanceController::class, 'create']);

    Route::get('/user/me', function () {
        return response()->json(auth()->user());
    });
    
    Route::post('/user/me/update/avatar', [UserCatoController::class, 'updateAvatar']);
    Route::put('/user/me/update', [UserCatoController::class, 'updateSelf']);
    Route::get('/user/{id}', [UserCatoController::class, 'showById']);
    Route::get('/user/{id}/classes/short', [ClassMemberController::class, 'userClasses']);
    Route::get('/user/{id}/classes/notjoined', [UserCatoController::class, 'notJoinedClasses']);
    
    Route::get('/user/class/{code}', [UserCatoController::class, 'indexByCode']);
    Route::delete('/instance/{code}/delete/posts', [InstanceController::class, 'deletePosts']);
    Route::delete('/user/logout/all', function(){
        $user = Auth::guard('sanctum')->user();
        $user->tokens()->delete();
    
        return response()->json(['message' => 'All tokens deleted successfully'], 200);
    });
    Route::post('/user/logout', function (Request $request) {
        $request->user()->currentAccessToken()->delete();
    
        return response()->json(['message' => 'Logged out successfully']);
    });
});

Route::get('/instance/{code}', [InstanceController::class, 'indexCode']);


Route::post('/user/login', [UserCatoController::class, 'login']);
Route::post('/user/register', [UserCatoController::class, 'register']);
Route::put('/user/{id}/update/password', [UserCatoController::class, 'upPass']);

Route::get('/send-email', function () {
    $data = [
    'title' => 'Hello World',
    'content' => 'Hello World is a common phrase used by programmers to test their code.',
    ];

    Mail::to('stevanputra.bintang@gmail.com')->send(new TestEmail($data));

    return response()->json(['message' => 'Email sent successfully']);
});


Route::get('/noauth', function(){
    return response()->json(['message' => 'You are not authorized!'], 401);
})->name('login');



