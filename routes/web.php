<?php

use App\Http\Controllers\BankController;
use App\Http\Controllers\CashbookController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\SaleController;
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



Route::get('/',[CashbookController::class,'index']);
Route::post('/',[CashbookController::class,'search'])->name('cashbook.search');

Route::get('/expense',[ExpenseController::class,'index'])->name('expense.index');
Route::post('/expense/category',[ExpenseController::class,'category'])->name('expense.category');
Route::post('/expense',[ExpenseController::class,'store'])->name('expense.store');

Route::get('/income',[IncomeController::class,'index'])->name('income.index');
Route::post('/income/category',[IncomeController::class,'category'])->name('income.category');
Route::post('/income',[IncomeController::class,'store'])->name('income.store');

Route::get('/bank',[BankController::class,'index'])->name('bank.index');
Route::post('/bank/deposite',[BankController::class,'deposite'])->name('bank.deposite');
Route::post('/bank/withdraw',[BankController::class,'withdraw'])->name('bank.withdraw');

Route::get('/loan',[LoanController::class,'index'])->name('loan.index');
Route::post('/loan/supplay',[LoanController::class,'supplay'])->name('loan.supplay');
Route::post('/loan/collect',[LoanController::class,'collect'])->name('loan.collect');

Route::get('/sale',[SaleController::class,'index'])->name('sale.index');
Route::post('/sale/sales',[SaleController::class,'sale'])->name('sale.sales');
Route::post('/sale/purches',[SaleController::class,'purches'])->name('sale.purches');
