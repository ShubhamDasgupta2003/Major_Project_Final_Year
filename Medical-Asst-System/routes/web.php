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
use App\Http\Controllers\HcsController;
use App\Http\Controllers\UserRatingController;
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
Route::get('/user_login',[UserLogin::class,"index"])->name('user_login');
Route::post('/user_login',[UserLogin::class,"login"]);
Route::get('/logout', [UserLogin::class, 'logout'])->name('logout');
Route::get('/user_rating',[UserRatingController::class,"index"]);
Route::post('/user_rating',[UserRatingController::class,"add_rating"])->name('add_rating');
Route::get('/show_rating',[UserRatingController::class,"show"]);
/*-------------------Healthcare Support----------------------------------*/
Route::get('/aya',[HcsController::class,"aya_home"])->name('aya_home');
Route::get('/nurse',[HcsController::class,"nurse_home"])->name('nurse_home');
Route::get('/technician',[HcsController::class,"technician_home"])->name('technician_home');
Route::get('/registration',[HcsController::class,"reg_form_index"])->name('registration');
Route::post('/registration',[HcsController::class,"user_register"])->name('reg_subm');
Route::get('/hcs_show_data',[HcsController::class,"show_form_data"])->name('reg_subm');
Route::get('/hcs_show',[HcsController::class,"process_payment"])->name('send.data');
Route::get('/hcs_make_payment',[HcsController::class,"makePayment"])->name('hcs-make-payment-page');
Route::get('/hcs_payment',[HcsController::class,'hcsPayment'])->name('hcs_payment');
Route::get('/hcs_payment_success',[HcsController::class,'paymentSuccess'])->name('hcs_payment_sucess');
Route::get('/show_emp_admin_intf',[HcsController::class,"show_emp_admin_intf"])->name('show_emp_admin_intf');
Route::get('/hcs_emp_admin_all_orders',[HcsController::class,"hcs_emp_admin_all_orders"])->name('hcs_emp_admin_all_orders');
Route::get('/hcs_emp_admin_completed_orders',[HcsController::class,"hcs_emp_admin_completed_orders"])->name('hcs_emp_admin_completed_orders');
Route::get('/hcs_emp_admin_ongoing_order',[HcsController::class,"hcs_emp_admin_ongoing_order"])->name('hcs_emp_admin_ongoing_order');
Route::post('/hcs_emp_admin_ongoing_order',[HcsController::class,"hcs_emp_admin_otp_ongoing_order"])->name('hcs_emp_admin_otp_ongoing_order');
Route::get('/hcs_emp_msg',[HcsController::class,"hcs_emp_msg_index"])->name('hcs_emp_msg');
Route::post('/hcs_emp_msg',[HcsController::class,"hcs_emp_msg"])->name('hcs_emp_msg_post');
Route::get('/hcs_emp_rej_msg',[HcsController::class,"hcs_emp_rej_msg_index"])->name('hcs_emp_rej_msg');
Route::post('/hcs_emp_rej_msg',[HcsController::class,"hcs_emp_rej_msg"])->name('hcs_emp_rej_msg_post');
Route::get('/hcs_emp_waitting', function () {return view('hcs_emp_waitting');});
Route::get('/hcs', function () {return view('hcs_employee_registration_form');})->name('hcs');
Route::post('/hcs',[HcsController::class,"emp_register"]);
Route::get('/hcs_emp_verification/{emp_id}',[HcsController::class,"update_nemp_data"])->name('hcs_emp_verification');
Route::get('/hcs_emp_delete/{emp_id}',[HcsController::class,"delete_nemp_data"])->name('hcs_emp_delete');
Route::get('/hcs_user_rating',[HcsController::class,"rating_index"])->name('hcs_add_rating');
Route::post('/hcs_user_rating',[HcsController::class,"add_rating"]);
Route::get('/hcs_show_rating',[HcsController::class,"show_rating"])->name('hcs_show_rating');
Route::get('/hcs_emp_admin_logout',[HcsController::class,"emp_logout"]);
Route::get('/hcs_admin',[HcsController::class,"admin_intf"])->name('hcs_admin');
Route::get('/hcs_admin_login',[HcsController::class,"sup_admin_index"]);
Route::post('/hcs_admin_login',[HcsController::class,"sup_admin_login"]);
Route::get('/hcs_admin_logout',[HcsController::class,"sup_admin_logout"]);
Route::get('/user_cancel_order',[HcsController::class,"user_cancel_order"])->name('user_cancel_order');


/*-------------------Healthcare Support----------------------------------*/


/*-------------------Blood Bank Start----------------------------------*/

Route::view ('RegisterNbank','/Blood_Booking/BbankRegister')->name('B_Bank_Register');
Route::view ('Userlogin','/Blood_Booking/login')->name('Userlogin');
Route::view ('/profilePage','/Blood_Booking/profilePage')->name('profile');

