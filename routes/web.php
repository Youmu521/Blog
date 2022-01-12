<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ItemizeController;
use App\Http\Controllers\WebController;
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

Route::get('/', [BlogController::class,'index'])->name('blog');

Route::get('/blog/details/{blog}', [BlogController::class,'details'])->name('blog.details');

Route::get('/itemize',[ItemizeController::class,'itemize'])->name('itemize');

Route::get('/web',[WebController::class,'web'])->name('web');

