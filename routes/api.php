<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProvinceController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\DistrictController;
use App\Http\Controllers\Api\PatientController;
use App\Http\Controllers\Api\DoctorController;
use App\Http\Controllers\Api\ScheduleController;
use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\MedicalRecordController;

Route::middleware('jwt.auth')->group(function () {

    // PROVINCE
    Route::get('/province', [ProvinceController::class, 'index']);
    Route::post('/province', [ProvinceController::class, 'store']);
    Route::get('/province/{id}', [ProvinceController::class, 'show']);
    Route::put('/province/{id}', [ProvinceController::class, 'update']);
    Route::patch('/province/{id}', [ProvinceController::class, 'patch']);
    Route::delete('/province/{id}', [ProvinceController::class, 'destroy']);

    // CITY
    Route::get('/city', [CityController::class, 'index']);
    Route::get('/city/province/{id}', [CityController::class, 'province']);
    Route::post('/city', [CityController::class, 'store']);
    Route::get('/city/{id}', [CityController::class, 'show']);
    Route::put('/city/{id}', [CityController::class, 'update']);
    Route::delete('/city/{id}', [CityController::class, 'destroy']);

    // DISTRICT
    Route::get('/district', [DistrictController::class, 'index']);
    Route::get('/district/city/{id}', [DistrictController::class, 'city']);
    Route::post('/district', [DistrictController::class, 'store']);
    Route::get('/district/{id}', [DistrictController::class, 'show']);
    Route::put('/district/{id}', [DistrictController::class, 'update']);
    Route::delete('/district/{id}', [DistrictController::class, 'destroy']);

    // PATIENT
    Route::get('/patient', [PatientController::class, 'index']);
    Route::post('/patient', [PatientController::class, 'store']);
    Route::get('/patient/{id}', [PatientController::class, 'show']);
    Route::put('/patient/{id}', [PatientController::class, 'update']);
    Route::delete('/patient/{id}', [PatientController::class, 'destroy']);

    // DOCTOR
    Route::get('/doctor', [DoctorController::class, 'index']);
    Route::post('/doctor', [DoctorController::class, 'store']);
    Route::get('/doctor/{id}', [DoctorController::class, 'show']);
    Route::put('/doctor/{id}', [DoctorController::class, 'update']);
    Route::delete('/doctor/{id}', [DoctorController::class, 'destroy']);

    // SCHEDULE
    Route::get('/schedule', [ScheduleController::class, 'index']);
    Route::get('/schedule/doctor/{id}', [ScheduleController::class, 'doctor']);
    Route::post('/schedule', [ScheduleController::class, 'store']);
    Route::get('/schedule/{id}', [ScheduleController::class, 'show']);
    Route::put('/schedule/{id}', [ScheduleController::class, 'update']);
    Route::delete('/schedule/{id}', [ScheduleController::class, 'destroy']);

    // APPOINTMENT
    Route::get('/appointment', [AppointmentController::class, 'index']);
    Route::get('/appointment/patient/{id}', [AppointmentController::class, 'patient']);
    Route::post('/appointment', [AppointmentController::class, 'store']);
    Route::get('/appointment/{id}', [AppointmentController::class, 'show']);
    Route::put('/appointment/{id}', [AppointmentController::class, 'update']);
    Route::delete('/appointment/{id}', [AppointmentController::class, 'destroy']);

    // MEDICAL RECORD

    Route::get('/medical-record', [MedicalRecordController::class, 'index']);
    Route::get('/medical-record/patient/{id}', [MedicalRecordController::class, 'patient']);
    Route::post('/medical-record', [MedicalRecordController::class, 'store']);
    Route::get('/medical-record/{id}', [MedicalRecordController::class, 'show']);
    Route::put('/medical-record/{id}', [MedicalRecordController::class, 'update']);
    Route::delete('/medical-record/{id}', [MedicalRecordController::class, 'destroy']);


});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {

    Route::get('/me', [AuthController::class, 'me']);

    Route::get('/refresh', [AuthController::class, 'refresh']);

    Route::get('/logout', [AuthController::class, 'logout']);

});