<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/',[HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect',[HomeController::class, 'redirect']);

Route::get('/view_category',[AdminController::class, 'view_category']);

Route::post('/add_category',[AdminController::class, 'add_category']);

Route::get('/delete_category/{id}',[AdminController::class, 'delete_category']);

Route::post('/add_book',[AdminController::class, 'add_book']);

Route::get('/view_book',[AdminController::class, 'view_book']);

Route::get('/show_book',[AdminController::class, 'show_book']);

Route::get('/delete_book/{id}',[AdminController::class, 'delete_book']);

Route::get('/update_book/{id}',[AdminController::class, 'update_book']);

Route::post('/update_book_confirm/{id}',[AdminController::class, 'update_book_confirm']);

Route::get('/book_details/{id}',[HomeController::class, 'book_details']);

Route::post('/add_cart/{id}',[HomeController::class, 'add_cart']);

Route::get('show_cart',[HomeController::class, 'show_cart']);

Route::get('/remove_cart/{id}',[HomeController::class, 'remove_cart']);

Route::get('/borrow_book',[HomeController::class, 'borrow_book']);

Route::get('borrow_history',[HomeController::class, 'borrow_history']);


