<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;

use App\BloodExams;

class ControllerBloodExams extends BaseController
{
    //


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloodExams = BloodExams::all();


        return $this->sendResponse($bloodExams->toArray(), 'Registros retrieved successfully.');


    }

/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bloodExams = BloodExams::create($request->all());
        return $this->sendResponse($bloodExams, 'Registro criado com sucesso!.');

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
        $bloodExams = BloodExams::where('id', $request['id'])->get();

       // var_dump($clinicalIndication );

        if ( count($bloodExams) > 0) {

            return $this->sendResponse($bloodExams->toArray(), 'Registro encontrado com sucesso!.');


        }else{
            return $this->sendError('Status.', "Registro #{$request['id']} não foi encontrado");
        }
        //return redirect()->back()->withErrors(['error', "Registo #{$id} não foi encontrado"]);

    }

}
