@extends('layouts.app')

@section('content')


     <div class="container">
          <div class="card col-md-12">
               <div class="card-header">
                    TODO Lists
               </div>
               <div class="card-body">
                    <table class="table table-dark">
                         <thead class="thead-dark">
                              <tr>
                                   <th>id</th>
                                   <th>Title</th>
                                   <th>Description</th>
                                   <th>action</th>
                                   <th>delete</th>
                              </tr>
                         </thead>
                         <tbody>
                              @foreach( $todo as $item)
                              <tr>
                                   <td ><b>{{ $item->id}}</b></td>
                                   <td ><b>{{ $item->name}}</b></td>
                                   <td ><b>{{ $item->description }}</b></td>
                                   <td>
                                        <a href="{{ url('edit-todolist/'.$item->id) }}" class="btn btn-info">Edit</a>
                                   <br>
                                   </td>
                                   <td>
                                        <a href="{{ url('delete-todolist/'.$item->id) }}" type="button" class="btn btn-danger ">Delete</a>
                                   </td>
                              </tr>
                              @endforeach
                         </tbody>
                    </table>
               </div>
          </div>
     </div>
 @endsection