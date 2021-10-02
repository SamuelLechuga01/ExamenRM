<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/modules', function () {
    return view('modules');
})->name('modules');

Route::middleware(['auth:sanctum', 'verified'])->get('/Companies', function () {
    return view('companies');
})->name('Companies');

Route::middleware(['auth:sanctum', 'verified'])->get('/Departaments', function () {
    return view('departaments');
})->name('Departaments');

Route::middleware(['auth:sanctum', 'verified'])->get('/Employees', function () {
    return view('employees');
})->name('Employees');

Route::middleware(['auth:sanctum', 'verified'])->get('/generatePdf', [App\Http\Livewire\Employee\Module::class, 'generatePdf'])->name('generatePdf');