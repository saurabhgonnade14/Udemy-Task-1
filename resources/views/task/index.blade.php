@extends('layouts.master')


@section('content')

 <div class="row">
   <div class="col-md-6">
    {{-- @if($errors->any())

    @foreach ($errors->all() as $error)

    @endforeach
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endif --}}

    @if(session()->has('msg'))
    <div class="alert alert-success">{{session()->get('msg')}}</div>
    @endif

     <div class="card">
       <div class="card-header">
        Add Task
       </div>
        <div class="card-body">
          <form action="{{route('task.create')}}" method="post">
            @csrf
        </div>
        <div class="container">
         <label for="task">Task</label> <br>
         <input type="text" name="title" id="task" placeholder="Task"  class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}">
         <div class="invalid-feedback">
            {{ $errors->has('title') ? $errors->first('title')  : '' }}
          </div>
         </div>
        <div class="container"> <br>
            <input type="submit" class="btn btn-primary">
           </div><br>
       </form>
     </div>
   </div>
 </div>
<div>
 <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">
         View Task
        </div>
         <div class="card-body">
            <table class="table table-bordered">
             <tr>
            <th>Task</th>
            <th style="width:2em">Action</th>
             </tr>
             {{-- dd($tasks); --}}
             @foreach ( $task as $task)
             <tr>
                <td>{{$task->title}}</td>
                <form action="{{route('task.delete',$task->id)}}" method="post">
                    @csrf
                    @method('delete')
                <td><Button class="btn btn-danger">Delete</Button></td>
                </form>
             </tr>
             @endforeach
            </table>
           {{-- <form action="" method="POST">
         </div>
         <div class="form-group">
          <label for="task">Task</label> <br>
          <input type="text" class="task" type="task" placeholder="Task" class="form-control">
         </div>
         <div class="form-group">
             <input type="submit" class="btn btn-primary">
            </div>
        </form> --}}
      </div>
    </div>
  </div>
</div>

@endsection
