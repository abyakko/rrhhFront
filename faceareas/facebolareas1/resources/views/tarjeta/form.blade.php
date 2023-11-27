<div class="form-row">
    <div class="form-group col-md-4">
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-fas fa-user"></i></span>
                <select name="cliente_id" id="cliente_id"  class="form-control selectpicker"data-live-search="true">
                
                <option value="">Nombre del cliente</option>
                    @foreach($cliente as $cli)
                    <option value="{{$cli->id}}">{{$cli->nombre}} </option>
                    @endforeach
                </select>
            </div>
    </div>

    <div class="form-group col-md-4">
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-fas fa-hashtag"></i></span>
            <input type="text" class="form-control" id="numero" name="numero" placeholder="NUMERO DE TARJETA"  required>
        </div>
    </div>

    <div class="form-group col-md-4">
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-plus"></i></span>
            <input type="date" class="form-control" id="f_inicio" name="f_inicio"  required>
        </div>
    </div>

    <div class="form-group col-md-4">
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-fas fa-hashtag"></i></span>
            <input type="text" class="form-control" id="codigo" name="codigo" placeholder="CODIGO" required>
        </div>
    </div>

    <div class="form-group col-md-4">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-hand-paper"></i></span>
            <select name="campaña_id" id="campaña_id"  class="form-control">
           
        </select>
        </div>
    </div>

    <div class="form-group col-md-12">
        <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"><i class="fas fa-align-justify"></i></span>
            <textarea class="form-control" id="observacion" name="observacion" placeholder="OBSERVACIÓN" required></textarea>
        </div>
    </div>

    <div><input id="estado" type="text" name="estado" style="visibility:hidden" value=1></div>   


</div>

<div class="form-row"> 
    <button type="submit" class="btn btn-outline-info col-md-4">{{$modo}}</button>
</div>
