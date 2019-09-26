<?php


// Route Login
Route::get('/login','AuthController@login');
Route::post('/login','AuthController@postLogin')->name('login');
Route::get('/logout', 'AuthController@logout');

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['middleware' => 'auth'], function () {

    //Route Back Office
    Route::get('/back_office','BackOfficeController@index');
    Route::post('/back_office/update','BackOfficeController@update');
    Route::post('/back_office/delete','BackOfficeController@delete');
    //Route Member
    Route::get('/member','MemberController@index');
    Route::get('/member/profil/{uid}','MemberController@profil');
    Route::put('/member/update/{uid}','MemberController@update');
    Route::post('/member/delete/{uid}','MemberController@delete');
    //Route Log Admin Activity
    Route::get('/log_bo','LogBOController@index');
    // Auth::routes();
    // Untuk auth register superadmin
    Route::post('/register', 'AdminController@postRegister');
    // Manage admins
    Route::get('/back_office/{id}/delete', 'AdminController@delete');
    Route::get('/{id}/profile','AdminController@profile');
    Route::post('/{id}/edit','AdminEditController@edit');
    // Routing for load Page's part through ajax
    Route::get('/{id}/partAdminProfile', 'AdminEditController@profileLoad');
    Route::get('/{id}/partAdminProfileEdit', 'AdminEditController@profileEditLoad');

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

