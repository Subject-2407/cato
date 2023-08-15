<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserPostRequest;
use App\Http\Requests\UpdateUserPostRequest;
use App\Models\UserPost;
use App\Models\UserActivity;
use App\Models\Instance;
use Illuminate\Http\Request;
use App\Events\Post;
use App\Events\Activity;

class UserPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserPost::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function create(Request $request)
    {
        $fileName = null;
        $poster = auth()->user();
        $validatedData = $request->validate([
            'caption' => 'required|string'
        ]);

        $longName = $poster->firstname . " " . $poster->lastname;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $filePath = $file->store('public/img/posts');
            $substring = "public/img/posts/";
            $fileName = str_replace($substring, "", $filePath);
        }

        $data = UserPost::create([
            'poster_id' => $poster->id,
            'poster_name' => $longName,
            'poster_avatar' => $poster->profile,
            'instance_id' => $poster->instance_id,
            'caption' => $validatedData['caption'],
            'media' => $fileName
        ]);

        event(new Post($poster->id,$request->caption,$data->id,$longName,$poster->profile,$fileName,$data->created_at,$poster->instance_code));

        $oldDescription = $validatedData['caption'];
        if(strlen($validatedData['caption']) > 24){
            $oldDescription = substr($validatedData['caption'], 0, 24);
            $oldDescription = $oldDescription.'...';
        }

        UserActivity::create([
            'user_id' => $poster->id,
            'instance_id' => $poster->instance_id,
            'user_name' => $longName,
            'type' => 1,
            'description' => $oldDescription
        ]);

        event(new Activity($poster->id,$longName,1,$oldDescription,$data->created_at,$poster->instance_code));

        return response()->json([
            'message' => 'Successfully posted',
            'data' => $data,
        ],201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserPostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserPostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserPost  $userPost
     * @return \Illuminate\Http\Response
     */
    public function show(UserPost $userPost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserPost  $userPost
     * @return \Illuminate\Http\Response
     */
    public function edit(UserPost $userPost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserPostRequest  $request
     * @param  \App\Models\UserPost  $userPost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserPostRequest $request, UserPost $userPost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserPost  $userPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserPost $userPost)
    {
        //
    }
}
