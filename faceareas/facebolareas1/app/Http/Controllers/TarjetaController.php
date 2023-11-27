<?php

namespace App\Http\Controllers;

use App\Models\Tarjeta;
use App\Models\Cliente;

use Illuminate\Http\Request;

class TarjetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarjeta=Tarjeta::all();
        $cliente=Cliente::all();
        return view('tarjeta.index',compact('tarjeta','cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarjeta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$tarjeta=Tarjeta::create($request-> all());
        //return redirect()->route('tarjeta.index')->with('guardar', 'ok');

        $tarjeta = request()->except('_token');
        //return dd($datosEmp);

        Tarjeta::insert($tarjeta);

       // return response()->json($datosEmp);
       return redirect('/tarjetas')->with('nuevo','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function show(Tarjeta $tarjeta)
    {
        return view('tarjeta.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarjeta $tarjeta)
    {
        //return dd($tarjeta);
        return view('tarjeta.edit',compact('tarjeta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    
    public function update(Request $request, Tarjeta $tarjeta)
    {
        $tarjeta->update($request->all());
        return redirect()->route('tarjeta.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarjeta $tarjeta)
    {
        $tarjeta->delete();
        return redirect()->route('tarjeta.index')->with('eliminar','ok');
    }
}
