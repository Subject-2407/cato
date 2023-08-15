<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserCatoRequest;
use App\Http\Requests\UpdateUserCatoRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Models\UserCato;
use App\Models\Instance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Collection;
use DB;

class UserCatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return UserCato::all();
    }

    public function indexByCode($code){
        $data = DB::table('user_catos')
            ->join('instances', 'user_catos.instance_code', '=', 'instances.code')
            ->select('user_catos.id', 'user_catos.firstname', 'user_catos.lastname', 'instances.name as instance_name')
            ->where('user_catos.instance_code',$code)
            ->get();
        //$data = UserCato::where('instance_code',$code)->get();
        if($data->count() == 0){
            return response()->json(['message' => 'Instance not found'],404);
        } else {
            return $data;
        }

    }

    public function showById($id){
        $user = UserCato::where('id', $id)->first();
        if(!$user){
            return response()->json(['message' => 'User not found'],404);
        } else {
            return $user;
        }
    }

    public function showClasses($id){
        $user = UserCato::where('id', $id)->first();
        $classes = $user->classes;
        if(!$user){
            return response()->json(['message' => 'User not found'],404);
        } else {
            $classes = $user->classes->values()->map(function ($class) {
                $classMembers = DB::table('class_members')->where('instance_class_id',$class->id)->count();
                $classOwner = DB::table('user_catos')->where('id',$class->owner_id)->first();
                $owner = [
                    'name' => $classOwner->firstname.' '.$classOwner->lastname,
                    'profile' => $classOwner->profile
                ];
                return [
                    'id' => $class->id,
                    'name' => $class->name,
                    'owner' => $owner,
                    'avatar' => $class->avatar,
                    'members' => $classMembers
                ];
            })->sortBy('name')->values();
            return $classes;
        }
    }

    public function notJoinedClasses($id){
        $user = UserCato::where('id', $id)->first();
        if(!$user){
            return response()->json(['message' => 'User not found'],404);
        }

        $query = "
            SELECT ic.id, ic.name, ic.owner_id, ic.avatar
            FROM instance_classes ic
            WHERE ic.id NOT IN (
                SELECT cm.instance_class_id
                FROM class_members cm
                WHERE cm.user_cato_id = ?
            )
        ";

        $results = DB::select($query, [$id]);

        $collection = collect($results);

        $classes = $collection->map(function ($class) {
            $classMembers = DB::table('class_members')->where('instance_class_id',$class->id)->count();
            return [
                'id' => $class->id,
                'name' => $class->name,
                'owner_id' => $class->owner_id,
                'avatar' => $class->avatar,
                'members' => $classMembers
            ];
        })->sortBy('name')->values();

        return response()->json($classes);

    }

    public function updateSelf(Request $request){
        $things = 0;
        $user = auth()->user();
        if(!$user){
            return response()->json(['message' => 'User not found'],404);
        } else {
            if($request->instance_code){
                $checkInstance = Instance::where('code',$request->instance_code)->first();
                if(!$checkInstance){
                    return response()->json(['message' => 'Instance does not exist!'], 404);
                }
                $user->instance_code = $request->instance_code;
                $user->instance_id = $checkInstance->id;
                $things++;
            }
            if($request->phone){
                $user->phone = $request->phone;
                $things++;
            }
            if($things > 0){
                auth()->user()->save();
                return response()->json(['message' => 'Successfully updated '.$things.' data to user ID : '.$user->id], 200);
            } else {
                return;
            }
        }
    }

    public function updateAvatar(Request $request){
        $user = auth()->user();
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $filePath = $file->store('public/img/profile');
            $substring = "public/img/profile/";
            $fileName = str_replace($substring, "", $filePath);
            $user->profile = $fileName;
            $user->save();
            return response()->json(['message' => 'Successfully updated avatar for user ID : '.$user->id], 200);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|string|email|unique:user_catos',
            'password' => 'required|string|min:10',
            'role' => 'required|integer',
            'firstname' => 'required|alpha|max:100',
            'lastname' => 'required|alpha|max:100',
            'birthdate' => 'required|date',
            'gender' => 'required|alpha',
            'occupation' => 'required|integer',
            'country' => 'required|alpha',
        ]);

        $instanceId = null;
        if(!is_null($request->instance_code)){
            $checkInstance = Instance::where('code',$request->instance_code)->first();
            if(!$checkInstance){
                return response()->json(['message' => 'Instance does not exist!'], 404);
            }
            $instanceId = $checkInstance->id;
        }

        $data = UserCato::create([
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'instance_code' => $request->instance_code,
            'instance_id' => $instanceId,
            'role' => $validatedData['role'],
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'birthdate' => $validatedData['birthdate'],
            'gender' => $validatedData['gender'],
            'occupation' => $validatedData['occupation'],
            'profession' => $request->profession,
            'title' => $request->title,
            'personalid' => $request->personalid,
            'country' => $validatedData['country'],
            'phone' => $request->phone,
            'profile' => $request->profile
        ]);

        event(new Registered($data));
        return response()->json([
            'message' => 'Successfully registered',
            'data' => $data,
        ],201); 
    
    }

    public function upPass(Request $request,$id){
        $user = UserCato::where('id',$id)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'message' => 'Successfully updateed password'
        ],200); 
    }

    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($validatedData)) {
            return response()->json(['message' => 'Invalid email or password'], 401);
        }

        $user = Auth::user();
        /*if($user->email_verified_at == null){
            return response()->json(['message' => 'Please verify your email address'], 401);
        }*/
        $token = $user->createToken('Laravel Sanctum')->plainTextToken;

        return response()->json([
            'user' => $user,
            'auth_token' => $token,
        ], 200)->cookie('token', $token, 4320, '/', null, true, false);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserCatoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserCatoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserCato  $userCato
     * @return \Illuminate\Http\Response
     */
    public function show(UserCato $userCato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserCato  $userCato
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCato $userCato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserCatoRequest  $request
     * @param  \App\Models\UserCato  $userCato
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserCatoRequest $request, UserCato $userCato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserCato  $userCato
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCato $userCato)
    {
        //
    }
}
