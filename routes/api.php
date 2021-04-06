<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
return $request->user();
});

Route::post('/register', 'AuthController@register');

Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');

Route::get('/clientes', 'CustomersController@');
 */

//Route::post('login', 'API\RegisterController@login');
//Route::post('register', 'API\RegisterController@register');

//Route::post('details', 'API\RegisterController@details');

//Route::post('test', 'API\RegisterController@test');

/*Route::middleware('auth:api')->group( function () {
Route::post('details', 'API\RegisterController@details');
Route::resource('customers', 'API\CustomersController');
});*/

Route::post('login', 'API\RegisterController@login');
Route::post('register', 'API\RegisterController@register');
Route::post('searchuser', 'GitHub@searchGitHubUser');
Route::get('allprofiles', 'GitHub@index');

Route::group(['middleware' => 'auth:api'], function () {

    Route::post('details', 'API\RegisterController@details');
    Route::post('test', 'API\RegisterController@test');
    Route::post('clients', 'CustomersController@index');
    Route::post('procedures', 'ProceduresController@index');
    Route::post('bloodcomponent', 'BloodComponentsController@index');

//Rotas para entregadores
    Route::post('setlocation', 'DeliverymanController@setLocation');
    Route::post('getlocation', 'DeliverymanController@getLocation');

//Rotas para hospitais
    Route::post('hospitals', 'HospitalController@index');
    Route::post('hospitalstore', 'HospitalController@store');
    Route::post('hospitalupdate', 'HospitalController@update');
    Route::post('hospitaldelete', 'HospitalController@destroy');
    Route::post('hospitalbyuser', 'API\RegisterController@hospitalByUser');
    Route::post('doctorbyhospital', 'API\RegisterController@doctorByHospital');

//Rotas para pacientes
    Route::post('patients', 'PatientController@index');
    Route::post('patientstore', 'PatientController@store');
    Route::get('patient_id', 'PatientController@details');

//Rotas para indicação clínica
    Route::post('clinicals', 'ClinicalIndicationController@index');
    Route::post('clinicalstore', 'ClinicalIndicationController@store');
    Route::get('clinical_id', 'ClinicalIndicationController@details');

//Rotas para exames
    Route::post('exams', 'ControllerBloodExams@index');
    Route::post('examstore', 'ControllerBloodExams@store');
    Route::get('exams_id', 'ControllerBloodExams@details');

//Rotas para tipos de transfusão
    Route::post('typetransfusion', 'ControllerTypeTransfusion@index');
    Route::post('typetransfusionstore', 'ControllerTypeTransfusion@store');
    Route::get('typetransfusion_id', 'ControllerTypeTransfusion@details');

//Rotas para tipos de status de requisição
    Route::post('statusrequest', 'StatusRequestController@index');
    Route::post('statusrequeststore', 'StatusRequestController@store');
    Route::get('statusrequest_id', 'StatusRequestController@details');

//Rotas para todas as requisição
    Route::post('bloodrequests', 'RequestBloodController@index');
    Route::post('bloodrequeststore', 'RequestBloodController@store');

});
