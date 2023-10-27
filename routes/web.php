<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Profile_Management_Controller;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Manage_page_Controller;
use App\Http\Controllers\Manage_master_Controller;


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

Route::get('login','AdminController@login');
Route::get('admin/','AdminController@login');
Route::get('vp-admin/','AdminController@login');

Route::POST('vp-admin/admin_submit', [AdminController::class,'admin_submit']);
Route::get('vp-admin/dashboard', [AdminController::class,'dashboard']);

/*******Profile_Management_Controller *************/
Route::get('vp-admin/profile_management', [Profile_Management_Controller::class,'index']);


/*******manage_page*************/
Route::any('vp-admin/manage_page/',[Manage_page_Controller::class,'index']);
Route::any('vp-admin/manage_page/{var1}', [Manage_page_Controller::class,'index']);
Route::any('vp-admin/manage_page/{var1}/{var2}', [Manage_page_Controller::class,'index']);

/*******manage_master*************/
Route::any('vp-admin/manage_master/',[Manage_master_Controller::class,'index'])->middleware('auth');
Route::any('vp-admin/manage_master/{var1}', [Manage_master_Controller::class,'index'])->middleware('auth');
Route::any('vp-admin/manage_master/{var1}/{var2}', [Manage_master_Controller::class,'index'])->middleware('auth');