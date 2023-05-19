@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-info">
            @foreach($todolists as $todo)
                <div class="card-header">{{ $todo->name }}</div>

                <div class="card-body">
                    <form action="{{ route('taskcomplete') }}" method="POST">
                    @csrf
                    <h5>Tasks</h5>
                @foreach ($todo->tasks as $task)
                
                       <div class="row {{ $task->isOverdue() ? 'overdue-task' : '' }}" >
                       @if ($task->isOverdue())
                            <div class= "col-md-2">
                            <a href="{{ url('Task-Reshedule/'.$task->id) }}" class="btn btn-danger" >Reschedule</a>
                            </div>
                        @endif
                            <div class="col-md-2">
                                <input type="text" readonly class="form-control-plaintext"  value="{{ $task->t_name }}">
                            </div>
                            <div class="col-md-2">
                                <input type="text" readonly class="form-control-plaintext"  value="{{ $task->due_date }}">
                            </div>
                            <div class="col-md-2">
                                <input type="text" readonly class="form-control-plaintext"  value="{{ $task->due_time }}">
                            </div>
                            @if($task->status == 1)
                            <div class="col-md-2">
                                <span class="badge bg-success">completed</span>
                            </div>
                            @else
                            <div class="col-md-2">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="{{ $task->id }}" id="flexCheckDefault" name="selectedItems[]">
                                    
                                </div>
                            </div>
                            @endif
                       </div>   
                @endforeach
                    <div>
                        <button type="submit" class="btn btn-success">complete task</button>
                    </div>
                    </form>
                </div>
            @endforeach
            </div>
            <br>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <style>

        .overdue-task {
                background-color: yellow;
            }
    </style>
@endpush
