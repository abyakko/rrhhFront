@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1></h1>
@stop

@section('content')

{!! Form::model($tarjeta, ['route'=>['tarjeta.update',$tarjeta],'method'=>'put']) !!}

<div class="">
    <!-- Main content -->
    {!! Form::label('cliente_id', 'ID Cliente') !!}
    {!! Form::text('cliente_id', NULL, ['class'=>'form-control']) !!}
    {!! Form::label('numero', 'Numero Tarjeta') !!}
    {!! Form::text('numero', NULL, ['class'=>'form-control']) !!}
    {!! Form::label('f_inicio', 'FECHA DE INICIO') !!}
    {!! Form::date('f_inicio', NULL, ['class'=>'form-control']) !!}
    {!! Form::label('codigo', 'Codigo QR') !!}
    {!! Form::text('codigo', NULL, ['class'=>'form-control']) !!}
    {!! Form::label('estado', 'Estado') !!}
    {!! Form::text('estado', NULL, ['class'=>'form-control']) !!}
    {!! Form::label('campaña', 'Campaña') !!}
    {!! Form::text('campaña', NULL, ['class'=>'form-control']) !!}
    {!! Form::label('observacion', 'Observacion') !!}
    {!! Form::text('observacion', NULL, ['class'=>'form-control']) !!}
    {!! Form::submit('GUARDAR', ['class'=>'btn btn-primary']) !!}
                        
</div>


{!! Form::close() !!}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
<!-- Content Wrapper. Contains page content -->
 