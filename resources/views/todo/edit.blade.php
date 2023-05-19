@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
     <div class="card col-md-10">
          <div class="card-header">
               <h5 class="card-title">UPDATE TODO LIST</h5>

          </div>
          <div class="card-body">
               <form action="{{ url('update-todolist/'.$todo->id) }}" method="POST">
               @csrf
               @method('PUT')
                    <div class="row">
                         <div class="col-md-6">
                              <label for="">Title of TODO List</label>
                              <input class="form-control" type="text" name="name" value="{{ $todo->name }}" required>
                         </div>
                         <div class="col-md-6">
                              <label for="">Description</label>
                              <input class="form-control" type="text" name="description" value="{{ $todo->description }}" required>
                         </div>
                    </div>
                    <br>
                    <div>
                         <button type="submit" class="btn btn-primary">Update</button>
                    </div>
               </form>
          </div>
     </div>
</div>
</div>
@endsection