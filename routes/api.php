<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ClinicController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProviderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('clinics/{id}/providers', [ClinicController::class, 'providers']);
Route::resource('clinics', ClinicController::class);
Route::resource('patients', PatientController::class);
Route::resource('patients.appointments', AppointmentController::class);
Route::post('providers/{id}/availabilities', [ProviderController::class, 'availabilities']);
Route::resource('providers', ProviderController::class);
