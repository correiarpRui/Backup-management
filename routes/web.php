<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\root\BackupController as RootBackupController;
use App\Http\Controllers\client\BackupController as ClientBackupController;
use App\Http\Controllers\client\ClientController;
use App\Http\Controllers\root\ClientController as RootClientController;
use App\Http\Controllers\root\EventController as RootEventController;
use App\Http\Controllers\client\EventController as ClientEventController;
use App\Http\Controllers\root\UserController as RootUserController;
use App\Http\Controllers\client\UserController as ClientUserController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
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
  Route::get('/clients', [RootClientController::class, 'index'])->name('clients');
  Route::get('/clients/create', [RootClientController::class, 'create'])->name('clients.create');
  Route::post('/clients', [RootClientController::class, 'store'])->name('clients.store');
  Route::get('/clients/show/{id}', [RootClientController::class, 'show'])->name('clients.show');
  Route::get('/clients/update/{id}', [RootClientController::class, 'update'])->name('clients.update');
  Route::patch('/clients/{id}', [RootClientController::class, 'patch'])->name('clients.patch');
  Route::delete('/clients/{id}', [RootClientController::class, 'destroy'])->name('clients.destroy');

  Route::get('/backups', [RootBackupController::class, 'index'])->name('backups');
  Route::get('/backups/create', [RootBackupController::class, 'create'])->name('backups.create');
  Route::post('/backups', [RootBackupController::class, 'store'])->name('backups.store');
  Route::get('/backups/download/{id}', [RootBackupController::class, 'download'])->name('backups.download');
  Route::get('/backups/show/{id}', [RootBackupController::class, 'show'])->name('backups.show');
  Route::get('/backups/update/{id}', [RootBackupController::class, 'update'])->name('backups.update');
  Route::patch('/backups/{id}', [RootBackupController::class, 'patch'])->name('backups.patch');
  Route::delete('/backups/{id}', [RootBackupController::class, 'destroy'])->name('backups.destroy');

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

  Route::get('/events', [RootEventController::class, 'index'])->name('events');
  Route::get('/events/show/{id}', [RootEventController::class, 'show'])->name('events.show');
});

Route::group([
  'prefix' => 'client',
  'as'=> 'client.',
  'namespace'=>'client',
  'middleware'=>['auth']
], function(){
  Route::get('/client/show/{id}', [ClientController::class, 'show'])->name('clients.show');

  Route::get('/{id}/backups', [ClientBackupController::class, 'index'])->name('backups');
  Route::get('/{clientId}/backups/show/{id}', [ClientBackupController::class, 'show'])->name('backups.show');
  Route::get('/{clientId}/backups/restore/{id}', [ClientBackupController::class, 'restore'])->name('backups.restore');
  Route::get('/{clientId}/backups/restore/{id}/filter', [ClientBackupController::class, 'filter'])->name('backups.filter');
  Route::get('/restore/{id}', [ClientBackupController::class, 'email'])->name('backups.email');

  Route::get('/{clientId}/events', [ClientEventController::class, 'index'])->name('events');

  Route::get('/{id}/users', [ClientUserController::class, 'index'])->name('users');
  Route::get('/{id}/users/create', [ClientUserController::class, 'create'])->name('users.create');
  Route::post('/{clientId}/users/store', [ClientUserController::class, 'store'])->name('users.store');
  Route::delete('{clientId}/users/delete/{userId}', [ClientUserController::class, 'destroy'])->name('users.destroy');


  Route::get('/user', [ClientUserController::class, 'show']);
  Route::get('/user/update', [ClientUserController::class, 'update']);
  Route::patch('/user', [ClientUserController::class, 'patch']);
});

