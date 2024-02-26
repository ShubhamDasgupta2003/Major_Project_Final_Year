<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/amb/ptn/home', function () {
    return view('amb_ptn_home');
});
Route::get('/aya', function () {
    return view('aya');
});
Route::get('/nurse', function () {
    return view('nurse');
});
Route::get('/technician', function () {
    return view('technician');
});