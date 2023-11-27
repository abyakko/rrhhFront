<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use DB;


class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente=Cliente::all();
        return view('cliente.index',compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        //$cliente=Cliente::create($request->all());
         //return redirect()->route('cliente.index');
         
        /*$cliente=Cliente::create($request->all());
         return redirect()->route('cliente.index');*/
         

         $datosCli=request()->except('_token');
         //return dd($datosEmp);
 
        Cliente::insert($datosCli);
 
        // return response()->json($datosEmp);
        return redirect('/clientes')->with('nuevo','ok');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        $cliente = Cliente::all();
        return view('show', array('clientes'=>$cliente));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([ 
            'ci'=>"required|unique:clientes,ci, $cliente->id",
         ]);
 
         $cliente->update($request->all());
         return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('cliente.index')->with('eliminar','ok');
    }

    /*public function UpdateStatusNoti(Request $request){

        $NotiUpdate = Cliente::findOrFail($request->id)->update(['estatus' => $request->estatus]); 

        if($request->estatus == 0)  {
            $newStatus = '<br> <button type="button" class="btn btn-sm btn-danger">Inactiva</button>';
        }else{
            $newStatus ='<br> <button type="button" class="btn btn-sm btn-success">Activa</button>';
        }
    
        return response()->json(['var'=>''.$newStatus.'']);
        }
    
*/
}

