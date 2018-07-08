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
        
        $not_success=array("Created", "Your Todo Task was Created");
        session::flash('success', $not_success);
        
        return redirect()->back();

        // echo "fdf";
    }

    public function delete($id){
        // dd($id);

        $todo=  Todo::find($id);
        $todo->delete();

        $not_success=array("Deleted", "Your Todo Task was Deleted");
        session::flash('success', $not_success);
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
        $not_success=array("Updated", "Your Todo Task was Updated");
        session::flash('success', $not_success);
        return redirect()->route('todo.index');
    }

    public function completed($id){
        $todo=Todo::find($id); 
        $todo->completed=1;
        $todo->save();
        $not_success=array("Created", "Your Todo Task was marked as Completed");
        session::flash('success', $not_success);
        return redirect()->back();
    }
    
    public function notcompleted($id){
        $todo=Todo::find($id); 
        $todo->completed=0;
        $todo->save();
        $not_success=array("Created", "Your Todo Task was marked as Pending");
        session::flash('success', $not_success);
        return redirect()->back();
    }

}
