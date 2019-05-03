<?php


Auth::routes();

Route::get('/', 'LandingPageController@index')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('customers','CustomerController');
Route::resource('vouchers','VoucherController');
Route::resource('vouchernames','VoucherNameController');
Route::resource('voucher-validators','VoucherValidatorController');
Route::resource('voucher-register','VoucherRegistrationController');
Route::post('voucher-validators','VoucherValidatorController@checkCode')->name('checkCode');
Route::resource('voucher-validation-results','VoucherValidationResultController');
Route::resource('voucher-lists','VoucherListController');
