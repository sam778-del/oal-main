<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommonsController;
use Illuminate\Support\Facades\Session;

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

Route::get('/', 'HomesController@index');
Route::post('/', 'HomesController@index')->name('home');
Route::get('index.html', 'HomesController@index');
Route::get('/who-we-are.html', 'HomesController@whoWeAre');
Route::get('/corporate-values.html', 'HomesController@corporateValues');
Route::get('/methdology.html', 'HomesController@methdology');
Route::get('/newsletter.html', 'HomesController@newsletter');
Route::get('/newsletter-details.html/{slug}', 'HomesController@newsletterDetails');
Route::post('/disclaimer', 'HomesController@disclaimer')->name('disclaimer');



Route::get('/storagelink', function(){
    \Artisan::call('storage:link');
    return "Se han vinculado las imágenes";
});

///Common Function START
Route::get('/selectBoxStateList', 'CommonsController@state');
Route::post('/checkLoginCredentials', 'CommonsController@checkLoginCredentials');
Route::post('/resendOtp', 'CommonsController@resendOtp');
Route::post('/otpCheck', 'CommonsController@otpCheck');
Route::post('/gaotpCheck', 'CommonsController@gaotpCheck');
Route::post('/registerOtpCheck', 'CommonsController@registerOtpCheck');
Route::get('/checkEmailExist', 'CommonsController@checkEmailExist');
Route::get('/logout', 'Auth\LoginController@logout');
Route::post('/sessionCheckingLogin', 'CommonsController@sessionCheckingLogin');
Route::post('/session/clear', function() {
    Auth::logout();
    Session::flush();
    return redirect('auth/login');    
});

///Common Function END

Auth::routes();
Auth::routes(['verify' => true]);






//its Commen with loged user only
Route::group(['middleware' => ['auth', 'verified']], function() {

    Route::get('/denied', 'CommonsController@denied');
    Route::get('/verify', 'CommonsController@verify');
    Route::get('/landing', 'CommonsController@landing');
    Route::post('/ssdocumentUpload', 'CommonsController@ssdocumentUpload');
    Route::post('/ssdocumentRemove', 'CommonsController@ssdocumentRemove');

    Route::get('/investor/subscriptionCreate', 'InvestorController@subscriptionInitialCreate');
    Route::post('/investor/subscriptionSave', 'InvestorController@subscriptionSave');
    Route::post('/investor/subscriptionSaveDraft', 'InvestorController@subscriptionSaveDraft');
    Route::get('/investor/signedPdfDownload', 'InvestorController@signedPdfDownload');

});

