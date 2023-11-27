<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Lugar;
use App\Models\Sucursal;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\PDF;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresa = Empresa::all();
        
        $lugar = Lugar::all();
        
        return view('empresa.index',compact('empresa','lugar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $empresa = Empresa::all();
        $lugar = Lugar::all();
        return view('empresa.create',compact('lugar','empresa'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $datosEmp=request()->except('_token');
        //return dd($datosEmp);
       
        Empresa::insert($datosEmp);

       // return response()->json($datosEmp);
       return redirect('/sucursals')->with('nuevo','ok');

      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
       
        return view('empresa.show',compact('empresa','sucursal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
        return view('empresa.edit', compact('empresa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        
        $empresa->update ($request->all());
        return redirect()->route('empresa.index')->with('editar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return redirect()->route('empresa.index')->with('eliminar','ok');
       // Empresa::destroy();
        //return redirect('empresa')->with('eliminar','ok');
    }
    public function empresapdf(){
        
        $empresa = Empresa::all();
 
        $pdf = PDF::loadView('empresa.empresapdf',['empresa'=>$empresa]);
       // $pdf->loadHTML('<h1>Test</h1>');
     
        return $pdf->stream();
        
     }
}
