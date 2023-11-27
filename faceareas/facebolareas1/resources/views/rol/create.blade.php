@extends('adminlte::page')
@section('title', 'Despachos')

@section('content')
<div class="card-header">
    <div class="card bg-dark">
        <table width=100%>
            <tr>
                <td align="left" width=5%>
                    <h2><i class="fas fa"></i></h2>
                </td>
                <td align="center">
                    <h2> NUEVO ROL </h2>
                </td>
            </tr>
        </table>
    </div>
        
    <div class="card-body">
        {!! Form::open(['route'=> 'rol.store']) !!}
        @csrf
        @include('rol.form')
        {!! Form::submit('Guardar Rol', ['class'=> 'btn btn-primary', 'id'=>'agrega']) !!}
        {!! Form::close() !!}
    </div>
</div>
@stop