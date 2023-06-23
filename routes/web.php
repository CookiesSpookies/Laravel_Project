<?php

use App\Http\Controllers\AreaSaleController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MasterSaleController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

//HOME
Route::get('/',function(){
    return view('home');
});

/*--------------HISTORY ROUTES---------------*/

//show all data
 Route::get('/history', [HistoryController::class,'index']);

//create form
Route::get('/history/create', [HistoryController::class,'create']);

//edit form
Route::get('/history/{history}/edit', [HistoryController::class,'edit']);

//store data
Route::post('/history/store', [HistoryController::class,'store']);

//update data
Route::put('/history/{history}', [HistoryController::class,'update']);

//delete data
Route::delete('/history/{history}', [HistoryController::class,'destroy']);

//import from excel
Route::post('/history/file_import', [HistoryController::class, 'fileImport']);

//export to excel
Route::get('/history/file_export', [HistoryController::class, 'fileExport']);

//export pdf
Route::get('/history/pdf', [HistoryController::class, 'createPDF']);

/*--------------TRANSACTIONS ROUTES---------------*/

//show all data
Route::get('/transaction', [TransactionController::class,'index']);

//create form
Route::get('/transaction/create', [TransactionController::class,'create']);

//edit form
Route::get('/transaction/{transaction}/edit', [TransactionController::class,'edit']);

//store data
Route::post('/transaction/store', [TransactionController::class,'store']);

//update data
Route::put('/transaction/{transaction}', [TransactionController::class,'update']);

//delete data
Route::delete('/transaction/{transaction}', [TransactionController::class,'destroy']);

//import from excel
Route::post('/transaction/file_import', [TransactionController::class, 'fileImport']);

//export to excel
Route::get('/transaction/file_export', [TransactionController::class, 'fileExport']);

//export pdf
Route::get('/transaction/pdf', [TransactionController::class, 'createPDF']);

/*--------------AREA SALES ROUTES---------------*/

//show all data
Route::get('/area_sale', [AreaSaleController::class,'index']);

//create form
Route::get('/area_sale/create', [AreaSaleController::class,'create']);

//edit form
Route::get('/area_sale/{area_sale}/edit', [AreaSaleController::class,'edit']);

//store data
Route::post('/area_sale/store', [AreaSaleController::class,'store']);

//update data
Route::put('/area_sale/{area_sale}', [AreaSaleController::class,'update']);

//delete data
Route::delete('/area_sale/{area_sale}', [AreaSaleController::class,'destroy']);

//import from excel
Route::post('/area_sale/file_import', [AreaSaleController::class, 'fileImport']);

//export to excel
Route::get('/area_sale/file_export', [AreaSaleController::class, 'fileExport']);

//export pdf
Route::get('/area_sale/pdf', [AreaSaleController::class, 'createPDF']);

/*--------------MASTER SALES ROUTES---------------*/

//show all data
Route::get('/master_sale', [MasterSaleController::class,'index']);

//create form
Route::get('/master_sale/create', [MasterSaleController::class,'create']);

//edit form
Route::get('/master_sale/{master_sale}/edit', [MasterSaleController::class,'edit']);

//store data
Route::post('/master_sale/store', [MasterSaleController::class,'store']);

//update data
Route::put('/master_sale/{master_sale}', [MasterSaleController::class,'update']);

//delete data
Route::delete('/master_sale/{master_sale}', [MasterSaleController::class,'destroy']);

//import from excel
Route::post('/master_sale/file_import', [MasterSaleController::class, 'fileImport']);

//export to excel
Route::get('/master_sale/file_export', [MasterSaleController::class, 'fileExport']);

//export pdf
Route::get('/master_sale/pdf', [MasterSaleController::class, 'createPDF']);
