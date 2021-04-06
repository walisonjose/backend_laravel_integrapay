<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;
use App\RequestBloodComponent;

class RequestBloodComponentController extends BaseController
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
        $requestBloodComponent = RequestBloodComponent::create($request->all());
        if($requestBloodComponent){
            return $this->sendResponse($requestBloodComponent, 'Registro criado com sucesso!.');
        }else{
            return $this->sendError('Status.', "Ocorreu algum problema!");
        }


    }


}
