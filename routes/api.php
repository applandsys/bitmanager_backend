<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Bitmanage;
use App\Http\Controllers\BitCollection;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Cooperative;
use App\Http\Controllers\TransportContoller;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\StatsController;
//use App\Http\Controllers\CategoryBit;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/testupload', [Bitmanage::class, 'testupload']);



// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::any('/userdetail', [UserController::class, 'userDetail']);
    Route::any('/bits', [Bitmanage::class, 'index']);
    Route::any('/add_bit_category', [Bitmanage::class, 'add_bit_category']);
    Route::any('/bit_category', [Bitmanage::class, 'bit_category']);
    Route::any('/bit_category_detail', [Bitmanage::class, 'bit_category_detail']);
    Route::any('/bitSearch', [Bitmanage::class, 'bitSearch']);
    Route::post('/add_bit', [Bitmanage::class, 'create']);
    Route::post('/bit_detail', [Bitmanage::class, 'bit_detail']);
    Route::post('/bit_collection', [BitCollection::class, 'insert_collection']);
    Route::post('/bit_collection_list', [BitCollection::class, 'collection_list_lastdate']);
    Route::post('/cooperative_add_book', [Cooperative::class, 'add_book']);
    Route::post('/cooperative_book_list', [Cooperative::class, 'book_list']);
    Route::post('/cooperative_book_detail', [Cooperative::class, 'book_detail']);
    Route::post('/cooperative_book_Search', [Cooperative::class, 'cooperative_book_Search']);
    Route::post('/cooperative_add_deposit', [Cooperative::class, 'add_deposit']);
    Route::post('/cooperative_withdraw', [Cooperative::class, 'withdraw']);
    Route::post('/cooperative_loan', [Cooperative::class, 'loan']);
    Route::post('/cooperative_deposit_list', [Cooperative::class, 'deposit_list']);
    Route::post('/cooperative_withdraw_list', [Cooperative::class, 'withdraw_list']);
    Route::post('/cooperative_loan_list', [Cooperative::class, 'loan_list']);
    Route::post('/add_user', [UserController::class, 'add_user']);
    Route::post('/add_transport', [TransportContoller::class, 'add_transport']);
    Route::post('/transport', [TransportContoller::class, 'transport']);
    Route::any('/transport_collection', [TransportContoller::class, 'addTransportCollection']);
    Route::any('/transport_collection_detail', [TransportContoller::class, 'transport_collection_detail']);
    Route::any('/TodayTransportCollection', [TransportContoller::class, 'TodayTransportCollection']);
    Route::any('/add_expense_chart', [ExpenseController::class, 'addExpenseChart']);
    Route::any('/expense_chart', [ExpenseController::class, 'expense_chart']);
    Route::any('/add_expense', [ExpenseController::class, 'add_expense']);
    Route::any('/totalStats', [StatsController::class, 'totalStats']);
    Route::post('/logout', [Bitmanage::class, 'logout']);
});
