<?php

use App\Http\Controllers\backend\AdminController;
use App\Http\Controllers\backend\CustomerController;
use App\Http\Controllers\backend\FuelschemeController;
use App\Http\Controllers\backend\FueltypeController;
use App\Http\Controllers\backend\PumpController;
use App\Http\Controllers\backend\TransactionController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])
    ->name('home');

//Route::get('/', function () {
//    return view('home');
//});

//for ($counter = 0; $counter < count($route_prefixes_1); $counter++)
//{
//    $route_name = $route_prefixes_1[$counter] . '.';
//    $route_path = $route_prefixes_1[$counter] . '.';
//
//    Route::prefix($route_prefixes_1[$counter])->name($route_name)->group(function(){
//        Route::get('/create', [\App\Http\Controllers\backend\AdminController::class, 'create'])
//            ->name('create');
//        Route::post('/store', [\App\Http\Controllers\backend\AdminController::class, 'store'])
//            ->name('store');
//        Route::get('/{id}/show', [\App\Http\Controllers\backend\AdminController::class, 'show'])
//            ->name('show');
//        Route::get('/{id}/edit', [\App\Http\Controllers\backend\AdminController::class, 'edit'])
//            ->name('edit');
//        Route::put('/{id}', [\App\Http\Controllers\backend\AdminController::class, 'update'])
//            ->name('update');
//        Route::get('/', [\App\Http\Controllers\backend\AdminController::class, 'index'])
//            ->name('index');
//    });
//}

$route_prefix = 'admin';
$route_name = $route_prefix . '.';
Route::prefix($route_prefix)->name($route_name)->group(function(){
    Route::get('/create', [AdminController::class, 'create'])
        ->name('create');
    Route::post('/store', [AdminController::class, 'store'])
        ->name('store');
    Route::get('/', [AdminController::class, 'index'])
        ->name('index');
});

$route_prefix = 'customer';
$route_name = $route_prefix . '.';
Route::prefix($route_prefix)->name($route_name)->group(function(){
    Route::get('/create', [CustomerController::class, 'create'])
        ->name('create');
    Route::post('/store', [CustomerController::class, 'store'])
        ->name('store');
    Route::get('/', [CustomerController::class, 'index'])
        ->name('index');
});

$route_prefix = 'fueltype';
$route_name = $route_prefix . '.';
Route::prefix($route_prefix)->name($route_name)->group(function(){
    Route::get('/create', [FueltypeController::class, 'create'])
        ->name('create');
    Route::post('/store', [FueltypeController::class, 'store'])
        ->name('store');
    Route::get('/{id}/edit', [FueltypeController::class, 'edit'])
        ->name('edit');
    Route::put('/{id}', [FueltypeController::class, 'update'])
        ->name('update');
    Route::get('/', [FueltypeController::class, 'index'])
        ->name('index');
});

$route_prefix = 'pump';
$route_name = $route_prefix . '.';
Route::prefix($route_prefix)->name($route_name)->group(function(){
    Route::get('/create', [PumpController::class, 'create'])
        ->name('create');
    Route::post('/store', [PumpController::class, 'store'])
        ->name('store');
    Route::get('/', [PumpController::class, 'index'])
        ->name('index');
    Route::get('/{id}/edit', [PumpController::class, 'edit'])
        ->name('edit');
    Route::put('/{id}', [PumpController::class, 'update'])
        ->name('update');
    Route::get('/{id}/view', [PumpController::class, 'view'])
        ->name('view');
    Route::get('/', [PumpController::class, 'index'])
        ->name('index');

});

$route_prefix = 'fuelscheme';
$route_name = $route_prefix . '.';
Route::prefix($route_prefix)->name($route_name)->group(function(){
    Route::get('/create', [FuelschemeController::class, 'create'])
        ->name('create');
    Route::post('/store', [FuelschemeController::class, 'store'])
        ->name('store');
    Route::get('/', [FuelschemeController::class, 'index'])
        ->name('index');
    Route::get('/{id}/edit', [FuelschemeController::class, 'edit'])
        ->name('edit');
    Route::put('/{id}', [FuelschemeController::class, 'update'])
        ->name('update');
    Route::get('/', [FuelschemeController::class, 'index'])
        ->name('index');
});

$route_prefix = 'transaction';
$route_name = $route_prefix . '.';
Route::prefix($route_prefix)->name($route_name)->group(function(){
    Route::post('/create', [TransactionController::class, 'create'])
        ->name('create');
    Route::post('/finalise', [TransactionController::class, 'finalise'])
        ->name('finalise');
    Route::post('/store', [TransactionController::class, 'store'])
        ->name('store');
    Route::post('/get_fuel', [TransactionController::class, 'get_fueltype'])
        ->name('get_fuel');
    Route::get('/', [TransactionController::class, 'index'])
        ->name('index');
});
