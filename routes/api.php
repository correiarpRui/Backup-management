<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use Illuminate\Http\Client\Request;


Route::post('data/{token}/{id}', [ApiController::class, 'receiveData']);

