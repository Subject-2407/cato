<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreInstanceClassRequest;
use App\Http\Requests\UpdateInstanceClassRequest;
use App\Models\InstanceClass;
use App\Models\ClassTask;
use DB;
use Illuminate\Support\Collection;

class InstanceClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return InstanceClass::all();
    }
    
    public function indexByClass($code)
    {
        $instance = DB::table('instances')->where('code', $code)->first();
        if (!$instance) {
            return response()->json(['message' => 'Instance not found'], 404);
        } else {
            $classes = InstanceClass::where('instance_id',$instance->id)->get();
            return $classes;
        }
    }

    public function classProfile($id){
        $class = InstanceClass::where('id', $id)->first();
        if (!$class) {
            return response()->json(['message' => 'Class not found'], 404);
        } 
        $classMembers = DB::table('class_members')->where('instance_class_id',$class->id)->count();

        return [
            'id' => $class->id,
            'name' => $class->name,
            'owner_id' => $class->owner_id,
            'avatar' => $class->avatar,
            'members' => $classMembers,
        ];
    }

    public function showMembers($id){
        $class = InstanceClass::where('id', $id)->first();
        if (!$class) {
            return response()->json(['message' => 'Class not found'], 404);
        } else {
            $members = $class->users;
            return $members;
        }
    }

    public function showTasks($id){
        $class = InstanceClass::where('id', $id)->first();
        if (!$class) {
            return response()->json(['message' => 'Class not found'], 404);
        } else {
            return ClassTask::where('class_id',$id)->get();
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
        ]);

        $user = auth()->user();

        if($user->role < 2){
            return response()->json([
                'message' => 'You are not authorized!'
            ],401);
        } else {

            $instance = DB::table('instances')->where('code', $user->instance_code)->first();

            $data = InstanceClass::create([
                'instance_id' => $instance->id,
                'name' => $validatedData['name'],
                'owner_id' => $user->id,
                'avatar'=> $request->avatar,
                'members' => 1
            ]);

            $data->users()->syncWithoutDetaching([$user->id => ['joined_at' => now()]]);

            return response()->json([
                'message' => 'Successfully created new class',
                'data' => $data,
            ],201); 
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreInstanceClassRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInstanceClassRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InstanceClass  $instanceClass
     * @return \Illuminate\Http\Response
     */
    public function show(InstanceClass $instanceClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InstanceClass  $instanceClass
     * @return \Illuminate\Http\Response
     */
    public function edit(InstanceClass $instanceClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInstanceClassRequest  $request
     * @param  \App\Models\InstanceClass  $instanceClass
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateInstanceClassRequest $request, InstanceClass $instanceClass)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InstanceClass  $instanceClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(InstanceClass $instanceClass)
    {
        //
    }
}
