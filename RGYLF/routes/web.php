<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccEntryController;
use App\Http\Controllers\AccCostCenterController;
use App\Http\Controllers\AccEntryItemController;
use App\Http\Controllers\AccEntryTypeController;
use App\Http\Controllers\AccFinalYearController;
use App\Http\Controllers\AccGroupController;
use App\Http\Controllers\AccLedgerController;
use App\Http\Controllers\AccReportController;

use App\Http\Controllers\BankPaymentController;
use App\Http\Controllers\BankReceiptController;
use App\Http\Controllers\BankTransferController;
use App\Http\Controllers\CashPaymentController;
use App\Http\Controllers\CashReeiptController;
use App\Http\Controllers\JournalEntryController;

use App\Http\Controllers\DonarController;
use App\Http\Controllers\NeedyPersonController;
use App\Http\Controllers\SectorController;


use App\Http\Controllers\FundCollectionController;
use App\Http\Controllers\FundDisbursementController;
use App\Http\Controllers\FundRecoveryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\PermissionController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[HomeController::class,'index'])->name('index');
Route::get('/admin', function () {
    return view('admin');
});

Route::get('/app', function () {
    return view('test');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');

    Route::resource('account_financialyear',AccFinalYearController::class);
    Route::get('account_financialyear/active/{id}',[AccFinalYearController::class,'active'])->name('account_financialyear.active');
    Route::resource('account_costcenter',AccCostCenterController::class);
    Route::resource('account_group',AccGroupController::class);
    Route::resource('account_ledger',AccLedgerController::class);
    Route::resource('account_type',AccEntryTypeController::class);
    Route::resource('account_entry',AccEntryController::class);
    Route::resource('account_entry_item',AccEntryItemController::class);

    Route::resource('account_bank_payment',BankPaymentController::class);
    Route::resource('account_bank_receipt',BankReceiptController::class);
    Route::resource('account_bank_transfer',BankTransferController::class);
    Route::resource('account_cash_payment',CashPaymentController::class);
    Route::resource('account_cash_receipt',CashReeiptController::class);
    Route::resource('account_journal_entry',JournalEntryController::class);

    Route::get('account_ledger_statement',[AccReportController::class,'statement'])->name('account_statement');
    Route::post('account_ledger_statement',[AccReportController::class,'statement_report'])->name('account_statement.getreport');

    Route::any('account_ledger_range',[AccReportController::class,'range'])->name('account_range');
    Route::any('account_ledger_trial_balance',[AccReportController::class,'trial_balance'])->name('account_trial_balance');
    Route::any('account_ledger_income_statement',[AccReportController::class,'income_statement'])->name('account_income_statement');
    Route::any('account_ledger_balance_sheet',[AccReportController::class,'balance_sheet'])->name('account_balance_sheet');



    Route::resource('donar',DonarController::class);
    Route::resource('needy_person',NeedyPersonController::class);
    Route::resource('sector',SectorController::class);



    Route::resource('fund_collection',FundCollectionController::class);
    Route::resource('fund_disbursement',FundDisbursementController::class);
    Route::resource('fund_recovery',FundRecoveryController::class);
    Route::resource('expense',ExpenseController::class);



    Route::resource('user',UserController::class);
    Route::resource('role',GroupController::class);
    Route::resource('permission',PermissionController::class);
});