<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;
use App\Models\Task;
use Alert;

class TaskController extends Controller
{
    public function index()
    {
        $todo = Todolist::all();
        return view('task.create', compact('todo'));
    }

    public function storetask(Request $request)
    {
        $task = new Task(); 

        $this->validate($request,[
            'todo_id' => 'required',
            't_name' => 'required',
            'due_date' => 'required|date|after_or_equal:today',
            'due_time' => 'required',

        ]);

        
        
        $task->t_name = $request->input('t_name');
        $task->todo_id = $request->input('todo_id');
        $task->due_time = $request->input('due_time');
        $task->due_date = $request->input('due_date');
        $task->save();
        Alert::success('Task List Created');
        // Redirect to a success page or return a JSON response
        return redirect('/home');
    }

    public function view()
    {
        $tasks = Task::with('todolist')->get();
        return view('task.index', compact('tasks'));

    }

    public function edit($id)
    {
        $task = Task::find($id);
        $todo = Todolist::all();
        return view('task.edit', compact('task','todo'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::find($id);

        $task->t_name = $request->input('t_name');
        $task->todo_id = $request->input('todo_id');
        $task->due_time = $request->input('due_time');
        $task->due_date = $request->input('due_date');
        $task->update();
        Alert::success('Task Updated Successfully', 'see the updated task');
        return redirect('/home');
    }

    public function delete($id)
    {
        $task = Task::find($id);
        $task->delete();
        Alert::error('task deleted Successfully');
        return redirect('/home')->with('message','Post deleted successfully');
        
    }

    public function taskstatus(Request $request)
    {
        $selectedItems = $request->input('selectedItems', []);
        
        // Process the selected items, save to database, and update the status
        foreach ($selectedItems as $taskId) {
            $task = Task::find($taskId);
            
            if ($task) {
                $task->status = 1;
                $task->save();
            }
        }

        return redirect('/home');
    }

    public function reshedule($id)
    {
        $task = Task::with(['todolist'])->find(intval($id));
        $todo = Todolist::all();
        return view('task.reshedule', compact('task','todo'));
    }

    public function resheduleupdate(Request $request, $id)
    {
        $task = Task::find($id);
        $task->due_time = $request->input('due_time');
        $task->due_date = $request->input('due_date');
        $task->update();
        Alert::success('task  Updated Successfully', 'see the updated task');
        return redirect('/home');

    }
}