Route::group(['middleware' => ['auth', 'verified', 'admin_check', 'set_view_variables']], function() {

	//Admin
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::get('/deactive-invester', 'UserController@investerDeactive');
    Route::get('/userChangePassword/{id}', 'UserController@userChangePassword');
    Route::post('/userChangePasswordSave/{id}', 'UserController@userChangePasswordSave');
    Route::post('/disable2FaUser', 'UserController@disable2FaUser');
    Route::get('/enable2FaUser/{id}', 'UserController@enable2FaUser');
    Route::post('/enable2FaUserSave/{id}', 'UserController@enable2FaUserSave');
    Route::post('/deactiveuser', 'UserController@deactiveUser');
    Route::post('/activeuser', 'UserController@activeUser');
    
    Route::resource('permissions','PermissionController');
    Route::resource('flashmsgs','FlashmsgController');

    Route::get('/messages', 'MessageController@index');
    Route::get('/messages/create', 'MessageController@create');
    Route::post('/messages/setpTwo', 'MessageController@setpTwo');
    Route::post('/messages/confirm', 'MessageController@confirm');
    Route::get('/messages/show/{id}', 'MessageController@show');


    Route::get('/dashboard', 'AdminController@dashboard');
    Route::resource('prices','PriceController');
    Route::resource('newsletters','NewsletterController');

    Route::resource('trackrecords','TrackrecordController');
    
    /*Route::get('/trackrecords', 'TrackrecordController@index');
    Route::get('/trackrecords/create', 'TrackrecordController@create');
    Route::get('/trackrecords/show/{id}', 'TrackrecordController@show');
    Route::post('/trackrecordCreate', 'TrackrecordController@trackrecordCreate');
    Route::post('/trackrecordUpdate', 'TrackrecordController@trackrecordUpdate');
    Route::get('/trackrecords/delete/{id}', 'TrackrecordController@delete');
*/

    Route::get('/draft', 'AdminController@draft');
    Route::get('/pending', 'AdminController@pending');
    Route::get('/pendingFunding', 'AdminController@pendingFunding');
    Route::get('/active', 'AdminController@active');
    Route::get('/deactive', 'AdminController@deactive');
    Route::get('/rejected', 'AdminController@rejected');

    Route::get('/matured', 'AdminController@matured');
    Route::get('/maturedRequest', 'AdminController@maturedRequest');

    Route::get('/reinvestment', 'AdminController@reinvestment');
    Route::get('/reinvestmentRequest', 'AdminController@reinvestmentRequest');

    Route::get('/subscriptionView/{id}', 'AdminController@subscriptionView');
    Route::get('/subscriptionCreate/{id}', 'AdminController@subscriptionCreate');
    Route::get('/subscriptionEdit/{id}', 'AdminController@subscriptionEdit');
    Route::post('/subscriptionSave', 'AdminController@subscriptionSave');
    Route::post('/subscriptionSaveDraft', 'AdminController@subscriptionSaveDraft');
    Route::post('/subscriptionEditSave', 'AdminController@subscriptionEditSave');
    Route::post('/subscriptionEditSaveDraft', 'AdminController@subscriptionEditSaveDraft');

    Route::post('/changeStatus', 'AdminController@changeStatus');
    Route::post('/contractUpdate', 'AdminController@contractUpdate');
    Route::post('/investmentDetailsUpdate', 'AdminController@investmentDetailsUpdate');
    Route::post('/manualSignedDocumentUpload', 'AdminController@manualSignedDocumentUpload');
    Route::post('/documentUpload', 'AdminController@documentUpload');
    Route::post('/bankSlipConfirmEmail', 'AdminController@bankSlipConfirmEmail');
    Route::post('/bankDetailsUpdate', 'AdminController@bankDetailsUpdate');
    
    //Route::post('/investerActive', 'AdminController@investerActive');
    //Route::post('/investerDeactive', 'AdminController@investerDeactive');

    Route::get('/settings', 'AdminController@settings');
    Route::post('/changePassword', 'AdminController@changePassword');
    Route::post('/enable2Fa', 'AdminController@enable2Fa');
    Route::post('/disable2Fa', 'AdminController@disable2Fa');
    Route::post('/master', 'AdminController@masterSettings');


    Route::get('/signedPdf/{id}', 'AdminController@signedPdf');
    Route::get('/bankPdf/{id}', 'AdminController@bankPdf');

    Route::post('/redemptionUpdate', 'AdminController@redemptionUpdate');
    Route::get('/autoGenerateInvestment', 'AdminController@autoGenerateInvestment');
    
});



    
Route::group(['middleware' => ['auth', 'verified','subcription_check', 'set_view_variables']], function() {

    //Investor   
    Route::get('/investor/dashboard', 'InvestorController@dashboard');

    Route::post('/investor/redemptionUpload', 'InvestorController@redemptionUpload');
    Route::get('/investor/reinvestRequest/{id}', 'InvestorController@reinvestRequest');

    Route::get('/investor/uploadBankslip', 'InvestorController@uploadBankslip');
    Route::post('/investor/uploadBankslipSave', 'InvestorController@uploadBankslipSave');
    Route::post('/investor/changeBankDetailsUpload', 'InvestorController@changeBankDetailsUpload');
    
    Route::get('/investor/profile', 'InvestorController@profile');
    Route::get('/investor/subscriptions', 'InvestorController@subscriptions');
    Route::get('/investor/subscriptionView/{id}', 'InvestorController@subscriptionView');
    Route::get('/investor/subscriptionEdit/{id}', 'InvestorController@subscriptionEdit');
    Route::get('/investor/subscriptionAdditionCreate', 'InvestorController@subscriptionAdditionCreate');

    Route::post('/investor/subscriptionEditSave', 'InvestorController@subscriptionEditSave');
    Route::post('/investor/subscriptionEditSaveDraft', 'InvestorController@subscriptionEditSaveDraft');


    Route::get('/investor/newsletters', 'InvestorController@newsletters');
    Route::get('/investor/newsletterShow/{id}', 'InvestorController@newsletterShow');

    Route::get('/investor/messages', 'InvestorController@messages');
    Route::get('/investor/messagesShow/{id}', 'InvestorController@messagesShow');
    
    Route::get('/investor/flashmsgs', 'InvestorController@flashmsgs');
    Route::get('/investor/flashmsgView/{id}', 'InvestorController@flashmsgView');

    Route::get('/investor/settings', 'InvestorController@settings');

    Route::post('/investor/changePassword', 'InvestorController@changePassword');
    Route::post('/investor/enable2Fa', 'InvestorController@enable2Fa');
    Route::post('/investor/disable2Fa', 'InvestorController@disable2Fa');

    Route::get('/investor/signedPdf/{id}', 'InvestorController@signedPdf');
    Route::get('/investor/bankPdf/{id}', 'InvestorController@bankPdf');

});