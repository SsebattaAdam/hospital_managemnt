<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;

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


Route::get('/',[HomeController::class, 'index']);

Route::get('/home', [HomeController::class, 'redirect']);


Route::post('/appointment',[HomeController::class, 'makeappointment']);
Route::get('/myAppointment',[HomeController::class, 'myApoitntment']);
Route::get('/cancel_appoint/{id}',[HomeController::class, 'cancelAppointment']);



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/add_doctor_view',[AdminController::class, 'addView']);

Route::post('/upload_doctor',[AdminController::class, 'uploadDoctor']);
Route::get('/ShowAppointments',[AdminController::class, 'showAppointments']);
Route::get('/approved/{id}',[AdminController::class, 'ApprovedAppointment']);
Route::get('/canceled/{id}',[AdminController::class, 'CanceledAppointment']);
Route::get('/deleteDoctor/{id}',[AdminController::class, 'deleteDoctor']);
Route::get('/ShowDoctors',[AdminController::class, 'showDoctors']);

Route::get('/updateDoctor/{id}',[AdminController::class, 'updateDoctor']);
Route::get('/editDoctor/{id}',[AdminController::class, 'editDoctor']);