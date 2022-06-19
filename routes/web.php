<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorSpecialtyController;
use App\Http\Controllers\PatientController;
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

Route::get('/', [PatientController::class, 'create']);
Route::post('/Patientstore', [PatientController::class, 'store']);
Route::post('/doctorStore', [DoctorController::class, 'store']);


require __DIR__ . '/auth.php';
 Route::get('login/doctor', [DoctorController::class,'showAuth'])->name('doctor.login');
Route::post('login/doctor', [DoctorController::class,'login'])->name('doctor.login');
Route::get('login/patient', [PatientController::class,'showAuth'])->name('patient.login');
Route::post('login/patient', [PatientController::class,'login'])->name('patient.login');
Route::post('register/patient', [PatientController::class,'register'])->name('patient.register');
Route::get('register/patient', [PatientController::class,'showRegister'])->name('patient.register');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::prefix('doctor')->controller(DoctorController::class)->middleware(['auth'])->group(function () {
    Route::get('/all',  'index');
    Route::get('/add', 'create');
    Route::post('/store',  'store');
    Route::get('/delete/{id}',  'destroy');
    Route::get('/edit/{id}',  'edit');
    Route::post('/update',  'update');
    Route::get('/activate/{id}',  'activate');
});

Route::prefix('doctorSpecialty')->controller(DoctorSpecialtyController::class)->middleware(['auth'])->group(function () {
    Route::get('/all',  'index');
    Route::get('/add', 'create');
    Route::post('/store',  'store');
    Route::get('/delete/{id}',  'destroy');
    Route::get('/edit/{id}',  'edit');
    Route::post('/update',  'update');
});

Route::prefix('disease')->controller(DiseaseController::class)->middleware('auth:patient')->group(function () {
    Route::get('/all',  'index');
    Route::get('/add', 'create');
    Route::post('/store',  'store');
    Route::get('/delete/{id}',  'destroy');
    Route::get('/edit/{id}',  'edit');
    Route::post('/update',  'update');
});

Route::prefix('appointment')->controller(AppointmentController::class)->middleware(['auth'])->group(function () {
    Route::get('/all',  'index');
    Route::get('/add', 'create');
    Route::post('/store',  'store');
    Route::get('/delete/{id}',  'destroy');
    Route::get('/edit/{id}',  'edit');
    Route::post('/update',  'update');
});

Route::prefix('patient')->controller(PatientController::class)->middleware(['auth'])->group(function () {
    Route::get('/all',  'index');
    Route::get('/add', 'create');
    // Route::post('/store',  'store');
    Route::get('/delete/{id}',  'destroy');
    Route::get('/edit/{id}',  'edit');
    Route::post('/update',  'update');
});

Route::get('/doctor/patient',[DoctorController::class,'patient'])->name('doctor.patient')->middleware('auth:doctor');
Route::get('/doctor/appointment/{id}',[DoctorController::class,'appointment'])->name('doctor.appointment')->middleware('auth:doctor');
Route::post('/doctor/logout/',[DoctorController::class,'logout'])->name('doctor.logout')->middleware('auth:doctor');
Route::post('/patient/logout/',[PatientController::class,'logout'])->name('patient.logout')->middleware('auth:patient');
