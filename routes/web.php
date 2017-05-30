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

Route::get('/', 'HomeController@login')->name('login'); //Pagina Login

Auth::routes();

Route::group(['middleware' => 'auth'], function()
{
    //Auto Complete
    Route::get('/home/folks/physicalperson/autocomplete', array('as'=>'autocomplete_address', 'uses'=>'system\folks\PhysicalPersonController@autocomplete_address')); //Autocomplete Physical Person
    Route::get('/home/institutional/secretary/autocomplete', array('as'=>'autocomplete_prefecture', 'uses'=>'system\institutional\Secretary@autocomplete_prefecture')); //Autocomplete Secretary
    Route::get('/home/institutional/sector/autocomplete', array('as'=>'autocomplete_secretary', 'uses'=>'system\institutional\Sector@autocomplete_secretary'));
    Route::get('/home/rh/employee/autocomplete', array('as'=>'autocomplete_physicalperson', 'uses'=>'system\rh\Employee@autocomplete_physicalperson'));
    Route::get('/home/rh/user/autocomplete', array('as'=>'autocomplete_employee', 'uses'=>'system\rh\User@autocomplete_employee'));
    Route::get('/home/educational/school/autocomplete', array('as'=>'autocomplete_legalperson', 'uses'=>'system\educational\School@autocomplete_legalperson'));
    Route::get('/home/educational/lesson/autocomplete', array('as'=>'autocomplete_school', 'uses'=>'system\educational\Lesson@autocomplete_school'));

    //Index Modulos
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/folks', 'HomeController@folks');
    Route::get('/home/institutional', 'HomeController@institutional');
    Route::get('/home/rh', 'HomeController@rh');
    Route::get('/home/educational', 'HomeController@educational');

    //Resources
    Route::resource('/home/address', 'system\address\Address');
    Route::resource('/home/folks/physicalperson', 'system\folks\PhysicalPersonController');
    Route::resource('/home/folks/legalperson', 'system\folks\LegalPerson');
    Route::resource('/home/institutional/prefecture', 'system\institutional\Prefecture');
    Route::resource('/home/institutional/secretary', 'system\institutional\Secretary');
    Route::resource('/home/institutional/sector', 'system\institutional\Sector');
    Route::resource('/home/rh/employee', 'system\rh\Employee');
    Route::resource('/home/rh/user', 'system\rh\User');
    Route::resource('/home/educational/course', 'system\educational\Course');
    Route::resource('/home/educational/school', 'system\educational\School');
    Route::resource('/home/educational/lesson', 'system\educational\Lesson');
    Route::resource('/home/educational/discipline', 'system\educational\Discipline');
    Route::resource('/home/educational/serie', 'system\educational\Serie');
});