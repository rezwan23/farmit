<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontEndController;

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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


Route::get('/', [FrontEndController::class, 'index']);


Route::group(['middleware' => ['auth', 'verified']], function(){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/create-farmer-posts', [DashboardController::class, 'createFarmerPost'])->name('farmerposts.create');
    
    Route::get('/create-carrier-posts', [DashboardController::class, 'createCarrierPost'])->name('carrierpost.create');
    
    
    Route::get('/my-carrier-posts', [DashboardController::class, 'myCarrierPost'])->name('carrierpost.all.my');
    
    Route::get('/farmer-posts-all', [DashboardController::class, 'showFarmerPosts'])->name('farmerposts.index');

});

Route::post('save-sell-post', [DashboardController::class, 'saveSellPost'])->name('saveSalePost');

Route::post('save-carrier-post', [DashboardController::class, 'saveCarrierPost'])->name('saveSalePost');

Route::post('delete-carrier-post/{item}', [DashboardController::class, 'deleteCarrierPost']);

Route::post('delete-sell-post/{item}', [DashboardController::class, 'deletePost']);


Route::post('/logout-web', [DashboardController::class, 'logout'])->name('logout.web');

require __DIR__.'/auth.php';
