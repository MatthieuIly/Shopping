<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\CheckinBookController;
use App\Http\Controllers\TailwindcssController;
use App\Http\Controllers\CheckoutBookController;

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

Route::get('/', [ShoppingController::class, 'liste'])->name('shopping');
Route::post('add', [ShoppingController::class, 'add'])->name('shopping.add');
Route::put('update/{article}', [ShoppingController::class, 'update'])->name('shopping.update');
Route::delete('delete/{article}', [ShoppingController::class, 'delete'])->name('shopping.delete');

Route::get('/tailwindcss', [TailwindcssController::class, 'index'])->name('tailwindcss.index');

Route::post('/books', [BooksController::class, 'store']);
Route::patch('/books/{book}', [BooksController::class, 'update']);
Route::delete('/books/{book}', [BooksController::class, 'delete']);

Route::get('/authors/create', [AuthorController::class, 'create']);
Route::post('/authors', [AuthorController::class, 'store']);

Route::post('/checkout/{book}', [CheckoutBookController::class, 'store']);
Route::post('/checkin/{book}', [CheckinBookController::class, 'store']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
