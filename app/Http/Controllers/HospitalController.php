<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController as BaseController;

use Illuminate\Http\Request;

use App\Hospital;

class HospitalController extends BaseController
{
    //

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospital = Hospital::all();


        return $this->sendResponse($hospital->toArray(), 'hospitals retrieved successfully.');


    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hospital = Hospital::create($request->all());
        return $this->sendResponse($hospital, 'hospital criado com sucesso!.');

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $hospital = Hospital::where('id', $request['id'])->update($request->all());

        if ( $hospital) {

            return $this->sendResponse($hospital, 'hospital atualizado com sucesso!.');


        }else{
            return $this->sendError('Erro na atualização.', "Registo #{$request['id']} não foi encontrado");
        }
        //return redirect()->back()->withErrors(['error', "Registo #{$id} não foi encontrado"]);

    }

    /**
     * Remove the specified resource from storage.
     *@param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $hospital = Hospital::where('id', $request['id'])->delete();

        if ( $hospital) {

            return $this->sendResponse($hospital, 'hospital removido com sucesso!.');


        }else{
          return  $this->sendError('Erro na remoção.', "Registo {$request['id']} não foi encontrado");
        }
}


}
