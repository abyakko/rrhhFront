@extends('adminlte::page')
@section('title', 'EMPRESAS')
@section('content')
    <div class="card-header">
        <div class="card bg-dark">
            <table width=100%>
                <tr>
                    <td align="left" width=5%>
                        <h2><i class="fas fa"></i></h2>
                    </td>
                    <td align="center">
                        <h2> EMPRESAS </h2>
                    </td>
                </tr>
            </table>
        </div>
    </div>
        <div class="card-body">
            @if (Session::has('mensaje'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    {{ Session::get('mensaje') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="float-ring">
                <a href="{{ route('empresas.empresapdf') }}" class="btn btn-primary" data-placement="left" target="_blank">
                    <i class="fas fa-file-pdf"></i>
                </a>
                &nbsp;
                @include('empresa.create')
                @include('Validaciones.validacion')
            </div>
            <br>
                <table id="empresa" class="table table-striped">
                    <thead>
                        <th>NIT</th>
                        <th>NOMBRE DE LA EMPRESA</th>
                        <th>PROPIETARIO DE LA EMPRESA</th>
                        <th>CELULAR</th>
                        <th>CORREO</th>
                        <th>ACCIONES</th>
                    </thead>
                    <tbody align="center">
                        @foreach ($empresa as $emp)
                            <tr>
                                <td>{{ $emp->empresa_id }}</td>
                                <td>{{ $emp->nombre }}</td>
                                <td>{{ $emp->propietario }}</td>
                                <td>{{ $emp->celular }}</td>
                                <td>{{ $emp->correo }}</td>                                
                                <td>
                                    @include('empresa.edit', [$emp->id])
                                    @include('empresa.show', [$emp->id])
                                    <form action="{{ url('empresas/' . $emp->id) }}" class="d-inline " method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger eliminar" type="submit" onclick="return confirm('¿Quieres borrar?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
        </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">

    <style>
        .sidebar-dark-primary {
            background: #052530 !important;
        }    
    </style>

@endsection
@section('js')
    <script>
        console.log('Hi!');
    </script>

    <script src="http://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script  language="javascript" src="/resources/views/Validaciones/Validacion.js"> </script>
    <script type ="text/javascript"src="resources/views/Validaciones/Validacion.js"></script>
   <script>
    $('#empresa').DataTable({
        responsive: true,
        autoWidth: false,
        "language": {
            "lengthMenu": "Mostrar " +
                `<select class="custom-selec custom-select-sm form-control form-control-sm">
                                        <option value = '10'>10</option>
                                        <option value = '25'>25</option>
                                        <option value = '50'>50</option>
                                        <option value = '100'>100</option>
                                        <option value = '-1'>Todos</option>
                                    </select>` +
                " registros por pagina",
            "zeroRecords": "Nada encontrado - Disculpa",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
    });
</script>
    <script>
        console.log('Hi!');
    </script>
    <script>
       
        </script>
    @if (session('eliminar') == 'ok')
        <script src="http://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    @endif

    @if (session('guardar') == 'ok')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    @endif

    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>


@stop
