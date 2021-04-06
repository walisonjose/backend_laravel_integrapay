<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;
use App\RequestBloodLogs;

class RequestBloodLogsController extends BaseController
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
        $requestBloodLogs = RequestBloodLogs::create($request->all());
        return $this->sendResponse($requestBloodLogs, 'Log criado com sucesso!.');

    }

}
