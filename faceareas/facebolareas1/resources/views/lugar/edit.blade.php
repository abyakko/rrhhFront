
<a class="btn btn-primary edit" data-toggle="modal" data-target="#editModal{{$lug->id }}" href="{{route('lugar.edit', $lug)}}"><i class="fa fa-pen"></i></a>

<div class="modal fade" id="editModal{{ $lug->id }}" data-backdrop="static" data-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">


    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">ACTUALIZAR LUGAR</h4>    
            </div>
            <div class="modal-body">
                {!! Form::model($lug,['route'=> ['lugar.update', $lug->id], 'method'=>'put', 'class'=>'editar']) !!}
                
                <div class="form-group">
                            
                            {!! Form::label('nombre', 'LUGAR / CIUDAD')!!}                            
                            {!! Form::text('ciudad', null, ['class'=> 'form-control  text-center','required','onkeypress'=>'return soloLetras(event)','style'=>'text-transform:uppercase;']) !!}
                      
                </div>   
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {!! Form::submit('Actualizar lugar', ['class'=> 'btn btn-primary', 'id'=>'actualizar']) !!}
                </div>

                {!! Form::close() !!}
            </div>
            
        </div>
    </div>
</div>
