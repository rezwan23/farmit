<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataProviderController;
use App\Http\Controllers\FrontEndController;
use App\Http\Controllers\SslCommerzPaymentController;
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

Route::post('/carrier-request-post-respond/', [FrontEndController::class, 'respondToRequest'])->name('carrierposts.respond');

Route::get('/cart-add/{item}', [FrontEndController::class, 'addToCart'])->name('addToCart');

Route::get('/cart-reduce/{item}', [FrontEndController::class, 'reduceCartItem'])->name('cart.reduce');

Route::get('/cart-add-carrier/{item}', [FrontEndController::class, 'addCarrierToCart'])->name('addCarrierToCart');

Route::get('/delivery-init', [FrontEndController::class, 'deliveryInit'])->name('deliveryInit');

Route::post('/delivery-init', [FrontEndController::class, 'delivery'])->name('deliveryInit');


Route::get('/cart-remove/{item}', [FrontEndController::class, 'removeCart'])->name('cart.remove');

Route::get('/cart-clear', [FrontEndController::class, 'clearCart'])->name('cart.clear');

Route::get('/checkout', [FrontEndController::class, 'checkout'])->name('checkout')->middleware('auth');

Route::get('/contact-us', [FrontEndController::class, 'contactUs'])->name('contact.us');

Route::post('/contact-us', [FrontEndController::class, 'saveFeedback']);

Route::get('/my-farmer-orders', [FrontEndController::class, 'myFarmerOrders'])->name('farmer.orders');

Route::get('/my-buyer-orders', [FrontEndController::class, 'myByuerOrders'])->name('buyer.orders');

Route::get('/handover-to-carrier/{order}', [FrontEndController::class, 'handOverToCarrier'])->name('farmer.handover');


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

    Route::get('/all-feedback', [DashboardController::class, 'allFeedback'])->name('all.feedback');

});

Route::post('save-sell-post', [DashboardController::class, 'saveSellPost'])->name('saveSalePost');

Route::post('save-carrier-post', [DashboardController::class, 'saveCarrierPost'])->name('saveSalePost');

Route::post('save-carrier-request-post', [DashboardController::class, 'saveCarrierRequestPost'])->name('carry.request.save');

Route::post('delete-carrier-request-post/{item}', [DashboardController::class, 'deleteCarrierRequestPost']);Route::post('delete-carrier-post/{item}', [DashboardController::class, 'deleteCarrierPost']);

Route::post('delete-sell-post/{item}', [DashboardController::class, 'deletePost']);

Route::post('delete-user/{item}', [DashboardController::class, 'deleteUser']);


Route::post('/logout-web', [DashboardController::class, 'logout'])->name('logout.web');

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax'])->middleware('auth');

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
Route::get('/api/get-data', [DataProviderController::class, 'provide']);


require __DIR__.'/auth.php';
