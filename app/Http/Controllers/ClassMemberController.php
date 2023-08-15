<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassMemberRequest;
use App\Http\Requests\UpdateClassMemberRequest;
use App\Models\ClassMember;
use App\Models\UserCato;
use App\Models\InstanceClass;
use App\Models\Instance;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ClassMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ClassMember::all();
    }

    public function userClasses($id){
        return ClassMember::where('user_cato_id',$id)->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        /*$userAuth = auth()->user();
        $user = UserCato::find($userAuth->id);
        $class = InstanceClass::find($id);
        $class->users()->attach($user, ['joined_at' => now()]);
        return response()->json(['message' => 'User added to a class successfully'], 201);*/

        
        $user = auth()->user();
        $class = InstanceClass::find($id);
       

        if ($user->instance_id != InstanceClass::find($id)->instance_id) {
            return response()->json(['message' => 'You are not a member of this class instance'], 401);
        } else {
            if(!$class){
                return response()->json(['message' => 'Class not found'], 404);
            } else {
                $data = ClassMember::create([
                    'instance_class_id' => $id,
                    'user_cato_id' => $user->id,
                    'joined_at' => now()
                ]);
                return response()->json(['message' => 'User added to a class.'], 201);
            }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClassMemberRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassMemberRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassMember  $classMember
     * @return \Illuminate\Http\Response
     */
    public function show(ClassMember $classMember)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassMember  $classMember
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassMember $classMember)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClassMemberRequest  $request
     * @param  \App\Models\ClassMember  $classMember
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassMemberRequest $request, ClassMember $classMember)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassMember  $classMember
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassMember $classMember)
    {
        //
    }
}
