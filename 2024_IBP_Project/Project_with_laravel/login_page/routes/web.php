<?php

use App\Http\Controllers\AuthManager;
use App\Http\Controllers\DataBase;
use App\Http\Middleware\AdminCheckMiddleware;
use Illuminate\Support\Facades\Route;
Route::get('/home', function () {
    return view('welcome');
})->name('home')->middleware('auth');

Route::get('/admin', function () {
    return view('admin');
})->name('admin')->middleware(AdminCheckMiddleware::class);

Route::get('/', [AuthManager::class, 'login'])->name('login');
Route::post('/', [AuthManager::class, 'loginPost'])->name('login.post');

// Route::get('/login', [AuthManager::class, 'login'])->name('login');
// Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');


Route::get('/register', [AuthManager::class, 'register'])->name('register');
Route::post('/register', [AuthManager::class, 'registerPost'])->name('register.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/kullanicidatasi',[Database::class,'veriAl'])->name('verial');
Route::get('/admin/users/{id}/edit', [DataBase::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{id}', [DataBase::class, 'update'])->name('admin.users.update');
Route::delete('/admin/users/{id}', [DataBase::class, 'destroy'])->name('admin.users.destroy');
// Route::get('/',function(){
   
//    return view('welcome');
// })->name('welcome');