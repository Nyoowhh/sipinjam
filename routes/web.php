<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\AlatController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/halo', function () {
    return 'Halo, Laravel!';
});

Route::get('/halo/{nama}', function ($nama) {
    return 'Halo, ' . $nama . '!';
});

Route::get('/coba', function () {
    return view('coba');
});

Route::resource('buku', BukuController::class);
Route::resource('alat', AlatController::class);