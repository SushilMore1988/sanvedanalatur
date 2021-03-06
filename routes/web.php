<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/divyang/create', [App\Http\Controllers\DivyangController::class, 'create'])->name('divyang.create');
Route::post('/divyang/store', [App\Http\Controllers\DivyangController::class, 'store'])->name('divyang.store');
Route::get('/divyang/singleuser/{id}', [App\Http\Controllers\DivyangController::class, 'singleuser'])->name('divyang.singleuser');

Route::middleware('auth')->group(function () {

    Route::get('/ahwal/education', [App\Http\Controllers\AhwalController::class, 'education'])->name('ahwal.education');
    Route::get('/ahwal/caste', [App\Http\Controllers\AhwalController::class, 'caste'])->name('ahwal.caste');
    Route::get('/ahwal/marital-status', [App\Http\Controllers\AhwalController::class, 'maritalStatus'])->name('ahwal.marital-status');
    Route::get('/ahwal/poverty-line', [App\Http\Controllers\AhwalController::class, 'povertyLine'])->name('ahwal.poverty-line');
    Route::get('/ahwal/st-pass', [App\Http\Controllers\AhwalController::class, 'stPass'])->name('ahwal.st-pass');
    Route::get('/ahwal/gov-scheme', [App\Http\Controllers\AhwalController::class, 'govScheme'])->name('ahwal.gov-scheme');
    Route::get('/ahwal/personal-toilet', [App\Http\Controllers\AhwalController::class, 'personalToilet'])->name('ahwal.personal-toilet');
    Route::get('/ahwal/home', [App\Http\Controllers\AhwalController::class, 'home'])->name('ahwal.home');
    // Route::get('/ahwal/caste/export', [App\Http\Controllers\AhwalController::class, 'export'])->name('ahwal.caste.export');
    // Route::get('/ahwal/education/exports', [App\Http\Controllers\AhwalController::class, 'export_list'])->name('ahwal.education');
    // Route::get('/ahwal/marital-status', [App\Http\Controllers\AhwalController::class, 'exportd'])->name('ahwal.marital-status');
    // Route::get('/status', [App\Http\Controllers\AhwalController::class, 'exporte'])->name('ahwal.gov-scheme');



    Route::get('/areas/{area}', [App\Http\Controllers\AreaController::class, 'index'])->name('areas.index');

    Route::get('/areas/{area}/create', [App\Http\Controllers\AreaController::class, 'create'])->name('areas.create');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('roles', App\Http\Controllers\RoleController::class);

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    
    Route::get('/divyang', [App\Http\Controllers\DivyangController::class, 'index'])->name('divyang.index');
    Route::get('/divyangs', [App\Http\Controllers\DivyangController::class, 'exports'])->name('divyang.index');
    Route::get('/divyang/show/{divyang}', [App\Http\Controllers\DivyangController::class, 'show'])->name('divyang.show');
    
    Route::get('/divyang/edit/{divyang}', [App\Http\Controllers\DivyangController::class, 'edit'])->name('divyang.edit');
    Route::patch('/divyang/update/{id}', [App\Http\Controllers\DivyangController::class, 'update'])->name('divyang.update');
    Route::delete('/divyang/destroy/{id}', [App\Http\Controllers\DivyangController::class, 'destroy'])->name('divyang.destroy');

    /*--------------------------------------------------Divyang Goods-------------------------------------------------------------------------------*/
    
    Route::get('/divyang-goods', [App\Http\Controllers\GoodsController::class, 'index'])->name('divyang-goods.index');
    Route::get('/divyang-goods/show/{id}', [App\Http\Controllers\GoodsController::class, 'show'])->name('divyang-goods.show');
    Route::get('/divyang-goods/create', [App\Http\Controllers\GoodsController::class, 'create'])->name('divyang-goods.create');
    Route::post('/divyang-goods/store', [App\Http\Controllers\GoodsController::class, 'store'])->name('divyang-goods.store');
    Route::get('/divyang-goods/edit/{id}', [App\Http\Controllers\GoodsController::class, 'edit'])->name('divyang-goods.edit');
    Route::patch('/divyang-goods/update/{id}', [App\Http\Controllers\GoodsController::class, 'update'])->name('divyang-goods.update');
    Route::delete('/divyang-goods/destroy/{id}', [App\Http\Controllers\GoodsController::class, 'destroy'])->name('divyang-goods.destroy');
    Route::post('/import_excel/imports',[App\Http\Controllers\GoodsController::class, 'importes']);
    Route::get('export-excels', [App\Http\Controllers\GoodsController::class, 'exports']);
    /*--------------------------------------------------Disability Types----------------------------------------------------------------------------*/
    
    Route::get('/disability-types', [App\Http\Controllers\DisabilityTypesController::class, 'index'])->name('disability-types.index');
    Route::get('/disability-types/show/{id}', [App\Http\Controllers\DisabilityTypesController::class, 'show'])->name('disability-types.show');
    Route::get('/disability-types/create', [App\Http\Controllers\DisabilityTypesController::class, 'create'])->name('disability-types.create');
    Route::post('/disability-types/store', [App\Http\Controllers\DisabilityTypesController::class, 'store'])->name('disability-types.store');
    Route::get('/disability-types/edit/{id}', [App\Http\Controllers\DisabilityTypesController::class, 'edit'])->name('disability-types.edit');
    Route::patch('/disability-types/update/{id}', [App\Http\Controllers\DisabilityTypesController::class, 'update'])->name('disability-types.update');
    Route::delete('/disability-types/destroy/{id}', [App\Http\Controllers\DisabilityTypesController::class, 'destroy'])->name('disability-types.destroy');
    Route::post('/import_excel/imported',[App\Http\Controllers\DisabilityTypesController::class, 'importe']);
    Route::get('export-excelse', [App\Http\Controllers\DisabilityTypesController::class, 'exports']);

    /*---------------------------------------------------------Disability Areas---------------------------------------------------------------------*/

    Route::get('/disability-areas', [App\Http\Controllers\DisabilityAreaController::class, 'index'])->name('disability-areas.index');
    Route::get('/disability-areas/show/{id}', [App\Http\Controllers\DisabilityAreaController::class, 'show'])->name('disability-areas.show');
    Route::get('/disability-areas/create', [App\Http\Controllers\DisabilityAreaController::class, 'create'])->name('disability-areas.create');
    Route::post('/disability-areas/store', [App\Http\Controllers\DisabilityAreaController::class, 'store'])->name('disability-areas.store');
    Route::get('/disability-areas/edit/{id}', [App\Http\Controllers\DisabilityAreaController::class, 'edit'])->name('disability-areas.edit');
    Route::patch('/disability-areas/update/{id}', [App\Http\Controllers\DisabilityAreaController::class, 'update'])->name('disability-areas.update');
    Route::delete('/disability-areas/destroy/{id}', [App\Http\Controllers\DisabilityAreaController::class, 'destroy'])->name('disability-areas.destroy');
    Route::post('/import_excel/importt',[App\Http\Controllers\DisabilityAreaController::class, 'importe']);
    Route::get('export-excele', [App\Http\Controllers\DisabilityAreaController::class, 'exports']);
    /*----------------------------------------------------------Disability Reason-------------------------------------------------------------------*/

    Route::get('/disability-reasons', [App\Http\Controllers\ReasonController::class, 'index'])->name('disability-reasons.index');
    Route::get('/disability-reasons/show/{id}', [App\Http\Controllers\ReasonController::class, 'show'])->name('disability-reasons.show');
    Route::get('/disability-reasons/create', [App\Http\Controllers\ReasonController::class, 'create'])->name('disability-reasons.create');
    Route::post('/disability-reasons/store', [App\Http\Controllers\ReasonController::class, 'store'])->name('disability-reasons.store');
    Route::get('/disability-reasons/edit/{id}', [App\Http\Controllers\ReasonController::class, 'edit'])->name('disability-reasons.edit');
    Route::patch('/disability-reasons/update/{id}', [App\Http\Controllers\ReasonController::class, 'update'])->name('disability-reasons.update');
    Route::delete('/disability-reasons/destroy/{id}', [App\Http\Controllers\ReasonController::class, 'destroy'])->name('disability-reasons.destroy');
    Route::post('/import_excel/imported',[App\Http\Controllers\ReasonController::class, 'importes']);
    Route::get('export-excelse', [App\Http\Controllers\ReasonController::class, 'exports']);
    /*-------------------------------------------------Identity proofs------------------------------------------------------------------------------*/

    Route::get('/identity-proofs', [App\Http\Controllers\IdentityController::class, 'index'])->name('identity-proofs.index');
    Route::get('/identity-proofs/show/{id}', [App\Http\Controllers\IdentityController::class, 'show'])->name('identity-proofs.show');
    Route::get('/identity-proofs/create', [App\Http\Controllers\IdentityController::class, 'create'])->name('identity-proofs.create');
    Route::post('/identity-proofs/store', [App\Http\Controllers\IdentityController::class, 'store'])->name('identity-proofs.store');
    Route::get('/identity-proofs/edit/{id}', [App\Http\Controllers\IdentityController::class, 'edit'])->name('identity-proofs.edit');
    Route::patch('/identity-proofs/update/{id}', [App\Http\Controllers\IdentityController::class, 'update'])->name('identity-proofs.update');
    Route::delete('/identity-proofs/destroy/{id}', [App\Http\Controllers\IdentityController::class, 'destroy'])->name('identity-proofs.destroy');
    Route::post('/import_excel/imported',[App\Http\Controllers\IdentityController::class, 'importe']);
    Route::get('export-excelse', [App\Http\Controllers\IdentityController::class, 'exports']);

    /*----------------------------------------------------------------------------------------------------------------------------------------------*/

    /*-------------------------------------------------Address proofs------------------------------------------------------------------------------*/

    Route::get('/address-proofs', [App\Http\Controllers\AddressController::class, 'index'])->name('address-proofs.index');
    Route::get('/address-proofs/show/{id}', [App\Http\Controllers\AddressController::class, 'show'])->name('address-proofs.show');
    Route::get('/address-proofs/create', [App\Http\Controllers\AddressController::class, 'create'])->name('address-proofs.create');
    Route::post('/address-proofs/store', [App\Http\Controllers\AddressController::class, 'store'])->name('address-proofs.store');
    Route::get('/address-proofs/edit/{id}', [App\Http\Controllers\AddressController::class, 'edit'])->name('address-proofs.edit');
    Route::patch('/address-proofs/update/{id}', [App\Http\Controllers\AddressController::class, 'update'])->name('address-proofs.update');
    Route::delete('/address-proofs/destroy/{id}', [App\Http\Controllers\AddressController::class, 'destroy'])->name('address-proofs.destroy');
    Route::post('/import_excel/imported',[App\Http\Controllers\AddressController::class, 'importe']);
    Route::get('export-excelse', [App\Http\Controllers\AddressController::class, 'exports']);    
    /*----------------------------------------------------------------------------------------------------------------------------------------------*/

    /*-------------------------------------------------Hospitals------------------------------------------------------------------------------*/

    Route::get('/hospitals', [App\Http\Controllers\HospitalController::class, 'index'])->name('hospitals.index');
    Route::get('/hospitals/show/{id}', [App\Http\Controllers\HospitalController::class, 'show'])->name('hospitals.show');
    Route::get('/hospitals/create', [App\Http\Controllers\HospitalController::class, 'create'])->name('hospitals.create');
    Route::post('/hospitals/store', [App\Http\Controllers\HospitalController::class, 'store'])->name('hospitals.store');
    Route::get('/hospitals/edit/{id}', [App\Http\Controllers\HospitalController::class, 'edit'])->name('hospitals.edit');
    Route::patch('/hospitals/update/{id}', [App\Http\Controllers\HospitalController::class, 'update'])->name('hospitals.update');
    Route::delete('/hospitals/destroy/{id}', [App\Http\Controllers\HospitalController::class, 'destroy'])->name('hospitals.destroy');
    Route::post('/import_excel/imported',[App\Http\Controllers\HospitalController::class, 'importe']);
    Route::get('export-excelse', [App\Http\Controllers\HospitalController::class, 'exports']);    
    /*----------------------------------------------------------------------------------------------------------------------------------------------*/    

    /*-------------------------------------------------Occupations------------------------------------------------------------------------------*/

    Route::get('/occupations', [App\Http\Controllers\OccupationController::class, 'index'])->name('occupations.index');
    Route::get('/occupations/show/{id}', [App\Http\Controllers\OccupationController::class, 'show'])->name('occupations.show');
    Route::get('/occupations/create', [App\Http\Controllers\OccupationController::class, 'create'])->name('occupations.create');
    Route::post('/occupations/store', [App\Http\Controllers\OccupationController::class, 'store'])->name('occupations.store');
    Route::get('/occupations/edit/{id}', [App\Http\Controllers\OccupationController::class, 'edit'])->name('occupations.edit');
    Route::patch('/occupations/update/{id}', [App\Http\Controllers\OccupationController::class, 'update'])->name('occupations.update');
    Route::delete('/occupations/destroy/{id}', [App\Http\Controllers\OccupationController::class, 'destroy'])->name('occupations.destroy');
    Route::post('/import_excel/imported',[App\Http\Controllers\OccupationController::class, 'importe']);
    Route::get('export-excelse', [App\Http\Controllers\OccupationController::class, 'exports']);    
    /*----------------------------------------------------------------------------------------------------------------------------------------------*/    

    /*--------------------------------------------------Countries------------------------------------------------------------------------------------*/    
    Route::get('/country', [App\Http\Controllers\CountryController::class, 'index'])->name('country.index');
    Route::get('/country/show/{id}', [App\Http\Controllers\CountryController::class, 'show'])->name('country.show');
    Route::get('/country/create', [App\Http\Controllers\CountryController::class, 'create'])->name('country.create');
    Route::post('/country/store', [App\Http\Controllers\CountryController::class, 'store'])->name('country.store');
    Route::get('/country/edit/{id}', [App\Http\Controllers\CountryController::class, 'edit'])->name('country.edit');
    Route::patch('/country/update/{id}', [App\Http\Controllers\CountryController::class, 'update'])->name('country.update');
    Route::delete('/country/destroy/{id}', [App\Http\Controllers\CountryController::class, 'destroy'])->name('country.destroy');
     Route::get('/import_excel/import',[App\Http\Controllers\CountryController::class, 'imports']);
     Route::post('export-excel', [App\Http\Controllers\CountryController::class, 'export']);

    /*----------------------------------------------------------------------------------------------------------------------------------------------*/    

    /*--------------------------------------------------States------------------------------------------------------------------------------------*/    
    Route::get('/states', function(){
        return view('state.index');
    })->name('states.index');
    Route::post('/import_excel/import',[App\Http\Controllers\StateController::class, 'imports']);
    Route::get('export-excel', [App\Http\Controllers\StateController::class, 'export']);

    /*----------------------------------------------------------------------------------------------------------------------------------------------*/    

    /*--------------------------------------------------Districts------------------------------------------------------------------------------------*/
    Route::get('/districts', [App\Http\Controllers\DistrictController::class, 'index'])->name('districts.index');
    Route::get('/districts/show/{id}', [App\Http\Controllers\DistrictController::class, 'show'])->name('districts.show');
    Route::get('/districts/create', [App\Http\Controllers\DistrictController::class, 'create'])->name('districts.create');
    Route::post('/districts/store', [App\Http\Controllers\DistrictController::class, 'store'])->name('districts.store');
    Route::get('/districts/edit/{id}', [App\Http\Controllers\DistrictController::class, 'edit'])->name('districts.edit');
    Route::patch('/districts/update/{id}', [App\Http\Controllers\DistrictController::class, 'update'])->name('districts.update');
    Route::delete('/districts/destroy/{id}', [App\Http\Controllers\DistrictController::class, 'destroy'])->name('districts.destroy');
    Route::post('/import_excel/import',[App\Http\Controllers\DistrictController::class, 'imports']);
     Route::get('export-excel', [App\Http\Controllers\DistrictController::class, 'export']);

    /*----------------------------------------------------------------------------------------------------------------------------------------------*/

    Route::get('/cities', [App\Http\Controllers\DivyangController::class, 'index'])->name('cities.index');

    /*--------------------------------------------------Talukas------------------------------------------------------------------------------------*/
    Route::get('/talukas', [App\Http\Controllers\TalukaController::class, 'index'])->name('talukas.index');
    Route::get('/talukas/show/{id}', [App\Http\Controllers\TalukaController::class, 'show'])->name('talukas.show');
    Route::get('/talukas/create', [App\Http\Controllers\TalukaController::class, 'create'])->name('talukas.create');
    Route::post('/talukas/store', [App\Http\Controllers\TalukaController::class, 'store'])->name('talukas.store');
    Route::get('/talukas/edit/{id}', [App\Http\Controllers\TalukaController::class, 'edit'])->name('talukas.edit');
    Route::patch('/talukas/update/{id}', [App\Http\Controllers\TalukaController::class, 'update'])->name('talukas.update');
    Route::delete('/talukas/destroy/{id}', [App\Http\Controllers\TalukaController::class, 'destroy'])->name('talukas.destroy');
    Route::post('/import_excel/import',[App\Http\Controllers\TalukaController::class, 'imports']);
    Route::get('export-excel', [App\Http\Controllers\TalukaController::class, 'export']);
    /*----------------------------------------------------------------------------------------------------------------------------------------------*/

    /*--------------------------------------------------Villages------------------------------------------------------------------------------------*/
    Route::get('/villages', [App\Http\Controllers\VillageController::class, 'index'])->name('villages.index');
    Route::get('/villages/show/{id}', [App\Http\Controllers\VillageController::class, 'show'])->name('villages.show');
    Route::get('/villages/create', [App\Http\Controllers\VillageController::class, 'create'])->name('villages.create');
    Route::post('/villages/store', [App\Http\Controllers\VillageController::class, 'store'])->name('villages.store');
    Route::get('/villages/edit/{id}', [App\Http\Controllers\VillageController::class, 'edit'])->name('villages.edit');
    Route::patch('/villages/update/{id}', [App\Http\Controllers\VillageController::class, 'update'])->name('villages.update');
    Route::delete('/villages/destroy/{id}', [App\Http\Controllers\VillageController::class, 'destroy'])->name('villages.destroy');
    Route::post('/import_excel/import',[App\Http\Controllers\VillageController::class, 'imports']);
    Route::get('export-excel', [App\Http\Controllers\VillageController::class, 'export']);
    /*----------------------------------------------------------------------------------------------------------------------------------------------*/
    
    Route::get('/mahangarpalikas', function () {
        return view('mahanagarpalika.index');
    })->name('mahangarpalikas.index');

    Route::post('/import_excel/import',[App\Http\Controllers\MahanagarpalikaController::class, 'imports']);
    Route::get('export-excel', [App\Http\Controllers\MahanagarpalikaController::class, 'export']);

    Route::get('/mahangarpalika-zones', function () {
        return view('zone.index');
    })->name('mahangarpalika-zones.index');

    Route::get('/mahangarpalika-wards', function(){
        return view('mahanagarpalika-wards.index');
    })->name('mahangarpalika-wards.index');

    Route::post('/import_excel/import',[App\Http\Controllers\MahanagarpalikawardController::class, 'imports']);
    Route::get('export-excel', [App\Http\Controllers\MahanagarpalikawardController::class, 'export']);

    Route::get('/nagarparishads', function(){
        return view('nagarparishad.index');
    })->name('nagarparishads.index');
    Route::post('/import_excel/import',[App\Http\Controllers\NagarpalikaController::class, 'imports']);
    Route::get('export-excel', [App\Http\Controllers\NagarpalikaController::class, 'export']);


    
    Route::get('/nagarparishad-wards', function(){
        return view('nagarparishad-wards.index');
    })->name('nagarparishad-wards.index');

    Route::post('/import_excel/import',[App\Http\Controllers\NagarparishadWardController::class, 'imports']);
    Route::get('export-excel', [App\Http\Controllers\NagarparishadWardController::class, 'export']);

    Route::get('/admin/index', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');

    // Route::get('/admin/create', [App\Http\Controllers\AdminController::class, 'create'])->name('admin.create');
   
        /*--------------------------------------------------Testimonials------------------------------------------------------------------------------------*/
        Route::get('/testimonial/index', [App\Http\Controllers\TestimonialController::class, 'index'])->name('testimonial.index');
        Route::get('/testimonial/show/{id}', [App\Http\Controllers\TestimonialController::class, 'show'])->name('testimonial.show');
        Route::get('/testimonial/create', [App\Http\Controllers\TestimonialController::class, 'create'])->name('testimonial.create');
        Route::post('/testimonial/store', [App\Http\Controllers\TestimonialController::class, 'store'])->name('testimonial.store');
        Route::get('/testimonial/edit/{id}', [App\Http\Controllers\TestimonialController::class, 'edit'])->name('testimonial.edit');
        Route::patch('/testimonial/update/{id}', [App\Http\Controllers\TestimonialController::class, 'update'])->name('testimonial.update');
        Route::delete('/testimonial/destroy/{id}', [App\Http\Controllers\TestimonialController::class, 'destroy'])->name('testimonial.destroy');
    
                /*--------------------------------------------------Aboutus------------------------------------------------------------------------------------*/
        Route::get('/about/index', [App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
        Route::get('/about/show/{id}', [App\Http\Controllers\AboutController::class, 'show'])->name('about.show');
        Route::get('/about/create', [App\Http\Controllers\AboutController::class, 'create'])->name('about.create');
        Route::post('/about/store', [App\Http\Controllers\AboutController::class, 'store'])->name('about.store');
        Route::get('/about/edit/{id}', [App\Http\Controllers\AboutController::class, 'edit'])->name('about.edit');
        Route::patch('/about/update/{id}', [App\Http\Controllers\AboutController::class, 'update'])->name('about.update');
        Route::delete('/about/destroy/{id}', [App\Http\Controllers\AboutController::class, 'destroy'])->name('about.destroy');

        /*--------------------------------------------------Goverment------------------------------------------------------------------------------------*/
        Route::get('/goverment/index', [App\Http\Controllers\GovermentController::class, 'index'])->name('goverment.index');
        Route::get('/goverment/show/{id}', [App\Http\Controllers\GovermentController::class, 'show'])->name('goverment.show');
        Route::get('/goverment/create', [App\Http\Controllers\GovermentController::class, 'create'])->name('goverment.create');
        Route::post('/goverment/store', [App\Http\Controllers\GovermentController::class, 'store'])->name('goverment.store');
        Route::get('/goverment/edit/{id}', [App\Http\Controllers\GovermentController::class, 'edit'])->name('goverment.edit');
        Route::patch('/goverment/update/{id}', [App\Http\Controllers\GovermentController::class, 'update'])->name('goverment.update');
        Route::delete('/goverment/destroy/{id}', [App\Http\Controllers\GovermentController::class, 'destroy'])->name('goverment.destroy');

});