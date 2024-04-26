<?php

use App\Http\Controllers\HomePageController;
use App\Http\Controllers\AmbulanceDriverPageController;
use App\Http\Controllers\AmbulanceRideConfirmedController; 
use App\Http\Controllers\BloodBankController;
use App\Http\Controllers\newAmbulanceRegistrationController;
use App\Http\Controllers\AmbulanceRideRequestController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\searchContoller;
use App\Http\Controllers\UserLogin;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicalSuppliesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserregController;

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

Route::get('/',[HomePageController::class,'locationPopUpWin'])->name('home');
/*-------------------Healthcare Support----------------------------------*/
Route::get('/aya', function () {
    return view('aya');
})->name('aya_home');
Route::get('/nurse', function () {
    return view('nurse');
})->name('nurse_home');
Route::get('/technician', function () {
    return view('technician');
})->name('technician_home');
Route::get('/rating', function () {
    return view('healthcare_support_emp_rating');
})->name('rating');
/*-------------------Healthcare Support----------------------------------*/


// routes for BloodBank
// Route::view ('BookBlood','/Blood_Booking/bloodB_home')->name('bloodB_home');
// Route::view ('booking_form','/Blood_Booking/form')->name('blood_booking_form');
Route::view ('RegisterNbank','/Blood_Booking/BbankRegister')->name('B_Bank_Register');
Route::view ('Userlogin','/Blood_Booking/login')->name('Userlogin');


Route::view('/BookBlood', '/Blood_Booking/bloodBInitial');
Route::post('/Userlogin', [UserLogin::class, 'userLogin'])->name('UserLogin-controller');
Route::post('/BanksRegister', [BloodBankController::class, 'newregistration'])->name('registerBanks');
Route::get('/bloodGroup', [BloodBankController::class, 'bloodGroup']);
// Route::post('/search', [BloodBankController::class, 'search'])->name('search');
Route::get('/showBhome', [BloodBankController::class, 'showBloodBanks'])->name('showBhome');
Route::get('/booking_form/{id}', [BloodBankController::class, 'booking'])->name('blood_booking_form');

Route::view ('/test','/Blood_Booking/test');
Route::view ('/b','/Blood_Booking/b')->name('b');
Route::view ('/a','/Blood_Booking/a');
Route::get('/asearch',[searchContoller::class,'search'])->name('searchtest');






/*-------------------Medical Supplies----------------------------------*/
Route::get('/medical supplies/{medical_supplies_medical}',[MedicalSuppliesController::class,'index'])->name('medical_supplies.index');
Route::get('/medical supplies',[MedicalSuppliesController::class,'index'])->name('medical_supplies.index');
Route::get('/technical supplies',[MedicalSuppliesController::class,'indexb'])->name('medical_supplies.indexb');
Route::get('/medical supplies/{medical_supplies_medical}/detail',[MedicalSuppliesController::class,'edit'])->name('medical_supplies.detail');
Route::get('/technical supplies/{medical_supplies_technical}/detail',[MedicalSuppliesController::class,'editb'])->name('technical_supplies.detail');
Route::post('/medical supplies/detail',[MedicalSuppliesController::class,'store'])->name('medical_supplies.store');
Route::post('/technical supplies/detail',[MedicalSuppliesController::class,'storeb'])->name('technical_supplies.storeb');
Route::get('/cart',[MedicalSuppliesController::class,'cart'])->name('medical_supplies.cart');
Route::post('/carti',[MedicalSuppliesController::class,'storeImage'])->name('medical supplies.imagestore');
Route::delete('/cart/{cart}/delete',[MedicalSuppliesController::class,'delete'])->name('cart.delete');
Route::put('/cart/{cart}/update',[MedicalSuppliesController::class,'update'])->name('cart.update');
Route::get('/order confirmation',[MedicalSuppliesController::class,'order'])->name('medical_supplies.order_confirmation');
/*-------------------Medical Supplies----------------------------------*/

/*-------------------Admin Panel----------------------------------*/
Route::get('/admin panel',[AdminController::class,'index'])->name('admin_panel.index');
Route::get('/input admin panel',[AdminController::class,'input_admin'])->name('admin_panel.input');
Route::post('/input admin panel',[AdminController::class,'store'])->name('admin_panel.input');
Route::get('/admin medical supplies',[AdminController::class,'admin_supplies'])->name('admin_panel.admin_medical_supplies');
Route::get('/update admin panel',[AdminController::class,'update_admin'])->name('admin_panel.update');
Route::get('/delete admin panel',[AdminController::class,'delete_admin'])->name('admin_panel.delete');
/*-------------------Admin Panel----------------------------------*/

