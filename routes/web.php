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

use App\Http\Controllers\PageController;
use App\Http\Controllers\adminDashbord;
use App\Http\Controllers\drDashbord;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\frDashbord;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\PatientController;


Route::controller(PageController::class)->group(function(){

    Route::get('/', 'index')->name('home');
    Route::get('/about','about')->name('about');

    Route::get('/team','team')->name('team');
    Route::get('/feature','feature')->name('feature');
    Route::get('/testimonial','testimonial')->name('testimonial');
    Route::get('/404','notFound')->name('404');
    Route::get('/contact','contact')->name('contact');
    Route::get('/service','service')->name('service');

    Route::get('/appointment','appointment')->name('appointment');



    Route::get('checkout/{id}','checkout')->name('checkout');
    Route::any('/checkout','store')->name('checkout.store');
    Route::get('doctor-profile/{id}','doctor_profile');


});
Route::controller(AuthController::class)->group(function(){
    Route::get('/register','loadregister');
    Route::post('/register','stdregister')->name('stdregister');

    Route::get('/login','loadlogin');
    Route::post('/login','userlogin')->name('userlogin');
    Route::get('/logout','logout')->name('logout');


    Route::get('/notify','forget');



    Route::get('edit/{id}','edit');
    Route::put('update-data/{id}','update');

    Route::get('delete/{id}','delete');
    // Route::post('/update-users','updateUsers');
    Route::post('/update-users','updateRoles')->name('update-users');

    Route::get('/notify','notify');
});



Route::controller(adminDashbord::class)->group(function(){

    Route::get('/admin_panal','AdminDashboard')->name('admin');
    Route::get('/admin_panal/table','Tables')->name('table');
    Route::get('/admin_panal/billing','Billing')->name('billing');
    Route::get('/admin_panal/user_admin','User_admin')->name('user_admin');
    Route::get('/admin_panal/profile','Profile')->name('profile');
    Route::get('/admin_panal/appointmentD','appointmentD')->name('appointmentD');
    Route::get('/admin_panal/doctor_list','doctor_list')->name('doctor_list');
    Route::get('/admin_panal/Add_Doctor','add_doctor')->name('add_doctor');
    Route::post('/admin_panal/Add_Doctor','Drprofilee_input')->name('drprofilee.user');
    Route::get('/admin_panal/patient_list','patient_list')->name('patient_list');
});


Route::controller(drDashbord::class)->group(function(){
    Route::get('dr_panal/{id}','DrDashboard')->name('dr');
    Route::get('dr_panal/{id}/appointments','Drappointments')->name('drappointments');
    Route::get('dr_panal/{id}/my-patients','Drpatients')->name('drpatients');
    Route::get('dr_panal/{id}/schedule','Drschedule')->name('drschedule');
    Route::post('dr_panal/{id}/edit_time','store')->name('schedule.store');
    Route::get('dr_panal/{id}/edit_time','Edit_time')->name('edit_time');
    Route::get('dr_panal/{id}/delete-schedule','deleteSchedule')->name('schedule.delete');

    Route::get('dr_panal/{id}/dr-profile','Drprofile')->name('drprofile');
    Route::post('dr_panal/{id}/dr-profile','Drprofile_input')->name('drprofile.user');

    Route::get('dr_panal/{id}/dr-change-password','Drchangepassword')->name('drchangepassword');

});


Route::controller(frDashbord::class)->group(function(){
    Route::get('/fr_panal','FrDashboard')->name('fr');
});

// customer
Route::get('/data-entry', [CustomerController::class, 'showDataEntryPage'])->name('data-entry');
Route::post('/data-entry', [CustomerController::class, 'store'])->name('data-entry.store');
Route::get('/show-data', [CustomerController::class, 'customerdata'])->name('show-data');
Route::get('/edit-customer/{id}', [CustomerController::class, 'edit']);
Route::put('/update-customer', [CustomerController::class, 'update']);
Route::delete('/delete-student/{id}', [CustomerController::class, 'destroy'])->name('delete-customer');
Route::get('/search-customers', [CustomerController::class, 'search'])->name('search-customers');
//customer
//supplier
Route::get('/supplier-entry', [SupplierController::class, 'supplier_show']);
Route::post('/supplier-entry', [SupplierController::class, 'supplier_store'])->name('supplier.store');
Route::get('/supplier-data', [SupplierController::class, 'supplier_data'])->name('supplier-data');
Route::get('/edit-supplier/{id}', [SupplierController::class, 'supplier_edit']);
Route::put('/update-supplier', [SupplierController::class, 'update_supplier']);
Route::delete('/delete-supplier/{id}', [SupplierController::class, 'destroy'])->name('delete-supplier');
Route::get('/search-supplier', [SupplierController::class, 'search_supplier'])->name('search-supplier');
//supplier
//medicines
Route::get('/medicines/create', [MedicineController::class, 'create'])->name('medicines.create');
Route::post('/medicines', [MedicineController::class, 'store'])->name('medicines.store');
Route::get('/medicines-show', [MedicineController::class, 'medicine_show'])->name('medicine.show');
//medcines
//purchase
Route::get('/purchase', [PurchaseController::class, 'purchase']);
Route::post('/purchase/store', [PurchaseController::class, 'store']);
Route::get('/purchase/show', [PurchaseController::class, 'purchaseshow']);
Route::get('/medicines', [PurchaseController::class, 'showMedicines']);
Route::get('/search/medicines', [PurchaseController::class, 'searchMedicines']);
//purchase
//report
Route::get('/report', [ReportController::class, 'report']);
//report
Route::get('/stock', [StockController::class, 'stock']);
Route::post('/stocks', [StockController::class, 'store'])->name('stock.store');



Route::get('/invoice', [InvoiceController::class, 'index']);


Route::get('/booking', [BookingController::class, 'index']);
Route::post('/submit-form', [BookingController::class, 'submitForm'])->name('submitForm');
Route::get('/show', [ShowController::class, 'show']);
Route::delete('/delete/{model}/{id}', [ShowController::class, 'deleteRecord']); // Ensure the correct name
// routes/web.php
Route::resource('patients', PatientController::class)->only(['create', 'store']);
Route::delete('/delete/{model}/{id}', 'ShowController@deleteRecord')->name('delete.record');
