

@extends('layouts')

@section('top_content')
  <div class="jumbotron">
    <div class="container ">
      <h1 class="display-1 text-center">Todo Notes</h1>
    </div>
  </div>
@stop

@section('content')

  <div class="row">
    <div class="col-md">
      <div class="row mb-3 mt-5">
        <div class="col-md">
          <form action="{{route('todo.save', ['id'=>$todo->id])}}" method="post">
            {{ csrf_field() }}
            <input type="text" class="form-control form-control-lg" name="todo"  value="{{$todo->todo}}" placeholder="Update new To do">
          </form>
        </div>
      </div>
    </div>
  </div>



@stop
