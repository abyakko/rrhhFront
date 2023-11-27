
<div class="form-row">
    <div class="form-group col-md-12">
    <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-map-marker-alt"></i></span>
        <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="LUGAR / CIUDAD" oninput="this.value = this.value.toUpperCase();" onkeypress="return soloLetras(event)"style="text-transform:uppercase;">
    </div>

    </div>
</div>

<div class="form-row"> 
    <div class="form-group col-md-8 col-md-offset-2">
        <button type="submit" class="btn btn-outline-info col-md-4">{{$modo}}</button>
        <button type="button" class="btn btn-secondary col-md-4" data-dismiss="modal">Cerrar</button>
    </div>
</div>