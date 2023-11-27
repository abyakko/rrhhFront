@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>TARJETAS</h1>
    <div class="card-header">
        <div class="col-2">
            <br />
            <a class="btn btn-primary btn-block"
                href="{{route('tarjeta.create')}}">Nuevo</a>
        </div>
</div>


@stop

@section('content')
<table class="table table-striped" id="myTable">
    <thead align="center">
        <th>ID</th>
        <th>ID Cliente</th>
        <th>Nro Tarjeta</th>
        <th>Fecha Inicio</th>
        <th>Codigo QR</th>
        <th>Estado</th>
        <th>Campaña</th>
        <th>Obserbaciones</th>
        <th>Opc</th>
        <th></th>

    </thead>
    <tbody align="center">
        @foreach ($tarjeta as $tarj)
        <tr>
        <td>{{$tarj->id}}</td>
        <td>{{$tarj->cliente_id}}</td>
        <td>{{$tarj->numero}}</td>
        <td>{{$tarj->f_inicio}}</td>
        <td>{{$tarj->codigo}}</td>
        <td>{{$tarj->estado}}</td>
        <td>{{$tarj->campaña}}</td>
        <td>{{$tarj->observacion}}</td>
        <td>
            <a class="btn btn-primary btn-sm"
            href="{{route('tarjeta.edit',$tarj)}}">Editar</a>   
        </td>
        <td>
            <form class="eliminar" action="{{route('tarjeta.destroy', $tarj)}}" method="POST">
                @csrf
                @method('delete')
                <button class="btn btn-outline-danger" type="submit" > Borrar</button> 
            </form>
        </td>
        @endforeach
    </tr>
    </tbody>

</table>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="http://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <style>
        .sidebar-dark-primary {
            background: #052530 !important;
        }    
    </style>
    
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="http://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
<script>
    $('.eliminar').submit(function(e){
        e.preventDefault();
        Swal.fire({
  title: 'QUIERES BORRAR?',
  text: "Estas seguro de borrar!!!!!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Eliminar!'
}).then((result) => {
  if (result.isConfirmed){
    this.submit();
  }

})    
 
});
</script>
@if(session('eliminar')=='ok')
    <script>
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
    </script>
@endif

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

<script>

Swal.fire({
  title: 'Do you want to save the changes?',
  showDenyButton: true,
  showCancelButton: true,
  confirmButtonText: 'Save',
  denyButtonText: `Don't save`,
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    Swal.fire('Saved!', '', 'success')
  } else if (result.isDenied) {
    Swal.fire('Changes are not saved', '', 'info')
  }
})

</script>    

@stop