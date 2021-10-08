<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $postData = Task::where("user_id",$request->user()->id)->get();
       //dd($postData);
       return view("dashboard",compact("postData"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $req->validate([
           "task_name"=>"required|max:200|unique:tasks",
        ]);
        $req->user()->task()->create($req->all());
        return redirect("/dashboard")->with("data","Task is created Successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task,Request $req)
    {
         $task->delete($req->all());
         return redirect("/dashboard")->with("delData","Task is deleted Successfully");
    }
}
