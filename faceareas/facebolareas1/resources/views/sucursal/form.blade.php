<div class="form-row">
    <div class="form-group col-md-4">
        <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1"><i class="fas fa-building"></i></span>
                <select name="empresa_id" id="empresa_id" class="form-control"  required>
                <option value="">Nombre de la Empresa</option>
    
                @foreach($empresa as $emp)
                    <option value="{{$emp->id}}">{{$emp->nombre}} </option>
                    @endforeach
                </select>
            </div>
    </div>

    <div class="form-group col-md-8">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marked-alt"></i></span>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" oninput="this.value = this.value.toUpperCase();" style="text-transform:uppercase;" required>
        </div>
    </div>

    <div class="form-group col-md-4">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone-alt"></i></span>
            <input type="text" class="form-control" id="telefono" name="telefono" maxlength="8" placeholder="Telefono" onkeypress="return SoloNumeros(event)" required>
        </div>
    </div>

    <div class="form-group col-md-4">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker-alt"></i></span>
            <select name="lugar_id" id="lugar_id" class="form-control" required>
            <option value="">Lugar</option>
                @foreach($lugar as $lug)
                <option value="{{$lug->id}}">{{$lug->ciudad}}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group col-md-4">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1"><i class="	fas fa-warehouse"></i></span>
            <select name="tipo_sede_sucur" id="tipo_sede_sucur" class="form-control" required>
            <option value="">Tipo</option>
                <option value="0">SEDE</option>
                <option value="1">SUCURSAL</option>
            </select>
        </div>
    </div>
</div>

<div class="form-row"> 
    <button type="submit" class="btn btn-outline-info col-md-4">{{$modo}}</button>
</div>
