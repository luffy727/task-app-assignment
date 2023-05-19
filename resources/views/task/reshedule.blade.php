@extends('layouts.app')

@section('content')

<div class="container">
<div class="row justify-content-center">
     <div class="card col-md-10">
          <div class="card-header">
               <h5 class="card-title">CREATE TASK</h5>

          </div>
          <div class="card-body">
                   
               <form action="{{ url('update-Reshedule/'.$task->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                    <div class="col-md-6">
                         <label for="">TODO LIST</label>
                         <input type="text" readonly class="form-control-plaintext"  value="{{ $task->todolist->name }}">
                    </div>
                    <div class="col-md-6">
                         <label for="">Task name</label>
                         <input type="text" readonly class="form-control-plaintext"  value="{{ $task->t_name }}">
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
                         <button type="submit" class="btn btn-success">Reshedule</button>
                    </div>
               </form>
          </div>
     </div>
</div>
</div>

@endsection