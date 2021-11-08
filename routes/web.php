<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Models\Todo;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('/',[TodosController::class, 'index']);
//Route::post('/',[TodosController::class, 'store']);
//Route::delete('/',[TodosController::class, 'delete']);


Route::get('/',[TodosController::class, 'index'])->name('index'); 
//Route::put('/',[TodosController::class, 'update']);
//Route::get('todos/{id}','TodosController@index')->name('todos');
Route::resource('todos',TodosController::class);

//Route::get('/', [TodosController::class, 'find']);
Route::post('/', [TodosController::class, 'search'])->name('index.search');

//論理削除したデータを確認する「/softdelete/get」にアクセスすると論理削除したデータが見れる。
Route::get('softdelete/get', function () {
  $todo = Todo::onlyTrashed()->get();
  dd($todo);
});

//論理削除されたレコードの復元「/softdelete/store」にアクセすると復元する。
Route::get('softdelete/store', function () {
  $result = Todo::onlyTrashed()->restore();
  echo $result;
});

//論理削除されたレコードの完全削除「/softdelete/absolute」にアクセスすると完全に削除される。
Route::get('softdelete/absolute', function () {
  $result = Todo::onlyTrashed()->forceDelete();
  echo $result;
});

//論理削除されたものを含んで表示させる機能
Route::post('archive', [TodosController::class, 'show'])->name('index.archive');


//Route::get('/',[TodosController::class, 'index']); 
//Route::post('todos',[TodosController::class, 'store']);
//Route::delete('todos',[TodosController::class, 'destroy']);
//Route::put('todos',[TodosController::class, 'update']);
