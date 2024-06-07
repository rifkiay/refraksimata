<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosisController;

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
    return view('welcome');
});




Route::get('/diagnosis', [DiagnosisController::class, 'showForm'])->name('diagnosis.form');
Route::post('/diagnosis', [DiagnosisController::class, 'submitDiagnosis'])->name('diagnosis.submit');
Route::get('/hitung-diagnosis/{id}', [DiagnosisController::class, 'calculateCF'])->name('diagnosis.calculate');
Route::get('/hasil-diagnosis/{id}', [DiagnosisController::class, 'showDiagnosisResult'])->name('diagnosis.result');



