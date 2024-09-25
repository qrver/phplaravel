<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\FormProcessor;

Route::get('/userform', [FormProcessor::class, 'index']);

Route::post('/store_form', [FormProcessor::class, 'store']);
