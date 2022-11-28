<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\TailwindcssController;

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

Route::get('/tailwindcss', [TailwindcssController::class, 'index'])->name('tailwindcss.index');
