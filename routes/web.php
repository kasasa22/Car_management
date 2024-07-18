<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/manage-category', function () {
    return view('pages.manage-category');
})->name('manage-category');

// Add Vehicle route
Route::get('/add-vehicle', function () {
    return view('pages.add-vehicle');
})->name('add-vehicle');

// Manage Vehicle routes
Route::get('/manage-incomingvehicle', function () {
    return view('pages.manage-incomingvehicle');
})->name('manage-incomingvehicle');

Route::get('/manage-outgoingvehicle', function () {
    return view('pages.manage-outgoingvehicle');
})->name('manage-outgoingvehicle');

// Reports route
Route::get('/bwdates-report-ds', function () {
    return view('pages.bwdates-report-ds');
})->name('bwdates-report-ds');

// Search Vehicle route
Route::get('/search-vehicle', function () {
    return view('pages.search-vehicle');
})->name('search-vehicle');

// Add Member (Reg Users) route
Route::get('/reg-users', function () {
    return view('pages.reg-users');
})->name('reg-users');
