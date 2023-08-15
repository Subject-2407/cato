<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Http\Requests\StoreInstanceRequest;
use App\Http\Requests\UpdateInstanceRequest;
use App\Models\Instance;
use App\Models\UserCato;
use App\Models\InstanceClass;
use App\Models\ClassMember;
use App\Models\UserPost;
use App\Models\UserActivity;
use App\Models\ClassTask;
use App\Models\TaskGrades;
use App\Events\DeletePosts;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use DB;

class InstanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $instances = Instance::all();
        if($request->input('type')){
            if($request->input('type') == 1){
                $instances = $instances->where('type',1);
            } else if($request->input('type') == 2){
                $instances = $instances->where('type',2);
            } else if($request->input('type') == 3){
                $instances = $instances->where('type',3);
            } else if($request->input('type') == 4){
                $instances = $instances->where('type',4);
            } else if($request->input('type') == 5){
                $instances = $instances->where('type',5);
            } else if($request->input('type') == 6){
                $instances = $instances->where('type',6);
            }
        }

        $instances = $instances->values()->map(function ($instance) {
            return [
                'id' => $instance->id,
                'code' => $instance->code,
                'name' => $instance->name,
                'type' => $instance->type,
                'country' => $instance->country,
                'owner_id' => $instance->owner_id,
                'members' => $instance->users->count(),
                'admins' => $instance->users->where('role',3)->count(),
                'educators' => $instance->users->where('role',2)->count(),
                'students' => $instance->users->where('role',1)->count(),
            ];
        });

        return response()->json($instances);
    }

    public function showPosts($code){
        $instance = Instance::where('code',$code)->first();
        return $instance->posts;
    }

    public function showActivities($code){
        $instance = Instance::where('code',$code)->first();
        return $instance->activities;
    }

    public function showMembers(Request $request,$code){
        $instance = Instance::where('code', $code)->first();
        $users;
        if (!$instance) {
            return response()->json(['data' => 'Instance not found'], 404);
        } else {
            if($request->input('role')){
                if($request->input('role') == 3){
                    $users = $instance->users->where('role',3);
                }
                else if($request->input('role') == 2){
                    $users = $instance->users->where('role',2);
                }
                else if($request->input('role') == 1){
                    $users = $instance->users->where('role',1);
                }
            } else {
                $users = $instance->users;
            }
        }
        return response()->json($users->values());
    }
    
    public function showClasses($code){
        $instance = Instance::where('code', $code)->first();
        if(!$instance)
            return response()->json(['data' => 'Instance not found'], 404);
        else 
            $classes = $instance->classes->values()->map(function ($class) {
                $classMembers = DB::table('class_members')->where('instance_class_id',$class->id)->count();
                return [
                    'id' => $class->id,
                    'name' => $class->name,
                    'owner_id' => $class->owner_id,
                    'avatar' => $class->avatar,
                    'members' => $classMembers
                ];
            });

        return response()->json($classes);
    }

    public function showTasks($code){
        $instance = Instance::where('code', $code)->first();
        if(!$instance)
            return response()->json(['data' => 'Instance not found'], 404);
        else {
            return ClassTask::where('instance_code',$code)->get();
        }
    }

    public function showGrades($code){
        $instance = Instance::where('code', $code)->first();
        if(!$instance)
            return response()->json(['data' => 'Instance not found'], 404);
        else {
            return TaskGrades::where('instance_code',$code)->get();
        }
    }


    public function indexCode($code){
        $instance = Instance::where('code', $code)->first();

        if (!$instance) {
            return response()->json(['data' => 'Instance not found'], 404);
        }
        return $instance;
    }

    public function mainPage($instanceCode){
        return response()->view('main');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|unique:instances',
            'type' => 'required|integer',
            'email' => 'required|string|email|unique:instances',
            'country' => 'required|string',
            'address' => 'required|string'
        ]);

        $user = auth()->user();
        if($user->role != 3 || !is_null($user->instance_code)){
            return response()->json([
                'message' => 'You are not authorized'
            ],401); 
        }

        $data = Instance::create([
            'name' => $validatedData['name'],
            'type' => $validatedData['type'],
            'email' => $validatedData['email'],
            'country' => $validatedData['country'],
            'address' => $validatedData['address'],
            'website' => $request->website,
            'code' => Str::random(10),
            'avatar' => $request->avatar,
            'owner_id' => $user->id,
        ]);

        $user->instance_code = $data->code;
        $user->instance_id = $data->id;
        $user->save();

        return response()->json([
            'message' => 'Successfully created new instance',
            'data' => $data,
        ],201); 
    }

    public function deletePosts($code){
        $user = auth()->user();
        if($user->role != 3 || is_null($user->instance_code)){
            return response()->json([
                'message' => 'You are not authorized'
            ],401); 
        }
        $instance = Instance::where('code', $code)->first();
        if (!$instance) {
            return response()->json(['message' => 'Instance not found'], 404);
        }
        UserPost::where('instance_id',$instance->id)->delete();
        UserActivity::where('instance_id',$instance->id)->delete();
        event(new DeletePosts($code));
        return response()->json(['message' => 'All posts and related activities have been deleted'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInstanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function show(Instance $instance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function edit(Instance $instance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstanceRequest  $request
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstanceRequest $request, Instance $instance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Instance  $instance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Instance $instance)
    {
        //
    }
}
