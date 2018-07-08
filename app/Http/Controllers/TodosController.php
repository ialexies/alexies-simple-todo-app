<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Session; 



class TodosController extends Controller
{
    //
    public function index(){
        $todos = Todo::all();
        return view('todos')->with('todos', $todos);
    }

    public function store(Request $request){
        // dd($request->all());

        $todo = new Todo;

        $todo->todo = $request->todo;

        $todo->save();
        

        session::flash('success', 'Your todo was created.');
        return redirect()->back();

        // echo "fdf";
    }

    public function delete($id){
        // dd($id);

        $todo=  Todo::find($id);
        $todo->delete();

        session::flash('success', 'Your todo was deleted.');
        return redirect()->back();
    }

    public function update($id){
        $todo=Todo::find($id); 
        return view('update')->with('todo',$todo);

    }

    public function save(Request $request, $id){
        // dd($request->all());
        $todo=Todo::find($id);
        $todo->todo=$request->todo;
        $todo->save();
        session::flash('success', 'Your todo was updated.');
        return redirect()->route('todo.index');
    }

    public function completed($id){
        $todo=Todo::find($id); 
        $todo->completed=1;
        $todo->save();
        session::flash('success', 'Your todo was marked as completed.');
        return redirect()->back();
    }
    
    public function notcompleted($id){
        $todo=Todo::find($id); 
        $todo->completed=0;
        $todo->save();
        return redirect()->back();
    }

}
