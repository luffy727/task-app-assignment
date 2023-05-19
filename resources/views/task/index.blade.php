@extends('layouts.app')

@section('content')
     <div class="container">
          <div class="card col-md-12">
               <div class="card-header">
                    TODO Lists
               </div>
               <div class="card-body">
                    <table class="table table-light">
                         <thead class="thead-light">
                              <tr>
                                   <th>id</th>
                                   <th>Todo List Name</th>
                                   <th>Due date</th>
                                   <th>Due Time</th>
                                   <th>Action</th>
                                   <th>Delete</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach($tasks as $task)
                              <tr>
                                   <td>{{$task->id}}</td>
                                   <td>{{$task->todolist->name}}</td>
                                   <td>{{$task->due_date}}</td>
                                   <td>{{$task->due_time}}</td>
                                   <td>
                                        <a href="{{ url('edit-task/'.$task->id)}}" class="btn btn-info">Edit</a>
                                   <br>
                                   </td>
                                   <td>
                                        <a href="{{ url('delete-task/'.$task->id)}}" type="button" class="btn btn-danger ">Delete</a>
                                   </td>

                              </tr>
                              @endforeach
                         </tbody>
                    </table>
               </div>
          </div>
     </div>

@endsection