

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
          <form action="/create/todo" method="post">
            {{ csrf_field() }}
            <input type="text" class="form-control form-control-lg" name="todo" placeholder="Create new To do">
          </form>
        </div>
      </div>

      @foreach($todos as $index=>$todo)
        <div class="row">
          <div class="col-md-2">
            <!-- {{$index+1}}  -->
            <select class="custom-select " style="width: fit-content;"  onchange="location = this.value;" >
              <option selected >
                @if(!$todo->completed) 
                  Pending
                @elseif ($todo->completed==1)
                  Done
                @endif
              </option>
              <option value="{{ route('todos.notcompleted', ['id'=>$todo->id]) }}">Pending</option>
              <option value="{{ route('todos.completed', ['id'=>$todo->id]) }}"> Done </option>
            </select>
          </div>
          
          <div class="col-md">
            <h1 class="blockquote" style="@if($todo->completed==1)   text-decoration: line-through;  @endif">{{$todo->todo }}   </h1>
          </div>
          <div class="col-md-2 text-right">
            <a href="{{route('todo.update',['id'=>$todo->id])}}" class="btn btn-danger "><i class="material-icons">update</i></a>
            <a href="#" class="btn btn-danger " onclick="return confirm_delete({{$todo->id}})"><i class="material-icons">delete_forever</i></a>
          </div>
        </div><hr>
      @endforeach

    </div>
  </div>



@stop


