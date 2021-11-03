<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyNameController;
use App\Http\Controllers\DownloadPdfController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QuotationAddressController;
use App\Http\Controllers\QuotationTotalController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('/quotation_address', QuotationAddressController::class);
Route::resource('/product', ProductController::class);
Route::resource('/company_address', CompanyAddressController::class);
Route::resource('/company_name', CompanyNameController::class);
Route::resource('/quotation_total', QuotationTotalController::class);
Route::resource('/download', DownloadPdfController::class);

Route::resource('/invoice', InvoiceController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
