<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LeadLogController;
use App\Http\Controllers\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/customer', [CustomerController::class,'index']);
Route::post('/customer', [CustomerController::class,'store']);
Route::put('/customer/{id}', [CustomerController::class,'update']);

Route::get('/employee', [EmployeeController::class,'index']);
Route::post('/employee', [EmployeeController::class,'store']);
Route::put('/employee/{id}', [EmployeeController::class,'update']);

Route::get('/leads', [LeadController::class,'getLeads']);
Route::get('/leads/{employeeId}', [LeadController::class,'getLeadsByEmployee']);
Route::post('/leads', [LeadController::class, 'createLead']);
Route::put('/leads', [LeadController::class, 'updateLead']); 

Route::get('/leadlogs', [LeadLogController::class,'getLeadLogs']);

Route::post('/login', [AuthController::class, 'login']);
