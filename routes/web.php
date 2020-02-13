<?php

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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

	Route::get('/home', 'HomeController@index')->name('home');
	Route::get('/admin_dashboard', 'HomeController@index')->name('admin_dashboard');

	//Route for Getting Roles and Specific Role
	Route::get('/get_roles','Api\UserController@getRoles')->name('get_roles');

	Route::get('/get_total_service_provider','Api\ServiceProviderController@countServiceProviders')->name('count_service_provider');

	Route::get('/ownerhome', 'HomeController@owner')->name('ownerhome');
	Route::get('/ownerprofile', 'HomeController@ownerprofile')->name('service_provider_profile');

	Route::get('/cleanerhome', 'HomeController@cleaner')->name('cleanerhome');
	Route::get('/clienthome', 'HomeController@client')->name('clienthome');

	Route::get('/service_providers', 'PageController@service_providers');
	Route::get('/cleaners', 'PageController@cleaners');
		
	Route::get('/client_report', 'PageController@client_report');
	Route::get('/cleaner_report', 'PageController@cleaner_report');
	Route::get('/service_provider_report', 'PageController@service_provider_report');
	Route::get('/admin_report', 'PageController@admin_report');

	Route::get('/schedules', 'PageController@schedules');
	Route::get('/messages', 'PageController@messages');
	Route::get('/notifications', 'PageController@notifications');
	Route::get('/services', 'PageController@services');
	Route::get('/pending_requests', 'PageController@pending_requests');
	Route::get('/manage_accounts', 'PageController@manage_accounts');
	Route::get('/service_provider_services', 'PageController@service_provider_services');
	Route::get('/client_service_provider', 'PageController@client_service_provider');
	
	Route::get('/page_clients', 'PageController@clients');

	Route::resource('/client', 'Api\ClientController');

	Route::get('/page_profile', 'PageController@profile');
	Route::get('/page_change_password', 'PageController@change_password');

	Route::get('/cleaner_booking', 'PageController@cleaner_booking');
	Route::get('/client_booking', 'PageController@client_booking');
	Route::get('/service_provider_booking', 'PageController@service_provider_booking');

	Route::get('contact', 'Api\ContactController@index');
	Route::get('get_message/{id}', 'Api\MessageController@get_message');

	Route::post('send_message/{id}', 'Api\MessageController@send_message');
	Route::get('get_user_id', 'Api\MessageController@get_user_id');


	Route::resource('user', 'Api\UserController');
	Route::resource('admin', 'Api\AdminController');
	Route::resource('cleaner', 'Api\CleanerController');
	Route::resource('service_provider', 'Api\ServiceProviderController');
	Route::resource('day', 'Api\DaysController');
	Route::resource('schedule', 'Api\ScheduleController');

	Route::resource('service_provider_service', 'Api\ServiceProviderServiceController');

	Route::resource('service', 'Api\ServiceController');
	Route::get('/service/cleaner/{id}', 'Api\ServiceController@select_cleaner');

	//Service Provider Requests
	Route::post('send_business_request', 'ServiceProviderController@store');
	Route::get('pending_request', 'Api\AdminController@pending_requests');
	// Route::get('change_password', 'Api\AdminController@change_password');

	Route::put('approved_service_provider/{id}', 'Api\ServiceProviderController@approved');
	Route::put('decline_service_provider/{id}', 'Api\ServiceProviderController@approved');

	Route::get('cleaner_service', 'Api\ServiceController@cleaner_service');

	Route::get('service_cleaners/{service_id}', 'Api\ServiceCleanerController@service_cleaners');
	Route::get('cleaner_schedules/{cleaner_id}/{service_id}', 'Api\ServiceCleanerController@cleaner_schedules');


	Route::post('store_book', 'Api\BookingController@store');


	Route::get('get_client_schedules', 'Api\ClientScheduleController@get_client_schedules');
	Route::get('get_cleaner_schedules', 'Api\ClientScheduleController@get_cleaner_schedules');

	Route::get('approve_schedule/{id}', 'Api\ClientScheduleController@approve');
	Route::get('complete_schedule/{id}', 'Api\ClientScheduleController@complete');
	Route::get('reject_schedule/{id}', 'Api\ClientScheduleController@reject');

	Route::get('cancel_schedule/{id}', 'Api\ClientScheduleController@cancel');
	Route::get('remove_schedule/{id}', 'Api\ClientScheduleController@remove');


	Route::put('time_in/{id}', 'Api\ClientScheduleController@time_in');
	Route::put('time_out/{id}', 'Api\ClientScheduleController@time_out');
	Route::put('rate/{id}', 'Api\ClientScheduleController@rate');

	Route::get('get_sunday', 'Api\ScheduleController@sunday');
	Route::get('get_monday', 'Api\ScheduleController@monday');
	Route::get('get_tuesday', 'Api\ScheduleController@tuesday');
	Route::get('get_wednesday', 'Api\ScheduleController@wednesday');
	Route::get('get_thursday', 'Api\ScheduleController@thursday');
	Route::get('get_friday', 'Api\ScheduleController@friday');
	Route::get('get_saturday', 'Api\ScheduleController@saturday');

	Route::put('activate/{id}', 'Api\UserController@activate');
	Route::put('deactivate/{id}', 'Api\UserController@deactivate');

	Route::get('new_user_notifs', 'Api\NotificationController@new_user_notifs');
	Route::get('get_user_notifs', 'Api\NotificationController@get_user_notifs');

	Route::get('new_user_messages', 'Api\MessageController@new_user_messages');

	Route::resource('profile', 'Api\ProfileController');

	Route::resource('block', 'BlockedUserController');
	Route::post('change_password', 'Api\UserController@change_password');

	Route::get('get_service_provider_booking', 'Api\BookingController@service_provider_booking');

	Route::put('rate_client/{id}', 'Api\ClientScheduleController@rate_client');

	Route::post('admin_create_report', 'ReportController@admin_create_report');

	Route::get('d_client_report', 'ReportController@client_report');
	Route::get('d_cleaner_report', 'ReportController@cleaner_report');
	Route::get('d_service_provider_report', 'ReportController@service_provider_report');
	Route::get('d_admin_report', 'ReportController@admin_report');
	Route::get('d_ccse_report', 'ReportController@ccse');


	Route::post('client_create_report', 'ReportController@client_create_report');
	Route::post('cleaner_create_report', 'ReportController@cleaner_create_report');


});