<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;

use App\ClinicalIndication;


class ClinicalIndicationController extends BaseController
{
    //


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinicalIndication = ClinicalIndication::all();


        return $this->sendResponse($clinicalIndication->toArray(), 'clinical indications retrieved successfully.');


    }

/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $clinicalIndication = ClinicalIndication::create($request->all());
        return $this->sendResponse($clinicalIndication, 'Indicação clínica criado com sucesso!.');

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
        $clinicalIndication = ClinicalIndication::where('id', $request['id'])->get();

       // var_dump($clinicalIndication );

        if ( count($clinicalIndication) > 0) {

            return $this->sendResponse($clinicalIndication->toArray(), 'Registro encontrado com sucesso!.');


        }else{
            return $this->sendError('Status.', "Registro #{$request['id']} não foi encontrado");
        }
        //return redirect()->back()->withErrors(['error', "Registo #{$id} não foi encontrado"]);

    }


}
