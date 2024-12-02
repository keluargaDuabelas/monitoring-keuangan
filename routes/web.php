<?php

use App\Http\Controllers\DetailPengajuanController;
use Illuminate\Support\Facades\Route;
use App\Filament\Resources\VerifikasiBerkasResource\Pages\ViewPengajuan;
use App\Http\Controllers\PengajuanController;


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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return redirect('/admin/login');
});


Route::get('/calculate', [PengajuanController::class, 'calculate'])->name('calculate');
Route::get('/pengajuan/get-total-jumlah', [PengajuanController::class, 'getTotalJumlah'])->name('total.getTotalJumlah');



