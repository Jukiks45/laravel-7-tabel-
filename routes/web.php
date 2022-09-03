<?php

use App\Http\Controllers\CheckoutadminController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataPembeliController;
use App\Models\data_penjualan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Logincontroller;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DataPenjualanController;
use App\Http\Controllers\DetaillaptopController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\keranjang;
use App\Http\Controllers\keranjangController;
use App\Http\Controllers\LaptopdijualController;
use App\Http\Controllers\LaptopdijualuserController;
use App\Http\Controllers\SupplierController;
use App\Models\checkout;
use App\Models\Laptopdijual;
use App\Models\Laptopdijualuser;
use Illuminate\Routing\Route as RoutingRoute;

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
Route::get('/version', function () {
      return view('welcome');
});

//route project 1

Route::get('/datalaptop', [EmployeeController::class, 'datalaptop'])->name('datalaptop');

// Route::get('/tambahdatastock', [EmployeeController::class, 'tambahlaptop'])->name('tambahlaptop');

Route::post('/insertdata', [EmployeeController::class, 'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}', [EmployeeController::class, 'tampilkandata'])->name('tampilkandata');

Route::post('/updatedata/{id}', [EmployeeController::class, 'updatedata'])->name('updatedata');

// Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');

// Route::get('/insertlaptop',[EmployeeController::class,'insertlaptop'])->name('insertlaptop');

// router prject 2
// landing page
Route::get('/', [EmployeeController::class, 'landingpage'])->name('landingpage');
//login register
Route::get('/login', [Logincontroller::class, 'login'])->name('login')->middleware('guest');

Route::post('/loginpost', [Logincontroller::class, 'loginpost'])->name('loginpost');

Route::get('/register', [Logincontroller::class, 'register'])->name('register')->middleware('guest');

Route::post('/registerpost', [Logincontroller::class, 'registerpost'])->name('registerpost');

Route::get('/logout', [Logincontroller::class, 'logout'])->name('logout');

//middleware ADMIN
Route::group(['middleware' => ['auth','ceklevel:admin']], function () {
    //dashboard
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    //suppliers
    Route::get('/supplier',[SupplierController::class,'index'])->name('supplier');

    Route::get('/supplierform',[SupplierController::class,'create'])->name('supplierform');

    Route::post('/supplierformpost',[SupplierController::class,'store'])->name('supplierformpost');

    Route::get('/supplierformedit/{id}',[SupplierController::class,'show'])->name('supplierformedit');

    Route::post('/supplierformeditpost/{id}',[SupplierController::class,'update'])->name('supplierformeditpost');

    Route::get('/supplierdelete/{id}',[SupplierController::class,'destroy'])->name('supplierdelete');

    //stocklaptop
    Route::get('/stocklaptop', [EmployeeController::class, 'stocklaptop'])->name('stocklaptop');

    Route::get('/tambahdatastock', [EmployeeController::class, 'tambahlaptop'])->name('tambahlaptop');

    Route::get('/editdatastockform/{id}',[EmployeeController::class, 'editdatastockform'])->name('editdatastockform');

    Route::get('/delete/{id}', [EmployeeController::class, 'delete'])->name('delete');
    //datapembeli
    Route::get('/datapembeli', [DataPembeliController::class, 'datapembeli'])->name('datapembeli');

    Route::get('/editdatapembeli/{id}',[DataPembeliController::class,'editdatapembeli'])->name('editdatapembeli');

    Route::post('/updatedatapembeli/{id}',[DataPembeliController::class,'updatedatapembeli'])->name('updatedatapembeli');

    Route::get('/deletepembeli/{id}', [DataPembeliController::class, 'deletepembeli'])->name('deletepembeli');
    //relasi
    Route::get('/relasi',[DataPembeliController::class,'relasialamat'])->name('relasialamat');

    Route::get('/relasiform',[DataPembeliController::class,'relasialamatform'])->name('relasialamatform');

    Route::post('/relasialamatpost',[DataPembeliController::class,'relasiformpost'])->name('relasiformpost');

    //data karyawan
    Route::get('/datakaryawan',[KaryawanController::class,'datakaryawan'])->name('datakaryawan');

    Route::get('/datakaryawanform',[KaryawanController::class,'datakaryawanform'])->name('datakaryawanform');

    Route::post('/datakaryawanpost',[KaryawanController::class,'datakaryawanpost'])->name('datakaryawanpost');

    Route::get('/editkaryawanform/{id}',[KaryawanController::class,'editkaryawanform'])->name('editkaryawan');

    Route::post('/editkaryawanupdate/{id}',[KaryawanController::class,'editkaryawanupdate'])->name('editkaryawanupdate');

    Route::get('/deletekaryawan/{id}',[KaryawanController::class,'deletekaryawan']);

    //data laptop yg akan dijual
    Route::get('/laptopdijual',[LaptopdijualController::class,'index'])->name('laptopdijiual');

    Route::get('/laptopdijualform',[LaptopdijualController::class,'create'])->name('laptopdijualform');

    Route::post('/laptopdijualpost',[LaptopdijualController::class,'store'])->name('laptopdijualform');

    Route::get('/editdatajual/{id}',[LaptopdijualController::class,'show'])->name('editdatajual');

    Route::post('/laptopdijualupdate/{id}',[LaptopdijualController::class,'update'])->name('laptopdijualupdate');

    Route::get('/destroydijual/{id}',[LaptopdijualController::class,'destroy']);

    //pengiriman
    Route::get('/pengirimanadmin',[CheckoutadminController::class,'index'])->name('pengirimanadmin');

    Route::get('/pengirimanadminpost/{id}',[CheckoutadminController::class,'store'])->name('pengirimanadminpost');

});

// MIDDLEWARE USER
Route::group(['middleware'=>['auth','ceklevel:admin,user']],function(){
    //dashboard
    Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');

    Route::get('/detaillaptop',[DetaillaptopController::class,'detaillaptop'])->name('detaillaptop');

    //laptop dijual user
    Route::get('/laptopdijualuser',[LaptopdijualuserController::class,'index'])->name('laptopdijualuser');
    //datapembeli
    Route::get('/datapembeliform',[DataPembeliController::class,'datapembeliform'])->name('datapembeliform');

    Route::post('/datapembelipost', [DataPembeliController::class, 'datapembelipost'])->name('datapembelipost');

    Route::get('/deletepembeli/{id}', [DataPembeliController::class, 'deletepembeli'])->name('deletepembeli');
    //route pesanan user
    Route::get('/pesananuser', [DataPembeliController::class, 'pesananuser'])->name('pesananuser');

    //keranjang user
    Route::get('/keranjang', [keranjangController::class, 'index'])->name('keranjang');

    Route::get('/keranjangpost/{id}', [keranjangController::class, 'store'])->name('keranjangpost');

    Route::get('/destroykeranjang/{id}', [keranjangController::class, 'destroy'])->name('destroykeranjang');

    //checkout
    Route::get('/checkout',[CheckoutController::class,'create'])->name('checkout');

    Route::post('/checkoutpost',[CheckoutController::class,'store'])->name('checkoutpost');

    Route::get('/destroycheckout/{id}',[CheckoutController::class,'destroy']);

    Route::get('/pengiriman',[CheckoutController::class,'index'])->name('pengiriman');

    //diterima
    Route::get('/diterima/{id}',[CheckoutController::class,'show'])->name('diterima');
});




