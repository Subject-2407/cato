<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskGradesRequest;
use App\Http\Requests\UpdateTaskGradesRequest;
use Illuminate\Http\Request;
use App\Models\ClassTask;
use App\Models\InstanceClass;
use App\Models\TaskGrades;
use DB;

class TaskGradesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TaskGrades::all();
    }

    public function indexByTaskId($id){
        $task = ClassTask::where('id',$id)->first();
        if(!$task){
            return response()->json(['message' => 'Task not found'], 404);
        } else {
            if(TaskGrades::where('task_id',$id)->count() > 0){
                return TaskGrades::where('task_id',$id)->get();
            } else return response()->json(['message' => 'No grades found in this task'], 404);
            
        }

    }

    public function indexByClass($id){
        $class = InstanceClass::where('id',$id)->first();
        if($class){
            if(TaskGrades::where('class_id',$class->id)->count() > 0){
                return TaskGrades::where('class_id',$class->id)->get();
            } else {
                return response()->json(['message' => 'No grades found in this class'], 404);
            }
        } else
        return response()->json(['message' => 'Class not found'], 404);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $class = InstanceClass::where('id',$request->class_id)->first();
        $students = $class->users->where('role',1);

        foreach($students as $student){
            TaskGrades::create([
                'class_id' => $class->id,
                'task_id' => $request->task_id,
                'student_id' => $student->id,
                'marks' => mt_rand(50, 94),
                'completed' => 1
            ]);
        }

        /*$data = TaskGrades::create([
            'task_id' => $request->input('taskid'),
            'student_id' => $request->input('studentid'),
            'marks' => $request->input('marks'),
            'completed' => 1
        ]);*/

        return response()->json([
            'message' => 'Successfully scored tasks for many members!',
        ],201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTaskGradesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTaskGradesRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TaskGrades  $taskGrades
     * @return \Illuminate\Http\Response
     */
    public function show(TaskGrades $taskGrades)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TaskGrades  $taskGrades
     * @return \Illuminate\Http\Response
     */
    public function edit(TaskGrades $taskGrades)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTaskGradesRequest  $request
     * @param  \App\Models\TaskGrades  $taskGrades
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskGradesRequest $request, TaskGrades $taskGrades)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TaskGrades  $taskGrades
     * @return \Illuminate\Http\Response
     */
    public function destroy(TaskGrades $taskGrades)
    {
        //
    }
}
