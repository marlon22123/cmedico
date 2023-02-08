<?php

use App\Http\Livewire\Ambient\AmbientIndex;
use App\Http\Livewire\Attention\AttentionIndex;
use App\Http\Livewire\Patient\PatientIndex;
use App\Http\Livewire\Sale\SaleCreate;
use App\Http\Livewire\Sale\SaleIndex;
use App\Http\Livewire\Service\ServiceIndex;
use App\Http\Livewire\Specialty\SpecialtyIndex;
use App\Http\Livewire\User\UserIndex;
use App\Models\Attention;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneratePdf;
use App\Http\Livewire\Prueba;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/patient',PatientIndex::class)->name('patient');
    Route::get('/service',ServiceIndex::class)->name('service');
    Route::get('/ambient',AmbientIndex::class)->name('ambient');
    Route::get('/attention',AttentionIndex::class)->name('attention');
    Route::get('/specialty',SpecialtyIndex::class)->name('specialty');
    Route::get('/user',UserIndex::class)->name('user');
    Route::get('/sale',SaleIndex::class)->name('sale');

    Route::get('/sale/create',SaleCreate::class)->name('sale.create');

    Route::get('/sale/{sale}/pdf-a4',[GeneratePdf::class,'pdfA4'])->name('generate.pdf-a4');
    Route::get('/sale/{sale}/pdf-ticket',[GeneratePdf::class,'pdfTicket'])->name('generate.pdf-ticket');

    Route::get('/prueba',Prueba::class);






});
