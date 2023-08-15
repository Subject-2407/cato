<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Events\HelloEvent;
use App\Models\UserCato;
use App\Http\Controllers\InstanceController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::get('/incubator', function() {
    return view('incubator');
});

Route::get('/smard', function (){
    return view('smard');
});

Route::get('/auth', function(){
    return view('auth');
});

Route::get('/upimg', function () {
    $files = Storage::files('public/img');
    $urls = array_map(function ($file) {
        return Storage::url($file);
    }, $files);
    return view('test')->with('urls', $urls);
});

Route::get('/setup', function(){
    return view('setup');
});

Route::get('/{instanceCode}', [InstanceController::class, 'mainPage']);


Route::get('/send-event', function(){
    broadcast(new HelloEvent());
});

Route::get('/email/verify/{id}/{hash}', function (Request $request) {
    $user = UserCato::find($request->route('id'));
    $data = [];
    $data['title'] = 'Verification Successful';

    if (!$user || !hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
        $data['title'] = 'Unauthorized';
    }  else {
        if($user->email_verified_at != null){
            $data['title'] = 'Already Verified';
        }
        if ($user->markEmailAsVerified())
        event(new Verified($user));
    }

    return view('verified', $data);
})->name('verification.verify');

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');