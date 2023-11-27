
<?php $__env->startSection('title', 'EMPRESAS'); ?>
<?php $__env->startSection('content'); ?>
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
            <?php if(Session::has('mensaje')): ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <?php echo e(Session::get('mensaje')); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="float-ring">
                <a href="<?php echo e(route('empresas.empresapdf')); ?>" class="btn btn-primary" data-placement="left" target="_blank">
                    <i class="fas fa-file-pdf"></i>
                </a>
                &nbsp;
                <?php echo $__env->make('empresa.create', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo $__env->make('Validaciones.validacion', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
                        <?php $__currentLoopData = $empresa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($emp->empresa_id); ?></td>
                                <td><?php echo e($emp->nombre); ?></td>
                                <td><?php echo e($emp->propietario); ?></td>
                                <td><?php echo e($emp->celular); ?></td>
                                <td><?php echo e($emp->correo); ?></td>                                
                                <td>
                                    <?php echo $__env->make('empresa.edit', [$emp->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <?php echo $__env->make('empresa.show', [$emp->id], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <form action="<?php echo e(url('empresas/' . $emp->id)); ?>" class="d-inline " method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo e(method_field('DELETE')); ?>

                                        <button class="btn btn-danger eliminar" type="submit" onclick="return confirm('¿Quieres borrar?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <br>
        </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
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
    <?php if(session('eliminar') == 'ok'): ?>
        <script src="http://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <?php endif; ?>

    <?php if(session('guardar') == 'ok'): ?>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <?php endif; ?>

    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('adminlte::page', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\faceareas\facebolareas\resources\views/empresa/index.blade.php ENDPATH**/ ?>