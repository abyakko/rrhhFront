<a class="btn btn-success" data-toggle="modal" data-target="#createModal" href=""><i class="fas fa-plus-square"></i></a>

  <div class="modal fade" id="createModal"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">NUEVA EMPRESA</h4>    
            </div>
            <div class="modal-body">
                <form action="<?php echo e(url('empresas')); ?>" method="post" entype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo $__env->make('empresa.form', ['modo' => 'Guardar'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                
                </form>
        </div>

       </div>

    </div>
</div>


<?php /**PATH C:\xampp\htdocs\faceareas\facebolareas\resources\views/empresa/create.blade.php ENDPATH**/ ?>