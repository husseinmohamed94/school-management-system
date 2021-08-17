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

Auth::routes();

Route::group(['middleware'=> ['guest']],function (){

    Route::get('/', function()
    {
        return view('auth.login');
    });

});



Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth' ]
    ], function(){

    Route::get('/dashboard', 'HomeController@index')->name('dashboard');

    Route::group(['namespace'=> 'Grades'],function (){
        Route::resource('Grades', 'GradeController');

    });
    Route::group(['namespace'=> 'Classroom'],function (){
        Route::resource('classroom', 'ClassroomController');
        Route::post('dletet_all', 'ClassroomController@dletet_all')->name('dletet_all');
        Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');

    });

    Route::group(['namespace'=> 'Section'],function (){
        Route::resource('Section', 'SectionController');

        Route::get('classes/{id}','SectionController@getclasses');

    });

    Route::get('test',function (){
        return  view('test_pg');
    });

});









