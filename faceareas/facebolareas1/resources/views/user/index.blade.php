@extends('adminlte::page')

@section('title', 'Dashboard')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card bg-dark">
            <table width=100%>
                <tr>
                    <td align="left" width=5%>
                        <h2><i class="fas fa"></i></h2>
                    </td>
                    <td align="center">
                        <h2> USUARIOS </h2>
                    </td>
                </tr>
            </table>
        </div>
    </div>    
    
    <div class="card-body">
        <div class="float-ring">
            <a class="btn btn btn-success" href="{{route('user.create')}}"><i class="fas fa-plus-square"></i></a>
            &nbsp;
        </div>
        
        &nbsp;
        <table id="empresa" class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Rol</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @foreach ($user as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>  
                        <td>
                            @forelse ($user->roles as $rol)
                            <span class="badge badge-info">{{$rol->name}}</span>
                            @empty
                            <span class="badge badge-danger">No asignado</span>
                            @endforelse
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{route('user.edit', $user)}}"><i class="fa fa-user-secret"></i></a>
                            @include('user.roles', [$user -> id]) 
                            <form class="d-inline eliminar" action="{{route('user.destroy', $user)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit"><i class='fa fa-trash'></i></button>         
                            </form>   
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop

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
    @if (session('eliminar') == 'ok')
        <script src="http://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    @endif

    @if (session('guardar') == 'ok')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    @endif

    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>


@stop