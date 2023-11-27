@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1></h1>
@stop

@section('content')

{!! Form::open(['route'=>'tarjeta.store']) !!}

<div class="">
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="">Nueva Tarjeta</h3>
                        </div>
                        
                        <!-- /.card-header -->
                        <!-- form start --> 
                       

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">ID Cliente</label>
                                    <input type="number" class="form-control" id="cliente_id" name="cliente_id"
                                        placeholder="">
                                </div>
                    
                                <div class="form-group">
                                    <label for="">Numero de tarjeta</label>
                                    <input type="number" class="form-control" id="numero" name="numero"
                                        placeholder="Numero de tarjeta">
                                </div>
                                <div class="form-group">
                                    <label for="">Fecha de Inicio</label>
                                    <input type="date" class="form-control" id="f_inicio" name="f_inicio"
                                        placeholder="Fecha de Inicio">
                                </div>
                                <div class="form-group">
                                    <label for="">Codigo</label>
                                    <input type="number" class="form-control" id="codigo" name="codigo"
                                        placeholder="Codigo">
                                </div>
                                <div class="form-group">
                                    <label for="r">Estado</label>
                                    <input type="text" class="form-control" id="estado" name="estado"
                                        placeholder="Estado">
                                </div>
                                <div class="form-group">
                                    <label for="">Campaña</label>
                                    <input type="text" class="form-control" id="campaña" name="campaña"
                                        placeholder="Campaña">
                                </div>
                                <div class="form-group">
                                    <label for="">Observaciones</label>
                                    <input type="text" class="form-control" id="observacion" name="observacion"
                                        placeholder="Observaciones">
                                </div>
                                
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>


{!! Form::close() !!}

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('guardar')=='ok' )
        <script>
              Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Your work has been saved',
  showConfirmButton: false,
  timer: 1500
})               
      
        </script>
    @endif
@stop
<!-- Content Wrapper. Contains page content -->
 