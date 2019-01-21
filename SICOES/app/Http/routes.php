<?php


use siap\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



//ERRORES 

Route::get('error', function(){ 
    abort(500);
    abort(503);
    abort(404);
    abort(403);
});



//Vistas para usuarios sin logearse
Route::group(['middleware' => 'guest'], function () {
    Route::get('/','Auth\AuthController@getLogin');
    Route::get('login', 'Auth\AuthController@getLogin');
    Route::post('login', ['as' =>'login', 'uses' => 'Auth\AuthController@postLogin']); 
    
    //Deben desbloquearse en caso de registrar un nuevo usuario
    #Route::get('register', 'Auth\AuthController@getRegister');
    #Route::get('register', 'Auth\AuthController@tregistro'); 
    #Route::post('register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);

});



//Vistas comunes para los dos tipos de usuarios
Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'HomeController@index');
    Route::get('home', 'HomeController@index');
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@getLogout']);
   
   //Calcular credito
   Route::get('calcular-credito/imprimir','calcularCreditoController@generarPDF');
   Route::resource('calcular-credito','calcularCreditoController');

   //Tasa de interes
   Route::resource('tasa-interes','TasaInteresController');
   
});

//Vistas para usuarios tipo ADMINISTRADOR
Route::group(['middleware' => 'usuarioAdmin'], function () {
  Route::resource('usuario','UsuarioController');

});


//Vistas para usuarios tipo EMPLEADO
Route::group(['middleware' => 'usuarioEmpleado'], function () { 
         //Credito nuevo

});