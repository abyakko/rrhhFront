
<a class="btn btn-primary edit" data-toggle="modal" data-target="#editModal{{$emp->id}}" href="{{route('empresa.edit', $emp)}}"><i class="fa fa-pen"></i></a>


<div class="modal fade" id="editModal{{$emp->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">

    <div class="modal-dialog modal-xl">
        
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">ACTUALIZAR EMPRESA</h4>    
            </div>
            <div class="modal-body">
                {!! Form::model($emp,['route'=> ['empresa.update', $emp], 'method'=>'put', 'class'=>'editar']) !!}
                <div class="row">
                    <div class="form-group col-md-6">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><b>Nit Empresa</b></span>
                            </div>
                            {!! Form::text('empresa_id', null, ['class'=> 'form-control  text-center','required','disabled']) !!}
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><b>Nombre</b></span>
                            </div>
                            {!! Form::text('nombre', null, ['class'=> 'form-control text-center', 'required','disabled']) !!}
                        </div>
                    </div>

                    <div class="form-group col-md-6">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><b>Propietario</b></span>
                            </div>
                            {!! Form::text('propietario', null, ['class'=> 'form-control text-center','style'=>'text-transform:uppercase;','onkeypress'=>'return soloLetras(event)', 'required','onKeyUp'=>'document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()']) !!}
                        </div>
                    </div>  
            
                    <div class="form-group col-md-6">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><b>Celular</b></span>
                            </div>
                            {!! Form::text('celular', null, ['class'=> 'form-control text-center','maxlength'=>'8','onkeypress'=>'return SoloNumeros(event)', 'required']) !!}
                        </div>
                    </div> 

                        <div class="form-group col-md-6">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><b>Correo</b></span>
                                </div>
                                {!! Form::email('correo', null, ['class'=> 'form-control  text-center','pattern'=>'.+@gmail\.com', 'required']) !!}
                            </div>
                        </div> 
                      
                    </div>
                    
                    <div class="row">
                            <div class="form-group col-md-12">
                            <span class="input-group-text"><b>Descripcion</b></span>
                            {!! Form::textarea('descripcion', null, ['class'=> 'form-control','style'=>'text-transform:uppercase;', 'required','onKeyUp'=>'document.getElementById(this.id).value=document.getElementById(this.id).value.toUpperCase()']) !!}
                            </div>
                        
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        {!! Form::submit('Actualizar Empresa', ['class'=> 'btn btn-primary', 'id'=>'actualizar']) !!}
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
