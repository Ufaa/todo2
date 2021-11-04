<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

    public function store(Request $request) {
        $validate_rule = [
            'content' => 'required|max:50',
        ];
        $this->validate($request, $validate_rule);

      $todo = new Todo();
      $todo->content = $request->content;
      $todo->save();       
      return redirect('/');
    }

    public function update(Request $request,todo $todo) {
                $validate_rule = [
            'content' => 'required',
        ];
        $this->validate($request, $validate_rule);
        
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
  public function search(Request $request,todo $todo )
  {
    $todo = Todo::where('content', 'LIKE', "%{$request->content}%")->get();
    //dd($todo);
    $param = [
      'input' => $request->content,
      'todo' => $todo
    ];
    return view('index', $param);
  }
}
