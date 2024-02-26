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
})->name('home');
Route::get('/amb/ptn/home', function () {
    return view('amb_ptn_home');
})->name('ambulence_home');
Route::get('/aya', function () {
    return view('aya');
})->name('aya_home');
Route::get('/nurse', function () {
    return view('nurse');
})->name('nurse_home');
Route::get('/technician', function () {
    return view('technician');
})->name('technician_home');

// routes for BloodBank
Route::view ('/bloodBank','bloodB_home')->name('bloodB_home');