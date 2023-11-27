<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use App\Models\Empresa;
use App\Models\Lugar;
use Illuminate\Http\Request;


class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lugar=Lugar::all();
        //$sucursal = sucursal::all();

       $sucursal = sucursal::orderBy('tipo_sede_sucur','ASC')->get();
        $empresa = Empresa::all();
        return view('sucursal.index',compact('sucursal','empresa','lugar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lugar=Lugar::all();
        $empresa = Empresa::all();
        return view('sucursal.create',compact('empresa','lugar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosSucur=request()->except('_token');
        //return dd($datosSucur);

        Sucursal::insert($datosSucur);

       // return response()->json($datosSucur);
       return redirect('/empresas')->with('nuevo','ok');

       /*$sucursal = sucursal::create($request -> all());
       return redirect() -> route('admi.sucursal.index');*/
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function show(Sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function edit(Sucursal $sucursal)
    {
        //$empresa = Empresa::all();
        //$sucursal = Sucursal::findOrfail($id);
        //return dd($id);
        return view('sucursal.edit',compact('sucursal'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\response
     */
    public function update(Request $request, Sucursal $sucursal)
    {
        //$sucursal = request() ->except(['_token','_method']);
        //return redirect('sucursal') ->with('actualizar','ok');

        //$sucursal->update ($request->all());
        //return redirect()->route('admin.distribuidor.index')->with('editar','ok');
        /*
        $request->validate([ 
            'empresa_id'=>"required|unique:sucursal,empresa_id, $sucursal->id"
         ]);
 
         $sucursal->update($request->all());
         return redirect()->route('sucursal.index');

*/

         $sucursal->update ($request->all());
        return redirect()->route('sucursal.index')->with('editar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sucursal  $sucursal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sucursal::destroy($id);
        return redirect('sucursals') ->with('eliminar','ok');
    }
}
