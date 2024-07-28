<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\InstallmentPlanController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard route
Route::get('/', [DashboardController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Vehicle routes
Route::middleware('auth')->group(function () {
    Route::get('/view-vehicles', [VehicleController::class, 'index'])->name('view-vehicles');
    Route::get('/vehicles/{id}', [VehicleController::class, 'show']);
    Route::get('/add-vehicle', function () {
        return view('pages.add-vehicle');
    })->name('add-vehicle');
    Route::post('/vehicles', [VehicleController::class, 'store'])->name('vehicles.store');
    Route::get('/vehicles-on-installment', function () {
        return view('pages.vehicles-on-installment');
    })->name('vehicles-on-installment');
    Route::post('/make-payment', [PaymentController::class, 'makePayment'])->name('make-payment');
});

// Sales routes
Route::middleware('auth')->group(function () {
    Route::get('/view-sales', [SalesController::class, 'index'])->name('view-sales');
    Route::get('/sales/{id}', [SalesController::class, 'show']);
    Route::get('/record-sale', [SalesController::class, 'create'])->name('record-sale');
    Route::post('/record-sale', [SalesController::class, 'store'])->name('sales.store');
    Route::get('/sales/print/{id}', [SalesController::class, 'print'])->name('sales.print');
});

// Expense routes
Route::middleware('auth')->group(function () {
    Route::get('/view-expenses', [ExpenseController::class, 'index'])->name('view-expenses');
    Route::get('/record-expense', [ExpenseController::class, 'create'])->name('record-expense');
    Route::post('/store-expense', [ExpenseController::class, 'store'])->name('expenses.store');
});

// Installment routes
Route::middleware('auth')->group(function () {
    Route::get('/view-installments', [VehicleController::class, 'viewInstallments'])->name('view-installments');
    Route::post('/installment-plans/pay', [InstallmentPlanController::class, 'pay']);
    Route::get('/record-installment-payment', function () {
        return view('pages.record-installment-payment');
    })->name('record-installment-payment');
});

// Reports routes
Route::middleware('auth')->group(function () {
    Route::get('/sales-report', function () {
        return view('pages.sales-report');
    })->name('sales-report');
    Route::get('/expense-report', function () {
        return view('pages.expense-report');
    })->name('expense-report');
    Route::get('/profit-loss-report', function () {
        return view('pages.profit-loss-report');
    })->name('profit-loss-report');
});

// User Management routes
Route::middleware('auth')->group(function () {
    Route::get('/user-profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('/create-user', [UserController::class, 'create'])->name('create-user');
    Route::post('/create-user', [UserController::class, 'store'])->name('user.store');
    Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('user.edit-profile');
    Route::post('/edit-profile', [UserController::class, 'updateProfile'])->name('user.update-profile');
});
