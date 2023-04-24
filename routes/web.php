<?php

use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Client_side\HomeController;
use App\Http\Controllers\COrderController;
use App\Http\Controllers\dashboard\Analytics;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\DropDownController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\layouts\Blank;
use App\Http\Controllers\layouts\Container;
use App\Http\Controllers\layouts\Fluid;
use App\Http\Controllers\layouts\WithoutMenu;
use App\Http\Controllers\layouts\WithoutNavbar;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MainAdminController;
use App\Http\Controllers\Usercontroller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Vonage\SMS\Webhook\DeliveryReceipt;

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


Route::get('/layouts/fluid', [Fluid::class, 'index'])->name('layouts-fluid');

Route::get('/layouts/without-menu', [WithoutMenu::class, 'index'])->name('layouts-without-menu');
Route::get('/layouts/without-navbar', [WithoutNavbar::class, 'index'])->name('layouts-without-navbar');
Route::get('/layouts/container', [Container::class, 'index'])->name('layouts-container');
Route::get('/layouts/blank', [Blank::class, 'index'])->name('layouts-blank');


// Admin Site Routes

Route::get('/Alogin', [AdminController::class, 'AdminLogin'])->name('Admin-Login');
Route::get('/Admin-Reg', [AdminController::class, 'AdminReg'])->name('Admin-Reg');
Route::post('/Admin-Reg-Save', [AdminController::class, 'AdminRegSave'])->name('Admin-Reg-Save');
Route::post('/Alogindata', [AdminController::class, 'Alogindata'])->name('Alogindata');

// Admin Forget Password
Route::group(['middleware' => ['A-F-Password']], function () {
  Route::get('/Aforgetpassword', [AdminController::class, 'Aforgetpassword'])->name('Aforgetpassword');
});
Route::get('/Aforgetemail', [AdminController::class, 'Aforgetemail'])->name('Aforgetemail');

Route::post('/Aforget-email-send', [AdminController::class, 'Aforgetemailsend'])->name('Aforget-email-send');
Route::get('/Aforget-password-save', [AdminController::class, 'Aforgetpasswordsave'])->name('Aforget-password-save');


//Admin Change Password
Route::get('/Achange-password', [AdminController::class, 'Achangepassword'])->name('Achange-password');
Route::post('/Achange-password-save', [AdminController::class, 'Achangepasswordsave'])->name('Achange-password-save');






// Admin
Route::group(['middleware' => ['Alogin']], function () {
  Route::get('/Admin-Profile', [AdminController::class, 'AdminProfile'])->name('Admin-Profile');
  Route::post('/Admin-Profile-Save/{id}', [AdminController::class, 'AdminProfileSave'])->name('Admin-Profile-save');
  Route::get('/Admin-Product-Listing', [AdminController::class, 'AdminProductListing'])->name('Admin-Product-Listing');
  Route::post('/Admin-Product-Listing-Save', [AdminController::class, 'AdminProductSave'])->name('Admin-Product-Listing-Save');
  Route::get('/Admin-Product-table', [AdminController::class, 'AdminProductTable'])->name('Admin-Product-table');
  Route::get('/Admin-Product-Delete-table', [AdminController::class, 'AdminProductDeleteTable'])->name('Admin-Product-Delete-table');

  Route::get('/Admin-Product-Listing-show/{id}', [AdminController::class, 'AdminProductListingShow'])->name('Admin-Product-Listing-show');
  Route::get('/Admin-Product-Listing-delete/{id}', [AdminController::class, 'AdminProductListingdelete'])->name('Admin-Product-Listing-delete');

  Route::post('/Admin-Product-Listing-Update/{id}', [AdminController::class, 'AdminProductListingUpdate'])->name('Admin-Product-Listing-Update');

  Route::get('/Admin-Logout', [AdminController::class, 'Adminlogout'])->name('Admin-logout');

  // client order admin side
  Route::get('/Client-Pending-Order', [COrderController::class, 'ClientPOrder'])->name('ClientPOrder');
  Route::get('/Admin-Order-Accepet/{id}', [COrderController::class, 'AdminOrderAccepet'])->name('Admin-Order-Accepet');
  Route::get('/Client-Order-Show', [COrderController::class, 'ClientOrderShow'])->name('Client-Order-Show');
  Route::get('/pdf/{id}', [COrderController::class, 'pdf'])->name('pdf');
  Route::get('/downloadPDF/{$id}', [COrderController::class, 'downloadPDF'])->name('abc');
  Route::get('/Dashboard', [COrderController::class, 'dashboard'])->name('dashboard-analytics');
  Route::get('/Client-Bill-List', [COrderController::class, 'ClientBillList'])->name('Client-Bill-List');
});



