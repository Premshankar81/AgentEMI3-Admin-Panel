<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Admin\MemberController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('test', 'Api\ApiControllers@test')->name('test');        


Route::post('userlogin', 'Api\ApiControllers@userlogin')->name('userlogin');
Route::post('profileDetails', 'Api\ApiControllers@profileDetails')->name('profileDetails');
Route::post('updateProfile', 'Api\ApiControllers@updateProfile')->name('updateProfile');
Route::post('get_customer', 'Api\ApiControllers@get_customer')->name('get_customer');
Route::post('get_account_list', 'Api\ApiControllers@get_account_list')->name('get_account_list');
Route::post('get_total_collection_payment', 'Api\ApiControllers@get_total_collection_payment')->name('get_total_collection_payment');

Route::post('get_fb_account', 'Api\ApiControllers@get_fb_account')->name('get_fb_account');
Route::post('get_rd_account', 'Api\ApiControllers@get_rd_account')->name('get_rd_account');
Route::post('get_loan_account', 'Api\ApiControllers@get_loan_account')->name('get_loan_account');
Route::post('get_loan_emi', 'Api\ApiControllers@get_loan_emi')->name('get_loan_emi');

Route::post('addSavingAccountDeposit', 'Api\ApiControllers@addSavingAccountDeposit')->name('addSavingAccountDeposit');
Route::post('get_bank_list', 'Api\ApiControllers@get_bank_list')->name('get_bank_list');
Route::post('get_bank_ledger', 'Api\ApiControllers@get_bank_ledger')->name('get_bank_ledger');


Route::post('add_FD_AccountDeposit', 'Api\ApiControllers@add_FD_AccountDeposit')->name('add_FD_AccountDeposit');
Route::post('add_RD_AccountDeposit', 'Api\ApiControllers@add_RD_AccountDeposit')->name('add_RD_AccountDeposit');
Route::post('add_LoanDeposit', 'Api\ApiControllers@add_LoanDeposit')->name('add_LoanDeposit');


Route::post('create_saving_account', 'Api\ApiControllers@create_saving_account')->name('create_saving_account');

Route::post('get_agent_transation', 'Api\ApiControllers@get_agent_transation')->name('get_agent_transation');
Route::post('get_member_transation', 'Api\ApiControllers@get_member_transation')->name('get_member_transation');

Route::post('get_loan_scheme', 'Api\ApiControllers@get_loan_scheme')->name('get_loan_scheme');
Route::post('apply_loan', 'Api\ApiControllers@apply_loan')->name('apply_loan');

Route::post('get_agent_profile', 'Api\ApiControllers@get_agent_profile')->name('get_agent_profile');
Route::post('add_member', 'Api\ApiControllers@add_member')->name('add_member');

Route::post('get_PaymentCollectionLoan', 'Api\ApiControllers@get_PaymentCollectionLoan')->name('get_PaymentCollectionLoan');

// apply employees leave
Route::post('employee-apply-leave', 'Admin\AllEmployeesController@applyLeave')->name('admin.employee.applyLeave');
Route::post('add-member', 'Admin\MemberController@store')->name('admin.add.member');












