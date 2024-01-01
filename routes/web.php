<?php

use App\Http\Controllers\Admincontroller;
use App\Http\Controllers\usercontroller;
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

Route::get('/', function () {
    return view('SearchService');
});
Route::get('/Log_in',[usercontroller::class,"Login"]);
Route::get('/Register',[usercontroller::class,"Register"]);
Route::post('/Pregister ',[usercontroller::class,"PRegister"]);
Route::post('/CekService',[usercontroller::class,"CekService"]);
Route::get('/test',[AdminController::class,"test"]);
Route::prefix('/admin')->group(function()
{
    //GET
    Route::get('/MasterBarang',[AdminController::class,'MasterBarang']);
    Route::get('/LogOut',[AdminController::class,'Logout']);
    Route::get('/DashBoard',[AdminController::class,"DashBoard"]);
    Route::get('/Transaksi',[AdminController::class,"Transaksi"]);
    Route::get('/Service',[AdminController::class,"Service"]);
    Route::get('/DeleteBarang/{id}',[AdminController::class,"DeleteBarang"]);
    Route::get('/DeleteBarangCart/{kode}',[AdminController::class,"DeleteBarangCart"]);
    Route::get('/Checkout',[AdminController::class,"CheckOut"]);
    Route::get('/ListService',[AdminController::class,"ListService"]);
    Route::get('/ListTransaksi',[AdminController::class,"ListTransaksi"]);
    Route::get('/ListUser',[AdminController::class,"ListUsers"]);
    Route::get('/Ban/{id}',[AdminController::class,"Ban"]);
    Route::get('/UnBan/{id}',[AdminController::class,"UnBan"]);
    Route::get('/UpdateService/{id}',[AdminController::class,"UpdateService"]);
    Route::get('/stock/{id}',[AdminController::class,"stock"]);
    Route::get('/testdelete',[Admincontroller::class,'test']);
    Route::post('/getsnapToken',[Admincontroller::class,'getsnapToken']);
    //POST
    Route::post('/PLogin',[AdminController::class,"PLogin"]);
    Route::post('/TambahBarang',[AdminController::class,"TambahBarang"]);
    Route::post('/CeKBarcode',[AdminController::class,"CekBarcode"]);
    Route::post('/UpdateBarang',[AdminController::class,"UpdateBarang"]);
    Route::post('/CekKode',[AdminController::class,"CekKode"]);
    Route::post('/Cart',[AdminController::class,"Cart"]);
    Route::post('/TambahService',[AdminController::class,"TambahService"]);
    Route::post('/addstock',[AdminController::class,"addstock"]);

});
