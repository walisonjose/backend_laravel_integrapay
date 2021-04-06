<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController as BaseController;
use App\UserHospital;
use Illuminate\Http\Request;

class UserHospitalController extends BaseController
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $UserHospital = UserHospital::all();

        return $this->sendResponse($UserHospital->toArray(), '$procedures retrieved successfully.');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userHospital = UserHospital::create($request);
        return $this->sendResponse($UserHospital->toArray(), 'Relação criada successfully.');

    }

}
