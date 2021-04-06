<?php

namespace App\Http\Controllers;

use App\Deliveryman;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;

class DeliverymanController extends BaseController
{
    //

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setLocation(Request $request)
    {

        $deliveryman = Deliveryman::findOrFail($request['id_deliveryman']);

        if ($deliveryman) {
            $deliveryman->update(['latitude' => $request['lat'], 'longitude' => $request['long']]);
            return $this->sendResponse("Status", 'Localização atualziada com sucesso!');
        } else {
            return $this->sendError('Ops!', "Ocorreu algum problema na atualização.");

        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getLocation(Request $request)
    {

        $deliveryman = Deliveryman::findOrFail($request['id_deliveryman']);

        if ($deliveryman) {
             return $this->sendResponse($deliveryman->toArray(), 'Localização coletada com sucesso!');
        } else {
            return $this->sendError('Ops!', "Ocorreu algum problema na obtenção dos dados.");

        }

    }



}
