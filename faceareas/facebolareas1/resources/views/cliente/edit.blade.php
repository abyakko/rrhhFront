<a class="btn btn-primary edit" data-toggle="modal" data-target="#editModal{{$client->id}}" href="{{route('cliente.edit', $client)}}"><i class="fa fa-pen"></i></a>

<div class="modal fade" id="editModal{{$client->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">NUEVO CLIENTE</h4>    
            </div>
            <div class="modal-body">
                {!! Form::model($client,['route'=> ['cliente.update', $client], 'method'=>'put', 'class'=>'editar']) !!}
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {!! Form::submit('Actualizar Cliente', ['class'=> 'btn btn-primary', 'id'=>'actualizar']) !!}
                </div>         
                {!! Form::close() !!}
        </div>

       </div>

    </div>
</div>