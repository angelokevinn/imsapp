<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin/dashboard');
    })->name('dashboard');
    Route::get('/report', function () {
        return view('admin/report');
    })->name('report');
    Route::get('/products', function () {
        return view('products/goods');
    })->name('goods');
});
