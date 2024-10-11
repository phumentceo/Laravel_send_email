<?php

use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[EmailController::class,'index']);
Route::post('/send', [EmailController::class,'sendEmail'])->name("send");
