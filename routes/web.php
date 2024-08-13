<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\BackupController as AdminBackupController;
use App\Http\Controllers\client\BackupController as ClientBackupController;
use App\Http\Controllers\admin\ClientController;
use App\Http\Controllers\admin\EventController as AdminEventController;
use App\Http\Controllers\client\EventController as ClientEventController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\client\UserController as ClientUserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class, 'show'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/users/create', [AdminUserController::class, 'create']);
Route::post('/users', [AdminUserController::class, 'store']);

Route::group([
  'prefix' => 'admin',
  'as'=> 'admin.',
  'namespace'=>'admin',
  'middleware'=>['auth', 'admin']
], function(){
  Route::get('/clients', [ClientController::class, 'index'])->name('clients');
  Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
  Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
  Route::get('/clients/show/{id}', [ClientController::class, 'show'])->name('clients.show');
  Route::get('/clients/update/{id}', [ClientController::class, 'update'])->name('clients.update');
  Route::patch('/clients/{id}', [ClientController::class, 'patch'])->name('clients.patch');
  Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

  Route::get('/backups', [AdminBackupController::class, 'index']);
  Route::get('/backups/create', [AdminBackupController::class, 'create']);
  Route::delete('/backups/{id}', [AdminBackupController::class, 'destroy']);
  Route::post('/backups', [AdminBackupController::class, 'store']);
  Route::get('/backups/download/{id}', [AdminBackupController::class, 'download']);

  Route::get('/users', [AdminUserController::class, 'index']);
  Route::get('/users/create', [AdminUserController::class, 'create']);
  Route::post('/users', [AdminUserController::class, 'store']);
  Route::get('/user', [AdminUserController::class, 'show']);
  Route::get('/user/update', [AdminUserController::class, 'update']);
  Route::patch('/user', [AdminUserController::class, 'patch']);

  Route::get('/events', [AdminEventController::class, 'index']);

});

Route::group([
  'prefix' => 'client',
  'as'=> 'client.',
  'namespace'=>'client',
  'middleware'=>['auth']
], function(){
  Route::get('/backups', [ClientBackupController::class, 'index'])->name('backups');
  Route::get('/backups/download/{id}', [ClientBackupController::class, 'download']);

  Route::get('/users', [ClientUserController::class, 'index']);
  Route::get('/user', [ClientUserController::class, 'show']);
  Route::get('/user/update', [ClientUserController::class, 'update']);
  Route::patch('/user', [ClientUserController::class, 'patch']);

  Route::get('/events', [ClientEventController::class, 'index']);
});

