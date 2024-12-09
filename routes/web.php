<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Protect routes with authentication
// Route::middleware('auth')->get('dashboard', function () {
//     return view('dashboard.dashboard');
// })->name('dashboard');

Route::get('queue-view', [DoctorController::class, 'queueView'])->name('queue.view');

Route::get('get-queue', [DoctorController::class, 'getQueue'])->name('get.queue');

Route::middleware('auth')->group(function () {
    Route::get('dashboard', [DoctorController::class, 'dashboard'])->name('dashboard');
    Route::post('add-doctor-queue', [DoctorController::class, 'addDoctorQueue'])->name('add.doctor.queue');
    Route::delete('queue-delete/{id}', [DoctorController::class, 'deleteQueue']);
});