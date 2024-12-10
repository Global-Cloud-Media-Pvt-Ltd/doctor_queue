<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('queue-view', [DoctorController::class, 'queueView'])->name('queue.view');

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('get-queue', [DoctorController::class, 'getQueue'])->name('get.queue');

Route::get('get-iframe', [DoctorController::class, 'getIframe'])->name('get.iframe');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DoctorController::class, 'dashboard'])->name('dashboard');
    Route::post('add-doctor-queue', [DoctorController::class, 'addDoctorQueue'])->name('add.doctor.queue');
    Route::get('get-single-queue', [DoctorController::class, 'getSingleQueue'])->name('get.single.queue');
    Route::delete('queue-delete/{id}', [DoctorController::class, 'deleteQueue']);

    Route::post('add-iframe', [DoctorController::class, 'addIframe'])->name('add.iframe');
});