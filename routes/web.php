<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminCenterController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\ReportVaksinController;
use App\Http\Controllers\StokController;
USE App\Http\Controllers\SideController;
use App\Http\Controllers\UserManageController;
use App\Http\Controllers\VaksinCenterController;
use App\Http\Controllers\VaksinController;


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

Route::get('/homeadmin', [HomeController::class, 'homeadmin']);
Route::get('/homecenter', [HomeController::class, 'homecenter']);
Route::get('/homepeserta', [HomeController::class, 'homepeserta']);

Route::get('/registrasi', [AuthController::class, 'registrasi']);
Route::post('/authregistrasi', [AuthController::class, 'authregistrasi']);
Route::get('/loginadmin', [AuthController::class, 'loginadmin']);
Route::post('/authadmin', [AuthController::class, 'authadmin']);
Route::get('/logincenter', [AuthController::class, 'logincenter']);
Route::post('/authcenter', [AuthController::class, 'authcenter']);
Route::get('/loginpeserta', [AuthController::class, 'loginpeserta']);
Route::post('/authpeserta', [AuthController::class, 'authpeserta']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::resource('/admincenter', AdminCenterController::class);
Route::resource('/berita', BeritaController::class);
Route::resource('/jadwal', JadwalController::class);
Route::resource('/peserta', PesertaController::class);
Route::resource('/reportv', ReportVaksinController::class);
Route::resource('/stok', StokController::class);
Route::resource('/usermanage', UserManageController::class);
Route::resource('/vaksincenter', VaksinCenterController::class);
Route::resource('/vaksin', VaksinController::class);

Route::get('/addreportv/{id}', [ReportVaksinController::class, 'add']);

Route::get('/back', [SideController::class, 'back']);
Route::get('/printbukti/{id}', [SideController::class, 'print']);