<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreClassPostRequest;
use App\Http\Requests\UpdateClassPostRequest;
use App\Models\InstanceClass;
use App\Models\ClassPost;
use App\Events\ClassPosts;

class ClassPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function indexByClass($id){
        $class = InstanceClass::where('id', $id)->first();
        if (!$class) {
            return response()->json(['message' => 'Class not found'], 404);
        }
        return $class->posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $id)
    {
        $class = InstanceClass::where('id', $id)->first();
        if (!$class) {
            return response()->json(['message' => 'Class not found'], 404);
        }
        $user = auth()->user();
        $data = ClassPost::create([
            'instance_class_id' => $class->id,
            'poster_id' => $user->id,
            'caption' => $request->caption
        ]);
        event(new ClassPosts($data->id,$user->firstname.' '.$user->lastname,$user->profile,$data->caption,$data->created_at,$user->instance_code,$class->id));
        return response()->json(['message' => 'Successfully posted on a class', 'data' => $data], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClassPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassPostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassPost  $classPost
     * @return \Illuminate\Http\Response
     */
    public function show(ClassPost $classPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassPost  $classPost
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassPost $classPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClassPostRequest  $request
     * @param  \App\Models\ClassPost  $classPost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassPostRequest $request, ClassPost $classPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassPost  $classPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassPost $classPost)
    {
        //
    }
}
