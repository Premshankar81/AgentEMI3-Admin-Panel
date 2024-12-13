<?php

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
    return view('admin.auth.login');
});


 Route::get('invoice/v1/{id}', 'HomeController@index')->name('customer.invoice'); 

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth','verified'])->name('dashboard');
Route::get('/dashboard', function () {
      return view('dashboard');
  })->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {

    Route::namespace('Auth')->middleware('guest:admin')->group(function(){
        Route::get('login', 'AuthenticatedSessionController@create')->name('admin.login');
        Route::post('login', 'AuthenticatedSessionController@store')->name('admin.adminlogin');    
    });


    Route::middleware('admin')->group(function(){
        Route::get('dashboard', 'HomeController@index')->name('admin.dashboard');
    });

    Route::get('logout', 'Auth\AuthenticatedSessionController@destroy')->name('admin.logout');
    Route::get('register', 'Auth\AuthenticatedSessionController@destroy')->name('admin.register');

    /*System Setting*/
    Route::get('system-setting', 'SystemSettingController@index')->name('admin.systemsetting.index');
    Route::post('system-setting-update', 'SystemSettingController@update')->name('admin.systemsetting.update');
    
       /*Profile Setting*/
    Route::get('profile-update', 'ProfileUpdateController@index')->name('admin.profileupdate.index');
    Route::post('profile-update-store', 'ProfileUpdateController@updateProfile')->name('admin.profileupdate.update');


    /* Common Controller */
    Route::post('get-state-fron-country', 'CommonController@getStates_ByCountry')->name('admin.get-state-fron-country');
    Route::post('get-city-fron-state', 'CommonController@getCity_ByState')->name('admin.get-city-fron-state');
    Route::post('get-member-details', 'CommonController@getMemberDetails')->name('admin.get-member-details');
    Route::post('get-member-details-allocate', 'CommonController@getMemberDetailsAllocate')->name('admin.get-member-details-allocate');


    Route::post('get-member-spp-details', 'CommonController@getMemberInfoSavingApp')->name('admin.get-member-spp-details');
    Route::post('get-member-saving-account', 'CommonController@getMemberSavingAccount')->name('admin.get-member-saving-account');

    Route::post('get-scheme-details', 'CommonController@getSchemeDetails')->name('admin.get-scheme-details');
    Route::post('get-rd-scheme-details', 'CommonController@get_RD_SchemeDetails')->name('admin.get-rd-scheme-details');
    Route::post('get-fd-scheme-details', 'CommonController@get_FD_SchemeDetails')->name('admin.get-fd-scheme-details');
    Route::post('get-loan-scheme-details', 'CommonController@get_Loan_SchemeDetails')->name('admin.get-loan-scheme-details');



    /*Projects*/
    Route::get('users', 'UsersController@index')->name('admin.users.index');
    Route::post('users', 'UsersController@store')->name('admin.users.store');
    Route::get('users-list', 'UsersController@list')->name('admin.users.list');
    Route::post('users-get', 'UsersController@get_row')->name('admin.users.get');
    Route::post('users-update', 'UsersController@update_row')->name('admin.users.update');
    Route::get('users-export', 'UsersController@export')->name('admin.users.export');
    Route::post('users-delete', 'UsersController@delete_row')->name('admin.users.delete');


    /*Category*/
    Route::get('category', 'CategoryController@index')->name('admin.category.index');
    Route::post('category', 'CategoryController@store')->name('admin.category.store');
    Route::get('category-list', 'CategoryController@list')->name('admin.category.list');
    Route::post('category-get', 'CategoryController@get_row')->name('admin.category.get');
    Route::get('category-export', 'CategoryController@export')->name('admin.category.export');
    Route::post('category-update', 'CategoryController@update_row')->name('admin.category.update');
    Route::post('category-delete', 'CategoryController@delete_row')->name('admin.category.delete');

      /*branches*/
    Route::get('branches', 'BranchesController@index')->name('admin.branches.index');
    Route::post('branches', 'BranchesController@store')->name('admin.branches.store');
    Route::get('branches-list', 'BranchesController@list')->name('admin.branches.list');
    Route::post('branches-get', 'BranchesController@get_row')->name('admin.branches.get');
    Route::get('branches-export', 'BranchesController@export')->name('admin.branches.export');
    Route::post('branches-update', 'BranchesController@update_row')->name('admin.branches.update');
    Route::post('branches-delete', 'BranchesController@delete_row')->name('admin.branches.delete');

      /*countries*/
    Route::get('countries', 'CountriesController@index')->name('admin.countries.index');
    Route::post('countries', 'CountriesController@store')->name('admin.countries.store');
    Route::get('countries-list', 'CountriesController@list')->name('admin.countries.list');
    Route::post('countries-get', 'CountriesController@get_row')->name('admin.countries.get');
    Route::get('countries-export', 'CountriesController@export')->name('admin.countries.export');
    Route::post('countries-update', 'CountriesController@update_row')->name('admin.countries.update');
    Route::post('countries-delete', 'CountriesController@delete_row')->name('admin.countries.delete');

    /*countries*/
    Route::get('agent-rank', 'AgentRankController@index')->name('admin.agentRank.index');
    Route::post('agent-rank', 'AgentRankController@store')->name('admin.agentRank.store');
    Route::get('agent-rank-list', 'AgentRankController@list')->name('admin.agentRank.list');
    Route::post('agent-rank-get', 'AgentRankController@get_row')->name('admin.agentRank.get');
    Route::get('agent-rank-export', 'AgentRankController@export')->name('admin.agentRank.export');
    Route::post('agent-rank-update', 'AgentRankController@update_row')->name('admin.agentRank.update');
    Route::post('agent-rank-delete', 'AgentRankController@delete_row')->name('admin.agentRank.delete');

    

    /*state*/
    Route::get('state', 'StateController@index')->name('admin.state.index');
    Route::post('state', 'StateController@store')->name('admin.state.store');
    Route::get('state-list', 'StateController@list')->name('admin.state.list');
    Route::post('state-get', 'StateController@get_row')->name('admin.state.get');
    Route::get('state-export', 'StateController@export')->name('admin.state.export');
    Route::post('state-update', 'StateController@update_row')->name('admin.state.update');
    Route::post('state-delete', 'StateController@delete_row')->name('admin.state.delete');

    /*City*/
    Route::get('city', 'CityController@index')->name('admin.city.index');
    Route::post('city', 'CityController@store')->name('admin.city.store');
    Route::get('city-list', 'CityController@list')->name('admin.city.list');
    Route::post('city-get', 'CityController@get_row')->name('admin.city.get');
    Route::get('city-export', 'CityController@export')->name('admin.city.export');
    Route::post('city-update', 'CityController@update_row')->name('admin.city.update');
    Route::post('city-delete', 'CityController@delete_row')->name('admin.city.delete');
    
    


    /*Category*/
    Route::get('bank', 'BankController@index')->name('admin.bank.index');
    Route::post('bank', 'BankController@store')->name('admin.bank.store');
    Route::get('bank-list', 'BankController@list')->name('admin.bank.list');
    Route::post('bank-get', 'BankController@get_row')->name('admin.bank.get');
    Route::post('bank-update', 'BankController@update_row')->name('admin.bank.update');
    Route::post('bank-delete', 'BankController@delete_row')->name('admin.bank.delete');

     /*bank*/
    Route::get('class', 'ClassesController@index')->name('admin.class.index');
    Route::post('class', 'ClassesController@store')->name('admin.class.store');
    Route::get('class-list', 'ClassesController@list')->name('admin.class.list');
    Route::post('class-get', 'ClassesController@get_row')->name('admin.class.get');
    Route::post('class-update', 'ClassesController@update_row')->name('admin.class.update');
    Route::post('class-delete', 'ClassesController@delete_row')->name('admin.class.delete');
    
    
    /*Category*/
    Route::get('customer', 'CustomerController@index')->name('admin.customer.index');
    Route::get('customer-create', 'CustomerController@create')->name('admin.customer.create');
    Route::post('customer-store', 'CustomerController@store_record')->name('admin.customer.store');
    Route::get('customer-list', 'CustomerController@list')->name('admin.customer.list');
    Route::post('customer-update', 'CustomerController@update_row')->name('admin.customer.update');
    Route::get('customer-export', 'CustomerController@export')->name('admin.customer.export');
    Route::post('customer-delete', 'CustomerController@delete_row')->name('admin.customer.delete');
    Route::get('/customer/{id}/edit', 'CustomerController@get_row')->name('admin.customer.edit');  

    Route::get('/customer/{id}/manage', 'CustomerController@manage_row')->name('admin.customer.manage');  

    Route::get('/customer/{id}/address', 'CustomerController@address_row')->name('admin.customer.address');  
    Route::post('customer-address', 'CustomerController@update_address')->name('admin.customer.update_address');

    Route::get('/customer/{id}/bankDetail', 'CustomerController@bankDetail_row')->name('admin.customer.bankDetail');  
    Route::post('customer-bankDetail', 'CustomerController@update_bankDetail')->name('admin.customer.update_bankDetail');

    Route::get('/customer/{id}/professionDetail', 'CustomerController@professionDetail_row')->name('admin.customer.professionDetail');  
    Route::post('customer-professionDetail', 'CustomerController@professionDetail_update')->name('admin.customer.professionDetail_update');
    
    Route::get('/customer/{id}/electricBillDetail', 'CustomerController@electricBillDetail_row')->name('admin.customer.electricBillDetail');  
    Route::post('customer-electricBillDetail', 'CustomerController@electricBillDetail_update')->name('admin.customer.electricBillDetail_update');


    Route::get('/customer/{id}/memberNominee', 'CustomerController@memberNominee_row')->name('admin.customer.mMemberNominee');  
    Route::post('customer-memberNominee', 'CustomerController@memberNominee_update')->name('admin.customer.mMemberNominee_update');

    Route::get('/customer/{id}/KYCManage', 'CustomerController@KYCManage_row')->name('admin.customer.KYCManage');  
    Route::post('customer-KYCManage', 'CustomerController@KYCManage_update')->name('admin.customer.KYCManage_update');

    Route::get('/customer/{id}/welcomeLetter', 'CustomerController@welcomeLetter_row')->name('admin.customer.welcomeLetter');  
    Route::get('/customer/{id}/welcomeLetter_print', 'CustomerController@welcomeLetter_print_row')->name('admin.customer.print_welcomeLetter');  

    Route::get('/customer/{id}/applicationForm', 'CustomerController@applicationForm_row')->name('admin.customer.applicationForm');  
    Route::get('customer-applicationForm', 'CustomerController@applicationForm_update')->name('admin.customer.applicationForm_update');  
    
    Route::get('/customer/{id}/applicationForm_print', 'CustomerController@applicationForm_print_row')->name('admin.customer.print_applicationForm');

    Route::get('/customer/{id}/MemberShipFee', 'CustomerController@MemberShipFeeManage_row')->name('admin.customer.MemberShipFee');  
    Route::get('/customer/{id}/MemberShipFeeDetail', 'CustomerController@MemberShipFeeDetail')->name('admin.templates.customer.MemberShipFeeDetail');  
    Route::post('customer-MemberShipFee', 'CustomerController@MemberShipFeeManage_add')->name('admin.customer.MemberShipFee_add');  
       Route::post('MemberShipFee-delete', 'CustomerController@delete_MemberShipFee_row')->name('admin.MemberShipFee.delete');

    Route::get('/customer/{id}/ShareCertificateDetails', 'CustomerController@ShareCertificateDetails')->name('admin.customer.ShareCertificateDetails');  

     Route::get('/customer/{id}/TransferShareCertificates', 'AllocateShareCertificatesController@TransferShareCertificates')->name('admin.customer.TransferShareCertificates');  
     Route::get('/customer/{id}/TransferShareReceipt', 'AllocateShareCertificatesController@TransferShareReceipt')->name('admin.customer.TransferShareReceipt');  

     Route::get('/customer/{id}/Transfer_ShareCertificates', 'TransferShareCertificatesController@Transfer_ShareCertificates')->name('admin.customer.Transfer_ShareCertificates');  
     Route::get('/customer/{id}/Transfer_ShareCertificates_sh4', 'TransferShareCertificatesController@Transfer_ShareCertificatesSH4')->name('admin.customer.Transfer_ShareCertificates_sh4');  
     
       

    /*ledger_type*/
    Route::get('ledger_type', 'LedgerTypeController@index')->name('admin.ledger_type.index');
    Route::post('ledger_type', 'LedgerTypeController@store')->name('admin.ledger_type.store');
    Route::get('ledger_type-list', 'LedgerTypeController@list')->name('admin.ledger_type.list');
    Route::post('ledger_type-get', 'LedgerTypeController@get_row')->name('admin.ledger_type.get');
    Route::post('ledger_type-update', 'LedgerTypeController@update_row')->name('admin.ledger_type.update');
    Route::get('ledger_type-export', 'LedgerTypeController@export')->name('admin.ledger_type.export');
    Route::post('ledger_type-delete', 'LedgerTypeController@delete_row')->name('admin.ledger_type.delete');

    /*ledger_type*/
    Route::get('ledger', 'LedgerController@index')->name('admin.ledger.index');
    Route::post('ledger', 'LedgerController@store')->name('admin.ledger.store');
    Route::get('ledger-list', 'LedgerController@list')->name('admin.ledger.list');
    Route::post('ledger-get', 'LedgerController@get_row')->name('admin.ledger.get');
    Route::post('ledger-update', 'LedgerController@update_row')->name('admin.ledger.update');
    Route::get('ledger-export', 'LedgerController@export')->name('admin.ledger.export');
    Route::post('ledger-delete', 'LedgerController@delete_row')->name('admin.ledger.delete');

    /*ledger_group*/
    Route::get('ledger_group', 'LedgerGroupController@index')->name('admin.ledger_group.index');
    Route::post('ledger_group', 'LedgerGroupController@store')->name('admin.ledger_group.store');
    Route::get('ledger_group-list', 'LedgerGroupController@list')->name('admin.ledger_group.list');
    Route::post('ledger_group-get', 'LedgerGroupController@get_row')->name('admin.ledger_group.get');
    Route::post('ledger_group-update', 'LedgerGroupController@update_row')->name('admin.ledger_group.update');
    Route::get('ledger_group-export', 'LedgerGroupController@export')->name('admin.ledger_group.export');
    Route::post('ledger_group-delete', 'LedgerGroupController@delete_row')->name('admin.ledger_group.delete');

    /*ledger_group*/
    Route::get('pending-transation', 'PendingTransController@index')->name('admin.pending-transation.index');
    Route::get('pending-transation-list', 'PendingTransController@list')->name('admin.pending-transation.list');
    Route::post('pending-transation-get', 'PendingTransController@get_row')->name('admin.pending-transation.get');
    Route::post('pending-transation-update', 'PendingTransController@update_row')->name('admin.pending-transation.update');
    Route::post('pending-transation-delete', 'PendingTransController@delete_row')->name('admin.pending-transation.delete');
    
    
    /*ledger_group*/
    Route::get('agent-commission-payment', 'PendingAgentCollectionPaymentController@index')->name('admin.agent-commission-payment.index');
    Route::get('agent-commission-payment-list', 'PendingAgentCollectionPaymentController@list')->name('admin.agent-commission-payment.list');
    Route::post('agent-commission-payment-get', 'PendingAgentCollectionPaymentController@get_row')->name('admin.agent-commission-payment.get');
    Route::post('agent-commission-payment-update', 'PendingAgentCollectionPaymentController@update_row')->name('admin.agent-commission-payment.update');
    Route::post('agent-commission-payment-delete', 'PendingAgentCollectionPaymentController@delete_row')->name('admin.agent-commission-payment.delete');
    Route::post('admin.agent-commission-payment.bulk', 'PendingAgentCollectionPaymentController@bulkUpdate_row')->name('admin.agent-commission-payment.bulk');
    
    
     /*RD Pending Transation*/
    Route::get('rd-pending-transation', 'RDPendingTransController@index')->name('admin.rd-pending-transation.index');
    Route::get('rd-pending-transation-list', 'RDPendingTransController@list')->name('admin.rd-pending-transation.list');
    Route::post('rd-pending-transation-get', 'RDPendingTransController@get_row')->name('admin.rd-pending-transation.get');
    Route::post('rd-pending-transation-update', 'RDPendingTransController@update_row')->name('admin.rd-pending-transation.update');
    Route::post('rd-pending-transation-delete', 'RDPendingTransController@delete_row')->name('admin.rd-pending-transation.delete');

    /*RD Pending Transation*/
    Route::get('fd-pending-transation', 'FDPendingTransController@index')->name('admin.fd-pending-transation.index');
    Route::get('fd-pending-transation-list', 'FDPendingTransController@list')->name('admin.fd-pending-transation.list');
    Route::post('fd-pending-transation-get', 'FDPendingTransController@get_row')->name('admin.fd-pending-transation.get');
    Route::post('fd-pending-transation-update', 'FDPendingTransController@update_row')->name('admin.fd-pending-transation.update');
    Route::post('fd-pending-transation-delete', 'FDPendingTransController@delete_row')->name('admin.fd-pending-transation.delete');

    /*vouchers*/
    Route::get('vouchers', 'VouchersController@index')->name('admin.vouchers.index');
    Route::post('vouchers', 'VouchersController@store')->name('admin.vouchers.store');
    Route::get('vouchers-list', 'VouchersController@list')->name('admin.vouchers.list');
    Route::post('vouchers-get', 'VouchersController@get_row')->name('admin.vouchers.get');
    Route::post('vouchers-update', 'VouchersController@update_row')->name('admin.vouchers.update');
    Route::get('vouchers-export', 'VouchersController@export')->name('admin.vouchers.export');
    Route::post('vouchers-delete', 'VouchersController@delete_row')->name('admin.vouchers.delete');
    Route::post('vouchers-credit-delete', 'VouchersController@credit_row_delete')->name('admin.vouchers.credit_row_delete');
    
    
     /*vouchers*/
    Route::get('trial_balance', 'TrialBalanceController@index')->name('admin.trial_balance.index');
    Route::get('trial_balance-search', 'TrialBalanceController@searchResult')->name('admin.trial_balance.search');
    
     /*vouchers*/
    Route::get('ledger_view', 'LedgerViewController@index')->name('admin.ledger_view.index');
    Route::get('ledger_view-search', 'LedgerViewController@searchResult')->name('admin.ledger_view.search');


     /*vouchers*/
    Route::get('transfer-share-certificates', 'TransferShareCertificatesController@index')->name('admin.transfer_share_certificates.index');
    Route::get('transfer-share-certificates/manage', 'TransferShareCertificatesController@create')->name('admin.transfer_share_certificates.create');
    Route::post('transfer-share-certificates', 'TransferShareCertificatesController@store')->name('admin.transfer_share_certificates.store');
    Route::get('transfer-share-certificates-list', 'TransferShareCertificatesController@list')->name('admin.transfer_share_certificates.list');
    Route::post('transfer-share-certificates-get', 'TransferShareCertificatesController@get_row')->name('admin.transfer_share_certificates.get');
    Route::post('transfer-share-certificates-update', 'TransferShareCertificatesController@update_row')->name('admin.transfer_share_certificates.update');
    Route::get('transfer-share-certificates-export', 'TransferShareCertificatesController@export')->name('admin.transfer_share_certificates.export');
    Route::post('transfer-share-certificates-delete', 'TransferShareCertificatesController@delete_row')->name('admin.transfer_share_certificates.delete');
    Route::post('transfer-share-certificates-credit-delete', 'TransferShareCertificatesController@credit_row_delete')->name('admin.vouchers.transfer_share_certificates_delete');

    Route::get('allocate-share-certificates', 'AllocateShareCertificatesController@index')->name('admin.allocate_share_certificates.index');
    Route::get('allocate-share-certificates/manage', 'AllocateShareCertificatesController@create')->name('admin.allocate_share_certificates.create');
    Route::post('allocate-share-certificates', 'AllocateShareCertificatesController@store')->name('admin.allocate_share_certificates.store');
    Route::get('allocate-share-certificates-list', 'AllocateShareCertificatesController@list')->name('admin.allocate_share_certificates.list');
    Route::get('allocate-share-certificates/{id}/edit', 'AllocateShareCertificatesController@edit_row')->name('admin.allocate_share_certificates.edit');  
    Route::post('allocate-share-certificates-update', 'AllocateShareCertificatesController@update_row')->name('admin.allocate_share_certificates.update');
    Route::get('allocate-share-certificates-export', 'AllocateShareCertificatesController@export')->name('admin.allocate_share_certificates.export');
    Route::post('allocate-share-certificates-delete', 'AllocateShareCertificatesController@delete_row')->name('admin.allocate_share_certificates.delete');
    Route::post('allocate-share-certificates-credit-delete', 'AllocateShareCertificatesController@credit_row_delete')->name('admin.vouchers.transfer_share_certificates_delete');

    Route::get('director-promoters', 'DirectorPromotersController@index')->name('admin.director_promoters.index');
    Route::get('director-promoters/manage', 'DirectorPromotersController@create')->name('admin.director_promoters.create');
    Route::post('director-promoters', 'DirectorPromotersController@store')->name('admin.director_promoters.store');
    Route::get('director-promoters-list', 'DirectorPromotersController@list')->name('admin.director_promoters.list');
    Route::get('director-promoters/{id}/edit', 'DirectorPromotersController@edit_row')->name('admin.director_promoters.edit');  
    Route::post('director-promoters-update', 'DirectorPromotersController@update_row')->name('admin.director_promoters.update');
    Route::post('director-promoters-delete', 'DirectorPromotersController@delete_row')->name('admin.director_promoters.delete');

    Route::get('director-promoters/{id}/view', 'DirectorPromotersController@view_row')->name('admin.director_promoters.view');  
    Route::get('director-promoters/{id}/address', 'DirectorPromotersController@view_address')->name('admin.director_promoters.address');  
    Route::post('director-promoters/address-store', 'DirectorPromotersController@view_address_store')->name('admin.director_promoters.address-store');  
    
    Route::get('director-promoters/{id}/profession_detail', 'DirectorPromotersController@view_profession_detail')->name('admin.director_promoters.profession_detail');  
    Route::post('director-promoters/profession_detail-store', 'DirectorPromotersController@profession_detail_store')->name('admin.director_promoters.profession_detail-store');  

    Route::get('director-promoters/{id}/bankDetail', 'DirectorPromotersController@view_bankDetail')->name('admin.director_promoters.bankDetail'); 
    Route::post('director-promoters/bankDetail-store', 'DirectorPromotersController@bankDetail_store')->name('admin.director_promoters.bankDetail-store');  

    Route::get('director-promoters/{id}/nominee', 'DirectorPromotersController@view_nominee')->name('admin.director_promoters.nominee'); 
    Route::post('director-promoters/nominee-store', 'DirectorPromotersController@nominee_store')->name('admin.director_promoters.nominee-store');  
    

    

    Route::get('scheme', 'SchemeController@index')->name('admin.scheme.index');
    Route::get('scheme/manage', 'SchemeController@create')->name('admin.scheme.create');
    Route::post('scheme', 'SchemeController@store')->name('admin.scheme.store');
    Route::get('scheme-list', 'SchemeController@list')->name('admin.scheme.list');
    Route::get('scheme/{id}/edit', 'SchemeController@edit_row')->name('admin.scheme.edit');  
    Route::post('scheme-update', 'SchemeController@update_row')->name('admin.scheme.update');
    Route::post('scheme-delete', 'SchemeController@delete_row')->name('admin.scheme.delete');

    Route::get('saving-account', 'SavingAccountController@index')->name('admin.saving_account.index');    
    Route::get('saving-account-pending', 'SavingAccountController@indexPending')->name('admin.saving_account.index-pending');
    Route::get('saving_account-list-pending', 'SavingAccountController@listPending')->name('admin.saving_account.list-pending');
    
    Route::get('saving-account-all', 'SavingAccountController@indexPending')->name('admin.saving_account.index-all');
    Route::get('saving_account-list-all', 'SavingAccountController@listAll')->name('admin.saving_account.list-all');

    Route::get('saving_account/manage', 'SavingAccountController@create')->name('admin.saving_account.create');
    Route::post('saving_account', 'SavingAccountController@store')->name('admin.saving_account.store');
    Route::get('saving_account-list', 'SavingAccountController@list')->name('admin.saving_account.list');
    
    Route::get('saving_account/{id}/edit', 'SavingAccountController@edit_row')->name('admin.saving_account.edit');  
    Route::get('saving-account/{id}/manage', 'SavingAccountController@manage')->name('admin.saving_account.manage');
    Route::get('saving-account/{id}/approve-manage', 'SavingAccountController@ApproveManage')->name('admin.saving_account.approve-manage');  
    
    Route::post('saving_account-update', 'SavingAccountController@update_row')->name('admin.saving_account.update');
    Route::post('sa-cal-interest', 'SavingAccountController@calculateInterest')->name('admin.saving_account.cal_interest');
    Route::post('saving_account-status', 'SavingAccountController@updateStatus')->name('admin.saving_account.status');
    Route::post('saving_account-delete', 'SavingAccountController@delete_row')->name('admin.saving_account.delete');
     Route::post('saving_account-transation-delete', 'SavingAccountController@transation_delete_row')->name('admin.saving_account.transation-delete');

    Route::get('saving-account/{id}/deposit', 'SavingAccountController@DepositView')->name('admin.saving_account.deposit');  
    Route::post('saving-account-deposit', 'SavingAccountController@DepositStore')->name('admin.saving_account.deposit-store');

    Route::get('saving-account/{id}/withdraw', 'SavingAccountController@WithdrawView')->name('admin.saving_account.withdraw');  
    Route::post('saving-account-withdraw', 'SavingAccountController@WithdrawStore')->name('admin.saving_account.withdraw-store');

    Route::get('saving-account/{id}/welcomeletter', 'SavingAccountController@WelcomeletterView')->name('admin.saving_account.welcomeletter');  

    Route::get('saving-account/{id}/upgrade-scheme', 'SavingAccountController@UpgradeSchemeView')->name('admin.saving_account.UpgradeScheme');  
    Route::post('saving-account/upgrade-scheme-store', 'SavingAccountController@UpgradeSchemeStore')->name('admin.saving_account.UpgradeScheme-store');  

    Route::get('saving-account/{id}/nominee', 'SavingAccountController@NomineeView')->name('admin.saving_account.nominee');  
    Route::post('saving-account/nominee-store', 'SavingAccountController@NomineeStore')->name('admin.saving_account.nominee-store');  

    Route::get('saving-account/{id}/statement', 'SavingAccountController@GetStatement')->name('admin.saving_account.statements');  
    Route::get('saving-account/{id}/print-statement', 'SavingAccountController@PrintStatement')->name('admin.saving_account.print-statements');  
    
    Route::get('saving-account/{id}/neftImps', 'SavingAccountController@Get_NeftImps')->name('admin.saving_account.neftImps');  
    
    Route::get('saving-account/{id}/transactions', 'SavingAccountController@Get_transactions')->name('admin.saving_account.transactions');  
    
    Route::get('saving-account/{id}/receipt', 'SavingAccountController@GetReceipt')->name('admin.saving_account.receipt');  
    Route::get('saving-account/{id}/print-receipt', 'SavingAccountController@GetPrintReceipt')->name('admin.saving_account.print-receipt');  

    Route::get('saving-account/{id}/update-agent', 'SavingAccountController@GetUpdateAgent')->name('admin.saving_account.update-agent');  
    Route::post('saving-account/update-agent-store', 'SavingAccountController@GetUpdateAgentStore')->name('admin.saving_account.update-agent-store'); 

    Route::get('saving-account/{id}/update-collector-agent', 'SavingAccountController@GetUpdateCollectorAgent')->name('admin.saving_account.update-collector-agent');  
    Route::post('saving-account/update-collector-agent-store', 'SavingAccountController@GetUpdateAgentCollectorStore')->name('admin.saving_account.update-collector-agent-store');

    Route::get('saving-account/{id}/jointaccount', 'SavingAccountController@GetJointAccount')->name('admin.saving_account.jointaccount');  
    Route::post('saving-account/jointaccount-store', 'SavingAccountController@UpdateJointAccountStore')->name('admin.saving_account.jointaccount-store'); 


    Route::get('saving-account/{id}/debit_crete_charges', 'SavingAccountController@DebitCreteCharges')->name('admin.saving_account.debit_crete_charges');  
    Route::post('saving-account/debit_crete_charges-store', 'SavingAccountController@DebitCreteChargesStore')->name('admin.saving_account.debit_crete_charges_store');  

    Route::get('saving-account/{id}/agent-commission', 'SavingAccountController@agentCommission')->name('admin.saving_account.agent-commission');

    Route::get('saving-account/{id}/collection-charge', 'SavingAccountController@CollectionCharge')->name('admin.saving_account.collection-charge');

    Route::get('saving-account/{id}/setLienAmount', 'SavingAccountController@getsetLienAmount')->name('admin.saving_account.setLienAmount');
    Route::post('saving-account/LienAmount-store', 'SavingAccountController@setLienAmountStore')->name('admin.saving_account.LienAmount-store');

    Route::get('saving-account/{id}/setNEFTLimitAmount', 'SavingAccountController@getsetNEFTLimitAmount')->name('admin.saving_account.setNEFTLimitAmount');
    Route::post('saving-account/NEFTLimitAmountStore-store', 'SavingAccountController@setNEFTLimitAmountStore')->name('admin.saving_account.NEFTLimitAmountStore-store');

    Route::get('saving-account/{id}/editMinor', 'SavingAccountController@geteditMinor')->name('admin.saving_account.editMinor');  
    Route::post('saving-account/editMinor-store', 'SavingAccountController@editMinorStore')->name('admin.saving_account.editMinor-store'); 

    Route::get('saving-account/{id}/closeAccount', 'SavingAccountController@getcloseAccount')->name('admin.saving_account.closeAccount');  
    Route::post('saving-account/closeAccount-store', 'SavingAccountController@closeAccountStore')->name('admin.saving_account.closeAccount-store'); 
    
    Route::get('saving-account/{id}/blockAccount', 'SavingAccountController@getblockAccount')->name('admin.saving_account.blockAccount');  
    Route::post('saving-account/blockAccount-store', 'SavingAccountController@blockAccountStore')->name('admin.saving_account.blockAccount-store'); 
    
    Route::get('saving-account/{id}/unblockAccount', 'SavingAccountController@getUnblockAccount')->name('admin.saving_account.unblockAccount');  
    Route::post('saving-account/unblockAccount-store', 'SavingAccountController@UnblockAccountStore')->name('admin.saving_account.unblockAccount-store'); 
    
    Route::get('saving-account/{id}/passbook', 'SavingAccountController@GetPassbook')->name('admin.saving_account.passbook');  
    
    Route::get('saving-account/{id}/passbook-fol1', 'SavingAccountController@GetPassbookFol1')->name('admin.saving_account.passbook-fol1');  
    Route::get('saving-account/{id}/passbook-fol2', 'SavingAccountController@GetPassbookFol2')->name('admin.saving_account.passbook-fol2');  
    
    Route::get('saving-account/{id}/passbook-fol1-print', 'SavingAccountController@GetPassbookFol2Print')->name('admin.saving_account.passbook-fol1-print');  
    Route::get('saving-account/{id}/passbook-fol2-print', 'SavingAccountController@GetPassbookFol1Print')->name('admin.saving_account.passbook-fol2-print');  

    Route::get('agents', 'AgentsController@index')->name('admin.agents.index');
    Route::get('agents/manage', 'AgentsController@create')->name('admin.agents.create');
    Route::post('agents', 'AgentsController@store')->name('admin.agents.store');
    Route::get('agents-list', 'AgentsController@list')->name('admin.agents.list');
    Route::get('agents/{id}/edit', 'AgentsController@edit_row')->name('admin.agents.edit');  
    Route::post('agents-update', 'AgentsController@update_row')->name('admin.agents.update');
    Route::post('agents-delete', 'AgentsController@delete_row')->name('admin.agents.delete');
    Route::get('agents/{id}/view', 'AgentsController@view_row')->name('admin.agents.view');  
    Route::get('agents/{id}/IDCard', 'AgentsController@view_IDCard')->name('admin.agents.IDCard');  
    Route::get('agents/{id}/print', 'AgentsController@view_formPrint')->name('admin.agents.print');  
    
    Route::get('agents/{id}/UplineAgents', 'AgentsController@view_UplineAgents')->name('admin.agents.UplineAgents');  
    Route::get('agents/{id}/DownlineAgents', 'AgentsController@view_DownlineAgents')->name('admin.agents.DownlineAgents');  
    
    

    Route::get('recurring-calculator', 'RecurringCalculationController@index')->name('admin.rd_calculator.index');
    Route::get('recurring-calculator-report', 'RecurringCalculationController@ViewReport')->name('admin.rd_calculator.report');

     Route::get('recurringScheme', 'RecurringSchemeController@index')->name('admin.recurringScheme.index');
    Route::get('recurringScheme/manage', 'RecurringSchemeController@create')->name('admin.recurringScheme.create');
    Route::post('recurringScheme', 'RecurringSchemeController@store')->name('admin.recurringScheme.store');
    Route::get('recurringScheme-list', 'RecurringSchemeController@list')->name('admin.recurringScheme.list');
    Route::get('recurringScheme/{id}/edit', 'RecurringSchemeController@edit_row')->name('admin.recurringScheme.edit');  
    Route::post('recurringScheme-update', 'RecurringSchemeController@update_row')->name('admin.recurringScheme.update');
    Route::post('recurringScheme-delete', 'RecurringSchemeController@delete_row')->name('admin.recurringScheme.delete');
    Route::get('recurringScheme/{id}/view', 'RecurringSchemeController@view_row')->name('admin.recurringScheme.view');  

    /* Recurring Deposit */
    Route::get('recurringDeposit', 'RecurringDepositController@index')->name('admin.recurringDeposit.index');
    Route::get('recurringDeposit/manage', 'RecurringDepositController@create')->name('admin.recurringDeposit.create');
    Route::post('recurringDeposit', 'RecurringDepositController@store')->name('admin.recurringDeposit.store');
    Route::get('recurringDeposit-list', 'RecurringDepositController@list')->name('admin.recurringDeposit.list');
    Route::get('recurringDeposit/{id}/edit', 'RecurringDepositController@edit_row')->name('admin.recurringDeposit.edit');  
    Route::post('recurringDeposit-update', 'RecurringDepositController@update_row')->name('admin.recurringDeposit.update');
    Route::post('recurringDeposit-delete', 'RecurringDepositController@delete_row')->name('admin.recurringDeposit.delete');
    Route::post('recurringDeposit-transation-delete', 'RecurringDepositController@transation_delete_row')->name('admin.recurringDeposit.transation-delete');
    Route::get('recurringDeposit/{id}/view', 'RecurringDepositController@view_row')->name('admin.recurringDeposit.view');  
    Route::get('recurringDeposit/{id}/approve-manage', 'RecurringDepositController@ApproveManage')->name('admin.recurringDeposit.approve-manage');  
    Route::post('recurringDeposit-status', 'RecurringDepositController@updateStatus')->name('admin.recurringDeposit.status');
    Route::get('recurringDeposit/{id}/manage', 'RecurringDepositController@Manage')->name('admin.recurringDeposit.manage');
    Route::get('recurringDeposit/{id}/emilist', 'RecurringDepositController@view_emilist')->name('admin.recurringDeposit.emilist');  
    
    Route::get('recurringDeposit/{id}/preCloseAccount', 'RecurringDepositController@preCloseAccountView')->name('admin.recurringDeposit.preCloseAccount');  
    Route::post('recurringDeposit-preCloseAccount', 'RecurringDepositController@preCloseAccountStore')->name('admin.recurringDeposit.preCloseAccount-store');

    Route::get('recurringDeposit/{id}/deposit', 'RecurringDepositController@DepositView')->name('admin.recurringDeposit.deposit');  
    Route::post('recurringDeposit-deposit', 'RecurringDepositController@DepositStore')->name('admin.recurringDeposit.deposit-store');
    
    Route::get('recurringDeposit/{id}/nominee', 'RecurringDepositController@NomineeView')->name('admin.recurringDeposit.nominee');  
    Route::post('recurringDeposit/nominee-store', 'RecurringDepositController@NomineeStore')->name('admin.recurringDeposit.nominee-store');  
    
    Route::get('recurringDeposit/{id}/update-agent', 'RecurringDepositController@GetUpdateAgent')->name('admin.recurringDeposit.update-agent');  
    Route::post('recurringDeposit/update-agent-store', 'RecurringDepositController@GetUpdateAgentStore')->name('admin.recurringDeposit.update-agent-store'); 
    
    Route::get('recurringDeposit/{id}/update-collector-agent', 'RecurringDepositController@GetUpdateCollectorAgent')->name('admin.recurringDeposit.update-collector-agent');  
    Route::post('recurringDeposit/update-collector-agent-store', 'RecurringDepositController@GetUpdateAgentCollectorStore')->name('admin.recurringDeposit.update-collector-agent-store');
    
    Route::get('recurringDeposit/{id}/welcomeletter', 'RecurringDepositController@WelcomeletterView')->name('admin.recurringDeposit.welcomeletter');  
    Route::get('recurringDeposit/{id}/RDBond', 'RecurringDepositController@RDBondView')->name('admin.recurringDeposit.RDBond');  
    
    Route::get('recurringDeposit/{id}/transactions', 'RecurringDepositController@Get_transactions')->name('admin.recurringDeposit.transactions');  
    Route::get('recurringDeposit/{id}/receipt', 'RecurringDepositController@GetReceipt')->name('admin.recurringDeposit.receipt');  
    
    Route::get('recurringDeposit/{id}/statement', 'RecurringDepositController@GetStatement')->name('admin.recurringDeposit.statements');  
    Route::get('recurringDeposit/{id}/print-statement', 'RecurringDepositController@PrintStatement')->name('admin.recurringDeposit.print-statements');  
    
     Route::get('recurringDeposit/{id}/debit_crete_charges', 'RecurringDepositController@DebitCreteCharges')->name('admin.recurringDeposit.debit_crete_charges');  
    Route::post('recurringDeposit/debit_crete_charges-store', 'RecurringDepositController@DebitCreteChargesStore')->name('admin.recurringDeposit.debit_crete_charges_store');  


     Route::get('recurringDeposit/{id}/link-saving', 'RecurringDepositController@linkSavingAccount')->name('admin.recurringDeposit.link-saving');  
     Route::post('recurringDeposit/link-saving-store', 'RecurringDepositController@linkSavingAccountStore')->name('admin.recurringDeposit.link-saving_store');  

    Route::get('recurringDepositApprove', 'RecurringDepositController@recurringDepositApprove_Index')->name('admin.recurringDepositApprove.index');
    Route::get('recurringDepositApprove-list', 'RecurringDepositController@recurringDepositApprove_list')->name('admin.recurringDepositApprove.list');
    Route::get('recurringDeposit/{id}/PartRelease', 'RecurringDepositController@PartReleaseView')->name('admin.recurringDeposit.PartRelease');  
    Route::post('recurringDeposit-PartRelease', 'RecurringDepositController@PartReleaseStore')->name('admin.recurringDeposit.PartRelease-store');
    Route::get('recurringDepositApproved', 'RecurringDepositController@recurringDepositApproved_Index')->name('admin.recurringDepositApproved.index');
    Route::get('recurringDepositApproved-list', 'RecurringDepositController@recurringDepositApproved_list')->name('admin.recurringDepositApproved.list');


    Route::get('fixedDepositApprove', 'FixedDepositController@fixedDepositApprove_Index')->name('admin.fixedDepositApprove.index');
    Route::get('fixedDepositApprove-list', 'FixedDepositController@fixedDepositApprove_list')->name('admin.fixedDepositApprove.list');
    Route::get('fixedDeposit/{id}/PartRelease', 'FixedDepositController@PartReleaseView')->name('admin.fixedDeposit.PartRelease');  
    Route::post('fixedDeposit-PartRelease', 'FixedDepositController@PartReleaseStore')->name('admin.fixedDeposit.PartRelease-store');
    Route::get('fixedDepositApproved', 'FixedDepositController@fixedDepositApproved_Index')->name('admin.fixedDepositApproved.index');
    Route::get('fixedDepositApproved-list', 'FixedDepositController@fixedDepositApproved_list')->name('admin.fixedDepositApproved.list');

    /* Fixed Deposit */
    Route::get('fixedDeposit', 'FixedDepositController@index')->name('admin.fixedDeposit.index');
    Route::get('fixedDeposit/manage', 'FixedDepositController@create')->name('admin.fixedDeposit.create');
    Route::post('fixedDeposit', 'FixedDepositController@store')->name('admin.fixedDeposit.store');
    Route::get('fixedDeposit-list', 'FixedDepositController@list')->name('admin.fixedDeposit.list');
    Route::get('fixedDeposit/{id}/edit', 'FixedDepositController@edit_row')->name('admin.fixedDeposit.edit');  
    Route::post('fixedDeposit-update', 'FixedDepositController@update_row')->name('admin.fixedDeposit.update');
    Route::post('fixedDeposit-delete', 'FixedDepositController@delete_row')->name('admin.fixedDeposit.delete');
    Route::post('fixedDeposit-transation-delete', 'FixedDepositController@transation_delete_row')->name('admin.fixedDeposit.transation-delete');
    Route::get('fixedDeposit/{id}/view', 'FixedDepositController@view_row')->name('admin.fixedDeposit.view');  
    Route::get('fixedDeposit/{id}/approve-manage', 'FixedDepositController@ApproveManage')->name('admin.fixedDeposit.approve-manage');  
    Route::post('fixedDeposit-status', 'FixedDepositController@updateStatus')->name('admin.fixedDeposit.status');
    Route::get('fixedDeposit/{id}/manage', 'FixedDepositController@Manage')->name('admin.fixedDeposit.manage');
    Route::get('fixedDeposit/{id}/payout', 'FixedDepositController@view_emilist')->name('admin.fixedDeposit.emilist');  
    
    Route::get('fixedDeposit/{id}/preCloseAccount', 'FixedDepositController@preCloseAccountView')->name('admin.fixedDeposit.preCloseAccount');  
    Route::post('fixedDeposit-preCloseAccount', 'FixedDepositController@preCloseAccountStore')->name('admin.fixedDeposit.preCloseAccount-store');

    Route::get('fixedDeposit/{id}/deposit', 'FixedDepositController@DepositView')->name('admin.fixedDeposit.deposit');  
    Route::post('fixedDeposit-deposit', 'FixedDepositController@DepositStore')->name('admin.fixedDeposit.deposit-store');
    
    Route::get('fixedDeposit/{id}/nominee', 'FixedDepositController@NomineeView')->name('admin.fixedDeposit.nominee');  
    Route::post('fixedDeposit/nominee-store', 'FixedDepositController@NomineeStore')->name('admin.fixedDeposit.nominee-store');  
    
    Route::get('fixedDeposit/{id}/update-agent', 'FixedDepositController@GetUpdateAgent')->name('admin.fixedDeposit.update-agent');  
    Route::post('fixedDeposit/update-agent-store', 'FixedDepositController@GetUpdateAgentStore')->name('admin.fixedDeposit.update-agent-store'); 
    
    Route::get('fixedDeposit/{id}/update-collector-agent', 'FixedDepositController@GetUpdateCollectorAgent')->name('admin.fixedDeposit.update-collector-agent');  
    Route::post('fixedDeposit/update-collector-agent-store', 'FixedDepositController@GetUpdateAgentCollectorStore')->name('admin.fixedDeposit.update-collector-agent-store');
    
    Route::get('fixedDeposit/{id}/welcomeletter', 'FixedDepositController@WelcomeletterView')->name('admin.fixedDeposit.welcomeletter');  
    Route::get('fixedDeposit/{id}/FDBond', 'FixedDepositController@FDBondView')->name('admin.fixedDeposit.FDBond');  
    
    Route::get('fixedDeposit/{id}/transactions', 'FixedDepositController@Get_transactions')->name('admin.fixedDeposit.transactions');  
    Route::get('fixedDeposit/{id}/receipt', 'FixedDepositController@GetReceipt')->name('admin.fixedDeposit.receipt');  
    
    Route::get('fixedDeposit/{id}/statement', 'FixedDepositController@GetStatement')->name('admin.fixedDeposit.statements');  
    Route::get('fixedDeposit/{id}/print-statement', 'FixedDepositController@PrintStatement')->name('admin.fixedDeposit.print-statements');  
    
     Route::get('fixedDeposit/{id}/debit_crete_charges', 'FixedDepositController@DebitCreteCharges')->name('admin.fixedDeposit.debit_crete_charges');  
    Route::post('fixedDeposit/debit_crete_charges-store', 'FixedDepositController@DebitCreteChargesStore')->name('admin.fixedDeposit.debit_crete_charges_store');  


     Route::get('fixedDeposit/{id}/link-saving', 'FixedDepositController@linkSavingAccount')->name('admin.fixedDeposit.link-saving');  
     Route::post('fixedDeposit/link-saving-store', 'FixedDepositController@linkSavingAccountStore')->name('admin.fixedDeposit.link-saving_store');  

    /*Route::get('recurringDepositApprove', 'FixedDepositController@recurringDepositApprove_Index')->name('admin.recurringDepositApprove.index');*/
    Route::get('recurringDepositApprove-list', 'FixedDepositController@recurringDepositApprove_list')->name('admin.recurringDepositApprove.list');

     Route::get('fixedDeposit/{id}/PartRelease', 'FixedDepositController@PartReleaseView')->name('admin.fixedDeposit.PartRelease');  
    Route::post('fixedDeposit-PartRelease', 'FixedDepositController@PartReleaseStore')->name('admin.fixedDeposit.PartRelease-store');

    Route::get('fixedDeposit/{id}/jointaccount', 'FixedDepositController@GetJointAccount')->name('admin.fixedDeposit.jointaccount');  
    Route::post('fixedDeposit/jointaccount-store', 'FixedDepositController@UpdateJointAccountStore')->name('admin.fixedDeposit.jointaccount-store'); 

    Route::get('fixedDeposit/{id}/blockAccount', 'FixedDepositController@getblockAccount')->name('admin.fixedDeposit.blockAccount');  
    Route::post('fixedDeposit/blockAccount-store', 'FixedDepositController@blockAccountStore')->name('admin.fixedDeposit.blockAccount-store'); 
    
    Route::get('fixedDeposit/{id}/unblockAccount', 'FixedDepositController@getUnblockAccount')->name('admin.fixedDeposit.unblockAccount');  
    Route::post('fixedDeposit/unblockAccount-store', 'FixedDepositController@UnblockAccountStore')->name('admin.fixedDeposit.unblockAccount-store'); 

    Route::get('recurringDepositApproved', 'FixedDepositController@recurringDepositApproved_Index')->name('admin.recurringDepositApproved.index');
    Route::get('recurringDepositApproved-list', 'FixedDepositController@recurringDepositApproved_list')->name('admin.recurringDepositApproved.list');

    Route::get('fixedDeposit-calculator', 'FixedDepositCalculationController@index')->name('admin.fd_calculator.index');
    Route::get('fixedDeposit-calculator-report', 'FixedDepositCalculationController@ViewReport')->name('admin.fd_calculator.report');
    
    Route::get('fixedDepositScheme', 'FixedDepositSchemeController@index')->name('admin.fixedDepositScheme.index');
    Route::get('fixedDepositScheme/manage', 'FixedDepositSchemeController@create')->name('admin.fixedDepositScheme.create');
    Route::post('fixedDepositScheme', 'FixedDepositSchemeController@store')->name('admin.fixedDepositScheme.store');
    Route::get('fixedDepositScheme-list', 'FixedDepositSchemeController@list')->name('admin.fixedDepositScheme.list');
    Route::get('fixedDepositScheme/{id}/edit', 'FixedDepositSchemeController@edit_row')->name('admin.fixedDepositScheme.edit');  
    Route::post('fixedDepositScheme-update', 'FixedDepositSchemeController@update_row')->name('admin.fixedDepositScheme.update');
    Route::post('fixedDepositScheme-delete', 'FixedDepositSchemeController@delete_row')->name('admin.fixedDepositScheme.delete');
    Route::get('fixedDepositScheme/{id}/view', 'FixedDepositSchemeController@view_row')->name('admin.fixedDepositScheme.view');  

    Route::get('loanScheme', 'LoanSchemeController@index')->name('admin.loanScheme.index');
    Route::get('loanScheme/manage', 'LoanSchemeController@create')->name('admin.loanScheme.create');
    Route::post('loanScheme', 'LoanSchemeController@store')->name('admin.loanScheme.store');
    Route::get('loanScheme-list', 'LoanSchemeController@list')->name('admin.loanScheme.list');
    Route::get('loanScheme/{id}/edit', 'LoanSchemeController@edit_row')->name('admin.loanScheme.edit');  
    Route::post('loanScheme-update', 'LoanSchemeController@update_row')->name('admin.loanScheme.update');
    Route::post('loanScheme-delete', 'LoanSchemeController@delete_row')->name('admin.loanScheme.delete');
    Route::get('loanScheme/{id}/view', 'LoanSchemeController@view_row')->name('admin.loanScheme.view');  
    Route::post('loanScheme-panelty-delete', 'LoanSchemeController@delete_Paneltyrow')->name('admin.loanScheme.panelty-delete');

    
    Route::get('loan-calculator', 'LoanCalculationController@index')->name('admin.loan_calculator.index');
    Route::get('loan-calculator-report', 'LoanCalculationController@ViewReport')->name('admin.loan_calculator.report');

     /* Business Loan Approval */
    Route::get('businessLoanApprove', 'BusinessLoanController@businessLoanApprove_Index')->name('admin.businessLoanApprove.index');
    Route::get('businessLoanApprove-list', 'BusinessLoanController@businessLoanApprove_list')->name('admin.businessLoanApprove.list');


     /* Business Loan Approved */
    Route::get('businessLoanApproved', 'BusinessLoanController@businessLoanApproved_Index')->name('admin.businessLoanApproved.index');
    Route::get('businessLoanDisburse-list', 'BusinessLoanController@BusinessLoandisburse_list')->name('admin.businessLoanApproved.list');

     /* Business Loan */
    Route::get('businessLoan', 'BusinessLoanController@index')->name('admin.businessLoan.index');
    Route::get('businessLoan/manage', 'BusinessLoanController@create')->name('admin.businessLoan.create');
    Route::post('businessLoan', 'BusinessLoanController@store')->name('admin.businessLoan.store');
    Route::get('businessLoan-list', 'BusinessLoanController@list')->name('admin.businessLoan.list');
    Route::get('businessLoan/{id}/edit', 'BusinessLoanController@edit_row')->name('admin.businessLoan.edit');  
    Route::post('businessLoan-update', 'BusinessLoanController@update_row')->name('admin.businessLoan.update');
    Route::post('businessLoan-delete', 'BusinessLoanController@delete_row')->name('admin.businessLoan.delete');
    Route::post('businessLoan-transation-delete', 'BusinessLoanController@transation_delete_row')->name('admin.businessLoan.tranastion-delete');
    Route::get('businessLoan/{id}/view', 'BusinessLoanController@view_row')->name('admin.businessLoan.view');  
    Route::get('businessLoan/{id}/approve-manage', 'BusinessLoanController@ApproveManage')->name('admin.businessLoan.approve-manage'); 
    Route::get('businessLoan/{id}/disbursement-manage', 'BusinessLoanController@DisbursementManage')->name('admin.businessLoan.disbursement-manage');
    Route::get('businessLoan/{id}/statement', 'BusinessLoanController@GetStatement')->name('admin.businessLoan.statements');    
    Route::get('businessLoan/{id}/receipt', 'BusinessLoanController@GetReceipt')->name('admin.businessLoan.receipt');  

     Route::get('businessLoan/{id}/transactions', 'BusinessLoanController@Get_transactions')->name('admin.businessLoan.transactions');  
    
    Route::post('businessLoan-status', 'BusinessLoanController@updateStatus')->name('admin.businessLoan.status');
    Route::get('businessLoan/{id}/manage', 'BusinessLoanController@Manage')->name('admin.businessLoan.manage');
    Route::get('businessLoan/{id}/payout', 'BusinessLoanController@view_emilist')->name('admin.businessLoan.emilist');  

    Route::get('businessLoan/{id}/acknowledgement', 'BusinessLoanController@view_Acknowledgement')->name('admin.acknowledgement.index');  

    Route::get('businessLoan/{id}/loanAgreement', 'BusinessLoanController@view_LoanAgreement')->name('admin.loanAgreement.index');  
    Route::post('businessLoan/loanAgreement-store', 'BusinessLoanController@Store_LoanAgreement')->name('admin.loanAgreement.store');  

    Route::get('businessLoan/{id}/loanAgreement-doc', 'BusinessLoanController@view_LoanAgreementDoc')->name('admin.loanAgreement.doc');  
    Route::get('businessLoan/{id}/santionLetter', 'BusinessLoanController@view_santionLetter')->name('admin.businessLoan.santionLetter');  
    Route::get('businessLoan/{id}/presantionLetter', 'BusinessLoanController@view_pre_santionLetter')->name('admin.businessLoan.presantionLetter');  
    

     Route::get('businessLoan/{id}/nominee', 'BusinessLoanController@NomineeView')->name('admin.businessLoan.nominee');  
    Route::post('businessLoan/nominee-store', 'BusinessLoanController@NomineeStore')->name('admin.businessLoan.nominee-store'); 

    Route::get('businessLoan/{id}/update-agent', 'BusinessLoanController@GetUpdateAgent')->name('admin.businessLoan.update-agent');  
    Route::post('businessLoan/update-agent-store', 'BusinessLoanController@GetUpdateAgentStore')->name('admin.businessLoan.update-agent-store');

    Route::get('businessLoan/{id}/update-collector-agent', 'BusinessLoanController@GetUpdateCollectorAgent')->name('admin.businessLoan.update-collector-agent');  
    Route::post('businessLoan/update-collector-agent-store', 'BusinessLoanController@GetUpdateAgentCollectorStore')->name('admin.businessLoan.update-collector-agent-store');

    Route::get('businessLoan/{id}/disburseManage', 'BusinessLoanController@Getdisburse')->name('admin.businessLoan.disburse-manage');  
    Route::post('businessLoan/disburseManage', 'BusinessLoanController@GetdisburseStore')->name('admin.businessLoan.disburse-manage-store');
    
    
    Route::get('businessLoan/{id}/deposit', 'BusinessLoanController@DepositView')->name('admin.businessLoan.deposit');  
    Route::post('businessLoan-deposit', 'BusinessLoanController@DepositStore')->name('admin.businessLoan.deposit-store');
    
    
    Route::get('businessLoan/{id}/debit_crete_charges', 'BusinessLoanController@DebitCreteCharges')->name('admin.businessLoan.debit_crete_charges');
    Route::post('businessLoan/debit_crete_charges-store', 'BusinessLoanController@DebitCreteChargesStore')->name('admin.businessLoan.debit_crete_charges_store');  


    Route::get('businessLoan/{id}/PartRelease', 'BusinessLoanController@PartReleaseView')->name('admin.businessLoan.PartRelease');  
    Route::post('businessLoan-PartRelease', 'BusinessLoanController@PartReleaseStore')->name('admin.businessLoan.PartRelease-store');
    
    
     Route::get('businessLoan/{id}/blockAccount', 'BusinessLoanController@getblockAccount')->name('admin.businessLoan.blockAccount');  
    Route::post('businessLoan/blockAccount-store', 'BusinessLoanController@blockAccountStore')->name('admin.businessLoan.blockAccount-store'); 
    
    
    Route::get('businessLoan/{id}/unblockAccount', 'BusinessLoanController@getUnblockAccount')->name('admin.businessLoan.unblockAccount');  
    Route::post('businessLoan/unblockAccount-store', 'BusinessLoanController@UnblockAccountStore')->name('admin.businessLoan.unblockAccount-store'); 
    
    Route::get('businessLoan/{id}/link-saving', 'BusinessLoanController@linkSavingAccount')->name('admin.businessLoan.link-saving');  
    Route::post('businessLoan/link-saving-store', 'BusinessLoanController@linkSavingAccountStore')->name('admin.businessLoan.link-saving_store');  
    
    Route::get('businessLoan/{id}/passbook', 'BusinessLoanController@GetPassbook')->name('admin.businessLoan.passbook');
   Route::get('businessLoan/{id}/passbook-fol1', 'BusinessLoanController@GetPassbookFol1')->name('admin.businessLoan.passbook-fol1');  
   Route::get('businessLoan/{id}/passbook-fol2', 'BusinessLoanController@GetPassbookFol2')->name('admin.businessLoan.passbook-fol2');  
   
   Route::get('businessLoan/{id}/closedAccount', 'BusinessLoanController@getClosedAccount')->name('admin.businessLoan.closedAccount');  
   
   Route::get('businessLoan/{id}/reConstruct', 'BusinessLoanController@ReConstructDepositView')->name('admin.businessLoan.ReConstruct');  
    Route::post('businessLoan-reConstruct', 'BusinessLoanController@ReConstruct_EMIUpdate')->name('admin.businessLoan.ReConstruct-store');
    
    /*RD Pending Transation*/
    Route::get('loan-pending-transation', 'LoanPendingTransController@index')->name('admin.loan-pending-transation.index');
    Route::get('loan-pending-transation-list', 'LoanPendingTransController@list')->name('admin.loan-pending-transation.list');
    Route::post('loan-pending-transation-get', 'LoanPendingTransController@get_row')->name('admin.loan-pending-transation.get');
    Route::post('loan-pending-transation-update', 'LoanPendingTransController@update_row')->name('admin.loan-pending-transation.update');
    Route::post('loan-pending-transation-delete', 'RDPendingTransController@delete_row')->name('admin.loan-pending-transation.delete');
  
    Route::get('pending-application', 'PendingApplicationController@index')->name('admin.pending-application.index-pending');
    Route::get('pending-application-list-pending', 'PendingApplicationController@listPending')->name('admin.pending-application.list-pending');

    Route::get('pending-members', 'PendingMembersController@index')->name('admin.pending-members.index-pending');
    Route::get('pending-members-list-pending', 'PendingMembersController@listPending')->name('admin.pending-members.list-pending');
    Route::get('members-apporval/{id}/manager', 'PendingMembersController@memberApprovalView')->name('admin.members.members-apporval');
    Route::post('members-apporval-manager', 'PendingMembersController@updateStatus')->name('admin.members-apporval-manager.update');

    Route::get('pending-voucher', 'PendingVoucherEntryController@index')->name('admin.pending-voucher.index-pending');
    Route::get('pending-voucher-list-pending', 'PendingVoucherEntryController@listPending')->name('admin.pending-application.list-pending');

    Route::get('paymentCollectDeposit', 'PaymentCollectDepositController@index')->name('admin.paymentCollectDeposit.index');
    Route::get('paymentCollectDeposit-pending', 'PaymentCollectDepositController@listPending')->name('admin.paymentCollectDeposit.list-pending');

    Route::get('paymentCollectLoan', 'PaymentCollectLoanController@index')->name('admin.paymentCollectLoan.index');
    Route::get('paymentCollectLoan-pending', 'PaymentCollectLoanController@listPending')->name('admin.paymentCollectLoan.list-pending');    

    Route::get('paymentCollect', 'PaymentCollectController@index')->name('admin.paymentCollect.index');
    Route::get('paymentCollect-pending', 'PaymentCollectController@listPending')->name('admin.paymentCollect.list-pending');    

    Route::get('ProfitnLoss', 'ReportsController@ProfitnLoss_Index')->name('admin.reportsProfitnLoss.index');
    Route::get('BalanceSheet', 'ReportsController@BalanceSheet_Index')->name('admin.reportsBalanceSheet.index');
    
    Route::get('reports', 'ReportsController@index')->name('admin.reports.index');
    
    Route::get('reportSavingAccount', 'ReportsController@SavingAccount_Index')->name('admin.reportSavingAccount.index');
    Route::get('reportSavingAccount-list', 'ReportsController@SavingAccount_list')->name('admin.reportSavingAccount.list');
    
    Route::get('fdAccountView', 'ReportsController@fdAccountView_Index')->name('admin.fdAccountView.index');
    Route::get('fdAccountView-list', 'ReportsController@fdAccountView_list')->name('admin.fdAccountView.list');

    Route::get('rdAccountView', 'ReportsController@rdAccountView_Index')->name('admin.rdAccountView.index');
    Route::get('rdAccountView-list', 'ReportsController@rdAccountView_list')->name('admin.rdAccountView.list');    
    
    Route::get('MISAccount', 'ReportsController@MISAccount_Index')->name('admin.MISAccount.index');
    Route::get('MISAccount-list', 'ReportsController@MISAccount_list')->name('admin.MISAccount.list');    
    
    Route::get('DDAccount', 'ReportsController@DDAccount_Index')->name('admin.DDAccount.index');
    Route::get('DDAccount-list', 'ReportsController@DDAccount_list')->name('admin.DDAccount.list');    
    
    Route::get('PaymentRelease', 'ReportsController@PaymentRelease_Index')->name('admin.PaymentRelease.index');
    Route::get('PaymentRelease-list', 'ReportsController@PaymentRelease_list')->name('admin.PaymentRelease.list');   
    
    /*ledger_group*/
    Route::get('cashbook', 'CashBookController@index')->name('admin.cashbook.index');
    Route::get('cashbook-list', 'CashBookController@list')->name('admin.cashbook.list');
    
    /*CollectionAccountWise*/
    Route::get('collection-account-wise', 'CollectionAccountWiseController@index')->name('admin.CollectionAccountWise.index');
    Route::get('collection-account-wise-list', 'CollectionAccountWiseController@list')->name('admin.CollectionAccountWise.list');
    
     /*CollectionActWiseTran*/
    Route::get('collection-account-wise-tran', 'CollectionActWiseTranController@index')->name('admin.CollectionActWiseTran.index');
    Route::get('collection-account-wise-tran-list', 'CollectionActWiseTranController@list')->name('admin.CollectionActWiseTran.list');
    
      
    /*CollectionAgentWise*/
    Route::get('collection-agent-wise-tran', 'CollectionAgentWiseController@index')->name('admin.CollectionAgentWise.index');
    Route::get('collection-agent-wise-tran/{id}/details', 'CollectionAgentWiseController@AgentTranDetails')->name('collection-agent-wise-tran-details');
    
      /*CashReportUserwise*/
    Route::get('collection-user-wise-tran', 'CashReportUserwiseController@index')->name('admin.CashReportUserwise.index');
    
    
    
    
    
    
    
    
    


    
});

Route::get('/certificate', function () {
  return view('admin.templates.fixedDeposit_calculator.certificate', [
      'data' => [
          'receipt_no' => '1007',
          'certificate_no' => '5266',
          'membership_no' => '5266',
          'branch' => 'NORTH GUWAHATI',
          'city' => 'GUWAHATI',
          'region' => 'GUWAHATI',
          'member_name' => 'NIRANJAN SARMAH',
          'amount' => '60000',
          'amount_in_words' => 'SIXTY THOUSAND ONLY',
          'start_date' => '10/12/2024',
          'maturity_amount' => '60000',
          'interest_monthly' => '600',
          'maturity_date' => '10/12/2025',
      ]
  ]);
});
