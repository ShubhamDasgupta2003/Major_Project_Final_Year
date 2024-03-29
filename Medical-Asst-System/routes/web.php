<?php

use App\Http\Controllers\AmbulanceDriverPageController;
use App\Http\Controllers\newAmbulanceRegistrationController;
use App\Http\Controllers\AmbulanceRideRequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicalSuppliesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;
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

Route::get('/amb-reg',[newAmbulanceRegistrationController::class,'showRegForm']);

Route::post('/amb-reg',[newAmbulanceRegistrationController::class,'addNewService'])->name('addNewAmb');

// Route::get('/amb-chk-avl',function(){
//     return view('amb_check_aval');
// });

Route::get('/amb-chk-avl',[AmbulanceRideRequestController::class,'checkAmbulanceAvailability'])->name('check-availability');

Route::get('/amb-ptn-home',function(){
    return view('amb_ptn_booking_intf');
});

Route::post('/amb-ptn-home',[AmbulanceRideRequestController::class,'postNewRideRequest']);


Route::get('/amb-book',function()
{
    return view('amb_booking');
});

Route::get('/get-dist',[AmbulanceDriverPageController::class,'fetchDistance']);

Route::get('/driver-intf',[AmbulanceDriverPageController::class,'driverShowRidesAvailable']);

Route::get('/driver-ride-accepted',[AmbulanceDriverPageController::class,'rideAccepted']);
<<<<<<< HEAD
Route::get('/index', function () {
    return view('index');
})->name('index');
=======


// ---------------------Bed booking Service Routes start here---------------------------
// Route::get('/hos_bed',function(){
//     return view('hos_main');
// })->name('hos_bed');

// Route::get('/hos_main',[HospitalController::class,'GetHospitalData']);
Route::get('/hos_bed',[HospitalController::class,'GetHospitalData'])->name('hos_bed');
Route::get('/hos_form',function(){
    return view('hos_form');
});
Route::get('/hos_form/{id}',[HospitalController::class,'DisplayHosData'])->name('display.hos.data');
Route::get('/hos_form/{id}',[PatientController::class,'HosInfo'])->name('display.hos.info');
Route::post('/hos_form/{id}',[PatientController::class,'StoreData'])->name('store.data');
Route::get('/hos_confirm',[PatientController::class,'RedirectConfirm']);
// Route::get('/hos_form',[PatientController::class,'HospitalDataToForm'])->name('hos_info_form');
// ---------------------Bed booking Service Routes end here-----------------------------
>>>>>>> f4727475e03c27ceaaf0b1014687d65f41e72cdd
