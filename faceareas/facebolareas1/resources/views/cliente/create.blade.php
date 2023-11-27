<a class="btn btn-success" data-toggle="modal" data-target="#createModal" href=""><i class="fas fa-plus-square"></i></a>
  <div class="modal fade" id="createModal"  tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">NUEVO CLIENTE</h4>    
            </div>
            <div class="modal-body">
                {!! Form::open([ 'route'=>'cliente.store']) !!}
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            {!! Form::text('nombre', NULL, ['class'=>'form-control', 'placeholder'=>'Nombre', 'id'=>'input-form']) !!}
                        </div>
                    </div>    
            
                    <div class="col-md-3 mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            {!! Form::text('paterno', NULL, ['class'=>'form-control', 'placeholder'=>'Paterno', 'id'=>'input-form']) !!}
                        </div>
                    </div>   
            
            
                    <div class="col-md-3 mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            {!! Form::text('materno', NULL, ['class'=>'form-control', 'placeholder'=>'Materno', 'id'=>'input-form']) !!}
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card"></i></span>
                            {!! Form::number('ci',  NULL, ['id'=>'ci','class'=>'form-control','required','placeholder'=>'Carnet de identidad', 'id'=>'input-form']) !!}
                        </div>
                    </div>
                </div>
            
                <div class="form-row">

                    <div class="col-md-2 mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-id-card"></i></span>
                            {!! Form::text('complemento', NULL, ['class'=>'form-control','required','placeholder'=>'Complemento', 'id'=>'input-form']) !!}
                        </div>
                    </div>

                    <div class="col-md-4 mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-mobile"></i></span>
                            {!! Form::number('celular', NULL, ['class'=>'form-control','placeholder'=>'Celular', 'id'=>'input-form']) !!}
                        </div>
                    </div>
            
                    <div class="col-md-6 mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                            {!! Form::text('correo', NULL, ['class'=>'form-control','placeholder'=>'Correo', 'id'=>'input-form']) !!}
                        </div>
                    </div>   
                </div>
            
                <div class="form-row">
                    <div class="col-md-12 mb-3">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-map"></i></span>
                            {!! Form::text('direccion', NULL, ['class'=>'form-control','placeholder'=>'Direccion', 'id'=>'input-form']) !!}
                        </div>
                    </div> 
                </div>           
                {!! Form::submit('GUARDAR',['class'=>'btn btn-success']) !!}           
                {!! Form::close() !!}
        </div>

       </div>

    </div>
</div>