Route::get('/Mlogin', [MainAdminController::class, 'Mlogin'])->name('Mlogin');
Route::post('/Mlogindata', [MainAdminController::class, 'Mlogindata'])->name('Mlogindata');


Route::group(['middleware' => ['Mlogin']], function () {

  // Main Admin
  Route::get('/MDashboard', [MainAdminController::class, 'MDashboard'])->name('MDashboard');
  Route::get('/main-admin', [MainAdminController::class, 'read'])->name('main-admin-read');
  Route::get('/MshowAdmin/{id}', [MainAdminController::class, 'MshowAdmin'])->name('MshowAdmin');
  Route::get('/accept-request/{id}', [MainAdminController::class, 'acceptrequest'])->name('accept-request');
  Route::get('/accepted-request-show', [MainAdminController::class, 'acceptedrequestshow'])->name('accepted-request-show');

  Route::get('/cancel-request/{id}', [MainAdminController::class, 'cancelrequest'])->name('cancel-request');
  Route::get('/delete-request-show', [MainAdminController::class, 'deleterequestshow'])->name('delete-request-show');
  Route::get('/Madmin-logout', [MainAdminController::class, 'Madminlogout'])->name('Madmin-logout');


  Route::get('/MshowAccepetform/{id}', [MainAdminController::class, 'MshowAccepetform'])->name('MshowAccepetform');
  Route::get('/MshowDeleteform/{id}', [MainAdminController::class, 'MshowDeleteform'])->name('MshowDeleteform');

  Route::get('/Blog-form', [IndexController::class, 'Blogform'])->name('Blog-form');
  Route::post('/Blog/save', [IndexController::class, 'Blogsave'])->name('Blogsave');
  Route::get('/Blog/table', [IndexController::class, 'Blogtable'])->name('Blogtable');
  Route::get('/Blog/update/{id}', [IndexController::class, 'Blogupdate'])->name('Blogupdate');
  Route::post('/Blog/update/save/{id}', [IndexController::class, 'Blogupdatesave'])->name('Blog-update-save');
  Route::get('/Blog/delete/{id}', [IndexController::class, 'Blogdelete'])->name('Blogdelete');

  // product table
  Route::get('/Main-Admin-Product-Table', [IndexController::class, 'MProductTable'])->name('Main-Admin-Product-Table');
  Route::get('/Main-Admin-Product-Listing-delete/{id}', [IndexController::class, 'MainAdminProductListingdelete'])->name('Main-Admin-Product-Listing-delete');
  Route::get('/Main-Admin-Delete-Product-Table', [IndexController::class, 'MDeleteProductTable'])->name('Main-Admin-Delete-Product-Table');
  Route::get('/chartdate', [MainAdminController::class, 'chartdate'])->name('chartdate');


  Route::get('/Queries', [MainAdminController::class, 'Queries'])->name('Queries');
  Route::get('/Reply-Queries/{id}', [MainAdminController::class, 'Reply_Queries'])->name('reply-queries');


  Route::get('/Reply-Queries/{id}', [MainAdminController::class, 'Reply_Queries'])->name('reply-queries');
  Route::post('/Main-Admin-Product-Details/{id}', [MainAdminController::class, 'MainAdminProductDetails'])->name('Main-Admin-Product-Details');
});








//ClientSide Routes

