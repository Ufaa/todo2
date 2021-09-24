<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo; //useするのを忘れずに！

class TodosController extends Controller
{
    public function index() {
        $todos = Todo::all();
        //dd($todos);
        return view('index')->with('todos', $todos);
    }

    public function destroy(todo $todo) {
        $todo->delete();
       return redirect('/');
     }

    public function store(Request $request) {
      $todo = new Todo();
      $todo->content = $request->content;
      $todo->save();
      return redirect('/');
    }

    public function update(Request $request,todo $todo) {
      return view('edit')->with('todo',$todo);
      $todo->content = $request->content;
      $todo->save();
      return redirect('/')->with('todo',$todo);
    }
}
