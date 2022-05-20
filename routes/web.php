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

use App\Models\Book;
use Illuminate\Http\Request;
// use Session;

/**
* 本のダッシュボード表示
*/
Route::get('/', [App\Http\Controllers\BooksController::class, 'index']);

/**
* 本を追加 
*/
Route::post('/books', [App\Http\Controllers\BooksController::class,'store']);

/**
 * 本の情報を編集
 */
Route::post('/booksedit/{book}', [App\Http\Controllers\BooksController::class, 'edit']);

Route::post('book/update', [App\Http\Controllers\BooksController::class, 'update']);

/**
* 本を削除 
*/
Route::delete('/book/{book}',  [App\Http\Controllers\BooksController::class, 'delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\BooksController::class, 'index'])->name('home');
