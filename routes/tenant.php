<?php

declare(strict_types=1);


use App\Http\Controllers\domain\SittingdomainController;
use App\Http\Controllers\tenancy\Acc\GraidAccController;
use App\Http\Controllers\tenancy\base\EntryTypeController;
use App\Http\Controllers\tenancy\base\GroupController;
use App\Http\Controllers\tenancy\base\UniteController;
use App\Http\Controllers\tenancy\inf\CostController;
use App\Http\Controllers\tenancy\inf\TabledateController;
use App\Http\Controllers\tenancy\inf\UserController;
use App\Http\Controllers\tenancy\Items\BayFatoorahController;
use App\Http\Controllers\tenancy\Items\CategoryController;
use App\Http\Controllers\tenancy\Items\FatoorahController;
use App\Http\Controllers\tenancy\Items\RestrictionsController;
use App\Http\Controllers\tenancy\Items\SanadatController;
use App\Http\Controllers\Tenancy\LoginTenancyController;
use App\Http\Controllers\tenancy\Mostafed\MostafedController;
use App\Http\Controllers\Tenancy\Seller\SallerController;
use App\Http\Controllers\tenancy\Sitting\SittingAccountController;
use App\Http\Controllers\tenancy\Sitting\SittingController;
use App\Http\Controllers\tenancy\Sitting\UserpowersController;
use App\Http\Controllers\tenancy\Sittingtenancy;
use App\Http\Controllers\tenancy\SittingtenancyController;
use App\Http\Controllers\tenancy\Ticket\TicketsController;
use App\Models\tenancy\Group;
use App\Models\Tenancy\SittingDomain;
use App\Models\Tenancy\UserClient;
use App\Models\User;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {

    /**
     * Start code to Cleant
     * the code is not tenancy
     * 
     */       


    //  Route::get('/createTenacy/{name}', function ($name) {
    //    dd($name);
    // });


 Route::get('/createTenacy/{name}', [SittingtenancyController::class, 'createTenacy']);







Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ 
                /**
     * Start code to Cleant
     * the code is not tenancy
     * 
     */
    Route::get('/', function () {
        $Sit =SittingDomain::find(1);
      
        return  view('Tenancy.loginTenancy',['data' =>     $Sit  ]);
      
    });   
    Route::get('/Tenancy.loginTenancy', [SittingtenancyController::class, 'loginTenancy']);
    Route::post('/Tenancy.payment', [SittingtenancyController::class, 'Payment'])->name('Tenancy.payment');
    Route::get('/data/{name}', [SittingtenancyController::class, 'Activedomain']);
    Route::get('/timeactive/{name}', [SittingtenancyController::class, 'timeactive']);
    Route::get('/datetimeclose', [SittingtenancyController::class, 'datetimeclose']);
    // Route::get('/createTenacy/{name}', [SittingtenancyController::class, 'createTenacy']);
    Route::post('/logintenancy.store', [LoginTenancyController::class, 'store'])->name('logintenancy.store');
    Route::get('/logintenancy.close', [LoginTenancyController::class, 'close'])->name('logintenancy.close');
    


    Route::middleware(['authclient' ,'loginclient'])->group(function () {
        //
        Route::get('/DashboardTenancy', [SittingtenancyController::class, 'DashboardTenancy'])->name('DashboardTenancy');;


        
        Route::get('/group.index', [GroupController::class, 'index'])->name('group.index');
        Route::get('/group.print', [GroupController::class, 'print'])->name('group.print');
        Route::post('/group.store', [GroupController::class, 'store'])->name('group.store');
        Route::get('/group.edit/{id}', [GroupController::class, 'edit'])->name('group.edit');
        Route::post('/group.update', [GroupController::class, 'GroupUpdate'])->name('group.update');
        Route::delete('/group.delete/{id}', [GroupController::class, 'destroy'])->name('group.destroy');






        Route::get('/unite.unite', [UniteController::class, 'index'])->name('unite.unite');
        Route::get('/unite.print', [UniteController::class, 'print'])->name('unite.print');
        Route::post('/unite.store', [UniteController::class, 'store'])->name('unite.store');
        Route::get('/unite.edit/{id}', [UniteController::class, 'edit'])->name('unite.edit');
        Route::post('/unite.update', [UniteController::class, 'UniteUpdate'])->name('unite.update');
        Route::delete('/unite.delete/{id}', [UniteController::class, 'destroy'])->name('unite.destroy');


    //   sitting Acount
    Route::get('/SYSAccount.index', [SittingAccountController::class, 'index'])->name('SYSAccount.index');
    Route::post('/SYSAccount.store', [SittingAccountController::class, 'store'])->name('SYSAccount.store');
    Route::post('/SYSAccount.Editesys', [SittingAccountController::class, 'Editesys'])->name('SYSAccount.Editesys');
    Route::post('/SYSAccount.Search', [SittingAccountController::class, 'Search'])->name('SYSAccount.Search');
    Route::get('/SYSAccount.edit/{id}', [SittingAccountController::class, 'edit'])->name('SYSAccount.edit');
    Route::post('/SYSAccount.update', [SittingAccountController::class, 'ItemsCatagureUpdate'])->name('SYSAccount.update');
    Route::delete('/SYSAccount.delete/{id}', [SittingAccountController::class, 'destroy'])->name('SYSAccount.destroy');
    // end Sitting Account


    // Graid Account
    Route::get('/Accountguide.index', [GraidAccController::class, 'Accountguide'])->name('Accountguide.index');
    Route::get('/Accountguide.edit/{id}', [GraidAccController::class, 'editAc'])->name('Accountguide.edit');
    Route::get('/Bank.index', [GraidAccController::class, 'index'])->name('Bank.index');

    Route::get('/Bank.index', [GraidAccController::class, 'index'])->name('Bank.index');
    Route::get('/box.index', [GraidAccController::class, 'indexbox'])->name('box.index');
    Route::get('/Branch.index', [GraidAccController::class, 'indexBranch'])->name('Branch.index');
    Route::get('/envoy.index', [GraidAccController::class, 'indexenvoy'])->name('envoy.index');
    Route::get('/Store.index', [GraidAccController::class, 'indexStore'])->name('Store.index');
    Route::post('/Bank.store', [GraidAccController::class, 'store'])->name('Bank.store');
    Route::get('/Bank.edit/{id}', [GraidAccController::class, 'edit'])->name('Bank.edit');
    Route::post('/Bank.update', [GraidAccController::class, 'BankUpdate'])->name('Bank.update');
    Route::delete('/Bank.delete/{id}/{flage}', [GraidAccController::class, 'destroy'])->name('Bank.destroy');

    
    Route::get('/Bank.print', [GraidAccController::class, 'printBank'])->name('Bank.print');
    Route::get('/Bank.Excal', [GraidAccController::class, 'ExcalBank'])->name('Bank.Excal');
    Route::post('/Bank.import', [GraidAccController::class, 'importBank'])->name('Bank.import');

    Route::get('/box.print', [GraidAccController::class, 'printbox'])->name('box.print');
    Route::get('/box.Excal', [GraidAccController::class, 'Excalbox'])->name('box.Excal');
    Route::get('/store.print', [GraidAccController::class, 'printstore'])->name('store.print');
    Route::get('/store.Excal', [GraidAccController::class, 'Excalstore'])->name('store.Excal');
    Route::get('/brnch.print', [GraidAccController::class, 'printbrnch'])->name('brnch.print');
    Route::get('/brnch.Excal', [GraidAccController::class, 'Excalbrnch'])->name('brnch.Excal');
    // Graid Account

   
    // Cost

    Route::get('/Cost.index', [CostController::class, 'index'])->name('Cost.index');
    Route::post('/Cost.store', [CostController::class, 'store'])->name('Cost.store');
    Route::get('/Cost.edit/{id}', [CostController::class, 'edit'])->name('Cost.edit');
    Route::post('/Cost.update', [CostController::class, 'CostUpdate'])->name('Cost.update');
    Route::delete('/Cost.delete/{id}', [CostController::class, 'destroy'])->name('Cost.destroy');
    // end Cost

    Route::get('/tabledate.index', [TabledateController::class, 'index'])->name('tabledate.index');
    Route::post('/tabledate.store', [TabledateController::class, 'store'])->name('tabledate.store');
    Route::get('/tabledate.edit/{id}', [TabledateController::class, 'edit'])->name('tabledate.edit');
    Route::post('/tabledate.update', [TabledateController::class, 'CostUpdate'])->name('tabledate.update');
    Route::delete('/tabledate.delete/{id}', [TabledateController::class, 'destroy'])->name('tabledate.destroy');
    
    // User 

    Route::get('/User.index', [UserController::class, 'index'])->name('User.index');
    Route::post('/User.store', [UserController::class, 'store'])->name('User.store');
    Route::get('/User.edit/{id}', [UserController::class, 'edit'])->name('User.edit');
    Route::post('/User.update', [UserController::class, 'update'])->name('User.update');
    Route::delete('/User.delete/{id}', [UserController::class, 'destroy'])->name('User.destroy');
    // end User


    Route::get('/UserPowers.create/{id}', [UserpowersController::class, 'create'])->name('UserPowers.create');
    Route::get('/UserPowers.addindex', [UserPowersController::class, 'indexadd'])->name('UserPowers.addindex');
    Route::post('/UserPowers.store', [UserPowersController::class, 'store'])->name('UserPowers.store');
    Route::get('/UserPowers.edit/{id}', [UserPowersController::class, 'edit'])->name('UserPowers.edit');
    Route::post('/UserPowers.update/{id}', [UserPowersController::class, 'update'])->name('UserPowers.update');
    //Route::post('/Client.update', [SinadatController::class, 'UpdateCompany'])->name('Client.update');
    Route::get('/UserPowers.delete/{id}', [UserPowersController::class, 'destroy'])->name('UserPowers.delete');



    // Client
    // Route::get('/Supplier.index', [SupplierController::class, 'index'])->name('Supplier.index');

    Route::get('/Client.index', [MostafedController::class, 'index'])->name('Client.index');
    Route::get('/Supplier.index', [MostafedController::class, 'indexSupplier'])->name('Supplier.index');
    Route::get('/Client.addindex/{id}', [MostafedController::class, 'indexadd'])->name('Client.addindex');
    Route::post('/Client.store', [MostafedController::class, 'store'])->name('Client.store');
    Route::get('/Client.print', [MostafedController::class, 'print'])->name('Client.print');
    Route::get('/Client.excel', [MostafedController::class, 'excel'])->name('Client.excel');
    Route::get('/Client.edit/{id}', [MostafedController::class, 'edit'])->name('Client.edit');
    //Route::post('/Client.update', [ClientController::class, 'UpdateCompany'])->name('Client.update');
    Route::get('/Client.delete/{id}/{type}', [MostafedController::class, 'destroy'])->name('Client.delete');
    Route::post('/Client.update/{id}', [MostafedController::class, 'update'])->name('Client.update');
    // Client          
            
    //  Entry type


    Route::get('/EntryType.index', [EntryTypeController::class, 'index'])->name('EntryType.index');
    Route::get('/EntryType.print', [EntryTypeController::class, 'print'])->name('EntryType.print');
    Route::post('/EntryType.store', [EntryTypeController::class, 'store'])->name('EntryType.store');
    Route::get('/EntryType.edit/{id}', [EntryTypeController::class, 'edit'])->name('EntryType.edit');
    Route::post('/EntryType.update', [EntryTypeController::class, 'UserTypeUpdate'])->name('EntryType.update');
    Route::delete('/EntryType.delete/{id}', [EntryTypeController::class, 'destroy'])->name('EntryType.destroy');
    // end Entry type

    // Sitting

    Route::get('/SittingSystem.index', [SittingController::class, 'index'])->name('SittingSystem.index');
    Route::post('/Sitting.store', [SittingController::class, 'store'])->name('Sitting.store');
    Route::post('/Sitting.index/Sitting.storeRed', [SittingController::class, 'storeRedio'])->name('Sitting.storeRed');
    Route::post('/Sitting.index/Sitting.Check', [SittingController::class, 'storeCheck'])->name('Sitting.storeCheck');
    
    Route::post('/Sitting.storechich', [SittingController::class, 'checkstore'])->name('Sitting.storechich');

    Route::post('/Sitting.storenumber', [SittingController::class, 'storenumberstore'])->name('Sitting.storenumber');
    Route::post('/Sitting.storenumbersale', [SittingController::class, 'storenumberstoresale'])->name('Sitting.storenumbersale');

    Route::get('/Sitting.edit/{id}', [SittingController::class, 'edit'])->name('Sitting.edit');
    Route::post('/Sitting.update', [SittingController::class, 'ItemsCatagureUpdate'])->name('Sitting.update');
    Route::delete('/Sitting.delete/{id}', [SittingController::class, 'destroy'])->name('Sitting.destroy');
    // Sitting





     // Category storeItemSub editSub
        // Route::post('/Category.lastEntry', [CategoryController::class, 'lastItemsSub'])->name('Category.lastEntry');
        Route::get('/Category.index', [CategoryController::class, 'index'])->name('Category.index');
        Route::get('/TabaleCategory.index', [CategoryController::class, 'Tableindex'])->name('TabaleCategory.index');
        Route::get('/Category.Search', [CategoryController::class, 'Search'])->name('Category.Search');
        Route::post('/Category.searchgroup', [CategoryController::class, 'searchgroup'])->name('Category.searchgroup');
        Route::post('/Category.searchItemsAll', [CategoryController::class, 'searchItemsAll'])->name('Category.searchItemsAll');
        Route::post('/Category.SearchUnite', [CategoryController::class, 'SearchUnite'])->name('Category.SearchUnite');
        Route::post('/Category.lastItems', [CategoryController::class, 'lastItemsSub'])->name('Category.lastItems');
        Route::post('/Category.StoryItem', [CategoryController::class, 'StoryItem'])->name('Category.StoryItem');
        Route::post('/Category.store', [CategoryController::class, 'store'])->name('Category.store');
        Route::post('/Category.storeItemSub', [CategoryController::class, 'storeItemSub'])->name('Category.storeItemSub');
        Route::get('/Category.edit/{id}', [CategoryController::class, 'edit'])->name('Category.edit');
        Route::get('/Category.editSub/{id}', [CategoryController::class, 'editSub'])->name('Category.editSub');
        Route::get('/Category.editCategory/{id}', [CategoryController::class, 'editCategory'])->name('Category.editCategory');
        Route::post('/Category.update', [CategoryController::class, 'ItemsSubUpdate'])->name('Category.update');
        Route::post('/Category.updateSub', [CategoryController::class, 'ItemsSubUpdate'])->name('Category.updateSub');
        Route::delete('/Category.delete/{id}', [CategoryController::class, 'destroy'])->name('Category.destroy');
        Route::delete('/Category.destroyItemsSub/{id}', [CategoryController::class, 'destroyItemsSub'])->name('Category.destroyItemsSub');
     // end Category


     Route::get('/restrict.index', [RestrictionsController::class, 'index'])->name('restrict.index');
     Route::post('/restrict.search/{id}', [RestrictionsController::class, 'search'])->name('restrict.search');
     Route::post('/restrict.searchEntry/{id}', [RestrictionsController::class, 'searchEntry'])->name('restrict.searchEntry');
     Route::post('/restrict.searchKind/{id}', [RestrictionsController::class, 'searchKind'])->name('restrict.searchKind');
     Route::post('/restrict.searchKindEntry/{id}', [RestrictionsController::class, 'searchKindEntry'])->name('restrict.searchKindEntry');
     Route::post('/restrict.store', [RestrictionsController::class, 'store'])->name('restrict.store');
     Route::get('/restrict.edit/{id}', [RestrictionsController::class, 'edit'])->name('restrict.edit');
     Route::post('/restrict.update', [RestrictionsController::class, 'UniteUpdate'])->name('restrict.update');
     Route::delete('/restrict.delete/{id}', [RestrictionsController::class, 'destroy'])->name('restrict.destroy');
     Route::post('/restrict.storeEntrySub', [RestrictionsController::class, 'storeEntrySub'])->name('restrict.storeEntrySub');
     Route::post('/restrict.lastEntry', [RestrictionsController::class, 'lastEntry'])->name('restrict.lastEntry');
     Route::delete('/restrict.destroyrestrict/{id}', [RestrictionsController::class, 'destroyrestrict'])->name('restrict.destroyrestrict');



     // end Accountguide


     Route::get('/daybox.index', [SanadatController::class, 'indexdaybox'])->name('daybox.index');
     Route::get('/sanadatQ.index', [SanadatController::class, 'sanadatQ'])->name('sanadatQ.index');
     Route::get('/sanadat.index', [SanadatController::class, 'index'])->name('sanadat.index');
     Route::post('/sanadat.search/{id}', [SanadatController::class, 'search'])->name('sanadat.search');
     Route::post('/sanadat.searchEntry/{id}', [SanadatController::class, 'searchEntry'])->name('sanadat.searchEntry');
     Route::post('/sanadat.searchKind/{id}', [SanadatController::class, 'searchKind'])->name('sanadat.searchKind');
     Route::post('/sanadat.searchKindEntry/{id}', [SanadatController::class, 'searchKindEntry'])->name('sanadat.searchKindEntry');
     Route::post('/sanadat.store', [SanadatController::class, 'store'])->name('sanadat.store');
     Route::get('/sanadat.edit/{id}', [SanadatController::class, 'edit'])->name('sanadat.edit');
     Route::post('/sanadat.update', [SanadatController::class, 'UniteUpdate'])->name('sanadat.update');
     Route::delete('/sanadat.delete/{id}', [SanadatController::class, 'destroy'])->name('sanadat.destroy');
     Route::post('/sanadat.storeEntrySub', [SanadatController::class, 'storeEntrySub'])->name('sanadat.storeEntrySub');
     Route::post('/sanadat.lastEntry', [SanadatController::class, 'lastEntry'])->name('sanadat.lastEntry');
     Route::delete('/sanadat.destroyrestrict/{id}', [SanadatController::class, 'destroyrestrict'])->name('sanadat.destroyrestrict');




     
    
     Route::get('/adhnsarf.addindex', [FatoorahController::class, 'indexadd'])->name('adhnsarf.addindex');
     Route::post('/adhnsarf.tex', [FatoorahController::class, 'texsitting'])->name('adhnsarf.tex');
     Route::post('/saleFatoorah.TRNSFatoorah', [FatoorahController::class, 'TRNSFatoorah'])->name('saleFatoorah.TRNSFatoorah');
     Route::post('/adhnsarf.store', [FatoorahController::class, 'store'])->name('adhnsarf.store');
     Route::post('/adhnsarfSub.store', [FatoorahController::class, 'storeSub'])->name('adhnsarfSub.store');
     Route::get('/adhnsarf.edit/{id}', [FatoorahController::class, 'edit'])->name('adhnsarf.edit');
     Route::post('/adhnsarf.update/{id}', [FatoorahController::class, 'update'])->name('adhnsarf.update');
     Route::post('/adhnsarf.lastinvsab', [FatoorahController::class, 'lastInvest'])->name('adhnsarf.lastinvsab');
     //Route::post('/Client.update', [SinadatController::class, 'UpdateCompany'])->name('Client.update');
     Route::get('/adhnsarf.delete/{id}', [FatoorahController::class, 'destroy'])->name('adhnsarf.delete');
     Route::delete('/adhnsarfsbitem.delete/{id}', [FatoorahController::class, 'destroyItemsSub'])->name('adhnsarfsbitem.delete');








     


     Route::get('/Bayfatoorah.create', [BayFatoorahController::class, 'create'])->name('Bayfatoorah.create');
     Route::get('/MorBayfatoorah.create', [BayFatoorahController::class, 'createMorBay'])->name('MorBayfatoorah.create');
     Route::get('/Bayfatoorah.addindex', [BayFatoorahController::class, 'indexadd'])->name('Bayfatoorah.addindex');
     Route::post('/Bayfatoorah.tex', [BayFatoorahController::class, 'texsitting'])->name('Bayfatoorah.tex');
     Route::post('/Bayfatoorah.TRNSFatoorah', [BayFatoorahController::class, 'TRNSFatoorah'])->name('Bayfatoorah.TRNSFatoorah');
     Route::post('/Bayfatoorah.store', [BayFatoorahController::class, 'store'])->name('Bayfatoorah.store');
     Route::post('/Bayfatoorah.store', [BayFatoorahController::class, 'storeSub'])->name('Bayfatoorah.store');
     Route::get('/Bayfatoorah.edit/{id}', [BayFatoorahController::class, 'edit'])->name('Bayfatoorah.edit');
     Route::post('/Bayfatoorah.update/{id}', [BayFatoorahController::class, 'update'])->name('Bayfatoorah.update');
     Route::post('/Bayfatoorah.lastinvsab', [BayFatoorahController::class, 'lastInvest'])->name('Bayfatoorah.lastinvsab');
     //Route::post('/Client.update', [SinadatController::class, 'UpdateCompany'])->name('Client.update');
     Route::get('/Bayfatoorah.delete/{id}', [BayFatoorahController::class, 'destroy'])->name('Bayfatoorah.delete');
     Route::delete('/Bayfatoorah.delete/{id}', [BayFatoorahController::class, 'destroyItemsSub'])->name('Bayfatoorah.delete');







     Route::get('/athenFatoorah.create', [FatoorahController::class, 'athenFatoorah'])->name('athenFatoorah.create');
     Route::get('/deleteFatoorah.create', [FatoorahController::class, 'deleteFatoorah'])->name('deleteFatoorah.create');
     Route::get('/destoryFatoorah.create', [FatoorahController::class, 'destoryFatoorah'])->name('destoryFatoorah.create');
     Route::get('/kardFatoorah.create', [FatoorahController::class, 'kardFatoorah'])->name('kardFatoorah.create');
     Route::get('/mortaghFatoorah.create', [FatoorahController::class, 'mortaghFatoorah'])->name('mortaghFatoorah.create');
     Route::get('/saleFatoorah.create', [FatoorahController::class, 'create'])->name('saleFatoorah.create');
     Route::get('/sarfFatoorah.create', [FatoorahController::class, 'sarfFatoorah'])->name('sarfFatoorah.create');
     Route::get('/tahapFatoorah.create', [FatoorahController::class, 'tahapFatoorah'])->name('tahapFatoorah.create');
     Route::get('/viewpriceFatoorah.create', [FatoorahController::class, 'viewpriceFatoorah'])->name('viewpriceFatoorah.create');

    

        // tichet
        Route::get('/tichet.create', [TicketsController::class, 'create'])->name('tichet.create');
        Route::get('/listteckets.create/{id}', [TicketsController::class, 'listteckets'])->name('listteckets.create');
        Route::post('/listteckets.store', [TicketsController::class, 'store'])->name('listteckets.store');
        // end ticket






































        //       start code correct 
        Route::get('/SallerFatoorrah.create', [SallerController::class, 'create'])->name('SallerFatoorrah.create');
       
      

    });








     /**
     * End code to All 
     * the code is not tenancy
     * 
     */   
});



    /**
     * End code to Cleant
     * the code is not tenancy
     * 
     */    

});
