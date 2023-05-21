<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Homecontroller;
use Illuminate\Support\Facades\Auth;
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

// Frontend Controller

Route::get('/', [Homecontroller::class, 'index']);

Route::get('/home', [Homecontroller::class, 'redirect'])->middleware('auth', 'verified');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Backend Controller
Route::get('/add_doctor_view', [AdminController::class, 'addview']);

Route::post('/upload_doctor', [AdminController::class, 'upload']);

// Doctor individual page

Route::get('/doctors', [Homecontroller::class, 'doctors_fun']);
Route::get('/contact', [Homecontroller::class, 'contact']);
Route::get('/blog', [Homecontroller::class, 'news']);

// Start Appointment link & Create Appointment
// Route::get('/appoint', [Homecontroller::class, 'appoint']);
Route::get('/appointment', [Homecontroller::class, 'appointment']);
Route::post('/appoint', [Homecontroller::class, 'appoint_Create']);
// Route::post('/appoinment', [Homecontroller::class, 'appoint_Create']);
// end Appointment link & Create Appointment


Route::get('/myappoinment', [Homecontroller::class, 'myappoinment']);

Route::get('/cancel_appoint/{id}', [Homecontroller::class, 'cancel_appoint']);

Route::get('/show_appointment', [AdminController::class, 'show_appointment']);



// for approve & cancel apointment & Email SEND

Route::get('/approved/{id}', [AdminController::class, 'approved']);

Route::get('/canceled/{id}', [AdminController::class, 'canceled']);

Route::get('/emailview/{id}', [AdminController::class, 'emailview']);



// For Deleting & updating doctor
Route::get('/delete_doctor/{id}', [AdminController::class, 'delete_doctor']);
Route::get('/edit_doctor/{id}', [AdminController::class, 'edit_doctor']);
Route::post('/update_doctor/{id}', [AdminController::class, 'update_doctor']);

// Showing All Doctors
Route::get('/alldoctors', [AdminController::class, 'allDoctors']);
