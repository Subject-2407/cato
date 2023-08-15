<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassTaskRequest;
use App\Http\Requests\UpdateClassTaskRequest;
use App\Models\ClassTask;
use Illuminate\Http\Request;
use DB;

class ClassTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ClassTask::all();
    }

    public function indexById($id){
        return ClassTask::where('id',$id)->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'class_id' => 'required|integer',
            'title' => 'required|string',
            'description' => 'required|string',
            'type' => 'required|integer',
        ]);

        $checkClass = DB::table('instance_classes')->where('id', $validatedData['class_id'])->first();
        if(!$checkClass){
            return response()->json(['message' => 'Class not found'],404);
        } else {
            $user = auth()->user();
            if($checkClass->owner_id != $user->id){
                return response()->json(['message' => 'You are not the owner of this class'],401);
            } else {
                $data = ClassTask::create([
                    'class_id' => $validatedData['class_id'],
                    'title' => $validatedData['title'],
                    'description' => $validatedData['description'],
                    'type' => $validatedData['type'],
                    'attachment' => $request->attachment
                ]);
    
                return response()->json([
                    'message' => 'Successfully created a task',
                    'data' => $data
                ],201);
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClassTaskRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassTaskRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassTask  $classTask
     * @return \Illuminate\Http\Response
     */
    public function show(ClassTask $classTask)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassTask  $classTask
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassTask $classTask)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClassTaskRequest  $request
     * @param  \App\Models\ClassTask  $classTask
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassTaskRequest $request, ClassTask $classTask)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassTask  $classTask
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassTask $classTask)
    {
        //
    }
}
