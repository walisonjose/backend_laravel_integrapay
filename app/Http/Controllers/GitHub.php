<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\GitProfile;

use App\Http\Controllers\API\BaseController as BaseController;


class GitHub extends Controller
{
    //

 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchGitHubUser(Request $request)
    {



        $url = "https://api.github.com/users/".$request['username'];

       // $url = "https://swapi.co/api/people/?page=2";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $resultado = json_decode(curl_exec($ch));

        return response()->json($resultado);


    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gitProfiles = GitProfile::all();

        return response()->json($gitProfiles );
        //return $this->sendResponse($gitProfiles->toArray(), 'Perfis salvos.');


    }



}
