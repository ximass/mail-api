<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

use App\Models\User;

use App\Http\Controllers\EmailController;

## GET ##

Route::get('/users', function (Request $request) {
    return User::all();
});

## POST ##

Route::post('/registration/email', [EmailController::class, 'sendRegistrationEmail']);

Route::post('/unregistration/email', [EmailController::class, 'sendUnregistrationEmail']);

Route::post('/checkin/email', [EmailController::class, 'sendCheckinEmail']);