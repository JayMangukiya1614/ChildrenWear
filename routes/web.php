<?php
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Client_side\HomeController;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\MainAdminController;
use Illuminate\Support\Facades\Route;

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

$controller_path = 'App\Http\Controllers';

// Main Page Route
Route::get('/Dashboard', [Analytics::class, 'index'])->name('dashboard-analytics');


Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');

Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');


// Admin Site Routes

Route::get('/',[AdminController::class,'AdminLogin'])->name('Admin-Login');
Route::get('/Admin-Reg',[AdminController::class,'AdminReg'])->name('Admin-Reg');
Route::post('/Admin-Reg-Save',[AdminController::class,'AdminRegSave'])->name('Admin-Reg-Save');
Route::post('/Alogindata',[AdminController::class,'Alogindata'])->name('Alogindata');



// Admin 
Route::group(['middleware' => ['Alogin']], function () {
Route::get('/Dashboard', [AdminController::class, 'index'])->name('dashboard');
Route::get('/Admin-Profile',[AdminController::class,'AdminProfile'])->name('Admin-Profile');
Route::get('/Admin-Logout',[AdminController::class,'Adminlogout'])->name('Admin-logout');

});



Route::get('/Mlogin',[MainAdminController::class,'Mlogin'])->name('Mlogin');
Route::post('/Mlogindata',[MainAdminController::class,'Mlogindata'])->name('Mlogindata');

Route::group(['middleware' => ['Mlogin']], function () {
    
    // Main Admin 
Route::get('/main-admin',[MainAdminController::class,'read'])->name('main-admin-read');
Route::get('/MshowAdmin/{id}',[MainAdminController::class,'MshowAdmin'])->name('MshowAdmin');
Route::post('/accept-request/{id}',[MainAdminController::class,'acceptrequest'])->name('accept-request');
Route::get('/accepted-request-show',[MainAdminController::class,'acceptedrequestshow'])->name('accepted-request-show');

Route::get('/cancel-request/{id}',[MainAdminController::class,'cancelrequest'])->name('cancel-request');
Route::get('/delete-request-show',[MainAdminController::class,'deleterequestshow'])->name('delete-request-show');
Route::get('/Madmin-logout',[MainAdminController::class,'Madminlogout'])->name('Madmin-logout');


});








//ClientSide Routes

Route::get('Findex', [FrontendController::class, 'FrontIndex'])->name('Findex');
Route::get('Flogin', [FrontendController::class, 'FrontLogin'])->name('Flogin');
Route::get('Freg', [FrontendController::class, 'FrontReg'])->name('Freg');
Route::get('Fdetails', [FrontendController::class, 'FrontShopDetails'])->name('Fdetails');
Route::get('Fshop', [FrontendController::class, 'FrontShop'])->name('Fshop');
Route::get('Fcontact', [FrontendController::class, 'FrontContact'])->name('Fcontact');
Route::get('FCart', [FrontendController::class, 'FrontCart'])->name('Fcart');
Route::get('FCheckout', [FrontendController::class, 'FrontCheckout'])->name('Fcheckout');