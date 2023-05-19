@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
     <div class="card col-md-10">
          <div class="card-header">
               <h5 class="card-title">CREATE TODO LIST</h5>

          </div>
          <div class="card-body">
               <form action="{{ route('todostore') }}" method="POST">
               @csrf
                    <div class="row">
                         <div class="col-md-6">
                              <label for="">Title of TODO List</label>
                              <input class="form-control" type="text" name="name">
                         </div>
                         <div class="col-md-6">
                              <label for="">Description</label>
                              <input class="form-control" type="text" name="description">
                         </div>
                    </div>
                    <br>
                    <div>
                         <button type="submit" class="btn btn-primary">Save</button>
                    </div>
               </form>
          </div>
     </div>
</div>
</div>
@endsection