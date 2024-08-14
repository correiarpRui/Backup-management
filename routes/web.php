<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\root\BackupController as RootBackupController;
use App\Http\Controllers\client\BackupController as ClientBackupController;
use App\Http\Controllers\root\ClientController;
use App\Http\Controllers\root\EventController as RootEventController;
use App\Http\Controllers\client\EventController as ClientEventController;
use App\Http\Controllers\root\UserController as RootUserController;
use App\Http\Controllers\client\UserController as ClientUserController;
use Illuminate\Support\Facades\Route;



Route::get('/', [AuthController::class, 'show'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/users/create', [RootUserController::class, 'create']);
Route::post('/users', [RootUserController::class, 'store']);

Route::group([
  'prefix' => 'root',
  'as'=> 'root.',
  'namespace'=>'root',
  'middleware'=>['auth', 'root']
], function(){
  Route::get('/clients', [ClientController::class, 'index'])->name('clients');
  Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
  Route::post('/clients', [ClientController::class, 'store'])->name('clients.store');
  Route::get('/clients/show/{id}', [ClientController::class, 'show'])->name('clients.show');
  Route::get('/clients/update/{id}', [ClientController::class, 'update'])->name('clients.update');
  Route::patch('/clients/{id}', [ClientController::class, 'patch'])->name('clients.patch');
  Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');

  Route::get('/backups', [RootBackupController::class, 'index']);
  Route::get('/backups/create', [RootBackupController::class, 'create']);
  Route::delete('/backups/{id}', [RootBackupController::class, 'destroy']);
  Route::post('/backups', [RootBackupController::class, 'store']);
  Route::get('/backups/download/{id}', [RootBackupController::class, 'download']);

  Route::get('/users', [RootUserController::class, 'index'])->name('users');
  Route::post('/users', [RootUserController::class, 'index'])->name('users.sort');
  Route::get('/users/create', [RootUserController::class, 'create'])->name('users.create');
  Route::post('/users', [RootUserController::class, 'store'])->name('users.store');
  Route::get('/users/show/{id}', [RootUserController::class, 'show'])->name('users.show');
  Route::get('/users/update/{id}', [RootUserController::class, 'update'])->name('users.update');
  Route::get('/users/update/key/{id}', [RootUserController::class, 'updateKey'])->name('users.update.key');
  Route::patch('/users/{id}', [RootUserController::class, 'patch'])->name('users.patch');
  Route::patch('/users/key/{id}', [RootUserController::class, 'patchKey'])->name('users.patch.key');
  Route::delete('/users/destroy/{id}', [RootUserController::class, 'destroy'])->name('users.destroy');

  Route::get('/events', [RootEventController::class, 'index']);

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

