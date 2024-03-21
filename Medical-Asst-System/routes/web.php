<?php

use App\Http\Controllers\AmbulanceDriverPageController;
use App\Http\Controllers\newAmbulanceRegistrationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicalSuppliesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PdfController;
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
Route::view ('BookBlood','/Blood_Booking/bloodB_home')->name('bloodB_home');
Route::view ('booking_form','/Blood_Booking/form')->name('blood_booking_form');


/*-------------------Medical Supplies----------------------------------*/
Route::get('/medical supplies',[MedicalSuppliesController::class,'index'])->name('medical_supplies.index');
Route::get('/technical supplies',[MedicalSuppliesController::class,'indexb'])->name('medical_supplies.indexb');
Route::get('/medical supplies/{medical_supplies_medical}/detail',[MedicalSuppliesController::class,'edit'])->name('medical_supplies.detail');
Route::get('/technical supplies/{medical_supplies_technical}/detail',[MedicalSuppliesController::class,'editb'])->name('technical_supplies.detail');
Route::post('/medical supplies/detail',[MedicalSuppliesController::class,'store'])->name('medical_supplies.store');
Route::post('/technical supplies/detail',[MedicalSuppliesController::class,'storeb'])->name('technical_supplies.storeb');
Route::get('/cart',[MedicalSuppliesController::class,'cart'])->name('medical_supplies.cart');
Route::delete('/cart/{cart}/delete',[MedicalSuppliesController::class,'delete'])->name('cart.delete');
Route::put('/cart/{cart}/update',[MedicalSuppliesController::class,'update'])->name('cart.update');
Route::get('/order confirmation',[MedicalSuppliesController::class,'order'])->name('medical_supplies.order_confirmation');
/*-------------------Medical Supplies----------------------------------*/

/*-------------------Admin Panel----------------------------------*/
Route::get('/admin panel',[AdminController::class,'index'])->name('admin_panel.index');
Route::get('/admin medical supplies',[AdminController::class,'admin_supplies'])->name('admin_panel.admin_medical_supplies');
/*-------------------Admin Panel----------------------------------*/

/*-------------------others----------------------------------*/
Route::get('/send-mail',[MailController::class,'index']);
Route::get('/send-attach-mail',[MailController::class,'send_attach_email']);
Route::get('/generate-pdf',[PdfController::class,'generatePdf']);
Route::get('/generate-pdfb',[MedicalSuppliesController::class,'generatePdfb']);//not ready yet
/*-------------------others----------------------------------*/

// ---------------------Ambulance Service Routes---------------------------

Route::get('/amb-data-json',[AmbulanceDriverPageController::class,'getAmbulanceData']);

Route::get('/amb-reg',function(){
    return view('new_amb_reg');
});

Route::post('/amb-reg',[newAmbulanceRegistrationController::class,'addNewService'])->name('addNewAmb');

Route::get('/amb-book',function()
{
    return view('amb_booking');
});

Route::get('/get-dist',[AmbulanceDriverPageController::class,'fetchDistance']);

Route::get('/driver-intf',[AmbulanceDriverPageController::class,'driverShowRidesAvailable']);

Route::get('/driver-ride-accepted',[AmbulanceDriverPageController::class,'rideAccepted']);