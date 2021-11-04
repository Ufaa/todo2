<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;

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


Route::get('/',[TodosController::class, 'index']); 
//Route::put('/',[TodosController::class, 'update']);
//Route::get('todos/{id}','TodosController@index')->name('todos');
Route::resource('todos',TodosController::class);

Route::get('/', [TodosController::class, 'find']);
Route::post('/', [TodosController::class, 'search']);

//Route::get('/',[TodosController::class, 'index']); 
//Route::post('todos',[TodosController::class, 'store']);
//Route::delete('todos',[TodosController::class, 'destroy']);
//Route::put('todos',[TodosController::class, 'update']);
