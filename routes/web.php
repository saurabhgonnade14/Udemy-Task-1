<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\TaskController@index');
Route::post('/task/create', 'App\Http\Controllers\TaskController@store')->name('task.create');
Route::delete('/task/delete/{task}', 'App\Http\Controllers\TaskController@delete')->name('task.delete');
