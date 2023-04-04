<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

//Route::get('/home', [HomeController::class, 'redirect'])->middleware('auth','verified');
Route::get('/home', [HomeController::class, 'redirect']);

Route::get('/', [HomeController::class, 'index']);

//Auth::route(['verify'=> true]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/logout', [HomeController::class, 'logout']);
Route::get('/add_doctor_view', [AdminController::class, 'addview']);
Route::post('/upload_doctor', [AdminController::class, 'upload']);
Route::post('/appointment', [HomeController::class, 'appointment']);
Route::get('/myappointment', [HomeController::class, 'myappointment']);
Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancel_appoint']);
Route::get('/showappointment', [AdminController::class, 'showappointment']);

Route::get('/approve/{id}', [AdminController::class, 'approve']);
Route::get('/cancel/{id}', [AdminController::class, 'cancel']);
Route::get('/viewdoctors', [AdminController::class, 'viewdoctors']);
Route::get('/deletedoctor/{id}',[AdminController::class, 'deletedoctor']);
Route::get('/updatedoctor/{id}',[AdminController::class, 'updatedoctor']);
Route::post('/editdoctor/{id}',[AdminController::class, 'editdoctor']);
Route::get('/emailview/{id}',[AdminController::class, 'emailview']);
Route::post('/sendemail/{id}',[AdminController::class, 'sendemail']);

