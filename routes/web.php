<?php

// Route root
Route::get('/')->middleware('auth');

// Settings Route ( Only for super admin )
Route::get('/setting', 'SettingController@index');
Route::post('/setting/create_tool','SettingController@create');
Route::get('/{id}/setting/deleting_menu', 'SettingController@deleting_menu');
Route::post('/{id}/setting/access','SettingController@access');

// Route for tool activation
Route::get('/setting/dashboardTool', 'SettingController@dashboard');
Route::get('/setting/backOfficeTool', 'SettingController@backoffice');
Route::get('/setting/memberTool', 'SettingController@membertool');



// Route Login
Route::get('/login','AuthController@login');
Route::post('/login','AuthController@postLogin')->name('login');
Route::get('/logout', 'AuthController@logout');

Route::group(['middleware' => 'auth'], function () {

    // Dashboard Route
    Route::get('/dashboard', 'DashboardController@index');
    // Dashboard Super Admin    
    Route::get('/dashboard/{id}/delete', 'AdminController@delete');
    //Route Back Office
    Route::get('/back_office','BackOfficeController@index');
    Route::post('/back_office/update','BackOfficeController@update');
    Route::post('/back_office/delete','BackOfficeController@delete');
    //Route Log Admin Activity
    Route::get('/log_bo','LogBOController@index');
    // Untuk auth register superadmin
    Route::post('/register', 'AdminController@postRegister');
    // Manage admins
    Route::get('/{id}/profile','AdminController@profile');
    Route::post('/{id}/edit','AdminEditController@edit');
    Route::put('/{id}/profile/setting', 'AdminController@access');
    // Routing for load Page's part through ajax
    Route::get('/{id}/partAdminProfile', 'AdminEditController@profileLoad');
    Route::get('/{id}/partAdminProfileEdit', 'AdminEditController@profileEditLoad');

    //Member-------------------------------------------------------------------------------------

    //Route Member data 
    Route::get('/member','MemberController@index');
    Route::get('/member/profil/{uid}','MemberController@profil');
    Route::put('/member/update/{uid}','MemberController@update');
    Route::post('/member/delete/{uid}','MemberController@delete');
    // Route Member data verification
    Route::get('/member/{uid}/review', 'MemberController@review');
    Route::post('/member/{id}/decline', 'MemberController@decline');
    

});





































































































































































































// Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
// Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

// Route::group(['middleware' => 'auth'], function () {
// 	Route::get('table-list', function () {
// 		return view('pages.table_list');
// 	})->name('table');

// 	Route::get('member-list', function () {
// 		return view('member.index');
// 	})->name('member');

// 	Route::get('typography', function () {
// 		return view('pages.typography');
// 	})->name('typography');

// 	Route::get('icons', function () {
// 		return view('pages.icons');
// 	})->name('icons');

// 	Route::get('map', function () {
// 		return view('pages.map');
// 	})->name('map');

// 	Route::get('notifications', function () {
// 		return view('pages.notifications');
// 	})->name('notifications');

// 	Route::get('rtl-support', function () {
// 		return view('pages.language');
// 	})->name('language');

// 	Route::get('upgrade', function () {
// 		return view('pages.upgrade');
// 	})->name('upgrade');
// });

// Route::group(['middleware' => 'auth'], function () {
// 	Route::resource('user', 'UserController', ['except' => ['show']]);
// 	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
// 	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
// 	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
// });

