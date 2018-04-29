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

Route::group(['middleware' => ['guest']], function () {

    //
    Route::get('/','Auth\LoginController@showLoginForm');

Route::post('/login', 'Auth\LoginController@login')->name('login');

});


Route::group(['middleware' => ['auth']], function () {

    
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
    


    Route::group(['middleware' => ['Administrador']], function () {

        //

        Route::get('/persona','PersonaController@index');
        Route::post('/persona/registrar','PersonaController@store');
        Route::put('/persona/actualizar','PersonaController@update');
        Route::put('/persona/desactivar','PersonaController@desactivar');
        Route::put('/persona/activar','PersonaController@activar');

        Route::get('/rol','RolController@index');
        Route::get('/rol/selectRol','RolController@selectRol');
        
        Route::get('/user','UserController@index');
        Route::post('/user/registrar','UserController@store');
        Route::put('/user/actualizar','UserController@update');
        Route::put('/user/desactivar','UserController@desactivar');
        Route::put('/user/activar','UserController@activar');



    });

    Route::group(['middleware' => ['Empleado']], function () {

        //

        Route::get('/persona','PersonaController@index');
        Route::post('/persona/registrar','PersonaController@store');
        Route::put('/persona/actualizar','PersonaController@update');
        Route::put('/persona/desactivar','PersonaController@desactivar');
        Route::put('/persona/activar','PersonaController@activar');




    });

    //

    Route::get('/main', function () {
        return view('contenido/contenido');
    
    })->name('main');
    

    
    

   

});






//Route::get('/home', 'HomeController@index')->name('home');

