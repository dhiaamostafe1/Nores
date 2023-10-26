<?php

use App\Exports\userExport;

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\domain\ListdomainController;
use App\Http\Controllers\domain\SittingdomainController;
use App\Http\Controllers\domain\SubdomainController;
use App\Http\Controllers\domain\TicketController;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Mpdf\Mpdf;

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



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...




        Route::get('/', function () {
            return view('Home.welcome');
        })->name('welcome');
        
        
        Route::get('/export', function () {
            return Excel::download(new userExport, 'invoices.xlsx');
        })->name("export");
        
        
        Route::get('/pdf', function () {
          
            $mpdf = new Mpdf();
            $mpdf->autoScriptToLang = true;
            $mpdf->autoLangToFont = true;
            $mpdf->autoArabic = true;
          
            $mpdf->baseScript = 1;
            $mpdf->autoVietnamese = true;

            $mpdf->SetDirectionality('rtl');
            $mpdf->WriteHTML('<h1>كململ !</h1>');
            $mpdf->Output();

            
        })->name("pdf");
        
        
        
        
        
        Auth::routes();
        
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



        Route::get('/domain.create', [SubdomainController::class, 'create'])->name('domain.create');
        Route::post('/domain.store', [SubdomainController::class, 'store'])->name('domain.store');
        Route::get('/listdomain.create', [ListdomainController::class, 'create'])->name('listdomain.create');
        Route::get('/sittingdomain.create/{id}', [SittingdomainController::class, 'create'])->name('sittingdomain.create');
        Route::post('/sittingdomain.store', [SittingdomainController::class, 'store'])->name('sittingdomain.store');
        Route::get('/sittingdomain.Payment/{id}', [SittingdomainController::class, 'Payment'])->name('sittingdomain.Payment');
        Route::get('/Company.index/{id}', [SittingdomainController::class, 'create'])->name('Company.index');

        Route::get('/Payment.create/{id}', [SubdomainController::class, 'Payment'])->name('Payment.create');


        
        Route::get('/Ticket.create/{id}', [TicketController::class, 'create'])->name('Ticket.create');
        Route::get('/Ticket.TicKet/{id}/{name}/{sub}/{source}/{flage}', [TicketController::class, 'ticketsave'])->name('Ticket.TicKet');
    });


