<?php
use Illuminate\Support\Facades\Route;

// Auth routes
Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::get('/register', function(){
    return view('auth.register');
})->name('register');

// Dashboard route
Route::get('/', function () {
    return view('pages.dashboard');
})->name('dashboard');

// Vehicle Category routes
Route::get('/view-vehicles', function () {
    return view('pages.view-vehicles');
})->name('view-vehicles');

Route::get('/add-vehicle', function () {
    return view('pages.add-vehicle');
})->name('add-vehicle');

Route::get('/vehicles-on-installment', function () {
    return view('pages.vehicles-on-installment');
})->name('vehicles-on-installment');

// Sales routes
Route::get('/view-sales', function () {
    return view('pages.view-sales');
})->name('view-sales');

Route::get('/record-sale', function () {
    return view('pages.record-sale');
})->name('record-sale');

// Expense routes
Route::get('/view-expenses', function () {
    return view('pages.view-expenses');
})->name('view-expenses');

Route::get('/record-expense', function () {
    return view('pages.record-expense');
})->name('record-expense');

// Installment routes
Route::get('/view-installments', function () {
    return view('pages.view-installments');
})->name('view-installments');

Route::get('/record-installment-payment', function () {
    return view('pages.record-installment-payment');
})->name('record-installment-payment');

// Reports routes
Route::get('/sales-report', function () {
    return view('pages.sales-report');
})->name('sales-report');

Route::get('/expense-report', function () {
    return view('pages.expense-report');
})->name('expense-report');

Route::get('/profit-loss-report', function () {
    return view('pages.profit-loss-report');
})->name('profit-loss-report');

// Additional routes
Route::get('/total-vehicles-sold', function () {
    return view('pages.total-vehicles-sold');
})->name('total-vehicles-sold');

Route::get('/total-amount-sold', function () {
    return view('pages.total-amount-sold');
})->name('total-amount-sold');

Route::get('/total-amount-paid', function () {
    return view('pages.total-amount-paid');
})->name('total-amount-paid');

Route::get('/total-balance', function () {
    return view('pages.total-balance');
})->name('total-balance');

Route::get('/vehicles-with-balance', function () {
    return view('pages.vehicles-with-balance');
})->name('vehicles-with-balance');

Route::get('/upcoming-payments', function () {
    return view('pages.upcoming-payments');
})->name('upcoming-payments');

Route::get('/vehicles-owned', function () {
    return view('pages.vehicles-owned');
})->name('vehicles-owned');

Route::get('/expenses', function () {
    return view('pages.expenses');
})->name('expenses');

// Settings routes
Route::get('/user-profile', function () {
    return view('pages.user-profile');
})->name('user-profile');

Route::get('/application-settings', function () {
    return view('pages.application-settings');
})->name('application-settings');
