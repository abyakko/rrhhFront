<div class="form-row">
    <div class="form-group col-md-4">
        <div class="input-group mb-2">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-fas fa-hashtag"></i></span>
            {!! Form::text('folio', null, ['id'=>'folio','name'=>'folio','class'=>'form-control','onkeypress'=>'return SoloNumeros(event)','maxlength'=>'5000','placeholder'=>'NRO. FOLIO','required']) !!}
        </div>
    </div>
    <div class="form-group col-md-8 ">
        <div class="input-group mb-2">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-fas fa-building"></i></span>
            <select name="empresa_id" id="empresa_id"  class="form-control selectpicker"data-live-search="true">
            @foreach ($empresa as $empr)
            <option value="">Nombre de la Empresa</option>
            <option value="{{$empr->id}}">{{$empr->nombre}}</option>    
            @endforeach
        </select>

        

        </div>
    </div>
</div>
    
<div class="form-row">
    <div class="form-group col-md-12">
        <div class="input-group mb-2">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-plus"></i></span>
            {!! Form::date('f_inicio', null, ['id'=>'f_inicio','name'=>'f_inicio','class'=>'form-control','onchange'=>'fechainicio()','placeholder'=>'FECHA DE INICIO']) !!}
        </div> 
    </div> 
</div> 
<div class="form-row">
    <div class="form-group col-md-12">
        <div class="input-group mb-2">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-plus"></i></span>
            {!! Form::date('f_fin', null, ['id'=>'f_fin','name'=>'f_fin','class'=>'form-control','min'=>'','placeholder'=>'FECHA DE CADUCIDAD']) !!}
        </div>
    </div>
</div>
    <div class="form-row">
        <div class="form-group col-md-12">
            <select name="modalidad" id="modalidad" class="form-control" required aria-labelledby="MODALIDAD">
                <option value="">TIPO DE PUBLICIDAD</option>
                <option value="0">PUBLICIDAD BÁSICA</option>
                <option value="1">PUBLICIDAD POR INTERCAMBIO</option>
                <option value="2">PUBLICIDAD POR AFILIACIÓN</option>
                <option value="3">PAQUETES PUBLICITARIOS</option>
            </select>
        </div>
    </div>
    <div class="form-row"> 
        <div class="form-group col-md-12">
            {!! Form::text('prom_desc', null, ['id'=>'prom_desc','name'=>'prom_desc','class'=>'form-control','oninput'=>'this.value = this.value.toUpperCase();','style'=>'text-transform:uppercase;','placeholder'=>'PROMOCION / DESCUENTO','required']) !!}
        </div>
    </div>
    <div class="form-row"> 
        <div class="form-group col-md-12">
            {!! Form::textarea('observacion', null, ['id'=>'observacion','name'=>'observacion','class'=>'form-control','oninput'=>'this.value = this.value.toUpperCase();','style'=>'text-transform:uppercase;','placeholder'=>'OBSERVACIÓN','required']) !!}
        </div>
    </div>
    
    <div><input id="estado" type="text" name="estado" style="visibility:hidden" value=1></div>    

    <div class="form-row"> 
        <div class="form-group col-md-12">
            <button type="submit"  class="btn btn-outline-info ">{{$modo}}</button>
            <button type="button" class="btn btn-secondary " data-dismiss="modal">Cerrar</button>
        </div>
    </div>