/*-------------------others----------------------------------*/
Route::get('/send-mail',[MailController::class,'index']);
Route::get('/send-attach-mail',[MailController::class,'send_attach_email']);
Route::get('/generate-pdf',[PdfController::class,'generatePdf']);
Route::get('/generate-pdfb',[MedicalSuppliesController::class,'generatePdfb']);//not ready yet
/*-------------------others----------------------------------*/

// ---------------------Ambulance Service Routes---------------------------
Route::get('/amb-ptn-ride-assigne',[AmbulanceRideRequestController::class,'showAssignedRide'])->name('assignedRidePatient');

Route::get('/amb-ptn-ride-confirmed',[AmbulanceRideConfirmedController::class,'trackAmbulanceLive'])->name('patientRideConfirmed');
Route::get('/ptn-data-json',[AmbulanceDriverPageController::class,'getPatientData']);

Route::get('/amb-data-json',[AmbulanceDriverPageController::class,'getAmbulanceData']);

Route::get('/amb-reg',[newAmbulanceRegistrationController::class,'showRegForm']);

Route::post('/amb-reg',[newAmbulanceRegistrationController::class,'addNewService'])->name('addNewAmb');

// Route::get('/amb-chk-avl',function(){
//     return view('amb_check_aval');
// });

Route::get('/amb-chk-avl',[AmbulanceRideRequestController::class,'checkAmbulanceAvailability'])->name('check-availability');

Route::get('/amb-ptn-home',[AmbulanceRideRequestController::class,'showRideBookingForm'])->name('showBookingForm');

Route::post('/amb-ptn-home',[AmbulanceRideRequestController::class,'postNewRideRequest']);


Route::get('/amb-book',function()
{
    return view('amb_booking');
});

Route::get('/get-dist',[AmbulanceDriverPageController::class,'fetchDistance']);

Route::get('/driver-intf',[AmbulanceDriverPageController::class,'driverShowRidesAvailable'])->name('showAvblRides');

Route::get('/driver-ride-accepted',[AmbulanceDriverPageController::class,'rideAccepted'])->name('driverRideAccepted');

Route::post('/driver-ride-accepted',[AmbulanceDriverPageController::class,'verifyOTP'])->name('driverRideAccepted');

Route::get('/driver-ride-started',[AmbulanceDriverPageController::class,''])->name('driverRideStarted');

Route::get('/amb-admin-set-pswd',[newAmbulanceRegistrationController::class,'showCreatePassword'])->name("ambAdminPassForm");

Route::post('/amb-admin-set-pswd',[newAmbulanceRegistrationController::class,'createPassword']);
// ---------------------Ambulance Service Routes ends here------------------------

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
// Route::get('/hos_confirm',[PatientController::class,'update']);
Route::get('/hos_register',[HospitalController::class,'DisplayForm']);
Route::post('/hos_register_data',[HospitalController::class,'HosDataEntry'])->name('store.hos.data');
Route::get('/hos_admin_interface',[HospitalController::class,'HosInterfaceDisplay'])->name('display.hos.inter');
Route::get('/hos_admin_interface',[HospitalController::class,'GetHosData'])->name('hos.data.interface');
Route::get('/custom_bed',[HospitalController::class,'CustomBedDesign'])->name('display.custum.bed');
Route::get('/custom_bed_pntdata',[HospitalController::class,'CustomBedPntDetails'])->name('display.pnt.data');
Route::get('/pnt_verify',[HospitalController::class,'DisplayPntVerify'])->name('display.pnt.verify');
// Route::get('/hos_form/{id}',[HospitalController::class,'UpdateBedCount'])->name('update.bedCount');
Route::get('/pnt_verify',[HospitalController::class,'DeadlineCount'])->name('deadlineCount');
// ---------------------Bed booking Service Routes end here-----------------------------

// ---------------------Login Routes start here---------------------------
Route::get('/login',[LoginController::class,'DisplayLogin'])->name('display.login');
Route::post('/check',[LoginController::class,'FetchServiceData'])->name('login.validate');
Route::get('/userReg',[UserregController::class,'DisplayForm'])->name('display.user.form');
Route::post('/user_reg_validate',[UserregController::class,'StoreUserData'])->name('register.user');
// ---------------------Login Routes end here-----------------------------

//----------------------- Payment Routes starts here -----------------------

Route::get('/payment',[PaymentController::class,'pay_amount']);

//----------------------- Payment Routes ends here -----------------------