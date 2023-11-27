@extends('adminlte::page')
@section('title', 'Clientes')
@section('content')
<div class="card-header">
    <div class="card bg-dark">
        <table width=100%>
            <tr>
                <td align="left" width=5%>
                    <h2><i class="fas fa"></i></h2>
                </td>
                <td align="center">
                    <h2> CLIENTES </h2>
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
        @include('cliente.create')
    </div>
    <br>
    <table id="cliente" class="table table-striped">
        <thead align="center">
            <th>ID</th>
            <th>CI</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Celular</th>
            <th>Correo</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($cliente as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->ci}}</td>
                    <td>{{$client->nombre}}</td>
                    <td>{{$client->paterno}} {{$client->materno}}</td>
                    <td>{{$client->celular}}</td>
                    <td>{{$client->correo}}</td>
                    <td>
                        @include('cliente.edit', [$client->id])
                        @include('cliente.show', [$client->id])
                        <form action="{{ url('clientes/' . $client->id) }}" class="d-inline " method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger eliminar" type="submit">
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
@stop
@section('css')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
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
    $(document).ready(function() {
            $('#toggle-demo').bootstrapToggle('on')
            
        });
</script>

    <script>
        console.log('Hi!');
    </script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="http://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      
    </script>
    <script>
        $('#eliminarconvenio').click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit('#eliminarconv');
                }
            })
        });
    </script>

    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        </script>
    @endif

    @if (session('guardar') == 'ok')
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

    <script>
        Swal.fire({
            title: 'Do you want to save the changes?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Save',
            denyButtonText: 'Don t save',
        }).then((result) => {
            Read more about isConfirmed, isDenied below
            if (result.isConfirmed) {
                Swal.fire('Saved!', '', 'success')
            } else if (result.isDenied) {
                Swal.fire('Changes are not saved', '', 'info')
            }
        })
    </script>
    <script>
        $('#cliente').DataTable({
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
@stop
