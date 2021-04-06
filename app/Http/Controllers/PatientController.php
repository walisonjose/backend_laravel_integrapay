<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;

use App\Patient;


class PatientController extends BaseController
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patient = Patient::all();


        return $this->sendResponse($patient->toArray(), 'patients retrieved successfully.');


    }

/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patient = Patient::create($request->all());
        return $this->sendResponse($patient, 'paciente criado com sucesso!.');

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function details(Request $request)
    {
        $patient = Patient::where('id', $request['id'])->get();

       // var_dump($clinicalIndication );

        if ( count($patient) > 0) {

            return $this->sendResponse($patient->toArray(), 'Registro encontrado com sucesso!.');


        }else{
            return $this->sendError('Status.', "Registro #{$request['id']} não foi encontrado");
        }
        //return redirect()->back()->withErrors(['error', "Registo #{$id} não foi encontrado"]);

    }



}
