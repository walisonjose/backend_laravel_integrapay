<?php

namespace App\Http\Controllers;

use App\Http\Controllers\API\BaseController as BaseController;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CustomerRequest;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomersController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();


        return $this->sendResponse($customers->toArray(), '$customers retrieved successfully.');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = Customer::create($request->all());

    if ($customer) {

  Session::flash('success', "Registro #{$customer->id}  salvo com êxito");

  return redirect()->route('customers.index');
    }
    return redirect()->back()->withErrors(['error', "Registo não foi salvo."]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        if ($customer) {
            return view('customers.form', compact('customer'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customer = Customer::where('id', $id)->update($request->except('_token', '_method'));

        if ($customer) {

      Session::flash('success', "Registro #{$id} atualizado com êxito");

      return redirect()->route('customers.index');
        }
        return redirect()->back()->withErrors(['error', "Registo #{$id} não foi encontrado"]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::where('id', $id)->delete();

        if ($customer) {

             Session::flash('success', "Registro #{$id} excluído com êxito");

             return redirect()->route('customers.index');
        }
        return redirect()->back()->withErrors(['error', "Registo #{$id} não pode ser excluído"]);

}







}
