
<div class="form-row">
    <div class="form-group col-md-2">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-fas fa-hashtag"></i></span>
        <?php echo Form::text('nit', null, ['id'=>'empresa_id','name'=>'empresa_id','class'=>'form-control', 'placeholder'=>'NIT','maxlength'=>'11','onkeypress'=>'return SoloNumeros(event)','required']); ?>

        </div>
    </div>
    <div class="form-group col-md-4">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-fas fa-mobile"></i></span>
        <?php echo Form::text('celular', null, ['id'=>'celular','name'=>'celular', 'placeholder'=>'Celular del propietario','class'=>'form-control','maxlength'=>'8','onkeypress'=>'return SoloNumeros(event)','required']); ?>

        </div>
    </div>
    <div class="form-group col-md-6">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-fas fa-envelope"></i></span>
        <?php echo Form::email('correo', null, ['id'=>'correo','name'=>'correo','class'=>'form-control', 'placeholder'=>'Correo', 'required','pattern'=>'.+@gmail\.com' ]); ?>

    </div>
    </div> 
</div>
<div class="form-row">
    <div class="form-group col-md-6">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-fas fa-building"></i></span>
        <?php echo Form::text('nombre', null, ['id'=>'nombre','name'=>'nombre','class'=>'form-control', 'placeholder'=>'Nombre de la Empresa','onkeypress'=>'return soloLetras(event)','oninput'=>'this.value = this.value.toUpperCase();','style'=>'text-transform:uppercase;', 'required' ]); ?>

    </div>
    </div>
    <div class="form-group col-md-6">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-fas fa-user"></i></span>
        <?php echo Form::text('propietario', null, ['id'=>'propietario','name'=>'propietario','class'=>'form-control', 'placeholder'=>'Propietario (Apellidos y Nombres)','onkeypress'=>'return soloLetras(event)','oninput'=>'this.value = this.value.toUpperCase();','style'=>'text-transform:uppercase;', 'required']); ?>

    </div>
    </div>   
</div>
<div class="form-row">
    <div class="form-group col-md-12">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-align-justify"></i></span>
        <?php echo Form::textarea('descripcion', null, ['id'=>'descripcion','name'=>'descripcion','class'=>'form-control', 'placeholder'=>'Descripción','oninput'=>'this.value = this.value.toUpperCase();','style'=>'text-transform:uppercase;', 'required']); ?>

    </div>
    </div>
</div>

<div class="form-row"> 
    <div class="form-group col-md-8 col-md-offset-2">
        <button type="submit" class="btn btn-outline-info col-md-4"><?php echo e($modo); ?></button>
        <button type="button" class="btn btn-secondary col-md-4" data-dismiss="modal">Cerrar</button>
    </div>
</div>

<?php /**PATH C:\xampp\htdocs\faceareas\facebolareas\resources\views/empresa/form.blade.php ENDPATH**/ ?>