<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;

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
Route::get('/', [StudentController::class, 'home']);

Route::resource('/home', StudentController::class);
Route::get('/search', [StudentController::class, 'search'])->name('search');
Route::get('/fetch-result', [StudentController::class, 'searchResult'])->name('fetch-result');



// Route::get('/', function () {
//     return view('home.register');
// });

Auth::routes();
Route::resource('/admin', AdminController::class);
