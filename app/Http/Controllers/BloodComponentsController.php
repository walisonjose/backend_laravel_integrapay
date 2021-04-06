<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\API\BaseController as BaseController;

use App\BloodComponents;

class BloodComponentsController extends BaseController
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bloodComponent = BloodComponents::all();


        return $this->sendResponse($bloodComponent->toArray(), '$bloodComponents retrieved successfully.');

    }
}