Route::get('/orderHistory', [BloodBankController::class, 'orderHistory'])->name('orderHistory');
Route::get('/order_detail}', [BloodBankController::class, 'showOrderDetail'])->name('order_detail');
Route::get('/cancel_order}', [BloodBankController::class, 'cancelOrder'])->name('cancel_order');


Route::get('/proceedToPay', [BloodBankController::class,'proceedToPay'])->name('proceedToPay');
Route::get('/process_payment', [BloodBankController::class,'process_payment'])->name('process_payment');
Route::get('/bld_payment_success',[BloodBankController::class,'paymentSuccess'])->name('bld_payment_sucess');
Route::get('/orderHistory/{order_id}/delete',[BloodBankController::class,'ordermdelete'])->name('orderm.deletem');

// .......................For Blood bank Admin Panel........................ 

Route::get('/BBadmin', [BloodBankController::class, 'BloodBank_admin'])->name('Blood_admin_page');
Route::get('/approve_bld_order/{order_id}', [BloodBankController::class, 'approve_order'])->name('confirmed_bld_order');
Route::get('/cancel_bld_order/{order_id}', [BloodBankController::class, 'delete_order'])->name('cancel_bld_order');
Route::post('/update_blood_details', [BloodBankController::class, 'update_blood_details'])->name('update_blood_details');
Route::get('/open_bldBanks_details', [BloodBankController::class, 'open_bldBanks_details'])->name('open_bldBanks_details');

Route::post('/update_bldBanks_details', [BloodBankController::class, 'update_bldBanks_details'])->name('update_bldBanks_details');


Route::view('/bld_payment_ack', '/Blood_Booking/payment_ack');
Route::post('/Userlogin', [UserLogin::class, 'userLogin'])->name('UserLogin-controller');
Route::post('/BanksRegister', [BloodBankController::class, 'newregistration'])->name('registerBanks');
Route::get('/bloodGroup', [BloodBankController::class, 'bloodGroup']);
// Route::post('/search', [BloodBankController::class, 'search'])->name('search');
Route::get('/showBhome', [BloodBankController::class, 'showBloodBanks'])->name('showBhome');
Route::post('/confirm_booking', [BloodBankController::class, 'submitOrder'])->name('submit_order');

        //   for users login,logout,orders view
Route::get('/logout', [UserLogin::class, 'logout'])->name('logout');
Route::get('/Admin_logout', [UserLogin::class, 'Adminlogout'])->name('Adminlogout');
Route::get('/send-cnfrm-mail', [BloodBankController::class, 'index'])->name('bld_cnfm_mail');

//open update page
Route::get('/update_user_details', [UserLogin::class, 'update_details'])->name('update_user_details');

//update data
Route::post('/update_data', [UserregController::class, 'update_data'])->name('update_data');




Route::view ('/booking_form','/Blood_Booking/form')->name('blood_booking_form');
Route::get('/asearch',[searchContoller::class,'search'])->name('searchtest');


/*-------------------Blood Bank End----------------------------------*/



/*-------------------Medical Supplies----------------------------------*/
Route::get('/medical supplies/{medical_supplies_medical}',[MedicalSuppliesController::class,'index'])->name('medical_supplies.index');
Route::get('/medical_supplies',[MedicalSuppliesController::class,'index'])->name('medical_supplies.index');

Route::get('/order_view',[MedicalSuppliesController::class,'orderview'])->name('medical_supplies.order_view');
Route::get('/medical_suppliess',[MedicalSuppliesController::class,'searchm'])->name('medical_supplies.search');
Route::get('/medical_suppliest',[MedicalSuppliesController::class,'searcht'])->name('medical_supplies.searcht');
Route::get('/technical supplies',[MedicalSuppliesController::class,'indexb'])->name('medical_supplies.indexb');



Route::get('/medical supplies/{medical_supplies_medical}/detail',[MedicalSuppliesController::class,'edit'])->name('medical_supplies.detail');
Route::get('/technical supplies/{medical_supplies_medical}/detail',[MedicalSuppliesController::class,'editb'])->name('technical_supplies.detail');
Route::post('/medical supplies/detail',[MedicalSuppliesController::class,'store'])->name('medical_supplies.store');
Route::post('/technical supplies/detail',[MedicalSuppliesController::class,'storeb'])->name('technical_supplies.storeb');

Route::post('/carti',[MedicalSuppliesController::class,'storeImage'])->name('medical_supplies.imagestore');

Route::delete('/order_view/{order}/delete',[MedicalSuppliesController::class,'orderdelete'])->name('order.delete');

Route::get('/order confirmation',[MedicalSuppliesController::class,'order'])->name('medical_supplies.order_confirmation');

