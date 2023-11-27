
<a class="btn btn-primary edit" data-toggle="modal" data-target="#editModal{{$sucur->id }}" href="{{route('sucursal.edit', $sucur)}}"><i class="fa fa-pen"></i></a>

<div class="modal fade" id="editModal{{ $sucur->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">


    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">ACTUALIZAR SUCURSAL</h4>    
            </div>
            <div class="modal-body">
                {!! Form::model($sucur,['route'=> ['sucursal.update', $sucur->id], 'method'=>'put', 'class'=>'editar']) !!}
                
                <div class="form-group">
                            
                            {!! Form::label('nombre', 'Nombre de la Empresa')!!}                            
                            {!! Form::text('empresa[nombre]', null, ['class'=> 'form-control  text-center','required','disabled']) !!}
                      
                            {!! Form::label('nombre', 'Dirección de la Empresa')!!}
                            {!! Form::text('direccion', null, ['class'=> 'form-control  text-center','required','disabled']) !!}
                    
                            {!! Form::label('nombre', 'Lugar')!!}                            
                            {!! Form::text('lugar[ciudad]', null, ['class'=> 'form-control  text-center','required','disabled']) !!}
                      
                            {!! Form::label('nombre', 'Telefono')!!}
                            {!! Form::text('telefono', null, ['class'=> 'form-control  text-center','maxlength'=>'8','onkeypress'=>'return SoloNumeros(event)','required']) !!}

                            {!! Form::label('nombre', 'Tipo')!!} 
                            {!! Form::select('tipo_sede_sucur', [ 0 => 'SEDE', 1 => 'SUCURSAL' ], null, ['class'=> 'form-control  text-center','required']) !!}
                </div>   
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {!! Form::submit('Actualizar Sucursal', ['class'=> 'btn btn-primary', 'id'=>'actualizar']) !!}
                </div>

                {!! Form::close() !!}
            </div>
            
        </div>
    </div>
</div>
