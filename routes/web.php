<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/new', [ 
    'uses'=>'PagesController@new'
]);

Route::get('/todos', [
    'uses'=>'TodosController@index', 'as'=>'todo.index'
]);

Route::post('/create/todo', [
    'uses'=>'TodosController@store'
]);

route::get('/todo/delete/{id}', [
    'uses'=>'TodosController@delete',
    'as'=>'todo.delete'
]);

route::get('/todo/update/{id}', [
    'uses'=>'TodosController@update',
    'as'=>'todo.update'
]);


route::post('/todo/save/{id}',[
    'uses'=>'TodosController@save',
    'as'=>'todo.save'
]);

route::get('/todo/completed/{id}',[
    'uses'=>'TodosController@completed',
    'as'=>'todos.completed'
]);


route::get('/todo/notcompleted/{id}',[
    'uses'=>'TodosController@notcompleted',
    'as'=>'todos.notcompleted'
]);
