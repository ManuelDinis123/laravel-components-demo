<?php

use App\Http\Controllers\TablesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/tables', [TablesController::class, 'index']);
Route::post('/tables/get', [TablesController::class, 'getTableData'])->name("gettablesdata");

Route::get('/breadcrumbs', function () {
    return view('breadcrumbs_demo');
});
Route::get('/modals', function () {
    return view('modals');
});