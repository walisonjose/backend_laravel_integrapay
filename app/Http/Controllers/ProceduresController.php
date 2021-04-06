<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController as BaseController;

use Illuminate\Http\Request;

use App\Procedures;

class ProceduresController extends BaseController
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $procedures = Procedures::all();


        return $this->sendResponse($procedures->toArray(), '$procedures retrieved successfully.');

    }
}
