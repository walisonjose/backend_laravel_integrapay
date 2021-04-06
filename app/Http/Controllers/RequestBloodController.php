<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;

use App\RequestBlood;

class RequestBloodController extends BaseController
{
    //


 //
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requestBlood = RequestBlood::all();


        return $this->sendResponse($requestBlood->toArray(), 'Registros retrieved successfully.');


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



     $input = $request->all();

     $patient_data = $input['patient'];
     $clinical_indication = $input['clinical_indication'];
     $request_blood_exams = $input['request_blood_exams'];
     $type_transfusion = $input['type_transfusion'];
     $request_blood_component = $input['request_blood_component'];
     $procedures = $input['procedures'];
     $others = $input['others'];


     //Salvando o registro do paciente..



        /*$requestBlood = RequestBlood::create($request->all());*/
        return $this->sendResponse($patient_data, 'Solicitação criado com sucesso!.');

    }

}
