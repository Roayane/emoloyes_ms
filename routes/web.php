<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\EmployerController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('admin');
// })->name('admin');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/sinup', function () {

    return view('registration');
})->name('sinup');

Route::post('custom-registration', [CustomAuthController::class,'customRegistration'])->name('register.custom');
Route::post('custom-login', [CustomAuthController::class,'customLogin'])->name('login.custom');
Route::get('/logout', [CustomAuthController::class,'logout'])->name('logout');




Route::prefix('admin')->group(function () {
    Route::get('/home', function () {
        return view('home');
    })->name('home');
    Route::resource('employes', EmployerController::class)->middleware('adminvalid');
    Route::get('employes/{id}/certificate', [EmployerController::class,'getWorkCertificate'])
        ->name('work.certificate')->middleware('adminvalid');
    Route::get('employes/{id}/vacation', [EmployerController::class,'vacationRequest'])
        ->name('work.vacation')->middleware('adminvalid');
});