Route::group(['middleware' => ['Userlogin']], function () {


  //Profile
  Route::get('Fprofile', [FrontendController::class, 'FrontProfile'])->name('Fprofile');
  Route::get('Fprofileupdatesave{id}', [FrontendController::class, 'FProfileUpdateSave'])->name('FProfileUpdateSave');

  Route::post('/Product-Cart/{id}', [DropDownController::class, 'Product_Cart'])->name('Product-Cart');

  Route::get('FCart', [FrontendController::class, 'FrontCart'])->name('Fcart');
  Route::get('quantityadd/{id}', [DropDownController::class, 'quantityadd'])->name('quantityadd');
  Route::get('quantityminus/{id}', [DropDownController::class, 'quantityminus'])->name('quantityminus');
  Route::get('FCheckout', [FrontendController::class, 'FrontCheckout'])->name('Fcheckout');
  Route::post('Address-Save/{id}', [DropDownController::class, 'AddressSave'])->name('Address-Save');


  Route::get('Confirm-Order', [DropDownController::class, 'ConfirmOrder'])->name('Confirm-Order');

  // order table
  Route::get('OrderTable', [DropDownController::class, 'OrderTable'])->name('OrderTable');
  Route::get('client-Order-Details/{id}', [DropDownController::class, 'clientOrderDetails'])->name('client-Order-Details');

  Route::get('COrderTable', [DropDownController::class, 'COrderTable'])->name('COrderTable');
  Route::get('DOrderTable', [DropDownController::class, 'DOrderTable'])->name('DOrderTable');
  Route::get('DeleteOrderTable', [DropDownController::class, 'DeleteOrderTable'])->name('DeleteOrderTable');
  Route::get('Order-Delete/{id}', [DropDownController::class, 'OrderDelete'])->name('Order-Delete');
  Route::get('/Delete-Product-Cart/{id}', [DropDownController::class, 'DeleteProductCart'])->name('Delete-Product-Cart');
  Route::get('Fwishlist/{id}', [FrontendController::class, 'FrontWishlist'])->name('Fwishlist');
  Route::get('FwishlistTable', [FrontendController::class, 'FrontWishlistTable'])->name('FwishlistTable');
  Route::get('deletewishlist/{id}', [FrontendController::class, 'deletewishlist'])->name('deletewishlist');
  Route::get('product-details/{id}', [FrontendController::class, 'productdetails'])->name('product-details');
  Route::get('Subscribe', [DropDownController::class, 'Subscribe'])->name('Subscribe');
  Route::get('Contact', [DropDownController::class, 'Contact'])->name('Contact');
});

Route::get('/', [FrontendController::class, 'FrontIndex'])->name('Findex');
Route::get('Fshop', [FrontendController::class, 'FrontShop'])->name('Fshop');
Route::get('Fcontact', [FrontendController::class, 'FrontContact'])->name('Fcontact');
Route::get('Fdetails', [FrontendController::class, 'FrontShopDetails'])->name('Fdetails');
Route::get('FCheckout', [FrontendController::class, 'FrontCheckout'])->name('Fcheckout');
Route::get('FBlog', [FrontendController::class, 'FrontBlog'])->name('Fblog');








// Dropdown

Route::get('/Products/{id}', [DropDownController::class, 'Products'])->name('Products');
Route::get('/Product-Detail/{id}', [DropDownController::class, 'Product_Detail'])->name('Product-Detail');

Route::get('/Latest-Product/{id}', [DropDownController::class, 'Latest_Product'])->name('Latest-Product');




Route::group(['middleware' => ['F-Password']], function () {
  //Forget Password
  Route::get('Forget-Password', [FrontendController::class, 'FForgetPassword'])->name('Fforgetpassword');
});

// forget password send mail
Route::get('ForgetPEmail', [FrontendController::class, 'ForgetPEmail'])->name('ForgetPEmail');
Route::post('ForgetPEmailSend', [FrontendController::class, 'ForgetPEmailSend'])->name('ForgetPEmailSend');


Route::get('Forget-Password-Save', [FrontendController::class, 'ForgetPasswordSave'])->name('Forget-Password-Save');



// Change Password
Route::get('Fpassword', [FrontendController::class, 'FPassword'])->name('Fpassword');
Route::get('Fchangepassword', [FrontendController::class, 'FChangePassword'])->name('Fchangepassword');


//registration
Route::get('Freg', [FrontendController::class, 'FrontReg'])->name('Freg');
Route::post('UserRegSave', [FrontendController::class, 'RegDataSave'])->name('UserRegSave');

//login
Route::get('Flogin', [FrontendController::class, 'FrontLogin'])->name('Flogin');
Route::post('checklogin', [FrontendController::class, 'CheckLogin'])->name('Checklogin');
Route::get('Flogout', [FrontendController::class, 'FLogout'])->name('Flogout');
Auth::routes();


Route::get('login/google/redirect', [LoginController::class, 'redirect'])->name('login.google.redirect');
Route::get('login/google/callback', [LoginController::class, 'callback']);
Route::get('login/google/home', [LoginController::class, 'home']);


Route::get('/DReg', [DeliveryController::class, 'Dreg'])->name('DReg');
Route::get('/Dlogin', [DeliveryController::class, 'Dlogin'])->name('Dlogin');
