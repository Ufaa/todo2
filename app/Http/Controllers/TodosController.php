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
}
