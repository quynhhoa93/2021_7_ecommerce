<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('/admin')->namespace('Admin')->as('admin.')->group(function (){
    Route::match(['GET','POST'],'/',[AdminController::class,'login']);
    Route::group(['middleware'=>['admin']],function (){
        Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
        Route::get('settings',[AdminController::class,'changePassword'])->name('changePassword');
        Route::get('logout',[AdminController::class,'logout']);
        Route::post('check-current-pwd',[AdminController::class,'chkCurrentPassword']);
        Route::post('update-current-pwd',[AdminController::class,'updateCurrentPassword']);
        Route::match(['GET','POST'],'update-admin-details',[AdminController::class,'updateAdminDetails']);
    });
});


