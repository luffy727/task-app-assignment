@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
     <div class="card col-md-10">
          <div class="card-header">
               <h5 class="card-title">CREATE TASK</h5>

          </div>
          <div class="card-body">
                   
               <form action="{{ url('update-task/'.$task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <div class="col-md-6">
                         <label for="">Select the TODO LIST</label>
                         <select class="form-select" aria-label="Default select example" name="todo_id">
                              <option value="">Open this select menu</option>
                              @foreach($todo as $todos)
                              <option value="{{ $todos->id }}" @if ($todos->id === $task->todo_id) selected @endif>{{ $todos->name }}</option>
                              @endforeach
                              
                         </select>
                    </div>
                    <div class="col-md-6">
                         <label for="">Task name</label>
                         <input class="form-control" type="text" name="t_name" value="{{ $task->t_name }}">
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6">
                         <label for="">Due Date</label>
                         <input  class="form-control" type="date" name="due_date" value="{{ $task->due_date }}">
                         
                    </div>
                    <div class="col-md-6">
                         <label for="">Due Time</label>
                         <input class="form-control" type="time" name="due_time" value="{{ $task->due_time }}">
                    </div>
                    </div>
                    <br>
                    <div>
                         <button type="submit" class="btn btn-success">Update</button>
                    </div>
               </form>
          </div>
     </div>
</div>
</div>
@endsection