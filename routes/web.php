<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/residents', function () {
    return view('residents');
});
Route::get('/documents', function () {
    return view('documents');
});
Route::get('/documents-admin', function () {
    return view('documents-admin');
});
Route::get('/daily_transactions', function () {
    return view('daily_transactions');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
