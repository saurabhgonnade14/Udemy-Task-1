<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\models\Task;
class TaskController extends Controller
{
public function index()
{
    $task=Task::all();
    return view('task.index',compact('task'));
}
public function store(Request $request)
{
    $request->validate([
    'title'=>'required'
    ]);
      $task=new Task();
      $task->title=$request->title;
      $task->save();

      session()->flash('msg','Task has been created');
      return redirect('/');

}

public function delete($id)
{
    $task=Task::find($id);
    $task->delete();
return redirect()->back()->with('msg','Task has been deleted');
}




}
