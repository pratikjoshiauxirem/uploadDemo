<?php

use App\Http\Controllers\uploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('upload', function () {
    return view('upload');
});
Route::post('upload', [uploadController::class, 'index']); 
Route::get('users', function () {
    return view('users');
});