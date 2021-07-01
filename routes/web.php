<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontEndController;

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


Route::get('/', [FrontEndController::class, 'index'])->name('home');

Route::get('/carrier-posts', [FrontEndController::class, 'showCarrierPosts'])->name('carrierPosts');

Route::get('/carrier-request-posts', [FrontEndController::class, 'showCarrierRequestPosts'])->name('carrierposts.request.buyer');

Route::get('/cart-add/{item}', [FrontEndController::class, 'addToCart'])->name('addToCart');


Route::get('/cart-remove/{item}', [FrontEndController::class, 'removeCart'])->name('cart.remove');


Route::group(['middleware' => ['auth', 'verified']], function(){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/create-farmer-posts', [DashboardController::class, 'createFarmerPost'])->name('farmerposts.create');
    
    Route::get('/create-carrier-posts', [DashboardController::class, 'createCarrierPost'])->name('carrierpost.create');
    
    Route::get('/my-carrier-posts', [DashboardController::class, 'myCarrierPost'])->name('carrierpost.all.my');
    
    Route::get('/my-carrier-request-posts', [DashboardController::class, 'myCarrierRequestPost'])->name('carrierrequestpost.all.my');
    
    Route::get('/farmer-posts-all', [DashboardController::class, 'showFarmerPosts'])->name('farmerposts.index');
    
    Route::get('/carry-post-request', [DashboardController::class, 'carryPostRequest'])->name('carrierposts.request');
    
    Route::get('/create-admin-user', [DashboardController::class, 'createAdminUser'])->name('create.admin.user');
    
    Route::post('/save-admin-user', [DashboardController::class, 'saveAdminUser'])->name('save.admin.user');
    
    Route::get('/all-users', [DashboardController::class, 'allUsers'])->name('all.admin.user');

});

Route::post('save-sell-post', [DashboardController::class, 'saveSellPost'])->name('saveSalePost');

Route::post('save-carrier-post', [DashboardController::class, 'saveCarrierPost'])->name('saveSalePost');

Route::post('save-carrier-request-post', [DashboardController::class, 'saveCarrierRequestPost'])->name('carry.request.save');

Route::post('delete-carrier-request-post/{item}', [DashboardController::class, 'deleteCarrierRequestPost']);Route::post('delete-carrier-post/{item}', [DashboardController::class, 'deleteCarrierPost']);

Route::post('delete-sell-post/{item}', [DashboardController::class, 'deletePost']);

Route::post('delete-user/{item}', [DashboardController::class, 'deleteUser']);


Route::post('/logout-web', [DashboardController::class, 'logout'])->name('logout.web');

require __DIR__.'/auth.php';
