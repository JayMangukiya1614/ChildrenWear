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

Route::get('/Admin-Profile',[AdminController::class,'AdminProfile'])->name('Admin-Profile');

Route::get('/Admin-Reg-Save',[AdminController::class,'AdminRegSave'])->name('Save');




//ClientSide Routes

Route::get('Findex', [FrontendController::class, 'FrontIndex'])->name('Findex');
Route::get('Flogin', [FrontendController::class, 'FrontLogin'])->name('Flogin');
Route::get('Freg', [FrontendController::class, 'FrontReg'])->name('Freg');
Route::get('Fdetails', [FrontendController::class, 'FrontShopDetails'])->name('Fdetails');
Route::get('Fshop', [FrontendController::class, 'FrontShop'])->name('Fshop');
Route::get('Fcontact', [FrontendController::class, 'FrontContact'])->name('Fcontact');