<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ShoppingController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return redirect('/login');
// });

// Auth::routes();

Auth::routes(['register' => false]);

Route::get('/', function () {
    // dd("heree");
    return redirect('/login');
});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth',])->group(function () {

// Route::group(['middleware' => ['auth', 'verify.password'], 'namespace' => 'App\Http\Controllers'], function(){

    Route::get('dashboard',  [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::resource('categories', CategoryController::class);
    Route::resource('shoppings', ShoppingController::class);
    Route::get('export-shoppings', [App\Http\Controllers\ShoppingController::class, 'export'])->name('export.shoppings');

    Route::resource('products', ProductController::class);
    Route::get('export-products', [App\Http\Controllers\ProductController::class, 'export'])->name('export.products');

    Route::resource('orders', OrderController::class);
    Route::get('export-orders', [App\Http\Controllers\OrderController::class, 'export'])->name('export.orders');

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('companies', CompanyController::class);

    Route::post('update-user/{user}',  [App\Http\Controllers\UserController::class, 'updateUserWithOutRoles'])->name('updateUserWithOutRoles');


    Route::get('donwload-pdf/{order_id}',  [App\Http\Controllers\ReceiptController::class, 'donwloadPdf']);


    Route::post('searchUser',  [App\Http\Controllers\ApiReniecController::class, 'searchUser'])->name('reniec.searchUser');




});

Route::view('/change-password-default', 'users.change_password_default')->name('change-password-default');
Route::post('/change-password-default', [UserController::class, 'changePasswordDefaultStore'])->name('change-password-default.store');




