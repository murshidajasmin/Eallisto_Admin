<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AdminDataController;
use App\Http\Controllers\Api\Admin\CustomerInvoiceController;


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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

//Route::middleware('auth:sanctum')->match(['get', 'post'], '/admin/data', [AdminDataController::class, 'handle']);

Route::match(['get', 'post'], '/admin/data', [AdminDataController::class, 'handle']);

// Route::middleware('auth:sanctum')->post('/admin/customer-invoice', [CustomerInvoiceController::class, 'store']);

Route::post('/admin/customer-invoice', [CustomerInvoiceController::class, 'store']);