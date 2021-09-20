<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo; //useするのを忘れずに！

class TodosController extends Controller
{
    public function index() {
        $todos = Todo::all();
        return view('todos.index')->with('todos', $todos);
    }

    public function delete(Request $request) {
        $todo = Todo::find($request->id);
        $todo->delete();
        return redirect('/');
    }

    public function store(Request $request) {
        $todo = $request->task;
        Todo::create(['content' => $request->task]);
        return redirect('/');
    }
}