Route::get('/exit',[MedicalSuppliesController::class,'toexit'])->name('medical_supplies.exit');
Route::get('/cart',[MedicalSuppliesController::class,'cart'])->name('medical_supplies.cart');
Route::put('/cart/{cart}/update',[MedicalSuppliesController::class,'update'])->name('cart.update');
Route::delete('/cart/{cart}/delete',[MedicalSuppliesController::class,'delete'])->name('cart.delete');



Route::get('/proceedpay', [MedicalSuppliesController::class,'order'])->name('proceedpay');


/*-------------------Medical Supplies----------------------------------*/

/*-------------------Admin Panel----------------------------------*/
Route::get('/admin panel',[AdminController::class,'index'])->name('admin_panel.index');
Route::get('/input admin panel',[AdminController::class,'input_admin'])->name('admin_panel.input');
Route::post('/store admin panel',[AdminController::class,'store'])->name('admin_panel.store');
Route::get('/admin medical supplies',[AdminController::class,'admin_supplies'])->name('admin_panel.admin_medical_supplies');
Route::get('/admin_order/{medical_supplies_medical}/update',[AdminController::class,'update_admin'])->name('admin_panel.update');
Route::put('/admin_order/{medical_supplies_medical}/updated',[AdminController::class,'updated_admin'])->name('admin_panel.updated');
Route::get('/admin_order/{medical_supplies_medical}/delete',[AdminController::class,'delete_admin'])->name('admin_panel.delete');
Route::get('/supplies admin panel',[AdminController::class,'supplies'])->name('admin_panel.supplies');
Route::put('/supplies/{medical_supplies_medical}/update',[AdminController::class,'suppliesu'])->name('admin_panel.updatesupplies');
Route::get('/admin_order',[AdminController::class,'order'])->name('admin_panel.order');
Route::delete('/admin_order/{order}/delete',[AdminController::class,'adminorderdelete'])->name('admin_order.delete');

Route::get('/amb-admin-panel',[AdminController::class,'getAmbAdmin_data'])->name('amb_admin_show_data');
/*-------------------Admin Panel----------------------------------*/

/*-------------------others----------------------------------*/
Route::get('/send-mail',[MailController::class,'index']);
Route::get('/send-attach-mail',[MailController::class,'send_attach_email']);
Route::get('/generate-pdf',[PdfController::class,'generatePdf'])->name('generatepdf');
Route::get('/generate-pdfb',[MedicalSuppliesController::class,'generatePdfb'])->name('pdf.receipt');//not ready yet
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

Route::post('/driver-ride-accepted',[AmbulanceDriverPageController::class,'verifyOTP'])->name('checkOtpVerification');

Route::get('/driver-ride-declined',[AmbulanceDriverPageController::class,'declineRide'])->name('driver_decline');

Route::get('/driver-activate',[AmbulanceDriverPageController::class,'activateAccount'])->name('driverActivate');

Route::get('/driver-ride-started',[AmbulanceDriverPageController::class,'reachDestination'])->name('driverRideStarted');

Route::get('/amb-admin-set-pswd',[newAmbulanceRegistrationController::class,'showCreatePassword'])->name("ambAdminPassForm");

Route::post('/amb-admin-set-pswd',[newAmbulanceRegistrationController::class,'createPassword']);

Route::get('/amb-order-details',[AmbulanceRideRequestController::class,'showOrderdetail'])->name("ambOrderDetails");
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
Route::get('/custom_bed_pntdata/{pnt_id}',[HospitalController::class,'PntdataRelease'])->name('release.pnt.data');
Route::get('/pnt_discharge',[HospitalController::class,'PntDischarge'])->name('pnt.discharge');
Route::get('/hos_payment', [PatientController::class,'StoreData'])->name('hos.payment');
Route::get('/exitm',[PatientController::class,'exit'])->name('pnt.exit');
Route::get('/discharge_pnt',[HospitalController::class,'DisplayDischargePnt'])->name('display.discharge.pnt');
// ---------------------Bed booking Service Routes end here-----------------------------

// ---------------------Login Routes start here---------------------------
Route::get('/login',[LoginController::class,'DisplayLogin'])->name('display.login');
Route::post('/check',[LoginController::class,'FetchServiceData'])->name('login.validate');
Route::get('/userReg',[UserregController::class,'DisplayForm'])->name('display.user.form');
Route::post('/user_reg_validate',[UserregController::class,'StoreUserData'])->name('register.user');


// ---------------------Login Routes end here-----------------------------

//----------------------- Payment Routes starts here -----------------------

Route::get('/payment',[PaymentController::class,'pay_amount']); //Pass order_id,amount,user_id as url params while hitting this url. Check 'amb_driver_ride_started' file: line no - 170 for implementation

Route::post('/payment',[PaymentController::class,'process_payment'])->name('processPayment');

Route::get('/payment-complete',[PaymentController::class,'makePayment'])->name('make-payment-page');
Route::get('/payment-success',[PaymentController::class,'paymentSuccess'])->name('payment-sucess');
//----------------------- Payment Routes ends here -----------------------
