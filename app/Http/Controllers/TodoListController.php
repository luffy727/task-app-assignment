<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todolist;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\RedirectResponse;

class TodoListController extends Controller
{
    public function index()
    {
        $todo = Todolist::all();
        return view('todo.index',compact('todo'));
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            // Add more validation rules for other fields
        ]);
        $todo = new Todolist();
        $todo->name = $validatedData['name'];
        $todo->description= $validatedData['description'];
        $todo->save();
        Alert::success('TODO List Created')->autoClose(5000);;
        // Redirect to a success page or return a JSON response
        return redirect('Todo-view');

    }

    // public function manage()
    // {
    //     $blog = Blogpost::where('uid', Auth::id())->get();
    //     return view('managepost', compact('blog'));
    // }

    public function edit($id)
    {
        $todo = Todolist::find($id);
        return view('todo.edit', compact('todo'));
    }

    public function update(Request $request, $id)
    {
        $todo = Todolist::find($id);

        $todo->name = $request->input('name');
        $todo->description = $request->input('description');
        $todo->update();
        Alert::success('Todo list Updated Successfully', 'see the updated todolist');
        return redirect('/home');
    }

    public function delete($id)
    {
        $todo = Todolist::find($id);
        $todo->delete();
        Alert::error('TodoList deleted Successfully');
        return redirect('Todo-view')->with('message','Post deleted successfully');
        
        
    }
}
