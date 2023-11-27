@extends('adminlte::page')


@section('content')
<br />
<div class="card">

    <div class="card bg-dark">
        <table width=100%>
            <tr>
                <td align="left" width=5%>
                    <h2><i class="fas fa"></i></h2>
                </td>
                <td align="center">
                    <h2> LISTA DE LUGARES </h2>
                </td>
            </tr>
        </table>
    </div>
    
    <div class="card-body">
        @if(Session::has('mensaje'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{Session::get('mensaje')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @include('lugar.create')
        @include('Validaciones.validacion')

       
        <br/>
        <br/>
        <table class="table table-striped" id="lugar">
            <thead>
                <tr>
                    <th>Lugar</th>
                    <th>Acciones</th>
                    
                </tr>
            </thead>

            <tbody>
                @foreach($lugar as $lug)
                <tr>
                    <td>{{ $lug->ciudad }}</td>
                    
                    <td>
                    @include('lugar.edit', [$lug->id])

                        
                        <form action="{{ url('lugars/'.$lug->id) }}" class="d-inline" method="post">
                            @csrf
                            {{method_field('DELETE')}}
                            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres borrar?')">
                                <i class="fas fa-trash"></i>
                            </button>
                           
                        </form>

                        
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>

</div>
@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
@endsection

@section('js')

<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>
<script>
    $('#lugar').DataTable({
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
@endsection