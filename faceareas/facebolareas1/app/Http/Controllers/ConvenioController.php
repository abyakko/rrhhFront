<?php

namespace App\Http\Controllers;
use App\Models\Convenio;
use App\Models\Empresa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;


class ConvenioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$convenio=Convenio::select('CambiaEstado');

        DB::select("Call CambiaEstado");
        $convenio = Convenio::all();

        //$convenio=Convenio::where('f_fin <=CURDATE()')->update(['estado' => 0]);
       
        $empresa=Empresa::all();
        //return dd($convenio);
        return view('convenio.index', compact('convenio','empresa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $convenio = Convenio::all();
        $empresa = Empresa::all();
        
        return view('convenio.create',compact('convenio','empresa'));
    }

    public function create2()
    {
        $convenio = Convenio::all();
        $empresa = Empresa::all();
        
        return view('convenio.create2',compact('convenio','empresa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // $convenio=Convenio::create($request-> all());
        

        $datos=request()->except('_token');
        //return dd($datosEmp);
       
        Convenio::insert($datos);
        return redirect()->route('convenio.index')->with('guardar', 'ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function show(Convenio $convenio)
    {
        $datos = DB::select("call fechas"); 
        return $datos; //Retornamos el resultado.
        //return view('convenio.show',compact('convenio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function edit(Convenio $convenio)
    {
        return view('convenio.edit', compact('convenio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convenio $convenio)
    {

        $convenio->update($request->all());
        return redirect()->route('convenio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Convenio  $convenio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convenio $convenio)
    {
        $convenio->delete();
        return redirect()->route('convenio.index')->with('eliminar', 'ok');
    }
}
