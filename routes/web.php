<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccessFormController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\VisitorDashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::middleware('multiauth')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login',[AuthController::class, 'loginPost'])->name('loginPost');

    Route::get('/admin/register', [AuthController::class, 'register'])->name('register');
    Route::post('/admin/register', [AuthController::class, 'registerPost'])->name('registerPost');

});

Route::middleware(['redirectifnotauthenticated','access.validator'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'getAdminDashboard'])->name('getAdminDashboard');
    Route::get('/visitor/dashboard', [VisitorDashboardController::class, 'getVisitorDashboard'])->name('getVisitorDashboard');
});


Route::get('acessform', [AuthController::class, 'getAccessForm'])->name('getAccessForm');
Route::post('acessform', [AccessFormController::class, 'requestAccess'])->name('postAccessForm');

Route::get('/logout',[AuthController::class, 'logout'])->name('logout');

Route::get('/forbidden' ,function (){
    return view('forbidden');
})->name('forbidden');
