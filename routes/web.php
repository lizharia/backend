<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JabatanController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('jabatan', JabatanController::class);
Route::resource('pegawai', PegawaiController::class);