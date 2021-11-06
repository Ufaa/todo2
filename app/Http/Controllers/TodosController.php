<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Models\Todo; //useするのを忘れずに！

class TodosController extends Controller
{
    public function index() {
        //ページネーション追加（Simpleをつけるかつけないか）
        $todos = Todo::Paginate(10);
        //$todos = Todo::all();
        //dd($todos);
        return view('index')->with('todos', $todos);
    }

    public function destroy(todo $todo) {
        $todo->delete();
       return redirect('/');
     }

    public function store(ClientRequest $request) {
        

      $todo = new Todo();
      $todo->content = $request->content;
      $todo->save();       
      return redirect('/');
    }

    public function update(ClientRequest $request,todo $todo) {
        
        
      //dd($request);
      //return view('edit')->with('todo',$todo);
      $todo->content = $request->content;
      $todo->save();
      return redirect('/')->with('todo',$todo);
      //return view('/')->with('todo',$todo);
    }

  //public function find()
  //{
  //  return view('/', ['input' => '']);
  //}
  public function search(ClientRequest $request)
  {
    
    $todo = Todo::where('content', 'LIKE', "%{$request->content2}%")->paginate(10);
    //dd($todo);
    return view('index')->with('todos', $todo);
  }
}
