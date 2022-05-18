<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $req)
    {
        //
        return Cliente::all();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //return Cliente::create($request->all());
        $existente = Cliente::where('correo', $request->correo)->get ();

        if($existente->count()!=0){
            return 'Error: email duplicado';
        }
        $cliente=new Cliente;
        $cliente->cod_cliente=$request->cod_cliente;
        $cliente->nombres=$request->nombres;
        $cliente->primer_apellido=$request->primer_apellido;
        $cliente->segundo_apellido=$request->segundo_apellido;
        $cliente->correo=$request->correo;
        $cliente->save ();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($dato)
    {
        //Cliente::find($id);
        //return Cliente::where ('id', $id) ->get ();
        $field = filter_var ($dato, FILTER_VALIDATE_EMAIL) ? 'correo':'id';
        $cliente=Cliente::where ($field, $dato) ->get();

        if ($cliente->count() == 0){
            return '¡ERROR! Correo Inexistente';
        }
        return $cliente;
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
        //
        return Cliente::find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return Cliente::destroy($id);
    }
}
