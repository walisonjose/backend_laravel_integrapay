<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;
use App\RequestBloodProcedures;


class RequestBloodProceduresController extends BaseController
{
    //

/**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestBloodProcedures = RequestBloodProcedures::create($request->all());
        if($requestBloodProcedures){
            return $this->sendResponse($requestBloodProcedures, 'Registro criado com sucesso!.');
        }else{
            return $this->sendError('Status.', "Ocorreu algum problema!");
        }


    }


}
