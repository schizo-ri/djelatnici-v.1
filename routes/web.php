<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Index page
Route::get('/', ['as' => 'index', 'uses' => 'IndexController@index']);
// Home page
Route::get('home', ['as' => 'home', 'uses' => 'User\HomeController@index']);

// Authorization
Route::get('login', ['as' => 'auth.login.form', 'uses' => 'Auth\SessionController@getLogin']);
Route::post('login', ['as' => 'auth.login.attempt', 'uses' => 'Auth\SessionController@postLogin']);
Route::get('logout', ['as' => 'auth.logout', 'uses' => 'Auth\SessionController@getLogout']);

// Registration
Route::get('register', ['as' => 'auth.register.form', 'uses' => 'Auth\RegistrationController@getRegister']);
Route::post('register', ['as' => 'auth.register.attempt', 'uses' => 'Auth\RegistrationController@postRegister']);

// Activation
Route::get('activate/{code}', ['as' => 'auth.activation.attempt', 'uses' => 'Auth\RegistrationController@getActivate']);
Route::get('resend', ['as' => 'auth.activation.request', 'uses' => 'Auth\RegistrationController@getResend']);
Route::post('resend', ['as' => 'auth.activation.resend', 'uses' => 'Auth\RegistrationController@postResend']);

// Password Reset
Route::get('password/reset/{code}', ['as' => 'auth.password.reset.form', 'uses' => 'Auth\PasswordController@getReset']);
Route::post('password/reset/{code}', ['as' => 'auth.password.reset.attempt', 'uses' => 'Auth\PasswordController@postReset']);
Route::get('password/reset', ['as' => 'auth.password.request.form', 'uses' => 'Auth\PasswordController@getRequest']);
Route::post('password/reset', ['as' => 'auth.password.request.attempt', 'uses' => 'Auth\PasswordController@postRequest']);



/*############# ADMIN ##############*/
Route::group(['prefix' => 'admin'], function () {
  // Dashboard
  Route::get('/', ['as' => 'admin.dashboard', 'uses' => 'Admin\DashboardController@index']);
  // Users
  Route::resource('users', 'Admin\UserController');
  // Roles
  Route::resource('roles', 'Admin\RoleController');
  //
  Route::resource('posts', 'Admin\PostController', ['names' => [
  'index' 		=> 'admin.posts.index', 
  'create' 		=> 'admin.posts.create', 
  'store' 		=> 'admin.posts.store', 
  'show' 		=> 'admin.posts.show', 
  'edit' 		=> 'admin.posts.edit', 
  'update'		=> 'admin.posts.update', 
  'destroy'		=> 'admin.posts.destroy'
  ]]);
  Route::resource('employees', 'Admin\EmployeeController', ['names' => [
  'index' 		=> 'admin.employees.index', 
  'create' 		=> 'admin.employees.create', 
  'store' 		=> 'admin.employees.store', 
  'show' 		=> 'admin.employees.show', 
  'edit' 		=> 'admin.employees.edit', 
  'update'		=> 'admin.employees.update', 
  'destroy'		=> 'admin.employees.destroy'
  ]]);
  Route::resource('equipments', 'Admin\EquipmentController', ['names' => [
  'index' 		=> 'admin.equipments.index', 
  'create' 		=> 'admin.equipments.create', 
  'store' 		=> 'admin.equipments.store', 
  'show' 		=> 'admin.equipments.show', 
  'edit' 		=> 'admin.equipments.edit', 
  'update'		=> 'admin.equipments.update', 
  'destroy'		=> 'admin.equipments.destroy'
  ]]);
  Route::resource('employee_terminations', 'Admin\EmployeeTerminationController', ['names' => [
  'index' 		=> 'admin.employee_terminations.index', 
  'create' 		=> 'admin.employee_terminations.create', 
  'store' 		=> 'admin.employee_terminations.store', 
  'show' 		=> 'admin.employee_terminations.show', 
  'edit' 		=> 'admin.employee_terminations.edit', 
  'update'		=> 'admin.employee_terminations.update', 
  'destroy'		=> 'admin.employee_terminations.destroy'
  ]]);
  Route::resource('terminations', 'Admin\TerminationController', ['names' => [
  'index' 		=> 'admin.terminations.index', 
  'create' 		=> 'admin.terminations.create', 
  'store' 		=> 'admin.terminations.store', 
  'show' 		=> 'admin.terminations.show', 
  'edit' 		=> 'admin.terminations.edit', 
  'update'		=> 'admin.terminations.update', 
  'destroy'		=> 'admin.terminations.destroy'
  ]]);
  Route::resource('kids', 'Admin\KidController', ['names' => [
  'index' 		=> 'admin.kids.index', 
  'create' 		=> 'admin.kids.create', 
  'store' 		=> 'admin.kids.store', 
  'show' 		=> 'admin.kids.show', 
  'edit' 		=> 'admin.kids.edit', 
  'update'		=> 'admin.kids.update', 
  'destroy'		=> 'admin.kids.destroy'
  ]]);
  Route::resource('works', 'Admin\WorkController', ['names' => [
  'index' 		=> 'admin.works.index', 
  'create' 		=> 'admin.works.create', 
  'store' 		=> 'admin.works.store', 
  'show' 		=> 'admin.works.show', 
  'edit' 		=> 'admin.works.edit', 
  'update'		=> 'admin.works.update', 
  'destroy'		=> 'admin.works.destroy'
  ]]);
  Route::resource('registrations', 'Admin\RegistrationController', ['names' => [
  'index' 		=> 'admin.registrations.index', 
  'create' 		=> 'admin.registrations.create', 
  'store' 		=> 'admin.registrations.store', 
  'show' 		=> 'admin.registrations.show', 
  'edit' 		=> 'admin.registrations.edit', 
  'update'		=> 'admin.registrations.update', 
  'destroy'		=> 'admin.registrations.destroy'
  ]]);
  Route::resource('employee_equipments', 'Admin\EmployeeEquipmentController', ['names' => [
  'index' 		=> 'admin.employee_equipments.index', 
  'create' 		=> 'admin.employee_equipments.create', 
  'store' 		=> 'admin.employee_equipments.store', 
  'show' 		=> 'admin.employee_equipments.show', 
  'edit' 		=> 'admin.employee_equipments.edit', 
  'update'		=> 'admin.employee_equipments.update', 
  'destroy'		=> 'admin.employee_equipments.destroy'
  ]]);
});

// Post page
Route::post('/comment/store', ['as' => 'comment.store', 'uses' => 'IndexController@storeComment']);
Route::get('/{slug}', ['as' => 'post.show', 'uses' => 'IndexController@show']);

//pdf_add_annotation
Route::get('/generate_pdf/{employee_id}','Admin\RegistrationController@generate_pdf');

//pdf_Prijava
Route::get('/generate_pdf/{employee_id}','Admin\EmployeeController@generate_pdf');
//pdf_Liječnički
Route::get('/lijecnicki_pdf/{employee_id}','Admin\EmployeeController@lijecnicki_pdf');
//pdf_Zaduženje
Route::get('/zaduzenje_pdf/{employee_id}','Admin\EmployeeEquipmentController@zaduzenje_pdf');

//excel - ne radi
Route::get('/getExport','ExcelController@getExport');

